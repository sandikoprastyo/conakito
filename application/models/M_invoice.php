<?php

class m_invoice extends CI_Model
{
    public function index()
    {
        $nama = $this->input->post('nama');
        $address = $this->input->post('alamat');
        $no_tlp = $this->input->post('no_tlp');
        $email = $this->input->post('email');
        $tprovinsi = $this->input->post('tujuan_provinsi');
        $kurir = $this->input->post('kurir');
        $banktf = $this->input->post('bank_transfer');

        $invoice = array(

            'nama_pembeli' => $nama,
            'alamat' => $address,
            'no_tlp' => $no_tlp,
            'email' => $email,
            'tujuan_provinsi' => $tprovinsi,
            'kurir' => $kurir,
            'bank_transfer' => $banktf,
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
            redirect('payment/index');
        }
        return TRUE;
    }
}
