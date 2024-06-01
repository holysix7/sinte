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
                    <h1 class="h3 mb-4 text-gray-800">Surat Pengajuan</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                        data-target="#addsk"><i class="fas fa-plus"></i> Tambah data </button>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Judul Surat</th>
                                            <th>Jenis Surat</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Keterangan</th>
                                            <th>Berkas</th>
                                            <th>Status Pengajuan</th>
                                            <th>Keterangan Status Pengajuan</th>
                                            
                                            <?php if ($user == 'superadmin') { ?>
                                                <th>Update Status Pengajuan</th>
                                                
                                            <?php } else {
                                            } ?>

                                            <th>Surat Balasan</th>

                                            <?php if ($user == 'superadmin') { ?>
                                               
                                                <th>Aksi</th>
                                            <?php } else {
                                            } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($suratpengajuan as $sk): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $sk->no_suratpengajuan; ?></td>
                                                <td><?= $sk->judul_suratpengajuan; ?></td>
                                                <td><?= $sk->judul_indeks; ?></td>
                                                <td><?= $sk->tujuan; ?></td>
                                                <td><?php $date = date_create($sk->tanggal_pengajuan);
                                                    echo date_format($date, 'd/m/Y'); ?></td>
                                                <td><?= $sk->keterangan; ?></td>

                                                <td>
												<button class="btn btn-simple btn-primary" data-toggle="modal" data-target="#lihatfile<?= 
                                                $sk->id_suratpengajuan ?>"><i class="fas fa-eye"></i></button>
											    </td>


                                                <td><?= $sk->status; ?></td>
                                                <td><?= $sk->ket_status; ?></td> 


                                                <?php if ($user == 'superadmin') { ?>
                                                    <td>
                                                        <a href="" data-id-sk="<?php echo $sk->id_suratpengajuan ?>"
                                                            data-toggle="modal"
                                                            data-target="#ubahstatus<?php echo $sk->id_suratpengajuan ?>"
                                                            class="badge badge-warning d-block"><i class="fas fa-clock"></i> Update Status
                                                        </a>
                                                    </td>
                                                
                                                <?php } else {
                                                } ?>

                                                <td>
                                                <?php if ($user == 'superadmin') { ?>
                                                    <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                        data-target="#updatasuratbalasan<?php echo $sk->id_suratpengajuan ?>"><i class="fa fa-upload"></i> Upload
                                                    </button>
                                                <?php } else {
                                                } ?>
                                                    <a href="<?php echo base_url() ?>admin/downloadbalasan/<?php echo $sk->id_suratpengajuan ?>"
                                                        class="badge badge-success btn-block" title="download"><i class="fa fa-download"></i> Download
                                                    </a>
                                                </td>

                                                <?php if ($user == 'superadmin') { ?>
                                                    <td>
                                                        <a href="" data-id-sk="<?php echo $sk->id_suratpengajuan ?>"
                                                            data-toggle="modal"
                                                            data-target="#ubahsk<?php echo $sk->id_suratpengajuan ?>"
                                                            class="badge badge-primary d-block"><i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <br>
                                                        <a href="" data-id-sk="<?php echo $sk->id_suratpengajuan ?>"
                                                            data-toggle="modal"
                                                            data-target="#hapussk<?php echo $sk->id_suratpengajuan ?>"
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
<?php endif; ?>


<?php foreach ($suratpengajuan as $sk) : ?>
    <div class="modal fade" id="lihatfile<?= $sk->id_suratpengajuan  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-notice">
			<div class="modal-content">
				<div class="modal-header">
					<h5> Lampiran File Pengajuan</h5>
				</div>
				<div class="modal-body">
					<div class="instruction">
						<div class="row">
							<div class="col-md-12">
								<embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('vendor/files/suratpengajuan/') ?>/<?= $sk->berkas_suratpengajuan ?>"></embed>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Upload Data Surat Balasan-->
<?php $no = 0;
foreach ($suratpengajuan as $sk):
    $no++ ?>

    <div class="modal fade" id="updatasuratbalasan<?php echo $sk->id_suratpengajuan ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Upload Surat Balasan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <form role="form" action="<?= base_url('admin/proses_uploadsuratbalasan') ?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id_suratpengajuan" value="<?php echo $sk->id_suratpengajuan ?>">
                        <div class="form-group">
                            <label for="">Surat Balasan</label>
                            <input type="file" class="form-control" name="userfile"
                                value="<?php echo $sk->data_suratbalasan ?>">
                            <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
                                PPT</small>
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
<!-- Upload Data Surat Balasan-->


<?php if ($user == 'admin'): ?>  
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
                    <h1 class="h3 mb-4 text-gray-800">Surat Pengajuan</h1>
                    <div class="card card-success">
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Judul Surat</th>
                                            <th>Jenis Surat</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Keterangan</th>
                                            <th>Berkas</th>
                                            <th>Status Pengajuan</th>
                                            <th>Keterangan Status Pengajuan</th>
                                            <th>Surat Balasan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($suratpengajuan as $sk): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $sk->no_suratpengajuan; ?></td>
                                                <td><?= $sk->judul_suratpengajuan; ?></td>
                                                <td><?= $sk->judul_indeks; ?></td>
                                                <td><?= $sk->tujuan; ?></td>
                                                <td><?php $date = date_create($sk->tanggal_pengajuan);
                                                    echo date_format($date, 'd/m/Y'); ?></td>
                                                <td><?= $sk->keterangan; ?></td>
                                             
                                                <td>
												<button class="btn btn-simple btn-primary" data-toggle="modal" data-target="#lihatfile<?= 
                                                $sk->id_suratpengajuan ?>"><i class="fas fa-eye"></i></button>
											    </td>

                                                <td><?= $sk->status; ?></td>
                                                <td><?= $sk->ket_status; ?></td>
                                                <td>
                                                <?php if ($user == 'superadmin') { ?>
                                                    <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                        data-target="#updatasuratbalasan<?php echo $sk->id_suratpengajuan ?>"><i class="fa fa-upload"></i> Upload
                                                    </button>
                                                <?php } else {
                                                } ?>
                                                    <a href="<?php echo base_url() ?>admin/downloadbalasan/<?php echo $sk->id_suratpengajuan ?>"
                                                        class="badge badge-success btn-block" title="download"><i class="fa fa-download"></i> Download
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
            <!-- End of Main Content -->
            <!-- modal tambah -->
            <?php $this->load->view('admin/ekstra/modal'); ?>
            <!-- Footer -->
            <?php $this->load->view('templates/copyright') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
<?php endif; ?>



<?php if ($user == 'userskp'): ?>
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
                <h1 class="h3 mb-4 text-gray-800">Surat Pengajuan</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-flat btn-block" id="tambah" data-toggle="modal"
                                    data-target="#addsk"><i class="fas fa-plus"></i> Tambah data </button>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Keterangan</th>
                                        <th>Berkas </th>
                                        <th>Status Pengajuan</th>
                                        <th>Keterangan Status Pengajuan</th>
                                        <th>Surat Balasan</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kp_pengajuan as $kpp): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kpp->no_suratpengajuan; ?></td>
                                            <td><?= $kpp->judul_suratpengajuan; ?></td>
                                            <td><?= $kpp->tujuan; ?></td>
                                            <td><?php $date = date_create($kpp->tanggal_pengajuan);
                                                echo date_format($date, 'd/m/Y'); ?></td>
                                            <td><?= $kpp->keterangan; ?></td>
                                            
                                            <td>
												<button class="btn btn-simple btn-primary" data-toggle="modal" data-target="#lihatfile<?= 
                                                $sk->id_suratpengajuan ?>"><i class="fas fa-eye"></i></button>
											</td>

                                            <td><?= $kpp->status; ?></td>
                                            <td><?= $kpp->ket_status; ?></td> 
                                            <td>
                                                <?php if ($user == 'superadmin') { ?>
                                                    <button type="button" class="badge badge-dark btn-block" data-toggle="modal"
                                                        data-target="#updatasuratbalasan<?php echo $sk->id_suratpengajuan ?>"><i class="fa fa-upload"></i> Upload
                                                    </button>
                                                <?php } else {
                                                } ?>
                                                <a href="<?php echo base_url() ?>admin/downloadbalasan/<?php echo $sk->id_suratpengajuan ?>"
                                                    class="badge badge-success btn-block" title="download"><i class="fa fa-download"></i> Download
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
        <!-- End of Main Content -->
        <!-- modal tambah -->
        <?php $this->load->view('admin/ekstra/modal'); ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>

