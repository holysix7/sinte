<!-- surat masuk -->
<div class="modal fade" id="addsm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php
                    echo form_open_multipart('admin/tambahsm');
                    ?>
                <div class="card-body row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>No. Surat</label>
                            <?php $today = date('d,m,Y');
                            $pecah = explode(',', $today);
                            $bulan = $pecah[1];
                            $tahun = $pecah[2]; ?>
                            <input type="text" name="no_suratmasuk" class="form-control" value=".../BPSDM/H-<?php echo $bulan; ?>/<?php echo $tahun;
                               uniqid(); ?>">
                            <small class="text-danger">Sesuaikan Nomor Surat Terlebih Dahulu</small>
                        </div>
                        <div class="form-group">
                            <label>Judul Surat Masuk</label>
                            <input type="text" name="judul_suratmasuk" class="form-control" placeholder="Judul Surat"
                                required="">
                        </div>
                        <div class="form-group">
                            <label>Asal Surat</label>
                            <input type="text" name="asal_surat" class="form-control" placeholder="Asal Surat"
                                required="">
                        </div>
                        <div class="form-group">
                            <label for="">Dokumen surat</label>
                            <input type="file" class="form-control" name="berkas_suratmasuk" class="custom-file-input"
                                id="exampleInputFile">
                            <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
                                PPT</small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Tanggal Masuk:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="tanggal_masuk" value="<?php echo date('Y-m-d') ?>"
                                    class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Diterima:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="tanggal_diterima" value="<?php echo date('Y-m-d') ?>"
                                    class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                        </div>
                        <!-- dropdown surat masuk -->
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
                        <!-- dropdown surat masuk -->
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- surat masuk -->


<!-- Surat Pengajuan -->

<!-- Tambah Surat Pengajuan -->

<div class="modal fade" id="addsp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                        <input type="text" name="no_suratpengajuan" class="form-control" value=".../BPSDM/H-<?php echo $bulan; ?>/<?php echo $tahun;
                                           uniqid(); ?>">
                                        <small class="text-danger">Sesuaikan nomor surat terlebih dahulu</small>
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
                                        <small class="text-danger">Sesuaikan tanggal awal s/d akhir kerja
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
                                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                data-mask value="<?php echo date('Y-m-d') ?>">
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
                                        <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX,
                                            PPTX, dan
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

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="modal-body">
                        <?php
                        echo form_open_multipart('kp/proses_tambah_data');
                        ?>
                        <div class="card-body row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Nama Lengkap..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Email</label>
                                    <div class="input-group">
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Alamat Email..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Induk</label>
                                    <div class="input-group">
                                        <input type="number" name="no_induk" class="form-control"
                                            placeholder="No. Induk..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Asal Instansi</label>
                                    <div class="input-group">
                                        <input type="text" name="asal_instansi" class="form-control"
                                            placeholder="Asal Instansi..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jurusan</label>
                                    <div class="input-group">
                                        <input type="text" name="jurusan" class="form-control" placeholder="Jurusan..."
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Perihal</label>
                                    <select name="perihal" id="perihal" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Pendataan Kerja Praktik">Pendataan Kerja Praktik</option>
                                        <option value="Pendataan Penelitian">Pendataan Penelitian</option>
                                    </select>
                                    <small><span class="text-danger text-small" id="alert_perihal"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Jangka Waktu</label>
                                    <div class="input-group">
                                        <input type="text" name="jangka_waktu" class="form-control"
                                            placeholder="Jangka Waktu..." required>
                                    </div>
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
                                </div>

                                <div class="form-group">
                                    <label>Posisi Magang</label>
                                    <select name="posisi_magang" id="posisi_magang" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                        <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang Pengembangan
                                            Kompetensi
                                            Manajerial</option>
                                        <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang Pengembangan
                                            Kompetensi Teknis Umum</option>
                                        <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang Pengembangan
                                            Kompetensi Teknis Inti</option>
                                        <option value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">Bidang
                                            Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Perpustakaan">Perpustakaan</option>
                                        <option value="Kearsipan">Kearsipan</option>
                                        <option value="Widyaiswara">Widyaiswara</option>
                                    </select>
                                    <small><span class="text-danger text-small" id="alert_posisi_magang"></span></small>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        </p>
                    </div>
                    <div>
                        <div class="modal-footer right-content-between">
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>



                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card-body">
                        gatau buat apa kayanya klik selesai buat masuk ke data suoeradmin
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Surat Pengajuan -->

