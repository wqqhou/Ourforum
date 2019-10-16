<?php
class System_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
		$this->load->model('login_model');
    }


	// 判斷使用者是否登入
	public function is_login()
	{
		$session_ts = $this->session->userdata('ts');

		$this->db->select('timestamp');
		$this->db->where('timestamp', $session_ts);
		$this->db->where('active', '1');
		$this->db->where('expire >= ', 'NOW()', false);
		$result = $this->db->get('session');

		if ($result->num_rows() > 0)
		{
			return true;
		}
		else {

			// 如果查不到資料 (沒有登入記錄)，就刪除 session 儲存的資料
			$this->login_model->unset_session();
			return false;
		}

	}

	// 判斷使用者是否登入 *** (僅於登入畫面使用) ***
	public function is_login_form()
	{
		$session_ts = $this->session->userdata('ts');

		$this->db->select('timestamp');
		$this->db->where('timestamp', $session_ts);
		$this->db->where('active', '1');
		$this->db->where('expire >= ', 'NOW()', false);
		$result = $this->db->get('session');

		if ($result->num_rows() > 0)
		{
			return true;
		}
		else {

			return false;
		}

	}


	// 判斷使用者是否登入 app
	public function is_login_mobile()
	{
		// 取得請求的 HEADER 們
		$session_ts = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->input->get_request_header('session', TRUE) : null ;

		$this->db->select('rndcode, timestamp');
		$this->db->where('timestamp', $session_ts);
		$this->db->where('active', '1');
		$this->db->where('expire >= ', 'NOW()', false);
		$result = $this->db->get('session');

		if ($result->num_rows() > 0) {
			return true;
		}
		else {
			$this->login_model->unset_session();
			return false;
		}

	}


}
