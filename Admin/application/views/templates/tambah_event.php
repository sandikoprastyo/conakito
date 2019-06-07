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
                    <i class="fas fa-table"></i>
                    <span>Invoice Pemesanan</span></a>
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

            <!-- Heading -->


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('#'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('../assets/img/admin.png'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('#'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <div class="container" style="margin-top: 50px">
                        <div class="col-md-12 centered">
                            <?php if ($this->session->flashdata('flash')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data Event <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                <? endif; ?>
                            </div>
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?= base_url('event/tambahEvent'); ?>" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Nama Event</label>
                                                <input type="text" class="form-control" name="nama">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Harga produk">Tanggal Event</label>
                                                <input type="date" class="form-control" name="tanggal">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlTextarea1">Deskripsi Event</label>
                                            <textarea class="form-control" id="des" name="deskripsi" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Masukan Foto Event</label>
                                                <input type="file" class="form-control-file" name="foto">
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Tambah</button>
                                    <a href="<?= base_url('event/dataEvent'); ?>" class="btn btn-danger float-right">Kembali</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Konakito.com 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('auth'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>