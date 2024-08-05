<?php

include 'Koneksi.php';

$id = $_GET['edit'];

if (isset($_POST['update_menu'])) {

   $menu_status = $_POST['menu_status'];

   if (empty($menu_status)) {
      $message[] = 'please fill out all!';
   } else {

      $update_data = "UPDATE tb_keluar SET status='$menu_status' WHERE id_produk = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         header('location:Riwayat.php');
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

         $select = mysqli_query($conn, "SELECT * FROM tb_keluar WHERE id_produk = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {

         ?>

            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">Konfirmasi Status</h3>
               <input class="box" value="<?php echo $row['id_produk']; ?>" placeholder="ID Produk">
               <input class="box" value="<?php echo $row['nama_produk']; ?>" placeholder="Nama Produk">
               <input class="box" value="<?php echo $row['waktu_penjualan']; ?>" placeholder="Waktu">
               <input class="box" value="<?php echo $row['jumlah']; ?>" placeholder="Jumlah">
               <input class="box" value="<?php echo $row['harga_produk']; ?>" placeholder="Harga Produk">
               <input class="box" value="<?php echo $row['harga_total']; ?>" placeholder="Harga Total">
               <input type="text" class="box" name="menu_status" value="<?php echo $row['status']; ?>" placeholder="Status">
               <input type="submit" value="update menu" name="update_menu" class="btn">
               <a href="Penjual.php" class="btn">Kembali</a>
            </form>



         <?php }; ?>



      </div>

   </div>

</body>

</html>