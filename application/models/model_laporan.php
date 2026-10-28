<?php
class model_laporan extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function view_data_laporan()
    {
        $this->db->select('
        kwitansi.*,peserta.nmpeserta,pendaftaran_kursus.*,program_kursus.nmprogramkursus');
        $this->db->from('kwitansi','pendaftaran_kursus');
        $this->db->join('pendaftaran_kursus','pendaftaran_kursus.nopendaftaran = kwitansi.nopendaftaran');
        $this->db->join('peserta','peserta.nopeserta = pendaftaran_kursus.nopeserta');
        $this->db->join('program_kursus','program_kursus.idprogramkursus =
            pendaftaran_kursus.idprogramkursus');
        return $this->db->get()->result_array();
    }
    // Fungsi untuk laporan cetak penjualan
    public function laporan_kursus($tanggal_mulai, $tanggal_selesai) {
        $dataArr = [];
        $this->db->select('*');
        $this->db->from('kwitansi','pendaftaran_kursus');
        $this->db->join('pendaftaran_kursus','pendaftaran_kursus.nopendaftaran = kwitansi.nopendaftaran');
        //$this->db->from('pendaftaran_kursus');
        $this->db->join('peserta','peserta.nopeserta = pendaftaran_kursus.nopeserta');
        $this->db->join('program_kursus','program_kursus.idprogramkursus =
            pendaftaran_kursus.idprogramkursus');
        $this->db->where('kwitansi.tglkwitansi >=', $tanggal_mulai);
        $this->db->where('kwitansi.tglkwitansi <=', $tanggal_selesai);
        $data = $this->db->get()->result_array();

        $total_seluruh_laporan = 0;
        foreach ($data as $key => $value) {
            $this->db->select('*');
            $this->db->from('ada');
            $this->db->join('rincian_biaya', 'ada.idrincian = rincian_biaya.idrincian');
            $this->db->where('ada.nokwitansi', $value['nokwitansi']);

        }

        $dataArr = [
            'data' => $data,
            'total_seluruh_laporan' => $total_seluruh_laporan,
        ];
        if($this->db->count_all_results() > 0) {
            return $dataArr;
        }
    }
}
?>