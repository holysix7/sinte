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
}