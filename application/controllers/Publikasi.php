<?php defined('BASEPATH') or exit('No direct script access allowed');
class publikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_publikasi');
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
        $data['title'] = 'publikasi';

        $data['publikasi'] = $this->M_publikasi->SemuaData();

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
        if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 8) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['publikasi'] = $this->M_publikasi->getRedirectApp(explode('/', $this->uri->uri_string())[3]);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/publikasi/lihat_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_publikasi->proses_tambah_data();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect('publikasi/view');
    }

    public function hapus_data($id)
    {
        $this->M_publikasi->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('publikasi/view');
    }

    public function edit_data($id)
    {
        $data['title'] = 'Publikasi';

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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
        $this->M_status->proses_edit_data('publikasi', $this->input->post('id'));
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect('publikasi/view');
    }

    public function proses_edit_status()
    {
        $this->M_publikasi->proses_edit_status();

        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
        </div>');
        redirect('publikasi/view');
    }
    public function laporan_publikasi()
    {
        $data['title'] = 'Publikasi';
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

        $data['tahun'] = $this->M_publikasi->gettahun();
        $data['publikasi'] = $this->M_publikasi->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_publikasi', $data);
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

            $data['title'] = "Laporan Publikasi Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama_kegiatan == null) {
                $where = array(
                    'tgl_publikasi >=' => $tanggalawal,
                    'tgl_publikasi <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_publikasi->filterbytanggal($where);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_publikasi >=' => $tanggalawal,
                        'tgl_publikasi <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_publikasi->filterbytanggal($where);

                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_publikasi >=' => $tanggalawal,
                        'tgl_publikasi <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_publikasi->filterbytanggal($where);
                } else {
                    $where = array(
                        'tgl_publikasi >=' => $tanggalawal,
                        'tgl_publikasi <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_publikasi->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_publikasi', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Publikasi Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_publikasi->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_publikasi', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Publikasi Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama_kegiatan == null) {
                $data['datafilter'] = $this->M_publikasi->filterbytahun($tahun2);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_publikasi)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_publikasi->filterbytahun2($where);
                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_publikasi)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_publikasi->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tgl_publikasi)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_publikasi->filterbytahun2($where);
                }

            }


            $this->load->view('admin/laporan/print_laporan_publikasi', $data);

        }




    }

}



