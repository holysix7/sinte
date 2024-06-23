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
                <h1 class="h3 mb-4 text-gray-800">Laporan Multimedia</h1>
                <div class="card card-success">
                    <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <!-- row satu  -->
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Filter
                                    </div>
                                    <!--id formfilter adalah nama form untuk filter-->
                                    <form id="formfilter">
                                        <div class="card-body card-block">
                                            <input name="valnilai" type="hidden">
                                            <div class="row form-group">
                                                <div id="form-tanggal" class="col col-md-3"><label for="select"
                                                        class=" form-control-label">Pilih Periode Berdasarkan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="periode" id="periode"
                                                        class="form-control form-control-user"
                                                        title="Pilih Tahun Ajaran">
                                                        <option value="">-PILIH-</option>
                                                        <option value="tanggal">Tanggal</option>
                                                        <option value="bulan">Bulan</option>
                                                        <option value="tahun">Tahun</option>
                                                    </select>
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">

                                            <button onclick="prosesReset()" type="button"
                                                class="btn btn-warning btn-flat btn-block"><i
                                                    class="fas fa-remove-format"></i> Reset</button>
                                            <button id="btnproses" type="button" onclick="prosesPeriode()"
                                                class="btn btn-primary btn-flat btn-block"><i class="fas fa-filter"></i>
                                                Proses</button>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- row kedua  -->
                            <div class="col-lg-7" id="tanggalfilter">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Filter Berdasarkan Tanggal
                                    </div>
                                    <form action="<?php echo base_url(); ?>Multimedia/filter" method="POST"
                                        target="_blank">
                                        <input type="hidden" name="nilaifilter" value="1">

                                        <input name="valnilai" type="hidden">
                                        <div class="card-body card-block">

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="select" class=" form-control-label">Dari tanggal</label>
                                                </div>
                                                <div class="col col-md-4">
                                                    <input name="tanggalawal" value="" type="date" class="form-control"
                                                        placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="select" class=" form-control-label">Sampai
                                                        tanggal</label>
                                                </div>
                                                <div class="col col-md-4">
                                                    <input name="tanggalakhir" value="" type="date" class="form-control"
                                                        placeholder="Inputkan Jenis Bayar" id="tanggalakhir"
                                                        required="">
                                                </div>

                                                <small class="help-block form-text"></small>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-flat btn-block"><i
                                                    class="fa fa-print"></i> Print</button>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- row ketiga  -->
                            <div class="col-lg-7" id="bulanfilter">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Filter Berdasarkan Bulan
                                    </div>
                                    <form id="formbulan" action="<?php echo base_url(); ?>Multimedia/filter"
                                        method="POST" target="_blank">
                                        <div class="card-body card-block">
                                            <input type="hidden" name="nilaifilter" value="2">

                                            <input name="valnilai" type="hidden">
                                            <div class="row form-group">
                                                <div id="form-tanggal" class="col col-md-2"><label for="select"
                                                        class=" form-control-label">Pilih Tahun</label></div>
                                                <div class="col-12 col-md-10">
                                                    <select name="tahun1" id="tahun1"
                                                        class="form-control form-control-user" title="Pilih Tahun">
                                                        <option value="">-PILIH-</option>
                                                        <?php foreach ($tahun as $thn): ?>
                                                            <option value="<?php echo $thn->tahun; ?>">
                                                                <?php echo $thn->tahun; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-2">
                                                    <label for="select" class=" form-control-label">Dari tanggal</label>
                                                </div>
                                                <div class="col col-md-4">
                                                    <select name="bulanawal" id="bulanawal"
                                                        class="form-control form-control-user" title="Pilih Bulan">
                                                        <option value="">-PILIH-</option>
                                                        <option value="1">JANUARI</option>
                                                        <option value="2">FEBRUARI</option>
                                                        <option value="3">MARET</option>
                                                        <option value="4">APRIL</option>
                                                        <option value="5">MEI</option>
                                                        <option value="6">JUNI</option>
                                                        <option value="7">JULI</option>
                                                        <option value="8">AGUSTUS</option>
                                                        <option value="9">SEPTEMBER</option>
                                                        <option value="10">OKTOBER</option>
                                                        <option value="11">NOVEMBER</option>
                                                        <option value="12">DESEMBER</option>
                                                    </select>
                                                </div>
                                                <div class="col col-md-2">
                                                    <label for="select" class=" form-control-label">Sampai
                                                        tanggal</label>
                                                </div>
                                                <div class="col col-md-4">
                                                    <select name="bulanakhir" id="bulanakhir"
                                                        class="form-control form-control-user" title="Pilih Bulan">
                                                        <option value="">-PILIH-</option>
                                                        <option value="1">JANUARI</option>
                                                        <option value="2">FEBRUARI</option>
                                                        <option value="3">MARET</option>
                                                        <option value="4">APRIL</option>
                                                        <option value="5">MEI</option>
                                                        <option value="6">JUNI</option>
                                                        <option value="7">JULI</option>
                                                        <option value="8">AGUSTUS</option>
                                                        <option value="9">SEPTEMBER</option>
                                                        <option value="10">OKTOBER</option>
                                                        <option value="11">NOVEMBER</option>
                                                        <option value="12">DESEMBER</option>
                                                    </select>
                                                </div>
                                                <small class="help-block form-text"></small>

                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-flat btn-block"><i
                                                    class="fa fa-print"></i> Print</button>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- row keempat  -->
                            <div class="col-lg-7" id="tahunfilter">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form</strong> Filter Berdasarkan Tahun
                                    </div>
                                    <form id="formtahun" action="<?php echo base_url(); ?>Multimedia/filter"
                                        method="POST" target="_blank">
                                        <input name="valnilai" type="hidden">
                                        <div class="card-body card-block">

                                            <input type="hidden" name="nilaifilter" value="3">

                                            <div class="row form-group">
                                                <div id="form-tanggal" class="col col-md-2"><label for="select"
                                                        class=" form-control-label">Pilih Tahun</label></div>
                                                <div class="col-12 col-md-10">
                                                    <select name="tahun2" id="tahun2"
                                                        class="form-control form-control-user" title="Pilih Tahun">
                                                        <option value="">-PILIH-</option>
                                                        <?php foreach ($tahun as $thn): ?>
                                                            <option value="<?php echo $thn->tahun; ?>">
                                                                <?php echo $thn->tahun; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <small class="help-block form-text"></small>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-flat btn-block"><i
                                                    class="fa fa-print"></i> Print</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                          
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableMultimedia	" width="100%" cellspacing="0">
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
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- Footer -->
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

        <!-- End of Main Content -->
        <?php $this->load->view('admin/ekstra/modal') ?>

    </div>
    <!-- End of Content Wrapper -->
