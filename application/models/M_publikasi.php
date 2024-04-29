<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_publikasi extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('publikasi')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tgl_publikasi" => $this->input->post('tgl_publikasi'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "judul_flayer" => $this->input->post('judul_flayer'),
            "link_internal" => $this->input->post('link_internal'),
            "link_eksternal" => $this->input->post('link_eksternal'),
        ];

        $this->db->insert('publikasi', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('publikasi');
    }

    public function ambil_id_publikasi($id)
    {
        return $this->db->get_where('publikasi', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "tgl_publikasi" => $this->input->post('tgl_publikasi'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "judul_flayer" => $this->input->post('judul_flayer'),
            "link_internal" => $this->input->post('link_internal'),
            "link_eksternal" => $this->input->post('link_eksternal'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('publikasi', $data);
    }
}