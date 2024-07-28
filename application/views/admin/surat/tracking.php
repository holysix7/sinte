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
                <h1 class="h3 mb-4 text-gray-800">Tracking Pengajuan Surat</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <main id="main">
                            <div class="card-body">
                                <div class="col-lg-6">
                                    <h1 class="text-primary">Bagaimana kami bisa membantu?</h1>
                                    <p class="lead mb-4">Telusuri basis pengetahuan kami untuk menemukan jawaban, atau hubungi kami secara langsung jika Anda mengalami masalah!</p>
                                </div>
                            </div>  
                            <header class="card card-waves">
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


                                <?php
                                    if (!empty($kata)) {
                                    echo "<h3 style='font-size: 18px; padding: 2px; color: red;'> Hasil Pengecakan Testing: " . $total_time . " seconds</h3>";
                                    echo "<h3 style='font-size: 18px; padding: 2px; color: blue;'>Memory yang digunakan: " . memory_get_usage() . " bytes \n </h3><br>";
                                    echo " <a href='tracking'>

                                    <button type='button' style='background-color: #4e73df; color: white; text-shadow: 2px black; border: none; 
                                    padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; 
                                    margin: 4px 2px; cursor: pointer; border-radius: 5px; margin-bottom: 20px;'>
                                    Refresh Testing
                                    </button>
                                    </a>";
                                    }
                                ?>
                                <form method="get" action="">
                                    <div class="text-justify pl-5 pr-5">
                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-10 col-lg-8">
                                                <?= form_open('tracking/cari', 'id="tracking", class="card card-sm"') ?>
                                                <div class="card-body row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <i class="fas fa-search h4 text-body"></i>
                                                    </div>
                                                    <!--end of col-->
                                                    <div class="col">
                                                    <input class="form-control form-control-lg form-control-borderless" type="text"
                                                        name="kata" value="<?php echo htmlentities($kata, ENT_QUOTES); ?>"
                                                        onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Cari Data';}"
                                                        placeholder="Masukkan Nomor Surat Pengajuan Anda">
                                                    </div>
                                                    <!--end of col-->
                                                    <div class="col-auto">
                                                        <button class="btn btn-lg btn-primary" value="cari" type="submit">Cari</button>
                                                    </div>
                                                    <!--end of col-->
                                                    </div>
                                                    <?= form_close()?>
                                                </div>
                                                <!--end of col-->
                                            </div>
                                        </div>

                                    <?php
                                        $Boyer = new Boyer(); 

                                        $stmt = $pdo->prepare("SELECT * FROM suratkeluar WHERE no_suratkeluar LIKE :kata");
                                        $stmt->execute(['kata' => "%$kata%"]);

                                        $correct_searche = 0;
                                        $incorrect_searches = 0;
                                        $best_boyer_time = PHP_FLOAT_MAX;
                                        $worst_boyer_time = 0;

                                        while ($teks = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        if (!empty($kata)) {
                                        $start_time_boyer = microtime(true);

                                        $hasil_boyer = $Boyer->BoyerMoore($teks['no_suratkeluar'], $kata);

                                        $finish_time_boyer = microtime(true);
                                        $search_execution_time_boyer = round(($finish_time_boyer - $start_time_boyer) * 10000, 4);

                                        echo "<div class='search-results'>";
                                        echo nl2br(str_replace($kata, "<p style='text-align: center;>" ,"<span class='highlighted'>" . $kata . "</span>", $teks['no_suratkeluar']));
                                        echo "<p style='text-align: center; font-size: 13px;padding-top: 5px; padding-bottom:6px;'>" . $teks['status'] . "</p>";
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
                            </header> 
                        </main>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- modal tambah -->
        <?php $this->load->view('admin/ekstra/modal'); ?>
        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
