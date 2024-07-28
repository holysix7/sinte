<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sinte Bpsdm Jabar - Cek Sertifikat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/logo.png">

  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="icon"  href="../assets/img/logo.png">

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
      
        <h1><a href="<?= base_url('/') ?>"><img src="assets/img/logoputih.png"> <span>Sinte</span> &nbsp; </a></h1>
       
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

      <div class="row">
        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right"></div>
        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
          <h3>CEK VALIDASI SERTIFIKAT</h3>
          <h2>Merupakan layanan yang mendukung secara khusus dalam melakukan pengecekan Sertifikat Kerja Praktik
             di BPSDM Provinsi Jawa Barat menggunakan QR-Code,
             Sebelum melakukan pengecekan pastikan anda menggunakan perangkat yang memiliki kamera seperti laptop/smartphon.</h2>
          <br>
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h2 class="panel-title">Arahkan Kode QR Ke Kamera!</h2>
                    </div>
                    <div class="panel-body text-center" >
                      <canvas></canvas>
                      <hr>
                      <select></select>
                    </div>
                    <br>
                        
                    <div class="panel-footer">
                       
                        <center>
                          <a class="btn-primary btn-flat btn-block" href="../"  style='text-shadow: 2px black; border: none; 
                             padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px; margin-bottom: 20px;'>
                            Kembali
                          </a> 
                        </center>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                      <!-- Js Lib -->
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript">
                var arg = {
                    resultFunction: function(result) {
                        var redirect = '../cek.php';
                        $.redirectPost(redirect, {no_sertifikat: result.code});
                    }
                };
                
                var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
                decoder.buildSelectMenu("select");
                decoder.play();
                /*  Without visible select menu
                    decoder.buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
                */
                $('select').on('change', function(){
                    decoder.stop().play();
                });

                // jquery extend function
                $.extend(
                {
                    redirectPost: function(location, args)
                    {
                        var form = '';
                        $.each( args, function( key, value ) {
                            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
                        });
                        $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
                    }
                });

            </script>

        </div>
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
</html>