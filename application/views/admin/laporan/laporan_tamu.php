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
                <h1 class="h3 mb-4 text-gray-800">Laporan Kunjungan Tamu</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableEservice" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Tanggal Kunjungan</td>
                                        <td>Nama Lengkap</td>
                                        <td>Alamat Email</td>
                                        <td>Nomor Telepon</td>
                                        <td>Asal Instansi</td>
                                        <td>Jabatan</td>
                                        <td>Perihal</td>
                                        <td>Jumlah Tamu</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tamu as $tm): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['tanggal_kunjungan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['nomor'];   ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['instansi']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['jabatan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['perihal']; ?>
                                            </td>
                                            <td>
                                                <?php echo $tm['jumlah_tamu'];   ?>
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
                    title: 'Laporan Kunjungan Tamu'
                },
                {
                    extend: 'copyHtml5',
                    title: 'Laporan Kunjungan Tamu'
                },
                {
                    extend: 'pdfHtml5',
                    oriented: 'portrait',
                    pageSize: 'legal',
                    title: 'Laporan Kunjungan Tamu',
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