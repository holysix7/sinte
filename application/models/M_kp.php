<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_kp extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('kp')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "no_induk" => $this->input->post('no_induk'),
            "asal_instansi" => $this->input->post('asal_instansi'),
            "jurusan" => $this->input->post('jurusan'),
            "perihal" => $this->input->post('perihal'),
            "jangka_waktu" => $this->input->post('jangka_waktu'),
            "tgl_masuk" => $this->input->post('tgl_masuk'),
            "tgl_akhir" => $this->input->post('tgl_akhir'),
            "posisi_magang" => $this->input->post('posisi_magang'),
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
            "email	" => $this->input->post('email'),
            "no_induk" => $this->input->post('no_induk'),
            "asal_instansi" => $this->input->post('asal_instansi'),
            "jurusan" => $this->input->post('jurusan'),
            "perihal" => $this->input->post('perihal'),
            "jangka_waktu" => $this->input->post('jangka_waktu'),
            "tgl_masuk" => $this->input->post('tgl_masuk'),
            "tgl_akhir" => $this->input->post('tgl_akhir'),
            "posisi_magang" => $this->input->post('posisi_magang'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kp', $data);
    }
}