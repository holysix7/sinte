<?php defined('BASEPATH') or exit('No direct script access allowed');
class Eservices extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_eservice');
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
        $data['title'] = 'E-services';

        $data['eservice'] = $this->M_eservice->SemuaData();

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
        $this->load->view('admin/eservices/lihat_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_eservice->proses_tambah_data();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect('eservices/view');
    }

    public function proses_uploadjadwalkegiatan()
    {
        $config['upload_path'] = 'vendor/files/jadwal_kegiatan/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|pdf|doc|docx|xls|xlsx|rar|zip|tar|pptx|ppt';
        $config['max_size'] = 1000000;
        $config['max_width'] = 1000000;
        $config['max_height'] = 1000000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
            $jadwal_kegiatan = $this->upload->data();
            $jadwal_kegiatan = $jadwal_kegiatan['file_name'];

            $data = array(
                'jadwal_kegiatan' => $jadwal_kegiatan,

            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('eservice', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('eservices/view');
        }
    }

    public function proses_uploaddatapeserta()
    {
        $config['upload_path'] = 'vendor/files/data_peserta/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|pdf|doc|docx|xls|xlsx|rar|zip|tar|pptx|ppt';
        $config['max_size'] = 1000000;
        $config['max_width'] = 1000000;
        $config['max_height'] = 1000000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile1')) {
            echo "Gagal Tambah";
        } else {
            $data_peserta = $this->upload->data();
            $data_peserta = $data_peserta['file_name'];

            $data = array(
                'data_peserta' => $data_peserta,

            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('eservice', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('eservices/view');
        }
    }

    public function hapus_data($id)
    {
        $this->M_eservice->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('eservices/view');
    }

    public function proses_edit_data()
    {
        $data = [
            "tgl_kegiatan" => $this->input->post('tgl_kegiatan'),
            "nama_kegiatan" => $this->input->post('nama_kegiatan'),
            "jumlah_peserta" => $this->input->post('jumlah_peserta'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('eservice', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
        </div>');
        redirect('eservices/view');
    }

    public function download1($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_eservice->download($id);
        $file = 'vendor/files/jadwal_kegiatan/' . $fileinfo['jadwal_kegiatan'];
        force_download($file, NULL);
    }

    public function download2($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_eservice->download($id);
        $file = 'vendor/files/data_peserta/' . $fileinfo['data_peserta'];
        force_download($file, NULL);
    }

    public function laporan_eservices()
    {
        $data['title'] = 'E-services';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
       
        $data['eservice'] = $this->M_eservice->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_eservices', $data);
        $this->load->view('templates/footer');
    
    }



}



