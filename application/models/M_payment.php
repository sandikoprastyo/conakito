<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_payment extends CI_Model
{
  function simpan($data, $table)
  {
    $this->db->insert($table, $data);
  }
}
