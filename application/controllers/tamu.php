<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tamu extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_tamu');

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
        $data['title'] = 'Kunjungan Tamu';


        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }
        
        $data['tamu'] = $this->M_tamu->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/tamu/lihat_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_tamu->proses_tambah_data();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect('tamu/view');
    }


    public function proses_tambah_data2()
    {
        $this->M_tamu->proses_tambah_data2();
        redirect('landingpage');
    }

    public function hapus_data($id)
    {
        $this->M_tamu->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('tamu/view');
    }

    public function proses_edit_data()
    {
        $this->M_tamu->proses_edit_data();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect('tamu/view');
    }

    public function laporan_tamu()
    {
        $data['title'] = 'Kunjungan Tamu';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
       
        $data['tamu'] = $this->M_tamu->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_tamu', $data);
        $this->load->view('templates/footer');
    
    }
}



