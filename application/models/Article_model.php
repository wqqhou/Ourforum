<?php
class Article_model extends CI_Model {

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


	// 從 url 傳遞板名進來，確認真的有這個板名，如果有 就回傳此板的資訊
	public function get_type_name($typeCode = FALSE)
	{

		if ( $typeCode == FALSE) {
			return FALSE;
		}

		$this->db->select('di_id, di_name, di_numb, di_code');
		$this->db->where('di_code', $typeCode);
		$query = $this->db->get('discuss');

		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else {
			return false;
		}

	}


	// 訂閱或取消訂閱板塊
	public function subscribe ()
	{
		$rndcode = $this->account_model->get_member_profile()['rndcode'];
		$id 	 = $this->input->post('id');

		$this->db->where('sub_rndcode', $rndcode);
		$this->db->where('discuss_id', $id);

		$query = $this->db->get('subscribe');

		$isSubScribe = $query->num_rows();

		if ($isSubScribe === 1) {
			$data = array(
				'sub_rndcode' => $rndcode,
				'discuss_id' => $id
			);
			$this->db->delete('subscribe', $data);
			return "0";
		}
		else {
			$data = array(
				'sub_rndcode' => $rndcode,
				'discuss_id' => $id
			);
			$this->db->insert('subscribe', $data);
			return "1";
		}
	}


    // 文章列表
	public function get_list( $typeCode = FALSE )
	{
		$rndcode = $this->account_model->get_member_profile()['rndcode'];
		$id = $this->input->post('id');
		$this->db->select('art_name, author, gender, type, time, article.id AS id, badge_use, like_count, reply_count, article.updated_at AS updated_at, ( SELECT COUNT(response_temp.id) FROM response_temp WHERE response_temp.articleId = article.id AND response_temp.reply IS NOT NULL ) AS response_count, (  SELECT COUNT(sub_rndcode) FROM subscribe WHERE sub_rndcode = "'.$rndcode.'" AND discuss_id = "'.$id.'" ) AS isSubScribe');
		$this->db->group_by('article.id');

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');

		// JOIN 至 discuss 查詢代號為何
		$this->db->join('discuss', 'article.type = discuss.di_numb', 'left');
		$this->db->join('response_temp', 'article.id = response_temp.articleId', 'left');

		// 如果有傳進板名
		if ( $typeCode ) {
			// 直接查詢板名
			$this->db->where('di_code', $typeCode);
		}
		else {
			// 顯示全部，但過濾西斯
			$this->db->where('di_code !=', 'sex');
		}

		$this->db->order_by('article.id', 'DESC');
		$query = $this->db->get('article', 50, $this->input->post('offset'));
		
		return ($query->num_rows() > 0) ? $query->result_array() : false;
	}


	// 取得板塊是否已訂閱
	public function get_subscribe ()
	{
		$rndcode = $this->account_model->get_member_profile()['rndcode'];
		$id = $this->input->post('id');

		$this->db->select('DISTINCT (SELECT COUNT(sub_rndcode) FROM subscribe WHERE sub_rndcode = "'.$rndcode.'" AND discuss_id = "'.$id.'" ) AS isSubScribe');
		$query = $this->db->get('subscribe');
		
		return $query->row_array();
	}


	// 取得公告 (最新一筆)
	public function get_list_ann()
	{
		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count, updated_at');

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');
		$this->db->where('type', '35');

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);

        $query = $this->db->get('article');

