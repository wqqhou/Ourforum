<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('article_model');
		$this->load->model('account_model');
		$this->load->model('system_model');

		// import custom helper library
		$this->load->helper('security');
		$this->load->helper('text');

		// import form, form_validation helper for post
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	// 404 not found
	public function page_not_found()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/404');
		$this->load->view('templates/footer');
	}

	// 文章列表 view/article/list.php
	public function index( $typeCode = NULL )
	{

		if ( $typeCode == 'all' ) {
			redirect(base_url().'a');
		}

		$this->load->view('templates/header');

		$this->load->view('templates/navbar');
		$this->load->view('article/menu');

		// 檢查板名是否存在，或是空白 (所有)
		$typeCode = ( $typeCode == NULL ) ? 'all' : $typeCode;
		$type = $this->article_model->get_type_name( $typeCode );

		if ( $type ) {

			// 取得公告
			$data['ann'] = $this->article_model->get_list_ann();

			$data['type'] = $type;
			$this->load->view('article/list', $data);

		}
		else {
			redirect(base_url().'a');
		}

		$this->load->view('templates/footer');
	}

	// 舊文章網址對應 例 p/foodp/4093 對應到 a/food/4093
	public function old_url_redirect($type = NULL, $id = NULL) {
		redirect(base_url().'a/'.$type.'/'.$id);
	}


	// 載入更多文章
	public function query( $typeCode = NULL ) {

		$this->form_validation->set_rules('offset', 'offset', 'numeric|max_length[4]');
// $this->output->enable_profiler(TRUE);
		// 驗證 offset 的數字格式
		if ($this->form_validation->run() === TRUE) {

			$typeCode = ( $typeCode == NULL || $typeCode == 'all' ) ? FALSE : $typeCode;
			$result = $this->article_model->get_list( $typeCode );

			if ($result) {
				$response['result'] = $result;
				$response['status'] = true;
			}
			else {
				$response['isSubScribe'] = $this->article_model->get_subscribe()['isSubScribe'];
				$response['status'] = false;
			}
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	// 訂閱或取消訂閱板塊
	public function subscribe () {
		$this->form_validation->set_rules('id', 'id', 'numeric|min_length[1]');

		if ($this->form_validation->run() === true) {

			if ($this->article_model->subscribe() === "1") {
				$response['result'] = "1";
			}
			else {
				$response['result'] = "0";
			}
		}
		else {
			$response['result'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	// 搜尋文章
	public function search() {

		$this->form_validation->set_rules('keywords', '關鍵字', 'required|max_length[10]|trim|callback_cntrl_check|strip_tags|xss_clean');

		if ($this->form_validation->run() === FALSE) {

			$response['status'] = false;

		}
		else {

			// 查詢搜尋
			$result = $this->article_model->get_search();

			if ($result) {

				$response['result'] = $result;
				$response['status'] = true;

			}
			else {
				$response['status'] = false;
			}

		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 直接經由網址進來閱讀文章的社會大眾版
	public function view ($typeCode = NULL, $id = NULL) {

		// 檢查板名是否存在
		$type = $this->article_model->get_type_name( $typeCode );

		// 如果有找到這個板
		if ($type) {

			// 取得標題、open graph(og) 等資料放到 header 裡，做到 SEO
			$meta = $this->article_model->get_article_for_header($typeCode, $id);

			// 如果有取得 meta 資料  **且文章是公開的**  才載入 meta 資訊
			if ( $meta && $meta['public'] == 1 ) {

				// 定義資料，準備傳遞到 header 內
				$header['page_title'] = '【'.$meta['di_name'].'】'. $this->trim_title($meta['art_name']);
				$header['page_description'] = ellipsize( $this->trim_title($meta['content']), 150, 1, '...' );

			}
			else {

				$header = "";
			}

			$this->load->view('templates/header', $header);
			$this->load->view('templates/navbar');

			$data['type'] = $type;
			$data['aid'] = $id;
			$this->load->view('article/view', $data);

		}
		else {

			// 如果找不到這個板，就踢回聊天室首頁
			redirect(base_url().'a');
		}

	}

	// 發表新文章
	public function newpost($typeCode = NULL, $id = NULL)
	{

		// 限制無法發文的看板
		$restrict = array('all', 'ann');

		// 如果板號在以上的限制中，則 return FALSE
		if ( in_array( strtolower( $typeCode ), $restrict ) ) {
			redirect(base_url().'a');
		}

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');

		// 查詢是否有此板
		$type = $this->article_model->get_type_name( $typeCode );

		if ($type) {

			$data['type'] = $type;
			$this->load->view('article/newpost', $data);
		}
		else {

			redirect(base_url().'a');
		}

		$this->load->view('templates/footer');
	}


	// 回覆文章
	public function response($typeCode = NULL, $id = NULL)
	{

		// 限制無法發文的看板
		$restrict = array('all', 'ann');

		// 如果板號在以上的限制中，則 return FALSE
		if ( in_array( strtolower( $typeCode ), $restrict ) ) {
			redirect(base_url().'a');
		}

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');

		// 查詢是否有此板
		$type = $this->article_model->get_type_name( $typeCode );

		if ($type) {

			$data['type'] = $type;
			$this->load->view('article/response', $data);
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
		$this->form_validation->set_rules('title', '標題', 'required|strip_tags|xss_clean|callback_trim_title|trim|max_length[30]');
		$this->form_validation->set_rules('content', '內容', 'required|callback_trim_content|trim|min_length[30]|max_length[2000]');
		$this->form_validation->set_rules('refer', '參考資料', 'required|callback_trim_content|trim|min_length[10]|max_length[2000]');
		$this->form_validation->set_rules('type', '看板', 'max_length[3]|numeric');
		$this->form_validation->set_rules('sign', '簽名檔', 'required|in_list[true,false]');
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
			$response['status'] = ( $result ) ? true : false;

		}
		echo json_encode($response);

	}

	public function response_save () {
		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		$result = $this->article_model->response();
		$response['status'] = ( $result ) ? $result : false;
		echo json_encode($response);
	}

	// 引用文章發布
	public function newresponse_save () {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		// 表單驗證規則
		$this->form_validation->set_rules('reply', '修改內容', 'required|callback_trim_content|trim|max_length[2000]');
		$this->form_validation->set_rules('reason', '理由', 'required|callback_trim_content|trim|max_length[255]');

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

			$result = $this->article_model->newresponse();
			$response['status'] = $result;

		}
		echo json_encode($response);
	}

	// 引用文章的新增頁面
	public function response_view () {
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		
		$data['article'] = $this->article_model->response_query($this->uri->segment(3));

		if ($data['article']['responseReply'] !== null) {
			redirect(base_url().'a/');
		}

		$this->load->view('article/response', $data);
		$this->load->view('templates/footer');
	}


	// 編輯文章頁面 (讀取內容)
	public function get_article_edit ($typeCode = NULL, $id = NULL) {

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');

		if ( $typeCode !== NULL && $id !== NULL ) {

			$data['article'] = $this->article_model->edit_article_load($typeCode, $id);

			if ($data['article'] == false) {
				redirect(base_url().'a');
			}
			else{
				$this->load->view('article/edit', $data);
			}
		}
		else{

			redirect(base_url().'a');
		}

		$this->load->view('templates/footer');
	}


	// 取得編輯文章內容的 json
	public function get_article_edit_json () {

		$typeCode = $this->input->post('typeCode');
		$artId = $this->input->post('artId');

		if ( $typeCode !== NULL && $artId !== NULL ) {

			$data['article'] = $this->article_model->edit_article_load($typeCode, $artId);
			echo json_encode($data);
		}
		else{

			redirect(base_url().'a');
		}
	}

	// 編輯文章
	public function article_edit_save () {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'a/');
		}

		// 表單驗證規則
		$this->form_validation->set_rules('art_id', '文章編號', 'required|numeric');
		$this->form_validation->set_rules('title', '標題', 'required|strip_tags|xss_clean|callback_trim_title|trim|max_length[30]');
		$this->form_validation->set_rules('content', '內容', 'required|callback_trim_content|trim|min_length[30]|max_length[2000]');
		$this->form_validation->set_rules('public', '隱密文章', 'required|in_list[true,false]');

		if ($this->form_validation->run() === TRUE) {

			$result = $this->article_model->article_edit_save();
			($result == true ? $response['status'] = true : $response['status'] = false);
			$response['errors'][] = '文章沒有更新';
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
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
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

		if ( !$this->input->is_ajax_request() || !$this->system_model->is_login() ) {
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

		if ( !$this->input->is_ajax_request() || !$this->system_model->is_login() ) {
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

		if ( !$this->input->is_ajax_request() || !$this->system_model->is_login() ) {
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

			// 檢查是否有登入
			$is_login = $this->system_model->is_login();

			// 查詢單篇文章
			$result = $this->article_model->get_article();
			$responseArticle = $this->article_model->get_article_resp();

			// 如果有取得到文章
			if ($result) {

				// 檢查文章是否為公開？
				if ( !$is_login && $result['public'] != 1 ) {
					$response['status'] = true;
					$response['ispublic'] = false;
				}
				else {

					// 將文章的發文者編號，拿去查詢這篇文章的回應列表，查出原po是哪幾樓，並設定原PO樓數
					$yuanPO = $this->article_model->get_reply_yuanPO($result['author_rndcode']);

					// 在丟出 json 前，把作者編號移除，以免洩露發文者身分
					unset($result['author_rndcode']);

					// 設定文章內容
					$response['result'] = $result;
					$response['response'] = $responseArticle;
					$response['yuanPO'] = array_map(function($o){ return $o['reply_id']; },  $yuanPO );;

					// 因為要看是否按讚，所以要檢查登入
					if ( $is_login ) {
						// 設定我按讚的回覆 (反白用)
						$response['reply_liked']	= array_map(function($o){ return $o['reply_id']; }, $this->article_model->get_article_liked_reply() );
						// 設定我的回覆
						$response['my_reply']		= array_map(function($o){ return $o['reply_id']; }, $this->article_model->get_my_reply() );
					}
					else {
						$response['reply_liked']	= [];
						$response['my_reply']		= [];
					}

					// 是否有登入？
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

		$response['login'] = $is_login;

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 查詢單篇文章的回應 (返回JSON)
	public function reply_json () {

		$this->form_validation->set_rules('reply_aid', 'reply_aid', 'required|numeric');
		$this->form_validation->set_rules('reply_type', 'reply_type', 'required|numeric');
		$this->form_validation->set_rules('reply_offset', 'reply_offset', 'numeric|max_length[4]');

		// 驗證 post 進來的 aid 及 type，(type及id都有資料及符合格式)
		if ($this->form_validation->run() === TRUE) {

			// 檢查是否有登入
			$is_login = $this->system_model->is_login();

			// 查詢單篇文章
			$result = $this->article_model->get_reply( $is_login );

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

		$this->form_validation->set_rules('content', '回覆內容', 'required|callback_trim_content|strip_tags|xss_clean|trim|min_length[5]|max_length[2000]', array('required' => '回覆內容呢 QQ', 'max_length' => '回覆內容最多 2000 字'));
		$this->form_validation->set_rules('art_id', '文章編號', 'required|numeric|strip_tags|xss_clean');
		$this->form_validation->set_rules('art_type', '文章分類', 'required|numeric|strip_tags|xss_clean');

		if ( $this->system_model->is_login() ) {

			if ($this->form_validation->run() === TRUE) {

				$result = $this->article_model->article_reply();

				if ($result !== false) {

					$response['result'] = $result;
					$response['status'] = true;

				}
				else {

					$response['status'] = false;
				}
			}
			else{

				$response['status'] = false;
				$errors = array();

				// Loop through $_POST and get the keys
				foreach ($this->input->post() as $key => $value)
				{
					// Add the error message for this field
					$errors[$key] = strip_tags(form_error($key));
				}
				$response['errors'] = array_filter($errors); // Some might be empty

			}

		}
		else{
			$response['status'] = false;
			$response['login'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}


	// 文章檢舉
	public function article_report () {

		$this->form_validation->set_rules('aid', '文章編號', 'required|numeric|max_length[10]');
		$this->form_validation->set_rules('content', '檢舉描述', 'required|max_length[100]|strip_tags|xss_clean', array('required' => '請簡單描述', 'max_length' => '請簡單描述 100 字'));

		// 檢查表單格式，以及是否有登入
		if ( $this->system_model->is_login() && $this->form_validation->run() === TRUE) {

			// 送出文章檢舉
			$response['status'] = ( $this->article_model->article_report() ) ? true : false;

		}
		else{
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}


	// 回應檢舉
	public function reply_report () {

		$this->form_validation->set_rules('replyid', '回應', 'required|numeric|max_length[10]');
		// $this->form_validation->set_rules('content', '檢舉描述', 'required|max_length[100]|strip_tags|xss_clean', array('required' => '請簡單描述', 'max_length' => '請簡單描述 100 字'));

		// 檢查表單格式，以及是否有登入
		if ( $this->system_model->is_login() && $this->form_validation->run() === TRUE) {

			// 送出文章檢舉
			$response['status'] = ( $this->article_model->reply_report() ) ? true : false;

		}
		else{
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	// 熱門文章
	public function hot_json($typeCode = NULL) {

		$typeCode = ( $typeCode == NULL || $typeCode == 'all' ) ? FALSE : $typeCode;
		$result = $this->article_model->get_hot( $typeCode );

		if ($result) {

			$response['result'] = $result;
			$response['status'] = true;

		}
		else {

			$response['status'] = false;

		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}


	//刪除文章
	public function remove_article() {

		// 檢查aid格式
		$this->form_validation->set_rules('aid', 'aid', 'required|max_length[10]|numeric');

		if ( $this->system_model->is_login() && $this->form_validation->run() === TRUE) {

			// 刪除文章
			$result = $this->article_model->remove_article();
			$response['status'] = ( $result ) ? true : false;

		}
		else {

			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	//刪除回應
	public function remove_reply() {

		// 檢查回應格式
		$this->form_validation->set_rules('replyid', 'replyid', 'required|max_length[10]|numeric');

		if ( $this->system_model->is_login() && $this->form_validation->run() === TRUE) {

			// 刪除回應
			$result = $this->article_model->remove_reply();
			$response['status'] = ( $result ) ? true : false;

		}
		else {

			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}


	// ********************************
	// ** 表單驗證區
	// ********************************

	// 驗證控制字元(看不見的) 及特殊符號
	public function cntrl_check($str) {
		if (!preg_match('/[[:cntrl:][:punct:]]/', $str) ) { return true; } else { return false; } }

	// 處理標題
	public function trim_title($str) {
		// 過濾控制字元
		$str = preg_replace("/[[:cntrl:]]/","", $str );
		// 過濾 html 轉譯代號 ( 如 &nbsp;  &lt; )
		$str = preg_replace("/&#?[a-z0-9]{2,8};/i","", $str );
		// 全型空白取代為空白
		$str = preg_replace("/　/", " ", $str);
		// 一個以上空白變一個
		$str = preg_replace("/\s{2,}/", " ", $str);

		return $str;
	}

	// 處理內容
	public function trim_content($str) {
		// 過濾控制字元 (除了空白)
		$str = preg_replace("/[[:cntrl:][^\s]]/","", $str );
		// 全型空白取代為空白
		$str = preg_replace("/　/", " ", $str);
		// 三行以上的空白變三行
		$str = preg_replace("/\n{4,}/", "\n\n\n", $str );

		return $str;
	}

}
