<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_aplikasi extends CI_Model
{

    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tgl_aplikasi) AS tahun FROM aplikasi GROUP BY YEAR(tgl_aplikasi) ORDER BY YEAR(tgl_aplikasi) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('aplikasi', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from aplikasi where tgl_aplikasi BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_aplikasi ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from aplikasi where YEAR(tgl_aplikasi) = '$tahun1' and MONTH(tgl_aplikasi) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_aplikasi ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from aplikasi where YEAR(tgl_aplikasi) = '$tahun2'  ORDER BY tgl_aplikasi ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('aplikasi', $where);

        return $query->result();
    }

    public function SemuaData()
    {
        return $this->db->get('aplikasi')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tgl_aplikasi" => $this->input->post('tgl_aplikasi'),
            "nama_aplikasi	" => $this->input->post('nama_aplikasi'),
            "deskripsi" => $this->input->post('deskripsi'),
            "link_aplikasi" => $this->input->post('link_aplikasi'),
            "tgl_dibuat" => date('Y-m-d'),
            "waktu" => $this->input->post('waktu'),
            "narasumber" => $this->input->post('narasumber'),
            "penanggung_jawab" => $this->input->post('penanggung_jawab'),
        ];

        $this->db->insert('aplikasi', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aplikasi');
    }

    public function ambil_id_aplikasi($id)
    {
        return $this->db->get_where('aplikasi', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "tgl_aplikasi" => $this->input->post('tgl_aplikasi'),
            "nama_aplikasi	" => $this->input->post('nama_aplikasi'),
            "deskripsi" => $this->input->post('deskripsi'),
            "link_aplikasi" => $this->input->post('link_aplikasi'),
            "tgl_dibuat" => date('Y-m-d'),
            "waktu" => $this->input->post('waktu'),
            "narasumber" => $this->input->post('narasumber'),
            "penanggung_jawab" => $this->input->post('penanggung_jawab'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('aplikasi', $data);
    }

    public function dataKeseluruhan()
    {
        $data = $this->db->get('aplikasi')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function getRedirectApp($id)
    {
        $query = $this->db->get_where('aplikasi', array('id' => $id));
        return $query->result_array();
    }


    public function dataHariIni()
    {
        $data = $this->db->get_where('aplikasi', array('tgl_dibuat' => date('Y-m-d')))->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function total_data()
    {
        return $this->db->count_all('aplikasi');
    }

    public function count_today_records()
    {
        $this->db->where('DATE(tgl_dibuat)', date('Y-m-d'));
        $this->db->from('aplikasi');
        return $this->db->count_all_results();
    }

    public function count_current_month_records()
    {
        $this->db->where('MONTH(tgl_dibuat)', date('m'));
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('aplikasi');
        return $this->db->count_all_results();
    }

    public function count_current_year_records()
    {
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('aplikasi');
        return $this->db->count_all_results();
    }
}