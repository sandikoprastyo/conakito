<?php
class M_contact extends CI_Model
{
    function simpan($nama, $email, $no_tlp, $question)
    {
        $hasil = $this->db->query("INSERT INTO contact (nama, email, no_tlp, pertanyaan)
         VALUES ('$nama','$email','$no_tlp','$question')");
        return $hasil;
    }
}
