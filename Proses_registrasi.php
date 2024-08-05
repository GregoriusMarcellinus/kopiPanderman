<?php
include 'Koneksi.php';

$nama = $_POST['nama'];
$password = $_POST['pass'];
$telp = $_POST['telp'];
$email = $_POST["email"];
$alamat = $_POST['alamat'];
$user = $_POST['user'];

$cek_user=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user WHERE nama='$user'"));
    if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="Registrasi.php";
              </script>';
              exit();
    }
    else {
        mysqli_query($conn, "INSERT INTO tb_user (nama, username, email, telp, alamat, password) VALUES ('$user','$user','$email', '$telp','$alamat' ,'$password')");
        
        echo '<script language="javascript">
              alert ("Registrasi Berhasil Di Lakukan!");
              window.location="Login.php";
              </script>';
              exit();
    }
?>