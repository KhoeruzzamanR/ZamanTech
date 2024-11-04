<?php
defined('BASEPATH') or  exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public function get_all_data()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
    public function data_table()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    // Insert Data
    public function insert_data($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_data($id, $data)
    {
        // Debug: cek query yang akan dijalankan
        $this->db->where('id', $id);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() > 0) {
            return true; // Berhasil diperbarui
        } else {
            return false; // Gagal memperbarui data
        }
    }
    public function get_data_by_id($id)
    {
        $this->db->where('id', $id); // Gantilah 'id' dengan nama kolom ID Anda
        return $this->db->get('users')->row(); // Mengembalikan satu baris data
    }
    public function delete_data($id)
    {
        $this->db->where('id', $id);  // Gantilah 'id' dengan kolom ID yang sesuai di tabel Anda
        return $this->db->delete('users'); // Gantilah 'your_table_name' dengan nama tabel Anda
    }
}  
