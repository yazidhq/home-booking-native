<?php require '../config/koneksi.php' ?>

<?php
session_start();

// Cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'admin') {
    echo '<script>alert("Anda tidak memiliki akses");window.location.href="../index.php";</script>';
    exit();
}


?>

<?php include 'header.php'; ?>

<!-- konten -->
<main class="mb-4">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid px-4">
                <div class="row mt-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4 rounded-0">
                            <div class="card-header">Data Rumah</div>
                            <div class="card-body text-center h1">
                                <i class="fas fa-chart-area"></i>
                                <?php
                                $query = "SELECT COUNT(*) as total FROM rumah";
                                $result = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($result);
                                $rec = $row['total'];
                                ?>
                                <strong><?= $rec ?></strong>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="rumah/tampil_rumah.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4 rounded-0">
                            <div class="card-header">Data User</div>
                            <div class="card-body text-center h1">
                                <i class="fas fa-book-open"></i>
                                <?php
                                $query = "SELECT COUNT(*) as total FROM user WHERE status = 'user'";
                                $result = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($result);
                                $rec = $row['total'];
                                ?>
                                <strong><?= $rec ?></strong>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="data-user/tampil_user.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4 rounded-0">
                            <div class="card-header">Data Booking</div>
                            <div class="card-body text-center h1">
                                <i class="fas fa-user"></i>
                                <?php
                                $query = "SELECT COUNT(*) as total FROM booking";
                                $result = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($result);
                                $rec = $row['total'];
                                ?>
                                <strong><?= $rec ?></strong>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="booking/tampil_booking.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4 rounded-0">
                            <div class="card-header">Data Pembayaran</div>
                            <div class="card-body text-center h1">
                                <i class="fas fa-table"></i>
                                <?php
                                $query = "SELECT COUNT(*) as total FROM booking";
                                $result = mysqli_query($koneksi, $query);
                                $row = mysqli_fetch_assoc($result);
                                $rec = $row['total'];
                                ?>
                                <strong><?= $rec ?></strong>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="pembayaran/tampil_pembayaran.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <th>Alamat Rumah</th>
                                    <th>Luas Rumah</th>
                                    <th>Banyak Kamar Tidur</th>
                                    <th>Banyak Kamar Mandi</th>
                                    <th>Banyak Garasi</th>
                                    <th>Fasilitas Rumah</th>
                                    <th>Deskripsi Rumah</th>
                                    <th>Harga Rumah</th>
                                    <th>Status Rumah</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Gambar Rumah</th>
                                    <th>Alamat Rumah</th>
                                    <th>Luas Rumah</th>
                                    <th>Banyak Kamar Tidur</th>
                                    <th>Banyak Kamar Mandi</th>
                                    <th>Banyak Garasi</th>
                                    <th>Fasilitas Rumah</th>
                                    <th>Deskripsi Rumah</th>
                                    <th>Harga Rumah</th>
                                    <th>Status Rumah</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM rumah ORDER BY id_rumah ASC";
                                $hasil = $koneksi->query($sql);
                                ?>
                                <?php foreach ($hasil as $row) : ?>
                                    <tr>
                                        <td>
                                            <img src="../assets/gambar_rumah/<?= $row['gambar_rumah']; ?>" class="img-fluid" style="width:150px;">
                                        </td>
                                        <td><?= $row['alamat_rumah']; ?></td>
                                        <td><?= $row['luas_rumah']; ?></td>
                                        <td><?= $row['kamartidur_rumah']; ?></td>
                                        <td><?= $row['kamarmandi_rumah']; ?></td>
                                        <td><?= $row['garasi_rumah']; ?></td>
                                        <td><?= $row['fasilitas_rumah']; ?></td>
                                        <td><?= $row['deskripsi_rumah']; ?></td>
                                        <td><?= $row['harga_rumah']; ?></td>
                                        <td><?= $row['status_rumah']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- konten -->

<?php include 'footer.php' ?>