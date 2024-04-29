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


<!-- Surat Keluar -->

<!-- Tambah Surat Keluar -->

<div class="modal fade" id="addsk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?= base_url('admin/tambahsk') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="card-body row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>No. Surat</label>
                                <?php $today = date('d,m,Y');
                                $pecah = explode(',', $today);
                                $bulan = $pecah[1];
                                $tahun = $pecah[2]; ?>
                                <input type="text" name="no_suratkeluar" class="form-control" value=".../BPSDM/H-<?php echo $bulan; ?>/<?php echo $tahun;
                                   uniqid(); ?>">
                                <small class="text-danger">Sesuaikan Nomor Surat Terlebih Dahulu</small>
                            </div>
                            <div class="form-group">
                                <label>Judul Surat Keluar</label>
                                <input type="text" name="judul_suratkeluar" class="form-control"
                                    placeholder="Judul Surat">
                            </div>
                            <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" placeholder="Tujuan">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Tanggal Keluar:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" name="tanggal_keluar" class="form-control"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask value="<?php echo date('Y-m-d') ?>">
                                </div>
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
                                <label for="">Dokumen surat</label>
                                <input type="file" class="form-control" name="berkas_suratkeluar"
                                    class="custom-file-input" id="exampleInputFile">
                                <small class="text-danger">Support file berekstensi PDF, DOC, DOCX, XLS, XLSX, PPTX, dan
                                    PPT</small>
                            </div>




                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Surat Keluar -->

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