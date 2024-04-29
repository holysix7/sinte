<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('vendor/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('vendor/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" onload="window.print()">
    <hr>
    <center>
        <h2>Laporan Data E-services</h2>
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered" id="cetakeservices" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tanggal Kegiatan</td>
                    <td>Nama Kegiatan</td>
                    <td>Jumlah Peserta</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($eservice as $es): ?>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>