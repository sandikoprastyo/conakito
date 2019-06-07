<?php

class m_invoice extends CI_Model
{

    function simpan($nama, $address, $no_tlp, $email, $tprovinsi, $kurir, $banktf)
    {
        $hasil = $this->db->query("INSERT INTO invoice (nama_pembeli, alamat, no_tlp, email, tujuan_provinsi, kurir, bank_transfer )
         VALUES ('$nama','$address','$no_tlp','$email','$tprovinsi','$kurir','$banktf')");
        return $hasil;
    }
}
