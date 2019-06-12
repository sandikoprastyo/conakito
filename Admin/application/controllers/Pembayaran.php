<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran');
    }

    public function dataPembayaran()
    {
        $title['title'] = 'Data Pembayaran';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pembayaran'] = $this->M_pembayaran->getpembayaran()->result();
        $this->load->view('templates/auth_header', $title);
        $this->load->view('templates/nav');
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('templates/auth_footer');
    }

    public function hapus($id_pembayaran)
    {
        $where = array('id_pembayaran' => $id_pembayaran);
        $this->M_pembayaran->delete($where, 'pembayaran');
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('pembayaran/dataPembayaran');
    }
}
