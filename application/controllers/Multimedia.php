<?php defined('BASEPATH') or exit('No direct script access allowed');
class multimedia extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_multimedia');
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
        $data['title'] = 'multimedia';

        $data['multimedia'] = $this->M_multimedia->SemuaData();

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
        $this->load->view('admin/multimedia/lihat_data', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_data()
    {
        $data['title'] = 'E-services';

        $data['multimedia'] = $this->M_multimedia->SemuaData();

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
        $this->load->view('admin/multimedia/tambah_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_multimedia->proses_tambah_data();
        redirect('multimedia/view');
    }

    public function hapus_data($id)
    {
        $this->M_multimedia->hapus_data($id);
        redirect('multimedia/view');
    }

    public function edit_data($id)
    {
        $data['title'] = 'E-services';

        // $data['multimedia'] = $this->M_multimedia->SemuaData();
        $data['multimedia'] = $this->M_multimedia->ambil_id_multimedia($id);

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
        $this->load->view('admin/multimedia/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit_data()
    {
        $this->M_multimedia->proses_edit_data();
        redirect('multimedia/view');
    }
}



