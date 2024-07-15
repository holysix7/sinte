<?php

class Landingpage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
    }

    public function index()
    {
        $data['total_userterdaftar'] = $this->model_surat->total_userterdaftar();
        $data['total_kp'] = $this->model_surat->total_kp();
        $data['total_pengajuan'] = $this->model_surat->total_pengajuan();
        $data['total_tamu'] = $this->model_surat->total_tamu();
        $this->load->view('landingpage', $data);
    }
}