<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data lama
$query = "SELECT * FROM portofolio WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $waktu = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $bukti = mysqli_real_escape_string($koneksi, $_POST['bukti']);

    // Update data ke database
    $update = "UPDATE portofolio SET 
                Nama_Kegiatan = '$nama', 
                Waktu = '$waktu', 
                Bukti_Kegiatan = '$bukti' 
              WHERE id = $id";

    if (mysqli_query($koneksi, $update)) {
        header("Location: view.php?status=edit-sukses");
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<h2>Edit Data Portofolio</h2>
<form method="POST" action="">
    <label>Nama Kegiatan:</label><br>
    <input type="text" name="nama" value="<?php echo $data['Nama_Kegiatan']; ?>" required><br>

    <label>Waktu:</label><br>
    <input type="text" name="waktu" value="<?php echo $data['Waktu']; ?>" required><br>

    <label>Bukti Kegiatan (URL gambar):</label><br>
    <input type="text" name="bukti" value="<?php echo $data['Bukti_Kegiatan']; ?>" required><br><br>

    <input type="submit" value="Update">
</form>
