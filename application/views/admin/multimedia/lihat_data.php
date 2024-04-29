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
                            <div class="col-md-auto">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addmultimedia">Tambah
                                    Multimedia</button>
                            </div>
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
                                        <?php if ($user == 'superadmin') { ?>
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
                                                <?php echo $mu['link_vidio']; ?>
                                            </td>

                                            <td>
                                                <button type="button" class="badge badge-primary btn-block"
                                                    data-toggle="modal"
                                                    data-target="#editmultimedia<?php echo $mu['id']; ?>">Edit</button>
                                                <br>
                                                <a href="<?php echo base_url() ?>multimedia/hapus_data/<?php echo $mu['id']; ?>"
                                                    class="badge badge-danger btn-flat btn-block">Hapus</a>
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
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
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
                            <label for="">Nama Kegiatan</label>
                            <div class="input-group">
                                <input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan"
                                    value="<?php echo $mu['nama_kegiatan']; ?>" required>
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
                                <button type="reset" class="btn btn-danger">Reset</button>
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