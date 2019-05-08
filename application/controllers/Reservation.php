<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class reservation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_reservation');
    }


    public function index_reservation()
    {
        $data['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $data);
        $this->load->view('reservation/index_reservation');
        $this->load->view('templates/footer');
    }


    public function send()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $jmlh_tamu = $this->input->post('jmlh_tamu');
        $tanggal_booking = $this->input->post('tanggal_booking');
        $time_booking = $this->input->post('time_booking');
        $type_reservation = $this->input->post('type_reservation');
        $req_deskripsi = $this->input->post('req_deskripsi');
        $this->M_reservation->simpan($nama, $email, $no_tlp, $jmlh_tamu, $tanggal_booking, $time_booking, $type_reservation, $req_deskripsi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Thank You For Sending Reservation</div>');
        redirect('reservation/index_reservation');
    }
}
