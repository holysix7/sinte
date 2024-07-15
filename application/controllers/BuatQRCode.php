<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuatQRCode extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_kp');
        $this->load->helper('url');
        $this->load->library('form_validation');
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
    }

    public function generate_qr() {
        if ($this->input->get('nomor') && $this->input->get('nomor') != '') {
            $no_induk = $this->input->get('no_induk');
            $nomor = $this->input->get('nomor');

            // Load the custom Qrcode_lib library
            $this->load->library('qrcode_lib');

            // Folder where QR Code files will be stored
            $tempdir = "temp/";

            // Create directory if it doesn't exist
            if (!file_exists($tempdir)){
                mkdir($tempdir);
            }

            // QR Code parameters
            $isi_teks = $nomor;
            $namafile = $tempdir . $no_induk . ".png";
            $quality = 'H'; // 'L', 'M', 'Q', 'H'
            $ukuran = 5; // 1 to 10
            $padding = 2;

            // Generate QR Code using the custom library
            $this->qrcode_lib->generate($isi_teks, $namafile, $quality, $ukuran, $padding);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Generate</h5>
            </div>');
            redirect('kp/view'); // Adjust this to your actual redirect URL
        } else {
            redirect('kp/view'); // Adjust this to your actual redirect URL
        }
    }
    
    public function index()
    {
        $data['title'] = 'Generate Sertifikat';

        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['kp'] = $this->M_kp->SemuaData();


        if ($this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kp/lihat_data', $data);
        $this->load->view('templates/footer');
    }


}