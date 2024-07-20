<?php if ($user == 'userskp'): ?>

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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card card-success">
                        <div class="card-body">
                            <div class="card-header">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link disabled" tabindex="1" aria-disabled="true" id="surat-tab"
                                            data-toggle="tab" href="#surat" role="tab" aria-controls="surat"
                                            aria-selected="false">Data Surat Pengajuan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="true">Data Peserta Kerja
                                            Praktik</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" tabindex="3" aria-disabled="true" id="finish-tab"
                                            data-toggle="tab" href="#finish" role="tab" aria-controls="finish"
                                            aria-selected="false">Validasi Data</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="surat" role="tabpanel" aria-labelledby="surat-tab">
                                    <div class="modal-body">
                                        <form role="form" action="<?= base_url('admin/tambahsp') ?>" method="post"
                                            enctype="multipart/form-data">
                                            <div class="card-body row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>No. Surat</label>
                                                        <?php $today = date('d,m,Y');
                                                        $pecah = explode(',', $today);
                                                        $bulan = $pecah[1];
                                                        $tahun = $pecah[2]; ?>
                                                        <input type="text" name="no_suratpengajuan" class="form-control"
                                                            value=".../BPSDM/H-<?php echo $bulan; ?>/<?php echo $tahun;
                                                               uniqid(); ?>">
                                                        <small class="text-danger">*Sesuaikan nomor surat terlebih
                                                            dahulu</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Surat</label>
                                                        <select class="form-control" name="id_indeks">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($indeks as $i): ?>
                                                                <option value="<?php echo $i->id_indeks; ?>">
                                                                    <?php echo strtoupper($i->judul_indeks); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Awal</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tgl_masuk" class="form-control"
                                                                placeholder="Tanggal Masuk..." required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Akhir</label>
                                                        <div class="input-group">
                                                            <input type="date" name="tgl_akhir" class="form-control"
                                                                placeholder="Tanggal Akhir..." required>
                                                        </div>
                                                        <small class="text-danger">*Sesuaikan tanggal awal s/d akhir kerja
                                                            praktik</small>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Tanggal Pengajuan:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" name="tanggal_pengajuan" class="form-control"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asal Instansi</label>
                                                        <input type="text" name="asal_instansi" class="form-control"
                                                            placeholder="Asal Instansi">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Upload Surat Pengajuan</label>
                                                        <input type="file" class="form-control" name="berkas_suratpengajuan"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <small class="text-danger">*Support file berekstensi PDF, DOC, DOCX,
                                                            XLS, XLSX, PPTX, dan
                                                            PPT</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" name="keterangan"
                                                            placeholder="Keterangan"></textarea>
                                                    </div>

                                                </div>


                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal-footer right-content-between">
                                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="modal-body">
                                        <?php
                                        echo form_open_multipart('kp/proses_tambah_data/');
                                        ?>
                                        <div class="card-body row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="id_suratpengajuan" class="form-control"
                                                            value="<?= explode('/', $this->uri->uri_string())[2] ?>" required>
                                                        <input type="text" name="nama" class="form-control"
                                                            placeholder="Nama Lengkap..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">No Handphone</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nohp" class="form-control"
                                                            placeholder="Nomor Handphone..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Jurusan</label>
                                                    <div class="input-group">
                                                        <input type="text" name="jurusan" class="form-control"
                                                            placeholder="Jurusan..." required>
                                                    </div>
                                                </div>
                                                <small class="text-danger">*Tambahkan data peserta kerja praktik sesuai
                                                    dengan data pada surat pengajuan </small>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Tanggal Pendataan:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" name="tanggal_pendataan" class="form-control"
                                                                data-inputmask-alias="datetime"
                                                                data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">No. Induk</label>
                                                        <div class="input-group">
                                                            <input type="number" name="no_induk" class="form-control"
                                                                placeholder="No. Induk..." required>
                                                        </div>
                                                    </div>
                                                    <label>Posisi Magang</label>
                                                    <select name="posisi_magang" id="posisi_magang" class="form-control"
                                                        required>
                                                        <option value="">-- Pilih --</option>
                                                        <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                                        <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang
                                                            Pengembangan Kompetensi
                                                            Manajerial</option>
                                                        <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang
                                                            Pengembangan
                                                            Kompetensi Teknis Umum</option>
                                                        <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang
                                                            Pengembangan
                                                            Kompetensi Teknis Inti</option>
                                                        <option
                                                            value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">
                                                            Bidang
                                                            Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                                        <option value="Sekretaris">Sekretaris</option>
                                                        <option value="Perpustakaan">Perpustakaan</option>
                                                        <option value="Kearsipan">Kearsipan</option>
                                                        <option value="Widyaiswara">Widyaiswara</option>
                                                    </select>
                                                    <small><span class="text-danger text-small"
                                                            id="alert_posisi_magang"></span></small>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- /.card-body -->
                                    </div>

                                    <div>
                                        <div class="modal-footer right-content-between">
                                            <?php $id_surat = explode('/', $this->uri->uri_string())[2]; ?>
                                            <button type="submit" name="tambah" class="btn btn-primary"> Tambah</button>
                                            <a href="<?php echo base_url("admin/tambahpengajuan_validasi/{$id_surat}") ?>"
                                                class="btn btn-success " title="selesai"></i> Selesai
                                            </a>
                                        </div>
                                        </form>
                                    </div>


                                    <!-- /.modal-content -->
                                </div>

                                <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish-tab">
                                    <div class="card-body">
                                        Data Diri Peserta Kerja Praktik Dapat di Lihat Pada "Detail" Halaman Pengajuan
                                    </div>
                                    <div class="modal-footer right-content-between">

                                        <a href="<?php echo base_url() ?>admin/suratpengajuan/<?php echo base_url('admin/suratpengajuan') ?>"
                                            class="btn btn-primary" title="selesai"></i> Pengajuan Selesai
                                        </a>
                                    </div>
                                </div>
                            </div>

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
<?php endif; ?>