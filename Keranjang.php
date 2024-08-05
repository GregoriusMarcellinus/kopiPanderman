<?php
session_start();
include 'Koneksi.php';
//echo "<pre>";
//print_r($_SESSION['keranjang']);
//echo "</pre>";

// mendapatkan id produk url
$id = $_GET['id_produk'];

// jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1
if(isset($_SESSION['Keranjang'][$id]))
{
    $_SESSION['Keranjang'][$id] += 1;
}
// selain itu (belum ada di keranjang), maka produk itu dianggap dibeli 1
else
{
    $_SESSION['Keranjang'][$id] = 1;
}

    if (empty($_SESSION['Keranjang']) OR !isset($_SESSION['Keranjang']))
    {
      echo "<script>alert('Wow Your Order Cart Is Empty. Please Buy Food Or Drink!!!');</script>";
      echo "<script>location='order.php';</script>";
    }

//menuju halaman keranjang
echo "<script>alert('Pesanan Anda Berhasil Ditambahkan');</script>";

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

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


    </header>
    <div class="product-display">
        <table class="product-display-table">
            <h1>Food And Drink You Ordered</h1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php foreach ($_SESSION['Keranjang'] as $id => $jumlah):
                    $ambil = $conn->query("SELECT * FROM tb_produk WHERE id_produk='$id'");
                    $pecah = $ambil->fetch_assoc();
                    $totalprice = $pecah["harga"]*$jumlah;
                    //echo "<pre>";
                   // print_r($pecah);
                   // echo "</pre>";

                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_produk"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($totalprice); ?></td>
                        <td>
                            <a href="Hapuspesanan.php?id_produk=<?php echo $id ?>" class="btn"> <i class="fas fa-trash"></i> Hapus </a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach ?>

            </tbody>
            <tr>
            <th colspan="4">Total</th>
            <?php $totalbelanja+=$totalprice; ?>
            <th>Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>
        </table>
        <div class="landing">
            <a href="Customer.php" class='btn btn-default'>&nbsp; Go To Order</a>
            <a href="Checkout.php?id_produk=<?php echo $id ?>" class='btn btn-primary'>&nbsp; Checkout</a>
        </div>


    </div>

</body>
</html>