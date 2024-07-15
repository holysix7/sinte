

<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_Tamu extends CI_Model
{



    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tanggal_kunjungan	) AS tahun FROM tamu GROUP BY YEAR(tanggal_kunjungan	) ORDER BY YEAR(tanggal_kunjungan	) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('tamu', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from tamu where tanggal_kunjungan	 BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_kunjungan	 ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from tamu where YEAR(tanggal_kunjungan	) = '$tahun1' and MONTH(tanggal_kunjungan	) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal_kunjungan	 ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from tamu where YEAR(tanggal_kunjungan	) = '$tahun2'  ORDER BY tanggal_kunjungan	 ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('tamu', $where);

        return $query->result();
    }

    public function SemuaData()
    {
        return $this->db->get('tamu')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tanggal_kunjungan" => $this->input->post('tanggal_kunjungan'),
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "nomor" => $this->input->post('nomor'),
            "instansi" => $this->input->post('instansi'),
            "perihal" => $this->input->post('perihal'),
            "jabatan" => $this->input->post('jabatan'),
            "perihal" => $this->input->post('perihal'),
            "jumlah_tamu" => $this->input->post('jumlah_tamu'),
        ];

        $this->db->insert('tamu', $data);
    }

    public function proses_tambah_data2()
    {
        $data = [
            "tanggal_kunjungan" => $this->input->post('tanggal_kunjungan'),
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "nomor" => $this->input->post('nomor'),
            "instansi" => $this->input->post('instansi'),
            "perihal" => $this->input->post('perihal'),
            "jabatan" => $this->input->post('jabatan'),
            "perihal" => $this->input->post('perihal'),
            "jumlah_tamu" => $this->input->post('jumlah_tamu'),
        ];

        $this->db->insert('tamu', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tamu');
    }

    public function ambil_id_tamu($id)
    {
        return $this->db->get_where('tamu', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "tanggal_kunjungan" => $this->input->post('tanggal_kunjungan'),
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "nomor" => $this->input->post('nomor'),
            "instansi" => $this->input->post('instansi'),
            "perihal" => $this->input->post('perihal'),
            "jabatan" => $this->input->post('jabatan'),
            "perihal" => $this->input->post('perihal'),
            "jumlah_tamu" => $this->input->post('jumlah_tamu'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tamu', $data);
    }

    
    public function __construct() {
        $this->load->database();
    }

    public function total_kunjungantamu()
    {
        return $this->db->count_all('tamu');
    }

    public function count_today_records() {
        $this->db->where('DATE(tanggal_kunjungan)', date('Y-m-d'));
        $this->db->from('tamu');
        return $this->db->count_all_results();
       
    }

    public function count_current_month_records() {
        $this->db->where('MONTH(tanggal_kunjungan)', date('m'));
        $this->db->where('YEAR(tanggal_kunjungan)', date('Y'));
        $this->db->from('tamu'); 
        return $this->db->count_all_results();
       
    }

    public function count_current_year_records() {
        $this->db->where('YEAR(tanggal_kunjungan)', date('Y'));
        $this->db->from('tamu');
        return $this->db->count_all_results();
    }

    public function get_name_data() {
        $this->db->select('instansi, COUNT(*) as count');
        $this->db->group_by('instansi');
        $query = $this->db->get('tamu'); 
        return $query->result();
    }
}