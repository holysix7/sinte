<?php defined('BASEPATH') or exit('No direct script access allowed');
class Kp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        $this->load->model('M_kp');
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
    }

    public function view()
    {
        $data['title'] = 'Kerja Praktik';


        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        } elseif ($this->session->userdata('level') == 3) {
            $data['user'] = 'userskp';
        }


        $id = $this->input->get('id');
        $query = $this->db->get_where('kp', array('id' => $id));
        $data['d'] = $query->row_array();

        $data['kp'] = $this->M_kp->SemuaData();
        if (count(explode('/', $this->uri->uri_string())) > 2) {
            $data['kp_user'] = $this->M_kp->SemuaDataIdSurat();
        }

        if (count(explode('/', $this->uri->uri_string())) > 3) {
            $data['kp'] = $this->M_kp->getRedirectKp(explode('/', $this->uri->uri_string())[3]);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/kp/lihat_data', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/remove-alert');
    }



    public function tambahds()
    {
        $this->M_kp->proses_tambah_data_detail_sertifikat();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect(base_url('buatqrcode'));

    }

    public function proses_tambah_data()
    {
        $this->M_kp->proses_tambah_data();
        $this->model_surat->updatedata('suratpengajuan', [
            'draft' => false,
            'ket_status' => 'Data Sudah Lengkap',
        ], [
            'id_suratpengajuan' => $this->input->post('id_suratpengajuan')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
        </div>');
        redirect("admin/tambahpengajuan_datadiri/{$this->input->post('id_suratpengajuan')}");
    }

    public function hapus_data($id)
    {
        $this->M_kp->hapus_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-trash"></i> Data dihapus!</h5>
        </div>');
        redirect('kp/view');
    }

    public function proses_edit_data()
    {
        $this->M_kp->proses_edit_data();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect('kp/view');
    }



    public function editstatus()
    {
        $this->M_kp->editstatus();
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check-square"></i> Data diedit!</h5>
        </div>');
        redirect(base_url('kp/view'));
    }

    public function proses_uploadsertifikat()
    {
        $config['upload_path'] = 'vendor/files/sertifikat/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|pdf|doc|docx|xls|xlsx|rar|zip|tar|pptx|ppt';
        $config['max_size'] = 1000000;
        $config['max_width'] = 1000000;
        $config['max_height'] = 1000000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Tambah";
        } else {
            $sertifikat = $this->upload->data();
            $sertifikat = $sertifikat['file_name'];

            $data = array(
                'sertifikat' => $sertifikat,

            );
            $this->db->where('id ', $this->input->post('id'));
            $this->db->update('kp', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data ditambahkan!</h5>
            </div>');
            redirect('kp/view');
        }
    }

    public function downloadsertifikat($id_sp, $id)
    {
        $this->load->helper('download');
        $fileinfo = $this->M_kp->downloadsertifikat($id);

        if ($fileinfo['sertifikat'] == 'Belum Tersedia') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
            </div>');
            redirect("kp/view/{$id_sp}");
        } else {
            $file = 'vendor/files/sertifikat/' . $fileinfo['sertifikat'];
            if (file_exists($file)) {
                force_download($file, NULL);
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-trash"></i> File tidak ditemukan!</h5>
                </div>');
                redirect("kp/view/{$id_sp}");
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fa fa-check-square"></i> Data Berhasil di Download</h5>
            </div>');
                redirect("kp/view/{$id_sp}");
            }
        }
    }


    public function laporan_kp()
    {
        $data['title'] = 'Kerja Praktik';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['tahun'] = $this->M_kp->gettahun();
        $data['kp'] = $this->M_kp->SemuaData();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_kp', $data);
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

            $data['title'] = "Laporan Kerja Praktik Berdasarkan Tanggal";
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;

            if ($nama == null) {
                $where = array(
                    'tanggal_pendataan >=' => $tanggalawal,
                    'tanggal_pendataan <=' => $tanggalakhir,
                );
                $data['datafilter'] = $this->M_kp->filterbytanggal($where);
            } else {

                if ($nama == null) {
                    $where = array(
                        'tanggal_pendataan >=' => $tanggalawal,
                        'tanggal_pendataan <=' => $tanggalakhir,
                        'nama' => $nama,
                    );
                    $data['datafilter'] = $this->M_kp->filterbytanggal($where);

                } else if ($nama == null) {
                    $where = array(
                        'tanggal_pendataan >=' => $tanggalawal,
                        'tanggal_pendataan <=' => $tanggalakhir,
                    );
                    $data['datafilter'] = $this->M_kp->filterbytanggal($where);
                } else {
                    $where = array(
                        'tanggal_pendataan >=' => $tanggalawal,
                        'tanggal_pendataan <=' => $tanggalakhir,
                        'nama' => $nama,
                    );
                    $data['datafilter'] = $this->M_kp->filterbytanggal($where);
                }
            }

            $this->load->view('admin/laporan/print_laporan_kp', $data);

        } elseif ($nilaifilter == 2) {

            $data['title'] = "Laporan Kerja Praktik Berdasarkan Bulan";
            $data['subtitle'] = "Dari bulan : " . $bulanawal . ' Sampai tanggal : ' . $bulanakhir . ' Tahun : ' . $tahun1;


            $data['datafilter'] = $this->M_kp->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('admin/laporan/print_laporan_kp', $data);

        } elseif ($nilaifilter == 3) {

            $data['title'] = "Laporan Kerja Praktik Berdasarkan Tahun";
            $data['subtitle'] = ' Tahun : ' . $tahun2;

            if ($nama == null) {
                $data['datafilter'] = $this->M_kp->filterbytahun($tahun2);
            } else {

                if ($nama == null) {
                    $where = array(
                        'YEAR(tanggal_pendataan)' => $tahun2,
                        'nama' => $nama,
                    );

                    $data['datafilter'] = $this->M_kp->filterbytahun2($where);
                } else if ($nama == null) {
                    $where = array(
                        'YEAR(tanggal_pendataan)' => $tahun2,
                    );

                    $data['datafilter'] = $this->M_kp->filterbytahun2($where);
                } else {
                    $where = array(
                        'YEAR(tanggal_pendataan)' => $tahun2,
                        'nama' => $nama,
                    );

                    $data['datafilter'] = $this->M_kp->filterbytahun2($where);
                }
            }
            $this->load->view('admin/laporan/print_laporan_kp', $data);
        }
    }

    public function generator()
    {
        if ($this->input->get('nama')) {
            //memanggil fungsi generate() untuk proses menyisipkan text nama pada sertifikat
            $this->generate($this->input->get('nama'));
        }
    }

    public function generate($nama = '')
    {
        //direktori template sertifikat dan file hasil generate
        $directory = "./assets/img/sertifikat";
        if (!is_dir($directory)) {
            mkdir($directory, 0775, TRUE);
        }

        //path file template
        $image = $directory . '/template/serti.png';

        //fungsi php untuk membuat image baru dari file atau URL
        $createimage = imagecreatefrompng($image);

        //mendapatkan width dan height dari image yang baru saja dibuat
        $image_width = imagesx($createimage);
        $image_height = imagesy($createimage);

        //set variabel yang isinya path tempat menyimpan sertifikat hasil generate
        //untuk format nama file sertifikat nya, gua menggunakan input fullname dengan menghapus spasi
        //dan di konversi ke huruf kecil semua, plus disisipkan angka random, supaya nama file nya identik
        //contoh : nama yang diinputkan "Roronoa Zoro", maka nama file nya kurang lebih menjadi roronoazoro345.png
        $output = $directory . '/' . str_replace(" ", "", strtolower($nama)) . rand(pow(10, 2), pow(10, 3) - 1) . ".png";

        //fungsi untuk set warna text dalam format RGB
        $color = imagecolorallocate($createimage, 212, 165, 0);

        //variabel untuk set, jika text mau di putar. Jika posisi text mau yang normal, set nilainya 0
        $rotation = 0;
        //variabel untuk set nama di sertifikat
        $certificate_text = $nama;
        //ukuran font text sertifikat, sesuaikan dengan ukuran font yang sesuai dengan template sertifikat
        $font_size = 70;
        //font directory untuk text
        $drFont = FCPATH . "/assets/font/AlexBrush-Regular.ttf";

        //fungsi untuk memberikan kotak batas text
        //return nya berupa array
        $text_box = imagettfbbox($font_size, $rotation, $drFont, $certificate_text);

        //fungsi untuk mengetahui panjang text ditambah padding
        //silahkan sesuaikan value variable padding ini dengan template sertifikat kalian
        $padding = 650;
        $text_width = ($text_box[2] - $text_box[0]) + intval($padding);

        //setup posisi x dan y terhadap template sertifikat (silahkan sesuaikan dengan template kalian)
        $origin_x = $image_width - $text_width;
        $origin_y = 800;

        //function untuk "menempelkan" text nama di sertifikat dengan parameter yang sudah di set sebelumnya
        imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $color, $drFont, $certificate_text);

        //membuat image sertifikat yang sudah ada text namanya dengan format png dan simpan sesuai dengan value variabel output
        imagepng($createimage, $output, 3);

        //memanggil fungsi untuk proses download sertifikat
        $this->download_file($output);
    }

    public function download_file($path_file)
    {

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"" . basename($path_file) . "\"");
        readfile($path_file);
        redirect('kp/view', 'reload');
        exit();
    }


}



