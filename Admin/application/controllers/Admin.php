<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_reservation');
    }

    public function index()
    {
        $data['title'] = 'Welcome Admin';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        /*  echo 'Selamat datang admin ', $data['admin']['nama']; */
        $this->load->view('templates/auth_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/auth_footer');
    }


    public function dataReservation()
    {
        $data['title'] = 'Data Reservation';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['reservation'] = $this->M_reservation->getAll()->result();
        /*  echo 'Selamat datang admin ', $data['admin']['nama']; */
        $this->load->view('templates/auth_header', $data);
        $this->load->view('admin/reservation', $data);
        $this->load->view('templates/auth_footer');
    }


    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_reservation->delete($where, 'reservation');
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('admin/dataReservation');
    }



    public function edit($id)
    {
        $where = array('id' => $id);
        $data['reservation'] = $this->M_reservation->edit_data($where, 'reservation')->result();
        $this->load->view('v_edit', $data);
    }
}
