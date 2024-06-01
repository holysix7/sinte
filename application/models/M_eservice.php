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
        return $this->db->get('eservice')->result_array();
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
        ];
        $this->db->insert('eservice', $data);
    }

}