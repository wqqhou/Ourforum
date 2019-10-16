<?php
class Activity_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function index() {

	}

    // 可參加之活動列表
    public function get_join_item () {

        $this->db->select('g_id, g_cover, g_name, g_content, g_get, g_extra, g_limit, (SELECT count(gj_id) from god_join where gj_item = g_id) as total');
        $this->db->from('god');
        $this->db->where('g_date <=', date("Y-m-d"));
        $this->db->where('g_join_end >=', date("Y-m-d"));
        $query = $this->db->get();
        return ( $query->num_rows() > 0 ? $query->result_array() : false );
    }

    // 取得我校血量
    public function get_siege_info () {

        $this->db->select('sc_blood');
        $this->db->where('sc_code', $this->account_model->get_member_profile()['school']);
        $query = $this->db->get('school');

        return ($query->num_rows() == 1 ? $query->row_array() : false);
    }

    // 我的攻擊紀錄最近 5 筆紀錄
    public function get_siege_record () {

        // 判斷今天是否攻擊過
        $this->db->where('sg_attacker_user', $this->session->userdata('rndcode'));
        $this->db->where('sg_date', date("Y-m-d"));
        $today_attacked = $this->db->get('siega')->num_rows();

        $this->db->select('sc.sc_name');
        $this->db->where('sg.sg_attacker_user', $this->session->userdata('rndcode'))->where('sc.sc_id = sg.sg_be_attacked');
        $query = $this->db->order_by('sg.sg_id', 'DESC')->limit('5')->get('siega AS sg, school AS sc');

        if ($query->num_rows() > 0) {
            return array(
                'record' => $query->result_array(),
                'attacked' => $today_attacked,
            );
        }
        else{
            return false;
        }
    }

    // 活動詳細資訊
    public function get_join_info ($id) {

        $user = $this->session->userdata('rndcode');

        $this->db->select('g_id, g_cover, g_name, g_content, g_get, g_extra, g_limit, g_date, g_king_start, g_end, (SELECT count(gj_id) FROM god_join WHERE gj_item = g_id) AS total, (SELECT count(gj_id) FROM god_join WHERE gj_item = g_id AND gj_user = '.$user.') AS isjoin');
        $this->db->where('g_id', $id);
        $this->db->where('g_date <=', date("Y-m-d"));
        $this->db->where('g_join_end >=', date("Y-m-d"));
        $query = $this->db->get('god');

        return ($query->num_rows() == 1 ? $query->row_array() : false);
    }

    // 攻城戰發動攻擊
    public function siege_attack () {

        // 攻擊者 rndcode
        $attack_user = $this->session->userdata('rndcode');

        // 判斷今天是否攻擊過
        $this->db->where('sg_attacker_user', $attack_user);
        $this->db->where('sg_date', date("Y-m-d"));
        $today_attacked = $this->db->get('siega')->num_rows();

        // 判斷是否有此學校代碼
        $this->db->where('sc_code', $this->input->post('school_id'));
        $is_school = $this->db->get('school');

        if ($this->account_model->get_member_profile()['school'] != $this->input->post('school_id') && $is_school->num_rows() == 1 && $is_school->row_array()['sc_blood'] > 0 && $today_attacked == 0) {

            $data = array(
                'sg_attacker' => $this->account_model->get_member_profile()['school'],
                'sg_be_attacked' => $this->input->post('school_id'),
                'sg_attacker_user' => $attack_user,
                'sg_date' => date("Y-m-d"),
                'sg_time' => date("H:i:s")
            );

            $query = $this->db->insert('siega', $data);

            // 被攻擊該校扣血 1 滴
            $this->db->set('sc_blood', 'sc_blood-1', FALSE);
            $this->db->where('sc_code', $this->input->post('school_id'));
            $this->db->update('school');

            return ($this->db->affected_rows() == 1 ? true : false);
        }
        else{

            return false;
        }
    }

    // 確定參與活動
    public function set_activity_join () {

        $username = $this->session->userdata('rndcode');
        $item     = $this->input->post('join_info_item');

        // 取得參加者順序、判斷是否已參加
        $query  = $this->db->query("SELECT *, (SELECT count(gj_id) FROM god_join WHERE gj_item = '".$item."') as join_counts, (SELECT count(gj_id) FROM god_join WHERE gj_item = '".$item."' AND gj_user = '".$username."') as joined FROM god_join");
        $result = $query->row_array();
        $join_counts = ($result['join_counts'] == null ? '1' : $result['join_counts']+1);

        if ($result['joined'] == 0) {
            $data = array(
                'gj_user' => $username,
                'gj_item' => $this->input->post('join_info_item'),
                'gj_msname' => $this->input->post('join_info_topic'),
                'gj_nickname' => $this->input->post('join_info_name'),
                'gj_order' => $join_counts,
                'gj_url' => $this->input->post('join_info_works'),
            );

            $this->db->insert('god_join', $data);
            return ($this->db->affected_rows() > 0 ? true : false);
        }
        else{
            return false;
        }
    }

    // 列出可投票競賽列表
    public function get_can_vote_activity () {

        $this->db->select('g_id, g_cover, g_name');
        $this->db->where('g_king_start <=', date("Y-m-d"));
        $this->db->where('g_end >=', date("Y-m-d"));
        $query = $this->db->get('god');

        return ($query->num_rows() > 0 ? $query->result_array() : false);
    }

    // 取得某項活動內可投票列表
    public function get_can_vote_list ($id) {

        $user  = $this->session->userdata('rndcode');
        $query = $this->db->query("SELECT gj_item, gj_msname, gj_nickname, gj_order, gj_url, (SELECT COUNT(gl_id) FROM god_like WHERE gl_item = '$id' AND gl_user = '$user') AS is_vote FROM god_join AS gj, god AS g WHERE gj.gj_item = '$id' AND g.g_id = gj.gj_item");

        return ($query->num_rows() > 0 ? $query->result_array() : false);
    }

    // 判斷某競賽投票是否已開始
    public function get_vote_is_open ($id) {

        $date  = date("Y-m-d");
        $this->db->where('g_id', $id);
        $this->db->where('g_king_start <=', $date);
        $this->db->where('g_end >=', $date);
        $query = $this->db->get('god');

        return ($query->num_rows() == 1 ? true : false);
    }

    // 判斷是否投過票及未開放投票
    public function get_isvoted () {

        $date  = date("Y-m-d");
        $item  = $this->input->post('item');
        $user  = $this->session->userdata('rndcode');

        $query = $this->db->query("SELECT g.g_id FROM god AS g, god_like AS gl WHERE g.g_id = '$item' AND g.g_king_start <= '$date' AND g.g_end >= '$date' AND gl.gl_item = '$item' AND gl.gl_user = '$user'");

        return ( $query->num_rows() == 1 ? true : false );
    }

    // 確定投票
    public function set_vote_confirm () {

        $this->db->where('gj_item', $this->input->post('item'));
        $this->db->where('gj_order', $this->input->post('id'));
        $is_contestant = $this->db->get('god_join')->num_rows();

        if ($is_contestant == 1) {

            $data = array(
                'gl_user' => $this->session->userdata('rndcode'),
                'gl_item' => $this->input->post('item'),
                'gl_itemuser' => $this->input->post('id'),
            );

            $this->db->insert('god_like', $data);

        }
        return ( $this->db->affected_rows() == 1 ? true : false );
    }

    // 所有投票結果列表 json
    public function get_vote_result () {

        $date  = date("Y-m-d");
        $this->db->where('g_end <', $date);
        $query = $this->db->get('god');
        return ( $query->num_rows() > 0 ? $query->result_array() : false );
    }

    // 投票結果單篇項目 json
    public function get_vote_result_item_json ($id) {

        $date  = date("Y-m-d");
        $query = $this->db->query(
        "SELECT *, (SELECT COUNT(gl_id)
            FROM
                god_like
            WHERE
                gl_item = gj_item AND gl_itemuser = gj_order) AS all_vote
            FROM
                god_join
            WHERE
                gj_item = '$id'
            ORDER BY
                all_vote
            DESC LIMIT 3
        ");
        return ( $query->num_rows() > 0 ? $query->result_array() : false );
    }

    // 取得活動是否已經結束
    public function get_vote_is_end ($id) {

        $date  = date("Y-m-d");
        $this->db->where('g_id', $id);
        $this->db->where('g_end <', $date);
        $query = $this->db->get('god');
        return ( $query->num_rows() > 0 ? true : false );
    }

}
