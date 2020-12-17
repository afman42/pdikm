<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jawaban_model extends CI_Model
{
    public function simpan_data($data)
    {
        return $this->db->insert('jawaban_user', $data);
    }
}