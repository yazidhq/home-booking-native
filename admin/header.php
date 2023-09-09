<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Page</title>

    <!-- Favicons -->
    <link href="<?= $url ?>assets/img/Logo Smile GoHome.png" rel="icon">
    <link href="<?= $url ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= $url ?>admin/assets-admin/css/styles.css" rel="stylesheet" />

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body class="sb-nav-fixed">

    <!-- sidebar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link active>" href="<?= $url ?>admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="<?= $url ?>admin/kontak-masuk/tampil_kontak.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-lines-fill"></i></div>Kontak Masuk
                        </a>
                        <a class="nav-link" href="<?= $url ?>admin/rumah/tampil_rumah.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-house-check"></i></i></div>Data Rumah
                        </a>
                        <a class="nav-link" href="<?= $url ?>admin/rumah/tambah_rumah.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-house-add"></i></div>Tambah Rumah
                        </a>
                        <a class="nav-link" href="<?= $url ?>admin/booking/tampil_booking.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-journal-plus"></i></div>Booking
                        </a>
                        <a class="nav-link" href="<?= $url ?>admin/pembayaran/tampil_pembayaran.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-credit-card"></i></div>Pembayaran
                        </a>
                        <a class="nav-link" href="<?= $url ?>admin/data-user/tampil_user.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></i></div>Data User
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <a class="max text-white" href="<?= $url ?>config/logout.php">Logout</a><br>
                    <a class="max text-white" href="<?= $url ?>index.php">Halaman Utama</a>
                    <div class="small">Logged in as : </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="<?= $url ?>admin">AdminGoHome</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <div class="position-absolute top-10 end-0" style="margin-right: 1%;">
            <a href="#" class="text-decoration-none text-white">
                <i class="fas fa-user"></i> Halo, admin
            </a>
        </div>
    </nav>
    <!-- end navbar -->