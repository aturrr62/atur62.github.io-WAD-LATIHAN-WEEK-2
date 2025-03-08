<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $sekolah = mysqli_real_escape_string($conn, $_POST['sekolah']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $stmt = $conn->prepare("INSERT INTO peserta (nama, sekolah, jurusan, no_hp, alamat) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $sekolah, $jurusan, $no_hp, $alamat);
    
    if ($stmt->execute()) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peserta</title>
</head>
<body>
    <h2>Tambah Peserta Baru</h2>
    
    <form method="POST">
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Sekolah</label><br>
        <input type="text" name="sekolah" required><br><br>

        <label>Jurusan</label><br>
        <input type="text" name="jurusan" required><br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp" placeholder="Contoh: 081234567890" required><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" rows="3" required></textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>