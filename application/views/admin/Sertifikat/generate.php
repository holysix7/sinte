<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>
    <!-- End of Sidebar -->
    <link href="assets/img/logo.png" rel="icon">
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
                <h1 class="h3 mb-4 text-gray-800">Generate Sertifikat</h1>
                <div class="card-body">
                        <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card card-success">
                            <div class="card-body">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    
                                    <title>Sertifikat Kerja Praktik</title>
                                
                                    <style type="text/css">
                                        table {
                                            border-collapse: collapse;
                                        }
                                        .page {
                                            font-family: Arial, sans-serif;
                                            margin: 0;
                                            padding: 0;
                                            text-align: center;
                                            position: relative;
                                        }
                                        .background-image {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height: 100%;
                                            background-size: cover;
                                            background-position: center;
                                            z-index: -1; /* Ensure the background is behind other content */
                                        }
                                        .content {
                                            text-align: justify;
                                            max-width: 100%; /* Adjust as needed */
                                        }
                                        .content2 {
                                            text-align: center;
                                            max-width: 100%; /* Adjust as needed */
                                        }
                                        h3 {
                                            margin: 0;
                                        }
                                        .bottom-right-image {
                                            position: absolute;
                                            bottom: 0px;
                                            right: 0px;
                                            width: 330px;
                                        }
                                        .top-left-image {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 330px;
                                        
                                        }
                                        .bottom-left-image {
                                            position: absolute;
                                            bottom: 70px; /* Adjust as needed */
                                            left: 50px; /* Adjust as needed */
                                            width: 110px;
                                        }
                                        .bottom-right-image2 {
                                            position: absolute;
                                            bottom: 60px; /* Adjust as needed */
                                            right: 140px; /* Adjust as needed */
                                            width: 140px;
                                        }
                                    </style>
                                </head>
                                <body>
                                    <div class="content">
                                        <table width="100%">
                                            <tr>
                                                <td colspan="3">
                                                    <center>
                                                        <img src="<?php echo base_url('assets/img/bgbaru.png'); ?>" class="background-image">
                                                        <p><img src="<?php echo base_url('assets/img/jabar.png'); ?>" width="60px"></p>
                                                        <h4>PEMERINTAH DAERAH PROVINSI JAWA BARAT<br/>
                                                            BADAN PENGEMBANGAN SUMBER DAYA MANUSIA PROVINSI JAWA BARAT
                                                        </h4>
                                                        <h2>SERTIFIKAT</h2>
                                                        <h3>NOMOR: <?php echo $magang['no_sertifikat']; ?></h3>
                                                        <h4>DIBERIKAN KEPADA:</h4>
                                                        <h1><u><?php echo $magang['nama']; ?></u></h1>
                                                        <h3>NOMOR INDUK: <?php echo $magang['no_induk']; ?></h3>
                                                        <p>Telah Melaksanakan Program Kerja Praktik di Badan Pengembangan <br/>
                                                            Sumber Daya Manusia Provinsi Jawa Barat Bagian <?php echo $magang['posisi_magang']; ?><br/>
                                                            Pada Tanggal <?php echo $magang['periode']; ?>
                                                        </p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <center>
                                                        <p>Cimahi, <?php echo date('Y-m-d'); ?><br/>a.n. GUBERNUR JAWA BARAT,<br/>
                                                        KEPALA BADAN PENGEMBANGAN SUMBER DAYA MANUSIA <br/>
                                                        PROVINSI JAWA BARAT,
                                                        </p>
                                                        <br>
                                                        <p><b>___________________</b></p>
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                        <img src="<?php echo base_url('assets/img/3.png'); ?>" class="bottom-right-image" alt="Logo">
                                        <img src="<?php echo base_url('assets/img/4.png'); ?>" class="top-left-image" alt="Logo">
                                        <img src="<?php echo base_url('temp/' . $magang['no_induk'] . '.png'); ?>" class="bottom-left-image" alt="QRCode">
                                        <img src="<?php echo base_url('assets/img/piagam.png'); ?>" class="bottom-right-image2" alt="Logo">
                                    </div>
                                </body>
                            </div>
                        </div>
                       
                        <p></p>
                       
                        <a class="badge btn btn-primary btn-block" href="<?php echo site_url('sertifikat/generate_certificate/' . 
                        $magang['id']); ?>" style=' margin: 4px padding: 10px 20px; text-align; center; text-decoration: none; display: inline-block; font-size: 16px; color: white;  margin-bottom: 20px;'
                        target='_blank'>Print</a>

                        <a class="badge btn btn-warning btn-block" href="<?php echo site_url('kp/view/'); ?>" style=' margin: 4px padding: 10px 20px; text-align; center; text-decoration: none; display: inline-block; font-size: 16px; color: white;  margin-bottom: 20px;'>
                            Kembali</a>


                        
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