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
$sql = "SELECT * FROM rumah WHERE id_rumah = ?";
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
                                        <h2 id="purple"><strong>EDIT DATA RUMAH</strong></h2>
                                        <hr>
                                    </div>

                                    <form action="proses_rumah.php?aksi=edit_rumah&id=<?= $id; ?>" method="post" enctype="multipart/form-data">

                                        <div class="mb-3">
                                            <label class="form-label" for="alamat_rumah">Alamat Rumah</label>
                                            <input class="form-control" type="text" id="alamat_rumah" name="alamat_rumah" value="<?= $hasil['alamat_rumah']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="luas_rumah">Luas Rumah</label>
                                            <input class="form-control" type="text" id="luas_rumah" name="luas_rumah" value="<?= $hasil['luas_rumah']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="kamartidur_rumah">Banyak Kamar Tidur</label>
                                            <input class="form-control" type="number" id="kamartidur_rumah" name="kamartidur_rumah" value="<?= $hasil['kamartidur_rumah']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="kamarmandi_rumah">Banyak Kamar Mandi</label>
                                            <input class="form-control" type="number" id="kamarmandi_rumah" name="kamarmandi_rumah" value="<?= $hasil['kamarmandi_rumah']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="garasi_rumah">Banyak Garasi</label>
                                            <input class="form-control" type="number" id="garasi_rumah" name="garasi_rumah" value="<?= $hasil['garasi_rumah']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="fasilitas_rumah">Fasilitas Rumah [Gunakan koma(,) jika lebih dari 1]</label>
                                            <input class="form-control" type="text" id="fasilitas_rumah" name="fasilitas_rumah" value="<?= $hasil['fasilitas_rumah']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="deskripsi_rumah">Deskripsi Rumah</label>
                                            <textarea class="form-control" type="number" id="deskripsi_rumah" name="deskripsi_rumah"><?= $hasil['deskripsi_rumah']; ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="harga_rumah">Harga Rumah</label>
                                            <input class="form-control" type="number" id="harga_rumah" name="harga_rumah" value="<?= $hasil['harga_rumah']; ?>">
                                        </div>

                                        <!-- gambar -->
                                        <div class="mb-3">
                                            <label class="col-sm-3">Gambar Rumah</label>
                                            <input type="file" accept="image/*" class="form-control col-sm-9" name="gambar_rumah" placeholder="Isi Gambar">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-sm-3">Gambar Saat Ini</label>
                                            <img src="../../assets/gambar_rumah/<?php echo $hasil['gambar_rumah']; ?>" class="img-fluid" style="width:200px;">
                                        </div>
                                        <input type="hidden" value="<?= $hasil['gambar_rumah']; ?>" name="gambar_cek">
                                        <!-- gambar -->

                                        <div class="mb-3">
                                            <label class="col-sm-3">Status Rumah</label>
                                            <select class="form-control col-sm-9" name="status_rumah">
                                                <option hidden value="" selected>Pilih Status</option>
                                                <option <?php if ($hasil['status_rumah'] == 'tersedia') {
                                                            echo 'selected';
                                                        } ?>>tersedia</option>
                                                <option <?php if ($hasil['status_rumah'] == 'tidak tersedia') {
                                                            echo 'selected';
                                                        } ?>>tidak tersedia</option>
                                            </select>
                                        </div>

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