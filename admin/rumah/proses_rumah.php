<?php

require '../../config/koneksi.php';

// tambah rumah
if ($_GET['aksi'] == 'tambah_rumah') {
    $dir = '../../assets/gambar_rumah/';
    $tmp_name = $_FILES['gambar_rumah']['tmp_name'];
    $temp = explode(".", $_FILES["gambar_rumah"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $target_path = $dir . basename($newfilename);
    $allowedImageType = array("image/gif", "image/jpeg", "image/png");  // Menghapus tipe gambar "image/JPG" yang salah
    if ($_FILES['gambar_rumah']["error"] > 0) {
        echo '<script>alert("Terjadi kesalahan saat mengunggah berkas");</script>';
        exit();
    } elseif (!in_array($_FILES['gambar_rumah']["type"], $allowedImageType)) {
        echo '<script>alert("Anda hanya dapat mengunggah berkas GIF, JPG, dan PNG");window.location="tambah_rumah.php"</script>';
        exit();
    } elseif (round($_FILES['gambar_rumah']["size"] / 1024) > 4096) {
        echo '<script>alert("PERINGATAN: Ukuran gambar tidak boleh lebih dari 4 MB");window.location="tambah_rumah.php"</script>';
        exit();
    } else {
        if (move_uploaded_file($tmp_name, $target_path)) {
            $sql = "INSERT INTO `rumah`(`alamat_rumah`, `luas_rumah`, `kamartidur_rumah`, `kamarmandi_rumah`, `garasi_rumah`, `fasilitas_rumah`, `deskripsi_rumah`, `harga_rumah`, `gambar_rumah`, `status_rumah`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param(
                "ssssssssss",
                $_POST['alamat_rumah'],
                $_POST['luas_rumah'],
                $_POST['kamartidur_rumah'],
                $_POST['kamarmandi_rumah'],
                $_POST['garasi_rumah'],
                $_POST['fasilitas_rumah'],
                $_POST['deskripsi_rumah'],
                $_POST['harga_rumah'],
                $newfilename,
                $_POST['status_rumah']
            );
            if ($stmt->execute()) {
                echo '<script>alert("Sukses");window.location="tampil_rumah.php"</script>';
            } else {
                echo '<script>alert("Terjadi kesalahan saat menyimpan data ke database");window.location="tampil_rumah.php"</script>';
            }
        } else {
            echo '<script>alert("Silakan unggah gambar");window.location="tampil_rumah.php"</script>';
        }
    }
}

// edit rumah
if ($_GET['aksi'] == 'edit_rumah') {
    $dir = '../../assets/gambar_rumah/';
    if (
        isset($_POST['alamat_rumah']) && isset($_POST['luas_rumah']) && isset($_POST['kamartidur_rumah']) &&
        isset($_POST['kamarmandi_rumah']) && isset($_POST['garasi_rumah']) && isset($_POST['fasilitas_rumah']) &&
        isset($_POST['deskripsi_rumah']) && isset($_POST['harga_rumah']) && isset($_POST['status_rumah'])
    ) {
        $alamat_rumah = $_POST['alamat_rumah'];
        $luas_rumah = $_POST['luas_rumah'];
        $kamartidur_rumah = $_POST['kamartidur_rumah'];
        $kamarmandi_rumah = $_POST['kamarmandi_rumah'];
        $garasi_rumah = $_POST['garasi_rumah'];
        $fasilitas_rumah = $_POST['fasilitas_rumah'];
        $deskripsi_rumah = $_POST['deskripsi_rumah'];
        $harga_rumah = $_POST['harga_rumah'];
        $status_rumah = $_POST['status_rumah'];
        $id = $_GET['id'];
        $gambar = $_POST['gambar_cek'];
        if ($_FILES['gambar_rumah']['size'] > 0) {
            $tmp_name = $_FILES['gambar_rumah']['tmp_name'];
            $temp = explode(".", $_FILES["gambar_rumah"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_path = $dir . basename($newfilename);
            $allowedImageType = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");
            if ($_FILES['gambar_rumah']['error'] > 0) {
                echo '<script>alert("Error file");</script>';
                exit();
            } elseif (!in_array($_FILES['gambar_rumah']['type'], $allowedImageType)) {
                echo '<script>alert("You can only upload JPG, PNG and GIF file");</script>';
                exit();
            } elseif (round($_FILES['gambar_rumah']['size'] / 1024) > 4096) {
                echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");</script>';
                exit();
            } else {
                if (move_uploaded_file($tmp_name, $target_path)) {
                    if (file_exists($dir . $gambar)) {
                        unlink($dir . $gambar);
                    }
                    $gambar = $newfilename;
                } else {
                    echo '<script>alert("Error file");</script>';
                    exit();
                }
            }
        }
        $sql = "UPDATE rumah SET alamat_rumah=?, luas_rumah=?, kamartidur_rumah=?, kamarmandi_rumah=?, garasi_rumah=?, fasilitas_rumah=?, deskripsi_rumah=?, harga_rumah=?, gambar_rumah=?, status_rumah=?
            WHERE id_rumah=?";
        $row = $koneksi->prepare($sql);
        $row->bind_param(
            "ssssssssssi",
            $alamat_rumah,
            $luas_rumah,
            $kamartidur_rumah,
            $kamarmandi_rumah,
            $garasi_rumah,
            $fasilitas_rumah,
            $deskripsi_rumah,
            $harga_rumah,
            $gambar,
            $status_rumah,
            $id
        );
        $row->execute();
        if ($row->affected_rows > 0) {
            echo '<script>alert("Sukses");window.location="tampil_rumah.php"</script>';
        } else {
            echo '<script>alert("Gagal mengupdate data");</script>';
        }
        $row->close();
    } else {
        echo '<script>alert("Harap isi semua field");</script>';
    }
}

// hapus rumah
if (!empty($_GET['aksi']) && $_GET['aksi'] == 'hapus' && !empty($_GET['id']) && !empty($_GET['gambar'])) {
    $id = $_GET['id'];
    $gambar = $_GET['gambar'];
    $dir = '../../assets/gambar_rumah/';
    $id = intval($id);
    if (file_exists($dir . $gambar)) {
        unlink($dir . $gambar);
    }
    $sql = "DELETE FROM rumah WHERE id_rumah = ?";
    $row = $koneksi->prepare($sql);
    $row->bind_param("i", $id);
    $row->execute();
    if ($row->affected_rows > 0) {
        echo '<script>alert("Sukses hapus");window.location="tampil_rumah.php"</script>';
    } else {
        echo '<script>alert("Gagal menghapus data");window.location="tampil_rumah.php"</script>';
    }
    $row->close();
}
