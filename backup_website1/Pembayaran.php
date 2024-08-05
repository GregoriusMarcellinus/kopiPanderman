<?php
session_start();
include 'Koneksi.php';
//$id= $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="CSS/Keranjangstyle.css">
</head>

<body>


    <!-- header section strats -->

    <header class="header">
        <div class="logo">
            <a href="#">
                Kopi<span>Nusantara</span>
            </a>
        </div>


        <nav class="navbar">
            <a href="Beranda.php">Beranda</a>
            <a href="#about">Tentang Kami</a>
            <a href="Customer.php">produk</a>
            <a href="#contact">Kontak kami</a>
            <a href="Login.php">Keluar</a>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>

        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </div>

    </header>
    <div class="product-display">
        <table class="product-display-table">
            <h1>Food And Drink You Ordered</h1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menu Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            </thead>
            <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["Keranjang"] as $id => $jumlah) : ?>
                        <!--menampilakan menu yg sedang diperulangkan bedasarkan id-->
                        <?php
                        $ambil = $conn->query("SELECT * FROM tb_produk WHERE id_produk='$id'");
                        $pecah = $ambil->fetch_assoc();
                        $totalprice = $pecah["harga"] * $jumlah;
                        //echo "<pre>";
                        //print_r($pecah);
                        //echo "</pre>";

                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td><?php echo number_format($pecah["harga"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo number_format($totalprice); ?></td>
                        </tr>
                        <?php $totalbelanja += $totalprice;
                         $nm_produk = $pecah["nama_produk"];
                         $hrg = $pecah["harga"];
                         mysqli_query($conn, "INSERT INTO tb_keluar (nama_produk, jumlah, harga_produk, harga_total) VALUES ('$nm_produk', '$jumlah', '$hrg', '$totalprice')");?>
                        <?php $nomor++; ?>
                    <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Grand Total</th>
                    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                </tr>
            </tfoot>
        </table>

    </div>
    <input type="file" name="gambar" required />
    <input type="submit" class="btn btn-primary" name="checkout" id="selanjutnya"></input>
    <a href="Customer.php" class='btn btn-primary'>&nbsp; Kembali</a>
</body>
</html>