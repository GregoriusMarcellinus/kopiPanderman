<?php
session_start();
$id = $_GET["id_produk"];
unset($_SESSION["Keranjang"] [$id]);

echo "<script>alert('Pesanan Anda Berhasil Dihapus');</script>";
echo "<script>location='Customer.php';</script>";

?>