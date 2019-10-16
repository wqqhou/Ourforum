<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		$this->load->model('login_model');
		$this->load->model('system_model');
        $this->load->model('account_model');

        // import custom helper library
        $this->load->helper('security');

        // import form, form_validation helper for post
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('s3');

		$is_login = $this->system_model->is_login();
		if ( !$is_login ) {
			redirect(base_url().'login/');
		}
    }

    public function index () {

    }

	// 進入校板
	public function enterschool() {

		$data = $this->account_model->get_school();
		redirect(base_url(). 'a/'.$data['sc_abb'].'/');

	}


    // 我的名片
    public function profile ()
    {
		$header['page_title'] = "我的名片";
        $this->load->view('templates/header', $header);
        $this->load->view('templates/navbar');
        $this->load->view('account/menu');

		$data['profile'] = $this->account_model->get_member_profile();
        $this->load->view('account/profile', $data);

        $this->load->view('templates/footer');
    }

	// 涅友列表
    public function friends ()
    {
		$header['page_title'] = "我的涅友";
        $this->load->view('templates/header', $header);
        $this->load->view('templates/navbar');
        $this->load->view('account/menu');

        $this->load->view('account/friends');

        $this->load->view('templates/footer');
	}

    // 刪除涅友
    public function remove_friend ($rndcode)
    {
        if ( $this->account_model->is_friend($rndcode) ) {
            $this->account_model->remove_friend($rndcode);
            redirect(base_url('account/friends/'));
        }
        else{
            $this->load->view('templates/header');
            $this->load->view('account/not_friend');
            $this->load->view('templates/footer');
        }

    }

	// 涅友個資
    public function friends_profile ($rndcode = NULL)
    {

		$is_friend = $this->account_model->is_friend($rndcode);
		if ( !$is_friend ) {
			redirect(base_url('account/friends'));
		}
		else {

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('account/menu');

			$data['friends'] = $this->account_model->get_friends_profile($rndcode);
			$this->load->view('account/friends_profile', $data);

			$this->load->view('templates/footer');

		}

    }

	// 查詢我的涅友 (回應JSON)
	public function friends_json() {

		// 查詢我的涅友
		$result = $this->account_model->get_friends();

		// 如果有取得到我的涅友
		if ($result) {
			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

    // 我的文章
    public function article ()
    {
		$header['page_title'] = "我的文章";
        $this->load->view('templates/header', $header);
        $this->load->view('templates/navbar');
        $this->load->view('account/menu');

        $this->load->view('account/article');

        $this->load->view('templates/footer');
    }

	// 查詢我發布的文章
	public function article_json() {

		$this->form_validation->set_rules('offset', 'offset', 'numeric|max_length[4]');

		if ($this->form_validation->run() === TRUE) {

			// 查詢我發布的文章
			$result = $this->account_model->get_my_article();

			// 如果有取得到我的文章
			if ($result) {
				$response['result'] = $result;
				$response['status'] = true;
			}
			else {
				$response['status'] = false;
			}
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}


	// 查詢我參與的文章
	public function join_article_json() {

		$this->form_validation->set_rules('offset', 'offset', 'numeric|max_length[4]');

		if ($this->form_validation->run() === TRUE) {

			// 查詢我參與的文章
			$result = $this->account_model->get_my_join_article();

			// 如果有取得到我的文章
			if ($result) {
				$response['result'] = $result;
				$response['status'] = true;
			}
			else {
				$response['status'] = false;
			}
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

    // 我的收藏
    public function archive ()
    {
		$header['page_title'] = "我的收藏";
        $this->load->view('templates/header', $header);
        $this->load->view('templates/navbar');
        $this->load->view('account/menu');

        $this->load->view('account/archive');

        $this->load->view('templates/footer');
    }

	// 查詢我的收藏 (回應JSON)
	public function archive_json() {

		$this->form_validation->set_rules('offset', 'offset', 'numeric|max_length[4]');
// $this->output->enable_profiler(true);
		if ($this->form_validation->run() === TRUE) {

			// 查詢我的收藏
			$result = $this->account_model->get_my_archive();

			// 如果有取得到我的收藏
			if ($result) {
				$response['result'] = $result;
				$response['status'] = true;
			}
			else {
				$response['status'] = false;
			}
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

    // 我的物品
    public function items ()
    {
		$header['page_title'] = "我的物品";
        $this->load->view('templates/header', $header);
        $this->load->view('templates/navbar');
        $this->load->view('account/menu');

        $this->load->view('account/items');

        $this->load->view('templates/footer');
    }

    // 涅友私訊頁面
    public function friends_talk ( $friend_rndcode = NULL )
    {

		// 	檢查是否有這個朋友
        $is_friend = $this->account_model->is_friend( $friend_rndcode );

		$data['friend_rndcode'] = $friend_rndcode;

		// 如果有此朋友
		if ( $is_friend ) {

            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('account/menu');
            $this->load->view('account/talk', $data );
            $this->load->view('templates/footer');
		}
		else {

            redirect(base_url('account/friends'));
        }
    }

    // 私訊頁面與涅友聊天訊息
    public function talk_sms () {

		$this->form_validation->set_rules('friend', 'friend', 'required|numeric');
		$this->form_validation->set_rules('offset', 'offset', 'numeric|max_length[4]');

		if ($this->form_validation->run() === TRUE) {

			// 取得對話
			$result = $this->account_model->get_talk_sms();

			if ($result) {

				// 將對話設為已讀
				$this->account_model->set_talk_read();

				$response['result'] = $result;
				$response['status'] = true;
			}
			else {
				$response['status'] = false;
			}
		}
		else {

			$response['status'] = false;

		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }


    // 私訊頁面涅友資料
    public function friends_info () {

        $result = $this->account_model->get_talk_friend();

		if ($result) {
			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

	// 查詢我的勳章 (回應JSON)
	public function items_json() {

		// 查詢勳章
		$result = $this->account_model->get_items();

		// 如果有取得到勳章
		if ($result) {
			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}


    // 我的警告
    public function warning ()
    {
		$header['page_title'] = "我的警告";
        $this->load->view('templates/header', $header);
        $this->load->view('templates/navbar');
        $this->load->view('account/menu');

        $data['profile'] = $this->account_model->get_member_profile();
        $this->load->view('account/warning', $data);

        $this->load->view('templates/footer');
    }

	// 查詢我的警告 (回應JSON)
	public function warning_json() {

		// 查詢警告
		$result = $this->account_model->get_warning();

		// 如果有取得到警告
		if ($result) {
			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = true;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	// *********************************************************************
	// ** 寫入資料庫區
	// *********************************************************************

    // 私訊送出
    public function friends_send_talk () {

        $this->form_validation->set_rules('receiver', '收信者', 'required|numeric|max_length[8]');
		$this->form_validation->set_rules('content', '私訊內容', 'required|callback_trim_sms|xss_clean|trim|max_length[3000]|min_length[1]', array('required' => '請填寫私訊內容', 'max_length' => '私訊內容最多 3000 個字', 'min_length' => '私訊內容最少 1 個字'));

		if ($this->form_validation->run() === TRUE) {

			// 確認是否為好友關係
			if ( ! $this->account_model->is_friend( $this->input->post('receiver') ) ) {
				$response['status'] = false;
			}
			else {

				// 送出訊息
				$result = $this->account_model->talk_send();

				if ( $result ) {
					$response['status'] = true;
					$response['result'] = $result;
				}
				else {
					$response['status'] = false;
				}
			}
        }
        else{
			$response['status'] = false;
        }

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }


	// 儲存我的資料
	public function profile_save () {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

		// 表單驗證規則
		$this->form_validation->set_rules('introduction', '人格特質', 'required|max_length[1000]|trim|strip_tags', array('required' => '你的人格特質呢 QQ', 'max_length' => '人格特質描述最多 1000 字'));
		$this->form_validation->set_rules('specialty', '興趣專長', 'required|max_length[1000]|trim|strip_tags', array('required' => '你的興趣專長呢 QQ', 'max_length' => '興趣專長描述最多 1000 字'));
		$this->form_validation->set_rules('signature', '簽名檔', 'max_length[100]|trim|strip_tags', array('max_length' => '簽名檔最多 100 字'));

		if ($this->form_validation->run() === FALSE) {

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
		else {

			$result = $this->account_model->save_profile();

			if ($result) {

				$response['status'] = true;

			}
			else {

				// Loop through $_POST and get the keys
				foreach ($this->input->post() as $key => $value)
				{
					// Add the error message for this field
					$errors[$key] = strip_tags(form_error($key));
				}
				$response['errors'] = array_filter($errors); // Some might be empty
				$response['status'] = false;

			}

		}
		echo json_encode($response);

	}

	// 上傳大頭貼的圖片 (到S3)
	public function profile_upload() {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

		$config['upload_path']      = './uploads/userimg/';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['encrypt_name']		= TRUE;
		$config['max_size']     	= 3072; //KB = 3MB
		$config['max_width']        = 4096;
		$config['max_height']       = 4096;

		// 使用上述設定載入 upload _Library
		$this->load->library('upload', $config);

		// 呼叫 upload 這個 library 裡的 do_upload 方法，欄位是 name="userImage"
		if ( ! $this->upload->do_upload('userImage') ) {

			// 如果上傳失敗，顯示錯誤
			$response['errors'] = strip_tags($this->upload->display_errors());
			$response['status'] = false;

		}
		else {

			// 傳遞上傳參數給 save_item_upload_data，進行上傳檔案到 s3 的動作
 			$result = $this->account_model->save_profile_upload_data ( $this->upload->data() );

			if ( $result ) {
				$response['status'] = true;
			}
			else {
				$response['status'] = false;
			}

		}
		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 儲存顯示姓名
	public function hide_name_save () {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

		// 檢查 is_hide 是否符合格式 (hide 或 unhide)
		$this->form_validation->set_rules('is_hide', '隱藏姓名', 'required|in_list[hide,unhide]');

		if ($this->form_validation->run() === FALSE) {

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
		else {

			$result = $this->account_model->save_hide_name();

			if ($result['status']) {

				$response['result'] = $result['is_hide'];
				$response['status'] = true;

			}
			else {

				// Loop through $_POST and get the keys
				foreach ($this->input->post() as $key => $value)
				{
					// Add the error message for this field
					$errors[$key] = strip_tags(form_error($key));
				}
				$response['errors'] = array_filter($errors); // Some might be empty
				$response['status'] = false;

			}

		}
		echo json_encode($response);

	}


	// 儲存訊息接受隱私設定
	public function rece_message () {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}
		echo json_encode($this->account_model->save_rece_message());
	}

    // 建立短帳號
    public function short() {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

        $this->form_validation->set_rules('username', '自訂的短帳號', 'required|min_length[4]|is_unique[member.d_acc]|max_length[16]|alpha_numeric|xss_clean|strip_tags', array('required' => '請填寫短帳號', 'alpha_numeric' => '短帳號只能是英文及數字', 'max_length' => '短帳號最多 16 個英文及數字', 'min_length' => '短帳號最少 4 個英文及數字', 'is_unique' => '這組短帳號已經被使用過 QQ'));
        $this->form_validation->set_rules('password', '密碼認證', 'required|alpha_numeric|min_length[6]|max_length[20]|xss_clean|trim|strip_tags', array('required' => '請填寫目前的密碼', 'alpha_numeric' => '密碼只能是英文及數字', 'max_length' => '密碼最多 20 個英文及數字', 'min_length' => '密碼最少 6 個英文及數字'));

        if ($this->form_validation->run() == true) {

            $result = $this->account_model->short();

            if ($result) {

                $response['status'] = true;
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

        }
        else{

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

    // 修改密碼
    public function edit_password () {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

        $this->form_validation->set_rules('password', '新密碼', 'required|min_length[6]|max_length[20]|alpha_numeric|xss_clean|strip_tags');
        $this->form_validation->set_rules('ck_password', '新密碼確認', 'required|min_length[6]|max_length[20]|alpha_numeric|xss_clean|trim|strip_tags');
        $this->form_validation->set_rules('old_password', '目前密碼', 'required|min_length[6]|max_length[20]|alpha_numeric|xss_clean|trim|strip_tags');

        if ($this->form_validation->run() == FALSE || $this->input->post('password') != $this->input->post('ck_password')) {
             $response['status'] = false;
        }
        else{
            ( $this->account_model->edit_password() == true ? $response['status'] = true : $response['status'] = false );
        }

        echo json_encode($response);
	}
	
	// 修改電子郵件
    public function edit_email () {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

		$this->form_validation->set_rules('password', '目前密碼', 'required|min_length[6]|max_length[20]|alpha_numeric|xss_clean|trim|strip_tags');
		$this->form_validation->set_rules('email', '電子郵件', 'trim|required|valid_email', array('required' => '請填寫電子郵件'));

        if ($this->form_validation->run() == FALSE) {
             $response['status'] = false;
        }
        else{
            ( $this->account_model->edit_email() == true ? $response['status'] = true : $response['status'] = false );
        }

        echo json_encode($response);
    }

    // 列出通知 (回覆及發文追蹤、成功加涅友)
    public function notice () {

        $notice_article = $this->account_model->get_notice_article();
        $notice_account = $this->account_model->get_notice_account();

        $response['article'] = $notice_article;
		$response['account'] = $notice_account[0];

		$response['status']  = true;

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    // 通知已讀
    public function notice_check ($id = NULL) {

		if ($id) {

			// 取得通知連結
			$link = $this->account_model->get_notice_check_link($id);

            if ( $link ) {

				// 將通知設為已讀
				$this->account_model->set_notice_check($id);

				// 轉到該篇貼文
                redirect( base_url().'a/'.$link['di_code'].'/'.$link['tr_post'] );

            }
            else {
                redirect(base_url().'a');
            }
        }
        else{

            redirect(base_url().'a');
        }
    }


	// 處理私訊內容
	public function trim_sms($str) {

		// 全型空白取代為空白
		$str = preg_replace("/　/", " ", $str);

		// 一個以上空白變一個
		$str = preg_replace("/\s{2,}/", " ", $str);
		// 兩行以上換行變兩行
		$str = preg_replace("/\n{4,}/", "\n\n\n", $str );

		$str = preg_replace("/(<\/div><div><br>){4,}/", "<br><br>", $str);
		// 兩行以上換行變兩行 (html)
		$str = preg_replace("/(<br>){4,}/", "<br><br>", $str);
		// 一個以上空白變一個
		$str = preg_replace("/(\&nbsp;\s){2,}/", " ", $str);
		// 過濾控制字元
		$str = preg_replace("/[[:cntrl:]]/","", $str );


		return $str;
	}

}
