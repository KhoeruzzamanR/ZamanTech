<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Login_model $Login_model
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Login_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');  // Load helper 'url' di sini
    }

    // Menampilkan form login
    public function login()
    {
        $this->load->view('auth/login_view');
    }

    // Proses login
    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Periksa login melalui model
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT); 
        $user = $this->Login_model->check_login($username, $password);

        if ($user) {
            // Jika login berhasil, simpan data pengguna di session
            $this->session->set_userdata('id', $user['id']);
            $this->session->set_userdata('username', $user['username']);

            // $this->load->view('dashboard');
            redirect('dashboard'); // Redirect ke halaman dashboard atau halaman lain
        } else {
            // Jika login gagal, kembalikan ke form login dengan pesan error
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('auth');
        }
    }
    // Menmapilkan Form Registrasi
    public function regist()
    {
        $this->load->view('auth/regist_view');
    }
    public function submit()
    {
        // Ambil data dari request POST
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $email      = $this->input->post('email');
        // Lakukan validasi jika diperlukan
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/regist_view');
        } else {
            // Hash password sebelum disimpan
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $data = array(
                'username' => $username,
                'email'     => $email,
                'password' => $hashed_password

            );
            if ($this->Login_model->insert_data($data)) {
                header('Content-Type: application/json');
                echo json_encode("Data berhasil diterima! 
					Nama: " . $username .
                    "Email: " . $email .
                    "Password: " . $password);
                // echo "Data Berhasil ditambahkan";
            } else {
                echo "Gagal menyimpan data ke database.";
            }
        }
    }
    // Fungsi untuk logout
    public function logout()
    {
        $this->load->view('logout_view');
        // $this->session->unset_userdata('id');
        // $this->session->unset_userdata('username');
        // redirect('auth');
    }
}
