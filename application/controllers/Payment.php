<?php

class payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_payment', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $title['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $title);
        $this->load->view('shop/payment');
        $this->load->view('templates/footer');
    }

    public function proses()
    {
        $title['judul'] = 'Konakito.com';
        $this->form_validation->set_rules('bank_pengirim', 'Sending Bank', 'required');
        $this->form_validation->set_rules('norek_pengirim', 'Sender Account Number', 'required|numeric');
        $this->form_validation->set_rules('nama_pengirim', 'Name of the sender', 'required');
        $this->form_validation->set_rules('tanggal_pengirim', 'Sender Date', 'required');
        $this->form_validation->set_rules('jumlah_transfer', 'Transfer Amount');
        $this->form_validation->set_rules('bukti_pembayaran', 'Upload Payment Proof', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $title);
            $this->load->view('shop/payment');
            $this->load->view('templates/footer');
        } else {

            $this->m_payment->index();
            $this->session->set_flashdata('flash', 'Dikirim!');
            $this->cart->destroy();
            redirect('Shop/index_shop');
        }
    }
}
