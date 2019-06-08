<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_invoice extends CI_Model
{
    function getAll()
    {
        return $this->db->get('invoice');
    }
    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return;
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_pesanan)
    {
        $result = $this->db->where('id_pesanan', $id_pesanan)->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
