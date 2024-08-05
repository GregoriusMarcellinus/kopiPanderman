<?php
session_start();


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

//menuju halaman keranjang
echo "<script>alert('Pesanan Anda Berhasil Ditambahkan');</script>";
echo "<script>location='Keranjang.php';</script>";


?>