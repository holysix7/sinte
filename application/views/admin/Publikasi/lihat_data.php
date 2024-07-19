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
                    <h1 class="h3 mb-4 text-gray-800">Publikasi</h1>
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
                                            <td>Tanggal</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Judul Flyer</td>
                                            <td>Link Publikasi Internal</td>
                                            <td>Link Publikasi External</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($publikasi as $pu): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pu['tgl_publikasi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pu['nama_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pu['judul_flayer']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $pu['link_internal']; ?>"><?php echo $pu['link_internal']; ?></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $pu['link_eksternal']; ?>"><?php echo $pu['link_eksternal']; ?></a>
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

<?php if ($user == 'devpublikasi'): ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Publikasi</h1>
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
                                            <td>Tanggal</td>
                                            <td>Nama Kegiatan</td>
                                            <td>Judul Flyer</td>
                                            <td>Link Publikasi Internal</td>
                                            <td>Link Publikasi External</td>
                                            <?php if ($user == 'devpublikasi') { ?>
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($publikasi as $pu): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pu['tgl_publikasi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pu['nama_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pu['judul_flayer']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $pu['link_internal']; ?>"><?php echo $pu['link_internal']; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $pu['link_eksternal']; ?>
                                                    <a href="<?php echo $pu['link_eksternal']; ?>"><?php echo $pu['link_eksternal']; ?></a>
                                                </td>

                                                <td>
                                                    <a href="" data-id-kp="<?php echo $pu['id']; ?>" data-toggle="modal"
                                                        data-target="#editpublikasi<?php echo $pu['id']; ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <br>
                                                    <a href="" data-id-pu="<?php echo $pu['id']; ?>" data-toggle="modal"
                                                        data-target="#hapuspu<?php echo $pu['id']; ?>"
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

<!-- Hapus -->
<?php $no = 0;
foreach ($publikasi as $pu):
    $no++ ?>

    <div class="modal fade" id="hapuspu<?php echo $pu['id'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action=" <?php echo base_url() ?>publikasi/hapus_data/<?php echo $pu['id'] ?>">
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

<!-- publikasi Tambah-->
<div class="modal fade" id="addpublikasi">
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
                <form role="form" action="<?= base_url('publikasi/proses_tambah_data') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_publikasi" class="form-control" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kegiatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Flyer</label>
                        <input type="text" class="form-control" name="judul_flayer">
                    </div>
                    <div class="form-group">
                        <label for="">Link Publikasi Internal</label>
                        <input type="link" class="form-control" name="link_internal">
                    </div>
                    <div class="form-group">
                        <label for="">Link Publikasi External</label>
                        <input type="link" class="form-control" name="link_eksternal">
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
<!-- publikasi -->


<!-- publikasi Edit-->
<?php $no = 0;
foreach ($publikasi as $pu):
    $no++ ?>
    <div class="modal fade" id="editpublikasi<?php echo $pu['id']; ?>">
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
                    <form role="form" action="<?= base_url('publikasi/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $pu['id'] ?>">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <div class="input-group">
                                <input type="date" name="tgl_publikasi" class="form-control" placeholder="Tanggal"
                                    value="<?php echo $pu['tgl_publikasi']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kegiatan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama_kegiatan"
                                    value="<?php echo $pu['nama_kegiatan']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Judul Flyer</label>
                            <input type="text" class="form-control" name="judul_flayer"
                                value="<?php echo $pu['judul_flayer']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Link Publikasi Internal</label>
                            <input type="link" class="form-control" name="link_internal"
                                value="<?php echo $pu['link_internal']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Link Publikasi External</label>
                            <input type="link" class="form-control" name="link_eksternal"
                                value="<?php echo $pu['link_eksternal']; ?>" required>
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
<!-- publikasi-->