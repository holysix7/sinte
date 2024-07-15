<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Kerja Praktik</title>
   
    <style type="text/css">
        @page { margin: 0; }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }
        table {
            border-collapse: collapse;
        }
        .page {
            width: 210mm;
            height: 297mm;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
        }
        .content {
            text-align: center;
            max-width: 100%; /* Adjust as needed */
        }
        h3 {
            margin: 0;
            padding: 0;
        }
        .content2 {
            text-align: center;
            max-width: 100%; /* Adjust as needed */
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
            left: 90px; /* Adjust as needed */
            width: 110px;
        }
        .bottom-right-image2 {
            position: absolute;
            bottom: 60px; /* Adjust as needed */
            right: 180px; /* Adjust as needed */
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
                        <br>
                        <br>
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
</html>

