<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_laporan extends CI_Model
{

    public function get_join()
    {
        $this->db->select('pesanan.*, invoice.id_invoice AS id_invoice, invoice.nama_pembeli, invoice.alamat, invoice.no_tlp, invoice.email, invoice.tujuan_provinsi, invoice.kurir, invoice.bank_transfer');
        $this->db->join('invoice', 'pesanan.id_invoice = invoice.id_invoice');
        $this->db->from('pesanan');
        /* return $this->db->limit('DESC', 1)->get()->result(); */
        $this->db->order_by('pesanan.id_pesanan', 'DESC');
        $query = $this->db->limit(1)->get();
        return $query->result();
    }
}
