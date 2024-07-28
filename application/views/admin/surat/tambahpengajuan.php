<?php if ($user == 'superadmin'): ?>
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>
                    <div class="card card-success">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-body">

                            <div class="card-header">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="surat-tab" data-toggle="tab" href="#surat" role="tab"
                                            aria-controls="surat" aria-selected="true">Data Surat Pengajuan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" tabindex="2" aria-disabled="true"  id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                            aria-controls="profile" aria-selected="false">Data Peserta Kerja Praktik</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-linkdisabled" tabindex="3" aria-disabled="true"  id="finish-tab" data-toggle="tab" href="#finish" role="tab"
                                            aria-controls="finish" aria-selected="false">Validasi Data</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="surat" role="tabpanel"
                                    aria-labelledby="surat-tab">
                                    <div class="modal-body">
                                        <form role="form" action="<?= base_url('admin/tambahsp') ?>" method="post"
                                            enctype="multipart/form-data">
                                            <div class="card-body row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>No. Surat</label>
                                                        <?php $today = date('d,m,Y');
                                                        $pecah = explode(',', $today);
                                                        $bulan = $pecah[1];
                                                        $tahun = $pecah[2]; ?>
                                                        <input type="text" name="no_suratpengajuan" class="form-control"
                                                            value=".../BPSDM/H-<?php echo $bulan; ?>/<?php echo $tahun;
                                                               uniqid(); ?>">
                                                        <small class="text-danger">*Sesuaikan nomor surat terlebih
                                                            dahulu</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Surat</label>
                                                        <select class="form-control" name="id_indeks">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($indeks as $i): ?>
                                                                <option value="<?php echo $i->id_indeks; ?>">
                                                                    <?php echo strtoupper($i->judul_indeks); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Awal</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tgl_masuk" class="form-control"
                                                                placeholder="Tanggal Masuk..." required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Akhir</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tgl_akhir" class="form-control"
                                                                placeholder="Tanggal Akhir..." required>
                                                        </div>
                                                        <small class="text-danger">*Sesuaikan tanggal awal s/d akhir kerja
                                                            praktik</small>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Tanggal Pengajuan:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" name="tanggal_pengajuan" class="form-control"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asal Instansi</label>
                                                        <input type="text" name="asal_instansi" class="form-control"
                                                            placeholder="Asal Instansi">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Upload Surat Pengajuan</label>
                                                        <input type="file" class="form-control" name="berkas_suratpengajuan"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <small class="text-danger">*Support file berekstensi PDF, DOC, DOCX,
                                                            XLS, XLSX, PPTX, dan
                                                            PPT</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" name="keterangan"
                                                            placeholder="Keterangan"></textarea>
                                                    </div>

                                                </div>


                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal-footer right-content-between">
                                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="modal-body">
                                        <?php
                                        echo form_open_multipart('kp/proses_tambah_data');
                                        ?>
                                        <div class="card-body row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama" class="form-control"
                                                            placeholder="Nama Lengkap..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Handphone</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nohp" class="form-control"
                                                            placeholder="Nomor Handphone..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Jurusan</label>
                                                    <div class="input-group">
                                                        <input type="text" name="jurusan" class="form-control"
                                                            placeholder="Jurusan..." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Tanggal Pendataan:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" name="tanggal_pendataan" class="form-control"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">No. Induk</label>
                                                        <div class="input-group">
                                                            <input type="number" name="no_induk" class="form-control"
                                                                placeholder="No. Induk..." required>
                                                        </div>
                                                    </div>
                                                    <label>Posisi Magang</label>
                                                    <select name="posisi_magang" id="posisi_magang" class="form-control"
                                                        required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                                        <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang
                                                            Pengembangan Kompetensi
                                                            Manajerial</option>
                                                        <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang
                                                            Pengembangan
                                                            Kompetensi Teknis Umum</option>
                                                        <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang
                                                            Pengembangan
                                                            Kompetensi Teknis Inti</option>
                                                        <option
                                                            value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">
                                                            Bidang
                                                            Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                                        <option value="Sekretaris">Sekretaris</option>
                                                        <option value="Perpustakaan">Perpustakaan</option>
                                                        <option value="Kearsipan">Kearsipan</option>
                                                        <option value="Widyaiswara">Widyaiswara</option>
                                                    </select>
                                                    <small><span class="text-danger text-small"
                                                            id="alert_posisi_magang"></span></small>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        </p>
                                    </div>
                                    <div>
                                        <div class="modal-footer right-content-between">
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                        </form>
                                    </div>
                                
                                    <!-- /.modal-content -->
                                </div>

                                <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish-tab">
                                    <div class="card-body">
                                        Data Diri Peserta Kerja Praktik Dapat di Lihat Pada "Detail" Halaman Pengajuan
                                    </div>
                                    <div class="modal-footer right-content-between">
                                    
                                        <a href="<?php echo base_url() ?>admin/suratpengajuan/<?php echo base_url('admin/suratpengajuan') ?>"
                                             class="btn btn-primary" title="selesai"></i> Pengajuan Selesai
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- modal tambah -->
            <?php $this->load->view('admin/ekstra/modal'); ?>
            <!-- Footer -->
            <?php $this->load->view('templates/copyright') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
