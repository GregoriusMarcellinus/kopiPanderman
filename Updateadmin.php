<?php

include 'Koneksi.php';

$id = $_GET['edit'];

if (isset($_POST['update_menu'])) {

   $menu_nama = $_POST['menu_nama'];
   $menu_username = $_POST['menu_username'];
   $menu_email = $_POST['menu_email'];
   $menu_telp = $_POST['menu_telp'];
   $menu_alamat = $_POST['menu_alamat'];
   $menu_password = $_POST['menu_password'];

   if (empty($menu_nama) || empty($menu_username) || empty($menu_email) || empty($menu_telp) || empty($menu_alamat) || empty($menu_password)) {
      $message[] = 'please fill out all!';
   } else {

      $update_data = "UPDATE tb_user SET nama='$menu_nama', username='$menu_username', email='$menu_email', telp='$menu_telp', alamat='$menu_alamat', password='$menu_password'  WHERE id_user = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         header('location:Admin.php');
      }
   }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="CSS/Produkstyle.css">
</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }
   ?>

   <div class="container">


      <div class="admin-product-form-container centered">

         <?php

         $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {

         ?>

            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">Update Pengguna</h3>
               <input type="text" class="box" name="menu_nama" value="<?php echo $row['nama']; ?>" placeholder="Masukkan Nama">
               <input type="text" class="box" name="menu_username" value="<?php echo $row['username']; ?>" placeholder="Masukkan Username">
               <input type="text" class="box" name="menu_email" value="<?php echo $row['email']; ?>" placeholder="Masukkan Email">
               <input type="number" min="0" class="box" name="menu_telp" value="<?php echo $row['telp']; ?>" placeholder="Masukkan Nomor Telpon">
               <input type="text" class="box" name="menu_alamat" value="<?php echo $row['alamat']; ?>" placeholder="Masukkan Alamat">
               <input type="text" class="box" name="menu_password" value="<?php echo $row['password']; ?>" placeholder="Masukkan Password">
               <input type="submit" value="update menu" name="update_menu" class="btn">
               <a href="Admin.php" class="btn">Kembali</a>
            </form>



         <?php }; ?>



      </div>

   </div>

</body>

</html>