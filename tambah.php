<?php
include 'koneksi.php';

// Proses simpan data jika tombol submit ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $waktu = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $bukti = mysqli_real_escape_string($koneksi, $_POST['bukti']);

    $query = "INSERT INTO portofolio (Nama_Kegiatan, Waktu, Bukti_Kegiatan) 
              VALUES ('$nama', '$waktu', '$bukti')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: view.php?status=sukses");
    } else {
        header("Location: view.php?status=gagal");
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Portofolio</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        label { font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; margin-bottom: 10px; }
        input[type="submit"] {
            background-color: #0c60c0;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #095a9e;
        }
    </style>
</head>
<body>
    <h2>Tambah Data Portofolio</h2>
    <form method="POST" action="">
        <label>Nama Kegiatan:</label><br>
        <input type="text" name="nama" required><br>

        <label>Waktu:</label><br>
        <input type="text" name="waktu" required><br>

        <label>Bukti Kegiatan:</label><br>
        <input type="text" name="bukti" required><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
