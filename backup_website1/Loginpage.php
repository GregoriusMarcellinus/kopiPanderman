<?php
include "login.php";
$user=$_POST['username'];
$pass=$_POST['password'];

//echo $user, $pass;

$sql=mysqli_query($koneksi, "Select * from admin where username = '$user' and password = '$pass'" );

$cek=mysqli_num_rows($sql);

if ($cek >0){
    $_SESSION['log'] == 'Admin';
    header ('Location : Beranda/websitekopi.php');
} else {
    header ('location:Login.php');
}
?>


