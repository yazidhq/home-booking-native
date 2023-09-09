<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

  $data = mysqli_fetch_assoc($login);

  // cek jika user login sebagai admin
  if ($data['status'] == "admin") {

    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['status'] = "admin";
    // alihkan ke halaman dashboard admin
    header("location: ../admin");

    // cek jika user login sebagai pegawai
  } else if ($data['status'] == "user") {
    // buat session login dan username
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $data['password'];
    $_SESSION['status'] = "user";
    // alihkan ke halaman dashboard orang biasa
    header("location: ../index.php");
    exit;
  } else {

    // alihkan ke halaman login kembali
    header('Location: halamanLogin.php');
  }
} else {
  header('Location: halamanLogin.php');
}
