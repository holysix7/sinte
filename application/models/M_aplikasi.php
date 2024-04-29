<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_aplikasi extends CI_Model
{
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
}