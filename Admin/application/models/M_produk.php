<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_produk extends CI_Model
{
    function getAll()
    {
        return $this->db->get('produk');
    }

    function tambahProduk()
    {
        $data = [
            "nama_produk" => $this->input->post('nama', true),
            "berat_produk" => $this->input->post('berat', true),
            "harga_produk" => $this->input->post('harga', true),
            "foto_produk" => $this->input->post('foto', true),
        ];
        $this->db->insert('produk', $data);
    }

    function get($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapusProduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
}
