<?php require 'Config/koneksi.php' ?>

<?php
session_start();

if (empty($_SESSION['username'])) {
  header('Location: halamanLogin.php');
}

?>

<?php include 'header.php'; ?>

<?php
$id = $_GET['id'];
if (is_numeric($id)) {
  $stmt = $koneksi->prepare("SELECT * FROM rumah WHERE id_rumah = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $isi = $stmt->get_result()->fetch_assoc();
  $stmt->close();
} else {
  echo '<script>alert("ID tidak valid.");</script>';
  exit;
}
?>

<?php
if (isset($_POST['submit'])) {
  $id_user = $_POST['id_user'];
  $id_rumah = $_POST['id_rumah'];
  $alamat_rumah = $_POST['alamat_rumah'];
  $harga_rumah = $_POST['harga_rumah'];
  $tanggal_booking = $_POST['tanggal_booking'];
  $status_booking = $_POST['status_booking'];

  $insertSql = "INSERT INTO booking (id_user, id_rumah, alamat_rumah, harga_rumah, tanggal_booking, status_booking) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $koneksi->prepare($insertSql);
  $stmt->bind_param("iissss", $id_user, $id_rumah, $alamat_rumah, $harga_rumah, $tanggal_booking, $status_booking);

  if ($stmt->execute()) {
    $deleteSql = "DELETE FROM booking WHERE id_booking IN (SELECT id_booking FROM (SELECT id_booking, ROW_NUMBER() OVER (PARTITION BY id_user ORDER BY id_booking DESC) AS row_num FROM booking) AS temp_table WHERE row_num > 1)";
    $koneksi->query($deleteSql);
    echo '<script>alert("Sukses Booking");</script>';
    $id_booking = $stmt->insert_id; // Ambil ID booking yang baru saja dimasukkan
    $stmt->close();
    header("Location: form_pembayaran.php?id=$id_booking");
    exit;
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
          <h2 class="fw-bold mb-5">FORM BOOKING</h2>
          <form action="" method="post">

            <input type="hidden" id="form3Example4" class="form-control" name="id_user" value="<?= $_SESSION['id_user'] ?>" />
            <input type="hidden" id="form3Example4" class="form-control" name="id_rumah" value="<?= $isi['id_rumah'] ?>" />

            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="form3Example2">Lokasi Rumah</label>
                  <input type="text" id="form3Example2" class="form-control" name="alamat_rumah" value="<?= $isi['alamat_rumah'] ?>" readonly />
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="form3Example1">Harga Rumah</label>
                  <input type="text" id="form3Example1" class="form-control" name="harga_rumah" value="<?= $isi['harga_rumah'] ?>" readonly />
                </div>
              </div>
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Tanggal Booking</label>
              <input type="date" id="form3Example4" class="form-control" name="tanggal_booking" />
            </div>

            <input type="hidden" id="form3Example4" class="form-control" name="status_booking" value="belum bayar" />

            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
              Booking Now
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<?php include 'footer.php'; ?>