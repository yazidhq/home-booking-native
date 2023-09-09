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

                <h1 class="mb-3"><strong>DATA BUKTI PEMBAYARAN</strong></h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Rumah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <th>Nama ATM</th>
                                    <th>Atas Nama</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nominal</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <th>Nama ATM</th>
                                    <th>Atas Nama</th>
                                    <th>Nomor Rekening</th>
                                    <th>Nominal</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC";
                                $hasil = $koneksi->query($sql);

                                while ($row = $hasil->fetch_assoc()) {
                                    $id_user = $row['id_user'];
                                    $sqlUser = "SELECT * FROM user WHERE id_user = '$id_user'";
                                    $userResult = $koneksi->query($sqlUser);
                                    $user = $userResult->fetch_assoc();
                                ?>
                                    <tr>
                                        <td><?= $user['nama'] ?></td>
                                        <td><?= $row['namaatm_pembayaran'] ?></td>
                                        <td><?= $row['atasnama_pembayaran'] ?></td>
                                        <td><?= $row['norek_pembayaran'] ?></td>
                                        <td>Rp. <?= number_format($row['nominal_pembayaran']) ?></td>
                                        <td><?= $row['tanggal_pembayaran'] ?></td>
                                        <td>
                                            <img src="../../assets/bukti_pembayaran/<?= $row['bukti_pembayaran'] ?>" width="150px" alt="">
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php include '../footer.php' ?>