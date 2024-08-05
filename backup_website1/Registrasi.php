<?php
include 'Koneksi.php';

// if (isset ($_POST["register"])){
//     if (registrasi($_POST) > 0 ){
//         echo "<script>
//         alert ('User Baru Berhasil Ditambahkan!');
//             </script>";
//     } else {
//         echo mysqli_error($conn);
//     }
// }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Kalam:wght@300&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>
        Login
    </title>
</head>

<body>
    <div class="container">
        <div class="signin">
            <form action="Proses_registrasi.php" method="POST">
                <h1>Registrasi</h1>
                <hr>
                <p>Selamat Datang di Website Kopi Nusantara</p>
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Anda" /><br><br>
                <label for="">Telepon</label>
                <input type="text" name="telp" placeholder="Telepon Anda" /><br><br>
                <label for="">Email Anda</label>
                <input type="text" name="email" placeholder="Email Anda" /><br><br>
                <label for="">Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat Anda" /><br><br>
                <label for="">Username</label>
                <input type="text" name="user" placeholder="Username" /><br><br>
                <label for="">Password</label>
                <input type="password" name="pass" placeholder="Password" /><br><br>
                
                <input type="submit" name="register"></input>
                <a href="Login.php">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>