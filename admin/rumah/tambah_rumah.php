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
                                        <h2 id="purple"><strong>TAMBAH DATA RUMAH</strong></h2>
                                        <hr>
                                    </div>

                                    <form action="proses_rumah.php?aksi=tambah_rumah" method="post" enctype="multipart/form-data">

                                        <div class="mb-3">
                                            <label class="form-label" for="alamat_rumah">Alamat Rumah</label>
                                            <input class="form-control" type="text" id="alamat_rumah" name="alamat_rumah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="luas_rumah">Luas Rumah</label>
                                            <input class="form-control" type="number" id="luas_rumah" name="luas_rumah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="kamartidur_rumah">Banyak Kamar Tidur</label>
                                            <input class="form-control" type="number" id="kamartidur_rumah" name="kamartidur_rumah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="kamarmandi_rumah">Banyak Kamar Mandi</label>
                                            <input class="form-control" type="number" id="kamarmandi_rumah" name="kamarmandi_rumah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="garasi_rumah">Banyak Garasi</label>
                                            <input class="form-control" type="number" id="garasi_rumah" name="garasi_rumah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="fasilitas_rumah">Fasilitas Rumah [Gunakan koma(,) jika lebih dari 1]</label>
                                            <input class="form-control" type="text" id="fasilitas_rumah" name="fasilitas_rumah" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="deskripsi_rumah">Deskripsi Rumah</label>
                                            <textarea class="form-control" type="number" id="deskripsi_rumah" name="deskripsi_rumah" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="harga_rumah">Harga Rumah</label>
                                            <input class="form-control" type="number" id="harga_rumah" name="harga_rumah" required>
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="mb-3">
                                            <label class="form-label" for="gambar_rumah">Gambar Rumah</label>
                                            <input class="form-control" type="file" id="gambar_rumah" name="gambar_rumah">
                                        </div>
                                        <!-- Image -->

                                        <input class="form-control" type="hidden" id="status_rumah" name="status_rumah" value="tersedia">

                                        <button class="btn btn-dark" role="button" type="submit">
                                            Simpan
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