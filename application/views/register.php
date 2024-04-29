<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $main_title; ?> - <?php echo $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('vendor/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('vendor/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth/register');?>">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama_lengkap"  name="nama_lengkap" placeholder="Nama Lengkap">
                                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3 pt-0">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user"
                                                id="bio" name="bio" placeholder="Asal Instansi">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?php echo set_value('email') ?>"
                                        placeholder="Email Address">
                                        <?= form_error('email', '<small class="text-danger pl-3 pt-0">', '</small>'); ?>
                                    </div> 

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo set_value('username') ?>"
                                         placeholder="User name" >
                                        <?= form_error('username', '<small class="text-danger pl-3 pt-0">', '</small>'); ?>

                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                id="password1"  name="password1" placeholder="Password">
                                                <?= form_error('password1', '<small class="text-danger pl-3 pt-0">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password2" name="password2" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                    
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth');?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('vendor/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('vendor/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('vendor/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('vendor/') ?>js/sb-admin-2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#showpass').click(function() {
        if ($(this).is(':checked')) {
          $('#password').attr("type", "text");
        } else {
          $('#password').attr("type", "password");
        }
      })
    })
  </script>
</body>

</html>