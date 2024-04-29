<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="<?php echo base_url('media/img/logo.png') ?>" rel="icon" />
    <title>SINTE BPSDM JABAR LAPORAN E-SERVICES</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="table-responsive">
        <center>
            <h2>Laporan Data E-services</h2>
        </center>
        <table style="width:100%">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Kegiatan</th>
                <th>Jumlah Peserta</th>
            </tr>

            <?php $no = 1;
            foreach ($eservice as $key => $row) { ?>
                <tr>
                    <td align=center><?php echo $no++ ?></td>
                    <td align=center><?php echo $row->tgl_kegiatan ?> </td>
                    <td align=center><?php echo $row->nama_kegiatan ?></td>
                    <td align=center><?php echo $row->jumlah_peserta ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>