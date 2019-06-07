<?php

class payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_payment', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $title['judul'] = 'Konakito.com';
        $data['invoice'] = $this->m_payment->get()->result();
        $this->load->view('templates/header', $title);
        $this->load->view('shop/payment', $data);
        $this->load->view('templates/footer');
    }

    public function send()
    {
        $id_invoice = $this->input->post('id_invoice');
        $bank_pengirim = $this->input->post('bank_pengirim');
        $norek_pengirim = $this->input->post('norek_pengirim');
        $nama_pengirim = $this->input->post('nama_pengirim');
        $tanggal_pengirim = $this->input->post('tanggal_pengirim');
        $jumlah_transfer = $this->input->post('jumlah_transfer');
        $bukti_pembayaran = $this->input->post('bukti_pembayaran');

        $data = array(
            'id_invoice' => $id_invoice,
            'bank_pengirim' => $bank_pengirim,
            'norek_pengirim' => $norek_pengirim,
            'nama_pengirim' => $nama_pengirim,
            'tanggal_pengirim' => $tanggal_pengirim,
            'jumlah_transfer' => $jumlah_transfer,
            'bukti_pembayaran' => $bukti_pembayaran
        );

        $this->m_payment->simpan($data, 'pembayaran');
        $this->cart->destroy();
        redirect('Shop/index_shop');



        /*  $this->db->insert('pembayaran', $invoice); */
        /*     $id_invoice = $this->db->insert_id();
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_produk' => $item['id'],
                'nama_produk' => $items['name'],
                'jumlah' => $item['qty'],
                'berat' => $item['berat'],
                'harga' => $item['price'],
            );
            $this->db->insert('pesanan', $data);
        }
        return TRUE;
    }


    public function tampil_data()
    {
        $result = $this->db->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
       
    } */
    }
}
