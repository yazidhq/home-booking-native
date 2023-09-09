<?php

require '../../config/koneksi.php';

$id_booking = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * from booking where id_booking = '$id_booking'");
$check = mysqli_fetch_assoc($query);
if ($check['status_booking'] == 'pesanan diproses') {
    $id_booking = $check['id_booking'];

    $query = mysqli_query($koneksi, "UPDATE booking SET status_booking = 'pesanan diterima' WHERE id_booking = '$id_booking'");

    if ($query) {
        $query_id_rumah = mysqli_query($koneksi, "SELECT id_rumah FROM booking WHERE id_booking = '$id_booking'");
        $status_rumah = mysqli_fetch_assoc($query_id_rumah);
        $id_rumah = $status_rumah['id_rumah'];
        $update_rumah = mysqli_query($koneksi, "UPDATE rumah SET status_rumah = 'tidak tersedia' WHERE id_rumah = '$id_rumah'");

        header('Location: tampil_booking.php');
        if (!$update_rumah) {
            echo "Error updating rumah status: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error updating booking status: " . mysqli_error($koneksi);
    }
}
