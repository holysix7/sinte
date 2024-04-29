<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_kp');
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }




    public function view()
    {
        $data['title'] = 'Kerja Praktik';


        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['kp'] = $this->M_kp->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kp/lihat_data', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_data()
    {
        $data['title'] = 'Kerja Praktik';

        $data['kp'] = $this->M_kp->SemuaData();

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
                <h5><i class="icon fas fa-times"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kp/tambah_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_kp->proses_tambah_data();
        redirect('kp/view');
    }

    public function hapus_data($id)
    {
        $this->M_kp->hapus_data($id);
        redirect('kp/view');
    }

    public function proses_edit_data()
    {
        $this->M_kp->proses_edit_data();
        redirect('kp/view');
    }
}



