<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('M_kp');
        $this->load->helper('pdf_helper');
    }

    public function index() {
        $id = $this->input->get('id');
        $query = $this->db->get_where('kp', array('id' => $id));
        $data['magang'] = $query->row_array();

        $this->load->view('admin/sertifikat/cetak_sertifikat', $data);
    }

    public function generate_certificate($id) {
        $data['magang'] = $this->M_kp->get_certificate_data($id);
        $html = $this->load->view('admin/sertifikat/cetak_sertifikat', $data, TRUE);

        generate_pdf($html, 'Sertifikat_' . $data['magang']['nama'], 'landscape');
    }



    public function generate($id) {

        
        $data['title'] = 'Generate Sertifikat';
        $data['magang'] = $this->M_kp->get_certificate_data($id);

        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }
        if ($this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/sertifikat/generate', $data);
        $this->load->view('templates/footer');


    }
}
?>
