<?php defined('BASEPATH') or exit('No direct script access allowed');
class Bigdata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_bigdata');
        $this->load->model('M_fotokegiatan');
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
        } elseif ($this->session->userdata('level') == 5) {
            $data['user'] = 'devaplikasi';
        } elseif ($this->session->userdata('level') == 6) {
            $data['user'] = 'devbigdata';
        } elseif ($this->session->userdata('level') == 7) {
            $data['user'] = 'devmultimedia';
        } elseif ($this->session->userdata('level') == 8) {
            $data['user'] = 'devpublikasi';
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
        } elseif ($this->session->userdata('level') == 4) {
            $data['user'] = 'deveservice';
        } elseif ($this->session->userdata('level') == 5) {
            $data['user'] = 'devaplikasi';
        } elseif ($this->session->userdata('level') == 6) {
            $data['user'] = 'devbigdata';
        } elseif ($this->session->userdata('level') == 7) {
            $data['user'] = 'devmultimedia';
        } elseif ($this->session->userdata('level') == 8) {
            $data['user'] = 'devpublikasi';
        }


        if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 6) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }


        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['bigdata'] = $this->M_bigdata->getRedirectKp(explode('/', $this->uri->uri_string())[3]);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/bigdata/lihat_data', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/remove-alert');
    }

    public function detailFoto($id)
    {
        $data['title'] = 'BigData';

        $data['bigdata'] = $this->M_bigdata->rowData($id);
        $data['foto']    = $this->M_fotokegiatan->getByBDId($id);

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
        } elseif ($this->session->userdata('level') == 6) {
            $data['user'] = 'devbigdata';
        } elseif ($this->session->userdata('level') == 7) {
            $data['user'] = 'devmultimedia';
        } elseif ($this->session->userdata('level') == 8) {
            $data['user'] = 'devpublikasi';
        }


        $this->load->view('templates/header', $data);
        $this->load->view('admin/bigdata/lihat_foto', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/remove-alert');
    }


    public function proses_tambah_data()
    {
        $this->M_bigdata->proses_tambah_data();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect('bigdata/view');
    }

    public function proses_uploadfotokegiatan_multi($id_bigdata)
    {
        $upload_path = 'vendor/files/foto_kegiatan/' . $id_bigdata;
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
    }

    public function proses_uploadfotokegiatan()
    {
        $upload_path = 'vendor/files/foto_kegiatan/';
        $config['upload_path'] = $upload_path;
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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('bigdata/view');
        }
    }

    public function hapus_data($id_bigdata)
    {
        $this->M_bigdata->hapus_data($id_bigdata);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('bigdata/view');
    }


    public function proses_edit_data()
    {
        $this->M_bigdata->proses_edit_data();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect('bigdata/view');
    }



    public function download1($id_bigdata)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_bigdata->download($id_bigdata);
        $file = 'vendor/files/foto_kegiatan/' . $fileinfo['foto_kegiatan'];
        if (file_exists($file)) {
            force_download($file, NULL);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('bigdata/view');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
        </div>');
            redirect('bigdata/view');
        }
    }

    public function uploadDetailFoto()
    {
        $id_bigdata = $this->input->post('id_bigdata');
        $enc_bigdata = base64_encode($this->input->post('id_bigdata'));
        $upload_path = "vendor/files/foto_kegiatan/{$enc_bigdata}";
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        $config['upload_path'] = $upload_path;
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
            $array = [
                'id_bigdata' => $id_bigdata,
                'nama' => $foto_kegiatan,
                'path' => $upload_path,
            ];
            $this->M_fotokegiatan->simpanDetailFoto($array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect("bigdata/detailFoto/{$id_bigdata}");
        }
    }

    public function downloadDetail($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_fotokegiatan->getById($id);
        $file = $fileinfo->path . '/' . $fileinfo->nama;
        if (file_exists($file)) {
            force_download($file, NULL);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('bigdata/view');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
        </div>');
            redirect("bigdata/detailFoto/{$fileinfo->id_bigdata}");
        }
    }

    public function download2($id_bigdata)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_bigdata->download($id_bigdata);
        $file = 'vendor/files/bigdata_peserta/' . $fileinfo['bigdata_peserta'];
        if (file_exists($file)) {
            force_download($file, NULL);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('bigdata/view');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
        </div>');
            redirect('bigdata/view');
        }
    }

    public function laporan_bigdata()
    {
        $data['title'] = 'Bigdata';
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
        } elseif ($this->session->userdata('level') == 6) {
            $data['user'] = 'devbigdata';
        }

        $data['bigdata'] = $this->M_bigdata->SemuaData();
        $data['tahun'] = $this->M_bigdata->gettahun();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_bigdata', $data);
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

            $data['title'] = "Laporan Bigdata Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama_kegiatan == null) {
                $where = array(
                    'tgl_kegiatan >=' => $tanggalawal,
                    'tgl_kegiatan <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_bigdata->filterbytanggal($where);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_kegiatan >=' => $tanggalawal,
                        'tgl_kegiatan <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_bigdata->filterbytanggal($where);

                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_kegiatan >=' => $tanggalawal,
                        'tgl_kegiatan <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_bigdata->filterbytanggal($where);
                } else {
                    $where = array(
                        'tgl_kegiatan >=' => $tanggalawal,
                        'tgl_kegiatan <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_bigdata->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_bigdata', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Bigdata Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_bigdata->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_bigdata', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Bigdata Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama_kegiatan == null) {
                $data['datafilter'] = $this->M_bigdata->filterbytahun($tahun2);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_kegiatan)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_bigdata->filterbytahun2($where);
                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_kegiatan)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_bigdata->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tgl_kegiatan)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_bigdata->filterbytahun2($where);
                }

            }


            $this->load->view('admin/laporan/print_laporan_bigdata', $data);

        }




    }

}



