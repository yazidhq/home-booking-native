<?php require 'Config/koneksi.php' ?>

<?php
session_start();

if (empty($_SESSION['username'])) {
    header('Location: halamanLogin.php');
}
?>

<?php include 'header.php'; ?>

<?php
$id_booking = $_GET['id'];
$stmt = $koneksi->prepare("SELECT * FROM booking WHERE id_booking = ?");
$stmt->bind_param("i", $id_booking);
$stmt->execute();
$booking = $stmt->get_result()->fetch_assoc();
$stmt->close();

$id_rumah = $booking['id_rumah'];
$stmt = $koneksi->prepare("SELECT * FROM rumah WHERE id_rumah = ?");
$stmt->bind_param("i", $id_rumah);
$stmt->execute();
$rumah = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>

<!-- batal order dan menghapus booking -->
<?php
if (isset($_POST['cancel'])) {
    $id = $booking['id_booking'];
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

<!-- membayar order booking -->
<?php
if (isset($_POST['submit'])) {
    $dir = 'assets/bukti_pembayaran/';
    $tmp_name = $_FILES['bukti_pembayaran']['tmp_name'];
    $temp = explode(".", $_FILES["bukti_pembayaran"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_path = $dir . basename($newfilename);
    $allowedImageType = array("image/gif", "image/jpeg", "image/png");

    if ($_FILES['bukti_pembayaran']["error"] > 0) {
        echo '<script>alert("Terjadi kesalahan saat mengunggah berkas");</script>';
        exit();
    } elseif (!in_array($_FILES['bukti_pembayaran']["type"], $allowedImageType)) {
        echo '<script>alert("Anda hanya dapat mengunggah berkas GIF, JPG, dan PNG");</script>';
        exit();
    } elseif (round($_FILES['bukti_pembayaran']["size"] / 1024) > 4096) {
        echo '<script>alert("PERINGATAN: Ukuran gambar tidak boleh lebih dari 4 MB");</script>';
        exit();
    } else {
        if (move_uploaded_file($tmp_name, $target_path)) {
            $sql = "INSERT INTO `pembayaran`(`id_booking`, `id_user`, `namaatm_pembayaran`, `atasnama_pembayaran`, `norek_pembayaran`, `nominal_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);

            // Ganti "isssdss" menjadi "isssdss" sesuai dengan tipe data parameter dan urutan binding
            $stmt->bind_param(
                "iisssdss",  // i: integer, s: string, d: double
                $_POST['id_booking'],
                $_POST['id_user'],
                $_POST['namaatm_pembayaran'],
                $_POST['atasnama_pembayaran'],
                $_POST['norek_pembayaran'],
                $_POST['nominal_pembayaran'],
                $_POST['tanggal_pembayaran'],
                $newfilename  // String (nama file)
            );
            if ($stmt->execute()) {
                $id = $booking['id_booking'];
                $query = mysqli_query($koneksi, "UPDATE booking SET status_booking = 'pesanan diproses' WHERE id_booking='$id'");

                $query_id_rumah = mysqli_query($koneksi, "SELECT id_rumah FROM booking WHERE id_booking = '$id'");
                $status_rumah = mysqli_fetch_assoc($query_id_rumah);
                $id_rumah = $status_rumah['id_rumah'];
                $update_rumah = mysqli_query($koneksi, "UPDATE rumah SET status_rumah = 'tidak tersedia' WHERE id_rumah = '$id_rumah'");

                header('Location: halamanPesanan.php');
            } else {
                echo '<script>alert("Terjadi kesalahan saat menyimpan data ke database");</script>';
            }
            $stmt->close();
        } else {
            echo '<script>alert("Silakan unggah gambar");</script>';
        }
    }
}

?>

<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
        <div class="card-body py-5 px-md-5">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-5">FORM PEMBAYARAN</h2>
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" id="form3Example4" class="form-control" name="id_booking" value="<?= $booking['id_booking'] ?>" />
                        <input type="hidden" id="form3Example4" class="form-control" name="id_user" value="<?= $_SESSION['id_user'] ?>" />

                        <div class="row">

                            <div class="col-6">
                                <img src="<?= $url ?>assets/gambar_rumah/<?= $rumah['gambar_rumah'] ?>" width="100%" alt="">
                            </div>

                            <div class="col-6">

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example2">Nama Atm</label>
                                            <input type="text" id="form3Example2" class="form-control" name="namaatm_pembayaran" placeholder="example: BCA" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1">Atas Nama</label>
                                            <input type="text" id="form3Example1" class="form-control" name="atasnama_pembayaran" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Nomor Rekening</label>
                                    <input type="number" id="form3Example4" class="form-control" name="norek_pembayaran" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Nominal Harga</label>
                                    <input type="number" id="form3Example4" class="form-control" name="nominal_pembayaran" value="<?= $rumah['harga_rumah'] ?>" readonly />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Tanggal Pembayaran</label>
                                    <input type="date" id="form3Example4" class="form-control" name="tanggal_pembayaran" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Bukti Pembayaran</label>
                                    <input type="file" id="form3Example4" class="form-control" name="bukti_pembayaran" />
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
                                    Buy Now
                                </button>
                                <button type="submit" class="btn btn-warning text-light btn-block mb-4" name="cancel">
                                    Cancel Order
                                </button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->

<?php include 'footer.php'; ?>