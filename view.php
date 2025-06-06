<?php
// Panggil file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tabel portofolio
$query = "SELECT * FROM portofolio";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {

    // Tombol Tambah
    echo "<a href='tambah.php' style='background-color:blue; color:white; padding:8px 16px; text-decoration:none; border-radius:5px;'>Tambah</a><br><br>";

    // Tabel Data
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>No</th><th>Nama Kegiatan</th><th>Waktu</th><th>Bukti Kegiatan</th><th>Aksi</th></tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['Nama_Kegiatan'] . "</td>";
        echo "<td>" . $row['Waktu'] . "</td>";
        echo "<td><img src='" . $row['Bukti_Kegiatan'] . "' width='100'></td>";
        echo "<td>
                <a href='edit.php?id=" . $row['id'] . "' style='color:green;'>Edit</a> |
                <a href='hapus.php?id=" . $row['id'] . "' style='color:red;' onclick=\"return confirm('Yakin mau hapus?');\">Hapus</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data portofolio.";
}
?>
