<?php 
    $uri = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Shreyu - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/shreyu/images/favicon.ico">

        <!-- plugins -->
        <?php
        if ($uri == 'kategori' || $uri == 'soal_kategori' || $uri = 'laporan' || $uri == 'non_aktif_kategori' || $uri == 'aktif_kategori') {
        ?>
        <link href="<?= base_url(); ?>assets/shreyu/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/shreyu/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/shreyu/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/shreyu/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <link href="<?= base_url(); ?>assets/shreyu/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?= base_url(); ?>assets/shreyu/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/shreyu/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/shreyu/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="assets/shreyu/images/logo.png" alt="" height="24" />
                            <span class="d-inline h5 ml-1 text-logo">IKM</span>
                        </span>
                        <span class="logo-sm">
                            <img src="assets/shreyu/images/logo.png" alt="" height="24">
                        </span>
                    </a>

                    <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                        <li class="">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i data-feather="menu" class="menu-icon"></i>
                                <i data-feather="x" class="close-icon"></i>
                            </button>
                        </li>
                    </ul>

                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                        <li class="d-none d-sm-block">
                            <div class="app-search">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span data-feather="search"></span>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    <?php
                    $user = $this->db->get_where('users',['level' => $_SESSION['level']])->row();
                    if ($user->foto != null) { ?>
                        <img src="<?= base_url().$user->foto;?>" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                        <img src="<?= base_url().$user->foto;?>" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
                    <?php } else { ?>
                        <img src="<?= base_url();?>assets/shreyu/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                        <img src="<?= base_url();?>assets/shreyu/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
                    <?php }?>
                    <?php if ($_SESSION['level'] == 'admin') {?>
                        <div class="media-body">
                            <h6 class="pro-user-name mt-0 mb-0"><?= $user->nama;?></h6>
                            <span class="pro-user-desc">Administrator</span>
                        </div>
                    <?php } else { ?>
                        <div class="media-body">
                            <h6 class="pro-user-name mt-0 mb-0"><?= $user->nama;?></h6>
                            <span class="pro-user-desc">Kepala Lurah</span>
                        </div>
                    <?php } ?>
                </div>
                
                <?php if ($_SESSION['level'] == 'admin') {
                    include 'sidebar_admin.php';
                }else{
                    include 'sidebar_lurah.php';
                }?>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->