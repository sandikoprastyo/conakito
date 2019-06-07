<?php

class Shop_model extends CI_Model
{

  public function all()
  {
    $hasil = $this->db->get('produk');
    if ($hasil->num_rows() > 0) {
      return $hasil->result();
    } else {
      return array();
    }
  }

  public function find($id)
  {
    //Query mencari record berdasarkan ID-nya
    $hasil = $this->db->where('id_produk', $id)
      ->limit(1)
      ->get('produk');
    if ($hasil->num_rows() > 0) {
      return $hasil->row();
    } else {
      return array();
    }
  }


  function simpan($nama, $address, $no_tlp, $email, $berat, $tprovinsi, $tkota, $kurir, $banktf)
  {
    $hasil = $this->db->query("INSERT INTO invoice (nama_pembeli, alamat, no_tlp, email, berat, tujuan_provinsi, tujuan_kota, kurir, bank_transfer )
         VALUES ('$nama','$address','$no_tlp','$email','$berat','$tprovinsi','$tkota','$kurir','$banktf')");
    return $hasil;
  }
}
