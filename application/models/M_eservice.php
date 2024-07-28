<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_eservice extends CI_Model
{
    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tgl_kegiatan) AS tahun FROM eservice GROUP BY YEAR(tgl_kegiatan) ORDER BY YEAR(tgl_kegiatan) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('eservice', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from eservice where tgl_kegiatan BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tgl_kegiatan ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from eservice where YEAR(tgl_kegiatan) = '$tahun1' and MONTH(tgl_kegiatan) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_kegiatan ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from eservice where YEAR(tgl_kegiatan) = '$tahun2'  ORDER BY tgl_kegiatan ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('eservice', $where);

        return $query->result();
    }


    public function SemuaData()
    {
        $query = $this->db->query("SELECT * from eservice a LEFT JOIN status b ON a.id = b.id_eservice ORDER BY a.id DESC");
        return $query->result_array();
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('eservice');
    }

    public function ambil_id_eservice($id)
    {
        return $this->db->get_where('eservice', ['id' => $id])->row_array();
    }

    public function read()
    {
        $eservice = $this->db->order_by('id', 'DESC');
        $eservice = $this->db->get('eservice');
        return $eservice->result();
    }

    public function download($id)
    {
        $query = $this->db->get_where('eservice', array('id' => $id));
        return $query->row_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "tgl_dibuat" => date('Y-m-d'),
        ];
        $this->db->insert('eservice', $data);
        return $this->db->insert_id();
    }

    public function proses_edit_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "tgl_dibuat" => $this->input->post('tgl_kegiatan'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('eservice', $data);
    }
    public function dataHariIni()
    {
        $data = $this->db->get_where('eservice', array('tgl_dibuat' => date('Y-m-d')))->result_array();
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
        $data = $this->db->get('eservice')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function dataKeseluruhan()
    {
        $data = $this->db->get('eservice')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }

    public function getRedirectApp($id)
    {
        $this->db->order_by('id', 'DESC');
        $data = $this->db->get('eservice');
        return $data->result_array();
    }

    public function total_data()
    {
        return $this->db->count_all('eservice');
    }

    public function count_today_records()
    {
        $this->db->where('DATE(tgl_dibuat)', date('Y-m-d'));
        $this->db->from('eservice');
        return $this->db->count_all_results();
    }

    public function count_current_month_records()
    {
        $this->db->where('MONTH(tgl_dibuat)', date('m'));
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('eservice');
        return $this->db->count_all_results();
    }

    public function count_current_year_records()
    {
        $this->db->where('YEAR(tgl_dibuat)', date('Y'));
        $this->db->from('eservice');
        return $this->db->count_all_results();
    }
}