<?php
class Mobile_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model('account_model');
    }

	public function get_type_list()
	{
		$this->db->select('di_numb, di_code, di_sch, di_name');
		$query = $this->db->get('discuss');

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else {
			return false;
		}
	}


	public function get_type_name()
	{

		$this->db->select('di_name, di_numb, di_code');
		$this->db->where('di_code', $this->uri->segment(2, 0));
		$query = $this->db->get('discuss');

		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else {
			return false;
		}

	}

	public function get_list()
	{

		// TODO: 直接丟回板名中文名稱

		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count');

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');

		$this->db->order_by('id', 'DESC');
        $query = $this->db->get('article', 20, $this->input->post('offset'));

		// TODO: 判斷有無文章
		return $query->result_array();

	}

	// 搜尋文章
    public function get_search()
	{

		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count');

		// 過濾已刪除文章 1=已刪除
		$this->db->like('art_name', $this->input->post('keywords'));
        $this->db->where('art_del', '0');
        $this->db->where('time >=', "NOW() - INTERVAL 3 MONTH", false);

		$this->db->order_by('id', 'DESC');

        $query = $this->db->get('article');

        if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else {

			return false;
		}

	}

	// 列出熱門文章 (條件: 一週內的文章，上限50篇，排序愛心數)
	public function get_hot($type = NULL)
	{

		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count');

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');
		if ($type != NULL) {
			$this->db->where('type', $type);
		}
		$this->db->where('time >=', "CURRENT_DATE - INTERVAL 7 DAY", false); //TODO: 上線前改回7天
		$this->db->order_by('like_count', 'DESC');

		$query = $this->db->get('article', 50);

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else {

			return false;
		}

	}


	public function get_list_by_type($type = FALSE)
	{

		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count');

		// 多一個板名
		$this->db->where('type', $type);

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');

		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('article', 20,  $this->input->post('offset'));
		return $query->result_array();

	}


	public function get_article()
	{
		$type		= $this->input->post('type');
		$aid		= $this->input->post('aid');
		$rndcode	= $this->session->userdata('rndcode');

		$this->db->select('art_name, author_rndcode, author, gender, content, signature, type, time, public, id, badge_use, like_count, reply_count, di_code, di_name, '.
							'(SELECT true FROM `archive` WHERE `arc_post` = "'.$aid.'" AND `arc_rndcode` = "'.$rndcode.'" LIMIT 1  ) as isarchive,'.
							'(SELECT true FROM `likes` WHERE `likes_post` = "'.$aid.'" AND `likes_rndcode` = "'.$rndcode.'" LIMIT 1 ) as islike, '.
							'(SELECT true FROM `article` WHERE `article`.`id` = "'.$aid.'" AND `author_rndcode` = "'.$rndcode.'" LIMIT 1 ) as ismypost');
		$this->db->from('article, discuss');

		// 括號開始
		$this->db->group_start();
			$this->db->where('type', $type );
			$this->db->where('id', $aid );

		// 括號結束
		$this->db->group_end();

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');
		$this->db->where('article.type = discuss.di_numb');

		$query = $this->db->get();
        return ($query->num_rows() > 0 ? $query->row_array() : false );

	}

	public function get_article_for_header($type, $id)
	{

		$this->db->select('art_name, content, public, time');
		$this->db->from('article');

		// 括號開始
		$this->db->group_start();
			$this->db->where('type', $type);
			$this->db->where('id', $id);

		// 括號結束
		$this->db->group_end();

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');

		$query = $this->db->get();
		return $query->row_array();

	}


	public function get_reply()
	{

		$this->db->select('IF ( reply_del = 0, id, NULL ) AS id, '.
						  'IF ( reply_del = 0, content, NULL ) AS content, '.
						  'IF ( reply_del = 0, reply_gender, NULL ) AS reply_gender, '.
						  'IF ( reply_del = 0, reply_author, NULL ) AS reply_author, '.
						  'reply_time, '.
						  'IF ( reply_del = 0, reply_like_count, NULL ) AS reply_like_count, '.
						  'reply_del');

		// 括號開始
		$this->db->group_start();
			$this->db->where('art_reply_type', $this->input->post('reply_type'));
			$this->db->where('reply_post', $this->input->post('reply_aid'));

		// 括號結束
		$this->db->group_end();

		$query = $this->db->get('reply', 20,  $this->input->post('reply_offset'));
		return $query->result_array();

	}

	public function get_reply_yuanPO($author_rndcode = NULL)
	{
		// SELECT * FROM `reply` WHERE `art_reply_type` = '7' AND `reply_post` = '6599' AND `reply_rndcode` = '19595332'

		$this->db->select('reply.id AS reply_id');

		// 括號開始
		$this->db->group_start();
			$this->db->where('art_reply_type', $this->input->post('type'));
			$this->db->where('reply_post', $this->input->post('aid'));

		// 括號結束
		$this->db->group_end();

		$this->db->where('reply_rndcode', $author_rndcode);
		$query = $this->db->get('reply');

		return $query->result_array();

	}

	// 取得文章是否「按讚」(like)
	public function get_article_is_like() {

		// 假如有結果 (已按喜歡) ，會傳回 is_like 這個欄位，而且值是 true
		$this->db->select('"TRUE" AS is_like');

		$this->db->where('likes_post', $this->input->post('aid'));
		$this->db->where('likes_rndcode', $this->session->userdata('rndcode'));

		$query = $this->db->get('likes', 1);

		// 如果有查到記錄，傳回 true
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else {
			return false;
		}
	}

	// 取得我按讚的回覆 (反白用)
	public function get_article_liked_reply()
	{
		$this->db->select('reply_likes_replyid AS reply_id');

		$this->db->where('reply_likes_post', $this->input->post('aid'));
		$this->db->where('reply_likes_rndcode', $this->session->userdata('rndcode'));

		$query = $this->db->get('reply_likes');

		return $query->result_array();

	}

	// 取得文章是否「收藏」(archive)
	public function get_article_is_archive() {

		// 假如有結果 (已按喜歡) ，會傳回 is_like 這個欄位，而且值是 true
		$this->db->select('"TRUE" AS is_archive');

		$this->db->where('arc_post', $this->input->post('aid'));
		$this->db->where('arc_rndcode', $this->session->userdata('rndcode'));

		$query = $this->db->get('archive', 1);

		// 如果有查到記錄，傳回 true
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else {
			return false;
		}

	}


    public function newpost () {

        // 發文者個人資料
        $member = $this->account_model->get_member_profile();

        $data = array(
			'art_name' => $this->input->post('title'),
			'content' => $this->input->post('content'),
            'signature' => ( $this->input->post('anonymous') == 'true' ) ? NULL : $member['signature'],
            'author' => ( $this->input->post('anonymous') == 'true' ) ? '匿名' : $member['sc_name'].' '.$member['de_name'].'系',
            'gender' => $member['gender'],
            'author_rndcode' => $member['rndcode'],
            'type' => $this->input->post('type'),
            'public' => ( $this->input->post('public') == 'true' ) ? '0' : '1',
		);

        $this->db->insert('article', $data);

		return TRUE;

	}

	// 回覆文章
    public function article_reply () {

		$member = $this->account_model->get_member_profile();

		$art_id = $this->input->post('art_id');
        $time   = date("Y-m-d H:i:s");

		// 檢查是否為管理員
		if ( $member['gm']  == 1 ) {

			$this->db->where('mg_rndcode', $member['rndcode'] );
			$this->db->limit(1);

			$query = $this->db->get('manager');

			// gm = 1 但查不到管理員的資料
			if ( $query->num_rows() == 0 ) {
				return false;
			}

			// 使用管理員的名稱及性別9
			$author = $query->row()->nickname;
			$gender = 9;

		}
		else {
		// 如果不是管理員 (一般會員)

			$is_yuan_po = $this->article_model->is_yuan_po( $this->input->post('art_id') );

			//檢查是不是原 PO
			if ( $is_yuan_po ) {

	            $this->db->where('id', $this->input->post('art_id'));
	            $yuan_po_info = $this->db->get('article');

	            $author = $yuan_po_info->row()->author;
				$gender = $member['gender'];

	        }
	        else {
			// 不是原PO

	            $author = ($this->input->post('anon') == 'true') ? $member['sc_name'] : $member['sc_name'].' '.$member['de_name'].'系';
				$gender = $member['gender'];
	        }

		}

		// 設定回應寫入資料
        $data = array(
            'reply_post' => $this->input->post('art_id'),
            'reply_rndcode' => $member['rndcode'],
            'reply_author' => $author,
            'reply_gender' => $gender,
            'content' => $this->input->post('content'),
            'art_reply_type' => $this->input->post('art_type'),
            're_check' => '0',
            'reply_like_count' => '0',
            'reply_del' => '0',
            'reply_anon' => ( $this->input->post('anon') == 'true' ) ? '1' : '0',
            'reply_time' => $time,
        );
		// 插入回覆文章#1
        $query = $this->db->insert('reply', $data);

        // 取得上次插入回覆的 id #1
        $last_id = $this->db->insert_id();

		// 如果 插入回覆文章#1 沒有結果，或是無法取得最後插入的 ID，就直接傳回 false
		if ( $this->db->affected_rows() == 0 || !$last_id ) {
			return false;
		}

		// 追蹤記錄#2
        // 如果沒有追蹤紀錄就新增，否則就更新 track 表的 tr_time 做為日後判斷依據
        $this->db->set('tr_time', $time);
        $this->db->where('tr_post', $art_id);
        $this->db->where('tr_who', $member['rndcode'] );
        $this->db->update('track');

        // 如果追蹤沒有紀錄就新增 #2
        if ($this->db->affected_rows() == 0) {

            $this->db->set('tr_time', $time);
            $this->db->set('tr_post', $art_id);
            $this->db->set('tr_who', $member['rndcode'] );
            $this->db->insert('track');
        }

        // 如果成功回覆，回覆數 +1  #3
        $this->db->set('reply_count', 'reply_count+1', false);
		$this->db->where('article.id', $this->input->post('art_id') );
		$this->db->update('article');

		// 如果有 +1 成功 #3
		if ( $this->db->affected_rows() == 0 ) {
			return false;
		}

		// 丟出剛剛的回覆 #4
		$this->db->select('IF ( reply_del = 0, id, NULL ) AS id, '.
						  'IF ( reply_del = 0, content, NULL ) AS content, '.
						  'IF ( reply_del = 0, reply_gender, NULL ) AS reply_gender, '.
						  'IF ( reply_del = 0, reply_author, NULL ) AS reply_author, '.
						  'reply_time, '.
						  'IF ( reply_del = 0, reply_like_count, NULL ) AS reply_like_count, '.
						  'reply_del');

		$this->db->from('reply');
		$this->db->where('id', $last_id );
		$this->db->limit(1);
		$query = $this->db->get();

		return ($query->num_rows() > 0) ? $query->row_array() : false ;

    }

    // 判斷原po
    public function is_yuan_po ($reply_post) {

        $this->db->where('id', $reply_post);
        $this->db->where('author_rndcode', $this->session->userdata('rndcode') );
        $query = $this->db->get('article');

        return ($query->num_rows() > 0) ? true : false;

    }

}
