<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pelanggan_model extends CI_Model
{
    public function get_data_pelanggan()
    {
        $query = $this->db->query("SELECT * FROM tbl_pelanggan");
        return $query->result_array();
    }

    public function add_data($data)
    {
        $this->db->insert('tbl_pelanggan', $data);
        return $this->db->affected_rows();
    }

    public function edit_data($where, $data)
    {
        $this->db->update('tbl_pelanggan', $where, $data);
        return $this->db->affected_rows();
    }
}
