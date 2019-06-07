<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_event extends CI_Model
{
    function getAll()
    {
        return $this->db->get('event');
    }

    function tambahEvent()
    {
        $data = [
            "nama_event" => $this->input->post('nama', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "tanggal" => $this->input->post('tanggal', true),
            "foto_event" => $this->input->post('foto', true),
        ];
        $this->db->insert('event', $data);
    }

    function get($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapusEvent($id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->delete('event');
    }
}
