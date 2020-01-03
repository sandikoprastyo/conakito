<?php

class invoice extends CI_Controller
{

    public $api_key = 'aa51a0658abcaa751620844005fde0c2';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_invoice');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $title['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $title);
        $this->load->view('shop/order_shop');
        $this->load->view('templates/footer');
    }

    public function proses()
    {

        $title['judul'] = 'Konakito.com';
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('no_tlp', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('tujuan', 'Location Destination', 'required');
        $this->form_validation->set_rules('kurir', 'Choose Courier', 'required');
        $this->form_validation->set_rules('bank', 'Select Bank Transfer', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $title);
            $this->load->view('shop/order_shop');
            $this->load->view('templates/footer');
        } else {
            $this->m_invoice->index();
            $this->session->set_flashdata('flash', 'Dikirim!');
            redirect('payment/index');
        }
    }







    /* Konfirm pengiriman daan data pembeli */
    function _api_ongkir_post($origin, $des, $qty, $cour)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $qty . "&courier=" . $cour,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

    function _api_ongkir($data)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
            //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_URL => "http://api.rajaongkir.com/starter/" . $data,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return  $err;
        } else {
            return $response;
        }
    }

    public function provinsi()
    {
        $provinsi = $this->_api_ongkir('province');
        $data = json_decode($provinsi, true);
        echo json_encode($data['rajaongkir']['results']);
    }

    public function kota($provinsi = "")
    {
        if (!empty($provinsi)) {
            if (is_numeric($provinsi)) {
                $kota = $this->_api_ongkir('city?province=' . $provinsi);
                $data = json_decode($kota, true);
                echo json_encode($data['rajaongkir']['results']);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }


    public function tarif($origin, $des, $qty, $cour)
    {
        $berat = $qty;
        $tarif = $this->_api_ongkir_post($origin, $des, $berat, $cour);
        $data = json_decode($tarif, true);
        echo json_encode($data['rajaongkir']['results']);
    }
}
