<?php

/**
 *
 */
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
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

        $today = date('Y-m-d');
        $sm_today = "tanggal_diterima='$today'";
        $sp_today = "tanggal_pengajuan='$today'";
        $data['count_sm'] = $this->model_surat->countdata('suratmasuk')->result();
        $data['count_sp'] = $this->model_surat->countdata('suratpengajuan')->result();
        $data['sm_today'] = $this->model_surat->getdatawithadd('suratmasuk', $sm_today)->result();
        $data['sp_today'] = $this->model_surat->getdatawithadd('suratpengajuan', $sp_today)->result();
        $data['count_indeks'] = $this->model_surat->countother('indeks')->result();
        $data['count_users'] = $this->model_surat->countother('user')->result();
        $data['count_kp'] = $this->model_surat->countother('kp')->result();
        $data['count_tamu'] = $this->model_surat->countother('tamu')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }


    
    // kerja praktik pengajuan

    public function suratpengajuan()
    {
        $data['title'] = 'Surat Pengajuan';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $data['kp_pengajuan'] = $this->model_surat->kp_pengajuan();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/suratpengajuan', $data);
        $this->load->view('templates/footer');
    }


    public function tambahpengajuan()
    {
        $data['title'] = 'Surat Pengajuan';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $data['kp_pengajuan'] = $this->model_surat->kp_pengajuan();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/tambahpengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpengajuan_datadiri()
    {
        $data['title'] = 'Surat Pengajuan';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $data['kp_pengajuan'] = $this->model_surat->kp_pengajuan();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/tambahpengajuan_datadiri', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpengajuan_validasi()
    {
        $data['title'] = 'Surat Pengajuan';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $today = date('Y-m-d');
        $kp_today = "tanggal_pendataan='$today'";
        $sp_today = "tanggal_pengajuan='$today'";
        $data['kp_today'] = $this->model_surat->getdatawithadd1('kp', $kp_today);
        $data['sp_today'] = $this->model_surat->getdatawithadd2('suratpengajuan', $sp_today);
        // $data['sp_today'] = $this->model_surat->getdatawithadd('suratpengajuan', $sp_today)->result();

        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $data['kp_pengajuan'] = $this->model_surat->kp_pengajuan();


        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/tambahpengajuan_validasi', $data);
        $this->load->view('templates/footer');
    }

    
 

    public function tambahsp()
    {
        $no_suratpengajuan = htmlspecialchars($this->input->post('no_suratpengajuan'));
        $id_indeks = htmlspecialchars($this->input->post('id_indeks'));
        $asal_instansi= htmlspecialchars($this->input->post('asal_instansi'));
        $tanggal_pengajuan = htmlspecialchars($this->input->post('tanggal_pengajuan'));
        $tgl_masuk = htmlspecialchars($this->input->post('tgl_masuk'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $namaberkas_suratpengajuan = $_FILES['berkas_suratpengajuan']['name'];
        $exp = explode('.', $namaberkas_suratpengajuan);
        $typeberkas_suratpengajuan = end($exp);
        $berkas_suratpengajuan = uniqid() . '.' . $typeberkas_suratpengajuan;

        $no_user = $this->session->userdata('id_user');


        $cek_no = $this->model_surat->getdatawithadd('suratpengajuan', 'no_suratpengajuan="' . $no_suratpengajuan . '"')->row_array();
        if (!$cek_no) {
            $array = [
                'id_suratpengajuan' => null,
                'no_suratpengajuan' => $no_suratpengajuan,
                'asal_instansi' => $asal_instansi,
                'id_indeks' => $id_indeks,
                'tanggal_pengajuan' => $tanggal_pengajuan,
                'tgl_masuk ' => $tgl_masuk ,
                'tgl_akhir' => $tgl_akhir,
                'keterangan' => $keterangan,
                'berkas_suratpengajuan' => $berkas_suratpengajuan,
                'no_user' => $no_user
            ];
            if ($berkas_suratpengajuan != null) {
                $config['upload_path'] = 'vendor/files/suratpengajuan/';
                $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratpengajuan;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('berkas_suratpengajuan')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/tambahpengajuan');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->adddata('suratpengajuan', $array);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                        </div>');
                    redirect('admin/tambahpengajuan_datadiri');
                }
            } else {
                $this->model_surat->adddata('suratpengajuan', $array);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                    </div>');
                redirect('admin/tambahpengajuan_datadiri');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Nomor surat sudah ada!</h5>
                </div>');
            redirect('admin/tambahpengajuan');
        }
    }

    public function downloadbalasan($id_suratpengajuan)
    {
        $this->load->helper('download');
        $fileinfo = $this->model_surat->downloadsuratbalasan($id_suratpengajuan);
        $file = 'vendor/files/surat_balasan/' . $fileinfo['berkas_suratbalasan'];
        if (file_exists($file)) {
            force_download($file, NULL);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('admin/suratpengajuan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
        </div>');
            redirect('admin/suratpengajuan');
        }
    }


    public function proses_uploadsuratbalasan()
    {
        $config['upload_path'] = 'vendor/files/surat_balasan/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|pdf|doc|docx|xls|xlsx|rar|zip|tar|pptx|ppt';
        $config['max_size'] = 1000000;
        $config['max_width'] = 1000000;
        $config['max_height'] = 1000000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
            $berkas_suratbalasan = $this->upload->data();
            $berkas_suratbalasan = $berkas_suratbalasan['file_name'];

            $data = array(
                'berkas_suratbalasan' => $berkas_suratbalasan,

            );
            $this->db->where('id_suratpengajuan ', $this->input->post('id_suratpengajuan'));
            $this->db->update('suratpengajuan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('admin/suratpengajuan');
        }
    }

    public function editstatus()
    {
        $this->model_surat->editstatus();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect(base_url('admin/suratpengajuan'));
    }

    public function editsp()
    {
        $id_suratpengajuan = $this->input->post('id_suratpengajuan');
        $no_suratpengajuan = htmlspecialchars($this->input->post('no_suratpengajuan'));
        $id_indeks = htmlspecialchars($this->input->post('id_indeks'));
        $asal_instansi= htmlspecialchars($this->input->post('asal_instansi'));
        $tanggal_pengajuan = htmlspecialchars($this->input->post('tanggal_pengajuan'));
        $tgl_masuk = htmlspecialchars($this->input->post('tgl_masuk'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $namaberkas_suratpengajuan = $_FILES['berkas_suratpengajuan']['name'];
        $exp = explode('.', $namaberkas_suratpengajuan);
        $typeberkas_suratpengajuan = end($exp);
        $berkas_suratpengajuan = uniqid() . '.' . $typeberkas_suratpengajuan;

   

        $cek_no = $this->model_surat->getdatawithadd('suratpengajuan', 'no_suratpengajuan="' . $no_suratpengajuan . '" AND id_suratpengajuan!=' . $id_suratpengajuan)->row_array();

        // jika no surat benar
        if (!$cek_no) {
            // jika berkas kosong
            if ($namaberkas_suratpengajuan != null) {
                $array = [
                    'no_suratpengajuan' => $no_suratpengajuan,
                    'asal_instansi' => $asal_instansi,
                    'id_indeks' => $id_indeks,
                    'tanggal_pengajuan' => $tanggal_pengajuan,
                    'tgl_masuk ' => $tgl_masuk ,
                    'tgl_akhir' => $tgl_akhir,
                    'keterangan' => $keterangan,
                    'berkas_suratpengajuan' => $berkas_suratpengajuan
                   
                ];

                $config['upload_path'] = 'vendor/files/suratpengajuan/';
                $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratpengajuan;

                $this->load->library('upload', $config);
                // jika upload gagal
                if (!$this->upload->do_upload('berkas_suratpengajuan')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/suratpengajuan');
                } else {
                    // jika berhasil

                    $this->upload->do_upload();
                    $this->model_surat->updatedata('kerjapraktik', $array, array('id_suratpengajuan' => $id_suratpengajuan));
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
                        </div>');
                    redirect('admin/suratpengajuan');
                }
            } else {
                $array = [
                    'no_suratpengajuan' => $no_suratpengajuan,
                    'asal_instansi' => $asal_instansi,
                    'id_indeks' => $id_indeks,
                    'tanggal_pengajuan' => $tanggal_pengajuan,
                    'tgl_masuk ' => $tgl_masuk ,
                    'tgl_akhir' => $tgl_akhir,
                    'keterangan' => $keterangan,
                    'berkas_suratpengajuan' => $berkas_suratpengajuan
                ];
                // tanpa upload berkas
                $this->model_surat->updatedata('suratpengajuan', $array, array('id_suratpengajuan' => $id_suratpengajuan));
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
                    </div>');
                redirect('admin/suratpengajuan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Nomor surat sudah ada!</h5>
                </div>');
            redirect('admin/suratpengajuan');
        }
    }


    public function hapus_datasp($id_suratpengajuan)
    {
        $this->model_surat->hapus_datasp($id_suratpengajuan, 'suratpengajuan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
        Data Surat Pengajuan Berhasil Dihapus!
        </div>');
        redirect('admin/suratpengajuan');
    }

    public function hapus_datasm($id_suratmasuk)
    {
        $this->model_surat->hapus_datasm($id_suratmasuk, 'suratmasuk');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
        Data Surat Masuk Berhasil Dihapus!
        </div>');
        redirect('admin/suratpengajuan');
    }


    public function hapus_dataindex($id_indeks)
    {
        $this->model_surat->hapus_dataindex($id_indeks);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
        Data Indeks Berhasil Dihapus!
        </div>');
        redirect('admin/indeks');
    }

    public function hapususer($id_user)
    {
        $this->model_surat->hapususer($id_user);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i>  Data Users Berhasil Dihapus!</h5>
        </div>');
        redirect('admin/users');
    }


    public function laporan_suratpengajuan()
    {
        $data['title'] = 'Surat Pengajuan';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['tahun'] = $this->model_surat->gettahun();
        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();

    

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_suratpengajuan', $data);
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
        $no_suratpengajuan = $this->input->post('no_suratpengajuan');

        if ($nilaifilter == 1) {

            $data['title'] = "Laporan Surat Pengajuan Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($no_suratpengajuan == null) {
                $where = array(
                    'tanggal_pengajuan >=' => $tanggalawal,
                    'tanggal_pengajuan <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->model_surat->filterbytanggal($where);
            } else {

                if ($no_suratpengajuan == null) {
                    $where = array(
                        'tanggal_pengajuan >=' => $tanggalawal,
                        'tanggal_pengajuan <=' => $tanggalakhir,
                        'no_suratpengajuan' => $no_suratpengajuan,
                    );
                    $data['datafilter'] = $this->model_surat->filterbytanggal($where);

                } else if ($no_suratpengajuan == null) {
                    $where = array(
                        'tanggal_pengajuan >=' => $tanggalawal,
                        'tanggal_pengajuan <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->model_surat->filterbytanggal($where);
                } else {
                    $where = array(
                        'tanggal_pengajuan >=' => $tanggalawal,
                        'tanggal_pengajuan <=' => $tanggalakhir,
                        'no_suratpengajuan' => $no_suratpengajuan,
                    );
                    $data['datafilter'] = $this->model_surat->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_suratpengajuan', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Surat Pengajuan Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->model_surat->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_suratpengajuan', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Surat Pengajuan Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($no_suratpengajuan == null) {
                $data['datafilter'] = $this->model_surat->filterbytahun($tahun2);
            } else {

                if ($no_suratpengajuan == null) {
                    $where = array(
                        'YEAR(tanggal_pengajuan)' => $tahun2,
                        'no_suratpengajuan' => $no_suratpengajuan,
                    );

                    $data['datafilter'] = $this->model_surat->filterbytahun2($where);
                } else if ($no_suratpengajuan == null) {
                    $where = array(
                        'YEAR(tanggal_pengajuan)' => $tahun2,
                    );

                    $data['datafilter'] = $this->model_surat->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tanggal_pengajuan)' => $tahun2,
                        'no_suratpengajuan' => $no_suratpengajuan,
                    );

                    $data['datafilter'] = $this->model_surat->filterbytahun2($where);
                }

            }


            $this->load->view('admin/laporan/print_laporan_suratpengajuan', $data);

        }




    }

       // suratmasuk
       public function suratmasuk()
       {
           $data['title'] = 'Surat Masuk';
           if ($this->session->userdata('level') == 1) {
               $data['user'] = 'superadmin';
           } elseif ($this->session->userdata('level') == 2) {
               $data['user'] = 'admin';
           } elseif ($this->session->userdata('level') == 3) {
               $data['user'] = 'userskp';
           }
   
           $data['suratmasuk'] = $this->model_surat->getdata('suratmasuk')->result();
           $data['indeks'] = $this->model_surat->getother('indeks')->result();
   
   
           $this->load->view('templates/header', $data);
           $this->load->view('admin/surat/suratmasuk', $data);
           $this->load->view('templates/footer');
       }
   
       public function tambahsm()
       {
           $no_suratmasuk = $this->input->post('no_suratmasuk');
           $judul_suratmasuk = $this->input->post('judul_suratmasuk');
           $asal_surat = $this->input->post('asal_surat');
           $namaberkas_suratmasuk = $_FILES['berkas_suratmasuk']['name'];
           $exp = explode('.', $namaberkas_suratmasuk);
           $typenamaberkas_suratmasuk = end($exp);
           $berkas_suratmasuk = uniqid() . '.' . $typenamaberkas_suratmasuk;
           $tanggal_masuk = $this->input->post('tanggal_masuk');
           $tanggal_diterima = $this->input->post('tanggal_diterima');
           $id_indeks = $this->input->post('id_indeks');
           $keterangan = $this->input->post('keterangan');
   
           $query = $this->db->get_where('suratmasuk', ['no_suratmasuk' => $no_suratmasuk])->row_array();
   
           if ($query) {
               $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-trash"></i> Nomor surat sudah ada!</h5>
                   </div>');
               redirect('admin/suratmasuk');
           } elseif ($namaberkas_suratmasuk == null) {
               $array = [
                   'id_suratmasuk' => null,
                   'no_suratmasuk' => $no_suratmasuk,
                   'judul_suratmasuk' => $judul_suratmasuk,
                   'asal_surat' => $asal_surat,
                   'tanggal_masuk' => $tanggal_masuk,
                   'tanggal_diterima' => $tanggal_diterima,
                   'id_indeks' => $id_indeks,
                   'keterangan' => $keterangan,
                   'berkas_suratmasuk' => $berkas_suratmasuk
               ];
               $this->model_surat->adddata('suratmasuk', $array);
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                   </div>');
               redirect('admin/suratmasuk');
           } else {
               $config['upload_path'] = 'vendor/files/suratmasuk/';
               $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
               $config['file_name'] = $berkas_suratmasuk;
   
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('berkas_suratmasuk')) {
                   $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5><i class="icon fa fa-trash"></i> Gagal!</h5>
                       ' . $this->upload->display_errors() . '
                       </div>');
                   redirect('admin/suratmasuk');
               } else {
                   $array = [
                       'id_suratmasuk' => null,
                       'no_suratmasuk' => $no_suratmasuk,
                       'judul_suratmasuk' => $judul_suratmasuk,
                       'asal_surat' => $asal_surat,
                       'tanggal_masuk' => $tanggal_masuk,
                       'tanggal_diterima' => $tanggal_diterima,
                       'id_indeks' => $id_indeks,
                       'keterangan' => $keterangan,
                       'berkas_suratmasuk' => $berkas_suratmasuk
                   ];
                   $this->upload->do_upload();
                   $this->model_surat->adddata('suratmasuk', $array);
                   $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                       </div>');
                   redirect('admin/suratmasuk');
               }
           }
       }
   
       public function aksiubahsm()
       {
           $id_suratmasuk = $this->input->post('id_suratmasuk');
           $no_suratmasuk = htmlspecialchars($this->input->post('no_suratmasuk'));
           $judul_suratmasuk = htmlspecialchars($this->input->post('judul_suratmasuk'));
           $asal_surat = htmlspecialchars($this->input->post('asal_surat'));
           $namaberkas_suratmasuk = $_FILES['berkas_suratmasuk']['name'];
           $exp = explode('.', $namaberkas_suratmasuk);
           $typeberkas_suratmasuk = end($exp);
           $berkas_suratmasuk = uniqid() . '.' . $typeberkas_suratmasuk;
           $tanggal_masuk = $this->input->post('tanggal_masuk');
           $tanggal_diterima = $this->input->post('tanggal_diterima');
           $id_indeks = $this->input->post('id_indeks');
           $keterangan = htmlspecialchars($this->input->post('keterangan'));
   
           $cek_no = $this->model_surat->getdatawithadd('suratmasuk', 'no_suratmasuk="' . $no_suratmasuk . '" AND id_suratmasuk!=' . $id_suratmasuk)->row_array();
           if (!$cek_no) {
               if ($namaberkas_suratmasuk == null) {
                   $array = [
                       'no_suratmasuk' => $no_suratmasuk,
                       'judul_suratmasuk' => $judul_suratmasuk,
                       'asal_surat' => $asal_surat,
                       'tanggal_masuk' => $tanggal_masuk,
                       'tanggal_diterima' => $tanggal_diterima,
                       'id_indeks' => $id_indeks,
                       'keterangan' => $keterangan
                   ];
                   $this->model_surat->updatedata('suratmasuk', $array, array('id_suratmasuk' => $id_suratmasuk));
                   $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
                   </div>');
                   redirect('admin/suratmasuk');
               } else {
                   $array = [
                       'no_suratmasuk' => $no_suratmasuk,
                       'judul_suratmasuk' => $judul_suratmasuk,
                       'asal_surat' => $asal_surat,
                       'tanggal_masuk' => $tanggal_masuk,
                       'tanggal_diterima' => $tanggal_diterima,
                       'id_indeks' => $id_indeks,
                       'keterangan' => $keterangan,
                       'berkas_suratmasuk' => $berkas_suratmasuk
                   ];
   
                   $hapusberkas = $this->model_surat->getdatawithadd('suratmasuk', 'id_suratmasuk=' . $id_suratmasuk)->row_array();
                   if (null !== $hapusberkas['berkas_suratmasuk']) {
                       $path = 'vendor/files/suratmasuk/' . $hapusberkas['berkas_suratmasuk'];
                       unlink($path);
                   }
   
                   $config['upload_path'] = 'vendor/files/suratmasuk/';
                   $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
                   $config['file_name'] = $berkas_suratmasuk;
                   $this->load->library('upload', $config);
   
                   if (!$this->upload->do_upload('berkas_suratmasuk')) {
                       $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                           </div>');
                       redirect('admin/suratmasuk');
                   } else {
                       $this->upload->do_upload();
                       $this->model_surat->updatedata('suratmasuk', $array, array('id_suratmasuk' => $id_suratmasuk));
                       $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
                           </div>');
                       redirect('admin/suratmasuk');
                   }
               }
           } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <h5><i class="icon fa fa-trash"></i> Gagal!</h5>
                   Nomor surat sudah ada!
                   </div>');
               redirect('admin/suratmasuk');
           }
       }
   
       public function laporan_suratmasuk()
       {
           $data['title'] = 'Surat Masuk';
           if ($this->session->userdata('level') == 1) {
               $data['user'] = 'superadmin';
           } elseif ($this->session->userdata('level') == 2) {
               $data['user'] = 'admin';
           }
           if (null !== $this->input->get('filter-index')) {
               $id_indeks = $this->input->get('id_index');
               $additional = "suratmasuk.id_indeks=" . $id_indeks;
               $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
           } elseif (null !== $this->input->get('filter-tanggal')) {
               $tanggal_awal = $this->input->get('tanggal_awal');
               $tanggal_akhir = $this->input->get('tanggal_akhir');
               $additional = "suratmasuk.tanggal_masuk BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'";
               $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
           } else {
               $data['suratmasuk'] = $this->model_surat->getdata('suratmasuk')->result();
           }
           $data['indeks'] = $this->model_surat->getother('indeks')->result();
   
           $this->load->view('templates/header', $data);
           $this->load->view('admin/laporan/laporan_suratmasuk', $data);
           $this->load->view('templates/footer');
       }
   
       public function cetaksuratmasuk()
       {
           $data['title'] = 'Surat Masuk #' . uniqid();
           if (null !== $this->input->get('id_index')) {
               $id_indeks = $this->input->get('id_index');
               $additional = "suratmasuk.id_indeks=" . $id_indeks;
               $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
           } elseif (null !== $this->input->get('tanggal_awal')) {
               $tanggal_awal = $this->input->get('tanggal_awal');
               $tanggal_akhir = $this->input->get('tanggal_akhir');
               $additional = "suratmasuk.tanggal_masuk BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'";
               $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
           } else {
               $data['suratmasuk'] = $this->model_surat->getdata('suratmasuk')->result();
           }
           $this->load->view('templates/header', $data);
           $this->load->view('admin/laporan/cetaksuratmasuk', $data);
           $this->load->view('templates/footer');
       }

    // indeks
    public function indeks()
    {
        $data['title'] = 'Indeks Surat';

        if ($this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['indeks'] = $this->model_surat->getotherwithadd('indeks', 'ORDER BY kode_indeks')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/pengaturan/indeks', $data);
        $this->load->view('templates/footer');
    }

    public function tambahindex()
    {
        $kode_index = strtoupper($this->input->post('kode_index'));
        $judul_index = htmlspecialchars($this->input->post('judul_index'));
        $detail = htmlspecialchars($this->input->post('detail'));

        $query = $this->db->get_where('indeks', ['kode_indeks' => $kode_index])->row_array();

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Gagal!</h5>
                Kode indeks sudah ada!
                </div>');
            redirect('admin/indeks');
        } else {
            $array = [
                'id_indeks' => null,
                'kode_indeks' => $kode_index,
                'judul_indeks' => $judul_index,
                'detail' => $detail
            ];

            $this->model_surat->adddata('indeks', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
                Indeks baru ditambahkan!
                </div>');
            redirect('admin/indeks');
        }
    }

    public function aksiubahindeks()
    {
        $id_indeks = $this->input->post('id_indeks');
        $kode_indeks = htmlspecialchars($this->input->post('kode_indeks'));
        $judul_indeks = htmlspecialchars($this->input->post('judul_indeks'));
        $detail = htmlspecialchars($this->input->post('detail'));

        $cek = $this->db->query('SELECT * FROM indeks WHERE kode_indeks="' . $kode_indeks . '" AND id_indeks!=' . $id_indeks)->row_array();

        if ($cek) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Kode sudah ada! coba kode lain</h5>
                </div>');
            redirect('admin/ubahindeks/' . $id_indeks);
        } else {
            $array = [
                'kode_indeks' => $kode_indeks,
                'judul_indeks' => $judul_indeks,
                'detail' => $detail
            ];
            $where = array('id_indeks' => $id_indeks);
            $this->model_surat->updatedata('indeks', $array, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check-square"></i> Data diubah!</h5>
                </div>');
            redirect('admin/indeks');
        }
    }



    public function aplikasi()
    {
        $data['title'] = 'Aplikasi';
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
        $this->load->view('admin/aplikasi/add', $data);
        $this->load->view('templates/footer');
    }


    public function users()
    {
        $data['title'] = 'Manajemen Users';
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

        $data['users'] = $this->model_surat->getother('user')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/pengaturan/users', $data);
        $this->load->view('templates/footer');
    }

    public function tambahuser()
    {
        $nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $password2 = sha1($password);
        $level = htmlspecialchars($this->input->post('level'));

        $cek_username = $this->model_surat->getotherwithadd('user', 'WHERE username="' . $username . '"')->row_array();

        if (!$cek_username) {
            $array = [
                'id_user' => null,
                'username' => $username,
                'password' => $password2,
                'nama_lengkap' => $nama_lengkap,
                'level' => $level
            ];
            $this->model_surat->adddata('user', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check-square"></i> User ditambahkan!</h5>
                </div>');
            redirect('admin/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Username sudah ada!</h5>
                </div>');
            redirect('admin/users');
        }
    }

    public function ubahlevel($level, $id_user)
    {
        $this->model_surat->updatedata('user', array('level' => $level), array('id_user' => $id_user));
        redirect('admin/users');
    }



    public function profil()
    {
        $data['title'] = 'Profil saya';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }
        $id_user = $this->session->userdata('id_user');
        $data['profil'] = $this->model_surat->getotherwithadd('user', 'WHERE id_user=' . $id_user)->result();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/pengaturan/profil', $data);
        $this->load->view('templates/footer');
    }

    public function aksiubahprofil()
    {
        $id_user = $this->input->post('id_user');
        $nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
        $username = htmlspecialchars($this->input->post('username'));
        $bio = htmlspecialchars($this->input->post('bio'));
        $facebook = htmlspecialchars($this->input->post('facebook'));
        $email = htmlspecialchars($this->input->post('email'));
        $imagename = $_FILES['image']['name'];
        $exp = explode('.', $imagename);
        $imagetype = end($exp);
        $image = uniqid() . '.' . $imagetype;

        $cek_username = $this->model_surat->getotherwithadd('user', 'where username="' . $username . '" AND id_user!=' . $id_user)->row_array();

        if ($cek_username) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Username ada!</h5>
                </div>');
            redirect('admin/profil');
        } else {
            if ($imagename == null) {
                $array = [
                    'username' => $username,
                    'nama_lengkap' => $nama_lengkap,
                    'bio' => $bio,
                    'facebook' => $facebook,
                    'email' => $email
                ];
                $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check-square"></i> Profil diubah!</h5>
                    </div>');
                redirect('admin/profil');
            } else {
                $array = [
                    'username' => $username,
                    'nama_lengkap' => $nama_lengkap,
                    'image' => $image,
                    'bio' => $bio,
                    'facebook' => $facebook,
                    'email' => $email
                ];

                $cek_berkas = $this->model_surat->getotherwithadd('user', 'where id_user=' . $id_user)->row_array();
                if ($cek_berkas) {
                    $path = 'vendor/files/profilimg/' . $cek_berkas['image'];
                    unlink($path);
                }
                $config['upload_path'] = 'vendor/files/profilimg/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $image;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/profil');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check-square"></i> Profil diubah!</h5>
                        </div>');
                    redirect('admin/profil');
                }
            }
        }
    }

    public function aksigantipass()
    {
        $id_user = $this->input->post('id_user');
        $password_lama = $this->input->post('password_lama');
        $password_lama2 = sha1($password_lama);
        $password_baru = $this->input->post('password_baru');
        $password_baru2 = sha1($password_baru);

        $cek_password = $this->model_surat->getotherwithadd('user', 'where id_user=' . $id_user . ' AND password="' . $password_lama2 . '"')->row_array();
        if (!$cek_password) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Password lama salah!</h5>
                </div>');
            redirect('admin/profil');
        } else {
            $array = [
                'password' => $password_baru2
            ];

            $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check-square"></i> Password diganti!</h5>
                </div>');
            redirect('admin/profil');
        }
    }

    public function about()
    {
        $data['title'] = 'Tentang BPSDM Provinsi Jawa Barat';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/ekstra/about', $data);
        $this->load->view('templates/footer');
    }

    public function download($table, $berkas_suratmasuk)
    {
        force_download('vendor/files/' . $table . '/' . $berkas_suratmasuk, null);
    }

    public function testing()
    {
        $data['title'] = 'Halaman Uji coba';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('testing', $data);
        $this->load->view('templates/footer');
    }

    // kerja praktik pengajuan kp
    public function suratpengajuankp()
    {
        $data['title'] = 'Surat Pengajuan';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/suratpengajuan', $data);
        $this->load->view('templates/footer');
    }


    // tambah surat pengajuan untuk users kp
    public function tambahkp()
    {
        $no_suratpengajuan = htmlspecialchars($this->input->post('no_suratpengajuan'));
        $id_indeks = htmlspecialchars($this->input->post('id_indeks'));
        $asal_instansi= htmlspecialchars($this->input->post('asal_instansi'));
        $tanggal_pengajuan = htmlspecialchars($this->input->post('tanggal_pengajuan'));
        $tgl_masuk = htmlspecialchars($this->input->post('tgl_masuk'));
        $tgl_akhir = htmlspecialchars($this->input->post('tgl_akhir'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $namaberkas_suratpengajuan = $_FILES['berkas_suratpengajuan']['name'];
        $exp = explode('.', $namaberkas_suratpengajuan);
        $typeberkas_suratpengajuan = end($exp);
        $berkas_suratpengajuan = uniqid() . '.' . $typeberkas_suratpengajuan;


        $cek_no = $this->model_surat->getdatawithadd('suratpengajuan', 'no_suratpengajuan="' . $no_suratpengajuan . '"')->row_array();
        if (!$cek_no) {
            $array = [
                'id_suratpengajuan' => null,
                'no_suratpengajuan' => $no_suratpengajuan,
                'asal_instansi' => $asal_instansi,
                'id_indeks' => $id_indeks,
                'tanggal_pengajuan' => $tanggal_pengajuan,
                'tgl_masuk ' => $tgl_masuk ,
                'tgl_akhir' => $tgl_akhir,
                'keterangan' => $keterangan,
                'berkas_suratpengajuan' => $berkas_suratpengajuan
            ];
            if ($berkas_suratpengajuan != null) {
                $config['upload_path'] = 'vendor/files/suratpengajuan/';
                $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratpengajuan;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('berkas_suratpengajuan')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                     </div>');
                    redirect('admin/suratpengajuankp');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->adddata('suratpengajuan', $array);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                     </div>');
                    redirect('admin/suratpengajuankp');
                }
            } else {
                $this->model_surat->adddata('suratpengajuan', $array);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                 </div>');
                redirect('admin/suratpengajuankp');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h5><i class="icon fa fa-trash"></i> Nomor surat sudah ada!</h5>
             </div>');
            redirect('admin/suratpengajuankp');
        }
    }


    // tarcking surat pengajuan
    public function tracking()
    {
        $data['title'] = 'Tracking Pengajuan Surat';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }

        $data['suratpengajuan'] = $this->model_surat->getdata('suratpengajuan')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/tracking', $data);
        $this->load->view('templates/footer');
    }

    

}
