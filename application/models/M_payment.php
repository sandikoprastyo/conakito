<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_payment extends CI_Model
{

  public function index()
  {
    $data = [
      'bank_pengirim'      => $this->input->post('bank_pengirim', true),
      'norek_pengirim'     => $this->input->post('norek_pengirim', true),
      'nama_pengirim'      => $this->input->post('nama_pengirim', true),
      'tanggal_pengirim'   => $this->input->post('tanggal_pengirim', true),
      'jumlah_transfer'    => $this->input->post('jumlah_transfer', true),
      'bukti_pembayaran'   => $this->input->post('bukti_pembayaran', true),
    ];
    $this->db->insert('pembayaran', $data);
  }
}
