<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('../Admin/assets/vendor/fontawesome-free/css/all.min.css"'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('../Admin/assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'); ?>" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('../Admin/assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('../Admin/admin'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hallo Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                SHOP
            </div>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('produk/dataProduk'); ?>">
                    <i class="fas fa-info-circle"></i>
                    <span>Data Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('invoice/dataInvoice'); ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Invoice Pemesanan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pembayaran/dataPembayaran'); ?>">
                    <i class="fas fa-table"></i>
                    <span>Data Pembayaran</span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Event
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('event/dataEvent'); ?>">
                    <i class="fas fa-calendar"></i>
                    <span>Data Event</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Reservation
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dataReservation'); ?>">
                    <i class="fas fa-info-circle"></i>
                    <span>Data Reservations</span></a>
            </li>
            <!-- Divider -->




            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('#'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->