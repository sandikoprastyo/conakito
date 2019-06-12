<?php

class invoice extends CI_Controller
{

    public $api_key = 'a75caa11dacbe32e7d1e939a3e7f3f07';
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
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'No_tlp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tujuan_provinsi', 'Tujuan_provinsi', 'required');
        $this->form_validation->set_rules('kurir', 'Kurir', 'required');
        $this->form_validation->set_rules('bank_transfer', 'Bank_transfer', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $title);
            $this->load->view('shop/payment');
            $this->load->view('templates/footer');
        } else {
            $is_proses = $this->m_invoice->index();
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