</div>

<script>
    $(document).ready(function () {
        $('#tableMultimedia	').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csvHtml5'

                },
                {
                    extend: 'excelHtml5',
                    title: 'Laporan Multimedia'
                },
                {
                    extend: 'copyHtml5',
                    title: 'Laporan Multimedia'
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'legal',
                    title: 'Laporan Multimedia',
                    download: 'open',
                    customize: function (doc) {
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';
                    },
                }

                // 'colvis',
            ]
        });
    });

    $(document).ready(function () {

        $("#tanggalfilter").hide();
        $("#tahunfilter").hide();
        $("#bulanfilter").hide();
        $("#cardmultimedia").hide();

    });

    /*digunakan untuk menampilkan form tanggal, bulan dan tahun*/

    function prosesPeriode() {
        var periode = $("[name='periode']").val();

        if (periode == "tanggal") {
            $("#btnproses").hide();
            $("#tanggalfilter").show();
            $("[name='valnilai']").val('tanggal');

        } else if (periode == "bulan") {
            $("#btnproses").hide();
            $("[name='valnilai']").val('bulan');
            $("#bulanfilter").show();

        } else if (periode == "tahun") {
            $("#btnproses").hide();
            $("[name='valnilai']").val('tahun');
            $("#tahunfilter").show();
        }
    }

    /*digunakan untuk menytembunyikan form tanggal, bulan dan tahun*/

    function prosesReset() {
        $("#btnproses").show();

        $("#tanggalfilter").hide();
        $("#tahunfilter").hide();
        $("#bulanfilter").hide();
        $("#cardmultimedia").hide();

        $("#periode").val('');
        $("#tanggalawal").val('');
        $("#tanggalakhir").val('');
        $("#tahun1").val('');
        $("#bulanawal").val('');
        $("#bulanakhir").val('');
        $("#tahun2").val('');
        $("#targetbayar").empty();

    }

</script>