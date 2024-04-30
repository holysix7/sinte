<?php defined('BASEPATH') or exit('No direct script access allowed');
class Bigdata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_bigdata');
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
        $data['title'] = 'BigData';

        $data['bigdata'] = $this->M_bigdata->SemuaData();

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
        $this->load->view('admin/bigdata/lihat_data', $data);
        $this->load->view('templates/footer');
    }


    public function proses_tambah_data()
    {
        $this->M_bigdata->proses_tambah_data();
        redirect('bigdata/view');
    }

    public function proses_uploadfotokegiatan()
    {
        $config['upload_path'] = 'vendor/files/foto_kegiatan/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
            $foto_kegiatan = $this->upload->data();
            $foto_kegiatan = $foto_kegiatan['file_name'];

            $data = array(
                'foto_kegiatan' => $foto_kegiatan,

            );
            $this->db->where('id_bigdata', $this->input->post('id_bigdata'));
            $this->db->update('bigdata', $data);
            redirect('bigdata/view');
        }
    }

    public function proses_uploaddatapeserta()
    {
        $config['upload_path'] = 'vendor/files/bigdata_peserta/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|rar|zip|tar|pptx|ppt';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile1')) {
            echo "Gagal Tambah";
        } else {
            $bigdata_peserta = $this->upload->data();
            $bigdata_peserta = $bigdata_peserta['file_name'];

            $data = array(
                'bigdata_peserta' => $bigdata_peserta,

            );
            $this->db->where('id_bigdata', $this->input->post('id_bigdata'));
            $this->db->update('bigdata', $data);
            redirect('bigdata/view');
        }
    }

    public function hapus_data($id_bigdata)
    {
        $this->M_bigdata->hapus_data($id_bigdata);
        redirect('bigdata/view');
    }

    public function edit_data($id_bigdata)
    {
        $data['title'] = 'Bigdata';

        // $data['bigdata'] = $this->M_bigdata->SemuaData();
        $data['bigdata'] = $this->M_bigdata->ambil_id_bigdata($id_bigdata);

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
        $this->load->view('admin/bigdata/edit_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit_data()
    {
        $this->M_bigdata->proses_edit_data();
        redirect('bigdata/view');
    }



    public function download1($id_bigdata)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_bigdata->download($id_bigdata);
        $file = 'vendor/files/foto_kegiatan/' . $fileinfo['foto_kegiatan'];
        force_download($file, NULL);
    }

    public function download2($id_bigdata)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_bigdata->download($id_bigdata);
        $file = 'vendor/files/bigdata_peserta/' . $fileinfo['bigdata_peserta'];
        force_download($file, NULL);
    }

    public function laporan_bigdata()
    {
        $data['title'] = 'Bigdata';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
       
        $data['bigdata'] = $this->M_bigdata->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_bigdata', $data);
        $this->load->view('templates/footer');
    
    }

}



