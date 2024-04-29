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
                <h1 class="h3 mb-4 text-gray-800">Laporan E-services</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <!-- <div class="col-md-auto">
                                <a href="cetakeservices" id=cetakeservices class="btn btn-success btn-block"><i class="fas fa-print"></i> Cetak laporan</a>
                            </div>
                            <div class="col-md-auto">
                                <a href="<?php echo base_url('eservices/pdf') ?>" class="btn btn-dark"><i class="fas fa fa-download ">&nbsp</i> Export E-services</a>
                            </div> -->
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableEservice" width="100%" cellspacing="0">
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
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- Footer -->
        <?php $this->load->view('templates/footer') ?>
        <?php $this->load->view('templates/copyright') ?>
        <!-- End of Footer -->

        <!-- End of Main Content -->
        <?php $this->load->view('admin/ekstra/modal') ?>

    </div>
    <!-- End of Content Wrapper -->
</div>

<script>
    $(document).ready(function () {
        $('#tableEservice').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csvHtml5'

                },
                {
                    extend: 'excelHtml5',
                    title: 'Laporan E-Services'
                },
                {
                    extend: 'copyHtml5',
                    title: 'Laporan E-Services'
                },
                {
                    extend: 'pdfHtml5',
                    oriented: 'portrait',
                    pageSize: 'legal',
                    title: 'Laporan E-Services',
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
</script>