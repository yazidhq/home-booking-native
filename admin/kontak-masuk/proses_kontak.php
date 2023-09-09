<?php
require '../../config/koneksi.php';

$id_hapus = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kontak WHERE id_kontak = '$id_hapus'");
header('Location: tampil_kontak.php');
