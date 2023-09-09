<?php

require '../../config/koneksi.php';

// edit user
if ($_GET['aksi'] == 'edit_user') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $sql = "UPDATE user SET nama=?, username=?, password=?, status=? WHERE id_user=?";
        $row = $koneksi->prepare($sql);
        $row->bind_param("ssssi", $nama, $username, $password, $status, $id);
        if ($row->execute()) {
            echo '<script>alert("Sukses");window.location="tampil_user.php"</script>';
        } else {
            echo '<script>alert("Gagal melakukan pembaruan.");</script>';
        }
        $row->close();
    } else {
        echo '<script>alert("ID tidak valid.");window.location="tampil_user.php"</script>';
    }
}

// hapus user
if (!empty($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id_user = ?";
    $row = $koneksi->prepare($sql);
    $row->bind_param("i", $id);
    $row->execute();
    if ($row->affected_rows > 0) {
        echo '<script>alert("Sukses hapus");window.location="tampil_user.php"</script>';
    } else {
        echo '<script>alert("Gagal menghapus data");window.location="tampil_user.php"</script>';
    }
    $row->close();
}
