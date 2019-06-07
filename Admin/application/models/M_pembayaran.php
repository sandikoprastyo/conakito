<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pembayaran extends CI_Model
{
    function get()
    {
        return $this->db->get('pembayaran');
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
}
