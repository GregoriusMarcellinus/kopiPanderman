<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- custom css file link -->
    <link rel="stylesheet" href="CSS/Homestyle.css">
</head>

<body>

    <!-- header section strats -->

    <header class="header">
        
        <div class="logo">
        <img src="IMG/logo.png" width="60px">
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
        <div class="container">
        <video src="IMG/video4.mp4" class="slider" autoplay loop muted controls></video>

        <ul>
            <li onclick="videoslider('IMG/video1.mp4')"><video src="IMG/video1.mp4"></video></li>
        </ul>
    </div>


    <script>

        function videoslider(links){
            document.querySelector(".slider").src = links;
        }

    </script>
    </section>

    <!-- home section ends -->

    <!-- about section starts -->

    <section class="about" id="about">

        <h1 class="heading">
            <span>Tentang </span>Kami
        </h1>

        <div class="row">

            <div class="image">
                <img src="IMG/petanikopi1.png" alt="">
            </div>

            <div class="content">
                <h3>Sejarah Desa Panderman</h3>
                <p>Desa Pesanggrahan pada zaman dahulu merupakan sebuah tempat dimana para Petinggi Kerajaan beristirahat dalam perjalanannya. Konon para Raja, Ratu, Adipati dan Punggawa Kerajaan  Mataram bersama para istri dan selirnya sering melaksanakan permandian di sumber mata air panas Songgoriti dan kemudian beristirahat atau “Mesanggrah” [bahasa Jawa] di daerah yang sekarang adalah Desa Pesanggrahan. </p>
                <p>Letak geografis wilayah Pesanggrahan yang berada di kaki lereng Gunung Panderman dengan panorama yang indah serta hawanya yang sangat sejuk saat itu memiliki daya tarik tersendiri bagi siapapun yang sedang dalam perjalanan untuk beristirahat di tempat ini, seiring berjalannya waktu akhirnya daerah ini dinamakan “DESA PESANGGRAHAN”</p>
                <a href="https://desapesanggrahan.id/sejarah-desa-pesanggrahan-kota-batu/" class="btn">Pelajari Lebih Lanjut</a>
            </div>

        </div>
    </section>

    <!-- about section ends -->

    

    <!-- review section starts -->

    <section class="review" id="review">
        <h1 class="heading">
            Jenis <span>Kopi </span>
        </h1>

        <div class="box-container">

            <div class="box">
                <p>Kopi arabika adalah biji kopi terbesar produksinya di seluruh dunia, harga kopi arabika berdasarkan kualitasnya, memiliki profil rasa dan aroma yang begitu kompleks. Kopi arabika pun merupakan biji kopi yang banyak peminatnya. biji kopi arabika lebih banyak sekitar 60-70% dari produksi kopi dunia, dan dipercaya sebagai spesies tanaman kopi pertama yang dibudidayakan dalam ulasan sejarah industri kopi.</p>
                <p>biji kopi arabika lebih banyak sekitar 60-70% dari produksi kopi dunia, dan dipercaya sebagai spesies tanaman kopi pertama yang dibudidayakan dalam ulasan sejarah industri kopi. Tanaman kopi liar ditemukan pertama kali di Ethiopia oleh seekor kambing yang mendadak riang setelah mengunyah buah kopi. </p>
                <img src="IMG/kopiarabika.jpg" class="user" alt="">
                <h3>Kopi Arabika</h3>
            </div>

            <div class="box">
                <p>Robusta adalah salah satu jenis tanaman kopi dengan nama ilmiah Coffea canephora. Nama robusta diambil dari kata “robust“, istilah dalam bahasa Inggris yang artinya kuat. Sesuai dengan namanya, minuman yang diekstrak dari biji kopi robusta memiliki cita rasa yang kuat dan cenderung lebih pahit dibanding arabika.</p>
                <p>Biji kopi robusta banyak digunakan sebagai bahan baku kopi siap saji (instant) dan pencampur kopi racikan (blend) untuk menambah kekuatan cita rasa kopi. Secara global produksi robusta menempati urutan kedua setelah arabika. Indonesia merupakan salah satu negara penghasil kopi robusta terbesar di dunia. </p>
                <img src="IMG/kopirobusta.jpg" class="user" alt="">
                <h3>Kopi Robusta</h3>
            </div>
            
        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts -->

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