<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_bigdata extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('bigdata')->result_array();
    }

    public function hapus_data($id_bigdata)
    {
        $this->db->where('id_bigdata', $id_bigdata);
        $this->db->delete('bigdata');
    }

    public function ambil_id_bigdata($id_bigdata)
    {
        return $this->db->get_where('bigdata', ['id_bigdata' => $id_bigdata])->row_array();
    }

    public function download($id_bigdata)
    {
        $query = $this->db->get_where('bigdata', array('id_bigdata' => $id_bigdata));
        return $query->row_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "jenis_kegiatan" => $this->input->post('jenis_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "bidang_penyelenggara" => $this->input->post('bidang_penyelenggara'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "link_sertifikat" => $this->input->post('link_sertifikat'),
        ];
        $this->db->insert('bigdata', $data);
    }


    public function proses_edit_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "jenis_kegiatan" => $this->input->post('jenis_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "bidang_penyelenggara" => $this->input->post('bidang_penyelenggara'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
            "link_sertifikat" => $this->input->post('link_sertifikat'),
        ];

        $this->db->where('id_bigdata', $this->input->post('id_bigdata'));
        $this->db->update('bigdata', $data);
    }

    public function getother($table)
    {
        $query = "SELECT * FROM " . $table;
        return $this->db->query($query);
    }

    public function getdata($table)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks";
        return $this->db->get('bigdata')->result_array();
    }


    public function getdatawithadd($table, $additional)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks AND " . $additional;
        return $this->db->query($query);
    }

    public function adddata($table, $array)
    {
        return $this->db->insert($table, $array);
    }
}