<?php

include 'Koneksi.php';
$id = $_GET["id_produk"];
$detail = ("SELECT * FROM pembelian_menu JOIN pembelian ON pembelian_menu.id_pembelian = tb_pembelian.id_pembelian WHERE pembelian_menu.id_pembelian = $id")[0];
//$detail = $ambil->fetch_assoc();
$get = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.nama_Pelanggan=pelanggan.nama_user");


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/pembelian.css">
   <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>
<body>


<div class="k" style="margin:30px 0px 0px 30px;">
  <h2>Nama Pelanggan : <?php echo $detail['nama_pelanggan']; ?> </h2>
  
  
  <h2>
      Date : <?php echo $detail['tanggal_pembelian']; ?> <br>
      Total : <?php echo $detail['total_pembelian']; ?> 
  </h2>

</div>

<div class="product-display">
      <table class="product-display-table">
 <thead>
          <tr>
            <th>No</th>
            <th>MENU NAME</th>
            <th>AMOUNT</th>
            <th>TOTAL</th>
            <th>GRAND TOTAL</th> 
          </tr>
 </thead>
 <tbody>
 <?php $nomor=1; ?>
      <?php 
      $totalbelanja = 0;
      $ambil2 = $conn->query("SELECT * FROM pembelian_menu JOIN produk ON pembelian_menu.id_menu = tb_menu.id WHERE pembelian_menu.id_pembelian = '$_GET[id]'");
      while($pecah2 = $ambil2->fetch_assoc()) {
        $totalprice = $pecah2['price']*$pecah2['jumlah'];
        ?>
          <tr>
          <td><?php echo $nomor; ?></td>
       
            <td><?php echo $pecah2['name']; ?></td>
            <td><?php echo $pecah2['price']; ?></td>
            <td><?php echo $pecah2['jumlah']; ?></td>
            <td>
                <?php echo number_format($totalprice); ?>
            </td>
            
          </tr>
          <?php $totalbelanja+=$totalprice; ?>
          <?php $nomor++; ?>
      <?php } ?>
     </tbody>
     <tfoot>
        <tr>
            <th colspan="4">Grand Total</th>
            <th>Rp. <?php echo number_format($totalbelanja); ?></th>
        </tr>
     </tfoot>
    </table>

    <div class="row">
      <div class="col-md-7">
        <div class="alert aletrt-info">
          <div class="k" style="margin:30px 0px 0px 30px;">
            <h2>
              <p>Bawa nota kekasir dan silahkan ambil makanan anda.</p>
              <p>Silahkan Menikmari Makanan Anda,Terimakasih</p>
            </h2>
          </div>
          </div>
    </div>
  </div>
  <div class="landing">
                <a href="home.php"><i class='bx bxs-share'></i>&nbsp; Back</a>
      </div>
<script type="text/javascript">
          window.print();
          </script>

</body>
</html>

