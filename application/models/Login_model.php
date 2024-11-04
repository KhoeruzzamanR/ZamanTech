<?php
defined('BASEPATH') or  exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function check_login($username, $password)
    {
        // Ambil data pengguna berdasarkan username
        $this->db->where('username', $username);
        $user = $this->db->get('log_in')->row_array();
        // Jika pengguna ditemukan dan password benar, kembalikan data pengguna
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false; // Jika username atau password salah
    }
    
    // Insert Data
    public function insert_data($data)
    {
        return $this->db->insert('log_in', $data);
    }
}
