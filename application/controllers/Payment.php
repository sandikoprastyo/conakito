<?php

class payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_payment', '', TRUE);
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
        $is_proses = $this->m_payment->index();
        $title['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $title);
        $this->load->view('shop/payment');
        $this->load->view('templates/footer');
    }
}
