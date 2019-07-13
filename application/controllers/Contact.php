<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_contact');
    }


    public function index_contact()
    {
        $data['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $data);
        $this->load->view('contact/index_contact');
        $this->load->view('templates/footer');
    }


    public function send()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $question = $this->input->post('question');
        $this->M_contact->simpan($nama, $email, $no_tlp, $question);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Thank You For Sending Question</div>');
        redirect('contact/index_contact');
    }
}
