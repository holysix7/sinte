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
                <h1 class="h3 mb-4 text-gray-800">Indeks Jenis Kegiatan</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addindeks"><i class="fas fa-plus"></i> Tambah data </button>
                                </div>
                            <?php } else { ?>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Indeks</th>
                                        <th>Nama Indeks</th>
                                        <th>Detail</th>
                                        <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th>
                                        <?php } else {
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($indeks as $i):
                                        // var_dump(is_object($i));
                                        // die; 
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= is_object($i) ? $i->kode_indeks : $i['kode_indeks']; ?></td>
                                            <td><?= is_object($i) ? $i->judul_indeks : $i['judul_indeks']; ?></td>
                                            <td><?= '<div class=text-justify>' . is_object($i) ? $i->detail : $i['detail'] . '</div>'; ?>
                                            </td>
                                            <?php if ($user == 'superadmin') { ?>
                                                <td>
                                                    <a href=""
                                                        data-id-i="<?php echo is_object($i) ? $i->id_indeks : $i['id_indeks'] ?>"
                                                        data-toggle="modal"
                                                        data-target="#ubahindeks<?php echo is_object($i) ? $i->id_indeks : $i['id_indeks'] ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <br>
                                                    <a href=""
                                                        data-id-sk="<?php echo is_object($i) ? $i->id_indeks : $i['id_indeks'] ?>"
                                                        data-toggle="modal"
                                                        data-target="#hapusindeks<?php echo is_object($i) ? $i->id_indeks : $i['id_indeks'] ?>"
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
        <?php $this->load->view('admin/ekstra/modal')
            ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Hapus -->
<?php $no = 0;
foreach ($indeks as $i):
    $no++ ?>

    <div class="modal fade" id="hapusindeks<?php echo $i->id_indeks ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('admin/hapus_dataindex/' . $i->id_indeks) ?>">
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

<!-- Ubah indeks -->

<?php $no = 0;
foreach ($indeks as $i):
    $no++ ?>

    <div class="modal fade" id="ubahindeks<?php echo $i->id_indeks ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/aksiubahindeks') ?>" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Data <?php echo $i->kode_indeks ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_indeks" name="id_indeks" value="<?= $i->id_indeks ?>">
                            <div class="form-group">
                                <label for="">Kode Indeks</label>
                                <div class="input-group">
                                    <input type="text" id="kode_indeks" name="kode_indeks" value="<?= $i->kode_indeks ?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Indeks</label>
                                <div class="input-group">
                                    <input type="text" id="judul_indeks" name="judul_indeks" value="<?= $i->judul_indeks ?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Detail</label>
                                <textarea name="detail" id="detail" required class="form-control"
                                    rows="5"><?php echo $i->detail ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- Ubah indeks -->