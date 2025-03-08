<?php
$host = 'localhost:3307';
$user = 'root';
$password = '';
$database = 'wad_handson';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>