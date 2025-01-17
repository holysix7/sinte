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
                    <h1 class="h3 mb-4 text-gray-800">Data Peserta Kerja Praktik</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pendataan</th>
                                            <th>Nama Lengkap</th>
                                            <th>No Handphone</th>
                                            <th>No. Induk</th>
                                            <th>Jurusan</th>
                                            <th>Posisi Magang</th>
                                            <th>Status Kelulusan</th>
                                            <th>Keterangan Status Kelulusan</th>
                                            <?php if ($user == 'superadmin') { ?>
                                                <th>Update Status Kelulusan</th>
                                            <?php } else {
                                            } ?>
                                            <th>No.Sertifikat</th>
                                            <th>Periode</th>
                                            <th>Sertifikat Kelulusan</th>
                                            <?php if ($user == 'userskp') { ?>
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kp as $magang): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['tanggal_pendataan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['nama']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['nohp']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['no_induk']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['jurusan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['posisi_magang']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['stat']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['ket_stat']; ?>
                                                </td>

                                                <?php if ($user == 'superadmin') { ?>
                                                    <td>
                                                        <a href="" data-id-kp="<?php echo $magang['id'] ?>" data-toggle="modal"
                                                            data-target="#ubahstatus<?php echo $magang['id'] ?>"
                                                            class="badge badge-primary d-block"><i class="fas fa-clock"></i> Update
                                                            Status
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <?php echo $magang['no_sertifikat']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $magang['periode']; ?>
                                                    </td>
                                                <?php } else {
                                                } ?>
                                                <td>
                                                    <?php if ($user == 'superadmin') { ?>

                                                        <button type="button" class="badge btn btn-info btn-block"
                                                            data-toggle="modal"
                                                            data-target="#detailsertifikat<?php echo $magang['id'] ?>"><i
                                                                class="	fas fa-newspaper"></i> Update
                                                        </button>
                                                        <a class="badge btn btn-dark btn-block"
                                                            href="<?php echo site_url('buatqrcode/generate_qr?no_induk=' .
                                                                $magang['no_induk'] . '&nomor=' . $magang['no_sertifikat']); ?>">Buat Kode QR</a>

                                                        <a href="<?php echo base_url() ?>sertifikat/generate/<?php echo
                                                               $magang['id'] ?>" class="badge badge-primary btn-block"
                                                            title="Generate"><i class="fas fa-ad"></i> Generate
                                                        </a>

                                                        <!-- Generate sertifikat foto -->
                                                        <!-- <button type="button" class="badge btn btn-dark btn-block"
                                                            data-toggle="modal"
                                                            data-target="#generatesertifikat<?php echo $magang['id'] ?>"><i
                                                                class="	fas fa-newspaper"></i> Generate
                                                        </button> -->

                                                        <button type="button" class="badge btn btn-success btn-block"
                                                            data-toggle="modal"
                                                            data-target="#updatasertifikat<?php echo $magang['id'] ?>"><i
                                                                class="fa fa-upload"></i> Upload
                                                        </button>
                                                    <?php } else {
                                                    } ?>

                                                </td>
                                                <?php if ($user == 'userskp') { ?>
                                                    <td>
                                                        <a href="" data-id-kp="<?php echo $magang['id']; ?>" data-toggle="modal"
                                                            data-target="#editmagang<?php echo $magang['id']; ?>"
                                                            class="badge badge-primary d-block"><i class="fas fa-edit"></i> Perbaharui
                                                        </a>
                                                        <br>
                                                        <a href="" data-id-sk="<?php echo $magang['id']; ?>" data-toggle="modal"
                                                            data-target="#hapuskp<?php echo $magang['id']; ?>"
                                                            class="badge badge-danger d-block"><i class="fas fa-trash-restore"></i>
                                                            Hapus
                                                        </a>
                                                    </td>
                                                <?php } else {
                                                } ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Data Diri Peserta Kerja Praktik</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pendataan</th>
                                            <th>Nama Lengkap</th>
                                            <th>No Handphone</th>
                                            <th>No. Induk</th>
                                            <th>Jurusan</th>
                                            <th>Posisi Magang</th>
                                            <th>Status Kelulusan</th>
                                            <th>Keterangan Status Kelulusan</th>
                                            <?php if ($user == 'superadmin') { ?>
                                                <th>Update Status Kelulusan</th>
                                            <?php } else {
                                            } ?>
                                            <th>Sertifikat Kelulusan</th>
                                            <?php if ($user == 'userskp') { ?>
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kp as $magang): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['tanggal_pendataan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['nama']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['nohp']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['no_induk']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['jurusan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['posisi_magang']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['stat']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['ket_stat']; ?>
                                                </td>
                                                <?php if ($user == 'superadmin') { ?>
                                                    <td>
                                                        <a href="" data-id-kp="<?php echo $magang['id'] ?>" data-toggle="modal"
                                                            data-target="#ubahstatus<?php echo $magang['id'] ?>"
                                                            class="badge badge-warning d-block"><i class="fas fa-clock"></i> Update
                                                            Status
                                                        </a>
                                                    </td>
                                                <?php } else {
                                                } ?>
                                                <td>
                                                    <?php if ($user == 'superadmin') { ?>
                                                        <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                            data-target="#updatasertifikat<?php echo $magang['id'] ?>"><i
                                                                class="fa fa-upload"></i> Upload
                                                        </button>
                                                    <?php } else {
                                                    } ?>
                                                    <?php
                                                        $exp_uri = explode('/', $this->uri->uri_string());
                                                        $uri = 's';
                                                        if(count($exp_uri) > 2){
                                                            $uri = $exp_uri[2];
                                                        }
                                                    ?>
                                                    <a href="<?php echo base_url() ?>kp/downloadsertifikat/<?= $uri ?>/<?php echo $magang['id'] ?>"
                                                        class="badge badge-success btn-block" title="download"><i
                                                            class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                                <?php if ($user == 'userskp') { ?>
                                                    <td>
                                                        <a href="" data-id-kp="<?php echo $magang['id']; ?>" data-toggle="modal"
                                                            data-target="#editmagang<?php echo $magang['id']; ?>"
                                                            class="badge badge-primary d-block"><i class="fas fa-edit"></i> Perbaharui
                                                        </a>
                                                        <br>
                                                        <a href="" data-id-sk="<?php echo $magang['id']; ?>" data-toggle="modal"
                                                            data-target="#hapuskp<?php echo $magang['id']; ?>"
                                                            class="badge badge-danger d-block"><i class="fas fa-trash-restore"></i>
                                                            Hapus
                                                        </a>
                                                    </td>
                                                <?php } else {
                                                } ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Data Diri Peserta Kerja Praktik</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Pendataan</th>
                                            <th>Nama Lengkap</th>
                                            <th>No Handphone</th>
                                            <th>No. Induk</th>
                                            <th>Jurusan</th>
                                            <th>Posisi Magang</th>
                                            <th>Status Kelulusan</th>
                                            <th>Keterangan Status Kelulusan</th>
                                            <?php if ($user == 'superadmin') { ?>
                                                <th>Update Status Kelulusan</th>
                                            <?php } else {
                                            } ?>
                                            <th>Sertifikat Kelulusan</th>
                                            <!-- <?php if ($user == 'userskp') { ?>
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kp_user as $magang): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['tanggal_pendataan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['nama']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['nohp']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['no_induk']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['jurusan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['posisi_magang']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['stat']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $magang['ket_stat']; ?>
                                                </td>
                                                <?php if ($user == 'superadmin') { ?>
                                                    <td>
                                                        <a href="" data-id-kp="<?php echo $magang['id'] ?>" data-toggle="modal"
                                                            data-target="#ubahstatus<?php echo $magang['id'] ?>"
                                                            class="badge badge-warning d-block"><i class="fas fa-clock"></i> Update
                                                            Status
                                                        </a>
                                                    </td>
                                                <?php } else {
                                                } ?>
                                                <td>
                                                    <?php if ($user == 'superadmin') { ?>
                                                        <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                            data-target="#updatasertifikat<?php echo $magang['id'] ?>"><i
                                                                class="fa fa-upload"></i> Upload
                                                        </button>
                                                    <?php } else {
                                                    } ?>
                                                    <a href="<?php echo base_url() ?>kp/downloadsertifikat/<?= explode('/', $this->uri->uri_string())[2] ?>/<?php echo $magang['id'] ?>"
                                                        class="badge badge-success btn-block" title="download"><i
                                                            class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                                <!-- <?php if ($user == 'userskp') { ?>
                                                    <td>
                                                        <a href="" data-id-kp="<?php echo $magang['id']; ?>" data-toggle="modal"
                                                            data-target="#editmagang<?php echo $magang['id']; ?>"
                                                            class="badge badge-primary d-block"><i class="fas fa-edit"></i> Perbaharui
                                                        </a>
                                                        <br>
                                                        <a href="" data-id-sk="<?php echo $magang['id']; ?>" data-toggle="modal"
                                                            data-target="#hapuskp<?php echo $magang['id']; ?>"
                                                            class="badge badge-danger d-block"><i class="fas fa-trash-restore"></i>
                                                            Hapus
                                                        </a>
                                                    </td>
                                                <?php } else {
                                                } ?> -->
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


<!-- Hapus -->
<?php $no = 0;
foreach ($kp as $magang):
    $no++ ?>

    <div class="modal fade" id="hapuskp<?php echo $magang['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action=" <?php echo base_url() ?>kp/hapus_data/<?php echo $magang['id']; ?>">
                    <div class="modal-body text-center">
                        <h5>Apakah anda yakin untuk menghapus ini? </h5>
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

<!-- kp add -->
<div class="modal fade" id="addkerjapraktik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php
                    echo form_open_multipart('kp/proses_tambah_data');
                    ?>
                <div class="card-body row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" placeholder="Alamat Email..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">No. Induk</label>
                            <div class="input-group">
                                <input type="number" name="no_induk" class="form-control" placeholder="No. Induk..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Asal Instansi</label>
                            <div class="input-group">
                                <input type="text" name="asal_instansi" class="form-control"
                                    placeholder="Asal Instansi..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <div class="input-group">
                                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan..."
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Perihal</label>
                            <select name="perihal" id="perihal" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Pendataan Kerja Praktik">Pendataan Kerja Praktik</option>
                                <option value="Pendataan Penelitian">Pendataan Penelitian</option>
                            </select>
                            <small><span class="text-danger text-small" id="alert_perihal"></span></small>
                        </div>
                        <div class="form-group">
                            <label for="">Jangka Waktu</label>
                            <div class="input-group">
                                <input type="text" name="jangka_waktu" class="form-control"
                                    placeholder="Jangka Waktu..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Awal</label>
                            <div class="input-group">
                                <input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                            <div class="input-group">
                                <input type="date" name="tgl_akhir" class="form-control" placeholder="Tanggal Akhir..."
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Posisi Magang</label>
                            <select name="posisi_magang" id="posisi_magang" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang Pengembangan Kompetensi
                                    Manajerial</option>
                                <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang Pengembangan
                                    Kompetensi Teknis Umum</option>
                                <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang Pengembangan
                                    Kompetensi Teknis Inti</option>
                                <option value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">Bidang
                                    Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Perpustakaan">Perpustakaan</option>
                                <option value="Kearsipan">Kearsipan</option>
                                <option value="Widyaiswara">Widyaiswara</option>
                            </select>
                            <small><span class="text-danger text-small" id="alert_posisi_magang"></span></small>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- kp add -->


<!-- Kp Edit Menambahkan Periode&Nomor Sertifikat-->
<?php $no = 0;
foreach ($kp as $magang):
    $no++ ?>
    <div class="modal fade" id="detailsertifikat<?php echo $magang['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelengkapan Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('kp/tambahds') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $magang['id'] ?>">
                        <div class="card-body row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>No. Sertifikat</label>
                                    <?php $today = date('d.m.Y');
                                    $pecah = explode('.', $today);
                                    $bulan = $pecah[1];
                                    $tahun = $pecah[2]; ?>
                                    <input type="text" name="no_sertifikat" class="form-control"
                                        value=".../KPG.<?php echo $today; ?>/BPSDM<?php uniqid(); ?>">
                                    <small class="text-danger">*Sesuaikan nomor sertifikat terlebih
                                        dahulu</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Periode</label>
                                    <div class="input-group">
                                        <input type="text" name="periode" class="form-control"
                                            placeholder="Masukan Data Periode" required>
                                    </div>
                                    <small class="text-danger">*Sesuaikan periode dengan tanggal awal s/d akhir kegiatan
                                        kerja praktik</small>
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer right-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
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

<!-- Kp Edit Menambahkan Periode&Nomor Sertifikat-->

<!-- kp Edit-->
<?php $no = 0;
foreach ($kp as $magang):
    $no++ ?>
    <div class="modal fade" id="editmagang<?php echo $magang['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('kp/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $magang['id'] ?>">
                        <div class="card-body row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap..."
                                            value="<?php echo $magang['nama']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">No Handphone</label>
                                    <div class="input-group">
                                        <input type="text" name="nohp" class="form-control" placeholder="No Handphone..."
                                            value="<?php echo $magang['nohp']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jurusan</label>
                                    <div class="input-group">
                                        <input type="text" name="jurusan" class="form-control" placeholder="Jurusan..."
                                            value="<?php echo $magang['jurusan']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Induk</label>
                                    <div class="input-group">
                                        <input type="text" name="no_induk" class="form-control" placeholder="No. Induk..."
                                            value="<?php echo $magang['no_induk']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Posisi Magang</label>
                                    <select name="posisi_magang" id="posisi_magang" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                        <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang Pengembangan
                                            Kompetensi Manajerial</option>
                                        <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang Pengembangan
                                            Kompetensi Teknis Umum</option>
                                        <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang Pengembangan
                                            Kompetensi Teknis Inti</option>
                                        <option value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">Bidang
                                            Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Perpustakaan">Perpustakaan</option>
                                        <option value="Kearsipan">Kearsipan</option>
                                        <option value="Widyaiswara">Widyaiswara</option>
                                    </select>
                                    <small><span class="text-danger text-small" id="alert_posisi_magang"></span></small>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer right-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
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

<!-- Kp Edit-->

<!-- kp ubah status-->
<?php $no = 0;
foreach ($kp as $magang):
    $no++ ?>
    <div class="modal fade" id="ubahstatus<?php echo $magang['id'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('kp/editstatus') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body row">
                            <input type="hidden" name="id" value="<?= $magang['id'] ?>">
                            <div class="modal-body text-center">
                                <h5>Update Status Kelulusan Kerja Praktik: <?= $magang['nama']; ?> ? </h5>
                                <label for="stat">Silahkan Pilih Status :</label>
                                <br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="stat" value="Lulus" id="option1" autocomplete="off"
                                            checked> Lulus
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="stat" value="Belum Lulus" id="option2" autocomplete="off">
                                        Belum Lulus
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="stat" value="Tidak Lulus" id="option3" autocomplete="off">
                                        Tidak Lulus
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="modal-body text-left">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="ket_stat"
                                            placeholder="Tuliskan Keterangan Pengajuan"></textarea>
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

<!-- Kp ubah status-->

<!-- Generate Sertifikat-->
<?php $no = 0;
foreach ($kp as $magang):
    $no++ ?>
    <?php
    // Ambil data user dari database berdasarkan sesi penggun
    ?>
    <div class="modal fade" id="generatesertifikat<?php echo $magang['id'] ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Generate Sertifikat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('kp/generator') ?>" method="get" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $magang['id'] ?>">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap..."
                                    value="<?php echo $magang['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<!-- Generate Sertifikat-->


<!-- Upload Sertifikat-->
<?php $no = 0;
foreach ($kp as $magang):
    $no++ ?>
    <div class="modal fade" id="updatasertifikat<?php echo $magang['id'] ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Sertifikat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('kp/proses_uploadsertifikat') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $magang['id'] ?>">
                        <div class="form-group">
                            <label for="">Sertifikat</label>
                            <input type="file" class="form-control" name="userfile"
                                value="<?php echo $magang['sertifikat'] ?>">
                            <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
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

<!-- Upload Sertifikat-->