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
  <link rel="stylesheet" href="CSS/Adminstyle.css">
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
          <a href="Admin.php" class="active">
            <span class="las la-igloo"></span>
            <span>Beranda</span></a>
        </li>

        <li>
          <a href="Pemasukan.php">
            <span class="fas fa-wallet"></span>
            <span>Pemasukan</span></a>
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
        Beranda
      </h2>

      <div class="search-wrapper">
        <span class="las la-search"></span>
        <input type="search" placeholder="Search Here" />
      </div>

    </header>

    <main>

      <div class="wrapper">
        <div class="left">
          <img src="IMG/admin.png" alt="user" width="100">
          <h4>Kasir</h4>
        </div>
        <div class="right">
          <div class="info">
            <h3>Informasi Kasir</h3>
            <div class="info_data">
              <div class="data">
              </div>
            </div>
          </div>

          <div class="projects">
            <div class="projects_data">
              <div class="data">
                <h4>Nama</h4>
                <p>Alif Rangga Kamajaya</p>
              </div>
            </div>
          </div>

          <div class="projects">
            <div class="projects_data">
              <div class="data">
                <h4>Alamat</h4>
                <p>Pesanggrahan, Jawa Timur</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>

</body>

</html>