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
                <h1 class="h3 mb-4 text-gray-800">Kunjungan Tamu</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <!-- <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                    data-target="#addtamu"><i class="fas fa-plus"></i> Tambah data </button>
                            </div>
                        </div> -->
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Tanggal Kunjungan</td>
                                        <td>Nama Lengkap</td>
                                        <td>Alamat Email</td>
                                        <td>Nomor Telepon</td>
                                        <td>Asal Instansi</td>
                                        <td>Jabatan</td>
                                        <td>Perihal</td>
                                        <td>Jumlah Tamu</td>
                                        <!-- <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th>
                                        <?php } else {
                                        } ?> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tamu as $tm): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['tanggal_kunjungan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['nomor']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['instansi']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['jabatan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['perihal']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['jumlah_tamu']; ?>
                                            </td>

                                            <!-- <?php if ($user == 'superadmin') { ?>
                                                <td>
                                                    <a href="" data-id-tamu="<?php echo $tm['id']; ?>" data-toggle="modal"
                                                        data-target="#edittamu<?php echo $tm['id']; ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i> Perbaharui
                                                    </a>
                                                    <br>
                                                    <a href="" data-id-tamu="<?php echo $tm['id']; ?>" data-toggle="modal"
                                                        data-target="#hapustamu<?php echo $tm['id']; ?>"
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


<!-- Hapus -->
<?php $no = 0;
foreach ($tamu as $tm):
    $no++ ?>

    <div class="modal fade" id="hapustamu<?php echo $tm['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url() ?>tamu/hapus_data/<?php echo $tm['id']; ?>">
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


<!-- tamu add -->
<div class="modal fade" id="addtamu">
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
                    echo form_open_multipart('tamu/proses_tambah_data');
                    ?>
                <div class="card-body row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Tanggal Kunjungan</label>
                            <div class="input-group">
                                <input type="date" name="tanggal_kunjungan" class="form-control"
                                    placeholder="Tanggal Kunjungan..." required>
                            </div>
                        </div>
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
                            <label for="">Nomor Telepon</label>
                            <div class="input-group">
                                <input type="number" name="nomor" class="form-control" placeholder="Nomor Telepon..."
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Instansi</label>
                            <div class="input-group">
                                <input type="text" name="instansi" class="form-control" placeholder="Asal Instansi..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <div class="input-group">
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Perihal</label>
                            <div class="input-group">
                                <input type="text" name="perihal" class="form-control" placeholder="Perihal..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Tamu</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_tamu" class="form-control"
                                    placeholder="Jumlah Tamu..." required>
                            </div>
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
<!-- tamu add -->



<!-- tamu Edit-->
<?php $no = 0;
foreach ($tamu as $tm): ?>
    $no++ ?>
    <div class="modal fade" id="edittamu<?php echo $tm['id']; ?>">
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
                    <form role="form" action="<?= base_url('tamu/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $tm['id'] ?>">
                        <div class="card-body row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal Kunjungan</label>
                                    <div class="input-group">
                                        <input type="date" name="tanggal_kunjungan" class="form-control"
                                            placeholder="Tanggal Kunjungan..."
                                            value="<?php echo $tm['tanggal_kunjungan']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap..."
                                            value="<?php echo $tm['nama']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Email</label>
                                    <div class="input-group">
                                        <input type="text" name="email" class="form-control" placeholder="Alamat Email..."
                                            value="<?php echo $tm['email']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <div class="input-group">
                                        <input type="number" name="nomor" class="form-control"
                                            placeholder="Nomor Telepon..." value="<?php echo $tm['nomor']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Instansi</label>
                                    <div class="input-group">
                                        <input type="text" name="instansi" class="form-control"
                                            placeholder="Asal Instansi..." value="<?php echo $tm['instansi']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <div class="input-group">
                                        <input type="text" name="jabatan" class="form-control" placeholder="Jabatan..."
                                            value="<?php echo $tm['jabatan']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Perihal</label>
                                    <div class="input-group">
                                        <input type="text" name="perihal" class="form-control" placeholder="Perihal..."
                                            value="<?php echo $tm['perihal']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Tamu</label>
                                    <div class="input-group">
                                        <input type="number" name="jumlah_tamu" class="form-control"
                                            placeholder="Jumlah Tamu..." value="<?php echo $tm['jumlah_tamu']; ?>" required>
                                    </div>
                                </div>
                            </div>

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

<!-- tamu Edit-->