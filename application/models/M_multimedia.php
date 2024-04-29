<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_multimedia extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('multimedia')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tgl_multimedia" => $this->input->post('tgl_multimedia'),
            "nama_kegiatan	" => $this->input->post('nama_kegiatan'),
            "link_vidio" => $this->input->post('link_vidio'),
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
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('multimedia', $data);
    }
}