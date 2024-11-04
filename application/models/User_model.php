<?php
defined('BASEPATH') or  exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Fungsi untuk mengambil data user berdasarkan username
    public function get_all_data()
    {
        $query = $this->db->get('users');
        return $query->result();
        // return $query->result_array();
    }
    public function insert_data($data)
    {
        return $this->db->insert('users', $data); // Mengembalikan true jika berhasil
    }
    public function update_data($id, $data)
    {
        // Pembaruan data berdasarkan ID
        $this->db->where('id', $id); // Gantilah 'id' dengan nama kolom ID Anda
        if ($this->db->update('users', $data)) {
            return true; // Pembaruan berhasil
        } else {
            return false; // Pembaruan gagal
        }
        return $this->db->update('users', $data); // Gantilah 'your_table_name' dengan nama tabel Anda

    }
    public function get_data_by_id($id)
    {
        $this->db->where('id', $id); // Gantilah 'id' dengan nama kolom ID Anda
        return $this->db->get('users')->row(); // Mengembalikan satu baris data
    }
}
