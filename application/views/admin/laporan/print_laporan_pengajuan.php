<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">-->
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <!--<script src="" type="text/javascript"></script>-->

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js" ></script>-->
    <body onload="window.print()">
        <div>
            
    <div id="content-wrapper"  style="margin-top:50px">

        <div class="container-fluid">
       

        
        <!-- DataTables Example -->
          <div class="card mb-3" id="cardeservices">
            <div class="card-header">
              <center>
                <b>
                    <h3><?php echo $title ?> <br></h3>
                    <h4><?php echo $subtitle ?> <br></h4>
                </b>
              </center>
            </div>
            <div class="card-body card-block">
         
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabeleservice" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nomor Surat</th>
                      <th>Judul Surat</th>
                      <th>Tujuan</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody
                    <?php $no=1; foreach ($datafilter as $row): ?>
											<tr>
													
												<td><?php echo $no++; ?></td>
												<td><?php echo $row->no_suratpengajuan; ?></td>
												<td><?php echo $row->judul_suratpengajuan; ?></td>
                        <td><?php echo $row->tujuan; ?></td>
												<td><?php echo $row->tanggal_pengajuan; ?></td>
												<td><?php echo $row->keterangan; ?></td>
											</tr>
										<?php endforeach; ?>
                    
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card-body card-block">
            <div class="row form-group">
                <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Cimahi, <?php echo date('d M Y')?></label></div>
                
            </div>
            <div class="row form-group">
                <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Badan Pengembangan Sumber Daya Manusia Daerah (BPSDM) Provinsi Jawa Barat</label></div>
                
            </div>
            <br><br><br>
            <div class="row form-group">
                <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Tim IT</label></div>
                
            </div>
            </div>

          </div>


            </div>
            </div>





        <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    
    </body>
    
</html>
