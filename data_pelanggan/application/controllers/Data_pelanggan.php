<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model('Data_pelanggan_model');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        // get data pelanggan
        $data['pelanggan'] = $this->Data_pelanggan_model->get_data_pelanggan();
        $this->load->view('data_pelanggan', $data);
    }

    public function tambah()
    {
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');

        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        ];
        $this->Data_pelanggan_model->add_data($data);
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Di Simpan!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('data_pelanggan');
    }


    public function edit($id_pelanggan)
    {
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');

        $data = [
            'nama_pelanggan' => $nama_pelanggan,
            'no_telp' => $no_telp,
            'alamat' => $alamat
        ];

        $where = [
            'id_pelanggan' => $id_pelanggan
        ];
        $this->Data_pelanggan_model->edit_data($data, $where);
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Di Edit!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('data_pelanggan');
    }

    public function hapus($id_pelanggan)
    {
        $where = [
            'id_pelanggan' => $id_pelanggan
        ];
        $this->db->where($where);
        $this->db->delete('tbl_pelanggan');
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Di Hapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('data_pelanggan');
    }
}
