<?php

class Shop extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Shop_model');
        $this->load->library('cart');
    }

    public function index_shop()
    {

        $title['judul'] = 'Konakito.com';
        $data['shop'] = $this->Shop_model->all();
        $this->load->view('templates/header_shop', $title, $data);
        $this->load->view('shop/index_shop', $data);
        $this->load->view('templates/footer');
    }

    public function show_cart()
    {

        $title['judul'] = 'Konakito.com';
        $data['shop'] = $this->Shop_model->all();
        $this->load->view('templates/header_shop', $title, $data);
        $this->load->view('shop/index_shop', $data);
        $this->load->view('templates/footer');
    }


    public function addcart($produk_id_produk)
    {
        $produk = $this->Shop_model->find($produk_id_produk);
        $data = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'berat'   => $produk->berat_produk,
            'price'   => $produk->harga_produk,
            'name'    => $produk->nama_produk
        );

        $this->cart->insert($data);
        redirect(base_url('Shop/show_cart'));
    }


    public function clear_cart()
    {
        $this->cart->destroy();
        redirect(base_url('shop/index_shop'));
    }

    public function detailMenu($id_produk)
    {
        $title['judul'] = 'Konakito.com';
        $data['shop'] = $this->Shop_model->findDetail($this->uri->segment(3));
        $this->load->view('templates/header_shop', $title, $data);
        $this->load->view('shop/detail_shop', $data);
        $this->load->view('templates/footer');
    }
}
