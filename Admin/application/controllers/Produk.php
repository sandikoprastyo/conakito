<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->library('form_validation');
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

    public function dataProduk()
    {
        $data['title'] = 'Data Produk';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->M_produk->getAll()->result();
        /*  echo 'Selamat datang admin ', $data['admin']['nama']; */
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('admin/produk', $data);
        $this->load->view('templates/auth_footer');
    }

    public function hapus($id_produk)
    {
        $this->M_produk->hapusProduk($id_produk);
        $this->session->set_flashdata('flash', 'Dihapus!');
        redirect('produk/dataProduk');
    }

    public function simpanProduk()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $berat = $this->input->post('berat');
        $harga = $this->input->post('harga');
        $foto = $this->input->post('foto');


        $data = array(
            'nama_produk' => $nama,
            'berat_produk' => $berat,
            'harga_produk' => $harga,
            'foto_produk' => $foto
        );

        $where = array('id_produk' => $id);
        $this->M_produk->update($where, $data, 'produk');
        $this->session->set_flashdata('flash', 'Diedit!');
        redirect('produk/dataProduk');
    }

    public function editProduk($id_produk)
    {
        $where = array('id_produk' => $id_produk);
        $data['produk'] = $this->M_produk->get($where, 'produk')->result();
        $data['title'] = 'Edit Produk';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/nav');
        $this->load->view('templates/edit_produk', $data);
        $this->load->view('templates/auth_footer');
    }

    public function tambahProduk()
    {
        $data['title'] = 'Tambah Produk';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('foto', 'Foto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['produk'] = $this->M_produk->getAll()->result();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/nav');
            $this->load->view('templates/tambah_produk', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->M_produk->tambahProduk();
            $this->session->set_flashdata('flash', 'Ditambahkan!');
            redirect('produk/tambahProduk');
        }
    }
}
