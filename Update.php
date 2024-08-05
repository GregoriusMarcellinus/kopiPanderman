<?php

include 'Koneksi.php';

$id = $_GET['edit'];

if (isset($_POST['update_menu'])) {

   $menu_name = $_POST['menu_name'];
   $menu_price = $_POST['menu_price'];
   $menu_stock = $_POST['menu_stock'];
   $menu_deskripsi = $_POST['menu_deskripsi'];
   $menu_image = $_FILES['menu_image']['name'];
   $menu_image_tmp_name = $_FILES['menu_image']['tmp_name'];
   $menu_image_folder = 'IMG/' . $menu_image;

   if (empty($menu_name) || empty($menu_price) || empty($menu_stock) || empty($menu_image || empty($menu_deskripsi))) {
      $message[] = 'please fill out all!';
   } else {

      $update_data = "UPDATE tb_produk SET nama_produk='$menu_name', harga='$menu_price', stok='$menu_stock', gambar='$menu_image', deskripsi='$menu_deskripsi'  WHERE id_produk = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         move_uploaded_file($menu_image_tmp_name, $menu_image_folder);
         header('location:Tambahproduk.php');
      } else {
         $$message[] = 'please fill out all!';
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

         $select = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id_produk = '$id'");
         while ($row = mysqli_fetch_assoc($select)) {

         ?>

            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">Update Produk</h3>
               <input type="text" class="box" name="menu_name" value="<?php echo $row['nama_produk']; ?>" placeholder="Masukkan Nama Produk">
               <input type="text" class="box" name="menu_deskripsi" value="<?php echo $row['deskripsi']; ?>" placeholder="Masukkan Deskripsi Produk">
               <input type="number" min="0" class="box" name="menu_price" value="<?php echo $row['harga']; ?>" placeholder="Masukkan Harga Produk">
               <input type="number" min="0" class="box" name="menu_stock" value="<?php echo $row['stok']; ?>" placeholder="Masukkan Stok Produk">
               <input type="file" class="box" name="menu_image" accept="IMG/png, IMG/jpeg, IMG/jpg">
               <input type="submit" value="update menu" name="update_menu" class="btn">
               <a href="Tambahproduk.php" class="btn">Kembali</a>
            </form>



         <?php }; ?>



      </div>

   </div>

</body>

</html>