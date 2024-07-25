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
                    <h1 class="h3 mb-4 text-gray-800">Multimedia</h1>
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
                                            <td>Link Video</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($multimedia as $mu): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mu['tgl_multimedia']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mu['nama_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <a
                                                        href="<?php echo $mu['link_vidio']; ?>"><?php echo $mu['link_vidio']; ?></a>
                                                </td>
                                                <td>
                                                    <?php

                                                    if ($mu['status'] == 0) {
                                                        $status = 'Data Ditambahkan';
                                                        $warna = 'success';
                                                        $targetId = "";
                                                    } else {
                                                        $status = 'Data Diperbaharui';
                                                        $warna = 'primary';
                                                        $targetId = '';
                                                    }
                                                    ?>
                                                    <a href="javascript:void(0)" data-id-sk="<?php echo $mu['id'] ?>"
                                                        data-toggle="modal" data-target="<?= $targetId ?>"
                                                        class="badge badge-<?= $warna ?> d-block"> <?= $status ?>
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

<?php if ($user == 'devmultimedia'): ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Multimedia</h1>
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
                                            <td>Link Video</td>
                                            <td>Status</td>
                                            <?php if ($user == 'devmultimedia') { ?>
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($multimedia as $mu): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mu['tgl_multimedia']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mu['nama_kegiatan']; ?>
                                                </td>
                                                <td>
                                                    <a
                                                        href="<?php echo $mu['link_vidio']; ?>"><?php echo $mu['link_vidio']; ?></a>
                                                </td>

                                                <td>
                                                    <?php

                                                    if ($mu['status'] == 0) {
                                                        $status = 'Data Ditambahkan';
                                                        $warna = 'success';
                                                        $targetId = "#ubahstatus{$mu['id']}";
                                                    } else {
                                                        $status = 'Data Diperbaharui';
                                                        $warna = 'primary';
                                                        $targetId = '';
                                                    }
                                                    ?>
                                                    <a href="javascript:void(0)" data-id-sk="<?php echo $mu['id'] ?>"
                                                        data-toggle="modal" data-target="<?= $targetId ?>"
                                                        class="badge badge-<?= $warna ?> d-block"> <?= $status ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" data-id-kp="<?php echo $mu['id']; ?>" data-toggle="modal"
                                                        data-target="#editmultimedia<?php echo $mu['id']; ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i>
                                                        Perbaharui
                                                    </a>
                                                    <br>
                                                    <a href="" data-id-mul="<?php echo $mu['id']; ?>" data-toggle="modal"
                                                        data-target="#hapusmul<?php echo $mu['id']; ?>"
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

<?php foreach ($multimedia as $mu) { ?>
    <div class="modal fade" id="ubahstatus<?php echo $mu['id'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('multimedia/proses_edit_status') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?= $mu['id'] ?>" required>
                            <label for="">Status</label>
                            <div class="input-group">
                                <input type="text" name="" class="form-control" placeholder="Tanggal Kegiatan" required
                                    value="Data Diperbaharui" readonly>
                                <input type="hidden" name="status" class="form-control" required value="1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- Hapus -->
<?php $no = 0;
foreach ($multimedia as $mu):
    $no++ ?>

    <div class="modal fade" id="hapusmul<?php echo $mu['id'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action=" <?php echo base_url() ?>multimedia/hapus_data/<?php echo $mu['id'] ?>">
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

<!-- multimedia Tambah-->
<div class="modal fade" id="addmultimedia">
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
                <form role="form" action="<?= base_url('multimedia/proses_tambah_data') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_multimedia" class="form-control" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_kegiatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Link Video</label>
                        <input type="link" class="form-control" name="link_vidio">
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
<!-- multimedia -->


<!-- multimedia Edit-->
<?php $no = 0;
foreach ($multimedia as $mu):
    $no++ ?>
    <div class="modal fade" id="editmultimedia<?php echo $mu['id']; ?>">
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
                    <form role="form" action="<?= base_url('multimedia/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $mu['id'] ?>">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <div class="input-group">
                                <input type="date" name="tgl_multimedia" class="form-control" placeholder="Tanggal"
                                    value="<?php echo $mu['tgl_multimedia']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Link Video</label>
                            <input type="text" name="link_vidio" class="form-control" placeholder="Link Video"
                                value="<?php echo $mu['link_vidio']; ?>" required>
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
<!-- multimedia-->