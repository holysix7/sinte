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
                <h1 class="h3 mb-4 text-gray-800">Laporan Kerja Praktik</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableEservice" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Lengkap</td>
                                        <td>Alamat Email</td>
                                        <td>No. Induk</td>
                                        <td>Asal Instansi</td>
                                        <td>Jurusan</td>
                                        <td>Perihal</td>
                                        <td>Jangka Waktu</td>
                                        <td>Tanggal Awal</td>
                                        <td>Tanggal Akhir</td>
                                        <td>Posisi Magang</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kp as $magang): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['no_induk']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['asal_instansi'];   ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['jurusan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['perihal']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['jangka_waktu']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['tgl_masuk'];   ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['tgl_akhir']; ?>
                                            </td>
                                            <td>
                                                <?php echo $magang['posisi_magang']; ?>
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