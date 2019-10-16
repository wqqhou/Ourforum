<?php
class Account_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function index() {

	}

	// 取得我的學校名稱
	public function get_school () {

		$session_timestamp = $this->session->userdata('rndcode');

		$this->db->select('school.*');
		$this->db->from('school');

		$this->db->join('member', 'member.school = school.sc_code');

		$this->db->where('member.rndcode', $session_timestamp);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else {

			return false;
		}
	}


	// 取得使用者資料
	public function get_member_profile() {

		$session_timestamp = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->input->get_request_header('session', TRUE) : $this->session->userdata('ts');

		$this->db->where('session.timestamp', $session_timestamp);
		// $query = $this->db->get('member');

		$this->db->select('member.*, school.sc_name, dept.de_name');
		$this->db->from('session, member, school, dept');

		$this->db->where('active', '1');
		$this->db->where('session.expire >= ', 'NOW()', false);
		$this->db->where('member.school = school.sc_id AND member.department = dept.de_id AND session.rndcode = member.rndcode');

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else {

			return false;
		}

	}


	// 取得朋友資料列表
	public function get_friends()
	{

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$query = $this->db->query('SELECT DISTINCT
			(CASE WHEN friend.invite = "'. $rndcode .'" THEN invitee ELSE invite END) AS friends,
		    (CASE WHEN friend.invite = "'. $rndcode .'" THEN
				(CASE WHEN m1.nameishide = "1" THEN null ELSE m1.firstname END) ELSE
		     	(CASE WHEN m2.nameishide = "1" THEN null ELSE m2.firstname END)  END)  AS firstname,
		   (CASE WHEN friend.invite = "'. $rndcode .'" THEN m1.gender ELSE m2.gender END) AS gender,
		   (CASE WHEN friend.invite = "'. $rndcode .'" THEN m1.nameIsHide ELSE m2.nameIsHide END) AS nameishide,
		   (CASE WHEN friend.invite = "'. $rndcode .'" THEN s1.sc_name ELSE s2.sc_name END) AS school,
		   (CASE WHEN friend.invite = "'. $rndcode .'" THEN d1.de_name ELSE d2.de_name END) AS department,
		   (CASE WHEN friend.invite = "'. $rndcode .'" THEN m1.pic ELSE m2.pic END) AS pic,
		   (SELECT TRUE FROM sms WHERE( receiver = "'. $rndcode .'" AND  sender = (CASE WHEN friend.invite = "'. $rndcode .'" THEN m1.rndcode ELSE m2.rndcode END) )  AND  click = "0" LIMIT 1) AS sms

		FROM
			`friend`

		INNER JOIN member AS m1 ON friend.invitee = m1.rndcode
		INNER JOIN member AS m2 ON friend.invite = m2.rndcode
		INNER JOIN school AS s1 ON m1.school = s1.sc_id
		INNER JOIN school AS s2 ON m2.school = s2.sc_id
		INNER JOIN dept AS d1 ON m1.department = d1.de_id
		INNER JOIN dept AS d2 ON m2.department = d2.de_id

		WHERE  `agree` = "1"
		AND   (
		`friend`.`invite` = "'. $rndcode .'"
		OR `friend`.`invitee` = "'. $rndcode .'" )');

		return ($query->num_rows() > 0) ? $query->result_array() : false;

	}

	// 取得朋友詳細資訊
	public function get_friends_profile($rndcode = NULL) {

		$this->db->where('member.rndcode', $rndcode);

		$this->db->select('member.*, school.sc_name, dept.de_name');
		$this->db->from('member, school, dept');

		$this->db->where('member.online', '0');
		$this->db->where('member.school = school.sc_id AND member.department = dept.de_id');

		$query = $this->db->get();

		return ($query->num_rows() > 0) ? $query->row_array() : false;

	}

	// 確認我、他雙方是否為好友
	public function is_friend($rndcode) {

		$my_rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->group_start();
			$this->db->where('(friend.invite = "'. $my_rndcode .'" AND friend.invitee = "'. $rndcode. '")');
			$this->db->or_where('(friend.invite = "'. $rndcode .'" AND friend.invitee = "'. $my_rndcode. '")');
		$this->db->group_end();

		$this->db->where('agree', '1');

		$query = $this->db->get('friend');

		if ($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	// 取得我發布的文章
	public function get_my_article() {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('art_name, type, time, di_name, di_code, article.id AS id, badge_use, like_count, reply_count, article.updated_at AS updated_at, ( SELECT COUNT(response_temp.id) FROM response_temp WHERE response_temp.articleId = article.id AND response_temp.reply IS NOT NULL ) AS response_count');
		$this->db->group_by('article.id');

		// JOIN 至 discuss 查詢代號為何
		$this->db->join('discuss', 'article.type = discuss.di_numb', 'left');
		$this->db->join('response_temp', 'article.id = response_temp.articleId', 'left');
		
		// author_rndcode 帶入我的 rndcode
		$this->db->where('article.author_rndcode', $rndcode);

		// 過濾已刪除文章 1=已刪除
		$this->db->where('article.art_del', '0');

		$this->db->order_by('article.time', 'DESC');
		$query = $this->db->get('article', 50, $this->input->post('offset'));

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}


	// 取得我參與的文章
	public function get_my_join_article() {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('art_name, type, time, di_name, di_code, article.id AS id, badge_use, like_count, reply_count, article.updated_at AS updated_at, ( SELECT COUNT(response_temp.id) FROM response_temp WHERE response_temp.articleId = article.id AND response_temp.reply IS NOT NULL ) AS response_count');
		$this->db->group_by('article.id');

		// JOIN 至 discuss 查詢代號為何
		$this->db->join('discuss', 'article.type = discuss.di_numb', 'left');
		$this->db->join('response_temp', 'article.id = response_temp.articleId', 'left');
		
		// author_rndcode 帶入我的 rndcode
		$this->db->where('response_temp.author_rndcode', $rndcode);

		// 過濾已刪除文章 1=已刪除
		$this->db->where('article.art_del', '0');

		$this->db->order_by('article.time', 'DESC');

		$query = $this->db->get('article', 50, $this->input->post('offset'));

		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}


	// 取得我的收藏
	public function get_my_archive() {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('art_name, arc_post, gender, di_name, di_code, like_count, reply_count, arc_time, ( SELECT COUNT(response_temp.id) FROM response_temp WHERE response_temp.articleId = article.id AND response_temp.reply IS NOT NULL ) AS response_count');
		$this->db->group_by('article.id');

		// JOIN 至 discuss 查詢代號為何
		$this->db->join('article', 'archive.arc_post = article.id');
		$this->db->join('discuss', 'article.type = discuss.di_numb', 'left');
		$this->db->join('response_temp', 'article.id = response_temp.articleId', 'left');

		// author_rndcode 帶入我的 rndcode
		$this->db->where('archive.arc_rndcode', $rndcode);

		// 過濾已刪除文章 1=已刪除
		$this->db->where('article.art_del', '0');

		$this->db->order_by('archive.arc_time', 'DESC');

		$query = $this->db->get('archive', 50, $this->input->post('offset'));

		return ($query->num_rows() > 0) ? $query->result_array() : false;

	}

	// 取得我的勳章
	public function get_items() {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('sh_id, sh_name, sh_content, sh_img, sh_type');
		$this->db->from('badge, shop');

		$this->db->where('badge.bd_num = shop.sh_id');

		// author_rndcode 帶入我的 rndcode
		$this->db->where('badge.bd_have', $rndcode);

		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;

	}


	//取得我的警告
	public function get_warning() {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('wrn_title, wrn_content, wrn_enc, wrn_solve, wrn_time');
		$this->db->from('wrn');

		// author_rndcode 帶入我的 rndcode
		$this->db->where('wrn_rndcode', $rndcode);

		$this->db->order_by('wrn_time', 'DESC');

		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->result_array() : false;

	}


	// *********************************************************************
	// ** 寫入資料庫區
	// *********************************************************************

	public function save_profile() {

		$data = array(
			'introduction' => $this->input->post('introduction'),
			'specialty' => $this->input->post('specialty'),
			'signature' => $this->input->post('signature'),
			'rece_message' => $this->input->post('receMessage'),
			'inspect' => 0,
		);

		$this->db->where('rndcode', $this->session->userdata('rndcode'));
		$this->db->update('member', $data);

		return TRUE;

	}

	public function save_hide_name() {

		switch ( $this->input->post('is_hide') ) {
			case 'hide':
				$is_hide = 1;
				break;

			case 'unhide':
				$is_hide = 0;
				break;

			default:
				$is_hide = 0;
				break;
		}

		$data = array(
			'nameIsHide' => $is_hide,
		);

		$this->db->where('rndcode', $this->session->userdata('rndcode'));
		$this->db->update('member', $data);

		$result['status'] = TRUE;
		$result['is_hide'] = $is_hide;

		return $result;

	}

	public function save_rece_message () {
		$this->db->select('rece_message');
		$this->db->where('rndcode', $this->session->userdata('rndcode'));
		$query = $this->db->get('member');

		if ($query->row_array()['rece_message'] == 1) {
			$data = array(
				'rece_message' => 0
			);
			$this->db->update('member', $data);
		}
		else {
			$data = array(
				'rece_message' => 1
			);
			$this->db->update('member', $data);
		}
		return;
	}

    // 絕交
    public function remove_friend ($rndcode) {

        $my_rndcode = $this->session->userdata('rndcode');

        $this->db->group_start();
            $this->db->where('(friend.invite = "'. $my_rndcode .'" AND friend.invitee = "'. $rndcode. '")');
            $this->db->or_where('(friend.invite = "'. $rndcode .'" AND friend.invitee = "'. $my_rndcode. '")');
        $this->db->group_end();

        $this->db->where('agree', '1');
		$this->db->delete('friend');

        return ($this->db->affected_rows() == 1 ? true : false);

    }

    // 短帳號
    public function short () {

        $this->db->where('rndcode', $this->session->userdata('rndcode'));
        $this->db->where('d_acc IS NULL');
        $query       = $this->db->get('member');
        $member_info = $query->row_array();


        if ($query->num_rows() > 0 && $member_info['psw'] == sha1($this->input->post('password'))) {

            $this->db->update('member', array('d_acc' => $this->input->post('username')), array('rndcode' => $this->session->userdata('rndcode')));

            // 將 active 設為 0
            $session_data = array('active' => '0',);
            $this->db->where('rndcode', $this->session->userdata('rndcode'));
            $this->db->update('session', $session_data);

            return ($this->db->affected_rows() == 1 ? true : false);

		}
		else {

            return false;

		}
    }

    // 修改密碼
    public function edit_password () {

        $data = array(
            'psw' => sha1($this->input->post('password')),
        );
        $this->db->where('psw', sha1($this->input->post('old_password')));
        $this->db->update('member', $data);

        // 將 active 設為 0
        $session_data = array(
            'active' => '0',
        );
        $this->db->where('rndcode', $this->session->userdata('rndcode'));
        $this->db->update('session', $session_data);

        return ($this->db->affected_rows() == 1 ? true : false);

	}
	
	// 修改電子郵件
    public function edit_email () {

        $data = array(
            'email' => $this->input->post('email'),
        );
		$this->db->where('psw', sha1($this->input->post('password')));
		$this->db->where('rndcode', $this->session->userdata('rndcode'));
        $this->db->update('member', $data);

        return ($this->db->affected_rows() == 1 ? true : false);

    }


	// 取得今日涅友
	public function get_today_friend() {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$query = $this->db->query(
		'SELECT
			member.rndcode, last_seen, gender, constellation, dept.de_name,  school.sc_name, specialty, introduction, signature, pic
		FROM member
		JOIN dept ON member.department = dept.de_id
		JOIN school ON member.school = school.sc_id

		WHERE
			member.rndcode = (
		    	SELECT * FROM (
		            (SELECT rnd_be_add_user AS rndcode FROM rnd_friends WHERE rnd_add_user = "'.$rndcode.'" AND rnd_time = CURRENT_DATE )
		            UNION ALL
		            (SELECT rnd_add_user AS rndcode FROM rnd_friends WHERE rnd_be_add_user = "'.$rndcode.'" AND rnd_time = CURRENT_DATE )
				LIMIT 1 ) a
		    )
		LIMIT 1');

		// 如果查不到資料，就傳回 false (有資格)
		return ($query->num_rows() > 0) ? $query->row_array() : false;

	}


	// 每日涅友
	public function get_selene_friend() {

		$my_rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		do {

			$random = $this->db->query(
			'SELECT rndcode, firstname, gender, stop, status, online, last_seen
			FROM member

			LEFT JOIN (
				SELECT * FROM (
						( SELECT invitee AS friend_rnd FROM friend WHERE ( friend.invite = "' .$my_rndcode. '" ) AND agree = 1 )
					UNION
						( SELECT invite AS friend_rnd FROM friend WHERE ( friend.invitee = "'.$my_rndcode.'" ) AND agree = 1 )
					) a
			) AS friend_list ON friend_list.friend_rnd = rndcode

			WHERE

				rndcode NOT IN (
					SELECT rnd_be_add_user FROM rnd_friends WHERE rnd_time = CURRENT_DATE
				) AND

				friend_list.friend_rnd IS NULL AND

				status = 0 AND stop = 0 AND online = 0 AND wrn = 0 AND gm = 0 AND
				last_seen != CURRENT_DATE AND
				last_seen >= (CURRENT_DATE - INTERVAL 3 DAY) AND rndcode != "'.$my_rndcode.'"

			ORDER BY RAND() LIMIT 1
			');

			// 如果沒有抓取隨機的使用者
			if ( $random->num_rows() !== 1 ) {
				return false;
			}

		} while ( $random->row()->rndcode == $my_rndcode || $this->account_model->is_friend( $random->row()->rndcode ) );


		// 如果沒有抓取隨機的使用者
		if ( $random->num_rows() !== 1 ) {
			return false;
		}

		// 抓到了，將隨機涅友寫入資料庫
		$data = array(
			'rnd_add_user' => $my_rndcode,
			'rnd_be_add_user' => $random->row()->rndcode,
			'rnd_time' => date('Y-m-d'),
			'rnd_his' => date('H:i:s'),
		);

		$this->db->insert('rnd_friends', $data);

		return ($this->db->affected_rows() == 1 ? true : false);

	}

	// 更新最後抽涅友時間
	public function update_last_seen () {

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->set('last_seen', date('Y-m-d') );
		$this->db->where('rndcode', $rndcode );

		$this->db->limit(1);
		$this->db->update('member');

		return ($this->db->affected_rows() == 1 ? true : false);

	}

	// 我有沒有對 今日涅友 送出邀請
	public function is_sent_friend_request() {

		$rndcode		= ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;
		$friend_rndcode	= $this->account_model->get_today_friend()['rndcode'];

		$query = $this->db->query(
			'SELECT * FROM `friend` WHERE
				(
					(`invite` = "'.$rndcode.'" AND `invitee` = "'.$friend_rndcode.'" ) OR
					(`invite` = "'.$friend_rndcode.'" AND `invitee` = "'.$rndcode.'" AND agree = 1)
				)  AND `add_time` = CURRENT_DATE LIMIT 1');

		return ($this->db->affected_rows() == 1) ? true : false;

	}

	// 檢查雙方中無論是誰，有沒有曾經送出邀請
	public function is_ever_sent_friend() {

		$rndcode 		= $this->session->userdata('rndcode');
		$friend_rndcode	= $this->account_model->get_today_friend()['rndcode'];

		$query = $this->db->query(
			'SELECT * FROM `friend` WHERE
				(
					(`invite` = "'.$rndcode.'" AND `invitee` = "'.$friend_rndcode.'" ) OR
					(`invite` = "'.$friend_rndcode.'" AND `invitee` = "'.$rndcode.'" )
				) AND `add_time` = CURRENT_DATE LIMIT 1');

		return ($this->db->affected_rows() == 1) ? true : false;

	}

	// 主動插入朋友 (邀請者)
	public function insert_friend_record() {

		$rndcode 		= $this->session->userdata('rndcode');
		$friend_rndcode	= $this->account_model->get_today_friend()['rndcode'];

		$query = $this->db->query('INSERT friend (invite, invitee, agree, click, add_time) VALUES '.
									'(' . $rndcode . ', '. $friend_rndcode .', 0, 0, CURRENT_DATE);');

		return ($this->db->affected_rows() == 1 ) ? true : false;

	}

	// 被動更新朋友 (被邀請者)
	public function update_friend_record() {

		$rndcode 		= $this->session->userdata('rndcode');
		$friend_rndcode	= $this->account_model->get_today_friend()['rndcode'];

		$query = $this->db->query('UPDATE friend SET agree = 1, click = 0 WHERE '.
									'invitee = '. $rndcode .' AND invite = ' .$friend_rndcode. ' AND add_time = CURRENT_DATE');

		return ($this->db->affected_rows() == 1 ) ? true : false;

	}

	// 傳送好友的第一個訊息
	public function send_first_message() {

		$rndcode 		= $this->session->userdata('rndcode');
		$friend_rndcode	= $this->account_model->get_today_friend()['rndcode'];

		$data = array(
			'sender' => $rndcode,
			'receiver' => $friend_rndcode,
			'content' => $this->input->post('message'),
			'click' => 0,
			'time' => date('Y-m-d'),
			'his' => date('H:i:s'),
		);

		$this->db->insert('sms', $data);

		return ($this->db->affected_rows() == 1 ) ? true : false;

	}

    // 檢舉今日涅友
    public function report_today_friend () {

        $rndcode = $this->session->userdata('rndcode');
    	$friend_rndcode	= $this->account_model->get_today_friend()['rndcode'];

        // 插入檢舉紀錄
        $data = array(
            'rern_rndcode'  => $friend_rndcode,
            'rern_user'     => $rndcode,
            'rern_content'  => $this->input->post('content'),
            'rern_handle'   => '0',
        );
        $this->db->insert('report_rnd', $data);

        return ($this->db->affected_rows() == 1 ) ? true : false;
    }


    // 取得涅友私訊對話
    public function get_talk_sms () {

        $friend	= $this->input->post('friend');
        $user	= $this->session->userdata('rndcode');
        $offset	= $this->input->post('offset');
        $query	= $this->db->query(

            "SELECT sms.id, firstname AS name, content, time AS date, his AS time, 1 as me
			FROM sms
			INNER JOIN member ON member.rndcode = sms.sender
			WHERE
			( sender = '$user' AND receiver = '$friend' )

			UNION

			SELECT sms.id, IF( nameIsHide = 1, IF( gender = 1, '男', '女'), firstname ) AS name, content, time AS date, his AS time, 0 as me
			FROM sms
			INNER JOIN member ON member.rndcode = sms.sender
			WHERE
			( sender = '$friend' AND receiver = '$user' )

			ORDER BY id DESC

			LIMIT $offset, 30

			");


        return ($query->num_rows() > 0) ? $query->result_array() : false;
    }

	// 設定私訊對話為已讀
	public function set_talk_read() {

		$friend	= $this->input->post('friend');
		$user	= $this->session->userdata('rndcode');

		$this->db->set('click', 1);

		$this->db->where('sender', $friend);
		$this->db->where('receiver', $user);

		$this->db->where('click', 0);

		$this->db->update('sms');

		return true;

	}

    public function talk_send () {

        $data = array(
            'sender'    =>  $this->session->userdata('rndcode'),
            'receiver'  =>  $this->input->post('receiver'),
            'content'   =>  $this->input->post('content'),
            'click'     =>  0,
            'time'      =>  date("Y-m-d"),
            'his'       =>  date("H:i:s"),
        );
        $this->db->insert('sms', $data);

        $last_id = $this->db->insert_id();
		if ( $this->db->affected_rows() == 0 || !$last_id ) {
			return false;
		}

		// 寫入訊息後，立刻反查訊息，並傳回前端以顯示
		$this->db->select('"null" AS name, content, time AS date, his AS time, 1 as me', false);
		$this->db->where('id', $last_id);
		$query  = $this->db->get('sms');

        return ($query->num_rows() > 0 ? $query->row_array() : false);

    }

	// 儲存上傳的大頭貼到 s3
	public function save_profile_upload_data ( $uploads = array() ) {

		$this->db->select('member.pic');
		$this->db->from('member');
		$this->db->where('rndcode', $this->session->userdata('rndcode'));
		$query = $this->db->get();

		// 如果沒有找到會員，就返回 false
		if ($query->num_rows() == 0) {
			return false;
		}

		// 移除 s3 上的檔案，因為存的是全部的網址，所以需要先取代只剩下檔名
		$remove_file = str_replace('https://s3.amazonaws.com/static.selene.tw/userimg/', '', $query->row()->pic );
		$this->s3->deleteObject('static.selene.tw', 'userimg/'. $remove_file);

		$upload_path = 'userimg/'. $this->session->userdata('rndcode').$uploads['file_name'];

		// 設定上傳的參數
		$putObject = $this->s3->putObject(S3::inputFile($uploads['full_path']),
				'static.selene.tw',
				$upload_path,
				'public-read',
				array(),
				array(
					'Content-Type' => $uploads['file_type'],
				));

		// 如果上傳失敗 丟回 false
		if ( ! $putObject ) {
			return false;
		}

		// 刪除暫存檔案
		@unlink('./uploads/userimg/'.$uploads['file_name']);

		// 將大頭貼網址存入資料庫，inspect 改為 0
		$data = array(
			'pic' => 'https://s3.amazonaws.com/static.selene.tw/'. $upload_path,
			'inspect' => 0,
		);

		$this->db->where('rndcode', $this->session->userdata('rndcode') );
		$this->db->update('member', $data);

		return ($this->db->affected_rows() == 1 ? true : false);

	}

    // 文章相關通知 (發文、回覆追蹤)
    public function get_notice_article () {

        $user  = $this->session->userdata('rndcode');

        $query = $this->db->query(
        "SELECT
            di_code, tr_post, art_name, tr_id, track.tr_time

        FROM
            track

        INNER JOIN article ON track.tr_post = article.id
        INNER JOIN discuss  ON discuss.di_numb = article.type

        WHERE
            track.tr_who = '$user' AND
            track.tr_time < (SELECT max(reply.reply_time) FROM reply WHERE reply.reply_post = track.tr_post  LIMIT 1)
		ORDER BY track.tr_time DESC");

        return ($query->num_rows() > 0 ? $query->result_array() : false);
    }

    // 個人資料相關通知 (成功加涅友、私訊通知)
    public function get_notice_account () {

        $date  = date("Y-m-d");
        $user  = $this->session->userdata('rndcode');

        $query = $this->db->query(
        "SELECT
            (SELECT TRUE
        FROM
            friend
        WHERE
            (invite = '$user' OR invitee = '$user')
        AND
            ( agree = '1' AND add_time = '$date' )
        LIMIT 1) AS friend,

        (SELECT TRUE
        FROM
            sms
        WHERE receiver = '$user' AND click = '0' AND
			sender IN (
				SELECT IF (friend.invite = '$user', invitee, invite )
		  		FROM
		  			friend

		  		WHERE  agree = '1' AND
				( friend.invite = '$user' OR friend.invitee = '$user' )
			)

		LIMIT 1) as sms LIMIT 1");

        return ($query->num_rows() > 0 ? $query->result_array() : false);

    }

    public function get_notice_check_link ($id) {

        $user  = $this->session->userdata('rndcode');
        $query = $this->db->query(
        "SELECT
            di_code, tr_post

        FROM
            track

        INNER JOIN article ON track.tr_post = article.id
        INNER JOIN discuss  ON discuss.di_numb = article.type

        WHERE
            tr_id = '$id' AND
            tr_time < (SELECT max(reply.reply_time) FROM reply WHERE reply.reply_post = track.tr_post  LIMIT 1)
        ");

        return ($query->num_rows() > 0 ? $query->row_array() : false);
    }

    // 通知訊息設為已讀
    public function set_notice_check ($id = FALSE) {

        $user = $this->session->userdata('rndcode');
        $date = date("Y-m-d H:i:s");

        if ( ! $id ) {
			return false;
        }

		$this->db->set('tr_time', $date );
		$this->db->where('tr_id', $id );
		$this->db->where('tr_who', $user );

		$this->db->update('track');

        return ($this->db->affected_rows() == 1 ? true : false);
    }
}
