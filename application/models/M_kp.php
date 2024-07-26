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
        $this->db->select('*');
        $this->db->from('kp a');
        $this->db->join('suratpengajuan b', 'a.id = b.id_suratpengajuan', 'left');
        $this->db->where('b.status <> "draft"');
        $this->db->order_by('a.id', 'DESC');
        return $this->db->get('kp')->result_array();
    }

    public function SemuaDataIdSurat()
    {
        $id = explode('/', $this->uri->uri_string())[2];
        return $this->db->get_where('kp', [
            'id_suratpengajuan' => $id
        ])->result_array();
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
            "id_suratpengajuan" => $this->input->post('id_suratpengajuan'),
        ];

        $this->db->insert('kp', $data);
    }


    public function get_magang_by_id()
    {
        $id = $this->input->get('id');
        $query = $this->db->get_where('kp', array('id' => $id));
        $data['magang'] = $query->row_array();

    }

    public function get_certificate_data($id)
    {
        // Query untuk mengambil data sertifikat berdasarkan $id
        $query = $this->db->get_where('kp', array('id' => $id));
        return $query->row_array(); // Mengembalikan data sebagai array
    }


    public function proses_tambah_data_detail_sertifikat()
    {

        $data = [
            "no_sertifikat" => $this->input->post('no_sertifikat'),
            "periode" => $this->input->post('periode'),

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kp', $data);
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

    public function getRedirectKp($id)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('id', $id);
        $query = $this->db->get('kp');
        return $query->result_array();
    }

    public function dataKeseluruhan()
    {
        $data = $this->db->get('kp')->result_array();
        return [
            'counted' => count($data),
            'data' => $data
        ];
    }
}

