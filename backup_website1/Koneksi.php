<?php
// $conn = mysqli_connect('localhost', 'root', '', 'kopi_pesanggrahan');

$server = "localhost";
$username = "root";
$password = "";
$db = "kopi_pesanggrahan";

$conn = mysqli_connect($server, $username, $password, $db) or die("Koneksi Gagal");

?>
