<?php

class invoice extends CI_Controller
{

    public $api_key = 'a75caa11dacbe32e7d1e939a3e7f3f07';

    ////* Check out *///
    public function checkOut()
    {
        $title['judul'] = 'Konakito.com';
        $this->load->view('templates/header', $title);
        $this->load->view('shop/order_shop');
        $this->load->view('templates/footer');
    }



    /* Konfirm pengiriman daan data pembeli */
    public function send()
    {
        $this->load->model('M_invoice');
        $nama = $this->input->post('nama');
        $address = $this->input->post('alamat');
        $no_tlp = $this->input->post('no_tlp');
        $email = $this->input->post('email');
        $tprovinsi = $this->input->post('tujuan_provinsi');
        $kurir = $this->input->post('kurir');
        $banktf = $this->input->post('bank_transfer');
        $this->M_invoice->simpan($nama, $address, $no_tlp, $email, $tprovinsi, $kurir, $banktf);
        redirect('payment/index');
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
