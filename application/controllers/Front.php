<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		$this->load->model('system_model');

		$is_login = $this->system_model->is_login();
		if ( $is_login ) {
			redirect(base_url('a'));
		}
    }

    public function index () {

        $this->load->view('templates/header');
		$this->load->view('templates/navbar');
        $this->load->view('front/index');
        $this->load->view('templates/footer');

    }

}
