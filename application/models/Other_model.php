<?php
class Other_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function index() {

	}

    public function feedback () {

        $data = array(
            'bg_title'    => $this->input->post('title'),
            'bg_who'      => $this->session->userdata('rndcode'),
            'bg_content'  => $this->input->post('content'),
            'bg_type'     => $this->input->post('type'),
            'bg_time' => date("Y-m-d H:i:s")

        );
        $this->db->insert('bug', $data);

        return ($this->db->affected_rows() > 0 ? true : false);
    }

    public function myfeedback () {

        $this->db->where('bg_who', $this->session->userdata('rndcode'))->order_by('bg_id', 'DESC')->limit(5);
        $query = $this->db->get('bug');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return false;
        }

    }

    public function get_problem_info ($id) {

        $this->db->select('firstname, bg_title, bg_content, bg_time, bg_type, bg_reply, bg_reply_ck');
        $this->db->from('bug, member');
        $this->db->where('bg_id', $id);
        $this->db->where('bg_who', $this->session->userdata('rndcode'));
        $this->db->where('bug.bg_who = member.rndcode');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        else{
            return false;
        }
    }

    // 涅商店列表
    public function shop_item () {

        $query = $this->db->get('shop');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else{
            return false;
        }

    }

    // ajax 上傳圖片至 imgur
    public function ajax_upload_imgur () {

        $file       = file_get_contents($_FILES['image']['tmp_name']);
        $ch         = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID '.'d1b1e90e7c1f0e7'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($file)));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $reply      = curl_exec($ch);
        curl_close($ch);
        return json_decode($reply)->data->link;
    }

    // ajax 用圖片網址上傳至 imgur
    public function ajax_url_upload_imgur ($url) {

        $file = file_get_contents($url);
    
        $ch         = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID '.'d1b1e90e7c1f0e7'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($file)));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $reply      = curl_exec($ch);
        curl_close($ch);
        return json_decode($reply)->data->link;
    }
}
