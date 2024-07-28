<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_publikasi extends CI_Model
{
    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tgl_publikasi) AS tahun FROM publikasi GROUP BY YEAR(tgl_publikasi) ORDER BY YEAR(tgl_publikasi) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('publikasi', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from publikasi where tgl_publikasi BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_publikasi ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from publikasi where YEAR(tgl_publikasi) = '$tahun1' and MONTH(tgl_publikasi) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_publikasi ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from publikasi where YEAR(tgl_publikasi) = '$tahun2'  ORDER BY tgl_publikasi ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('publikasi', $where);

        return $query->result();
    }

    public function SemuaData()
    {
        $query = $this->db->query("SELECT a.*, b.id as id_status, b.status_publikasi from publikasi a LEFT JOIN status b ON a.id = b.id_publikasi ORDER BY a.id DESC");
        return $query->result_array();
    }

    public function proses_tambah_data($id_eservice = null)
    {
        $data = [
            "tgl_publikasi" => $this->input->post('tgl_publikasi'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "judul_flayer" => $this->input->post('judul_flayer'),
            "link_internal" => $this->input->post('link_internal'),
            "link_eksternal" => $this->input->post('link_eksternal'),
            "tgl_dibuat" => date('Y-m-d'),
            "id_eservice" => $id_eservice
        ];

        $this->db->insert('publikasi', $data);
        return $this->db->insert_id();
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('publikasi');
    }

    public function ambil_id_publikasi($id)
    {
        return $this->db->get_where('publikasi', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "tgl_publikasi" => $this->input->post('tgl_publikasi'),
            "judul_flayer" => $this->input->post('judul_flayer'),
            "link_internal" => $this->input->post('link_internal'),
            "link_eksternal" => $this->input->post('link_eksternal'),
            "tgl_dibuat" => date('Y-m-d'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('publikasi', $data);
    }

    public function dataHariIni()
    {
        $data = $this->db->get_where('publikasi', array('tgl_dibuat' => date('Y-m-d')))->result_array();
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
        $data = $this->db->get('publikasi')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function dataKeseluruhan()
    {
        $data = $this->db->get('publikasi')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function getRedirectApp($id)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('id', $id);
        $query = $this->db->get('publikasi');
        return $query->result_array();
    }

    public function total_data()
    {
        return $this->db->count_all('publikasi');
    }

    public function count_today_records()
    {
        $this->db->where('DATE(tgl_dibuat)', date('Y-m-d'));
        $this->db->from('publikasi');
        return $this->db->count_all_results();
    }

    public function count_current_month_records()
    {
        $this->db->where('MONTH(tgl_dibuat)', date('m'));
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('publikasi');
        return $this->db->count_all_results();
    }

    public function count_current_year_records()
    {
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('publikasi');
        return $this->db->count_all_results();
    }
    
    public function hapus_data_byeservice($id_eservice){
        $this->db->where('id_eservice', $id_eservice);
        $this->db->delete('publikasi');
    }
}