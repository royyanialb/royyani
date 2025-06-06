<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk menghapus data dari portofolio
    $query = "DELETE FROM portofolio WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke view.php jika berhasil
        header("Location: view.php?status=sukses");
    } else {
        // Redirect jika gagal
        header("Location: view.php?status=gagal");
    }
} else {
    // Redirect jika tidak ada ID dikirim
    header("Location: view.php");
}
?>
