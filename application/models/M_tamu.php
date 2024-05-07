<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_Tamu extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('tamu')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "tanggal_kunjungan" => $this->input->post('tanggal_kunjungan'),
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "nomor" => $this->input->post('nomor'),
            "instansi" => $this->input->post('instansi'),
            "perihal" => $this->input->post('perihal'),
            "jabatan" => $this->input->post('jabatan'),
            "perihal" => $this->input->post('perihal'),
            "jumlah_tamu" => $this->input->post('jumlah_tamu'),
        ];

        $this->db->insert('tamu', $data);
    }

    public function proses_tambah_data2()
    {
        $data = [
            "tanggal_kunjungan" => $this->input->post('tanggal_kunjungan'),
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "nomor" => $this->input->post('nomor'),
            "instansi" => $this->input->post('instansi'),
            "perihal" => $this->input->post('perihal'),
            "jabatan" => $this->input->post('jabatan'),
            "perihal" => $this->input->post('perihal'),
            "jumlah_tamu" => $this->input->post('jumlah_tamu'),
        ];

        $this->db->insert('tamu', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tamu');
    }

    public function ambil_id_tamu($id)
    {
        return $this->db->get_where('tamu', ['id' => $id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "tanggal_kunjungan" => $this->input->post('tanggal_kunjungan'),
            "nama" => $this->input->post('nama'),
            "email	" => $this->input->post('email'),
            "nomor" => $this->input->post('nomor'),
            "instansi" => $this->input->post('instansi'),
            "perihal" => $this->input->post('perihal'),
            "jabatan" => $this->input->post('jabatan'),
            "perihal" => $this->input->post('perihal'),
            "jumlah_tamu" => $this->input->post('jumlah_tamu'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tamu', $data);
    }
}