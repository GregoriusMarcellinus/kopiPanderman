<?php
session_start();
include 'Koneksi.php';
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
    <link rel="stylesheet" href="CSS/Consumstyle.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Kalam:wght@300&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>


    <!-- header section strats -->

    <header class="header">
        <div class="logo">
            <a href="#">
                
            </a>
        </div>


        <nav class="navbar">
            <a href="Beranda.php">Beranda</a>
            <a href="#about">Tentang Kami</a>
            <a href="Customer.php">produk</a>
            <a href="#contact">Kontak kami</a>
            <a href="index.php">Keluar</a>
        </nav>


        </div>
    </header>

    <!-- header section ends -->

    <!-- home section starts -->

    <section class="home" id="home">
        <div class="content">
            <h3>Kopi Panderman</h3>
            <p>Sajian Kopi Terbaik dari Lereng Gunung Panderman</p>
            <a href="#" class="btn">Eksplor Kopi Anda!</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- menu section starts -->

    <section class="menu" id="menu">

        <h1 class="heading">
            Katalog <span>Produk</span>
        </h1>
    
        <?php $ambil = $conn->query("SELECT * FROM tb_produk"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>

            <div class="products">
                <div class="box-container">
                    <div class="box">

                        <img src="IMG/<?php echo $perproduk['gambar']; ?>" style="height: 200px;">
                        <h3><?php echo $perproduk['nama_produk']; ?></h3>
                        <h3>stock produk : <?php echo $perproduk['stok']; ?> stock</h3>
                        <div class="price">Rp. <?php echo number_format($perproduk['harga']); ?></div>
                        <h3><?php echo $perproduk['deskripsi']; ?></h3>
                        <div class="icons">
                            <a href=https://play.google.com/store/apps/details?id=io.kodular.pblkopi2023.kopiPanderman&pcampaignid=web_share class="fas fa-shopping-cart"></a>
                        </div>

                    </div>
                </div>
            </div>

        <?php } ?>
    </section>
    <!-- menu section ends -->
    <section class="contact" id="contact">

        <h1 class="heading"><span>Kontak</span> Kami</h1>

        <div class="row">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21511.93633377686!2d112.49555365586576!3d-7.884159402352573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78873b5c4cc683%3A0x46bfae3573e0bea1!2sPesanggrahan%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1684676382295!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="">

                <h3>Hubungi Kami</h3>

                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="Email">
                </div>

                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="No.Telpon">
                </div>

                <input type="submit" value="Hubungi" class="btn">
            </form>
        </div>

    </section>

    <!-- contact section ends -->

    <!-- footer section starts -->

    <section class="footer">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="links">
            <a href="#home">Beranda</a>
            <a href="#about">Tentang Kami</a>
            <a href="Customer.php">Produk</a>
            <a href="#review">review</a>
            <a href="#contact">Kontak Kami</a>
        </div>

    </section>

    <!-- footer section ends -->

    <!-- custom js file link -->
    <script src="script/JS/script.js"></script>
</body>

</html>