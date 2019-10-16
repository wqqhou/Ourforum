<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('login_model');
		$this->load->model('account_model');
		$this->load->model('system_model');
		$this->load->model('login_model');

		// import custom helper library
		$this->load->helper('security');
		$this->load->helper('login_helper');

		// import form, form_validation helper for post
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');

	}

	// 登入畫面 controller
	public function index()
	{
		// 檢查使用者是否登入 (使用登入畫面專用的 model --- is_login_form)
		$is_login = $this->system_model->is_login_form();

		// 假如登入成功 (傳回 true 的情況下)
		if ($is_login) {

			// 轉到文章首頁
			redirect(base_url('a'));
		}
		else {

			$data['page_title'] = "登入";
			$this->load->view('templates/header', $data);
	        $this->load->view('templates/navbar');
			$this->load->view('login/form');
	        $this->load->view('templates/footer');
		}
	}

	public function login_handle () {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

		$this->form_validation->set_rules('email', '校園信箱', 'trim|required|xss_clean', array('required' => '請填寫校園信箱'));
		$this->form_validation->set_rules('password', '密碼', 'trim|required|alpha_numeric|min_length[6]|max_length[20]|xss_clean', array('required' => '請填寫密碼', 'alpha_numeric' => '密碼只能是英文及數字', 'min_length' => '密碼最少要 6 個字元', 'max_length' => '密碼最多 20 個字元'));

		if ($this->form_validation->run() === TRUE) {

			$result = $this->login_model->member_login();

			if ($result) {

				$response['status']	= true;
			}
			else {

				$response['failed'] = true;
				$response['status'] = false;
			}
		}
		else {

			$errors = array();

			// Loop through $_POST and get the keys
			foreach ($this->input->post() as $key => $value)
			{
				// Add the error message for this field
				$errors[$key] = strip_tags(form_error($key));
			}
			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = false;

		}

		echo json_encode($response);
	}

	// 登出
	public function logout() {

		$this->login_model->unset_session();
		redirect(base_url().'login');

	}

	// 註冊
	public function join ()
	{

		// 如果網址是 register ，導到 join
		if ( strtolower( $this->uri->segment(1, 0) ) == 'register' ) {
			redirect(base_url('join'));
		}

		// 如果已經登入，導回 a (不需要顯示註冊頁面)
		$is_login = $this->system_model->is_login();
		if ( $is_login ) {
			redirect(base_url('a'));
		}
		else{
			$data['page_title'] = "註冊";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('login/join_form');
			$this->load->view('templates/footer');
		}
	}

	// app 登入
	public function login_mobile() {

		// TODO: 尚未檢查是否已登入過

		$result = $this->login_model->member_login_mobile();

		if ($result) {

			$response['status']	= true;
			$response['data'] 	= $result;

		}
		else {
			$response['status']	= false;
		}

		echo json_encode($response);

	}

	// 送出註冊
	public function join_confirm () {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

		$this->form_validation->set_rules('email', '校園信箱', 'required|trim|valid_email|is_unique[member.email]|xss_clean', array('required' => '請填寫校園信箱', 'valid_email' => '信箱格式錯誤', 'is_unique' => '此校園信已註冊過，如有疑問請點選 feedback 回報！'));
		$this->form_validation->set_rules('firstname', '真實姓名', 'required|trim|max_length[5]|min_length[2]', array('required' => '請填寫真實姓名'));
		$this->form_validation->set_rules('birthday', '生日', 'required|callback_date_check', array('required' => '請輸入生日', 'date_check' => '請輸入有效的生日'));
		$this->form_validation->set_rules('gender', '性別', 'required|max_length[1]|min_length[1]|numeric', array('required' => '請選擇性別', 'numeric' => '請選擇性別', 'max_length' => '請選擇性別', 'min_length' => '請選擇性別'));
		$this->form_validation->set_rules('psw', '密碼', 'required|matches[ck_psw]|alpha_numeric|max_length[20]|min_length[6]|xss_clean', array('required' => '請填寫密碼', 'alpha_numeric' => '密碼只能 6-20 個英文及數字', 'matches' => '密碼與確認密碼不符'));
		$this->form_validation->set_rules('ck_psw', '重複密碼', 'required|alpha_numeric|max_length[20]|min_length[6]|xss_clean', array('required' => '請填寫確認密碼', 'alpha_numeric' => '密碼只能 6-20 個英文及數字'));

		// 檢查表單格式
		if ( $this->form_validation->run() === TRUE ) {

			// 送出註冊
			$result = $this->login_model->join_save();

			if ( !$result ) {

				$response['status'] = false;

			}
			else {

				// ********* 郵件設定 *********
				$this->email->from('www.selene.tw@gmail.com', '塞拉涅');
				$this->email->to( $result['email'] );

				$this->email->subject('歡迎註冊 Selene');
				$this->email->message( $this->load->view('email/join_success', $result, TRUE ));
				// ***************************

				// 寄送 email 以及判斷寄送是否成功
				if ( $this->email->send() ) {

					$response['status'] = true;
					$response['school'] = $result['school'];

				}
				else {
					$response['aa'] = "5";
					$response['status'] = false;
				}
			}
		}
		else {
			$errors = array();

			// Loop through $_POST and get the keys
			foreach ($this->input->post() as $key => $value)
			{
				// Add the error message for this field
				$errors[$key] = strip_tags(form_error($key));
			}
			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = false;
		}
		echo json_encode($response);
	}

	// 註冊成功頁面
	public function join_success () {

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('login/join_success');
		$this->load->view('templates/footer');
	}

	// enable 會員啟用信連結
	public function join_enable( $key = NULL ) {

		// 如果沒有傳入 enable key 就失敗
		if ( $key == NULL ) {
			return false;
		}

		if (  $this->login_model->set_enable( $key ) ) {

			// 啟用成功 顯示恭喜畫面
			$this->load->view('templates/header');
			$this->load->view('account/enable');
			$this->load->view('templates/footer');

		}
		else {
			// 啟用失敗，轉回登入頁面
			redirect(base_url('login'));
		}


	}

	// 使用條款頁面
	public function terms() {

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('login/terms');
		$this->load->view('templates/footer');
	}

	public function testemailtemp() {

		//TODO: 測試 email 寄信模板用，不然會沒資料顯示，寫好模板後刪除此 function

		$result = array('firstname'	=> '夏本羿',
						'enable'	=> '38754b9f088c5907d7eedf7218ac520dc238188e',
		);
		$this->load->view('email/join_success', $result);

	}


	// 請求忘記密碼 modal 處理
	public function resend_enable_email() {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'login/');
		}

		$this->form_validation->set_rules('email', '校園信箱', 'trim|required|valid_email', array('required' => '請填寫校園信箱'));

		if ( $this->form_validation->run() === TRUE ) {

			// 送出查詢此人是否符合資格
			$result = $this->login_model->email_is_exist();

			// 符合重寄信資格，且有資料
			if ( $result ) {

				// ********* 郵件設定 *********
				$this->email->from('www.selene.tw@gmail.com', '塞拉涅');
				$this->email->to( $result['email'] );

				$this->email->subject('歡迎註冊 Selene');
				$this->email->message( $this->load->view('email/join_success', $result, TRUE ));
				// ***************************

				// 寄送 email 以及判斷寄送是否成功
				if ( $this->email->send() ) {
					$response['status'] = true;
					$response['school'] = $result['school'];
				}
				else {
					$response['status'] = false;
				}

			}
			else {
				$response['status'] = false;
				$response['errors'] = '補發失敗，要不要再檢查一次 Email';
			}
		}
		else {
			$response['errors'] = 'Email 格式錯誤';
		}

		echo json_encode($response);
	}

	// 請求忘記密碼 modal 處理
	public function reset_password() {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'login/');
		}

		$this->form_validation->set_rules('school', '學校', 'required|max_length[2]|min_length[1]|numeric|xss_clean', array('required' => '請選擇學校', 'numeric' => '輸入關鍵字搜尋學校', 'max_length' => '我期待日後開放這麼多學校！'));
		$this->form_validation->set_rules('dept', '系所', 'required|max_length[3]|min_length[1]|numeric|xss_clean', array('required' => '請選擇系所', 'numeric' => '輸入關鍵字搜尋系所', 'max_length' => '如沒有您的系所，請點選 feedback 回報！'));
		$this->form_validation->set_rules('gender', '性別', 'required|max_length[1]|min_length[1]|numeric', array('required' => '請選擇性別', 'numeric' => '請選擇性別', 'max_length' => '請選擇性別', 'min_length' => '請選擇性別'));
		$this->form_validation->set_rules('email', '校園信箱', 'required|trim|valid_email|xss_clean', array('required' => '請填寫校園信箱', 'valid_email' => '信箱格式錯誤'));


		if ( $this->form_validation->run() === TRUE ) {

			// 送出查詢此人是否符合資格
			$member = $this->login_model->member_is_exist();

			// 不符合資格，查不到此人
			if ( !$member ) {
				$response['status'] = false;
				$response['errors'][] = '資料輸入錯誤，請再檢查正確性';

			}
			else {

			// 找到資料，準備重設

				// 建立一筆重設密碼記錄
				$result = $this->login_model->create_forget_record( $member['rndcode'] );

				// 建立重設密碼記錄成功 成功
				if ( $result ) {

					// ********* 郵件設定 *********
					$this->email->from('www.selene.tw@gmail.com', '塞拉涅');
					$this->email->to( $result['email'] );

					$this->email->subject('重設您的 Selene 密碼');
					$this->email->message( $this->load->view('email/reset_password', $result, TRUE ));
					// ***************************

					// 寄送 email 以及判斷寄送是否成功
					if ( $this->email->send() ) {
						$response['status'] = true;
					}
					else {
						$response['status'] = false;
					}

				}
				else {
					$response['status'] = false;
				}

			}
		}
		else {

			$errors = array();

			// Loop through $_POST and get the keys
			foreach ($this->input->post() as $key => $value)
			{
				// Add the error message for this field
				$errors[$key] = strip_tags(form_error($key));
			}
			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = false;

		}

		echo json_encode($response);
	}


	// 輸入密碼頁面
	public function reset_password_page( $key = NULL ) {

		if ( $key == NULL ) {
			redirect(base_url('login'));
		}

		// 檢查是否有這組 key，且附合資格
		$result = $this->login_model->check_reset_key( $key );

		// 如果有，回應 view
		if ( $result ) {

			$data['key'] = $result['fp_enable'];

			// 忘記密碼重設頁面
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('login/forget', $data);
			$this->load->view('templates/footer');

		}
		else {
			redirect(base_url('login'));
		}
	}

	// 處理輸入密碼頁面的請求
	public function reset_password_page_handle () {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'login/');
		}

		$this->form_validation->set_rules('newPassword', '新密碼', 'required|alpha_numeric|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('newPasswordConfirm', '新密碼確認', 'required|alpha_numeric|min_length[6]|max_length[20]|matches[newPassword]');
		$this->form_validation->set_rules('resetKey', 'key', 'required|alpha_numeric');

		if ($this->form_validation->run() === TRUE) {

			// 送出重設密碼請求
			$result = $this->login_model->reset_password();

			if ($result) {

				$response['status']	= true;
			}
			else {

				$response['errors'][] = '重設密碼失敗';
				$response['status'] = false;
			}
		}
		else {

			$errors = array();

			// Loop through $_POST and get the keys
			foreach ($this->input->post() as $key => $value)
			{
				// Add the error message for this field
				$errors[$key] = strip_tags(form_error($key));
			}
			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = false;

		}
		echo json_encode($response);
	}


	// *****************************************
	// 使用者定義檢查規則
	// *****************************************
	// 表單檢查日期
	public function date_check($str) {

		if (!preg_match('/^(19[0-9]{2}|20[0-9]{2})-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/', $str) ) {
			return false;
		}

		if ( !$this->validateDate( $str , 'Y-m-d') ) {
			return false;
		}

		return true;
	}

	// 檢查日期是否正確 (自訂格式) 回傳 true / false
 	public function validateDate($date, $format = 'Y-m-d H:i:s') {
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
}
