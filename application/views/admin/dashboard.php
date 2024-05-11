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
                    <section id="hero">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div data-aos="zoom-out">
                                        <h1>Selamat Datang  <br> <span> Sistem Informasi Integral Technology</span></h1>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <img src="assets/img/BG/2.png" class="img-fluid animated" alt="">
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
                                </g>
                        </svg>

                    </section><!-- End Hero -->

                    <br>
                    <!-- ======= bigdata ======= -->
                    <?php if ($user == 'superadmin') { ?>
                        <main id="main">
                            <div class="card-body">
                                <header class="card card-waves">
                                <div class="card-body px-5 pt-5 pb-0">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-lg-6">
                                            <h1 class="text-primary">Bagaimana kami bisa membantu?</h1>
                                            <p class="lead mb-4">Telusuri basis pengetahuan kami untuk menemukan jawaban, atau hubungi kami secara langsung jika Anda mengalami masalah!</p>
   
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
                                                            name="kata" value="<?php echo htmlentities($kata, ENT_QUOTES); ?>"
                                                                onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Cari Data';}">
                                                            <input type="submit"  value="cari">

                                                            <?php
                                                            $Boyer = new Boyer(); 

                                                            $stmt = $pdo->prepare("SELECT * FROM bigdata WHERE nama_kegiatan LIKE :kata");
                                                            $stmt->execute(['kata' => "%$kata%"]);

                                                            $correct_searche = 0;
                                                            $incorrect_searches = 0;
                                                            $best_boyer_time = PHP_FLOAT_MAX;
                                                            $worst_boyer_time = 0;

                                                            while ($teks = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                                if (!empty($kata)) {
                                                                    $start_time_boyer = microtime(true);

                                                                    $hasil_boyer = $Boyer->BoyerMoore($teks['nama_kegiatan'], $kata);

                                                                    $finish_time_boyer = microtime(true);
                                                                    $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);

                                                                    echo "<div class='search-results'>";
                                                                    echo nl2br(str_replace($kata, "<span class='highlighted'>" . $kata . "</span>", $teks['nama_kegiatan']));
                                                                    echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['bidang_penyelenggara'] . "</p>";
                                                                    echo "<p style='text-align: justify; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['tgl_kegiatan'] . "</p><hr/>";
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
                                </div>
                            </div> 
                        </main>
                    <?php } else {
                    } ?>
                    <!-- ======= bigdata ======= -->

                    <a href="#" class="back-to-top d-flex align-items-left justify-content-left"><i
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

                <br>

                <div class="row">
                    <!-- Surat masuk hari ini -->
                    <div class="col-xl-6 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Surat Masuk hari ini</h6>
                                <div class="dropdown no-arrow">
                                    <a href="<?= base_url('admin/suratmasuk') ?>" class="text-dark" style="text-decoration: none">Lihat semua</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="suratmasuk" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Surat</th>
                                                <th>Judul Surat</th>
                                                <th>Indeks</th>
                                                <th>Asal Surat</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Tanggal Diterima</th>
                                                <th>Keterangan</th>
                                                <th>Berkas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($sm_today as $sm) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $sm->no_suratmasuk; ?></td>
                                                    <td><?= $sm->judul_suratmasuk; ?></td>
                                                    <td><?= $sm->judul_indeks; ?></td>
                                                    <td><?= $sm->asal_surat; ?></td>
                                                    <td><?php $date = date_create($sm->tanggal_masuk);
                                                        echo date_format($date, 'd/m/Y'); ?></td>
                                                    <td><?php $date = date_create($sm->tanggal_diterima);
                                                        echo date_format($date, 'd/m/Y'); ?></td>
                                                    <td><?= $sm->keterangan; ?></td>
                                                    <td><a href="<?php echo base_url($user . '/download/' . $sm->berkas_suratmasuk) ?>"><i class="fas fa-download text-success"></i></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">Surat Keluar hari ini</h6>
                                <div class="dropdown no-arrow">
                                    <a href="<?= base_url('admin/suratkeluar') ?>" class="text-dark" style="text-decoration: none">Lihat semua</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="suratkeluar" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Surat</th>
                                                <th>Judul Surat</th>
                                                <th>Indeks</th>
                                                <th>Tujuan</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Keterangan</th>
                                                <th>Berkas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($sk_today as $sk) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $sk->no_suratkeluar; ?></td>
                                                    <td><?= $sk->judul_suratkeluar; ?></td>
                                                    <td><?= $sk->judul_indeks; ?></td>
                                                    <td><?= $sk->tujuan; ?></td>
                                                    <td><?php $date = date_create($sk->tanggal_keluar);
                                                        echo date_format($date, 'd/m/Y'); ?></td>
                                                    <td><?= $sk->keterangan; ?></td>
                                                    <td><a href="<?php echo base_url($user . '/download/' . $sk->berkas_suratkeluar) ?>"><i class="fas fa-download text-success"></i></a></td>
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