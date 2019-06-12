<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_payment extends CI_Model
{

  public function index()
  {
    $bank_pengirim = $this->input->post('bank_pengirim');
    $norek_pengirim = $this->input->post('norek_pengirim');
    $nama_pengirim = $this->input->post('nama_pengirim');
    $tanggal_pengirim = $this->input->post('tanggal_pengirim');
    $jumlah_transfer = $this->input->post('jumlah_transfer');
    $bukti_pembayaran = $this->input->post('bukti_pembayaran');

    /*  $id_invoice = $this->db->insert_id('invoice'); */

    $data = array(
      'bank_pengirim' => $bank_pengirim,
      'norek_pengirim' => $norek_pengirim,
      'nama_pengirim' => $nama_pengirim,
      'tanggal_pengirim' => $tanggal_pengirim,
      'jumlah_transfer' => $jumlah_transfer,
      'bukti_pembayaran' => $bukti_pembayaran
    );
    $this->db->insert('pembayaran', $data);
    /*  $this->m_payment->simpan($data, 'pembayaran'); */
    $this->cart->destroy();
    redirect('Shop/index_shop');
  }
}
