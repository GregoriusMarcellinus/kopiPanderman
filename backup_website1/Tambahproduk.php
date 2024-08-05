<?php

include 'Koneksi.php';

if (isset($_POST['add_product'])) {

    $menu_name = $_POST['menu_name'];
    $menu_price = $_POST['menu_price'];
    $menu_stock = $_POST['menu_stock'];
    $menu_deskripsi = $_POST['menu_deskripsi'];
    $menu_image = $_FILES['menu_image']['name'];
    $menu_image_tmp_name = $_FILES['menu_image']['tmp_name'];
    $menu_image_folder = 'IMG/' . $menu_image;

    if (empty($menu_name) || empty($menu_price) ||  empty($menu_stock) || empty($menu_image || empty($menu_deskripsi))) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO tb_produk(nama_produk, harga, stok, deskripsi, gambar) VALUES('$menu_name', '$menu_price', '$menu_stock','$menu_deskripsi', '$menu_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($menu_image_tmp_name, $menu_image_folder);
            $message[] = 'Produk Baru Berhasil Ditambahkan!';
        } else {
            $message[] = 'Produk Tidak dapat Ditambahkan!';
        }
    }
};

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tb_produk WHERE id_produk = $id");
    header('location:Tambahproduk.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjual</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="CSS/Produkstyle.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    

    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<span class="message">' . $message . '</span>';
        }
    }

    ?>

    <div class="admin-product-form-container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Tambahkan Produk</h3>
            <input type="text" placeholder="Masukkan Nama Barang" name="menu_name" class="box">
            <input type="text" placeholder="Masukkan Deskripsi" name="menu_deskripsi" class="box">
            <input type="number" placeholder="Masukkan Harga Barang" name="menu_price" class="box">
            <input type="number" placeholder="Jumlah Stock Barang" name="menu_stock" class="box">
            <input type="file" accept="IMG/png, IMG/jpeg, IMG/jpg" name="menu_image" class="box">
            <input type="submit" class="btn" name="add_product" value="Tambahkan">
        </form>

    </div>

    <?php

    $select = mysqli_query($conn, "SELECT * FROM tb_produk");

    ?>
    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>id menu</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $nomor = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $row['id_produk']; ?></td>
                    <td><?php echo $row['nama_produk']; ?></td>
                    <td>Rp.<?php echo $row['harga']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td><img src="IMG/<?php echo $row['gambar']; ?>" height="100" alt=""></td>
                    <td>
                        <a href="Update.php?edit=<?php echo $row['id_produk']; ?>" class="btn"> <i class="fas fa-edit"></i></a>
                        <a href="Lanjutanproduk.php?delete=<?php echo $row['id_produk']; ?>" class="btn"> <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
        </table>
    </div>
    <div class="landing">
        <a href="Penjual.php"><i class='bx bxs-share'></i>&nbsp; Back</a>

    </div>


</body>

</html>