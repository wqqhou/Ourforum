<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {

    public function __construct() {

        parent::__construct();

		$this->load->model('login_model');
		$this->load->model('system_model');
        $this->load->model('account_model');
        $this->load->model('other_model');

        // import custom helper library
        $this->load->helper('security');

        // import form, form_validation helper for post
        $this->load->helper('form');
        $this->load->library('form_validation');

		$is_login = $this->system_model->is_login();
		if ( !$is_login ) {
			redirect(base_url('login'));
		}
    }

    public function index () {

    }

    // 涅商店
    public function shop () {

        $data['shop_item'] = $this->other_model->shop_item();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('other/menu');
        $this->load->view('other/shop', $data);
        $this->load->view('templates/footer');
    }

    // 新手教學
    public function teach () {
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('other/menu');
        $this->load->view('other/teach');
        $this->load->view('templates/footer');
    }

    // 回報問題
    public function problem () {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('other/menu');
        $this->load->view('other/problem');
        $this->load->view('templates/footer');
    }

    // 列出曾提報的BUG
    public function myfeedback_item () {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url('other/problem'));
		}

        $result = $this->other_model->myfeedback();

        if ($result) {
            $response['status'] = true;
            $response['result'] = $result;
        }
        else{
            $response['status'] = false;
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

    // 提報BUG
    public function feedback () {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url('other/problem'));
		}

        $this->form_validation->set_rules('title', '問題', 'required|max_length[30]|min_length[1]|strip_tags|xss_clean', array('required' => '請填寫標題', 'max_length' => '標題最多 30 個字', 'min_length' => '標題最少 1 個字'));
        $this->form_validation->set_rules('content', '描述問題', 'required|max_length[3000]|min_length[1]|strip_tags|xss_clean', array('required' => '請詳細描述問題', 'max_length' => '描述最多 3000 個字', 'min_length' => '描述最少 1 個字'));

        if ($this->form_validation->run() === TRUE) {

            $result = $this->other_model->feedback();

            if ($result) {

                $response['status'] = true;

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

    // 曾提出的BUG詳細資訊
    public function problem_view () {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('other/menu');
        $this->load->view('other/problem_view');
        $this->load->view('templates/footer');
    }

    // 曾提出的BUG詳細資訊 json
    public function problem_view_json ($id) {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url('other/problem'));
		}

        $result = $this->other_model->get_problem_info($id);

        if ($result) {
            $response['status'] = true;
            $response['result'] = $result;
        }
        else{
            $response['status'] = false;
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

    // 使用 ajax 上傳圖片
    public function ajax_upload_imgur() {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url('a'));
		}

        $result = $this->other_model->ajax_upload_imgur();

        if ($result) {
            $response = [
                "success" => 1,
                "file" => [
                    "url" => $result
                ]
            ];

		}
		else {
			$response = [
                "success" => 0
            ];
		}

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    // 使用 ajax 用圖片網址上傳圖片
    public function ajax_url_upload_imgur() {

        // 檢查是否為 AJAX 請求，以防止直接從瀏覽器輸入網址進入
		if ( !$this->input->is_ajax_request() ) {
			redirect(base_url('a'));
		}
        
        $data = json_decode(file_get_contents('php://input'));

        $result = $this->other_model->ajax_url_upload_imgur($data->url);

        if ($result) {
            $response = [
                "success" => 1,
                "file" => [
                    "url" => $result
                ]
            ];
		}
		else {
			$response = [
                "success" => 0
            ];
		}

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}
