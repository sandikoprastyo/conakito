<?php
defined('BASEPATH') or exit('No direct script access allowed');

class invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_invoice');
    }

    public function dataInvoice()
    {
        $data['title'] = 'Invoice Pemesanan';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->M_invoice->getAll()->result();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates/auth_footer');
    }

    public function hapus($id_invoice)
    {
        $where = array('id_invoice' => $id_invoice);
        $this->M_invoice->delete($where, 'invoice');
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('invoice/dataInvoice');
    }

    public function detail($id_invoice)
    {
        $data['title'] = 'Detail Invoice';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->M_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->M_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates/auth_header', $data);
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates/auth_footer');
    }

    public function pesanan()
    { }
}
