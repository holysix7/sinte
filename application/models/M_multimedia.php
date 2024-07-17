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
        return $this->db->get('multimedia')->result_array();
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
            "nama_kegiatan	" => $this->input->post('nama_kegiatan'),
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
        $query = $this->db->get_where('multimedia', array('id' => $id));
        return $query->result_array();
    }
}