<?php endif; ?>

<!-- Hapus -->
<?php $no = 0;
foreach ($suratpengajuan as $sk):
    $no++ ?>

    <div class="modal fade" id="hapussk<?php echo $sk->id_suratpengajuan ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo base_url('admin/hapus_datask/' . $sk->id_suratpengajuan) ?>">
					<div class="modal-body text-center">
					<h5>Apakah anda yakin untuk menghapus pengajuan ini? </h5>
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


<!-- Ubah Status -->
<?php $no = 0;
foreach ($suratpengajuan as $sk):
    $no++ ?>

    <div class="modal fade" id="ubahstatus<?php echo $sk->id_suratpengajuan ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="<?= base_url('admin/editstatus') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body row">
                            <input type="hidden" name="id_suratpengajuan" value="<?= $sk->id_suratpengajuan ?>">
                            <div class="modal-body text-center">
                                <h5>Update Status Pengajuan ID: <?= $sk->no_suratpengajuan; ?> ? </h5>
                                <label for="status">Pilih Status</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="Pending"> Pending  <br>
                                       
                                            <input type="radio" name="status" value="Syarat Tidak Terpenuh "> Syarat Tidak Terpenuh  <br>
                                     
                                            <input type="radio" name="status" value="Diterima dan Dilanjutkan"> Diterima dan Dilanjutkan  <br>

                                            <input type="radio" name="status" value="Ditunda"> Ditunda  <br>
                                      
                                            <input type="radio" name="status" value="Pending"> Selesai
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="modal-body text-left">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="ket_status" placeholder="Tuliskan Keterangan Pengajuan"></textarea>
                                        </div>
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
<!-- Ubah Status -->

