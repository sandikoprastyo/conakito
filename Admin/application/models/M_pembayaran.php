<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pembayaran extends CI_Model
{
    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return;
    }

    public function getAll()
    {
        return $this->db->get('pembayaran');
    }

    public function getpembayaran()
    {
        return $this->db->get('pembayaran');
    }

    public function ambil_id_pembayaran($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('pembayaran');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
