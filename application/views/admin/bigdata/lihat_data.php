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
                <h1 class="h3 mb-4 text-gray-800">Bigdata</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addbigdata"><i class="fas fa-plus"></i> Tambah data </button>
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
                                        <td>Tanggal Kegiatan</td>
                                        <td>Jenis Kegiatan</td>
                                        <td>Nama Kegiatan</td>
                                        <td>Bidang Penyelenggara</td>
                                        <td>Jumlah Peserta</td>
                                        <td>Link Sertifikat</td>
                                        <td>Foto Kegiatan</td>
                                        <td>Data Peserta</td>
                                        <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th>
                                        <?php } else {
                                        } ?>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bigdata as $bd): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $bd['tgl_kegiatan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $bd['jenis_kegiatan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $bd['nama_kegiatan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $bd['bidang_penyelenggara'];   ?>
                                            </td>

                                            <td>
                                                <?php echo $bd['jumlah_peserta']; ?>
                                            </td>
                                            <td>
                                                <?php echo $bd['link_sertifikat']; ?>
                                            </td>

                                            <td>
                                                <button type="button" class="badge badge-dark btn-flat btn-block" data-toggle="modal"
                                                    data-target="#upfotokegiatan<?php echo $bd['id_bigdata']; ?>">Upload</button>
                                                <a href="<?php echo base_url() ?>bigdata/download1/<?php echo $bd['id_bigdata']; ?>"
                                                    class="badge badge-success btn-flat btn-block" title="download">Download</a>
                                            </td>
                                            <td>
                                                <button type="button" class="badge badge-dark btn-flat btn-block" data-toggle="modal"
                                                    data-target="#updatapeserta<?php echo $bd['id_bigdata']; ?>">Upload</button>
                                                <a href="<?php echo base_url() ?>bigdata/download2/<?php echo $bd['id_bigdata']; ?>"
                                                    class="badge badge-success btn-flat btn-block" title="download">Download</a>

                                            </td>
                                            <td>
                                                <button type="button" class="badge badge-primary btn-block" data-toggle="modal" 
                                                    data-target="#editbigdata<?php  echo $bd['id_bigdata']; ?>">Edit</button>
                                                <br>
                                                <a href="<?php echo base_url() ?>bigdata/hapus_data/<?php echo $bd['id_bigdata']; ?>"
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
        <!-- End of Main Content -->
        <!-- modal tambah -->
        <?php $this->load->view('admin/ekstra/modal'); ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>


<!-- Tambah Bigdata -->
<div class="modal fade" id="addbigdata">
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
                    echo form_open_multipart('bigdata/proses_tambah_data');
                    ?>
                    <div class="card-body row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tanggal Kegiatan</label>
                                <input type="date" name="tgl_kegiatan" class="form-control" placeholder="Tanggal Kegiatan"
                                required>
                            </div>

                            <!-- dropdown  -->
                            <div class="form-group">
                                <label>Jenis Kegiatan</label>
                                <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Pelatihan">Pelatihan</option>
                                    <option value="Sertifikasi">Sertifikasi</option>
                                    <option value="Webinar">Webinar</option>
                                </select>
                                <small><span class="text-danger text-small" id="alert_jenis_kegiatan"></span></small>
                            </div>
                             <!-- dropdown  -->

                             <div class="form-group">
                                <label for="">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="nama_kegiatan" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Bidang Penyelenggara</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bidang_penyelenggara" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Peserta</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="jumlah_peserta" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Link Sertifikat</label>
                                <input type="textr" class="form-control" name="link_sertifikat" required>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="row mb-3">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                    </div>
                </p>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Tambah Bigdata -->



<!-- bigdata Edit-->
<?php $no = 0;
foreach ($bigdata as $bd):
    $no++ ?>
    <div class="modal fade" id="editbigdata<?php echo $bd['id_bigdata']; ?>">
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
                    <form role="form" action="<?= base_url('bigdata/proses_edit_data') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_bigdata" value="<?php echo $bd['id_bigdata'] ?>">
                            <div class="card-body row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Tanggal Kegiatan</label>
                                        <div class="input-group">
                                            <input type="date" name="tgl_kegiatan" class="form-control" placeholder="Tanggal Kegiatan"
                                            value="<?php echo $bd['tgl_kegiatan']; ?>" required>
                                        </div>
                                    </div>
                                    <!-- dropdown  -->
                                    <div class="form-group">
                                        <label>Jenis Kegiatan</label>
                                        <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Pelatihan">Pelatihan</option>
                                            <option value="Sertifikasi">Sertifikasi</option>
                                            <option value="Webinar">Webinar</option>
                                        </select>
                                        <small><span class="text-danger text-small" id="alert_jenis_kegiatan"></span></small>
                                    </div>
                                    <!-- dropdown  -->
                                    <div class="form-group">
                                        <label for="">Nama Kegiatan</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nama_kegiatan"
                                                value="<?php echo $bd['nama_kegiatan']; ?>" required>
                                            </div>
                                    </div>   
                                </div>
                                
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Bidang Penyelenggara</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bidang_penyelenggara"
                                                value="<?php echo $bd['bidang_penyelenggara']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah Peserta</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="jumlah_peserta"
                                                value="<?php echo $bd['jumlah_peserta']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Link Sertifikat</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="link_sertifikat"
                                                value="<?php echo $bd['link_sertifikat']; ?>" required>
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
<!-- bigdata Edit-->



<!-- Upload Foto Kegiatan-->
<?php $no = 0;
foreach ($bigdata as $bd):
    $no++ ?>

    <div class="modal fade" id="upfotokegiatan<?php echo $bd['id_bigdata']; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Foto Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('bigdata/proses_uploadfotokegiatan') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_bigdata" value="<?php echo $bd['id_bigdata'] ?>">
                        <div class="form-group">
                            <label for="">Foto Kegiatan</label>
                            <input type="file" class="form-control" name="userfile"
                                value="<?php echo $bd['foto_kegiatan']; ?>">
                            <small class="text-danger">Support file berekstensi GIF, JPG, PNG, dan JPEG</small>
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
<?php $no = 0;
foreach ($bigdata as $bd):
    $no++ ?>

    <div class="modal fade" id="updatapeserta<?php echo $bd['id_bigdata']; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Data Peserta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('bigdata/proses_uploaddatapeserta') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_bigdata" value="<?php echo $bd['id_bigdata'] ?>">
                        <div class="form-group">
                            <label for="">Data Peserta</label>
                            <input type="file" class="form-control" name="userfile1"
                                value="<?php echo $bd['bigdata_peserta']; ?>">
                                <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan PPT</small>
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


