<?php
class Laporanpdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
    }

    function index()
    {
        $data['sql'] = $this->m_laporan->get_join();
        /* $data['sql'] = $this->db->query('SELECT * FROM pesanan ORDER BY id_pesanan DESC LIMIT 1')->result(); */

        $dompdf = new DOMPDF();

        $html = $this->load->view('shop/print_invoice', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('invoice.pdf', array("Attacment" => false));
    }
}
