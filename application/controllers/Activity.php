<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		$this->load->model('login_model');
		$this->load->model('system_model');
        $this->load->model('account_model');
        $this->load->model('activity_model');

        // import custom helper library
        $this->load->helper('security');

        // import form, form_validation helper for post
        $this->load->helper('form');
        $this->load->library('form_validation');

		$is_login = $this->system_model->is_login();
		if ( !$is_login ) {
			redirect(base_url().'login/');
		}

    }

    public function index ()
    {

    }

    // 攻城戰
    public function siege ()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('activity/menu');

        $this->load->view('activity/siege');

        $this->load->view('templates/footer');
    }

    // 取得攻城戰攻打紀錄
    public function siege_record_json() {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url('activity/siege'));
		}

		// 查詢攻城戰資料
		$result = $this->activity_model->get_siege_info();
        $record = $this->activity_model->get_siege_record();

        $response['result']   = $result;
        $response['record']   = $record['record'];
        $response['attacked'] = $record['attacked'];

		echo json_encode($response, JSON_UNESCAPED_UNICODE);

	}

    // 攻城戰發動攻擊
    public function siege_attack_json () {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

        $result = $this->activity_model->siege_attack();
        $record = $this->activity_model->get_siege_record();

        if ($result && $record) {
			$response['result']   = $result;
            $response['record']   = $record['record'];
            $response['attacked'] = $record['attacked'];
			$response['status']   = true;
		}
		else {
			$response['status'] = false;
		}

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    // 活動參與
    public function join () {

        $data['activity_item'] = $this->activity_model->get_join_item();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('activity/menu');
        $this->load->view('activity/join', $data);
        $this->load->view('templates/footer');
    }

    // 可參與活動項目詳細資訊
    public function join_info ($id) {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');

        $data['activity_info'] = $this->activity_model->get_join_info($id);

        if ($data['activity_info']) {

            $this->load->view('activity/menu');
            $this->load->view('activity/join_info', $data);
        }
        else{
            // 未開放就導回 join
            redirect(base_url().'activity/join');
        }

        $this->load->view('templates/footer');
    }

    // 送出活動參與
    public function activity_join_json () {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url().'account/profile/');
		}

        $this->form_validation->set_rules('join_info_topic', '作品名稱', 'required|max_length[15]|min_length[1]|strip_tags');
        $this->form_validation->set_rules('join_info_name', '藝名', 'required|max_length[15]|min_length[1]|strip_tags');

        if ($this->form_validation->run() === TRUE) {

            $result = $this->activity_model->set_activity_join();

            ($result == true ? $response['status'] = true : $response['status'] = false);
        }
        else{
            $response['status'] = false;
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    // 競賽投票
    public function vote ()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('activity/menu');
        $this->load->view('activity/vote');
        $this->load->view('templates/footer');
    }

    // 可投票活動列表
    public function can_vote_activity_json () {

        $data = $this->activity_model->get_can_vote_activity();
        if ($data) {
            $response['status'] = true;
            $response['result'] = $data;
        }
        else{
            $response['status'] = false;
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    // 某項活動內投票列表 json
    public function activity_can_vote_list_json ($id) {

        $data = $this->activity_model->get_can_vote_list($id);
        if ($data) {
            $response['status'] = true;
            $response['result'] = $data;
        }
        else{
            $response['status'] = false;
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

    // 某項活動內投票列表頁面
    public function activity_can_vote_list ($id) {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');

        $is_open = $this->activity_model->get_vote_is_open($id);

        if ($is_open) {

            $this->load->view('activity/menu');
            $this->load->view('activity/vote_info');
        }
        else{

            redirect(base_url().'activity/vote');
        }

        $this->load->view('templates/footer');
    }

    // 確定投票 json
    public function vote_confirm () {

        $is_vote = $this->activity_model->get_isvoted();

        if ($is_vote) {
            $response['status'] = false;
        }
        else{

            $liked = $this->activity_model->set_vote_confirm();
            ( $liked == true ? $response['status'] = true : $response['status'] = false );
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

    // 所有活動結果
    public function result ()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('activity/menu');

        $this->load->view('activity/result');

        $this->load->view('templates/footer');
    }

    // 某活動投票結果
    public function result_item ($id) {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('activity/menu');

        $this->load->view('activity/result_item');

        $this->load->view('templates/footer');

    }

    // 活動投票結果 json
    public function result_item_info_json ($id) {

        $result = $this->activity_model->get_vote_result_item_json($id);
        $is_end = $this->activity_model->get_vote_is_end($id);

        if ($result && $is_end) {

            $response['status'] = true;
            $response['result'] = $result;
        }
        else{
            $response['status'] = false;
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    // 載入可查看投票結果的競賽 json
    public function vote_result_list () {

        $data = $this->activity_model->get_vote_result();
        if ($data) {
            $response['status'] = true;
            $response['result'] = $data;
        }
        else{
            $response['status'] = false;
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

}
