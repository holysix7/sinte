<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_status extends CI_Model
{
    public function proses_tambah_data($id_eservice, $id_bigdata, $id_publikasi, $id_multimedia)
    {
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $data = [
            "id_eservice"           => $id_eservice,
            "id_bigdata"            => $id_bigdata,
            "id_publikasi"          => $id_publikasi,
            "id_multimedia"         => $id_multimedia,
            "status_eservice"       => 1,
            "updated_at_eservice"   => $dt->format('Y-m-d H:i:s'),
            "updated_by_eservice"   => $this->session->userdata('id_user'),
        ];
        $this->db->insert('status', $data);
    }
    
    public function proses_edit_data($dept, $id)
    {
        $tz     = 'Asia/Jakarta';
        $dt     = new DateTime("now", new DateTimeZone($tz));
        $data   = [];
        switch ($dept) {
            case 'eservice':
                $data = [
                    "status_eservice"     => 1,
                    "updated_at_eservice" => $dt->format('Y-m-d H:i:s'),
                    "updated_by_eservice" => $this->session->userdata('id_user'),
                    "id_eservice"         => $id,
                ];
                $this->db->where('id_eservice', $id);
                break;
            case 'bigdata':
                $data = [
                    "status_bigdata"     => 1,
                    "updated_at_bigdata" => $dt->format('Y-m-d H:i:s'),
                    "updated_by_bigdata" => $this->session->userdata('id_user'),
                    "id_bigdata"         => $id,
                ];
                $this->db->where('id_bigdata', $id);
                break;
            case 'multimedia':
                $data = [
                    "status_multimedia"     => 1,
                    "updated_at_multimedia" => $dt->format('Y-m-d H:i:s'),
                    "updated_by_multimedia" => $this->session->userdata('id_user'),
                    "id_multimedia"         => $id,
                ];
                $this->db->where('id_multimedia', $id);
                break;
            case 'publikasi':
                $data = [
                    "status_publikasi"      => 1,
                    "updated_at_publikasi"  => $dt->format('Y-m-d H:i:s'),
                    "updated_by_publikasi"  => $this->session->userdata('id_user'),
                    "id_publikasi"          => $id,
                ];
                $this->db->where('id_publikasi', $id);
                break;
        }

        $this->db->update('status', $data);
    }
}