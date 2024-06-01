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
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/multimedia/lihat_data', $data);
        $this->load->view('templates/footer');
    }

    public function proses_tambah_data()
    {
        $this->M_multimedia->proses_tambah_data();
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect('multimedia/view');
    }

    public function hapus_data($id)
    {
        $this->M_multimedia->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('multimedia/view');
    }

    public function edit_data($id)
    {
        $data['title'] = 'Multimedia	';

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
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
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
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect('multimedia/view');
    }

    public function laporan_multimedia()
    {
        $data['title'] = 'Multimedia';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['multimedia'] = $this->M_multimedia->SemuaData();
        $data['tahun'] = $this->M_multimedia->gettahun();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_multimedia', $data);
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

            $data['title'] = "Laporan Multimedia Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama_kegiatan == null) {
                $where = array(
                    'tgl_multimedia	 >=' => $tanggalawal,
                    'tgl_multimedia	 <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_multimedia->filterbytanggal($where);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_multimedia	 >=' => $tanggalawal,
                        'tgl_multimedia	 <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_multimedia->filterbytanggal($where);

                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'tgl_multimedia	 >=' => $tanggalawal,
                        'tgl_multimedia	 <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_multimedia->filterbytanggal($where);
                } else {
                    $where = array(
                        'tgl_multimedia	 >=' => $tanggalawal,
                        'tgl_multimedia	 <=' => $tanggalakhir,
                        'nama_kegiatan' => $nama_kegiatan,
                    );
                    $data['datafilter'] = $this->M_multimedia->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_multimedia', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Multimedia Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_multimedia->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_multimedia', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Multimedia Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama_kegiatan == null) {
                $data['datafilter'] = $this->M_multimedia->filterbytahun($tahun2);
            } else {

                if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_multimedia)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_multimedia->filterbytahun2($where);
                } else if ($nama_kegiatan == null) {
                    $where = array(
                        'YEAR(tgl_multimedia)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_multimedia->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tgl_multimedia)' => $tahun2,
                        'nama_kegiatan' => $nama_kegiatan,
                    );

                    $data['datafilter'] = $this->M_multimedia->filterbytahun2($where);
                }

            }


            $this->load->view('admin/laporan/print_laporan_multimedia', $data);

        }




    }
}



