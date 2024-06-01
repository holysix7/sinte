<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <link href="<?php echo base_url('media/img/logo.png') ?>" rel="icon" />
        <!--  untuk text saja : <div class="sidebar-brand-text mx-3">Sinte</div> -->
        <div class="logo" align="center">
            <img src="<?php echo base_url() ?>media\img\logoputih.png" width="110" height="auto" class="img-responsive"
                alt="Logo" style="margin-top: -5px;margin-bottom: 10px;">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin') ?>">
            <i class="fas fa-house-damage"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Charts E-services -->
    <li class="nav-item">
        <?php if (current_url() == base_url('eservices/view')) {

        } ?>

        <?php if ($user == 'superadmin'): ?>
            <a class="nav-link
                <?php if (current_url() == base_url('eservices/view')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('eservices/view') ?>">
                <i class="fas fa-vote-yea"></i>
                <span>E-services</span>
            <?php endif; ?>
        </a>
    </li>

    <!-- Nav Item - Charts Aplikasi -->
    <li class="nav-item">
        <?php if (current_url() == base_url('aplikasi/view')) {
        } ?>

        <?php if ($user == 'superadmin'): ?>
            <a class="nav-link
                <?php if (current_url() == base_url('aplikasi/view')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('aplikasi/view') ?>">
                <i class="fas fa-laptop-code"></i>
                <span>Aplikasi</span>
            <?php endif; ?>
        </a>
    </li>

    <!-- Nav Item - Charts Big Data -->
    <li class="nav-item">
        <?php if (current_url() == base_url('bigdata/view')) {
        } ?>

        <?php if ($user == 'superadmin'): ?>
            <a class="nav-link
                <?php if (current_url() == base_url('bigdata/view')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('bigdata/view') ?>">
                <i class="fab fa-sellsy"></i>
                <span>Big Data</span>
            <?php endif; ?>
        </a>
    </li>

    <!-- Nav Item - Charts Multimedia -->
    <li class="nav-item">
        <?php if (current_url() == base_url('multimedia/view')) {
        } ?>

        <?php if ($user == 'superadmin'): ?>
            <a class="nav-link
                <?php if (current_url() == base_url('multimedia/view')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('multimedia/view') ?>">
                <i class="fas fa-photo-video"></i>
                <span>Multimedia</span>
            <?php endif; ?>
        </a>
    </li>

    <!-- Nav Item - Charts Publikasi -->
    <li class="nav-item">
        <?php if (current_url() == base_url('publikasi/view')) {
        } ?>

        <?php if ($user == 'superadmin'): ?>
            <a class="nav-link
                <?php if (current_url() == base_url('publikasi/view')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('publikasi/view') ?>">
                <i class="fas fa-share-alt"></i>
                <span>Publikasi</span>
            <?php endif; ?>
        </a>
    </li>




    <!-- Nav Item - Charts Kunjungan Tamu Superadmin -->
    <li class="nav-item">
        <?php if (current_url() == base_url('tamu/view')) {
        } ?>

        <?php if ($user == 'superadmin'): ?>
            <a class="nav-link
                <?php if (current_url() == base_url('tamu/view')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('tamu/view') ?>">
                <i class="fas fa-share-alt"></i>
                <span>Data Kunjungan Tamu</span>
            <?php endif; ?>
        </a>
    </li>





    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item 
    <?php if (current_url() == base_url('admin/suratmasuk') or current_url() == base_url('admin/suratpengajuan')) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-envelope-open-text"></i>
            <span>Kerja Praktik</span>
        </a>
        <div id="collapseTwo" class="collapse 
        <?php if (current_url() == base_url('admin/suratmasuk') or current_url() == base_url('admin/suratpengajuan')) {
            echo 'show';
        } ?>" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>

                <?php if ($user == 'userskp'): ?>
                    <a class="collapse-item 
                        <?php if (current_url() == base_url('kp/view')) {
                            echo 'active';
                        } ?>" href="<?php echo base_url('kp/view') ?>">Data Kerja Praktik
                    </a>

                    <a class="collapse-item 
                        <?php if (current_url() == base_url('admin/suratpengajuankp')) {
                            echo 'active';
                        } ?>" href="<?php echo base_url('admin/suratpengajuan') ?>">Surat Pengajuan
                    </a>

                <?php endif; ?>

                <?php if ($user == 'admin'): ?>
                    <a class="collapse-item 
                    <?php if (current_url() == base_url('kp/view')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('kp/view') ?>">Data Kerja Praktik</a>

                    <a class="collapse-item 
                    <?php if (current_url() == base_url('admin/suratpengajuan')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/suratpengajuan') ?>">Surat Pengajuan</a>
                <?php endif; ?>

                <?php if ($user == 'superadmin'): ?>
                    <a class="collapse-item 
                    <?php if (current_url() == base_url('kp/view')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('kp/view') ?>">Data Kerja Praktik</a>

                    <a class="collapse-item 
                    <?php if (current_url() == base_url('admin/suratpengajuan')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/suratpengajuan') ?>">Surat Pengajuan</a>

                    <a class="collapse-item 
                    <?php if (current_url() == base_url('admin/suratmasuk')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/suratmasuk') ?>">Sertifikat</a>

                <?php endif; ?>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Properties
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item 
    <?php if (current_url() == base_url('admin/indeks') or current_url() == base_url('admin/users') or current_url() == base_url('admin/profil')) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaturan</span>
        </a>
        <div id="collapseUtilities" class="collapse 
        <?php if (current_url() == base_url('admin/indeks') or current_url() == base_url('admin/users') or current_url() == base_url('admin/profil')) {
            echo 'show';
        } ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List:</h6>
                <a class="collapse-item 
                <?php if ($user == 'superadmin'): ?>
                    <?php if (current_url() == base_url('admin/indeks')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/indeks') ?>">Indeks</a>
                    <a class="collapse-item 
                    <?php if (current_url() == base_url('admin/users')) {
                        echo 'active';
                    } ?>" href="<?php echo base_url('admin/users') ?>">Users</a>
                <?php endif; ?>
                <a class="collapse-item 
                <?php if (current_url() == base_url('admin/profil')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/profil') ?>">Profil</a>
            </div>
        </div>
    </li>


    <li class="nav-item 
        <?php if ($user == 'superadmin'): ?>
            <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratpengajuan')) {
                echo 'active';
            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-file-pdf"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseLaporan" class="collapse 
                <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratpengajuan')) {
                    echo 'show';
                } ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kerja Praktik:</h6>
                    <a class="collapse-item
                        <?php if ($user == 'superadmin'): ?>
                        <?php if (current_url() == base_url('kp/laporan_kp')) {
                            echo 'active';
                        } ?>" href="<?php echo base_url('kp/laporan_kp') ?>">Laporan Data KP</a>
                        <a class="collapse-item   
                        <?php if (current_url() == base_url('admin/laporan_suratpengajuan')) {
                            echo 'active';
                        } ?>" href="<?php echo base_url('admin/laporan_suratpengajuan') ?>">Laporan Surat Pengajuan</a>
                        <a class="collapse-item 
                            <?php if (current_url() == base_url('admin/laporan_suratmasuk')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('admin/laporan_suratmasuk') ?>">Laporan Sertifikat
                            Digital</a>



                        <h6 class="collapse-header">Master:</h6>
                        <a class="collapse-item 
                            <?php if (current_url() == base_url('eservices/laporan_eservices')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('eservices/laporan_eservices') ?>">Laporan E-Services</a>

                        <a class="collapse-item 
                            <?php if (current_url() == base_url('aplikasi/laporan_aplikasi')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('aplikasi/laporan_aplikasi') ?>">Laporan Aplikasi</a>

                        <a class="collapse-item 
                            <?php if (current_url() == base_url('bigdata/laporan_bigdata')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('bigdata/laporan_bigdata') ?>">Laporan Bigdata</a>

                        <a class="collapse-item 
                            <?php if (current_url() == base_url('multimedia/laporan_multimedia')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('multimedia/laporan_multimedia') ?>">Laporan Multimedia</a>

                        <a class="collapse-item 
                            <?php if (current_url() == base_url('publikasi/laporan_publikasi')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('publikasi/laporan_publikasi') ?>">Laporan Publikasi</a>

                        <a class="collapse-item 
                            <?php if (current_url() == base_url('tamu/laporan_tamu')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('tamu/laporan_tamu') ?>">Laporan Kunjungan Tamu</a>




                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </li>


    <li class="nav-item 
    <?php if ($user == 'admin'): ?>
        <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratpengajuan')) {
            echo 'active';
        } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-file-pdf"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseLaporan" class="collapse 
            <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratpengajuan')) {
                echo 'show';
            } ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Surat:</h6>
                    <a class="collapse-item
                    <?php if ($user == 'admin'): ?>
                        <?php if (current_url() == base_url('kp/laporan_kp')) {
                            echo 'active';
                        } ?>" href="<?php echo base_url('kp/laporan_kp') ?>">Laporan Data KP</a>
                        <a class="collapse-item   
                        <?php if (current_url() == base_url('admin/laporan_suratpengajuan')) {
                            echo 'active';
                        } ?>" href="<?php echo base_url('admin/laporan_suratpengajuan') ?>">Laporan Surat Pengajuan</a>
                        <a class="collapse-item 
                            <?php if (current_url() == base_url('admin/laporan_suratmasuk')) {
                                echo 'active';
                            } ?>" href="<?php echo base_url('admin/laporan_suratmasuk') ?>">Laporan Sertifikat
                            Digital</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lainnya
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item 
    <?php if (current_url() == base_url('admin/about')) {
        echo 'active';
    } ?>">
        <a class="nav-link" href="<?= base_url('admin/about') ?>">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Tentang</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->