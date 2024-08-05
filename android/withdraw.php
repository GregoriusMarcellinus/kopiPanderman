<?php
require_once('koneksi.php');

//INSERT DATA
if ((isset($_POST['MM_insert'])) && ($_POST['MM_insert'] == "oiaya")) {

    $insertSQL = sprintf(
        "INSERT INTO `tb_withdraw` (`id_user`, `bank`, `norek`, `nama`, `jumlah`, `status`) VALUES (%d, %s, %s, %s, %d, %s)",
        app($koneksi, $_POST['id_user'], "int"),
        app($koneksi, $_POST['bank'], "text"),
        app($koneksi, $_POST['norek'], "text"),
        app($koneksi, $_POST['nama'], "text"),
        app($koneksi, $_POST['jumlah'], "int"),
        app($koneksi, $_POST['status'], "text")
    );

    $Result1 = mysqli_query($koneksi, $insertSQL) or die(mysqli_error($koneksi));


    if ($Result1) {
        $response['kode'] = 1;
        $response['pesan'] = "Data berhasil disimpan";
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "Data gagal disimpan";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}


//VIEW RIWAYAT WITHDRAW
if ((isset($_POST['MM_view'])) && ($_POST['MM_view'] == "oiaya")) {
    $id_user = $_POST['id_user'];

    $LoginRS__query = sprintf(
        "SELECT id_user, bank, norek, nama, jumlah, waktu, status FROM tb_withdraw WHERE id_user=%s ORDER BY waktu DESC",
        app($koneksi, $id_user, "text")
    );
    $LoginRS = mysqli_query($koneksi, $LoginRS__query) or die(mysqli_error($koneksi));
    $row_rs_LoginRS = mysqli_fetch_assoc($LoginRS);
    $loginFoundUser = mysqli_num_rows($LoginRS);

    if ($loginFoundUser) {
        $response['kode'] = 1;
        $response['pesan'] = "sukses";
        $response['row'] = $loginFoundUser;
        
        //tambahan pada video login 2
        $response['data'] = array();
        $no = 1;
        foreach ($LoginRS as $row_rs_LoginRS) {
            $Data['bank'] = $row_rs_LoginRS['bank'];
            $Data['norek'] = $row_rs_LoginRS['norek'];
            $Data['nama'] = $row_rs_LoginRS['nama'];
            $Data['jumlah'] = $row_rs_LoginRS['jumlah'];
            $Data['waktu'] = $row_rs_LoginRS['waktu'];
            $Data['status'] = $row_rs_LoginRS['status'];
            array_push($response['data'], $Data);
            $no++;
        }
        //---
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "gagal";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}

//VIEW PRODUK BERDASARKAN ID_PRODUK
if ((isset($_POST['MM_viewp'])) && ($_POST['MM_viewp'] == "oiaya")) {
    $id_produk = $_POST['id_produk'];

    $LoginRS__query = sprintf(
        "SELECT id_produk, nama_produk, berat, dimensi, deskripsi, stok, terjual, harga, gambar FROM tb_produk WHERE id_produk=%s",
        app($koneksi, $id_produk, "text")
    );
    $LoginRS = mysqli_query($koneksi, $LoginRS__query) or die(mysqli_error($koneksi));
    $row_rs_LoginRS = mysqli_fetch_assoc($LoginRS);
    $loginFoundUser = mysqli_num_rows($LoginRS);

    if ($loginFoundUser) {
        $response['kode'] = 1;
        $response['pesan'] = "sukses";
        $response['row'] = $loginFoundUser;
        
        //tambahan pada video login 2
        $response['data'] = array();
        $no = 1;
        foreach ($LoginRS as $row_rs_LoginRS) {
            $Data['id_produk'] = $row_rs_LoginRS['id_produk'];
            $Data['nama_produk'] = $row_rs_LoginRS['nama_produk'];
            $Data['berat'] = $row_rs_LoginRS['berat'];
            $Data['dimensi'] = $row_rs_LoginRS['dimensi'];
            $Data['deskripsi'] = $row_rs_LoginRS['deskripsi'];
            $Data['stok'] = $row_rs_LoginRS['stok'];
            $Data['terjual'] = $row_rs_LoginRS['terjual'];
            $Data['harga'] = $row_rs_LoginRS['harga'];
            $Data['gambar'] = $row_rs_LoginRS['gambar'];
            array_push($response['data'], $Data);
            $no++;
        }
        //---
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "gagal";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}

//VIEW RIWAYAT WITHDRAW (GET)
if ((isset($_GET['MM_viewpg'])) && ($_GET['MM_viewpg'] == "oiaya")) {
    $id_user = "-1";
    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
    $query = sprintf(
        "SELECT * FROM  tb_withdraw WHERE id_user=%s ORDER BY waktu DESC",
        app($koneksi, $id_user, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {
        $response['kode'] = 1;
        $response['pesan'] = "Data Tersedia";
        $response['row'] = $ResultData;
        $response['data'] = array();
        foreach ($data as $user) {
            $arr['bank'] = $user['bank'];
            $arr['norek'] = $user['norek'];
            $arr['nama'] = $user['nama'];
            $arr['jumlah'] = $user['jumlah'];
            $arr['waktu'] = $user['waktu'];
            $arr['status'] = $user['status'];
            array_push($response['data'], $arr);
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "Data tidak ditemukan!";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}


//EDIT DATA
if ((isset($_POST['MM_update'])) && ($_POST['MM_update'] == "oiaya")) {

    $id_produk = $_POST['id_produk'];
    $cari_query = sprintf(
        "SELECT id_produk FROM tb_produk WHERE id_produk=%d",
        app($koneksi, $id_produk, "int")
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {
        $updateSQL = sprintf(
            "UPDATE `tb_produk` SET `nama_produk`=%s,`berat`=%d,`dimensi`=%s,`deskripsi`=%s,`stok`=%d,`terjual`=%d,`harga`=%d,`gambar`=%s WHERE `id_produk`=%d",
            app($koneksi, $_POST['nama_produk'], "text"),
            app($koneksi, $_POST['berat'], "int"),
            app($koneksi, $_POST['dimensi'], "text"),
            app($koneksi, $_POST['deskripsi'], "text"),
            app($koneksi, $_POST['stok'], "int"),
            app($koneksi, $_POST['terjual'], "int"),
            app($koneksi, $_POST['harga'], "int"),
            app($koneksi, $_POST['gambar'], "text"),
            app($koneksi, $_POST['id_produk'], "int")
        );

        $Result1 = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));

        if ($Result1) {
            $response['kode'] = 1;
            $response['pesan'] = "Data berhasil diubah";
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "ID tidak ditemukan!";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}

//DELETE DATA
if ((isset($_POST['MM_delete'])) && ($_POST['MM_delete'] == "oiaya")) {

    $id_produk = $_POST['id_produk'];
    $cari_query = sprintf(
        "SELECT id_produk FROM tb_produk WHERE id_produk=%s",
        app($koneksi, $id_produk, "int")
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {

        $deleteSQL = sprintf(
            "DELETE FROM `tb_produk` WHERE id_produk = %s",
            app($koneksi, $_POST['id_produk'], "int")
        );

        $Result1 = mysqli_query($koneksi, $deleteSQL) or die(mysqli_error($koneksi));

        if ($Result1) {
            $response['kode'] = 1;
            $response['pesan'] = "Data berhasil dihapus!";
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "ID tidak ditemukan!";
    }


    echo json_encode($response);
    mysqli_close($koneksi);
}
