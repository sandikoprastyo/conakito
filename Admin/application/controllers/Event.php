<?php
defined('BASEPATH') or exit('No direct script access allowed');

class event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_event');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['title'] = 'Welcome Admin';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('admin/event', $data);
        $this->load->view('templates/auth_footer');
    }

    public function dataEvent()
    {
        $data['title'] = 'Data Event';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['event'] = $this->M_event->getAll()->result();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('admin/event', $data);
        $this->load->view('templates/auth_footer');
    }

    public function hapus($id_event)
    {
        $this->M_event->hapusEvent($id_event);
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('event/dataEvent');
    }

    public function simpanEvent()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('des');
        $tanggal = $this->input->post('tgl');
        $foto = $this->input->post('foto');


        $data = array(
            'nama_event' => $nama,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'foto_event' => $foto
        );

        $where = array('id_event' => $id);
        $this->M_event->update($where, $data, 'event');
        $this->session->set_flashdata('flash', 'Diedit!');
        redirect('event/dataEvent');
    }

    public function editEvent($id_event)
    {
        $where = array('id_event' => $id_event);
        $data['event'] = $this->M_event->get($where, 'event')->result();
        $data['title'] = 'Edit Event';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('templates/edit_event', $data);
        $this->load->view('templates/auth_footer');
    }

    public function tambahEvent()
    {
        $data['title'] = 'Tambah Event';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['event'] = $this->M_event->getAll()->result();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/nav');
            $this->load->view('templates/tambah_event', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->M_event->tambahEvent();
            $this->session->set_flashdata('flash', 'Ditambahkan!');
            redirect('event/tambahEvent');
        }
    }
}
