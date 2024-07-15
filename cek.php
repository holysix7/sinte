<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sinte Bpsdm Jabar - Hasil Validasi Sertifikat</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/logo.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

    <br> 
      <div class="logo">
      
        <h1><a href="index.html"><img src="assets/img/logoputih.png"> <span>Sinte</span> &nbsp; </a></h1>
       
      </div>


    </div>
  </header><!-- End Header -->
  <main id="main">
    
  <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="">
           
          </div>

        <div class="container">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Sistem Informasi Integral Technology</h2>
                    <p>Hasil Validasi Sertifikat</p>
                   
                </div>

                <center>
                    <div class="col-xl-9 col-lg-6  ">
                        <div class="panel panel-success">
                        
                            <div class="panel-body">
                                <table class="table table-bordered">                                
                                    <tr>
                                        <td colspan="3">
                                            <center>
                                            <img src="assets/img/logo.png" width="150px">
                                            <h3>PEMERINTAH DAERAH PROVINSI JAWA BARAT</h3>
                                            <h3>BADAN PENGEMBANGAN SUMBER DAYA MANUSIA PROVINSI JAWA BARAT</h3>
                                            <p>Jl. Pulau Beringin Blok. B Pondok Kelapa Bengkulu Tengah</p>
                                            <hr>
                                        </td>
                                    </tr>
                            
                                    <?php
                                    $sql=mysqli_query($konek, "SELECT * FROM kp WHERE no_sertifikat='$_POST[no_sertifikat]'");
                                    $d=mysqli_fetch_array($sql);

                                    if(mysqli_num_rows($sql) < 1){
                                        ?>
                                        <div class="alert alert-danger">
                                            <center>
                                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                                            <i>Silahkan menghubungi instansi terkait untuk menanyakan masalah ini</i>
                                            </center>
                                        </div>
                                        <?php
                                    }else{
                                    ?>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>Nomor Sertifikat</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <th>Periode</th>
                                            <th>Posisi Magang</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $d['no_sertifikat']; ?></td>
                                            <td><?php echo $d['no_induk']; ?></td>
                                            <td><?php echo $d['nama']; ?></td>
                                            <td><?php echo $d['jurusan']; ?></td>
                                            <td><?php echo $d['periode']; ?></td>
                                            <td><?php echo $d['posisi_magang']; ?></td>
                                        </tr>
                                    </table>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <a  href="./validasi-sertifikat"  style='background-color: #0205a1; color: white; text-shadow: 2px black; border: none; padding: 10px 160px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px; margin-bottom: 50px;'>
                                Kembali</a>
                            </div>
                        </div>
                    </div>
                </center>
            

               
               
        </div>

        
      </div>
    </section><!-- End About Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SinteBpsdmJabar</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="">FF-UTB</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
