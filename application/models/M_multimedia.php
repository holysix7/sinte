<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_multimedia extends CI_Model
{

    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tgl_multimedia) AS tahun FROM multimedia GROUP BY YEAR(tgl_multimedia) ORDER BY YEAR(tgl_multimedia) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('multimedia', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from multimedia where tgl_multimedia BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_multimedia ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from multimedia where YEAR(tgl_multimedia) = '$tahun1' and MONTH(tgl_multimedia) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_multimedia ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from multimedia where YEAR(tgl_multimedia) = '$tahun2'  ORDER BY tgl_multimedia ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('multimedia', $where);

        return $query->result();
    }

    public function SemuaData()
    {
        $query = $this->db->query("SELECT a.*, b.id as id_status, b.status_multimedia from multimedia a LEFT JOIN status b ON a.id = b.id_multimedia ORDER BY a.id DESC");
        return $query->result_array();
    }

    public function proses_tambah_data($id_eservice = null)
    {
        $data = [
            "tgl_multimedia" => $this->input->post('tgl_multimedia'),
            "nama_kegiatan	" => $this->input->post('nama_kegiatan'),
            "link_vidio" => $this->input->post('link_vidio'),
            "tgl_dibuat" => date('Y-m-d'),
        ];

        $this->db->insert('multimedia', $data);
        return $this->db->insert_id();
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('multimedia');
    }

    public function ambil_id_multimedia($id)
    {
        return $this->db->get_where('multimedia', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "tgl_multimedia" => $this->input->post('tgl_multimedia'),
            "link_vidio" => $this->input->post('link_vidio'),
            "tgl_dibuat" => date('Y-m-d'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('multimedia', $data);
    }

    public function dataHariIni()
    {
        $data = $this->db->get_where('multimedia', array('tgl_dibuat' => date('Y-m-d')))->result_array();
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
        $data = $this->db->get('multimedia')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function dataKeseluruhan()
    {
        $data = $this->db->get('multimedia')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function getRedirectApp($id)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('id', $id);
        $query = $this->db->get('multimedia');
        return $query->result_array();
    }

    public function total_data()
    {
        return $this->db->count_all('multimedia');
    }

    public function count_today_records()
    {
        $this->db->where('DATE(tgl_dibuat)', date('Y-m-d'));
        $this->db->from('multimedia');
        return $this->db->count_all_results();
    }

    public function count_current_month_records()
    {
        $this->db->where('MONTH(tgl_dibuat)', date('m'));
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('multimedia');
        return $this->db->count_all_results();
    }

    public function count_current_year_records()
    {
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('multimedia');
        return $this->db->count_all_results();
    }
}