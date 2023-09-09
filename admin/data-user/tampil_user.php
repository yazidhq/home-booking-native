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

                <h1 class="mb-3"><strong>DATA USER TERDAFTAR</strong></h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Rumah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM user ORDER BY id_user ASC";
                                $hasil = $koneksi->query($sql);
                                ?>
                                <?php foreach ($hasil as $row) : ?>
                                    <?php if ($row['status'] == 'user') : ?>
                                        <tr>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="edit_user.php?id=<?= $row['id_user']; ?>" role="button">Edit</a>
                                                <a class="btn btn-danger  btn-sm" href="proses_user.php?aksi=hapus&id=<?= $row['id_user']; ?>" role="button">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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