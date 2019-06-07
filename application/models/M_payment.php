<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_payment extends CI_Model
{
  function simpan($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function get()
  {
    return $this->db->get('invoice', 1);
  }
}

/* public function index()
  {
    /* $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $no_tlp = $this->input->post('no_tlp');
    $email = $this->input->post('email');
    $tujuan_provinsi = $this->input->post('tujuan_provinsi');
    $kurir = $this->input->post('kurir');
    $banktf = $this->input->post('bank_transfer');

    $invoice = array(
      'nama_pembeli' => $nama,
      'alamat' => $alamat,
      'no_tlp' => $no_tlp,
      'email' => $email,
      'tujuan_provinsi' => $tujuan_provinsi,
      'kurir' => $kurir,
      '$bank_transfer' => $banktf,
    ); */

/*    $bank_pengirim = $this->input->post('bank_pengirim');
    $norek_pengirim = $this->input->post('norek_pengirim');
    $nama_pengirim = $this->input->post('nama_pengirim');
    $tanggal_pengirim = $this->input->post('tanggal_pengirim');
    $jumlah_transfer = $this->input->post('jumlah_transfer');
    $bukti_pembayaran = $this->input->post('bukti_pembayaran');

    $data = array(
      'bank_pengirim' => $bank_pengirim,
      'norek_pengirim' => $norek_pengirim,
      'nama_pengirim' => $nama_pengirim,
      'tanggal_pengirim' => $tanggal_pengirim,
      'jumlah_transfer' => $jumlah_transfer,
      'bukti_pembayaran' => $bukti_pembayaran
    );

    $this->db->insert('pembayaran', $invoice); */
