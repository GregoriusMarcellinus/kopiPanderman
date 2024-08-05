<?php
require 'Koneksi.php';
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "INSERT INTO tb_user (nama, telp, email, alamat, username, password) 
            VALUES ('$nama', '$telp', '$email', '$alamat', '$username', '$password')";

    if (mysqli_query($conn, $query_sql)){
        header("Location:Registrasi.php");
    } else {
        echo "Registrasi Gagal : " . mysqli_error($conn);
    }