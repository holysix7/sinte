<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SINTE BPSDM JABAR-Landing Pages</title>
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
                <h1><a href=""><img src="assets/img/logoputih.png" align="right"> <span>Sinte</span> &nbsp;
                    </a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->

            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">Galeri</a></li>
                    <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link" href="<?= base_url('tamubpsdm') ?>"></i><span>Layanan Kunjungan Tamu</span></a></li>
                            <li><a class="nav-link" href="<?php echo base_url('kpbpsdm') ?>"></span> Layanan Kerja Praktik</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    &nbsp&nbsp&nbsp
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('auth') ?>"><span
                                class="fas fa-sign-in-alt"></span> Login</a>
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
                        <h2>Seluruh Jajaran BPSDM Provinsi Jawa Barat Terus Menerus Meningkatkan Mutu Pelayanan</h2>
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started2 scrollto">Memulai</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 2 data-aos=" zoom-out" data-aos-delay="300">
                    <img src="assets/img/BG/8.png" class="img-fluid animated" alt="">
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
                        <h3>Sinte BPSDM Provinsi Jawa Barat</h3>
                        <p>Merupakan Website yang dinaungi oleh BPSDM Provinsi Jawa Barat yang memiliki beberapa fitur
                            layanan yang mendukung secara khusus dalam kegiatan pelayanan yang terintegrasi dalam satu
                            brand.</p>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-fingerprint"></i></div>
                            <h4 class="title"><a href="">Integral Technology</a></h4>
                            <p class="description">Merupakan layanan yang mendukung secara khusus dalam pendataan
                                kegiatan pembelajaran dan pengetahuan yang terintegrasi di BPSDM Provinsi Jawa Barat.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title"><a href="">Kerja Praktik</a></h4>
                            <p class="description">Merupakan layanan yang mendukung untuk melakukan pengolahan data
                                dalam kegiatan kerja praktik yang dilaksanakan di BPSDM Provinsi Jawa Barat.</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-atom"></i></div>
                            <h4 class="title"><a href="">Tamu Kunjungan</a></h4>
                            <p class="description">Merupakan layanan publik yang mendukung untuk melakukan pendataan
                                tamu kunjugan di BPSDM Provinsi Jawa Barat.</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Sinte BPSDM Jabar</h2>
                    <p>Fitur Lainnya</p>
                </div>

                <div class="row" data-aos="fade-left">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <i class="ri-store-line" style="color: #ffbb2c;"></i>
                            <h3><a href="">Integral E-services</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="">Integral Aplikasi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3><a href="">Integral Big Data</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                            <h3><a href="">Integral Multimedia</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                            <i class="ri-database-2-line" style="color: #47aeff;"></i>
                            <h3><a href="">Integral Publikasi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                            <h3><a href="">Pengajuan Kerja Praktik</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="">Sertifikat Kerja Praktik</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                            <h3><a href="">Pendataan Tamu</a></h3>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row" data-aos="fade-up">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="968" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>User Terdaftar</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Kelulusan Kerja Praktik</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="518" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Setifikat Kelulusan</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="735" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Kunjungan Tamu</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="assets/img/new/6.jpg" class="img-fluid" alt="" height="182" width="182">
                    </div>
                    <div class="col-md-8 pt-5" data-aos="fade-up">
                        <h3>Integral E-services</h3>
                        <p>Berfungsi untuk melakukan proses Pelayanan Administrasi Penyelenggaraan Pelatihan mulai dari
                            registrasi sampai dengan sertifikasi.</p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="assets/img/new/4.jpg" class="img-fluid" alt="" height="182" width="182">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Integral Aplikasi</h3>
                        <p>Berfungsi untuk mengelola, memfasilitasi dan menerapkan aplikasi-aplikasi untuk mendukung
                            proses learning secara mudah, lancar dan tersampaikan dengan baik. Memberikan laporan
                            berkenaan dengan aplikasi yang ada di BPSDM Provinsi Jawa Barat</p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="assets/img/new/3.jpg" class="img-fluid" alt="" height="182" width="182">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Integral Big Data</h3>
                        <p>Berfungsi untuk menghimpun data keseluruhan aktifitas yang ada di BPSDM</p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="assets/img/new/5.jpg" class="img-fluid" alt="" height="182" width="182">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Integral Multimedia</h3>
                        <p>Berfungsi untuk pendokumentasian setiap kegiatan BPSDM,e Sertifikat, pembuatan video bahan
                            ajar Widyaiswara, serta pembuatan konten publikasi
                        </p>
                    </div>
                </div>


                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="assets/img/new/2.jpg" class="img-fluid" alt="" height="182" width="182">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Integral Publikasi</h3>
                        <p>Berfungsi untuk mengolah serta mempublikasikan informasi terkait kegiatan BPSDM Serta
                            infomasi lainnya yang berhubungan dengan pengembangan Sumber Daya Manusia skala Nasional dan
                            Internasional secara elektronik dan media cetak
                        </p>
                    </div>
                </div>


            </div>
        </section><!-- End Details Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Sinte BPSDM Jabar</h2>
                    <p>Galeri</p>
                </div>

                <div class="row g-0" data-aos="fade-left">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                            <a href="assets/img/gallery/1.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/1.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
                            <a href="assets/img/gallery/2.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/2.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                            <a href="assets/img/gallery/3.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/3.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
                            <a href="assets/img/gallery/4.jpeg class=" gallery-lightbox">
                                <img src="assets/img/gallery/4.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                            <a href="assets/img/gallery/5.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/5.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
                            <a href="assets/img/gallery/6.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/6.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                            <a href="assets/img/gallery/7.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/7.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                            <a href="assets/img/gallery/8.jpeg" class="gallery-lightbox">
                                <img src="assets/img/gallery/8.jpeg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="30">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/logo.png" class="testimonial-img" alt="">
                                <h3>Visi</h3>
                                <h4>BPSDM Jawa Barat</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Seluruh Jajaran BPSDM Provinsi Jawa Barat Terus Menerus Meningkatkan Mutu Pelayanan
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/logo.png" class="testimonial-img" alt="">
                                <h3>Misi</h3>
                                <h4>BPSDM Jawa Barat</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Memberikan Pelayanan Kediklatan dan Pengembangan Kompetensi Sumber Daya Manusia
                                    Aparatur yang Cepat, Tepat, Mudah dan Aman;
                                    Menyajikan Informasi Pengembangan Sumber Daya Manusia yang Terkini (Up To Date);
                                    Memberikan Bahan Rujukan Peraturan Bidang Pengembangan Sumber Daya Manusia;
                                    Merespon dengan Cepat Terhadap Permintaan Pengguna Layanan;
                                    Memiliki Empati Rasa Peduli Penuh Perhatian Ikhlas dan Bertanggung Jawab;
                                    Menyiapkan Sarana dan Prasarana serta Fasilitas yang Nyaman dan Tertata Baik;
                                    Senantiasa Berpenampilan Rapi dan Siap Melayani;
                                    Mengedepankan Kompetensi yang Memadai dan Bekerja dengan Dedikasi yang Tinggi serta
                                    Berorientasi pada Prestasi Kerja;
                                    Mewujudkan Layanan Bermanfaat Meliputi Jujur, Tanggung Jawab, Disiplin, Bersemangat,
                                    Kerja Sama, dan Pelayanan Baik;
                                    Melakukan Kerja Sama antar Lembaga Sesuai dengan Peran dan Fungsinya.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/logo.png" class="testimonial-img" alt="">
                                <h3>Tugas Pokok</h3>
                                <h4>BPSDM Jawa Barat</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Melaksanakan fungsi penunjang urusan pemerintahan bidang pengembangan sumber daya
                                    manusia, meliputi sertifikasi kompetensi dan pengelolaan kelembagaan, pengembangan
                                    kompetensi teknis subtantif, pengembangan kompetensi teknis umum serta pengembangan
                                    kompetensi manajerial yang menajdi kewenangan Daerah Provinsi, melaksanakan tugas
                                    dekonsentrasi dan melaksanakan tugas pembantuan sesuai bidang tugasnya, berdasarkan
                                    ketentuan peraturan perundag-undangan.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/logo.png" class="testimonial-img" alt="">
                                <h3>Fungsi</h3>
                                <h4>BPSDM Jawa Barat</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Penyelenggaraan perumusan kebijakan teknis urusan Pemerintahan bidang pengembangan
                                    sumber daya manusia yang menjadi kewenangan Daerah Provinsi;
                                    Penyelenggaraan pengembangan sumber daya manusia yang menjadi kewenangan Daerah
                                    Provinsi;
                                    Penyelenggaraan administrasi Badan Pengembangan Sunber Daya Manusia;
                                    Penyelenggaraan evaluasi dan pelaporan Badan; dan
                                    Penyelenggaraan fungsu lain sesuai dengan tugas pokok dan fungsinya.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Sinte BPSDM Jabar</h2>
                    <p></p>
                </div>

                <div class="row" data-aos="fade-left">

                    <div class="col-lg-3 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="assets/img/new/a.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="member" data-aos="zoom-in" data-aos-delay="200">
                            <div class="pic"><img src="assets/img/new/b.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="member" data-aos="zoom-in" data-aos-delay="300">
                            <div class="pic"><img src="assets/img/new/c.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="member" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img src="assets/img/new/d.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->


        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">Apa Itu Sinte Bpsdm Jabar? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Sinte atau Sistem Informasi Integral Technology merupakan Website untuk melakukan
                                    proses Pelayanan dan Pendataan Penyelenggaraan Pelatihan, Kerja Praktik dan
                                    Kunjungan Tamu di BPSDM Provinsi Jawa Barat
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">Bagaimana cara melakukan pendataan
                                peserta kerja praktik di BPSDM? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Buat akun lalu lakukan pendataan yang sesuai untuk memenuhi pemberkasan di halaman
                                    layanan kerja praktik.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed"> Bagaimana cara untuk mendapatkan
                                sertifikat kelulusan kerja praktik?<i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    setelah peserta kerja praktik dinyatakan lulus, sertifikat dapat di unduh pada
                                    layanan pemberkasan kerja praktik.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Bagaimana cara melakukan pendataan
                                kunjungan tamu? <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Buka website Sinte Bpsdm Jabar setelah itu klik menu kunjungan tamu.
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Sinte BPSDM Jabar</h2>
                    <p>Alamat & Kontak</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p>Jl. Kolonel Masturi No.11, KM 3,5 Cipageran, Cimahi Utara, Kota Cimahi, Jawa Barat
                                    40511</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>bpsdm@jabarprov.go.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Telepon:</h4>
                                <p>022 - 6649471</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

                        <div class="container-xxl py-9 px-0 wow fadeInUp" data-wow-delay="0.1s">
                            <iframe class="w-100 mb-n2" style="height: 450px"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3423875678473!2d107.5442514759434!3d-6.849497167010389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e59745a2afe7%3A0xf270b66e61664fe0!2sBPSDM%20Provinsi%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1690381376857!5m2!1sid!2sid"
                                frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

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