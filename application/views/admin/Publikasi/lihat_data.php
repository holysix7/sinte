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
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addpublikasi"><i class="fas fa-plus"></i> Tambah data </button>
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
                                        <td>Tanggal</td>
                                        <td>Nama Kegiatan</td>
                                        <td>Judul Flyer</td>
                                        <td>Link Publikasi Internal</td>
                                        <td>Link Publikasi External</td>
                                        <?php if ($user == 'superadmin') { ?>
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
                                                <?php echo $pu['link_internal']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pu['link_eksternal'];   ?>
                                            </td>

                                            <td>
                                                <button type="button" class="badge badge-primary btn-block" data-toggle="modal" 
                                                    data-target="#editpublikasi<?php echo $pu['id']; ?>">Edit</button>
                                                <br>
                                                <a href="<?php echo base_url() ?>publikasi/hapus_data/<?php echo $pu['id']; ?>"
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