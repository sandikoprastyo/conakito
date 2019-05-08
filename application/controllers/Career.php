<?php

class Career extends CI_Controller
{
    public function index_Career()
    {
        $data['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $data);
        $this->load->view('career/vcareer');
        $this->load->view('templates/footer');
    }
}
