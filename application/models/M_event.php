<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_event extends CI_Model
{

    public function all()
    {
        $hasil = $this->db->get('event');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }
}
