<?php
require_once 'koneksi.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM peserta WHERE id_peserta = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $sekolah = mysqli_real_escape_string($conn, $_POST['sekolah']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $update_stmt = $conn->prepare("UPDATE peserta SET nama=?, sekolah=?, jurusan=?, no_hp=?, alamat=? WHERE id_peserta=?");
    $update_stmt->bind_param("sssssi", $nama, $sekolah, $jurusan, $no_hp, $alamat, $id);
    
    if ($update_stmt->execute()) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $update_stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>
</head>
<body>
    <h2>Edit Data Peserta</h2>
    
    <form method="POST">
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br><br>

        <label>Sekolah</label><br>
        <input type="text" name="sekolah" value="<?= $row['sekolah'] ?>" required><br><br>

        <label>Jurusan</label><br>
        <input type="text" name="jurusan" value="<?= $row['jurusan'] ?>" required><br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp" value="<?= $row['no_hp'] ?>" required><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" rows="3" required><?= $row['alamat'] ?></textarea><br><br>

        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>