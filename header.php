<?php require 'Config/koneksi.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GoHome</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= $url ?>assets/img/Logo Smile GoHome.png" rel="icon">
    <link href="<?= $url ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= $url ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= $url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= $url ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <!-- Template Main CSS File -->
    <link href="<?= $url ?>assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="<?= $url ?>">Go<span class="color-b">Home</span></a>

            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url ?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="about.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="property-grid.php">Property</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="blog-grid.php">Fasilitas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="contact.php">Contact</a>
                    </li>

                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="halamanPesanan.php">My Booking</a>
                        </li>
                    <?php endif; ?>

                    <?php if (empty($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="halamanLogin.php">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $_SESSION['status'] == 'admin' ? 'admin' : 'profile_user.php' ?>"><span class="color-b">Halo, <?= ucfirst($_SESSION['nama']) ?></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="config/logout.php">Logout</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

        </div>
    </nav><!-- End Header/Navbar -->