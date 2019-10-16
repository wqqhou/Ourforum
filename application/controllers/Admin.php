<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('article_model');
		$this->load->model('account_model');
		$this->load->model('system_model');

		// import custom helper library
		$this->load->helper('security');

		// import form, form_validation helper for post
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	public function page_not_found()
	{
		// TODO: handle 錯誤頁面
	}

	public function index() {

		$this->load->view('admin/templates/header');

		$this->load->view('admin/templates/navbar');
		$this->load->view('admin/article/menu');

		$type = $this->article_model->get_type_name();

		$data['type'] = $type;
		$this->load->view('admin/article/list', $data);

		$this->load->view('templates/footer');
	}

	// 舊文章網址對應 例 p/foodp/4093 對應到 a/food/4093
	public function old_url_redirect($type = NULL, $id = NULL) {
		redirect(base_url().'a/'.$type.'/'.$id);
	}


	// 載入更多文章
	public function query($type = NULL) {

		// 判斷是否有板名
		if ($type === NULL) {

			// 板名->查詢全部
			$result = $this->article_model->get_list();
		}
		else {

			// 有板名
			$type = $this->article_model->get_type_name();
			$result = $this->article_model->get_list_by_type($type['di_numb']);

		}

		if ($result) {

			$response['result'] = $result;
			$response['status'] = true;

		}
		else {

			$response['status'] = false;

		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 搜尋文章
	public function search() {

		// 板名->查詢全部
		$result = $this->article_model->get_search();

		if ($result) {

			$response['result'] = $result;
			$response['status'] = true;

		}
		else {

			$response['status'] = false;

		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 直接經由網址進來閱讀文章的社會大眾版
	public function view ($type = NULL, $id = NULL) {

		// 將英文網址板名轉換為代號
		$type = $this->article_model->get_type_name();

		// 如果有找到這個板
		if ($type) {

			// 取得標題、open graph(og) 等資料放到 header 裡，做到 SEO
			$meta = $this->article_model->get_article_for_header($type['di_numb'], $id);

			// 如果有取得 meta 資料  **且文章是公開的**  才載入 meta 資訊
			if ( $meta && $meta['public'] == 1 ) {

				// 定義資料，準備傳遞到 header 內
				$header['page_title'] = $meta['art_name'];
				$header['page_description'] = mb_substr( str_replace( PHP_EOL, "", strip_tags($meta['content']) ), 0, 200, 'utf-8' );

			}
			else {

				$header = "";
			}

			$this->load->view('templates/header', $header);
			$this->load->view('templates/navbar');

			$data['type'] = $type['di_numb'];
			$data['aid'] = $id;
			$this->load->view('article/view', $data);

		}
		else {

			// 如果找不到這個板，就踢回聊天室首頁
			redirect(base_url().'a');
		}

	}

	// 發表新文章
	public function newpost()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');

		// 查詢是否有此板
		$type = $this->article_model->get_type_name();
		if ($type) {

			$data['type'] = $type;
			$this->load->view('article/newpost', $data);

		}
		else {
			redirect(base_url().'a');
		}

		$this->load->view('templates/footer');
	}

	// 儲存文章
	public function newpost_save () {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		// 表單驗證規則
		$this->form_validation->set_rules('title', '標題', 'required|max_length[30]|trim|strip_tags');
		$this->form_validation->set_rules('content', '內容', 'required|max_length[2000]|trim|strip_tags');
		$this->form_validation->set_rules('type', '看板', 'max_length[3]|numeric');
		$this->form_validation->set_rules('anonymous', '匿名', 'required|in_list[true,false]');
		$this->form_validation->set_rules('public', '隱密文章', 'required|in_list[true,false]');

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

			$result = $this->article_model->newpost();

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


	// ***********************************************************
	// 由資料庫產生列表名稱 (返回JSON)
	public function type_json () {

		// 查詢板名列表
		$result = $this->article_model->get_type_list();


		// 如果有取得到板名列表
		if ($result) {
			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 載入靜態 json 檔案
	public function type_json_load_view () {
		$this->load->view('article/type_json');
	}
	// ***********************************************************


	// 文章按讚
	public function click_like() {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		$this->form_validation->set_rules('aid', 'aid', 'required|numeric');
		$this->form_validation->set_rules('type', 'type', 'required|numeric');
		$this->form_validation->set_rules('islike', 'islike', 'required|in_list[true,false]');

		// 驗證 post 進來的 aid 及 type，(type及id都有資料及符合格式)
		if ($this->form_validation->run() === TRUE) {

			// 呼叫 like_article()，可能傳回 liked/unlike/likedFailed/unlikeFailed
			$response['result'] = $this->article_model->like_article();
			$response['status'] = true;

		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 文章按讚
	public function click_archive() {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		$this->form_validation->set_rules('aid', 'aid', 'required|numeric');
		$this->form_validation->set_rules('type', 'type', 'required|numeric');
		$this->form_validation->set_rules('isarchive', 'isarchive', 'required|in_list[true,false]');

		// 驗證 post 進來的 aid 及 type，(type及id都有資料及符合格式)
		if ($this->form_validation->run() === TRUE) {

			// 呼叫 archive_article()，可能傳回 archived/unarchived/unarchiveFailed/unarchiveFailed
			$response['result'] = $this->article_model->archive_article();
			$response['status'] = true;

		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 回應按讚
	public function click_replylike() {

		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		$this->form_validation->set_rules('aid', 'aid', 'required|numeric');
		$this->form_validation->set_rules('type', 'type', 'required|numeric');
		$this->form_validation->set_rules('replyid', 'reidply', 'required|numeric');
		$this->form_validation->set_rules('isrlike', 'isrlike', 'required|in_list[true,false]');

		// 驗證 post 進來的 aid 及 type，(type及id都有資料及符合格式)
		if ($this->form_validation->run() === TRUE) {

			// 呼叫 archive_article()，可能傳回 archived/unarchived/unarchiveFailed/unarchiveFailed
			$response['result'] = $this->article_model->like_reply();
			$response['status'] = true;

		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}



	// 查詢單篇文章 (返回JSON)
	public function article_json () {

		$this->form_validation->set_rules('aid', 'aid', 'required|numeric');
		$this->form_validation->set_rules('type', 'type', 'required|numeric');

		// 驗證 post 進來的 aid 及 type，(type及id都有資料及符合格式)
		if ($this->form_validation->run() === TRUE) {

			// 查詢單篇文章
			$result = $this->article_model->get_article();

			// 將文章的發文者編號，拿去查詢這篇文章的回應列表，查出原po是哪幾樓
			$yuanPO = $this->article_model->get_reply_yuanPO($result['author_rndcode']);

			// 如果有取得到文章
			if ($result) {

				// 檢查文章是否為公開？
				if ( !$this->system_model->is_login() && $result['public'] != 1 ) {
					$response['ispublic'] = false;
				}
				else {

					// 在丟出 json 前，把作者編號移除，以免洩露發文者身分
					unset($result['author_rndcode']);

					// 設定文章內容
					$response['result'] = $result;
					// 設定原PO樓數
					$response['yuanPO'] = $yuanPO;

					// 因為要看是否按讚，所以要檢查登入
					if ( $this->system_model->is_login() ) {
						// 設定是否已按讚
						$response['islike'] = $this->article_model->get_article_is_like();
						// 設定是否已收藏
						$response['isarchive'] = $this->article_model->get_article_is_archive();
						// 設定我按讚的回覆 (反白用)
						$response['reply_liked'] = $this->article_model->get_article_liked_reply();
					}
					else {
						$response['islike'] = "notlogin";
						$response['isarchive'] = "notlogin";
						$response['reply_liked'] = "notlogin";
					}

					$response['status'] = true;
				}
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

	// 查詢單篇文章的回應 (返回JSON)
	public function reply_json () {

		$this->form_validation->set_rules('reply_aid', 'reply_aid', 'required|numeric');
		$this->form_validation->set_rules('reply_type', 'reply_type', 'required|numeric');

		// 驗證 post 進來的 aid 及 type，(type及id都有資料及符合格式)
		if ($this->form_validation->run() === TRUE) {

			// 查詢單篇文章
			$result = $this->article_model->get_reply();

			// 如果有取得到文章
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

	// 回覆文章
	public function article_reply () {

		$this->form_validation->set_rules('content', 'content', 'required|max_length[2000]|strip_tags|xss_clean');
		$this->form_validation->set_rules('art_id', 'art_id', 'required|numeric|strip_tags|xss_clean');
		$this->form_validation->set_rules('art_type', 'art_type', 'required|numeric|strip_tags|xss_clean');

		if ( $this->system_model->is_login() ) {

			if ($this->form_validation->run() === TRUE) {

				$result = $this->article_model->article_reply();

				if ($result) {

					$response['status'] = true;

				}
				else {

					$response['status'] = false;

				}
			}
			else{
				$response['status'] = false;
			}

		}
		else{
			$response['status'] = false;
			$response['login'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 熱門文章
	public function hot_json($type = NULL) {

		// 判斷是否有板名
		if ($type === NULL) {

			// 沒板名->查詢全部的熱門文章
			$result = $this->article_model->get_hot();
		}
		else {

			// 有板名
			$type = $this->article_model->get_type_name();
			$result = $this->article_model->get_hot($type['di_numb']);

		}

		if ($result) {

			$response['result'] = $result;
			$response['status'] = true;

		}
		else {

			$response['status'] = false;

		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

}
