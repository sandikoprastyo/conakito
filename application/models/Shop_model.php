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

  public function find($id_produk)
  {
    //Query mencari record berdasarkan ID-nya
    $hasil = $this->db->where('id_produk', $id_produk)
      ->limit(1)
      ->get('produk');
    if ($hasil->num_rows() > 0) {
      return $hasil->row();
    } else {
      return array();
    }
  }

  public function findDetail($id_produk)
  {
    $data = array();
    $options = array('id_produk' => $id_produk);
    $Q = $this->db->get_where('produk', $options, 1);
    if ($Q->num_rows() > 0) {
      $data = $Q->row_array();
    }
    $Q->free_result();
    return $data;
  }


  function simpan($nama, $address, $no_tlp, $email, $berat, $tprovinsi, $tkota, $kurir, $banktf)
  {
    $hasil = $this->db->query("INSERT INTO invoice (nama_pembeli, alamat, no_tlp, email, berat, tujuan_provinsi, tujuan_kota, kurir, bank_transfer )
         VALUES ('$nama','$address','$no_tlp','$email','$berat','$tprovinsi','$tkota','$kurir','$banktf')");
    return $hasil;
  }
}
