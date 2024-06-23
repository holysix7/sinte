<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_kp extends CI_Model
{

    function gettahun()
    {

        $query = $this->db->query("SELECT YEAR(tanggal_pendataan) AS tahun FROM kp GROUP BY YEAR(tanggal_pendataan) ORDER BY YEAR(tanggal_pendataan) ASC");

        return $query->result();

    }
    function filterbytanggal($where)
    {

        $query = $this->db->get_where('kp', $where);

        return $query->result();
    }

    function filterbytanggal1($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT * from kp where tanggal_pendataan BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_pendataan ASC ");

        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {

        $query = $this->db->query("SELECT * from kp where YEAR(tanggal_pendataan) = '$tahun1' and MONTH(tanggal_pendataan) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal_pendataan ASC ");

        return $query->result();
    }

    function filterbytahun($tahun2)
    {

        $query = $this->db->query("SELECT * from kp where YEAR(tanggal_pendataan) = '$tahun2'  ORDER BY tanggal_pendataan ASC ");

        return $query->result();
    }

    function filterbytahun2($where)
    {

        $query = $this->db->get_where('kp', $where);

        return $query->result();
    }

    public function SemuaData()
    {
        return $this->db->get('kp')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "nohp" => $this->input->post('nohp'),
            "no_induk" => $this->input->post('no_induk'),
            "jurusan" => $this->input->post('jurusan'),
            "user_id" => $this->session->userdata('id_user'),
            "posisi_magang" => $this->input->post('posisi_magang'),
            "tanggal_pendataan" => $this->input->post('tanggal_pendataan'),
        ];

        $this->db->insert('kp', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kp');
    }

    public function ambil_id_kp($id)
    {
        return $this->db->get_where('kp', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "nohp" => $this->input->post('nohp'),
            "no_induk" => $this->input->post('no_induk'),
            "jurusan" => $this->input->post('jurusan'),
            "user_id" => $this->session->userdata('id_user'),
            "posisi_magang" => $this->input->post('posisi_magang'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kp', $data);
    }

    function kp_user()
    {
        $this->db->where('kp.user_id', $this->session->userdata('id_user'));
        return $this->db->get('kp')->result_array();
    }

    public function editstatus()
    {
        $data = [
            "stat" => $this->input->post('stat'),
            "ket_stat" => $this->input->post('ket_stat'),

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kp', $data);
    }

    public function downloadsertifikat($id)
    {
        $query = $this->db->get_where('kp', array('id' => $id));
        return $query->row_array();
    }
}

