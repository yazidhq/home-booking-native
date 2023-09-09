<?php require '../../config/koneksi.php' ?>

<?php
session_start();

// Cek apakah yang mengakses halaman ini sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'admin') {
    echo '<script>alert("Anda tidak memiliki akses");window.location.href="../index.php";</script>';
    exit();
}

?>

<?php
$id = $_GET['id'];
$id = intval($id);
$sql = "SELECT * FROM user WHERE id_user = ?";
$row = $koneksi->prepare($sql);
$row->bind_param("i", $id);
$row->execute();
$result = $row->get_result();
$hasil = $result->fetch_assoc();
$row->close();
?>

<?php include '../header.php'; ?>

<main class="mb-5">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <section class="clean-block clean-form">
                <div class="container py-3 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-12 col-xl-12">
                            <div class="card p-3">

                                <div class="container-fluid mt-4 px-4">

                                    <div class="block-heading">
                                        <h2 id="purple"><strong>EDIT DATA USER</strong></h2>
                                        <hr>
                                    </div>

                                    <form action="proses_user.php?aksi=edit_user&id=<?= $id; ?>" method="post">

                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama User</label>
                                            <input class="form-control" type="text" id="nama" name="nama" value="<?= $hasil['nama']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control" type="text" id="username" name="username" value="<?= $hasil['username']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control" type="text" id="password" name="password" value="<?= $hasil['password']; ?>">
                                        </div>

                                        <input class="form-control" type="hidden" id="status" name="status" value="<?= $hasil['status']; ?>">

                                        <button class="btn btn-dark" role="button" type="submit">
                                            Simpan Perubahan
                                        </button>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<?php include '../footer.php' ?>