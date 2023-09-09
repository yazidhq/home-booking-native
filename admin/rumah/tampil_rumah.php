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

                <h1 class="mb-3"><strong>DATA RUMAH TERSEDIA</strong></h1>

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
                                    <th>Aksi</th>
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
                                    <th>Aksi</th>
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
                                            <img src="../../assets/gambar_rumah/<?= $row['gambar_rumah']; ?>" class="img-fluid" style="width:150px;">
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
                                        <td>
                                            <div class="d-grid gap-2">
                                                <a class="btn btn-primary btn-sm" href="edit_rumah.php?id=<?= $row['id_rumah']; ?>" role="button">Edit</a>
                                                <a class="btn btn-danger  btn-sm" href="proses_rumah.php?aksi=hapus&id=<?= $row['id_rumah']; ?>&gambar=<?= $row['gambar_rumah']; ?>" role="button">Hapus</a>
                                            </div>
                                        </td>
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

<?php include '../footer.php' ?>