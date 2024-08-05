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
    <link  rel="stylesheet" href="CSS/Adminstyle.css">
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
                    <a href="Admin.php" class="active">
                        <span class="las la-igloo"></span>
                        <span>Beranda</span></a>
                </li>

                <li>
                    <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=website_kopi&table=">
                        <span class="las la-user-circle"></span>
                        <span>MyPhP</span></a>
                </li>

                <li>
                    <a href="">
                        <span class="las la-clipboard-list"></span>
                        <span>Data Pengguna</span>
                    </a>
                </li>

                <li>
                    <a href="Datatransaksi.php">
                        <span class="las la-clipboard-list"></span>
                        <span>Data Transaksi</span>
                    </a>
                </li>

                <li><a href="Login.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>

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

                                $select = mysqli_query($conn, "SELECT * FROM tb_user");

                                ?>
                                <div class="product-display">
                                    <table class="product-display-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID User</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Telp</th>
                                                <th>Alamat</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $nomor = 1; ?>
                                        <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                            <tr>
                                                <td><?php echo $nomor ?></td>
                                                <td><?php echo $row['id_user']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['telp']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['level']; ?></td>
                                                <td><?php echo $row['foto_profil']; ?></td>
                                                <td>
                                                    <a href="Updateadmin.php?edit=<?php echo $row['id_user']; ?>" class="btn"> <i class="fas fa-edit">Edit</i></a>
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