<?php endif; ?>


<?php foreach ($suratpengajuan as $sp): ?>
    <div class="modal fade" id="lihatfile<?= $sp->id_suratpengajuan ?>" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> Lampiran File Pengajuan</h5>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <embed type="application/pdf" width="100%" height="450px;"
                                    src="<?= base_url('vendor/files/suratpengajuan/') ?>/<?= $sp->berkas_suratpengajuan ?>"></embed>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Upload Data Surat Balasan-->
<?php $no = 0;
foreach ($suratpengajuan as $sp):
    $no++ ?>

    <div class="modal fade" id="updatasuratbalasan<?php echo $sp->id_suratpengajuan ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Surat Balasan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('admin/proses_uploadsuratbalasan') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_suratpengajuan" value="<?php echo $sp->id_suratpengajuan ?>">
                        <div class="form-group">
                            <label for="">Surat Balasan</label>
                            <input type="file" class="form-control" name="userfile"
                                value="<?php echo $sp->berkas_suratbalasan ?>">
                            <small class="text-danger">*Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
                                PPT</small>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- Upload Data Surat Balasan-->


<?php if ($user == 'admin'): ?>
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Surat Pengajuan</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Nomor Surat</th>
                                            <th>Perihal</th>
                                            <th>Asal Instansi</th>
                                            <th>Tanggal Awal</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Keterangan</th>
                                            <th>Berkas Surat Pengajuan</th>
                                            <th>Status </th>
                                            <th>Berkas Surat Balasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($suratpengajuan as $sp): ?>
                                            <tr>

                                                <td><?= $no++; ?></td>
                                                <td><?php $date = date_create($sp->tanggal_pengajuan);
                                                echo date_format($date, 'd/m/Y'); ?>
                                                </td>
                                                <td><?= $sp->no_suratpengajuan; ?></td>
                                                <td><?= $sp->judul_indeks; ?></td>
                                                <td><?= $sp->asal_instansi; ?></td>
                                                <td><?= $sp->tgl_masuk; ?></td>
                                                <td><?= $sp->tgl_akhir; ?></td>
                                                <td><?= $sp->keterangan; ?></td>

                                                <td>
                                                    <button class="btn btn-simple btn-primary" data-toggle="modal" data-target="#lihatfile<?=
                                                        $sp->id_suratpengajuan ?>"><i class="fas fa-eye"></i></button>
                                                </td>


                                                <td><?= $sp->status; ?></td>

                                                <td>
                                                    <?php if ($user == 'superadmin') { ?>
                                                        <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                            data-target="#updatasuratbalasan<?php echo $sp->id_suratpengajuan ?>"><i
                                                                class="fa fa-upload"></i> Upload
                                                        </button>
                                                    <?php } else {
                                                    } ?>
                                                    <a href="<?php echo base_url() ?>admin/downloadbalasan/<?php echo $sp->id_suratpengajuan ?>"
                                                        class="badge badge-success btn-block" title="download"><i
                                                            class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- modal tambah -->
            <?php $this->load->view('admin/ekstra/modal'); ?>
            <!-- Footer -->
            <?php $this->load->view('templates/copyright') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
<?php endif; ?>



