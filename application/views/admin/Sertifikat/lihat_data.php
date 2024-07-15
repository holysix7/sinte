<!-- Untuk Update Data No. Sertifkat dan Periode -->
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
                <h1 class="h3 mb-4 text-gray-800"></h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                       
                        <div class="modal-body">
                            <?php $no = 1;
                                foreach ($kp as $magang): ?>
                                        <form role="form" action="<?= base_url('kp/tambahds') ?>" method="post"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $magang['id'] ?>">
                                            <div class="card-body row">
                                            
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>No. Sertifikat</label>
                                                        <?php $today = date('d,m,Y');
                                                        $pecah = explode(',', $today);
                                                        $bulan = $pecah[1];
                                                        $tahun = $pecah[2]; ?>
                                                        <input type="text" name="no_sertifikat" class="form-control"
                                                            value=".../KPG.<?php echo $today; ?>/BPSDM<?php uniqid(); ?>">
                                                        <small class="text-danger">*Sesuaikan nomor sertifikat terlebih
                                                            dahulu</small>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="">Periode</label>
                                                        <div class="input-group">
                                                            <input type="text" name="periode" class="form-control"
                                                                placeholder="Masukan Data Periode" required>
                                                        </div>
                                                        <small class="text-danger">*Sesuaikan periode dengan tanggal awal s/d akhir kegiatan 
                                                        kerja praktik</small>
                                                    </div>
                                                    
                                                </div>
                                              
                                                </div>
                                            
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal-footer right-content-between">
                                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

    
        
         <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

        <!-- End of Main Content -->
        <?php $this->load->view('admin/ekstra/modal') ?>

    </div>
    <!-- End of Content Wrapper -->
</div>
