<?php
class M_reservation extends CI_Model
{
    function simpan($nama, $email, $no_tlp, $jmlh_tamu, $tanggal_booking, $time_booking, $type_reservation, $req_deskripsi)
    {
        $hasil = $this->db->query("INSERT INTO reservation (nama, email, no_tlp, jmlh_tamu, tanggal_booking, time_booking, type_reservation, req_deskripsi)
         VALUES ('$nama','$email','$no_tlp','$jmlh_tamu','$tanggal_booking','$time_booking','$type_reservation','$req_deskripsi')");
        return $hasil;
    }
}
