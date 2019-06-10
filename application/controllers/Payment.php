<?php

class payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_payment', '', TRUE);
        $this->load->model('m_invoice', '', TRUE);
    }

    public function index()
    {
        $title['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $title);
        $this->load->view('shop/payment');
        $this->load->view('templates/footer');
    }

    public function send()
    {
        $bank_pengirim = $this->input->post('bank_pengirim');
        $norek_pengirim = $this->input->post('norek_pengirim');
        $nama_pengirim = $this->input->post('nama_pengirim');
        $tanggal_pengirim = $this->input->post('tanggal_pengirim');
        $jumlah_transfer = $this->input->post('jumlah_transfer');
        $bukti_pembayaran = $this->input->post('bukti_pembayaran');

        $id_invoice = $this->db->insert_id();
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
    }
}
