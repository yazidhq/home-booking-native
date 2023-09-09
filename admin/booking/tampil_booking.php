<?php require '../../config/koneksi.php' ?>

<?php
session_start();

// Cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'admin') {
    echo '<script>alert("Anda tidak memiliki akses");window.location.href="../index.php";</script>';
    exit();
}

?>

<?php include '../header.php'; ?>

<main class="mt-4">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">

                <h1 class="mb-3"><strong>DATA BOOKING/ PEMESANAN</strong></h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Rumah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Gambar Rumah</th>
                                    <th>Nama Pemesan</th>
                                    <th>Alamat Rumah</th>
                                    <th>Harga Rumah</th>
                                    <th>Tanggal Booking</th>
                                    <th>Status Booking</th>
                                    <th>Status Pemesanan</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Gambar Rumah</th>
                                    <th>Nama Pemesan</th>
                                    <th>Alamat Rumah</th>
                                    <th>Harga Rumah</th>
                                    <th>Tanggal Booking</th>
                                    <th>Status Booking</th>
                                    <th>Status Pemesanan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM booking ORDER BY id_booking DESC";
                                $hasil = $koneksi->query($sql);

                                while ($row = $hasil->fetch_assoc()) {
                                    $id_user = $row['id_user'];
                                    $sql_user = "SELECT * FROM user WHERE id_user = '$id_user'";
                                    $userResult = $koneksi->query($sql_user);
                                    $user = $userResult->fetch_assoc();
                                    $query = "SELECT booking.id_booking, booking.id_user, booking.id_rumah, booking.alamat_rumah, booking.harga_rumah, booking.tanggal_booking, booking.status_booking, rumah.gambar_rumah FROM booking JOIN rumah ON booking.id_rumah = rumah.id_rumah WHERE booking.id_user = '$id_user'";
                                    $result = $koneksi->query($query);
                                    if ($result) {
                                        $row_rumah = $result->fetch_assoc();
                                ?>
                                        <tr>
                                            <td>
                                                <img src="../../assets/gambar_rumah/<?= $row_rumah['gambar_rumah'] ?>" width="200px" alt="">
                                            </td>
                                            <td><?= $user['nama'] ?></td>
                                            <td><?= $row['alamat_rumah'] ?></td>
                                            <td>Rp. <?= number_format($row['harga_rumah']) ?></td>
                                            <td><?= $row['tanggal_booking'] ?></td>
                                            <td><?= ucfirst($row['status_booking']) ?></td>
                                            <td>
                                                <?php if ($row['status_booking'] == 'pesanan diproses') : ?>
                                                    <div class="d-grid gap-2">
                                                        <a href="terima_booking.php?id=<?= $row['id_booking'] ?>" class="btn btn-success btn-sm">Terima Pesanan</a>
                                                        <a href="tolak_booking.php?id=<?= $row['id_booking'] ?>" class="btn btn-danger btn-sm">Tolak Pesanan</a>
                                                    </div>
                                                <?php elseif ($row['status_booking'] == 'pesanan diterima') : ?>
                                                    <div class="alert alert-success alert-sm" role="alert">
                                                        Pesanan telah diterima
                                                    </div>
                                                <?php elseif ($row['status_booking'] == 'pesanan ditolak') : ?>
                                                    <div class="alert alert-danger alert-sm" role="alert">
                                                        Pesanan telah ditolak
                                                    </div>
                                                <?php else : ?>
                                                    <div class="alert alert-info alert-sm" role="alert">
                                                        Menunggu Pembayaran
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                <?php
                                    } else {
                                        echo "Error: " . $koneksi->error;
                                    }
                                }
                                ?>
                            </tbody>


                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php include '../footer.php' ?>