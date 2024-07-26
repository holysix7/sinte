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
                    <h1 class="h3 mb-4 text-gray-800">E-services</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row">
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Tanggal Kegiatan</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Jumlah Peserta</td>
                                            <td>Jadwal Kegiatan</td>
                                            <td>Data Peserta</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($eservice as $es): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $es['tgl_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $es['nama_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $es['jumlah_peserta']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>eservices/download1/<?php echo $es['id']; ?>"
                                                        class="badge badge-success btn-block" title="download"><i
                                                            class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>eservices/download2/<?php echo $es['id']; ?>"
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

            <!-- Footer -->
            <?php $this->load->view('templates/copyright') ?>
            <!-- End of Footer -->

            <!-- End of Main Content -->
            <?php $this->load->view('admin/ekstra/modal') ?>

        </div>
        <!-- End of Content Wrapper -->
    </div>
<?php endif; ?>

<?php if ($user == 'deveservice'): ?>
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
                    <h1 class="h3 mb-4 text-gray-800">E-services</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row">
                                <?php if ($user == 'deveservice') { ?>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                            data-target="#addeservices"><i class="fas fa-plus"></i> Tambah data </button>
                                    </div>
                                <?php } else { ?>
                                <?php } ?>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Tanggal Kegiatan</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Jumlah Peserta</td>
                                            <td>Jadwal Kegiatan</td>
                                            <td>Data Peserta</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($eservice as $es): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $es['tgl_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $es['nama_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $es['jumlah_peserta']; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="badge badge-dark btn-block "
                                                        data-toggle="modal"
                                                        data-target="#upjadwalkegiatan<?php echo $es['id']; ?>"><i
                                                            class="fa fa-upload"></i> Upload
                                                    </button>
                                                    <a href="<?php echo base_url() ?>eservices/download1/<?php echo $es['id']; ?>"
                                                        class="badge badge-success btn-block" title="download"><i
                                                            class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                        data-target="#updatapeserta<?php echo $es['id']; ?>"><i
                                                            class="fa fa-upload"></i> Upload
                                                    </button>
                                                    <a href="<?php echo base_url() ?>eservices/download2/<?php echo $es['id']; ?>"
                                                        class="badge badge-success btn-block" title="download"><i
                                                            class="fa fa-download"></i> Download
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" data-id-kp="<?php echo $es['id']; ?>" data-toggle="modal"
                                                        data-target="#editeservices<?php echo $es['id']; ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i>
                                                        Perbaharui
                                                    </a>
                                                    <br>
                                                    <a href="" data-id-pu="<?php echo $es['id']; ?>" data-toggle="modal"
                                                        data-target="#hapuser<?php echo $es['id']; ?>"
                                                        class="badge badge-danger d-block"><i class="fas fa-trash-restore"></i>
                                                        Hapus
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

            <!-- Footer -->
            <?php $this->load->view('templates/copyright') ?>
            <!-- End of Footer -->

            <!-- End of Main Content -->
            <?php $this->load->view('admin/ekstra/modal') ?>

        </div>
        <!-- End of Content Wrapper -->
    </div>
<?php endif; ?>


<!-- Modal Untuk E-services -->

<!-- Hapus -->
<?php $no = 0;
foreach ($eservice as $es):
    $no++ ?>

    <div class="modal fade" id="hapuser<?php echo $es['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action=" <?php echo base_url() ?>eservices/hapus_data/<?php echo $es['id']; ?>">
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

<!-- Eservices Tambah-->

<div class="modal fade" id="addeservices">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <form role="form" action="<?= base_url('eservices/proses_tambah_data') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tanggal Kegiatan</label>
                        <div class="input-group">
                            <input type="date" name="tgl_kegiatan" class="form-control" placeholder="Tanggal Kegiatan"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kegiatan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Peserta</label>
                        <input type="number" class="form-control" name="jumlah_peserta" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-5">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
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

<!-- Upload Jadwal Kegiatan-->
<?php $no = 0;
foreach ($eservice as $es):
    $no++ ?>

    <div class="modal fade" id="upjadwalkegiatan<?php echo $es['id']; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Jadwal Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('eservices/proses_uploadjadwalkegiatan') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $es['id'] ?>">
                        <div class="form-group">
                            <label for="">Jadwal Kegiatan</label>
                            <input type="file" class="form-control" name="userfile"
                                value="<?php echo $es['jadwal_kegiatan']; ?>">
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
<!-- Upload Jadwal Kegiatan-->

<!-- Upload Data Peserta-->
<?php $no = 0;
foreach ($eservice as $es):
    $no++ ?>

    <div class="modal fade" id="updatapeserta<?php echo $es['id']; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Data Pesera</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('eservices/proses_uploaddatapeserta') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $es['id'] ?>">
                        <div class="form-group">
                            <label for="">Data Peserta</label>
                            <input type="file" class="form-control" name="userfile1"
                                value="<?php echo $es['data_peserta']; ?>">
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
<!-- Upload Data Peserta-->

<!-- E-services Edit-->
<?php $no = 0;
foreach ($eservice as $es):
    $no++ ?>

    <div class="modal fade" id="editeservices<?php echo $es['id']; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('eservices/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $es['id'] ?>">
                        <div class="form-group">
                            <label for="">Tanggal Kegiatan</label>
                            <div class="input-group">
                                <input type="date" name="tgl_kegiatan" class="form-control" placeholder="Tanggal Kegiatan"
                                    value="<?php echo $es['tgl_kegiatan']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kegiatan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama_kegiatan"
                                    value="<?php echo $es['nama_kegiatan']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Peserta</label>
                            <input type="number" class="form-control" name="jumlah_peserta"
                                value="<?php echo $es['jumlah_peserta']; ?>" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary">Update</button>
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
<!-- E-services Edit-->