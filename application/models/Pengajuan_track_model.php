<?php

class Pengajuan_track_model extends CI_Model
{
    public function insert_p_surat($data)
    {
        $query= $this->db->insert('suratpengajuan',$data);
        if($query){
            return true;
            return $query;
        }else{
            return false;
        }
    }

    public function findById($no_suratpengajuan)
    {
        $query = $this->db->get_where('suratpengajuan', ['no_suratpengajuan' => $no_suratpengajuan])->row_array();
        return $query;
    }

    public function showById($no_suratpengajuan)
    {
        $this->db->select('suratpengajuan');
        $query = $this->db->get_where('suratpengajuan', array('no_suratpengajuan' => $no_suratpengajuan));
        return $query;
    }
}
