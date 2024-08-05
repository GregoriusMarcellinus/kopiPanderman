<?php

include 'Koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1, maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="CSS/Adminstyle.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <span>Admin</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>

                <li>
                    <a href="" class="active">
                        <span class="las la-igloo"></span>
                        <span>Beranda</span></a>
                </li>

                <li>
                    <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=website_kopi&table=">
                        <span class="las la-user-circle"></span>
                        <span>Data</span></a>
                </li>

                <li>
                    <a href="">
                        <span class="las la-clipboard-list"></span>
                        <span>Riwayat</span>
                    </a>
                </li>

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
        </main>
    </div>

</body>

</html>