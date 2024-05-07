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
                <h1 class="h3 mb-4 text-gray-800">Laporan Publikasi</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableEservice" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Tanggal</td>
                                        <td>Nama Kegiatan</td>
                                        <td>Judul Flyer</td>
                                        <td>Link Publikasi Internal</td>
                                        <td>Link Publikasi External</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($publikasi as $pu): ?>
                                        <tr>
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $pu['tgl_publikasi']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pu['nama_kegiatan']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pu['judul_flayer']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pu['link_internal']; ?>
                                            </td>
                                            <td>
                                                <?php echo $pu['link_eksternal']; ?>
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
                    title: 'Laporan Publikasi'
                },
                {
                    extend: 'copyHtml5',
                    title: 'Laporan Publikasi'
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: '',
                    title: 'Laporan Publikasi',
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