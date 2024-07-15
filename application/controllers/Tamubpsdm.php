<?php

class Tamubpsdm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
    }
    public function index()
    {

        $data['total_kunjungantamu'] = $this->M_tamu->total_kunjungantamu();
        $data['today_count'] = $this->M_tamu->count_today_records();
        $data['month_count'] = $this->M_tamu->count_current_month_records();
        $data['year_count'] = $this->M_tamu->count_current_year_records();
        $data['name_data'] = $this->M_tamu->get_name_data();
        $this->load->view('tamubpsdm', $data);
    }
}