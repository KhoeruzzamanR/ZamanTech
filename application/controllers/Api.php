<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Api_model $Api_model
 * @property Comment_model $Comment_model
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_Email $email
 * @property CI_Session $session
 */
class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Api_model');
		$this->load->library('table');
		$this->load->library('form_validation', 'email', 'session');
		$this->load->helper('form', 'url');
	}
	public function index()
	{
		$data['title'] = 'Home - ZamanTech';

		// Load header, content, and footer
		$this->load->view('templates/header', $data); // Load header
		$this->load->view('home_view');               // Load main content
		// $this->load->view('templates/footer');        // Load footer
	}
	public function about()
	{
		$data['title'] = 'About Us - ZamanTech';

		// Load header, content, and footer
		$this->load->view('templates/header', $data); // Load header
		$this->load->view('about_view');              // Load about content
		$this->load->view('templates/footer');        // Load footer
	}
	public function contact()
	{
		$data['title'] 			= 'Contact Us - ZamanTech';
		$comment['comments'] 	= $this->Comment_model->get_comments();
		// Load header, content, and footer
		$this->load->view('templates/header', $data); // Load header
		$this->load->view('contact_view', $comment);            // Load contact content
		$this->load->view('templates/footer');        // Load footer
	}
	public function send_comment() 
	{
		// Validasi form
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('comment', 'Komentar', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, kembali ke halaman kontak
            $this->load->view('contact_view');
			$this->index();
		} else {
			// Mengambil data dari form
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$comment = $this->input->post('comment');

			// Menyimpan komentar ke database
			$this->Comment_model->save_comment($name, $email, $comment);

			// Mengirim email
			$this->email->from($email, $name);
			$this->email->to('khoeruzzamen@gmailcom'); // Ganti dengan email tujuan
			$this->email->subject('Komentar dari ' . $name);
			$this->email->message($comment);
			$this->email->send();
 
			// Redirect kembali ke halaman kontak dengan pesan sukses
			$this->session->set_flashdata('message', 'Komentar Anda telah terkirim.');
			redirect('contact');
		}
	}
	// HTTP GET
	public function get_data()
	{
		$data = $this->Api_model->get_all_data();
		$response = array(
			'data' => array()
		);
		foreach ($data as $item) {
			$response['data'][] = array(
				'id' => $item->id,
				'name' => $item->name,
				'email' => $item->email
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	public function get_table()
	{
		$data['users'] = $this->Api_model->data_table();
		$this->load->view('api/getData', $data);
	}
	// HTTP POST
	public function post_data()
	{
		$this->load->view('api/postData.php');
		// code ada di notepad.pw/pweb3_bc
	}
	public function submit()
	{
		// Ambil data dari request POST
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		// Lakukan validasi jika diperlukan
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('api/postData');
		} else {
			$data = array(
				'name' => $name,
				'email' => $email
			);
			if ($this->Api_model->insert_data($data)) {
				header('Content-Type: application/json');
				echo json_encode("Data berhasil diterima! 
					Nama: " . $name . ", Email: " . $email);
				// echo "Data Berhasil ditambahkan";
			} else {
				echo "Gagal menyimpan data ke database.";
			}
		}
	}
	public function put_data($id)
	{
		$data['users'] = $this->Api_model->get_data_by_id($id);
		$this->load->view('api/Update', $data);
	}
	public function update($id)
	{
		$data = $this->input->post();
		var_dump($data);
		if (isset($data['name']) && isset($data['email'])) {
			$update_data = array(
				'name' => $data['name'],
				'email' => $data['email']
			);
			if ($this->Api_model->update_data($id, $update_data)) {
				$response = array(
					"status" => "success",
					"message" => "Data berhasil diperbarui",
					"data" => $update_data // Mengembalikan data yang diperbarui
				);
				header('Content-Type: application/json');
				echo json_encode($response, JSON_PRETTY_PRINT); // Menampilkan JSON dengan format rapi
			} else {
				$response = array(
					"status" => "error",
					"message" => "Gagal memperbarui data"
				);
				header('Content-Type: application/json');
				echo json_encode($response, JSON_PRETTY_PRINT); // Menampilkan JSON dengan format rapi
			}
		} else {
			header('Content-Type: application/json');
			echo json_encode(array("status" => "error", "message" => "Data tidak lengkap"));
		}
	}
	public function update_js($id)
	{
		// Ambil data dari request PUT
		$json_data = file_get_contents('php://input');
		$data = json_decode($json_data, true); // Mengubah JSON menjadi array
		// Debug: tampilkan data yang diterima
		var_dump($json_data); // Lihat data mentah
		var_dump($data); // Lihat array yang diterima
		exit(); // Hentikan eksekusi untuk debug
		// Validasi data yang diterima
		if (isset($data['name']) && isset($data['email'])) {
			// Siapkan data untuk diperbarui
			$update_data = array(
				'name' => $data['name'],
				'email' => $data['email']
			);
			// Debug: tampilkan data yang akan diperbarui
			var_dump($update_data);
			// Panggil model untuk memperbarui data
			if ($this->Api_model->update_data($id, $update_data)) {
				// Data berhasil diperbarui
				echo json_encode(array("status" => "success", "message" => "Data berhasil diperbarui"));
			} else {
				// Gagal memperbarui data
				echo json_encode(array("status" => "error", "message" => "Gagal memperbarui data"));
			}
		} else {
			// Data tidak valid
			echo json_encode(array("status" => "error", "message" => "Data tidak lengkap"));
		}
	}


	public function delete_data($id)
	{
		// Cek apakah ID valid atau tidak
		if ($id === null) {
			echo json_encode(array("status" => "error", "message" => "ID tidak diberikan"));
			return;
		}
		// Memanggil model untuk menghapus data
		if ($this->Api_model->delete_data($id)) {
			echo json_encode(array("status" => "success", "message" => "Data berhasil dihapus"));
		} else {
			echo json_encode(array("status" => "error", "message" => "Gagal menghapus data"));
		}
	}
}
