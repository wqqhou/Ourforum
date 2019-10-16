<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('article_model');
		$this->load->model('account_model');
		$this->load->model('system_model');
		$this->load->model('mobile_model');


		// import custom helper library
		$this->load->helper('security');
		$this->load->helper('login_helper');

		// import form, form_validation helper for post
		$this->load->helper('form');
		$this->load->library('form_validation');

	}


	// 查詢我的資料 (回應JSON)
	public function account_profile_json() {

		// 查詢我的資料
		$result = $this->account_model->get_member_profile();

		// 如果有取得到我的資料
		if ($result) {

			// 隱藏不該出現的欄位
			$unset_array = ['enable', 'psw', 'birthday', 'reg_date', 'gm', 'stop', 'online', 'last_seen'];
			foreach ( $unset_array as $unset_array ) {
				unset($result[$unset_array]);
			}

			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 查詢我的涅友 (回應JSON)
	public function account_friends_json() {

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


	// 查詢我的文章 (回應JSON)
	public function account_article_json() {

		// 查詢文的文章
		$result = $this->account_model->get_my_article();

		// 如果有取得到我的文章
		if ($result) {
			$response['result'] = $result;
			$response['status'] = true;
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 查詢我的收藏 (回應JSON)
	public function account_archive_json() {

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

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}


	// 查詢我的勳章 (回應JSON)
	public function account_items_json() {

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

	// 查詢我的警告 (回應JSON)
	public function account_warning_json() {

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


	// 載入更多文章
	public function query( $typeCode = NULL ) {

		$this->form_validation->set_rules('offset', 'offset', 'numeric|max_length[4]');

		// 驗證 offset 的數字格式
		if ($this->form_validation->run() === TRUE) {

			$typeCode = ( $typeCode == NULL || $typeCode == 'all' ) ? FALSE : $typeCode;
			$result = $this->article_model->get_list( $typeCode );

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


	// 文章按讚
	public function click_like() {

		// 檢查是否已登入 && AJAX Request
		if ( $this->system_model->is_login_mobile() ) {

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
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

	// 文章按讚
	public function click_archive() {

		if ( $this->system_model->is_login_mobile() ) {

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
		}
		else {
			$response['status'] = false;
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}


	// 回應按讚
	public function click_replylike() {

		if ( $this->system_model->is_login_mobile() ) {

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
				$response['errors'] = 'run fail';
			}
		}
		else {
			$response['status'] = false;
			$response['errors'] = 'not login';
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
			$is_login = $this->system_model->is_login_mobile();

			// 查詢單篇文章
			$result = $this->article_model->get_article();

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
			$is_login = $this->system_model->is_login_mobile();

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

		if ( $this->system_model->is_login_mobile() ) {

			if ($this->form_validation->run() === TRUE) {

				$result = $this->mobile_model->article_reply();

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


	// 今日涅友
	public function selene_friend()
	{

		// 檢查是否有登入
		if ( $this->system_model->is_login_mobile() ) {

			// 如果登入，取得 member 資料
			$member = $this->account_model->get_member_profile();

			// 如果沒有填寫個資就跳到個資頁面
			if ( $member['stop'] == 1 || $member['wrn'] == 1 ) {

				$data['status'] = true;
				$data['incomplete'] = true;

			}
			else {

				// 有沒有取得到今日好友？ (沒有=>抽涅友)
				if ( $this->account_model->get_today_friend() == FALSE) {
					// 進行抽涅友的動作
					$this->account_model->get_selene_friend();
				}

				$data['profile'] = $this->account_model->get_today_friend();
				$data['is_sent'] = $this->account_model->is_sent_friend_request();
				$data['status'] = true;

				// 更新 last_seen
				$this->account_model->update_last_seen();

			}

		}
		else {
			$data['status'] = false;
			$data['errors'] = 'not login';
		}

		unset($data['profile']['rndcode']);
		unset($data['profile']['last_seen']);

		echo json_encode($data);
	}


	// 涅友個資
	public function friends_profile ($rndcode = NULL)
	{
		if ( $this->system_model->is_login_mobile() ) {

			if ( ! $this->account_model->is_friend($rndcode) ) {
				$data['status'] = false;
				$data['errors'] = 'not friend';
			}
			else {
				$data['status'] = true;
				$data['result'] = $this->account_model->get_friends_profile($rndcode);

				$data['result']['firstname'] = ( $data['result']['nameIsHide'] == 1 ) ? ( ( $data['result']['gender'] == 1 )  ? "男孩" : "女孩" ) : $data['result']['firstname'];

				// 隱藏不該出現的欄位
				$unset_array = ['enable', 'psw', 'birthday', 'reg_date', 'gm', 'stop', 'online', 'last_seen',
								'inspect', 'wrn', 'coin', 'status', 'id', 'email', 'd_acc'];
				foreach ( $unset_array as $unset_array ) {
					unset($data['result'][$unset_array]);
				}

			}
		}
		else {
			$data['status'] = false;
			$data['errors'] = 'not login';
		}
		echo json_encode($data);
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
