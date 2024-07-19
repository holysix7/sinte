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
							<div class="col-md-5">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Nama Kegiatan</th>
											<td><?= $bigdata->nama_kegiatan ?></td>
										<tr>
									</thead>
									<tbody>
										<tr>
											<th>Jumlah Peserta</th>
											<td><?= $bigdata->jumlah_peserta ?></td>
										<tr>
											<?php if($user == 'devbigdata'){ ?>
										<tr>
											<th>Aksi</th>
											<td>
												<a href="javascript:void(0)" type="button" class="btn btn-primary"
													data-toggle="modal"
													data-target="#upfotokegiatan"><i lass="fa fa-upload"></i> Upload
												</a>
											</td>
										<tr>
											<?php } ?>
									</tbody>
								</table>
							</div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <td>Nama File</td>
                                        <td>Lokasi File</td>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($foto as $bd): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?= $bd['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $bd['path'] ?>
                                            </td>
                                            <td>
												<a href="<?php echo base_url() ?>bigdata/downloadDetail/<?php echo $bd['id']; ?>"
													class="badge badge-success btn-flat btn-block" title="download"><i
														class="fa fa-download"></i> Download
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
		<div class="modal fade" id="upfotokegiatan">
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
						<form role="form" action="<?= base_url('bigdata/uploadDetailFoto') ?>" method="post"
							enctype="multipart/form-data">
							<input type="hidden" name="id_bigdata" value="<?= $bigdata->id_bigdata ?>">
							<div class="form-group">
								<label for="">Foto Kegiatan</label>
								<input type="file" class="form-control" name="userfile">
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
    </div>
    <!-- End of Content Wrapper -->

</div>