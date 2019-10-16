<?php
class Admin_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function index() {

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

}
