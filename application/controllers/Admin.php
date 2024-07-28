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
        $this->load->model('M_eservice');
        $this->load->model('M_bigdata');
        $this->load->model('M_publikasi');
        $this->load->model('M_multimedia');
        $this->load->model('M_tamu');
        $this->load->model('M_kp');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $eservice = $this->M_eservice->dataKeseluruhan();
        $aplikasi = $this->M_aplikasi->dataKeseluruhan();
        $bigdata = $this->M_bigdata->dataKeseluruhan();
        $publikasi = $this->M_publikasi->dataKeseluruhan();
        $multimedia = $this->M_multimedia->dataKeseluruhan();
        $kp = $this->M_kp->dataKeseluruhan();
        $suratpengajuan = $this->model_surat->dataKeseluruhan();
        $data_bar = [];
        $data_label = [];
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
            $data_bar = [
                $eservice['counted'],
                $aplikasi['counted'],
                $bigdata['counted'],
                $publikasi['counted'],
                $multimedia['counted'],
                $kp['counted'],
                $suratpengajuan['counted'],
            ];
            $data_label = [
                "E-Service",
                "Aplikasi",
                "Bigdata",
                "Multimedia",
                "Publikasi",
                "KP",
                "Surat Pengajuan"
            ];
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
            $data_bar = [
                $kp['counted'],
                $suratpengajuan['counted'],
            ];
            $data_label = [
                "KP",
                "Surat Pengajuan"
            ];
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        } elseif ($this->session->userdata('level') == 4) {
            $data['user'] = 'deveservice';
            $data_bar = [
                $eservice['counted'],
            ];
            $data_label = [
                "E-Service"
            ];
            $data['total_data'] = [
                'Total Data'        => $this->M_eservice->total_data(),
                'Data Hari Ini'     => $this->M_eservice->count_today_records(),
                'Data Bulan Ini'    => $this->M_eservice->count_current_month_records(),
                'Data Tahun Ini'    => $this->M_eservice->count_current_year_records()
            ];

        } elseif ($this->session->userdata('level') == 5) {
            $data['user'] = 'devaplikasi';
            $data_bar = [
                $aplikasi['counted'],
            ];
            $data_label = [
                "Aplikasi",
            ];
            $data['total_data'] = [
                'Total Data'        => $this->M_aplikasi->total_data(),
                'Data Hari Ini'     => $this->M_aplikasi->count_today_records(),
                'Data Bulan Ini'    => $this->M_aplikasi->count_current_month_records(),
                'Data Tahun Ini'    => $this->M_aplikasi->count_current_year_records()
            ];
        } elseif ($this->session->userdata('level') == 6) {
            $data['user'] = 'devbigdata';
            $data_bar = [
                $bigdata['counted'],
            ];
            $data_label = [
                "Bigdata",
            ];
            $data['total_data'] = [
                'Total Data'        => $this->M_bigdata->total_data(),
                'Data Hari Ini'     => $this->M_bigdata->count_today_records(),
                'Data Bulan Ini'    => $this->M_bigdata->count_current_month_records(),
                'Data Tahun Ini'    => $this->M_bigdata->count_current_year_records()
            ];
        } elseif ($this->session->userdata('level') == 7) {
            $data['user'] = 'devmultimedia';
            $data_bar = [
                $multimedia['counted'],
            ];
            $data_label = [
                "Multimedia",
            ];
            $data['total_data'] = [
                'Total Data'        => $this->M_multimedia->total_data(),
                'Data Hari Ini'     => $this->M_multimedia->count_today_records(),
                'Data Bulan Ini'    => $this->M_multimedia->count_current_month_records(),
                'Data Tahun Ini'    => $this->M_multimedia->count_current_year_records()
            ];
        } elseif ($this->session->userdata('level') == 8) {
            $data['user'] = 'devpublikasi';
            $data_bar = [
                $publikasi['counted'],
            ];
            $data_label = [
                "Publikasi"
            ];
            $data['total_data'] = [
                'Total Data'        => $this->M_publikasi->total_data(),
                'Data Hari Ini'     => $this->M_publikasi->count_today_records(),
                'Data Bulan Ini'    => $this->M_publikasi->count_current_month_records(),
                'Data Tahun Ini'    => $this->M_publikasi->count_current_year_records()
            ];
        }
        $data['data_bar'] = '[' . implode(',', $data_bar) . ']';
        $data['data_label'] = implode(', ', $data_label);
        $today = date('Y-m-d');

        $sp_today = "tanggal_pengajuan='$today'";
        $sm_today = "tanggal_kunjungan='$today'";
        $data['sm_today'] = $this->model_surat->getdatawithadd3('tamu', $sm_today)->result();
        $data['sp_today'] = $this->model_surat->getdatawithadd('suratpengajuan', $sp_today)->result();


        $data['today_data'] = $this->model_surat->get_data_today();

        $data['count_sp'] = $this->model_surat->countdata('suratpengajuan')->result();
        $data['count_indeks'] = $this->model_surat->countother('indeks')->result();
        $data['count_users'] = $this->model_surat->countother('user')->result();
        $data['count_kp'] = $this->model_surat->countother('kp')->result();
        $data['count_tamu'] = $this->model_surat->countother('tamu')->result();

        $data['service'] = $this->M_eservice->dataMingguIni()['data'];
        $data['jumlah_service'] = $this->M_eservice->dataMingguIni()['counted'];

        $data['aplikasi'] = $this->M_aplikasi->dataMingguIni()['data'];
        $data['jumlah_aplikasi'] = $this->M_aplikasi->dataMingguIni()['counted'];

        $data['bigdata'] = $this->M_bigdata->dataMingguIni()['data'];
        $data['jumlah_big_data'] = $this->M_bigdata->dataMingguIni()['counted'];

        $data['publikasi'] = $this->M_publikasi->dataMingguIni()['data'];
        $data['jumlah_publikasi'] = $this->M_publikasi->dataMingguIni()['counted'];

        $data['multimedia'] = $this->M_multimedia->dataMingguIni()['data'];
        $data['jumlah_multimedia'] = $this->M_multimedia->dataMingguIni()['counted'];

        if($data['user'] == 'superadmin'){
            $data['name_data'] = $this->M_tamu->get_name_data();
        }else{
            $data['name_data'] = $this->model_surat->get_name_data();
        }

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

        $data['suratpengajuan'] = $this->model_surat->getdatawithadd('suratpengajuan', 'status <> "Draft"')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $data['kp_pengajuan'] = $this->model_surat->kp_pengajuan();
        // var_dump($data['kp_pengajuan'][0]->draft == false); die;

        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['suratpengajuan'] = $this->model_surat->getRedirectAppSuratPengajuan(explode('/', $this->uri->uri_string())[3]);
        }

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

    public function tambahpengajuan_validasi($id)
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
        $data['kp_today'] = $this->model_surat->getDataKpToday($today, $id);
        $data['sp_today'] = $this->model_surat->getDataSpToday($today, $id);
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
        $asal_instansi = htmlspecialchars($this->input->post('asal_instansi'));
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
                'tgl_masuk ' => $tgl_masuk,
                'tgl_akhir' => $tgl_akhir,
                'keterangan' => $keterangan,
                'berkas_suratpengajuan' => $berkas_suratpengajuan,
                'no_user' => $no_user,
                'draft' => true,
                'status' => 'Draft',
            ];
            if ($berkas_suratpengajuan != null) {
                $config['upload_path'] = 'vendor/files/suratpengajuan/';
                $config['allowed_types'] = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratpengajuan;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('berkas_suratpengajuan')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/tambahpengajuan');
                } else {
                    $this->upload->do_upload();
                    $last_id = $this->model_surat->adddata('suratpengajuan', $array);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                        </div>');
                    redirect("admin/tambahpengajuan_datadiri/{$last_id}");
                }
            } else {
                $last_id = $this->model_surat->adddata('suratpengajuan', $array);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                    </div>');
                redirect("admin/tambahpengajuan_datadiri/{$last_id}");
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
            <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect('admin/suratpengajuan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
            <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('admin/suratpengajuan');
        }
    }

    public function editstatus()
    {
        $this->model_surat->editstatus();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect(base_url('admin/suratpengajuan'));
    }

    public function editsp()
    {
        $id_suratpengajuan = $this->input->post('id_suratpengajuan');
        $no_suratpengajuan = htmlspecialchars($this->input->post('no_suratpengajuan'));
        $id_indeks = htmlspecialchars($this->input->post('id_indeks'));
        $asal_instansi = htmlspecialchars($this->input->post('asal_instansi'));
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
                    'tgl_masuk ' => $tgl_masuk,
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
                        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/suratpengajuan');
                } else {
                    // jika berhasil

                    $this->upload->do_upload();
                    $this->model_surat->updatedata('kerjapraktik', $array, array('id_suratpengajuan' => $id_suratpengajuan));
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                    'tgl_masuk ' => $tgl_masuk,
                    'tgl_akhir' => $tgl_akhir,
                    'keterangan' => $keterangan,
                    'berkas_suratpengajuan' => $berkas_suratpengajuan
                ];
                // tanpa upload berkas
                $this->model_surat->updatedata('suratpengajuan', $array, array('id_suratpengajuan' => $id_suratpengajuan));
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check-square"></i>  Data diedit!</h5>
                    </div>');
                redirect('admin/suratpengajuan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Nomor surat sudah ada!</h5>
                </div>');
            redirect('admin/suratpengajuan');
        }
    }


    public function hapus_datasp($id_suratpengajuan)
    {
        $this->model_surat->hapus_datasp($id_suratpengajuan, 'suratpengajuan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
        Data Surat Pengajuan Berhasil Dihapus!
        </div>');
        redirect('admin/suratpengajuan');
    }

    public function hapus_dataindex($id_indeks)
    {
        $this->model_surat->hapus_dataindex($id_indeks);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
        Data Indeks Berhasil Dihapus!
        </div>');
        redirect('admin/indeks');
    }

    public function hapususer($id_user)
    {
        $this->model_surat->hapususer($id_user);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
    // indeks
    public function indeks()
    {
        $data['title'] = 'Indeks Surat';

        if ($this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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

        $data['indeks'] = $this->model_surat->getotherwithadd('indeks', 'ORDER BY kode_indeks ')->result();

        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['indeks'] = $this->model_surat->getRedirectAppIndeks(explode('/', $this->uri->uri_string())[3]);
        }

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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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

            $last_id = $this->model_surat->adddata('indeks', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check-square"></i> Sukses!</h5>
                Indeks baru ditambahkan!
                </div>');
            redirect("admin/indeks/{$last_id}");
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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $data['users'] = $this->model_surat->getotherwithadd('user', 'ORDER BY id_user DESC')->result();

        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['users'] = $this->model_surat->getRedirectAppUsers(explode('/', $this->uri->uri_string())[3]);
        }

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
            $last_id = $this->model_surat->adddata('user', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check-square"></i> User ditambahkan!</h5>
                </div>');
            redirect("admin/users/{$last_id}");
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                    <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/profil');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> Password lama salah!</h5>
                </div>');
            redirect('admin/profil');
        } else {
            $array = [
                'password' => $password_baru2
            ];

            $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
        } else {
            if ($this->session->userdata('level') == 4) {
                $data['user'] = 'deveservice';
            }elseif($this->session->userdata('level') == 5){
                $data['user'] = 'devaplikasi';
            }elseif($this->session->userdata('level') == 6){
                $data['user'] = 'devbigdata';
            }elseif($this->session->userdata('level') == 7){
                $data['user'] = 'devmultimedia';
            }elseif($this->session->userdata('level') == 8){
                $data['user'] = 'devpublikasi';
            }
        }
        // var_dump($this->session->userdata); die;

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
        $asal_instansi = htmlspecialchars($this->input->post('asal_instansi'));
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
                'tgl_masuk ' => $tgl_masuk,
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
                     <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-trash"></i> ' . $this->upload->display_errors() . '!</h5>
                     </div>');
                    redirect('admin/suratpengajuankp');
                } else {
                    $this->upload->do_upload();
                    $last_id = $this->model_surat->adddata('suratpengajuan', $array);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                     <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                     </div>');
                    redirect("admin/suratpengajuankp/{$last_id}");
                }
            } else {
                $last_id = $this->model_surat->adddata('suratpengajuan', $array);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                 <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
                 </div>');
                redirect("admin/suratpengajuankp/{$last_id}");
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
             <button type="button" class="close autocl" data-dismiss="alert" aria-hidden="true">&times;</button>
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
