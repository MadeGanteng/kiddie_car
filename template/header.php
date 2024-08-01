<?php

if (!isset($_SESSION['login'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=" . base_url('index') . "'>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dashboard | PT Kiddie Car</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/logo_toko.png">
    
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- ekko lightbox -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/ekko-lightbox/ekko-lightbox.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.css">
    <!-- fileupload -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/alert/sweetalert.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/mdi/css/materialdesignicons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <?php if ($_SESSION['level'] == 1) { ?>
            
               

                 <?php } ?>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-sign-out-alt ml-1 text-white"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header bg-lightblue">
                            <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) {
                                echo $_SESSION['nm_user'];
                            } else {
                                echo $_SESSION['nm_pelapor'];
                            } ?>
                        </span>
                        <div class="dropdown-divider"></div>
                        <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) { ?>
                            <a href="<?= base_url('admin/edit-pw') ?>" class="dropdown-item">
                                <i class="fas fa-key mr-2"></i> Ubah Password
                            </a>
                        <?php } else { ?>
                            <a href="<?= base_url('page/edit-pw') ?>" class="dropdown-item">
                                <i class="fas fa-key mr-2"></i> Ubah Password
                            </a>
                        <?php } ?>
                        <a href="<?= base_url('logout') ?>" class="dropdown-item alert-logout">
                            <i class="fas fa-sign-out-alt mr-2"></i> Log out
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->