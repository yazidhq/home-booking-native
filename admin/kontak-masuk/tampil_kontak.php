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

                <h1 class="mb-3"><strong>KONTAK MASUK</strong></h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Rumah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nama Pengirim</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama Pengirim</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM kontak ORDER BY id_kontak DESC";
                                $hasil = $koneksi->query($sql);
                                ?>
                                <?php foreach ($hasil as $row) : ?>
                                    <tr>
                                        <td><?= $row['nama_kontak'] ?></td>
                                        <td><?= $row['email_kontak'] ?></td>
                                        <td><?= $row['pesan_kontak'] ?></td>
                                        <td>
                                            <a href="proses_kontak.php?id=<?= $row['id_kontak'] ?>" class="btn btn-danger btn-sm">Hapus</a>
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