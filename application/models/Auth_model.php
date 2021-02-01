<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cek_login($username,$password)
    {
        return $this->db->get_where('users',['username' => $username , 'password' => $password]);
    }
    public function login($username,$password)
    {
        return $this->db->get_where('masyarakat',['username' => $username , 'password' => $password]);
    }
}