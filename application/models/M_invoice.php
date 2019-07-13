<?php

class m_invoice extends CI_Model
{
    public function index()
    {
        $invoice = array(

            'nama_pembeli'       => $this->input->post('nama', true),
            'alamat'             => $this->input->post('alamat', true),
            'no_tlp'             => $this->input->post('no_tlp', true),
            'email'              => $this->input->post('email', true),
            'tujuan_provinsi'    => $this->input->post('tujuan', true),
            'kurir'              => $this->input->post('kurir', true),
            'bank_transfer'      => $this->input->post('bank', true),
        );
        $this->db->insert('invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_produk' => $item['id'],
                'nama_produk' => $item['name'],
                'jumlah_produk' => $item['qty'],
                'berat_produk' => $item['berat'],
                'harga_produk' => $item['price'],
            );
            $this->db->insert('pesanan', $data);
        }
        return TRUE;
    }
}
