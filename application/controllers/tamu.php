<?php defined('BASEPATH') or exit('No direct script access allowed');
class Tamu extends CI_Controller
{

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
        $this->load->view('templates/remove-alert');
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

        $data['tahun'] = $this->M_tamu->gettahun();
        $data['tamu'] = $this->M_tamu->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_tamu', $data);
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
        $nama = $this->input->post('nama');

        if ($nilaifilter == 1) {

            $data['title'] = "Laporan Tamu Kunjungan Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama == null) {
                $where = array(
                    'tanggal_kunjungan >=' => $tanggalawal,
                    'tanggal_kunjungan <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_tamu->filterbytanggal($where);
            } else {

                if ($nama == null) {
                    $where = array(
                        'tanggal_kunjungan >=' => $tanggalawal,
                        'tanggal_kunjungan <=' => $tanggalakhir,
                        'nama' => $nama,
                    );
                    $data['datafilter'] = $this->M_tamu->filterbytanggal($where);

                } else if ($nama == null) {
                    $where = array(
                        'tanggal_kunjungan >=' => $tanggalawal,
                        'tanggal_kunjungan <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_tamu->filterbytanggal($where);
                } else {
                    $where = array(
                        'tanggal_kunjungan >=' => $tanggalawal,
                        'tanggal_kunjungan <=' => $tanggalakhir,
                        'nama' => $nama,
                    );
                    $data['datafilter'] = $this->M_tamu->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_tamu', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Tamu Kunjungan Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_tamu->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_tamu', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Tamu Kunjungan Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama == null) {
                $data['datafilter'] = $this->M_tamu->filterbytahun($tahun2);
            } else {

                if ($nama == null) {
                    $where = array(
                        'YEAR(tanggal_kunjungan)' => $tahun2,
                        'nama' => $nama,
                    );

                    $data['datafilter'] = $this->M_tamu->filterbytahun2($where);
                } else if ($nama == null) {
                    $where = array(
                        'YEAR(tanggal_kunjungan)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_tamu->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tanggal_kunjungan)' => $tahun2,
                        'nama' => $nama,
                    );

                    $data['datafilter'] = $this->M_tamu->filterbytahun2($where);
                }

            }


            $this->load->view('admin/laporan/print_laporan_tamu', $data);

        }




    }
}



