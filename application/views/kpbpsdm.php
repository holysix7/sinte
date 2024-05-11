<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SINTE BPSDM JABAR-Kerja Praktik</title>
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
                        <h2>Layanan Kerja Praktik</h2>



                        <div class="text-center text-lg-start">
                            <a href="landingpage" class="btn-get-started scrollto">Kembali</a>
                            <a href="auth" class="btn-get-started scrollto">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 2 data-aos=" zoom-out" data-aos-delay="300">
                    <img src="assets/img/BG/4.png" class="img-fluid animated" alt="">
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

    <!-- ======= KP ======= -->
    <main id="main">
            <section id="kp" class="kpbpsdm">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Sistem Informasi Integral Technology</h2>
                    <p>Data Kelulusan</p>
                </div>

                <?php
                $start_time = microtime(true); 

                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=sintebpsdmjabar", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Koneksi database gagal: " . $e->getMessage();
                    exit();
                }
                $kata = isset($_GET['kata']) ? trim($_GET['kata']) : '';

                $finish_time = microtime(true); 
                $total_time = round($finish_time - $start_time, 4);
                ?>

                <?php include_once 'function/boyer.php';?>

                <div class="row">
                    <div class="section-title">
                        <div> <!-- Search Start Here -->
                            <?php
                            if (!empty($kata)) {
                                echo "<h3 style='font-size: 18px; padding: 2px; color: red;'> Hasil Pengecakan Testing: " . $total_time . " seconds</h3>";
                                echo "<h3 style='font-size: 18px; padding: 2px; color: blue;'>Memory yang digunakan: " . memory_get_usage() . " bytes \n </h3><br>";
                                echo " <a href='kpbpsdm'>

                                <button type='button' style='background-color: #0205a1; color: white; text-shadow: 2px black; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px; margin-bottom: 20px;'>
                                    Refresh Testing
                                </button>
                            </a>";
                            }
                            ?>
                            <div class="s-bar" style="margin-bottom: 10px;">
                                <form method="get" action="">
                                    <input type="text" style="background-color: #9fa0ff"
                                    name="kata" value="<?php echo htmlentities($kata, ENT_QUOTES); ?>"
                                        onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Cari Data KP';}">
                                    <input type="submit"  value="cari">

                                    <?php
                                    $Boyer = new Boyer(); 

                                    $stmt = $pdo->prepare("SELECT * FROM kp WHERE nama LIKE :kata");
                                    $stmt->execute(['kata' => "%$kata%"]);

                                    $correct_searche = 0;
                                    $incorrect_searches = 0;
                                    $best_boyer_time = PHP_FLOAT_MAX;
                                    $worst_boyer_time = 0;

                                    while ($teks = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        if (!empty($kata)) {
                                            $start_time_boyer = microtime(true);

                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama'], $kata);

                                            $finish_time_boyer = microtime(true);
                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);

                                            echo "<div class='search-results'>";
                                            echo nl2br(str_replace($kata, "<span class='highlighted'>" . $kata . "</span>", $teks['nama']));
                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['asal_instansi'] . "</p>";
                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['posisi_magang'] . "</p><hr/>";
                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                            $correct_searche++;
                                            echo "</div>";
                                        }
                                    }
                                    
                                    if (!empty($kata)) {
                                        echo "<p style='text-align: center; font-size: 13px; color: black;'>Jumlah Pencarian Benar: " . $correct_searche . "</p>";
                                        echo "<p style='text-align: center; font-size: 13px; color: black;'>Jumlah Pencarian Salah: " . $incorrect_searches . "</p>";
                                        echo "<p style='text-align: center; font-size: 13px; color: black;'>Best Case Boyer-Moore: " . $best_boyer_time . " seconds</p>";
                                        echo "<p style='text-align: center; font-size: 13px; color: black;'>Worst Case Boyer-Moore: " . $worst_boyer_time . " seconds</p>";
                                    }
                                    
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->
    </main>
    <!-- ======= KP ======= -->

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