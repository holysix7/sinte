<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SINTE BPSDM JABAR-Tamu Kunjungan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Logo URL -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
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
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="landingpage"><img src="assets/img/logoputih.png" align="right"> <span>Sinte</span> &nbsp;
                    </a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->

            </div>

            <nav id="navbar" class="navbar">
                <ul>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Sistem Informasi <br> <span>Integral Technology</span></h1>
                        <h2>Layanan Tamu Kunjungan</h2>
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto">Memulai</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-11 order-lg-2 2 data-aos=" zoom-out" data-aos-delay="300">
                    <img src="assets/img/BG/6.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                </g>s
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                        <a href="https://youtu.be/qBNLpRDXeIk?si=iYPFiUXKveAQM8NP" class="glightbox play-btn mb-4"></a>
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        <h3>Kunjungan Tamu</h3>
                        <div class="modal-content">
                                <div class="modal-body">
                                    <p>
                                        <?php
                                        echo form_open_multipart('tamu/proses_tambah_data2');
                                        ?>
                                        <div class="card-body row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="">Tanggal Kunjungan</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tanggal_kunjungan" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap</label>
                                                        <div class="input-group">
                                                            <input type="text" name="nama" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alamat Email</label>
                                                        <div class="input-group">
                                                            <input type="text" name="email" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nomor Telepon</label>
                                                        <div class="input-group">
                                                            <input type="number" name="nomor" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>        
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="">Instansi</label>
                                                        <div class="input-group">
                                                            <input type="text" name="instansi" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="">Jabatan</label>
                                                        <div class="input-group">
                                                            <input type="text" name="jabatan" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Perihal</label>
                                                        <div class="input-group">
                                                            <input type="text" name="perihal" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jumlah Tamu</label>
                                                        <div class="input-group">
                                                            <input type="number" name="jumlah_tamu" class="form-control" placeholder="" required>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                        <!-- /.card-body -->
                                    </p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                                </form>
                            </div>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
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