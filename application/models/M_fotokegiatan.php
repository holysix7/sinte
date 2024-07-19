<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_fotokegiatan extends CI_Model
{
    public function getByBDId($id){
        return $this->db->get_where('fotokegiatan', ['id_bigdata' => $id])->result_array();
    }

    public function getById($id){
        return $this->db->get_where('fotokegiatan', ['id' => $id])->row();
    }

    public function simpanDetailFoto($array){
        return $this->db->insert('fotokegiatan', $array);
    }
}