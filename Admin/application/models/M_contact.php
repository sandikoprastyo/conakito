<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_contact extends CI_Model
{
    function getAll()
    {
        return $this->db->get('contact');
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return;
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