		return ($query->num_rows() > 0) ? $query->row_array() : false;
	}


	// 搜尋文章
    public function get_search()
	{
		$keywords = $this->input->post('keywords');
		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count, updated_at');

		// 過濾已刪除文章 1=已刪除
		$this->db->or_like(
			array( 
				'art_name' => $this->input->post('keywords'), 
				'author' => $this->input->post('keywords')
			)
		);
		

		$this->db->group_start();
	        $this->db->where('art_del', '0');
	        $this->db->where('time >=', "NOW() - INTERVAL 3 MONTH", false);
		$this->db->group_end();

		$this->db->order_by("CASE WHEN
		art_name = '".$keywords."' THEN 1
			WHEN art_name LIKE '".$keywords."%' THEN 2
		WHEN art_name LIKE '%".$keywords."' THEN 3
		WHEN art_name LIKE '%".$keywords."%' THEN 4
		END", 'ASC');

        $query = $this->db->get('article');

        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}

	// 列出熱門文章 (條件: 一週內的文章，上限50篇，排序愛心+回應數)
	public function get_hot($typeCode = NULL)
	{

		$this->db->select('art_name, author, gender, type, time, id, badge_use, like_count, reply_count');

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');
		if ($typeCode != NULL) {
			// JOIN 至 discuss 以查詢英文板名
			$this->db->join('discuss', 'article.type = discuss.di_numb');
			$this->db->where('di_code', $typeCode );
		}
		$this->db->where('time >=', "CURRENT_DATE - INTERVAL 7 DAY", false); //TODO: 上線前改回7天
		$this->db->order_by('(like_count + reply_count)', 'DESC', false);

		$query = $this->db->get('article', 50);

        return ($query->num_rows() > 0) ? $query->result_array() : false;
	}


	public function get_article()
	{
		$type		= $this->input->post('type');
		$aid		= $this->input->post('aid');
		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('art_name, article.author_rndcode, author, gender, article.content, signature, type, time, public, id, badge_use, like_count, reply_count, di_code, di_name, '.
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

	// 取得引用該文章的回應
	public function get_article_resp () {
		$aid = $this->input->post('aid');
		
		$this->db->select('response_temp.content, response_temp.reply, member.firstname, member.gender');
		$this->db->from('article');
		$this->db->join('response_temp', 'response_temp.articleId = article.id');
		$this->db->join('member', 'response_temp.author_rndcode = member.rndcode');
		$this->db->where('response_temp.articleId', $aid);
		$this->db->where('reply is NOT NULL', NULL, FALSE);

		$query = $this->db->get();
        return ($query->num_rows() > 0 ? $query->result_array() : false );
	}

	// 查詢文章資訊，以放到 header 裡面， SEO 優化
	public function get_article_for_header($typeCode, $id)
	{

		$this->db->select('art_name, content, public, time, discuss.*');
		$this->db->from('article');

		// 括號開始
		$this->db->group_start();

			// JOIN 至 discuss 以查詢英文板名
			$this->db->join('discuss', 'article.type = discuss.di_numb');
			$this->db->where('di_code', $typeCode );

			$this->db->where('id', $id);

		// 括號結束
		$this->db->group_end();

		// 過濾已刪除文章 1=已刪除
		$this->db->where('art_del', '0');

		$query = $this->db->get();
		return ($query->num_rows() > 0) ? $query->row_array() : false;

	}


	public function get_reply($is_login = false)
	{

		// *************************************************************************
		// 取得一般回應 #1
		// *************************************************************************
		$this->db->select('IF ( reply_del = 0, id, NULL ) AS id, '.
						  'IF ( reply_del = 0, content, NULL ) AS content, '.
						  'IF ( reply_del = 0, reply_gender, NULL ) AS reply_gender, '.
						  'IF ( reply_del = 0, reply_author, NULL ) AS reply_author, '.
						  'reply_time, '.
						  'IF ( reply_del = 0, reply_like_count, NULL ) AS reply_like_count, '.
						  'reply_del, 0 AS hot');

		$this->db->from('reply');

		// 括號開始
		$this->db->group_start();
			$this->db->where('art_reply_type', $this->input->post('reply_type'));
			$this->db->where('reply_post', $this->input->post('reply_aid'));

		// 括號結束
		$this->db->group_end();

		// 如果沒登入，就檢查此文章是否為公開
		if ( !$is_login ) {
			$this->db->where(' (SELECT public FROM article WHERE article.id = '. $this->input->post('reply_aid') .') = ', '1', false);
		}

		$compiled_1 = $this->db->get_compiled_select();



		// *************************************************************************
		// 取得熱門回應 #2
		// *************************************************************************
		$this->db->select('id, content, reply_gender, reply_author, reply_time, reply_like_count, '.
						  'reply_del, 1 AS hot ');

		$this->db->from('reply');


		// 括號開始
		$this->db->group_start();
			$this->db->where('art_reply_type', $this->input->post('reply_type'));
			$this->db->where('reply_post', $this->input->post('reply_aid'));

			$this->db->where('reply_like_count > 5');
			$this->db->where('reply_del', '0');

		// 括號結束
		$this->db->group_end();


		// 如果沒登入，就檢查此文章是否為公開
		if ( !$is_login ) {
			$this->db->where(' (SELECT public FROM article WHERE article.id = '. $this->input->post('reply_aid') .') = ', '1', false);
		}

		$this->db->order_by('reply_like_count', 'DESC');
		$this->db->limit(3);

		$compiled_2 = $this->db->get_compiled_select();


		$query = $this->db->query('( ' .$compiled_2 .' ) UNION ( '. $compiled_1 .' ) LIMIT '. $this->input->post('reply_offset') .', 50;' );
		return $query->result_array();

	}

	// 取得原po是哪幾樓
	public function get_reply_yuanPO($author_rndcode = NULL)
	{

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


	// 取得我按讚的回覆 (反白用)
	public function get_article_liked_reply()
	{

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('reply_likes_replyid AS reply_id');

		$this->db->where('reply_likes_post', $this->input->post('aid'));
		$this->db->where('reply_likes_rndcode', $rndcode );

		$query = $this->db->get('reply_likes');

		return $query->result_array();

	}

	// 取得我的回覆 (反白用)
	public function get_my_reply()
	{

		$rndcode = ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;

		$this->db->select('reply.id AS reply_id');

		$this->db->where('reply_post', $this->input->post('aid'));
		$this->db->where('reply_rndcode', $rndcode );

		$query = $this->db->get('reply');

		return $query->result_array();

	}

	// 文章按讚
	public function like_article() {

		$rndcode	= ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;
		$aid		= $this->input->post('aid');
		$type		= $this->input->post('type');
		$islike		= $this->input->post('islike');

		// 判斷傳進來的是屬於哪種行為  false=尚未按讚「要」按讚； true=已經按讚 要「取消」讚
		switch ( $islike ) {

			//  尚未按讚， 「要」按讚
			case "false":
				$this->db->query('INSERT INTO  likes (likes_rndcode, likes_post, time) '.
									'SELECT * FROM (SELECT  "'. $rndcode .'", '.
											' (SELECT id FROM article WHERE article.id = "'. $aid .'" AND article.type = "'.$type.'" AND article.art_del = 0 ) AS art_exist, CURRENT_TIMESTAMP) AS tmp '.
								'WHERE NOT EXISTS ('.
										'SELECT id FROM likes WHERE likes_rndcode = "'.$rndcode.'" AND likes_post = "'. $aid .'"'.
									') AND art_exist IS NOT NULL LIMIT 1');

				// 檢查有沒有按讚成功，如果有成功
				if ( $this->db->affected_rows() == 1 ) {

					// 在 article 的 like_count +1
					$this->db->set('like_count', 'like_count+1', FALSE);
					$this->db->where('article.id', $aid);
					$this->db->where('article.type', $type);
					$this->db->update('article');

					// 如果 +1 成功
					if ( $this->db->affected_rows() == 1 ) {
						return "liked";
					}
					else {
						return "likedFailed#1";
					}
				}
				else {
					return "likedFailed";
				}


			// 已經按讚， 要「取消」按讚
			case "true":
				$this->db->where('likes_rndcode', $rndcode);
				$this->db->where('likes_post', $aid);

				$query = $this->db->delete('likes');

				// 檢查有沒有取消讚成功，如果有成功
				if ( $this->db->affected_rows() == 1 ) {

					// 到 article 的 like_count -1
					$this->db->set('like_count', 'like_count-1', FALSE);
					$this->db->where('article.id', $aid);
					$this->db->where('article.type', $type);
					$this->db->update('article');

					// 如果 -1 成功
					if ( $this->db->affected_rows() == 1 ) {
						return "unliked";
					}
					else {
						return "unlikeFailed#1";
					}

				}
				else {
					return "unlikeFailed";
				}

			default:
				return "error";
		}

	}

	// 文章加入收藏
	public function archive_article() {

		$rndcode	= ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;
		$aid		= $this->input->post('aid');
		$type		= $this->input->post('type');
		$isarchive	= $this->input->post('isarchive');

		// 判斷傳進來的是屬於哪種行為  false=尚未按收藏「要」加入收藏； true=已經收藏 要「取消」收藏
		switch ( $isarchive ) {

			//  尚未收藏， 「要」加入收藏
			case "false":
				$this->db->query('INSERT INTO  archive (arc_rndcode, arc_post, arc_time)  '.
									'SELECT * FROM (SELECT  "'. $rndcode .'", '.
											' (SELECT id FROM article WHERE article.id = "'. $aid .'" AND article.type = "'.$type.'" AND article.art_del = 0 ) AS art_exist, CURRENT_TIMESTAMP) AS tmp '.
								'WHERE NOT EXISTS ('.
										'SELECT arc_id FROM archive WHERE arc_rndcode = "'.$rndcode.'" AND arc_post = "'. $aid .'"'.
									') AND art_exist IS NOT NULL LIMIT 1');

				// 檢查有沒有加入收藏成功，如果有成功
				if ( $this->db->affected_rows() == 1 ) {
					return "archived";
				}
				else {
					return "archiveFailed";
				}


			// 已經收藏， 要「取消」收藏
			case "true":
				$this->db->where('arc_rndcode', $rndcode);
				$this->db->where('arc_post', $aid);

				$query = $this->db->delete('archive');

				// 檢查有沒有取消收藏成功，如果有成功
				if ( $this->db->affected_rows() == 1 ) {
					return "unarchived";
				}
				else {
					return "unarchiveFailed";
				}

			default:
				return "error";
		}

	}

	// 文章加入收藏
	public function like_reply() {

		$rndcode	= ( $this->input->get_request_header('session', TRUE) !== null  ) ? $this->account_model->get_member_profile()['rndcode'] : $this->session->userdata('rndcode') ;
		$aid		= $this->input->post('aid');
		$type		= $this->input->post('type');
		$replyid	= $this->input->post('replyid');
		$isrlike	= $this->input->post('isrlike');

		// 判斷傳進來的是屬於哪種行為  false=尚未按收藏「要」加入收藏； true=已經收藏 要「取消」收藏
		switch ( $isrlike ) {

			//  尚未收藏， 「要」加入收藏
			case "false":
				$this->db->query('INSERT INTO  reply_likes (reply_likes_rndcode, reply_likes_post, reply_likes_replyid, time) '.
										' SELECT * FROM ( '.
									        'SELECT "'. $rndcode .'", '.
											'(SELECT id FROM article WHERE article.id = "'. $aid .'" AND article.type = "'.$type.'" AND article.art_del = 0 ) AS art_exist, '.
											'(SELECT reply.id FROM reply WHERE reply.id = "'. $replyid .'" AND reply.reply_post = "'. $aid .'" AND reply.reply_del = 0 ) AS reply_exist, '.
											'CURRENT_TIMESTAMP) AS tmp '.
									'WHERE NOT EXISTS ('.
											'SELECT reply_likes.id FROM reply_likes WHERE reply_likes_rndcode = "'. $rndcode .'" AND reply_likes_replyid = "'. $replyid .'"'.
										') AND art_exist IS NOT NULL AND reply_exist IS NOT NULL LIMIT 1;');

				// 檢查有沒有按讚成功，如果有成功
				if ( $this->db->affected_rows() == 1 ) {

					// 到 article 的 like_count -1
					$this->db->set('reply_like_count', 'reply_like_count+1', FALSE);
					$this->db->where('reply.id', $replyid);
					$this->db->where('reply.reply_post', $aid);
					$this->db->update('reply');

					// 如果 +1 成功
					if ( $this->db->affected_rows() == 1 ) {
						return "rliked";
					}
					else {
						return "rlikedFailed#1";
					}
				}
				else {
					return "rlikedFailed";
				}


			// 已經按讚， 要「取消」按讚
			case "true":
				$this->db->where('reply_likes_rndcode', $rndcode);
				$this->db->where('reply_likes_post', $aid);
				$this->db->where('reply_likes_replyid', $replyid);

				$query = $this->db->delete('reply_likes');

				// 檢查有沒有取消讚成功，如果有成功
				if ( $this->db->affected_rows() == 1 ) {

					// 到 article 的 like_count -1
					$this->db->set('reply_like_count', 'reply_like_count-1', FALSE);
					$this->db->where('reply.id', $replyid);
					$this->db->where('reply.reply_post', $aid);
					$this->db->update('reply');

					// 如果 -1 成功
					if ( $this->db->affected_rows() == 1 ) {
						return "unrliked";
					}
					else {
						return "unrlikeFailed#1";
					}

				}
				else {
					return "unrlikeFailed";
				}

			default:
				return "error";
		}

	}

    // 發表文章
    public function newpost () {

		// 取得會員資料
		$member  = $this->account_model->get_member_profile();
		$user    = $this->session->userdata('rndcode');
		$title   = $this->input->post('title');
		$content = $this->input->post('content');
		$refer   = $this->input->post('refer');
		$date    = date("Y-m-d H:i:s");


		// 檢查是否為管理員
		if ( $this->session->userdata('gm') == 1 ) {

			$this->db->where('mg_rndcode', $user );
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

			// 限制無法發文的看板
			$restrict = array(0, 35);

			// 如果板號在以上的限制中，則 return FALSE
			if ( in_array( $this->input->post('type'), $restrict ) ) {
				return FALSE;
			}

			// 使用 newpost 發文時提供的設定
			$author = $member['firstname'];
			$gender = $member['gender'];

		}

		// 文章寫入設定
        $data = array(
			'art_name'       =>     $title,
			'content'        =>     $content,
			'refer'        	 =>     $refer,
            'signature'      =>     ( $this->input->post('sign') == 'true' ) ? $member['signature'] : NULL,
            'author'         =>     $author,
            'gender'         =>     $gender,
            'author_rndcode' =>     $member['rndcode'],
            'type'           =>     $this->input->post('type'),
			'public'         =>     ( $this->input->post('public') == 'true' ) ? 0 : 1,
			'sign' 			 =>		( $this->input->post('sign') == 'true' ) ? 1 : 0,
            'time'           =>     $date,
		);

        $this->db->insert('article', $data);

        // 利用 track.tr_time 比對 article.final_reply 追蹤我發的文是否有新回覆
        $last_id = $this->db->insert_id();

        if ( $this->db->affected_rows() == 0 || !$last_id ) {
			return false;
		}

        // 對此文章插入追蹤紀錄
        $this->db->set('tr_time', $date);
        $this->db->set('tr_post', $last_id);
        $this->db->set('tr_who', $user);
        $this->db->insert('track');

        return ( $this->db->affected_rows() == 1 ) ? true : false;

	}


	// 發表引用
    public function newresponse () {

		// 取得會員資料
		$member  = $this->account_model->get_member_profile();
		$user    = $this->session->userdata('rndcode');
		$reply   = $this->input->post('reply');
		$reason  = $this->input->post('reason');
		$id 	 = $this->input->post('id');

		// 文章寫入設定
        $data = array(
			'reply' => $reply,
			'reason' => $reason
		);

		$this->db->where('id', $id);
		$this->db->where('author_rndcode', $user);
		$this->db->update('response_temp', $data);
		
		if ($this->db->affected_rows() > 0) {

			$this->db->select('article.id AS id, discuss.di_code');
			$this->db->from('response_temp');
			$this->db->where('response_temp.id', $id);
			$this->db->join('article', 'article.id = response_temp.articleId');
			$this->db->join('discuss', 'article.type = discuss.di_numb');

			$result = $this->db->get();
			return $result->row_array();
		}
		else {
			return false;
		}
	}	


	// 引用文章
	public function response () {
		$user   	= $this->session->userdata('rndcode');
		$articleId  = $this->input->post('articleId');
		$content  	= $this->input->post('content');

		$data = array(
			'author_rndcode' => $user,
			'articleId' => $articleId,
			'content' => $content,
		);

		$this->db->insert('response_temp', $data);
		$insert_id = $this->db->insert_id();

		return ( $this->db->affected_rows() == 1 ) ? $insert_id : false;
	}

	// 載入引用回覆文章資料
	public function response_query($id) {

		$rndcode = $this->session->userdata('rndcode');
		
		$this->db->select('re.id AS responseId, re.author_rndcode AS responseUser, re.content AS responseContent, re.reply AS responseReply, article.art_name AS articleTitle, article.author AS articleAuthor, article.like_count AS likeCount');
		$this->db->from('response_temp AS re');
		$this->db->where('re.id', $id);
		$this->db->join('article', 'article.id = re.articleId');

		$query = $this->db->get();

		// echo json_encode($query->result_array());
		return $query->row_array();
	}

    // 回覆文章
    public function article_reply () {

		$member = $this->account_model->get_member_profile();
		$art_id = $this->input->post('art_id');
        $user   = $this->session->userdata('rndcode');
        $time   = date("Y-m-d H:i:s");

		// 檢查是否為管理員
		if ( $this->session->userdata('gm') == 1 ) {

			$this->db->where('mg_rndcode', $user );
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
		// 如果是一般會員

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

	            $author = ($this->input->post('anon') == 'true') ? $member['firstname'] : $member['firstname'];
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
            'reply_anon' => '0',
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
        $this->db->where('tr_who', $user);
        $this->db->update('track');

        // 如果追蹤沒有紀錄就新增 #2
        if ($this->db->affected_rows() == 0) {

            $this->db->set('tr_time', $time);
            $this->db->set('tr_post', $art_id);
            $this->db->set('tr_who', $user);
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

    // 檢舉文章內容
    public function article_report () {

		// 設定查詢語句進行綁定
		// 送出文章檢舉前，先檢查是否有這篇文，以及是否已刪除
		$query = "INSERT INTO
		report (r_report_user, r_report_post, r_reason, r_date, r_handle)
			SELECT * FROM ( SELECT  ?, ?, ?, ?, 0)  as tmp

		WHERE EXISTS (
			SELECT article.id FROM article WHERE article.id = ? AND article.art_del = 0 LIMIT 1
		) AND NOT EXISTS (
			SELECT report.r_id FROM report WHERE r_report_post = ? AND r_report_user = ?
		)";


		// 以綁定的字串送出查詢
		$this->db->query($query,
			array(
				$this->session->userdata('rndcode'),
				$this->input->post('aid'),
				$this->input->post('content'),
				date("Y-m-d H:i:s"),
				$this->input->post('aid'),
				$this->input->post('aid'),
				$this->session->userdata('rndcode'),
			)
		);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

	// 檢舉回應內容
    public function reply_report () {

		// 設定查詢語句進行綁定
		// 送出文章檢舉前，先檢查是否有這篇文，以及是否已刪除
		$query = "INSERT INTO
		report_reply (rp_report_user, rp_report_reply, rp_reason, rp_date, rp_handle)
			SELECT * FROM ( SELECT  ?, ?, ?, ?, 0)  as tmp

		WHERE EXISTS (
			SELECT reply.id FROM reply WHERE reply.id = ? AND reply.reply_del = 0 LIMIT 1
		) AND NOT EXISTS (
			SELECT report_reply.rp_id FROM report_reply WHERE rp_report_reply = ? AND rp_report_user = ?
		)";


		// 以綁定的字串送出查詢
		$this->db->query($query,
			array(
				$this->session->userdata('rndcode'),
				$this->input->post('replyid'),
				'',
				date("Y-m-d H:i:s"),
				$this->input->post('replyid'),
				$this->input->post('replyid'),
				$this->session->userdata('rndcode'),

			)
		);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    // 判斷原po
    public function is_yuan_po ($reply_post) {

        $this->db->where('id', $reply_post);
        $this->db->where('author_rndcode', $this->session->userdata('rndcode') );
        $query = $this->db->get('article');

        return ($query->num_rows() > 0) ? true : false;

    }

    // 編輯文章載入
    public function edit_article_load ($typeCode, $id) {


        $user  = $this->session->userdata('rndcode');
		$rndcode = $this->session->userdata('rndcode');

		$this->db->join('discuss', 'article.type = discuss.di_numb');

		$this->db->group_start();
			$this->db->where('article.id', $id);
			$this->db->where('discuss.di_code', $typeCode);
		$this->db->group_end();

		$this->db->where('article.author_rndcode', $rndcode);
		$this->db->limit(1);

		$query = $this->db->get('article');

        return ($query->num_rows() > 0) ? $query->row_array() : false;
    }

    // 編輯文章功能
    public function article_edit_save () {

        $art_id		= $this->input->post('art_id');
		$title		= $this->input->post('title');
		$content	= $this->input->post('content');
        $public		= ( $this->input->post('public') == 'true' ) ? '0' : '1';
        $rndcode	= $this->session->userdata('rndcode');


		$data = array(
			'art_name'	=> $title,
			'content'	=> $content,
			'public'	=> $public
		);

		$this->db->where('id', $art_id);
		$this->db->where('author_rndcode', $rndcode);

		$this->db->update('article', $data);


        return ($this->db->affected_rows() > 0) ? true : false;

    }

	// 刪除文章
	public function remove_article() {

		$rndcode = $this->session->userdata('rndcode');

		$this->db->set('art_del', 1);

		$this->db->where('author_rndcode', $rndcode );
		$this->db->where('id', $this->input->post('aid') );

		$this->db->update('article');

		if ( $this->db->affected_rows() == 1 ) {
			return true;
		}
		else {
			return false;
		}

	}

	// 刪除回應
	public function remove_reply() {

		$rndcode = $this->session->userdata('rndcode');


		$this->db->set('reply_del', 1);

		$this->db->where('reply_rndcode', $rndcode );
		$this->db->where('id', $this->input->post('replyid') );

		$this->db->update('reply');

		if ( $this->db->affected_rows() == 1 ) {
			return true;
		}
		else {
			return false;
		}

	}

}
