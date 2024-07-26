<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_bigdata extends CI_Model
{

    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tgl_kegiatan) AS tahun FROM bigdata GROUP BY YEAR(tgl_kegiatan) ORDER BY YEAR(tgl_kegiatan) ASC");

        return $query->result();

    }

    function filterbytanggal($where)
    {

        $query = $this->db->get_where('bigdata', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from bigdata where tgl_kegiatan BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_kegiatan ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from bigdata where YEAR(tgl_kegiatan) = '$tahun1' and MONTH(tgl_kegiatan) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_kegiatan ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from bigdata where YEAR(tgl_kegiatan) = '$tahun2'  ORDER BY tgl_kegiatan ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('bigdata', $where);

        return $query->result();
    }

    public function SemuaData()
    {
        $this->db->order_by('id_bigdata', 'DESC');
        return $this->db->get('bigdata')->result_array();
    }

    public function hapus_data($id_bigdata)
    {
        $this->db->where('id_bigdata', $id_bigdata);
        $this->db->delete('bigdata');
    }

    public function ambil_id_bigdata($id_bigdata)
    {
        return $this->db->get_where('bigdata', ['id_bigdata' => $id_bigdata])->row_array();
    }

    public function download($id_bigdata)
    {
        $query = $this->db->get_where('bigdata', array('id_bigdata' => $id_bigdata));
        return $query->row_array();
    }

    public function proses_tambah_data($id_eservice = null)
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "jenis_kegiatan" => $this->input->post('jenis_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "bidang_penyelenggara" => $this->input->post('bidang_penyelenggara'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "link_sertifikat" => $this->input->post('link_sertifikat'),
            "tgl_dibuat" => date('Y-m-d'),
            "id_eservice" => $id_eservice,
        ];
        $this->db->insert('bigdata', $data);
    }


    public function proses_edit_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "jenis_kegiatan" => $this->input->post('jenis_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "bidang_penyelenggara" => $this->input->post('bidang_penyelenggara'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "link_sertifikat" => $this->input->post('link_sertifikat'),
            "tgl_dibuat" => $this->input->post('tgl_kegiatan'),
        ];

        $this->db->where('id_bigdata', $this->input->post('id_bigdata'));
        $this->db->update('bigdata', $data);
    }

    public function proses_edit_by_es_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
        ];

        $this->db->where('id_eservice', $this->input->post('id'));
        $this->db->update('bigdata', $data);
    }

    public function getother($table)
    {
        $query = "SELECT * FROM " . $table;
        return $this->db->query($query);
    }

    public function getdata($table)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks";
        return $this->db->get('bigdata')->result_array();
    }


    public function getdatawithadd($table, $additional)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks AND " . $additional;
        return $this->db->query($query);
    }

    public function adddata($table, $array)
    {
        return $this->db->insert($table, $array);
    }

    public function dataHariIni()
    {
        $data = $this->db->get_where('bigdata', array('tgl_dibuat' => date('Y-m-d')))->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function dataMingguIni()
    {
        $today = date('Y-m-d');
        $one_week_ago = date('Y-m-d', strtotime('-1 week'));
        $this->db->where('tgl_dibuat >=', $one_week_ago);
        $this->db->where('tgl_dibuat <=', $today);
        $data = $this->db->get('bigdata')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function dataKeseluruhan()
    {
        $data = $this->db->get('bigdata')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function getRedirectKp($id)
    {
        $this->db->order_by('id_bigdata', 'DESC');
        $this->db->where('id_bigdata', $id);
        $query = $this->db->get('bigdata');
        return $query->result_array();
    }

    public function rowData($id_bigdata)
    {
        return $this->db->get_where('bigdata', ['id_bigdata' => $id_bigdata])->row();
    }

    public function total_data()
    {
        return $this->db->count_all('bigdata');
    }

    public function count_today_records()
    {
        $this->db->where('DATE(tgl_dibuat)', date('Y-m-d'));
        $this->db->from('bigdata');
        return $this->db->count_all_results();
    }

    public function count_current_month_records()
    {
        $this->db->where('MONTH(tgl_dibuat)', date('m'));
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('bigdata');
        return $this->db->count_all_results();
    }

    public function count_current_year_records()
    {
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('bigdata');
        return $this->db->count_all_results();
    }
}