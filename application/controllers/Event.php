<?php

class Event extends CI_Controller
{
    public function index_event()
    {
        $data['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $data);
        $this->load->view('event/index_event');
        $this->load->view('templates/footer');
    }
}
