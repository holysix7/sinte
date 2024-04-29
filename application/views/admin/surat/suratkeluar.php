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
                <h1 class="h3 mb-4 text-gray-800">Surat Keluar</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <?php if ($user == 'superadmin') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addsk"><i class="fas fa-plus"></i> Tambah data </button>
                                </div>
                            <?php } else { ?>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <?php if ($user == 'userskp') { ?>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addsk"><i class="fas fa-plus"></i> Tambah data </button>
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
                                        <th>Tujuan</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Keterangan</th>
                                        <th>Berkas</th>
                                        <?php if ($user == 'superadmin') { ?>
                                            <th>Aksi</th>
                                        <?php } else {
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($suratkeluar as $sk): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $sk->no_suratkeluar; ?></td>
                                            <td><?= $sk->judul_suratkeluar; ?></td>
                                            <td><?= $sk->judul_indeks; ?></td>
                                            <td><?= $sk->tujuan; ?></td>
                                            <td><?php $date = date_create($sk->tanggal_keluar);
                                            echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?= $sk->keterangan; ?></td>
                                            <td><a href="<?php if ($sk->berkas_suratkeluar != "") {
                                                echo base_url('admin/download/suratkeluar/' . $sk->berkas_suratkeluar);
                                            } elseif ($sk->berkas_suratkeluar == "") {
                                                echo '#';
                                            } ?>" class="badge badge-success btn-block"
                                                    title="download">Download</i></a></i></a>

                                            </td>
                                            <?php if ($user == 'superadmin') { ?>

                                                <td>
                                                    <a href="" data-id-sk="<?php echo $sk->id_suratkeluar ?>"
                                                        data-toggle="modal"
                                                        data-target="#ubahsk<?php echo $sk->id_suratkeluar ?>"
                                                        class="badge badge-primary d-block">edit</a>
                                                    <br>
                                                    <a
                                                        href="<?php echo base_url('admin/hapus_datask/' . $sk->id_suratkeluar) ?>">
                                                        <button
                                                            onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')"
                                                            class="badge badge-danger d-block">Hapus</button>
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


<!-- Ubah Surat Keluar -->

<?php $no = 0;
foreach ($suratkeluar as $sk):
    $no++ ?>

    <div class="modal fade" id="ubahsk<?php echo $sk->id_suratkeluar ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('admin/editsk') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body row">
                            <input type="hidden" name="id_suratkeluar" value="<?= $sk->id_suratkeluar ?>">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <?php $today = date('d,m,Y');
                                    $pecah = explode(',', $today);
                                    $bulan = $pecah[1];
                                    $tahun = $pecah[2]; ?>
                                    <input type="text" name="no_suratkeluar" class="form-control"
                                        value="<?= $sk->no_suratkeluar ?>">
                                    <small class="text-danger">Sesuaikan Nomor Surat Terlebih Dahulu</small>
                                </div>
                                <div class="form-group">
                                    <label>Judul Surat Keluar</label>
                                    <input type="text" name="judul_suratkeluar" class="form-control"
                                        value="<?= $sk->judul_suratkeluar ?>" placeholder="Judul Surat">
                                </div>
                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" value="<?= $sk->tujuan ?>"
                                        placeholder="Tujuan">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Keluar:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="tanggal_keluar" class="form-control"
                                            value="<?= $sk->tanggal_keluar ?>" data-inputmask-alias="datetime"
                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                            value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <select class="form-control" name="id_indeks">
                                        <?php foreach ($indeks as $i): ?>
                                            <option value="<?php echo $i->id_indeks; ?>">
                                                <?php echo strtoupper($i->judul_indeks); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dokumen surat</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="berkas_suratkeluar" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label"
                                                for="exampleInputFile"><?= $sk->berkas_suratkeluar ?></label>
                                        </div>
                                    </div>
                                    <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
                                        PPT</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"
                                        placeholder="Keterangan"><?php echo $sk->keterangan ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
<!-- Ubah Surat Keluar -->