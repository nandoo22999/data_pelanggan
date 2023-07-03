<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/index');
            $this->session->set_flashdata('salah', 'Username Atau Password Salah');
            // redirect('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->Login_model->cek_user($username);

            if ($cek) {
                $sess_username = $cek->username;
                $this->session->set_userdata('username', $sess_username);
                redirect('data_pelanggan');
            } else {
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('login');
    }
}
