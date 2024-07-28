<?php defined('BASEPATH') or exit('No direct script access allowed');
class Eservices extends CI_Controller
{



    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_eservice');
        $this->load->model('M_bigdata');
        $this->load->model('M_publikasi');
        $this->load->model('M_multimedia');
        $this->load->model('M_status');
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
        } elseif ($this->session->userdata('level') == 4) {
            $data['user'] = 'deveservice';
        }

        $data['databarang'] = $this->M_eservice->SemuaData();


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
        } elseif ($this->session->userdata('level') == 4) {
            $data['user'] = 'deveservice';
        }
        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['eservice'] = $this->M_eservice->getRedirectApp(explode('/', $this->uri->uri_string())[3]);
        }
        if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 4) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
        $insert_id_eservice     = $this->M_eservice->proses_tambah_data();
        $insert_id_bigdata      = $this->M_bigdata->proses_tambah_data($insert_id_eservice);
        $insert_id_publikasi    = $this->M_publikasi->proses_tambah_data();
        $insert_id_multimedia   = $this->M_multimedia->proses_tambah_data();
        $this->M_status->proses_tambah_data($insert_id_eservice, $insert_id_bigdata, $insert_id_publikasi, $insert_id_multimedia);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
            <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
            <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('eservices/view');
        }
    }

    public function hapus_data($id)
    {
        $this->M_eservice->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('eservices/view');
    }

    public function proses_edit_data()
    {
        $this->M_eservice->proses_edit_data();
        $this->M_bigdata->proses_edit_by_es_data();

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
        </div>');
        redirect('eservices/view');
    }

    public function proses_edit_status()
    {
        $this->M_eservice->proses_edit_status();

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
        </div>');
        redirect('eservices/view');
    }

    public function download1($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_eservice->download($id);
        $file = 'vendor/files/jadwal_kegiatan/' . $fileinfo['jadwal_kegiatan'];
        if (file_exists($file)) {
            force_download($file, NULL);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('eservices/view');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
        </div>');
            redirect('eservices/view');
        }
    }

    public function download2($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_eservice->download($id);
        $file = 'vendor/files/data_peserta/' . $fileinfo['data_peserta'];
        if (file_exists($file)) {
            force_download($file, NULL);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('eservices/view');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
        </div>');
            redirect('eservices/view');
        }
    }

    public function laporan_eservices()
    {
        $data['title'] = 'E-services';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        } elseif ($this->session->userdata('level') == 4) {
            $data['user'] = 'deveservice';
        } elseif ($this->session->userdata('level') == 5) {
            $data['user'] = 'devaplikasi';
        }

        $data['tahun'] = $this->M_eservice->gettahun();
        $data['eservice'] = $this->M_eservice->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_eservices', $data);
        $this->load->view('templates/footer');

    }

    function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        //tambahan
        $nama_kegiatan = $this->input->post('nama_kegiatan');

        if ($nilaifilter == 1) {

            $data['title'] = "Laporan E-Services Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama_kegiatan == null) {
                $where = array(
                    'tgl_kegiatan >=' => $tanggalawal,
                    'tgl_kegiatan <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_eservice->filterbytanggal($where);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_kegiatan >=' => $tanggalawal,
                        'tgl_kegiatan <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_eservice->filterbytanggal($where);

                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_kegiatan >=' => $tanggalawal,
                        'tgl_kegiatan <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_eservice->filterbytanggal($where);
                } else {
                    $where = array(
                        'tgl_kegiatan >=' => $tanggalawal,
                        'tgl_kegiatan <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_eservice->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_eservice', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan E-Services Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_eservice->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_eservice', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan E-Services Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama_kegiatan == null) {
                $data['datafilter'] = $this->M_eservice->filterbytahun($tahun2);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_kegiatan)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_eservice->filterbytahun2($where);
                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_kegiatan)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_eservice->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tgl_kegiatan)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_eservice->filterbytahun2($where);
                }

            }


            $this->load->view('admin/laporan/print_laporan_eservice', $data);

        }




    }




}



