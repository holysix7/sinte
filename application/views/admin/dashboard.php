<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style1.css" rel="stylesheet">
</head>


<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('templates/sidebar') ?>
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
                <?php echo $this->session->flashdata('message'); ?>
                <!-- Content Row -->

                <body>

                    <!-- ======= Hero Section ======= -->
                    <?php if ($user == 'userskp') { ?>
                        <section id="hero">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                                        <div data-aos="zoom-out">
                                            <h1>Selamat Datang <br> <span>Sistem Informasi Integral Technology</span></h1>
                                            <h2>Seluruh Jajaran BPSDM Provinsi Jawa Barat Terus Menerus Meningkatkan Mutu
                                                Pelayanan</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-1 order-lg-2 2 data-aos=" zoom-out" data-aos-delay="300">
                                        <img src="assets/img/BG/2.png" class="img-fluid animated" alt="">
                                    </div>
                                </div>
                            </div>

                            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 "
                                preserveAspectRatio="none">
                                <defs>
                                    <path id="wave-path"
                                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                                </defs>
                                <g class="wave1">
                                    <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                                </g>
                                <g class="wave2">
                                    <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                                </g>
                                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                            </svg>

                        </section>
                    <?php } ?>
                    <!-- End Hero -->
                    <!-- <?= $user ?> -->
                    <?php if ($user != 'userskp') { ?>
                        <div class="row">
                            <!-- Area Chart -->

                            <?php if ($user == 'superadmin' || $user == 'admin') { ?>
                                <div class="col-xl-8">
                                <?php } else { ?>
                                    <div class="col-xl-12">
                                    <?php } ?>
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Grafik Batang</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <input type="hidden" class="form-control" id="dataBarChart" value="<?= $data_bar ?>"
                                            readonly>
                                        <input type="hidden" class="form-control" id="dataLabelChart"
                                            value="<?= $data_label ?>" readonly>
                                        <div class="card-body" style="height: 350px !important;">
                                            <div class="chart-area">
                                                <div class="chartjs-size-monitor">
                                                    <div class="chartjs-size-monitor-expand">
                                                        <div class=""></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink">
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                                <canvas id="myBarChart" width="714" height="320"
                                                    style="display: block; width: 714px; height: 320px;"
                                                    class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart -->
                                <?php if ($user == 'superadmin' || $user == 'admin') { ?>
                                    <div class="col-xl-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Dropdown -->
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Grafik Pie</h6>
                                            </div>
                                            <!-- Card Body -->
                                            <div class="card-body" style="height: 350px !important;">
                                                <div class="chart-pie pt-4 pb-2">
                                                    <div class="chartjs-size-monitor">
                                                        <div class="chartjs-size-monitor-expand">
                                                            <div class=""></div>
                                                        </div>
                                                        <div class="chartjs-size-monitor-shrink">
                                                            <div class=""></div>
                                                        </div>
                                                    </div>
                                                    <canvas id="namePieChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                var ctx = document.getElementById('namePieChart').getContext('2d');
                                var nameData = <?php echo json_encode($name_data); ?>;

                                var labels = nameData.map(function (e) {
                                    return e.asal_instansi || e.instansi;
                                });
                                var data = nameData.map(function (e) {
                                    return e.count;
                                });

                                var chart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Count',
                                            data: data,
                                            backgroundColor: [
                                                'rgb(0,191,255)',
                                                'rgb(173,216,230',
                                                'rgb(100,149,237)',
                                                'rgb(0,0,128)',
                                                'rgb(135,206,235)',
                                                'rgb(0,0,139)',
                                                'rgb(0,0,205)',
                                                'rgb(0,0,255',
                                                'rgb(70,130,180)',
                                                'rgb(25,25,112)',
                                                'rgb(30,144,255)',


                                            ],
                                            borderColor: [
                                                'rgb(0,191,255)',
                                                'rgb(173,216,230',
                                                'rgb(100,149,237)',
                                                'rgb(0,0,128)',
                                                'rgb(135,206,235)',
                                                'rgb(0,0,139)',
                                                'rgb(0,0,205)',
                                                'rgb(0,0,255',
                                                'rgb(70,130,180)',
                                                'rgb(25,25,112)',
                                                'rgb(30,144,255)',


                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            title: {
                                                display: true,
                                                text: 'Instansi Yang Pernah Berkunjung'
                                            }
                                        }
                                    }
                                });
                            });
                        </script>

                        <br>
                        <!-- ======= bigdata ======= -->
                        <main id="main">
                            <div class="card-body">
                                <header class="card card-waves">
                                    <div class="card-body px-5 pt-5 pb-0">
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-lg-6">
                                                <h1 class="text-primary">Bagaimana kami bisa membantu?</h1>
                                                <p class="lead mb-4">Telusuri basis pengetahuan kami untuk menemukan
                                                    jawaban, atau hubungi kami secara langsung jika Anda mengalami
                                                    masalah!
                                                </p>

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

                                            <?php include_once 'function/boyer.php'; ?>

                                            <div class="row">
                                                <div class="section-title">
                                                    <div> <!-- Boyermoore Serch -->
                                                        <?php
                                                        if (!empty($kata)) {
                                                            echo "<h3 style='font-size: 18px; padding: 2px; color: red;'> Hasil Pengecakan Testing: " . $total_time . " seconds</h3>";
                                                            echo "<h3 style='font-size: 18px; padding: 2px; color: blue;'>Memory yang digunakan: " . memory_get_usage() . " bytes \n </h3><br>";
                                                            echo " <a href='admin'>

                                                        <button type='button' style='background-color: #4e73df; color: white; text-shadow: 2px black; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 5px; margin-bottom: 20px;'>
                                                            Refresh Testing
                                                        </button>
                                                    </a>";
                                                        }
                                                        ?>
                                                        <div class="s-bar" style="margin-bottom: 10px;">
                                                            <form method="get" action="">
                                                                <input type="text" style="background-color: #9fa0ff"
                                                                    name="kata"
                                                                    value="<?php echo htmlentities($kata, ENT_QUOTES); ?>"
                                                                    onfocus="this.value = '';"
                                                                    onblur="if (this.value == '') {this.value = 'Cari Data';}">
                                                                <input type="submit" value="cari">

                                                                <?php
                                                                $Boyer = new Boyer();

                                                                $stmt_kp = null;
                                                                $stmt = null;
                                                                $stmt_app = null;
                                                                $stmt_es = null;
                                                                $stmt_ind = null;
                                                                $stmt_ml = null;
                                                                $stmt_pb = null;
                                                                $stmt_sp = null;
                                                                $stmt_user = null;
                                                                if ($user == 'admin') {

                                                                    $stmt_kp = $pdo->prepare("SELECT * FROM kp WHERE nama LIKE :kata");
                                                                    $stmt_kp->execute(['kata' => "%$kata%"]);
                                                                    $stmt_sp = $pdo->prepare("SELECT * FROM suratpengajuan WHERE no_suratpengajuan LIKE :kata");
                                                                    $stmt_sp->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'superadmin') {
                                                                    $stmt_kp = $pdo->prepare("SELECT * FROM kp WHERE nama LIKE :kata");
                                                                    $stmt_kp->execute(['kata' => "%$kata%"]);

                                                                    $stmt = $pdo->prepare("SELECT * FROM bigdata WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt->execute(['kata' => "%$kata%"]);

                                                                    $stmt_app = $pdo->prepare("SELECT * FROM aplikasi WHERE nama_aplikasi LIKE :kata");
                                                                    $stmt_app->execute(['kata' => "%$kata%"]);

                                                                    $stmt_es = $pdo->prepare("SELECT * FROM eservice WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt_es->execute(['kata' => "%$kata%"]);

                                                                    $stmt_ind = $pdo->prepare("SELECT * FROM indeks WHERE judul_indeks LIKE :kata");
                                                                    $stmt_ind->execute(['kata' => "%$kata%"]);

                                                                    $stmt_ml = $pdo->prepare("SELECT * FROM multimedia WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt_ml->execute(['kata' => "%$kata%"]);

                                                                    $stmt_pb = $pdo->prepare("SELECT * FROM publikasi WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt_pb->execute(['kata' => "%$kata%"]);

                                                                    $stmt_sp = $pdo->prepare("SELECT * FROM suratpengajuan WHERE no_suratpengajuan LIKE :kata");
                                                                    $stmt_sp->execute(['kata' => "%$kata%"]);

                                                                    $stmt_user = $pdo->prepare("SELECT * FROM user WHERE nama_lengkap LIKE :kata");
                                                                    $stmt_user->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'deveservice') {
                                                                    $stmt_es = $pdo->prepare("SELECT * FROM eservice WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt_es->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'devaplikasi') {
                                                                    $stmt_app = $pdo->prepare("SELECT * FROM aplikasi WHERE nama_aplikasi LIKE :kata");
                                                                    $stmt_app->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'devbigdata') {
                                                                    $stmt = $pdo->prepare("SELECT * FROM bigdata WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'devmultimedia') {
                                                                    $stmt_ml = $pdo->prepare("SELECT * FROM multimedia WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt_ml->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'devpublikasi') {
                                                                    $stmt_pb = $pdo->prepare("SELECT * FROM publikasi WHERE nama_kegiatan LIKE :kata");
                                                                    $stmt_pb->execute(['kata' => "%$kata%"]);
                                                                }
                                                                if ($user == 'userskp') {
                                                                    $stmt_kp = $pdo->prepare("SELECT * FROM kp WHERE nama LIKE :kata");
                                                                    $stmt_kp->execute(['kata' => "%$kata%"]);
                                                                }

                                                                $correct_searche = 0;
                                                                $incorrect_searches = 0;
                                                                $best_boyer_time = PHP_FLOAT_MAX;
                                                                $worst_boyer_time = 0;

                                                                if ($stmt) {
                                                                    while ($teks = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama_kegiatan'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);

                                                                            $nama = $teks['nama_kegiatan'];
                                                                            $url_redirect = implode('/', ['bigdata/view', $nama[0], $teks['id_bigdata']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['bidang_penyelenggara'] . "</p>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['tgl_kegiatan'] . "</p><hr/>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_kp) {
                                                                    while ($teks = $stmt_kp->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['nama'];
                                                                            $url_redirect = implode('/', ['kp/view', $nama[0], $teks['id']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['periode'] . "</p>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'> " . $teks['posisi_magang'] . "</p><hr/>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_app) {
                                                                    while ($teks = $stmt_app->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama_aplikasi'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['nama_aplikasi'];
                                                                            $url_redirect = implode('/', ['aplikasi/view', $nama[0], $teks['id']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['deskripsi'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_es) {
                                                                    while ($teks = $stmt_es->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama_kegiatan'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['nama_kegiatan'];
                                                                            $url_redirect = implode('/', ['eservices/view', $nama[0], $teks['id']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['jumlah_peserta'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_ind) {
                                                                    while ($teks = $stmt_ind->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['judul_indeks'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['judul_indeks'];
                                                                            $url_redirect = implode('/', ['admin/indeks', $nama[0], $teks['id_indeks']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['kode_indeks'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_ml) {
                                                                    while ($teks = $stmt_ml->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama_kegiatan'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['nama_kegiatan'];
                                                                            $url_redirect = implode('/', ['multimedia/view', $nama[0], $teks['id']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['tgl_dibuat'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_pb) {
                                                                    while ($teks = $stmt_pb->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['nama_kegiatan'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['nama_kegiatan'];
                                                                            $url_redirect = implode('/', ['publikasi/view', $nama[0], $teks['id']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['tgl_dibuat'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_sp) {
                                                                    while ($teks = $stmt_sp->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['no_suratpengajuan'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['no_suratpengajuan'];
                                                                            $url_redirect = implode('/', ['admin/suratpengajuan', $nama[0], $teks['id_suratpengajuan']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['tanggal_pengajuan'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
                                                                    }
                                                                }

                                                                if ($stmt_user) {
                                                                    while ($teks = $stmt_user->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (!empty($kata)) {
                                                                            $start_time_boyer = microtime(true);

                                                                            $hasil_boyer = $Boyer->BoyerMoore($teks['username'], $kata);

                                                                            $finish_time_boyer = microtime(true);
                                                                            $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);
                                                                            $nama = $teks['username'];
                                                                            $url_redirect = implode('/', ['admin/users', $nama[0], $teks['id_user']]);
                                                                            echo "<div class='search-results'>";
                                                                            echo "<a href='{$url_redirect}'>{$nama}</a>";
                                                                            echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['nama_lengkap'] . "</p>";
                                                                            echo "<p style='text-align: center; font-size: 13px; padding-bottom: 4px;'>Waktu Pencarian Boyer-Moore: <span class='highlighted'> $search_execution_time_boyer seconds </span></p><br>";

                                                                            $best_boyer_time = min($best_boyer_time, $search_execution_time_boyer);
                                                                            $worst_boyer_time = max($worst_boyer_time, $search_execution_time_boyer);
                                                                            $correct_searche++;
                                                                            echo "</div>";
                                                                        }
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
                                                            <p>
                                                            <p>

                                                        </div>
                                                    </div> <!-- Boyermoore Serch -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </main>
                        <!-- ======= bigdata ======= -->

                        <a href="#" class="back-to-top d-flex align-items-left justify-content-left"><i
                                class="bi bi-arrow-up-short"></i></a>
                        <div id="preloader"></div>

                        <!-- Vendor JS Files -->
                        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
                        <script src="assets/vendor/aos/aos.js"></script>
                        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
                        <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
                        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
                        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                        <script src="assets/vendor/php-email-form/validate.js"></script>
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
                            type="text/javascript"></script>

                        <!-- Template Main JS File -->
                        <script src="assets/js/main.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                setTimeout(function () {
                                    $('.close').click();
                                    <?=
                                        $this->session->set_flashdata('message', ''); ?>
                                }, 3000);
                            })
                        </script>
                </body>

                <br>
                <?php if ($user == 'superadmin') { ?>
                    <div class="row">

                        <a type="button" class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#eServiceModal">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                E-Service</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_service ?>
                                                data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a type="button" class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#bigDataModal">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Big Data</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_big_data ?>
                                                data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-database fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#publikasiModal">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Publikasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_publikasi ?>
                                                data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#multimediaModal">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Multimedia</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $jumlah_multimedia ?> data
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tv fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <br>
                    <div class="row">


                        <!-- Kunjungan Tamu Hari Ini -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Kunjungan Tamu Hari Ini</h6>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="suratmasuk" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Instansi</th>
                                                    <th>Perihal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($today_data as $tamu): ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?php echo $tamu['instansi']; ?></td>
                                                        <td><?php echo $tamu['perihal']; ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengajuan KP Hari Ini -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Surat Pengajuan hari ini</h6>
                                    <div class="dropdown no-arrow">
                                        <a href="<?= base_url('admin/suratpengajuan') ?>" class="text-dark"
                                            style="text-decoration: none">Lihat semua</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="suratkeluar" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Nomor Surat</th>
                                                    <th>Indeks</th>
                                                    <th>Asal Instansi</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($sp_today as $sp): ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $sp->tanggal_pengajuan; ?></td>
                                                        <td><?= $sp->no_suratpengajuan; ?></td>
                                                        <td><?= $sp->judul_indeks; ?></td>
                                                        <td><?= $sp->asal_instansi; ?></td>
                                                        <td><?= $sp->status; ?></td>
                                                        <td><?= $sp->keterangan; ?></td>



                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <canvas id="myChart" width="400" height="100"></canvas>
                        </div>
                    </div>

                    <div class="modal fade" id="eServiceModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">E-Service</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="suratkeluar" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Tanggal Kegiatan</td>
                                                    <td>Nama Kegiatan</td>
                                                    <td>Jumlah Peserta</td>
                                                    <td>Jadwal Kegiatan</td>
                                                    <td>Data Peserta</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($service as $es): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $es['tgl_kegiatan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $es['nama_kegiatan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $es['jumlah_peserta']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() ?>eservices/download1/<?php echo $es['id']; ?>"
                                                                class="badge badge-success btn-block" title="download"><i
                                                                    class="fa fa-download"></i> Download
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() ?>eservices/download2/<?php echo $es['id']; ?>"
                                                                class="badge badge-success btn-block" title="download"><i
                                                                    class="fa fa-download"></i> Download
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="bigDataModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Big Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="suratkeluar" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <td>Tanggal Kegiatan</td>
                                                    <td>Jenis Kegiatan</td>
                                                    <td>Nama Kegiatan</td>
                                                    <td>Bidang Penyelenggara</td>
                                                    <td>Jumlah Peserta</td>
                                                    <td>Link Sertifikat</td>
                                                    <td>Foto Kegiatan</td>
                                                    <td>Data Peserta</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($bigdata as $bd): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $bd['tgl_kegiatan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $bd['jenis_kegiatan']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $bd['nama_kegiatan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $bd['bidang_penyelenggara']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $bd['jumlah_peserta']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $bd['link_sertifikat']; ?>
                                                        </td>

                                                        <td>
                                                            <a href="<?php echo base_url() ?>bigdata/download1/<?php echo $bd['id_bigdata']; ?>"
                                                                class="badge badge-success btn-flat btn-block"
                                                                title="download"><i class="fa fa-download"></i> Download
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() ?>bigdata/download2/<?php echo $bd['id_bigdata']; ?>"
                                                                class="badge badge-success btn-flat btn-block"
                                                                title="download"><i class="fa fa-download"></i> Download
                                                            </a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="publikasiModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Publikasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="suratkeluar" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Tanggal</td>
                                                    <td>Nama Kegiatan</td>
                                                    <td>Judul Flyer</td>
                                                    <td>Link Publikasi Internal</td>
                                                    <td>Link Publikasi External</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($publikasi as $pu): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pu['tgl_publikasi']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pu['nama_kegiatan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pu['judul_flayer']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pu['link_internal']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pu['link_eksternal']; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="multimediaModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Publikasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="suratkeluar" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Tanggal</td>
                                                    <td>Nama Kegiatan</td>
                                                    <td>Link Video</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($multimedia as $mu): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $no++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mu['tgl_multimedia']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mu['nama_kegiatan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $mu['link_vidio']; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else {
                } ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->