<!-- kp add -->
<div class="modal fade" id="addkerjapraktik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php
                    echo form_open_multipart('kp/proses_tambah_data');
                    ?>
                <div class="card-body row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" placeholder="Alamat Email..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">No. Induk</label>
                            <div class="input-group">
                                <input type="number" name="no_induk" class="form-control" placeholder="No. Induk..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Asal Instansi</label>
                            <div class="input-group">
                                <input type="text" name="asal_instansi" class="form-control"
                                    placeholder="Asal Instansi..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <div class="input-group">
                                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan..."
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label>Perihal</label>
                            <select name="perihal" id="perihal" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Pendataan Kerja Praktik">Pendataan Kerja Praktik</option>
                                <option value="Pendataan Penelitian">Pendataan Penelitian</option>
                            </select>
                            <small><span class="text-danger text-small" id="alert_perihal"></span></small>
                        </div>
                        <div class="form-group">
                            <label for="">Jangka Waktu</label>
                            <div class="input-group">
                                <input type="text" name="jangka_waktu" class="form-control"
                                    placeholder="Jangka Waktu..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Awal</label>
                            <div class="input-group">
                                <input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk..."
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                            <div class="input-group">
                                <input type="date" name="tgl_akhir" class="form-control" placeholder="Tanggal Akhir..."
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Posisi Magang</label>
                            <select name="posisi_magang" id="posisi_magang" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Subbag Tata Usaha">Subbag Tata Usaha</option>
                                <option value="Bidang Pengembangan Kompetensi Manajerial">Bidang Pengembangan Kompetensi
                                    Manajerial</option>
                                <option value="Bidang Pengembangan Kompetensi Teknis Umum">Bidang Pengembangan
                                    Kompetensi Teknis Umum</option>
                                <option value="Bidang Pengembangan Kompetensi Teknis Inti">Bidang Pengembangan
                                    Kompetensi Teknis Inti</option>
                                <option value="Bidang Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan">Bidang
                                    Sertifikasi Kompetensi Dan Pengelolaan Kelembagaan</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Perpustakaan">Perpustakaan</option>
                                <option value="Kearsipan">Kearsipan</option>
                                <option value="Widyaiswara">Widyaiswara</option>
                            </select>
                            <small><span class="text-danger text-small" id="alert_posisi_magang"></span></small>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- kp add -->

<!-- indeks -->
<div class="modal fade" id="addindeks">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <form role="form" action="<?= base_url('admin/tambahindex') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Kode Indeks</label>
                        <div class="input-group">
                            <input type="text" name="kode_index" class="form-control" placeholder="Kode Indeks..."
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Indeks</label>
                        <div class="input-group">
                            <input type="text" name="judul_index" class="form-control" placeholder="Nama Indeks..."
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Detail</label>
                        <textarea name="detail" id="" required class="form-control" rows="5"
                            placeholder="Tambah detail dipisah dengan koma (contoh: undangan rapat, undangan pegawai, dll.. / ketik \'-' jika detail kosong"></textarea>
                    </div>
                    </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- indeks -->

<!-- add users -->
<div class="modal fade" id="adduser">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <form role="form" action="<?= base_url('admin/tambahuser') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama lengkap</label>
                        <div class="input-group">
                            <input type="text" name="nama_lengkap" autocapitalize="true" class="form-control"
                                placeholder="Nama lengkap..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" placeholder="Username..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" autocomplete="off" name="password" class="form-control"
                                placeholder="Password..." required>
                        </div>
                        <span class="text-danger" id="passwordvalidasi"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi password</label>
                        <div class="input-group">
                            <input type="password" id="password2" autocomplete="off" name="password2"
                                class="form-control" placeholder="Password..." required>
                        </div>
                        <span class="text-danger" id="passwordvalidasi"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select class="form-control" name="level" id="">
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Users</option>
                            <option value="4">Deveservice</option>
                            <option value="5">Devaplikasi</option>
                            <option value="6">Devbigdata</option>
                            <option value="7">Devmultimedia</option>
                            <option value="8">Devpublikasi</option>
                        </select>
                    </div>
                    </p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="tambah" class="btn btn-primary tambahuser">Tambah</button>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- add users -->