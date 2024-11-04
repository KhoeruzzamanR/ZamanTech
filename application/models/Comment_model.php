<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menyimpan komentar ke dalam database
    public function save_comment($name, $email, $comment) {
        $data = [
            'name' => $name,
            'email' => $email,
            'comment' => $comment,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('comments', $data);
    }

    // Mengambil komentar yang sudah ada di database
    public function get_comments() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('comments' )->result();
    }
}
