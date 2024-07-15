<?php defined('BASEPATH') or exit('No direct script access allowed');
class Aplikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_aplikasi');
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
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function view()
    {
        $data['title'] = 'Aplikasi';

        $data['aplikasi'] = $this->M_aplikasi->SemuaData();

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
        if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 5) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/aplikasi/lihat_data', $data);
        $this->load->view('templates/footer');
    }


    public function proses_tambah_data()
    {
        $this->M_aplikasi->proses_tambah_data();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect(base_url('aplikasi/view'));
    }

    public function hapus_data($id)
    {
        $this->M_aplikasi->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect(base_url('aplikasi/view'));
    }

    public function proses_edit_data()
    {
        $this->M_aplikasi->proses_edit_data();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect(base_url('aplikasi/view'));
    }


    public function laporan_aplikasi()
    {
        $data['title'] = 'Aplikasi';
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

        $data['tahun'] = $this->M_aplikasi->gettahun();
        $data['aplikasi'] = $this->M_aplikasi->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_aplikasi', $data);
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
        $nama_aplikasi = $this->input->post('nama_aplikasi');

        if ($nilaifilter == 1) {

            $data['title'] = "Laporan Aplikasi Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama_aplikasi == null) {
                $where = array(
                    'tgl_aplikasi >=' => $tanggalawal,
                    'tgl_aplikasi <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_aplikasi->filterbytanggal($where);
            } else {

                if ($nama_aplikasi == null) {
                    $where = array(
                        'tgl_aplikasi >=' => $tanggalawal,
                        'tgl_aplikasi <=' => $tanggalakhir,
                        'nama_aplikasi' => $nama_aplikasi,
                    );
                    $data['datafilter'] = $this->M_aplikasi->filterbytanggal($where);

                } else if ($nama_aplikasi == null) {
                    $where = array(
                        'tgl_aplikasi >=' => $tanggalawal,
                        'tgl_aplikasi <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_aplikasi->filterbytanggal($where);
                } else {
                    $where = array(
                        'tgl_aplikasi >=' => $tanggalawal,
                        'tgl_aplikasi <=' => $tanggalakhir,
                        'nama_aplikasi' => $nama_aplikasi,
                    );
                    $data['datafilter'] = $this->M_aplikasi->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_aplikasi', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Aplikasi Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_aplikasi->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_aplikasi', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Aplikasi Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama_aplikasi == null) {
                $data['datafilter'] = $this->M_aplikasi->filterbytahun($tahun2);
            } else {

                if ($nama_aplikasi == null) {
                    $where = array(
                        'YEAR(tgl_aplikasi)' => $tahun2,
                        'nama_aplikasi' => $nama_aplikasi,
                    );

                    $data['datafilter'] = $this->M_aplikasi->filterbytahun2($where);
                } else if ($nama_aplikasi == null) {
                    $where = array(
                        'YEAR(tgl_aplikasi)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_aplikasi->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tgl_aplikasi)' => $tahun2,
                        'nama_aplikasi' => $nama_aplikasi,
                    );

                    $data['datafilter'] = $this->M_aplikasi->filterbytahun2($where);
                }

            }

            $this->load->view('admin/laporan/print_laporan_aplikasi', $data);

        }
    }



}



