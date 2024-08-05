<?php
include 'Koneksi.php';

$nama = $_POST['nama_produk'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST["total"];

        mysqli_query($conn, "INSERT INTO tb_keluar (nama_produk, jumlah, harga_produk, harga_total) VALUES ('$nama','$jumlah', '$harga', '$total')");      
        // echo '<script language="javascript">
        //       alert ("Registrasi Berhasil Di Lakukan!");
        //       window.location="Login.php";
        //       </script>';
        //       exit();


?>