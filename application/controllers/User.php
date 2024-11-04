<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property User_model $User_model
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
        $this->load->library('table');
        // $this->load->library('input');
    }
    // HTTP GET

    public function get_data()
    {
        $data = $this->User_model->get_all_data();
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
        $data['users'] = $this->User_model->get_all_data();
        $this->load->view('api/getData', $data);
    }
}
