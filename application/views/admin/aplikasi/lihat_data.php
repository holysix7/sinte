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
                    <h1 class="h3 mb-4 text-gray-800">Aplikasi</h1>
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
                                            <td>Nama Aplikasi</td>
                                            <td>Deskripsi</td>
                                            <td>Link Aplikasi</td>
                                            <td>Waktu</td>
                                            <td>Narasumber</td>
                                            <td>Penanggung Jawab</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($aplikasi as $ap): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['tgl_aplikasi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['nama_aplikasi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['deskripsi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['waktu']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['narasumber']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['penanggung_jawab']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $ap['link_aplikasi']; ?>"><?php echo $ap['link_aplikasi']; ?></a>
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


<?php if ($user == 'devaplikasi'): ?>
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
                    <h1 class="h3 mb-4 text-gray-800">Aplikasi</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row">
                                <?php if ($user == 'devaplikasi') { ?>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                            data-target="#addaplikasi"><i class="fas fa-plus"></i> Tambah data </button>
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
                                            <td>Nama Aplikasi</td>
                                            <td>Deskripsi</td>
                                            <td>Link Aplikasi</td>
                                            <td>Waktu</td>
                                            <td>Narasumber</td>
                                            <td>Penanggung Jawab</td>
                                            <?php if ($user == 'devaplikasi') { ?>
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($aplikasi as $ap): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['tgl_aplikasi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['nama_aplikasi']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['deskripsi']; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo $ap['link_aplikasi']; ?>"><?php echo $ap['link_aplikasi']; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $ap['waktu']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['narasumber']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ap['penanggung_jawab']; ?>
                                                </td>

                                                <td>
                                                    <a href="" data-id-kp="<?php echo $ap['id']; ?>" data-toggle="modal"
                                                        data-target="#editaplikasi<?php echo $ap['id']; ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <br>
                                                    <a href="" data-id-pu="<?php echo $ap['id']; ?>" data-toggle="modal"
                                                        data-target="#hapusap<?php echo $ap['id']; ?>"
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
foreach ($aplikasi as $ap):
    $no++ ?>

    <div class="modal fade" id="hapusap<?php echo $ap['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action=" <?php echo base_url() ?>aplikasi/hapus_data/<?php echo $ap['id']; ?>">
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

<!-- Aplikasi Tambah-->
<div class="modal fade" id="addaplikasi">
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
                <form role="form" action="<?= base_url('aplikasi/proses_tambah_data') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_aplikasi" class="form-control" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Aplikasi</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama_aplikasi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="">Link Aplikasi</label>
                        <input type="link" class="form-control" name="link_aplikasi">
                    </div>
                    <div class="form-group">
                        <label for="">Waktu</label>
                        <input type="time" class="form-control" name="waktu">
                    </div>
                    <div class="form-group">
                        <label for="">Narasumber</label>
                        <input type="text" class="form-control" name="narasumber">
                    </div>
                    <div class="form-group">
                        <label for="">Penanggung Jawab</label>
                        <input type="text" class="form-control" name="penanggung_jawab">
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
<!-- aplikasi -->


<!-- Aplikasi Edit-->
<?php $no = 0;
foreach ($aplikasi as $ap):
    $no++ ?>
    <div class="modal fade" id="editaplikasi<?php echo $ap['id']; ?>">
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
                    <form role="form" action="<?= base_url('aplikasi/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $ap['id'] ?>">
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <div class="input-group">
                                <input type="date" name="tgl_aplikasi" class="form-control" placeholder="Tanggal"
                                    value="<?php echo $ap['tgl_aplikasi']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Aplikasi</label>
                            <input type="text" class="form-control" name="nama_aplikasi"
                                value="<?php echo $ap['nama_aplikasi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $ap['deskripsi']; ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Link Aplikasi</label>
                            <input type="link" class="form-control" name="link_aplikasi"
                                value="<?php echo $ap['link_aplikasi']; ?>" required>
                        </div>
                            <div class="form-group">
                                <label for="">Waktu</label>
                                <input type="time" class="form-control" name="waktu" value="<?= $ap['waktu'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Narasumber</label>
                                <input type="text" class="form-control" name="narasumber" value="<?= $ap['narasumber'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Penanggung Jawab</label>
                                <input type="text" class="form-control" name="penanggung_jawab" value="<?= $ap['penanggung_jawab'] ?>">
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
<!-- aplikasi-->