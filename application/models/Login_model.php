<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function cek_user($username)
    {
        $query = $this->db->query("SELECT * FROM tbl_user WHERE username = '$username'");
        return $query->row();
    }
}
