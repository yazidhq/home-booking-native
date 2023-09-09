<?php

require '../../config/koneksi.php';

$id_booking = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM booking WHERE id_booking = '$id_booking'");

if ($query) {
    header('Location: ../../property-grid.php');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
