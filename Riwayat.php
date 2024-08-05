<?php

include 'Koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, maximum-scale=1">
    <title>Pemilik</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link  rel="stylesheet" href="CSS/Adminstyle.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
    <div class="sidebar-brand">
      <h2> <span>Kopi Nusantara</span></h2>
    </div>

    <div class="sidebar-menu">
      <ul>

        <li>
          <a href="Penjual.php" class="active">
            <span class="las la-igloo"></span>
            <span>Beranda</span></a>
        </li>

        <li>
          <a href="Pemasukan.php">
            <span class="fas fa-wallet"></span>
            <span>Pemasukan</span></a>
        </li>

        <li>
          <a href="Tambahproduk.php">
            <span class="las la-clipboard-list"></span>
            <span>Tambah Produk</span>
          </a>
        </li>

        <li>
          <a href="Riwayat.php">
            <span class="las la-clipboard-list"></span>
            <span>Riwayat Transaksi</span>
          </a>
        </li>

        <li><a href="Login.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
      </ul>
    </div>
  </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

        </header>

        <main>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">

                        <div class="card-header">
                            <h3>Pengguna Website</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <?php

                                $select = mysqli_query($conn, "SELECT * FROM tb_keluar");

                                ?>
                                <div class="product-display">
                                    <table class="product-display-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Waktu</th>
                                                <th>Jumlah</th>
                                                <th>Harga Produk</th>
                                                <th>Total</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $nomor = 1; ?>
                                        <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                            <tr>
                                                <td><?php echo $nomor ?></td>
                                                <td><?php echo $row['id_produk']; ?></td>
                                                <td><?php echo $row['nama_produk']; ?></td>
                                                <td><?php echo $row['waktu_penjualan']; ?></td>
                                                <td><?php echo $row['jumlah']; ?></td>
                                                <td><?php echo $row['harga_produk']; ?></td>
                                                <td><?php echo $row['harga_total']; ?></td>
                                                <td><?php echo $row['bukti_pembayaran']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td>
                                                    <a href="Updatestatus.php?edit=<?php echo $row['id_produk']; ?>" class="btn"> <i class="fas fa-edit">Edit</i></a>
                                                </td>
                                            </tr>
                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </main>

    </div>

</body>

</html>