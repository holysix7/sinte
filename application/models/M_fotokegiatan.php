<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_fotokegiatan extends CI_Model
{
    public function getByBDId($id){
        $this->db->order_by('id', 'DESC');
        $this->db->where('id_bigdata', $id);
        $query = $this->db->get('fotokegiatan');
        return $query->result_array();
    }

    public function getById($id){
        $this->db->order_by('id', 'DESC');
        $this->db->where('id', $id);
        $query = $this->db->get('fotokegiatan');
        return $query->row();
    }

    public function simpanDetailFoto($array){
        return $this->db->insert('fotokegiatan', $array);
    }
}