<?php if ($user == 'userskp'): ?>
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('templates/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('templates/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>
                    <div class="card card-success">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-body">

                            <div class="card-header">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="surat-tab" data-toggle="tab" href="#surat" role="tab"
                                            aria-controls="surat" aria-selected="true">Data Surat Pengajuan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" tabindex="2" aria-disabled="true" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                            aria-controls="profile" aria-selected="false">Data Peserta Kerja Praktik</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled"  tabindex="3" aria-disabled="true" id="finish-tab" data-toggle="tab" href="#finish" role="tab"
                                            aria-controls="finish" aria-selected="false">Validasi Data</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="surat" role="tabpanel"
                                    aria-labelledby="surat-tab">
                                    <div class="modal-body">
                                        <form role="form" action="<?= base_url('admin/tambahsp') ?>" method="post"
                                            enctype="multipart/form-data">
                                            <div class="card-body row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>No. Surat</label>
                                                        <?php $today = date('d,m,Y');
                                                        $pecah = explode(',', $today);
                                                        $bulan = $pecah[1];
                                                        $tahun = $pecah[2]; ?>
                                                        <input type="text" name="no_suratpengajuan" class="form-control"
                                                            value=".../BPSDM/H-<?php echo $bulan; ?>/<?php echo $tahun;
                                                               uniqid(); ?>">
                                                        <small class="text-danger">*Sesuaikan nomor surat terlebih
                                                            dahulu</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Surat</label>
                                                        <select class="form-control" name="id_indeks">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($indeks as $i): ?>
                                                                <option value="<?php echo $i->id_indeks; ?>">
                                                                    <?php echo strtoupper($i->judul_indeks); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Awal</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tgl_masuk" class="form-control"
                                                                placeholder="Tanggal Masuk..." required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Akhir</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tgl_akhir" class="form-control"
                                                                placeholder="Tanggal Akhir..." required>
                                                        </div>
                                                        <small class="text-danger">*Sesuaikan tanggal awal s/d akhir kerja
                                                            praktik</small>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Tanggal Pengajuan:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" name="tanggal_pengajuan" class="form-control"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asal Instansi</label>
                                                        <input type="text" name="asal_instansi" class="form-control"
                                                            placeholder="Asal Instansi">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Upload Surat Pengajuan</label>
                                                        <input type="file" class="form-control" name="berkas_suratpengajuan"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <small class="text-danger">*Support file berekstensi PDF, DOC, DOCX,
                                                            XLS, XLSX, PPTX, dan
                                                            PPT</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" name="keterangan"
                                                            placeholder="Keterangan"></textarea>
                                                    </div>

                                                </div>


                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal-footer right-content-between">
                                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="modal-body">
                                        <?php
                                        echo form_open_multipart('kp/proses_tambah_data');
                                        ?>
                                        <div class="card-body row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama" class="form-control"
                                                            placeholder="Nama Lengkap..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Handphone</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nohp" class="form-control"
                                                            placeholder="Nomor Handphone..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Jurusan</label>
                                                    <div class="input-group">
                                                        <input type="text" name="jurusan" class="form-control"
                                                            placeholder="Jurusan..." required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="">No. Induk</label>
                                                        <div class="input-group">
                                                            <input type="number" name="no_induk" class="form-control"
                                                                placeholder="No. Induk..." required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Pendataan:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" name="tanggal_pendataan" class="form-control"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                                    <label>Posisi Magang</label>
                                                    <select name="posisi_magang" id="posisi_magang" class="form-control"
                                                        required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                                        <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang
                                                            Pengembangan Kompetensi
                                                            Manajerial</option>
                                                        <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang
                                                            Pengembangan
                                                            Kompetensi Teknis Umum</option>
                                                        <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang
                                                            Pengembangan
                                                            Kompetensi Teknis Inti</option>
                                                        <option
                                                            value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">
                                                            Bidang
                                                            Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                                        <option value="Sekretaris">Sekretaris</option>
                                                        <option value="Perpustakaan">Perpustakaan</option>
                                                        <option value="Kearsipan">Kearsipan</option>
                                                        <option value="Widyaiswara">Widyaiswara</option>
                                                    </select>
                                                    <small><span class="text-danger text-small"
                                                            id="alert_posisi_magang"></span></small>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        </p>
                                    </div>
                                    <div>
                                        <div class="modal-footer right-content-between">
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>

                                <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish-tab">
                                    <div class="card-body">
                                        Data Diri Peserta Kerja Praktik Dapat di Lihat Pada "Detail" Halaman Pengajuan
                                    </div>
                                    <div class="modal-footer right-content-between">

                                        <a href="<?php echo base_url() ?>admin/suratpengajuan/<?php echo base_url('admin/suratpengajuan') ?>"
                                            class="btn btn-primary" title="selesai"></i> Pengajuan Selesai
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- modal tambah -->
            <?php $this->load->view('admin/ekstra/modal'); ?>
            <!-- Footer -->
            <?php $this->load->view('templates/copyright') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

<?php endif; ?>

<!-- Hapus -->
<?php $no = 0;
foreach ($suratpengajuan as $sp):
    $no++ ?>

    <div class="modal fade" id="hapussp<?php echo $sp->id_suratpengajuan ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('admin/hapus_datasp/' . $sp->id_suratpengajuan) ?>">
                    <div class="modal-body text-center">
                        <h5>Apakah anda yakin untuk menghapus pengajuan ini? </h5>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary btn-simple">Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- Hapus -->


<!-- Ubah Status -->
<?php $no = 0;
foreach ($suratpengajuan as $sp):
    $no++ ?>

    <div class="modal fade" id="ubahstatus<?php echo $sp->id_suratpengajuan ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('admin/editstatus') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body row">
                            <input type="hidden" name="id_suratpengajuan" value="<?= $sp->id_suratpengajuan ?>">
                            <div class="modal-body text-center">
                                <h5>Update Status Pengajuan ID: <?= $sp->no_suratpengajuan; ?> ? </h5>
                                <label for="status">Pilih Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" value="Pending"> Pending <br>

                                        <input type="radio" name="status" value="Syarat Tidak Terpenuh "> Syarat Tidak
                                        Terpenuh <br>

                                        <input type="radio" name="status" value="Diterima dan Dilanjutkan"> Diterima dan
                                        Dilanjutkan <br>

                                        <input type="radio" name="status" value="Ditunda"> Ditunda <br>

                                        <input type="radio" name="status" value="Pending"> Selesai
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- Ubah Status -->

<!-- Ubah Surat pengajuan -->

<?php $no = 0;
foreach ($suratpengajuan as $sp):
    $no++ ?>

    <div class="modal fade" id="ubahsp<?php echo $sp->id_suratpengajuan ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('admin/editsp') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body row">
                            <input type="hidden" name="id_suratpengajuan" value="<?= $sp->id_suratpengajuan ?>">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <?php $today = date('d,m,Y');
                                    $pecah = explode(',', $today);
                                    $bulan = $pecah[1];
                                    $tahun = $pecah[2]; ?>
                                    <input type="text" name="no_suratpengajuan" class="form-control"
                                        value="<?= $sp->no_suratpengajuan ?>">
                                    <small class="text-danger">*Sesuaikan nomor surat terlebih dahulu</small>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <select class="form-control" name="id_indeks">
                                        <?php foreach ($indeks as $i): ?>
                                            <option value="<?php echo $i->id_indeks; ?>">
                                                <?php echo strtoupper($i->judul_indeks); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Awal</label>
                                    <div class="input-group">
                                        <input type="date" name="tgl_masuk" class="form-control"
                                            value="<?= $sp->tgl_masuk ?>" placeholder="Tanggal Masuk Kerja Praktik">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Akhir</label>
                                    <div class="input-group">
                                        <input type="date" name="tgl_akhir" class="form-control"
                                            value="<?= $sp->tgl_akhir ?>" placeholder="Tanggal Akhir Kerja Praktik">
                                    </div>
                                    <small class="text-danger">*Sesuaikan dengan masuk s/d selesai kerja praktik</small>
                                </div>


                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Pengajuan:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="tanggal_pengajuan" class="form-control"
                                            value="<?= $sp->tanggal_pengajuan ?>" data-inputmask-alias="datetime"
                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                            value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Asal Instansi</label>
                                    <input type="text" name="asal_instansi" class="form-control"
                                        value="<?= $sp->asal_instansi ?>" placeholder="Asal Instansi">
                                </div>

                                <div class="form-group">
                                    <label>Dokumen surat</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="berkas_suratpengajuan" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label"
                                                for="exampleInputFile"><?= $sp->berkas_suratpengajuan ?></label>
                                        </div>
                                    </div>
                                    <small class="text-danger">*Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
                                        PPT</small>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan"><?php echo $sp->keterangan ?></textarea>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- Ubah Surat pengajuan -->