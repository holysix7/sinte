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
                <h1 class="h3 mb-4 text-gray-800">Laporan Bigdatai</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableEservice" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <td>Tanggal Kegiatan</td>
                                        <td>Jenis Kegiatan</td>
                                        <td>Nama Kegiatan</td>
                                        <td>Bidang Penyelenggara</td>
                                        <td>Jumlah Peserta</td>
                                        <td>Link Sertifikat</td>
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
                                                <?php echo $bd['bidang_penyelenggara'];   ?>
                                            </td>

                                            <td>
                                                <?php echo $bd['jumlah_peserta']; ?>
                                            </td>
                                            <td>
                                                <?php echo $bd['link_sertifikat']; ?>
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
                    title: 'Laporan Aplikasi'
                },
                {
                    extend: 'copyHtml5',
                    title: 'Laporan Aplikasi'
                },
                {
                    extend: 'pdfHtml5',
                    oriented: 'portrait',
                    pageSize: 'legal',
                    title: 'Laporan Aplikasi',
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