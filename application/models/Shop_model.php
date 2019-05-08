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
}



/* public function data()
  {
    $this->db->select('*');
    $this->db->from('produk');
    $data = $this->db->get();
    return $data->result();
    /*  return $this->db->get('produk')->result_array(); */
    /*   $query=$this->db->get("produk");
        return $query->result(); */