<!-- Ubah Surat pengajuan -->

<?php $no = 0;
foreach ($suratpengajuan as $sk):
    $no++ ?>

    <div class="modal fade" id="ubahsk<?php echo $sk->id_suratpengajuan ?>">
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
                            <input type="hidden" name="id_suratpengajuan" value="<?= $sk->id_suratpengajuan ?>">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <?php $today = date('d,m,Y');
                                    $pecah = explode(',', $today);
                                    $bulan = $pecah[1];
                                    $tahun = $pecah[2]; ?>
                                    <input type="text" name="no_suratpengajuan" class="form-control"
                                        value="<?= $sk->no_suratpengajuan ?>">
                                        <small class="text-danger">Sesuaikan Nomor Surat Terlebih Dahulu</small>
                                </div>
                                <div class="form-group">
                                    <label>Judul Surat Pengajuan</label>
                                    <input type="text" name="judul_suratpengajuan" class="form-control"
                                        value="<?= $sk->judul_suratpengajuan ?>" placeholder="Judul Surat">
                                </div>
                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" value="<?= $sk->tujuan ?>"
                                        placeholder="Tujuan">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Pengajuan:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="tanggal_pengajuan" class="form-control"
                                            value="<?= $sk->tanggal_pengajuan ?>" data-inputmask-alias="datetime"
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
                                            <input type="file" name="berkas_suratpengajuan" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label"
                                                for="exampleInputFile"><?= $sk->berkas_suratpengajuan ?></label>
                                        </div>
                                    </div>
                                    <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan PPT</small>
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
<!-- Ubah Surat pengajuan -->