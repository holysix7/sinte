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
                <h1 class="h3 mb-4 text-gray-800">Profil saya</h1>
                <div class="card card-success">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="well well-sm">
                                    <div class="row justify-content-md-center">
                                        <?php foreach ($profil as $p) : ?>
                                            
                                            <img src="<?= base_url('vendor/files/profilimg/' . $p->image) ?>" alt="User profil" height="200" class="img-rounded img-responsive" />
                                            <div class="col-md-6">
                                                <h4>
                                                    <?= $p->nama_lengkap ?></h4>
                                                <p>
                                                    <span id="bio">Bio : <?php if ($p->bio == null) {
                                                                                echo '-';
                                                                            } else {
                                                                                echo $p->bio;
                                                                            } ?></span>
                                                </p>
                                                <hr>
                                               
                                                <div class="editprofil">

                                            
                                                    <a href="" data-id_user="<?php echo $p->id_user ?>"
                                                        data-toggle="modal"
                                                        data-target="#editprofil<?php echo $p->id_user ?>"
                                                        class="btn btn-primary btn-flat"><i class="fas fa-edit"></i> Perbaharui profil</a>

                                            
                                                    <a href="" data-id_user="<?php echo $p->id_user ?>"
                                                        data-toggle="modal"
                                                        data-target="#gantipassword<?php echo $p->id_user ?>"
                                                        class="btn btn-primary btn-flat"><i class="fas fa-key"></i> Ganti password</a>         
                                               
                                                   
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
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

</div>s


<!-- Ubah Profil-->

<?php $no = 0;
foreach ($profil as $p):
    $no++ ?>

    <div class="modal fade" id="editprofil<?php echo $p->id_user ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data <?php echo $p->nama_lengkap ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/aksiubahprofil') ?>" enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                                <div class="card-body row">
                                    <div class="col-md">
                                        <input type="hidden" name="id_user" value="<?= $p->id_user ?>">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <div class="input-group">
                                                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $p->nama_lengkap ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <div class="input-group">
                                                <input type="text" id="username" name="username" value="<?= $p->username ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Bio</label>
                                            <textarea name="bio" id="bio" required class="form-control" rows="3"><?php echo $p->bio ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="">Facebook</label>
                                            <div class="input-group">
                                                <input type="text" id="facebook" name="facebook" value="<?php if ($p->facebook == null) {
                                                                                                            echo 'http://facebook.com/' . $p->username;
                                                                                                        } else {
                                                                                                            echo $p->facebook;
                                                                                                        } ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <div class="input-group">
                                                <input type="email" id="email" name="email" value="<?php if ($p->email == null) {
                                                                                                        echo 'http://accounts.google.com/';
                                                                                                    } else {
                                                                                                        echo $p->email;
                                                                                                    } ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pilih gambar</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<?php endforeach; ?>
<!-- Ubah  Profil -->

<!-- Ubah Password-->

<?php $no = 0;
foreach ($profil as $p):
    $no++ ?>

    <div class="modal fade" id="gantipassword<?php echo $p->id_user ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/aksigantipass') ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" id="id_user" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                            <div class="form-group">
                                <label for="">Password lama</label>
                                <div class="input-group">
                                    <input type="password" id="password_lama" name="password_lama" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Password baru</label>
                                <div class="input-group">
                                    <input type="password" id="password_baru" name="password_baru" class="form-control" required>
                                </div>
                                <span class="text-danger" id="password_baru_message"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi password baru</label>
                                <div class="input-group">
                                    <input type="password" id="password_baru2" name="password_baru2" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" id="btnubahpassword" name="ubah" class="btn btn-primary">Ubah</button>
                            <button type="submit" disabled style="display: none;" name="ubah" class="btn btn-primary btnubahpassword">Ubah</button>
                        </div>
                    </form>
                </div>
                           
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- Ubah Password-->