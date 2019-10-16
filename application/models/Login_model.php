<?php
class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('string');
    }


	public function member_login()
	{

		$this->db->select('member.*, school.sc_name, dept.de_name');
		$this->db->from('member');

		$this->db->join('school', 'member.school = school.sc_code');
		$this->db->join('dept', 'member.department = dept.de_id');


		$this->db->group_start();
			$this->db->where('email', $this->input->post('email'));
			$this->db->or_where('d_acc', $this->input->post('email'));
		$this->db->group_end();
		$this->db->where('psw', sha1($this->input->post('password')));


		$this->db->where("status = '0' AND online = '0'");

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{

			// 給使用者一組由 loginTimeStamp 這個 helper 裡面產生的時間戳
			$timestamp = loginTimeStamp($query->row()->rndcode);
			$data = array(
				'rndcode'	=> $query->row()->rndcode,
				'timestamp' => $timestamp,
				'ip' => $_SERVER['REMOTE_ADDR'],
				'user_agent' => $_SERVER['HTTP_USER_AGENT'],
				'time' => date('Y-m-d H:i:s')
			);

			$this->db->set('expire', 'NOW() + INTERVAL 7 DAY', false);
			// $this->db->where('email', $this->input->post('email'));
			$this->db->insert('session', $data);

			$session_data = array(
							   'ts'			=> $timestamp,
							   'gm'			=> $query->row()->gm,
							   'rndcode'	=> $query->row()->rndcode,
							   'school'		=> $query->row()->sc_name,
							   'department'	=> $query->row()->de_name,
							   'name' 		=> $query->row()->firstname
						   );
			$this->session->set_userdata($session_data);

			return true;

		}
		else
		{
			return false;
		}

	}


	// 清除 session
	public function unset_session() {

		$data = array(
					'active'	=> '0',
				);

		$this->db->where('timestamp', $this->session->userdata('ts') );
		$this->db->update('session', $data);

		// $this->session->unset_userdata('ts');
		@$this->session->sess_destroy();

		return true;
	}



	// 手機 app 專用的登入
	public function member_login_mobile()
	{
		$this->db->select('member.*, school.sc_name, dept.de_name');
		$this->db->from('member, school, dept');

		$this->db->group_start();
			$this->db->where('email', $this->input->post('email'));
			$this->db->or_where('d_acc', $this->input->post('email'));
		$this->db->group_end();
		$this->db->where('psw', sha1($this->input->post('password')));

		$this->db->where('member.school = school.sc_id AND member.department = dept.de_id');

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{

			// 給使用者一組由 loginTimeStamp 這個 helper 裡面產生的時間戳
			$timestamp = loginTimeStamp($query->row()->rndcode);
			$data = array(
				'rndcode'	=> $query->row()->rndcode,
				'timestamp' => $timestamp,
				'ip' => $_SERVER['REMOTE_ADDR'],
				'user_agent' => $_SERVER['HTTP_USER_AGENT'],
				'time' => date('Y-m-d H:i:s')
			);

			$this->db->set('expire', 'NOW() + INTERVAL 7 DAY', false);

			// $this->db->where('email', $this->input->post('email'));
			$this->db->insert('session', $data);

			$session_data = array(
							   'ts'			=> $timestamp,
							//    'gm'			=> $query->row()->gm,
							//    'rndcode'	=> $query->row()->rndcode,
							   'school'		=> $query->row()->sc_name,
							   'department'	=> $query->row()->de_name,
						   );

			return $session_data;

		}
		else
		{
			return false;
		}

	}

	// 寫入註冊資料
    public function join_save () {

		// 隨機產生不重覆的 rndcode
		do {

			$rndcode = random_string('numeric', 8);

			$this->db->select('rndcode');
			$this->db->where('rndcode', $rndcode );
			$query = $this->db->get('member');

		} while ( $query->num_rows() > 0 );


        $data = array(
            'email'         =>  $this->input->post('email'),
            'd_acc'         =>  NULL,
            'enable'        =>  random_string('sha1'),
            'psw'           =>  sha1($this->input->post('psw')),
            'firstname'     =>  $this->input->post('firstname'),
            'rndcode'       =>  $rndcode,
            'gender'        =>  $this->input->post('gender'),
			'birthday'      =>  $this->input->post('birthday'),
            'school'        =>  1,
            'department'    =>  1,
            'introduction'  =>  '',
            'specialty'     =>  '',
            'signature'     =>  '',
            'pic'           =>  '',
            'constellation' =>  constellation(substr($this->input->post('birthday'), -5, -3), substr($this->input->post('birthday'), -2)),
            'reg_date'      =>  date("Y-m-d H:i:s"),
            'gm'            =>  '0',
            'status'        =>  '1',
            'stop'          =>  '1',
            'online'        =>  '0',
            'inspect'       =>  '0',
            'wrn'           =>  '0',
            'coin'          =>  '0',
            'nameIsHide'    =>  '0',
        );

        $this->db->insert('member', $data);

		$last_id = $this->db->insert_id();

		// 馬上查出來剛剛插入的資料
		if ( $this->db->affected_rows() == 0 || !$last_id ) {
			return false;
		}

		$this->db->where('id', $last_id );
		$query = $this->db->get('member');

		// 馬上傳回剛剛新增的資料
		return ( $query->num_rows() == 1 ) ? $query->row_array() : false;

    }

    // 判斷學校與校園信箱是否相符
    public function is_match_school_email () {

        $email  = $this->input->post('email');
        $school = $this->input->post('school');

        // 擷取包含＠之後的字串
        $Email_Suffix = substr($email, strpos($email, '@'));

        $this->db->where('sc_code', $school);
        $this->db->where('sc_email', $Email_Suffix);

        $query = $this->db->get('school');

        return ($query->num_rows() == 1) ? true : false;

    }

	// 使用 ID 取得學校資料 (說明、網址等)
	public function get_school_info ($id = FALSE) {

		$this->db->where('sc_code', $id);
		$query = $this->db->get('school');

		return ( $query->num_rows() > 0 ) ? $query->row_array() : false;

	}

	// 將會員 enable (啟用)
	public function set_enable ( $key = NULL ) {

		$this->db->set('status', 0 );
		$this->db->where('enable', $key );
		$this->db->limit(1);

		$this->db->update('member');

		return ( $this->db->affected_rows() > 0 ) ? true : false;

	}

	// 補發認證信 查詢是否符合資格
	public function email_is_exist () {

		$this->db->select('rndcode, email, school, firstname, enable');

		// 未開通
		$this->db->where( 'status', 1 );
		// 未被封鎖
		$this->db->where( 'online', 0 );

		$this->db->where( 'email', $this->input->post('email') );

		$query = $this->db->get('member');

		return ( $query->num_rows() > 0 ) ? $query->row_array() : false;

	}

	// 重設密碼 查詢是否符合資格
	public function member_is_exist () {

		$this->db->select('rndcode, email, school, department, firstname');

		// 已開通 (未開通無法重設)
		$this->db->where( 'status', 0 );
		// 未被封鎖
		$this->db->where( 'online', 0 );

		// 驗證資料是否符合
		$this->db->where( 'school' , $this->input->post('school') );
		$this->db->where( 'department' , $this->input->post('dept') );
		$this->db->where( 'gender' , $this->input->post('gender') );
		$this->db->where( 'email' , $this->input->post('email') );

		$query = $this->db->get('member');

		return ( $query->num_rows() > 0 ) ? $query->row_array() : false;

	}

	// 在 forget_psw 建立一筆資料，準備發送密碼
	public function create_forget_record ( $rndcode = NULL ) {

		if ( $rndcode == NULL ) {
			return false;
		}

		$this->db->set('fp_hd', '1');
		$this->db->where('fp_rndcode', $rndcode );
		$this->db->update('forget_psw');


		$data = array (
			'fp_rndcode'	=> $rndcode,
			'fp_enable'		=> random_string('alnum', 128),
			'fp_hd'			=> 0,
		);

		$this->db->set('fp_expire', 'NOW() + INTERVAL 4 HOUR', false);
		$this->db->insert('forget_psw', $data );

		$last_id = $this->db->insert_id();

		// 馬上查出來剛剛插入的資料
		if ( $this->db->affected_rows() == 0 || !$last_id ) {
			return false;
		}


		$this->db->select('forget_psw.*, member.firstname, member.email');
		$this->db->join('member', 'rndcode = fp_rndcode');
		$this->db->where('fp_id', $last_id );
		$this->db->limit(1);

		$query = $this->db->get('forget_psw');

		// 馬上傳回剛剛新增的資料
		return ( $query->num_rows() == 1 ) ? $query->row_array() : false;

	}


	// 檢查重設密碼 key 是否符合
	public function check_reset_key ( $key = NULL ) {

		if ( $key == NULL ) {
			return false;
		}

		// 金鑰
		$this->db->where('fp_enable', $key );
		// 金鑰未過期
		$this->db->where('fp_expire >=', 'NOW()', false );
		// 而且未處理
		$this->db->where('fp_hd', 0);

		$query = $this->db->get('forget_psw');

		return ( $query->num_rows() == 1 ) ? $query->row_array() : false;

	}

	// 重設密碼
	public function reset_password () {

		// ********************* #1
		// 取得是哪位使用者
		$this->db->select('fp_rndcode');
		$this->db->where('fp_enable', $this->input->post('resetKey') );
		// 金鑰未過期
		$this->db->where('fp_expire >=', 'NOW()', false );
		// 而且未處理
		$this->db->where('fp_hd', 0);

		$member = $this->db->get('forget_psw');

		if ( $member->num_rows() == 0 ) {
			return false;
		}

		// ********************* #2
		// 更新 member 的密碼
		$this->db->set('psw', sha1($this->input->post('newPasswordConfirm')) );
		$this->db->where('rndcode', $member->row()->fp_rndcode );
		$this->db->limit(1);
		$this->db->update('member');

		// #2
		if ( $this->db->affected_rows() == 1 ) {

			// 將此使用者的查詢密碼請求全部設為已處理 1
			$this->db->set('fp_hd', 1 );
			$this->db->where('fp_rndcode', $member->row()->fp_rndcode );
			$this->db->update('forget_psw');

			// 將此使用者全部帳號登出
			$this->db->set('active', 0 );
			$this->db->where('session.rndcode', $member->row()->fp_rndcode );
			$this->db->update('session');

			return true;
		}
		else {
			return false;
		}

	}

}
