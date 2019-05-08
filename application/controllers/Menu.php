<?php

class Menu extends CI_Controller
{
    public function index_menu()
    {
        $data['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index_menu');
        $this->load->view('templates/footer');
    }
}
