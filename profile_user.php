<?php require 'Config/koneksi.php' ?>

<?php
session_start();

?>

<?php include 'header.php'; ?>

<?php
if (isset($_POST['edit'])) {
    $id = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $sql = "UPDATE user SET nama=?, username=?, password=?, status=? WHERE id_user=?";
    $stmt = $koneksi->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssi", $nama, $username, $password, $status, $id);

        if ($stmt->execute()) {
            echo '<script>alert("Sukses");</script>';
        } else {
            echo '<script>alert("Gagal melakukan pembaruan.");</script>';
        }
        $stmt->close();
    } else {
        echo '<script>alert("Terjadi kesalahan pada query.");</script>';
    }
}
?>

<?php
$id_user = $_SESSION['id_user'];
$stmt = $koneksi->prepare("SELECT * FROM user WHERE id_user = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();
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
                    <h2 class="fw-bold mb-5">Your Data</h2>
                    <form action="" method="post">

                        <input type="hidden" id="form3Example4" class="form-control" name="id_user" value="<?= $_SESSION['id_user'] ?>" />
                        <input type="hidden" id="form3Example4" class="form-control" name="status" value="<?= $_SESSION['status'] ?>" />

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Nama</label>
                            <input type="text" id="form3Example3" class="form-control" name="nama" value="<?= $user['nama'] ?>" />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Username</label>
                            <input type="text" id="form3Example3" class="form-control" name="username" value="<?= $user['username'] ?>" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="text" id="form3Example4" class="form-control" name="password" value="<?= $user['password'] ?>" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4" name="edit">
                            Update Data
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->

<?php include 'footer.php'; ?>