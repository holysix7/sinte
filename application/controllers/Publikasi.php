<?php defined('BASEPATH') OR exit('No direct script access allowed');
class publikasi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_publikasi');
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
        $data['title'] = 'publikasi';

        $data['publikasi'] = $this->M_publikasi->SemuaData();

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
        $this->load->view('admin/publikasi/lihat_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_publikasi->proses_tambah_data();
        redirect('publikasi/view');
    }

    public function hapus_data($id)
    {
        $this->M_publikasi->hapus_data($id);
        redirect('publikasi/view');
    }

    public function edit_data($id)
    {
        $data['title'] = 'E-services';

        // $data['publikasi'] = $this->M_publikasi->SemuaData();
        $data['publikasi'] = $this->M_publikasi->ambil_id_publikasi($id);

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
        $this->load->view('admin/publikasi/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit_data()
    {
        $this->M_publikasi->proses_edit_data();
        redirect('publikasi/view');
    }

    public function laporan_publikasi()
    {
        $data['title'] = 'Publikasi';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
       
        $data['publikasi'] = $this->M_publikasi->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_publikasi', $data);
        $this->load->view('templates/footer');
    
    }
}



