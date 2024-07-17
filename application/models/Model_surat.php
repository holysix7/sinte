<?php
class Model_surat extends CI_Model
{
    public function getdata($table)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks";
        return $this->db->query($query);

        $data['status'] = [
            1 => 'Pending',
            2 => 'Syarat Tidak Terpenuhi',
            3 => 'Diterima dan Dilanjutkan',
            4 => 'Sudah Diketik dan Diparaf',
            5 => 'Ditandatangani Lurah/<b>Selesai</b>',
        ];
        $this->db->select('*');
        $this->db->from('suratpengajuan');
        $query = $this->db->get();
        $data['data'] = $query->result_array();
    }

    public function getdatawithadd($table, $additional)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks AND " . $additional;
        return $this->db->query($query);
    }

    public function getdatawithadd1($table, $additional)
    {


        $this->db->where('kp.user_id ', $this->session->userdata('id_user'));
        return $this->db->get('kp')->result();
    }

    public function getdatawithadd2($table, $additional)
    {


        $this->db->where('suratpengajuan.no_user ', $this->session->userdata('id_user'));
        return $this->db->get('suratpengajuan')->result();
    }

    public function getdatawithadd3($table)
    {

        $query = "SELECT * FROM " . $table;
        return $this->db->query($query);
    }

    public function get_data_today()
    {
        $this->db->where('DATE(tanggal_kunjungan)', date('Y-m-d'));
        $query = $this->db->get('tamu');
        return $query->result_array();
    }

    public function countdata($table)
    {
        $query = "SELECT count(*) as total FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks";
        return $this->db->query($query);
    }

    public function countdatawithadd($table, $additional)
    {
        $query = "SELECT count(*) as total FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks AND " . $additional;
        return $this->db->query($query);
    }

    public function getother($table)
    {
        $query = "SELECT * FROM " . $table;
        return $this->db->query($query);
    }

    public function getotherwithadd($table, $additional)
    {
        $query = "SELECT * FROM " . $table . " " . $additional;
        return $this->db->query($query);
    }

    public function countother($table)
    {
        $query = "SELECT COUNT(*) AS total FROM " . $table;
        return $this->db->query($query);
    }

    public function adddata($table, $array)
    {
        $this->db->insert($table, $array);
        return $this->db->insert_id();
    }

    public function updatedata($table, $array, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $array);
    }

    public function deletedata($table, $where)
    {
        return $this->db->delete($table, $where);
    }


    public function hapus_datasp($id_suratpengajuan)
    {
        return $this->db->delete('suratpengajuan', array('id_suratpengajuan' => $id_suratpengajuan));
    }

    public function hapus_datasm($id_suratmasuk)
    {
        return $this->db->delete('suratmasuk', array('id_suratmasuk' => $id_suratmasuk));
    }


    public function hapus_dataindex($id_indeks)
    {
        $this->db->where('id_indeks', $id_indeks);
        $this->db->delete('indeks');
    }


    public function hapususer($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }


    public function edit($id_suratpengajuan)
    {
        return $this->db->delete('suratpengajuan', array('id_suratpengajuan' => $id_suratpengajuan));
    }

    public function editstatus()
    {
        $data = [
            "status" => $this->input->post('status'),
            "ket_status" => $this->input->post('ket_status'),

        ];

        $this->db->where('id_suratpengajuan', $this->input->post('id_suratpengajuan'));
        $this->db->update('suratpengajuan', $data);
    }

    public function kp_pengajuan()
    {
        $this->db->where('suratpengajuan.no_user', $this->session->userdata('id_user'));
        return $this->db->get('suratpengajuan')->result();

    }


    public function downloadsuratbalasan($id_suratpengajuan)
    {
        $query = $this->db->get_where('suratpengajuan', array('id_suratpengajuan' => $id_suratpengajuan));
        return $query->row_array();
    }


    // untuk laporan surat pengajuan

    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tanggal_pengajuan) AS tahun FROM suratpengajuan GROUP BY YEAR(tanggal_pengajuan) ORDER BY YEAR(tanggal_pengajuan) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('suratpengajuan', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from suratpengajuan where tanggal_pengajuan BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_pengajuan ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from suratpengajuan where YEAR(tanggal_pengajuan) = '$tahun1' and MONTH(tanggal_pengajuan) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal_pengajuan ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from suratpengajuan where YEAR(tanggal_pengajuan) = '$tahun2'  ORDER BY tanggal_pengajuan ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('suratpengajuan', $where);

        return $query->result();
    }


    public function SemuaData()
    {
        return $this->db->get('suratpengajuan')->result_array();
    }

    //untuk landingpage count

    public function __construct()
    {
        $this->load->database();
    }

    public function total_userterdaftar()
    {
        return $this->db->count_all('user');
    }

    public function total_kp()
    {
        return $this->db->count_all('kp');
    }



    public function total_tamu()
    {
        return $this->db->count_all('tamu');
    }

    public function total_pengajuan()
    {
        return $this->db->count_all('suratpengajuan');
    }


    public function getRedirectApp($id)
    {
        $query = $this->db->get_where('indeks', array('id_indeks' => $id));
        return $query->result();
    }
}
