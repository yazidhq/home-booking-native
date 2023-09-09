<?php require 'Config/koneksi.php' ?>

<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: halamanLogin.php');
}
?>

<?php
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM booking WHERE id_user = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id_user);
if ($stmt->execute()) {
    $hasil = $stmt->get_result()->fetch_assoc();
} else {
    echo '<script>alert("Terjadi kesalahan dalam mengambil data.");</script>';
}
$stmt->close();
?>

<?php
$id_rumah = $hasil['id_rumah'];
$sqlrumah = "SELECT * FROM rumah WHERE id_rumah = ?";
$stmt = $koneksi->prepare($sqlrumah);
$stmt->bind_param("i", $id_rumah);
if ($stmt->execute()) {
    $rumah = $stmt->get_result()->fetch_assoc();
} else {
    echo '<script>alert("Terjadi kesalahan dalam mengambil data.");</script>';
}
$stmt->close();
?>

<?php
if (isset($_POST['cancel'])) {
    $id = $hasil['id_booking'];
    $sql = "DELETE FROM booking WHERE id_booking = ?";
    $row = $koneksi->prepare($sql);
    $row->bind_param("i", $id);
    $row->execute();
    if ($row->affected_rows > 0) {
        echo '<script>alert("Sukses Cancel");window.location="index.php"</script>';
    } else {
        echo '<script>alert("Gagal Mengcancel");window.location="index.php"</script>';
    }
    $row->close();
}
?>

<?php include 'header.php'; ?>

<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">My Booking</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                My Booking
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <?php if (!empty($hasil['id_booking'])) : ?>
        <!-- ======= Property Single ======= -->
        <section class="property-single nav-arrow-b">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row justify-content-between">
                            <div class="col-md-5">
                                <img src="assets/gambar_rumah/<?= $rumah['gambar_rumah'] ?>" width="100%" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="property-price d-flex justify-content-center foo">
                                    <div class="card-header-c d-flex">
                                        <div class="card-box-ico">
                                            <span class="bi bi-cash"> Rp. </span>
                                        </div>
                                        <div class="card-title-c align-self-center">
                                            <h5 class="title-c"><?= number_format($rumah['harga_rumah']) ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <!-- Booking Button -->
                                <?php if ($hasil['status_booking'] == 'belum bayar') : ?>
                                    <div class="d-grid gap-2 text-center">
                                        <?php
                                        $id = $hasil['id_booking'];
                                        $query_status_rumah = mysqli_prepare($koneksi, "SELECT r.status_rumah FROM rumah r INNER JOIN booking b ON r.id_rumah = b.id_rumah WHERE b.id_booking = ?");
                                        mysqli_stmt_bind_param($query_status_rumah, "s", $id);
                                        mysqli_stmt_execute($query_status_rumah);
                                        mysqli_stmt_bind_result($query_status_rumah, $status_rumah);
                                        mysqli_stmt_fetch($query_status_rumah);
                                        $status_rumah_result = $status_rumah;
                                        ?>
                                        <?php if ($status_rumah_result == 'tersedia') : ?>
                                            <a href="form_pembayaran.php?id=<?= $hasil['id_booking'] ?>" class="btn btn-primary btn-booking">Pay Now</a>
                                        <?php else : ?>
                                            Sudah ada yang membayar rumah ini
                                        <?php endif; ?>
                                        <form action="" method="post">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger btn-booking" name="cancel">Remove Order</button>
                                            </div>
                                            <button style="visibility: hidden;"></button>
                                        </form>
                                    </div>
                                <?php elseif ($hasil['status_booking'] == 'pesanan diproses') : ?>
                                    <div class="d-grid gap-2 text-center">
                                        Pesanan anda sedang dalam pengecekan
                                        <a href="<?= $url ?>admin/booking/hapus_pesanan.php?id=<?= $hasil['id_booking'] ?>" class="btn btn-warning btn-booking">Batalkan pemesanan dan order kembali</a>
                                        <button style="visibility: hidden;"></button>
                                    </div>
                                <?php elseif ($hasil['status_booking'] == 'pesanan diterima') : ?>
                                    <div class="d-grid gap-2 text-center">
                                        Terimakasih, pesanan anda telah diterima
                                        <a href="<?= $url ?>admin/booking/hapus_pesanan.php?id=<?= $hasil['id_booking'] ?>" class="btn btn-warning btn-booking">Selesaikan Pesanan dan order kembali</a>
                                        <button style="visibility: hidden;"></button>
                                    </div>
                                <?php elseif ($hasil['status_booking'] == 'pesanan ditolak') : ?>
                                    <div class="d-grid gap-2 text-center">
                                        Maaf, pesanan anda kami tolak
                                        <a href="<?= $url ?>admin/booking/hapus_pesanan.php?id=<?= $hasil['id_booking'] ?>" class="btn btn-danger btn-booking">Hapus pesanan dan order kembali</a>
                                        <button style="visibility: hidden;"></button>
                                    </div>
                                <?php endif; ?>

                                <!-- Property Single -->
                                <div class="property-summary" style="margin-top: -5%;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d section-t4">
                                                <h3 class="title-d">Detail Property Rumah</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-list" style="margin-top: -5%;">
                                        <ul class="list">
                                            <li class="d-flex justify-content-between">
                                                <strong>Luas:</strong>
                                                <span><?= $rumah['luas_rumah'] ?>m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Kamar Tidur:</strong>
                                                <span><?= $rumah['kamartidur_rumah'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Kamar Mandi:</strong>
                                                <span><?= $rumah['kamarmandi_rumah'] ?></span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Garasi:</strong>
                                                <span><?= $rumah['garasi_rumah'] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="container">
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-12 section-md-t3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d text-center">
                                                <h3><strong>Deskripsi Rumah</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-description text-center">
                                        <p class="description color-text-a"><?= $rumah['deskripsi_rumah'] ?></p>
                                    </div>
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d text-center">
                                                <h3><strong>Fasilitas</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="amenities-list color-text-a text-center">
                                        <p><?= $rumah['fasilitas_rumah'] ?></p>
                                    </div>
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d text-center">
                                                <h3><strong>Alamat Rumah</strong></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="amenities-list color-text-a text-center">
                                        <p><?= $rumah['alamat_rumah'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <h1 class="text-center">Tidak ada pesanan</h1>
    <?php endif; ?>

</main><!-- End #main -->

<?php include 'footer.php'; ?>