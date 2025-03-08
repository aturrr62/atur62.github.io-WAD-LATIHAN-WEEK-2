<?php require_once 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peserta</title>
</head>
<body>
    <h2>Daftar Peserta Latihan</h2>
    
    <a href="create.php">Tambah Peserta</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Sekolah</th>
                <th>Jurusan</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM peserta";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id_peserta']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['sekolah']}</td>
                        <td>{$row['jurusan']}</td>
                        <td>{$row['no_hp']}</td>
                        <td>{$row['alamat']}</td>
                        <td>
                            <a href='edit.php?id={$row['id_peserta']}'>Edit</a>
                            <a href='delete.php?id={$row['id_peserta']}' onclick='return confirm(\"Yakin hapus data?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>