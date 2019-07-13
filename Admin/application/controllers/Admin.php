<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_contact');
    }

    public function index()
    {
        $data['title'] = 'Welcome Admin';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        /*  echo 'Selamat datang admin ', $data['admin']['nama']; */
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/auth_footer');
    }


    public function dataContact()
    {
        $data['title'] = 'Data Contact';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['contact'] = $this->M_contact->getAll()->result();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('admin/contact', $data);
        $this->load->view('templates/auth_footer');
    }


    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_contact->delete($where, 'contact');
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('admin/dataContact');
    }
}
