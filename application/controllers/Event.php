<?php

class event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_event');
    }

    public function index_event()
    {
        $data['judul'] = 'Konakito.com';
        $data['event'] = $this->M_event->all();
        $this->load->view('templates/header', $data);
        $this->load->view('event/index_event', $data);
        $this->load->view('templates/footer');
    }
}
