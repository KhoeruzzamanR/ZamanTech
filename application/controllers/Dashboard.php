<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property Login_model $Login_model
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 */
class Dashboard extends CI_Controller
{
    // public function __construct() {
    //     parent::__construct();
    //     $this->load->library('session');
    //     // Mengecek apakah user sudah login, jika belum redirect ke halaman login
    //     if (!$this->session->userdata('id')) {
    //         redirect('auth'); // Redirect ke halaman login jika belum login
    //     }
    // }
    public function index()
    {
        // Tampilkan halaman dashboard
        $data['title'] = 'Dashboard - My Website';
        $this->load->view('page/templates/header', $data);
        $this->load->view('page/dashboard');
        $this->load->view('page/templates/footer');
    }
}
