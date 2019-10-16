<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('login_model');
        $this->load->model('system_model');
        $this->load->model('account_model');

        // import custom helper library
        $this->load->helper('security');

        // // import form, form_validation helper for post
        // $this->load->helper('form');
        $this->load->library('form_validation');

        $is_login = $this->system_model->is_login();
        if ( !$is_login ) {
            redirect(base_url().'login/');
        }

    }

    public function index ()
    {

    }

    // 今日涅友
    public function selene_friend()
    {

        // 取得 member 資料
        $member = $this->account_model->get_member_profile();

        // 如果沒有填寫個資就跳到個資頁面
        if ( $member['stop'] == 1 || $member['wrn'] == 1 ) {

            redirect(base_url('account/profile'));
        }
        else {

			// 取得我的今日好友
			$data['profile'] = $this->account_model->get_today_friend();

			// 有沒有取得到今日好友？ (有=>顯示資料     沒有=>抽涅友再顯示)
			if ( $data['profile'] == FALSE) {

				// 進行抽涅友的動作
				$this->account_model->get_selene_friend();

                $this->load->view('templates/header');
    	        $this->load->view('templates/navbar');
    	        $this->load->view('account/menu');
    	        $this->load->view('friend/animation');
    	        $this->load->view('templates/footer');

			}
            else{

                $data['is_sent'] = $this->account_model->is_sent_friend_request();

    			$this->load->view('templates/header');
    	        $this->load->view('templates/navbar');
    	        $this->load->view('account/menu');
    	        $this->load->view('friend/profile', $data);
    	        $this->load->view('templates/footer');

            }

			// 更新 last_seen
			$this->account_model->update_last_seen();

        }
    }

    // 送出第一則交友邀請訊息
	public function invite_friend() {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'friend');
		}

		// 表單驗證規則
		$this->form_validation->set_rules('message', '給對方的訊息', 'required|max_length[200]|trim|strip_tags|xss_clean', array('required' => '跟對方打個招呼吧！', 'max_length' => '先簡單打個招呼就好'));

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

			// 檢查雙方中無論是誰，有沒有曾經送出邀請
			if ( $this->account_model->is_ever_sent_friend() ){

				// 如果有送過，就更新記錄
				$response['status'] = ( $this->account_model->update_friend_record() ) ? true : false ;

			}
			else {

				// 如果沒有送過，就要主動送邀請
				$response['status'] = ( $this->account_model->insert_friend_record() ) ? true : false ;

			}

			$this->account_model->send_first_message();

		}
		echo json_encode($response);
	}

    // 檢舉今日涅友
    public function invite_friend_report() {

		// 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'friend');
		}

		// 表單驗證規則
		$this->form_validation->set_rules('content', '檢舉內容', 'required|max_length[100]|trim|strip_tags|xss_clean',
				array(
					'required' => '請說明違規項目',
					'max_length' => '簡單描述違規100字以內'
				)
		);

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

			$result = $this->account_model->report_today_friend();
            ( $result == true ? $response['status'] = true : $response['status'] = false );
		}
		echo json_encode($response);
	}
}
