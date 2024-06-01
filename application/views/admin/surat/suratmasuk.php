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
                <h1 class="h3 mb-4 text-gray-800">Surat Masuk</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" data-toggle="modal"
                                        data-target="#addsm"><i class="fas fa-plus"></i> Tambah data </button>
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
                                        <th>Nomor Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Indeks</th>
                                        <th>Asal Surat</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Diterima</th>
                                        <th>Keterangan</th>
                                        <th>Berkas</th>
                                        <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th><?php } else {
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($suratmasuk as $sm): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $sm->no_suratmasuk; ?></td>
                                            <td><?= $sm->judul_suratmasuk; ?></td>
                                            <td><?= $sm->judul_indeks; ?></td>
                                            <td><?= $sm->asal_surat; ?></td>
                                            <td><?php $date = date_create($sm->tanggal_masuk);
                                            echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?php $date = date_create($sm->tanggal_diterima);
                                            echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?= $sm->keterangan; ?></td>
                                            <td><a href="<?php if ($sm->berkas_suratmasuk != "") {
                                                echo base_url('admin/download/suratmasuk/' . $sm->berkas_suratmasuk);
                                            } elseif ($sm->berkas_suratmasuk == "") {
                                                echo '#';
                                            } ?>" class="badge badge-success d-block"><i class="fa fa-download"></i> Download
                                            </td>
                                            <?php if ($user == 'superadmin') { ?>
                                                <td>

                                                    <a href="" data-id-sk="<?php echo $sm->id_suratmasuk ?>" data-toggle="modal"
                                                        data-target="#ubahsm<?php echo $sm->id_suratmasuk ?>"
                                                        class="badge badge-primary d-block"><i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <br>
                                                    <a href="" data-id-sk="<?php echo $sm->id_suratmasuk ?>"
                                                        data-toggle="modal"
                                                        data-target="#hapussm<?php echo $sm->id_suratmasuk ?>"
                                                        class="badge badge-danger d-block"><i class="fas fa-trash-restore"></i> Hapus
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


<!-- Hapus -->
<?php $no = 0;
foreach ($suratmasuk as $sm):
    $no++ ?>

    <div class="modal fade" id="hapussm<?php echo $sm->id_suratmasuk ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('admin/hapus_datasm/' . $sm->id_suratmasuk) ?>">
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

<!-- Ubah Surat Masuk -->
<?php $no = 0;
foreach ($suratmasuk as $sm):
    ?>
    <div class="modal fade" id="ubahsm<?php echo $sm->id_suratmasuk ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('admin/aksiubahsm') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body row">
                            <input type="hidden" id="id_suratmasuk" name="id_suratmasuk" value="<?= $sm->id_suratmasuk ?>">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <?php $today = date('d,m,Y');
                                    $pecah = explode(',', $today);
                                    $bulan = $pecah[1];
                                    $tahun = $pecah[2]; ?>
                                    <input type="text" id="no_suratmasuk" name="no_suratmasuk" class="form-control"
                                        value="<?= $sm->no_suratmasuk ?>">
                                        <small class="text-danger">Sesuaikan Nomor Surat Terlebih Dahulu</small>
                                </div>
                                <div class="form-group">
                                    <label>Judul Surat Masuk</label>
                                    <input type="text" id="judul_suratmasuk" name="judul_suratmasuk" class="form-control"
                                        value="<?= $sm->judul_suratmasuk ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Asal Surat</label>
                                    <input type="text" id="asal_surat" name="asal_surat" class="form-control"
                                        value="<?= $sm->asal_surat ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label>Dokumen surat</label>
                                    <div class="input-group">
                                        <div class="custom-file">s
                                            <input type="file" name="berkas_suratmasuk" class="custom-file-input">
                                            <label class="custom-file-label"><?= $sm->berkas_suratmasuk ?></label>
                                        </div>
                                    </div>
                                    <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan PPT</small>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Masuk:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                                            value="<?= $sm->tanggal_masuk ?>" class="form-control"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Diterima:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" id="tanggal_diterima" name="tanggal_diterima"
                                            value="<?= $sm->tanggal_diterima ?>" class="form-control"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            data-mask>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Index Surat</label>
                                    <select class="form-control" name="id_indeks">
                                        <option id="id_indeks" value="<?= $sm->id_indeks ?>">
                                            <?php
                                            echo $sm->judul_indeks
                                                ?>
                                        </option>
                                        <?php foreach ($indeks as $i): ?>
                                            <option value="<?php echo $i->id_indeks; ?>">
                                                <?php echo strtoupper($i->judul_indeks); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan"><?php echo $sm->keterangan ?></textarea>
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
<!-- Ubah Surat Masuk -->
