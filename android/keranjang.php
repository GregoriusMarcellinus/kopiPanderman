<?php
require_once('koneksi.php');

//VIEW PRODUK UNTUK KERANJANG
if ((isset($_GET['MM_viewp'])) && ($_GET['MM_viewp'] == "oiaya")) {
    $id_produk = $_GET['id_produk'];

    $LoginRS__query = sprintf(
        "SELECT * FROM tb_produk WHERE id_produk=%s",
        app($koneksi, $id_produk, "int")
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
            $Data['id_toko'] = $row_rs_LoginRS['id_toko'];
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

//VIEW keranjang (GET)
if ((isset($_GET['MM_viewkeranjang'])) && ($_GET['MM_viewkeranjang'] == "oiaya")) {
    $id_user = $_GET['id_user'];

    $query = sprintf(
        "SELECT * FROM  keranjang WHERE id_user = %s",
        app($koneksi, $id_user, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {
        $response['kode'] = 1;
        $response['row'] = $ResultData;
        $response['pesan'] = "Data Tersedia";
        $response['data'] = array();
        foreach ($data as $user) {
            $arr['id_user'] = $user['id_user'];
            $arr['pesanan'] = $user['pesanan'];
            $arr['jumlah'] = $user['jumlah'];
            $arr['harga'] = $user['harga'];
            array_push($response['data'], $arr);
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "Data tidak ditemukan!";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}

//DELETE item di keranjang
if ((isset($_GET['MM_deleteitem'])) && ($_GET['MM_deleteitem'] == "oiaya")) {

    $id_user = $_GET['id_user'];
    $pesanan = $_GET['pesanan'];
    $cari_query = sprintf(
        "SELECT * FROM keranjang WHERE id_user=%s and pesanan=%s",
        app($koneksi, $id_user, "int"),
        app($koneksi, $pesanan, "int")
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {

        $deleteSQL = sprintf(
            "DELETE FROM `keranjang` WHERE id_user = %s and pesanan = %s",
            app($koneksi, $_GET['id_user'], "int"),
            app($koneksi, $_GET['pesanan'], "int")
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

//DELETE keranjang
if ((isset($_GET['MM_hapuskeranjang'])) && ($_GET['MM_hapuskeranjang'] == "oiaya")) {

    $id_user = $_GET['id_user'];

    $cari_query = sprintf(
        "SELECT * FROM keranjang WHERE id_user=%s",
        app($koneksi, $id_user, "int"),
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {

        $deleteSQL = sprintf(
            "DELETE FROM `keranjang` WHERE id_user = %s",
            app($koneksi, $_GET['id_user'], "int")
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

//insert pesanan
if ((isset($_GET['MM_checkout'])) && ($_GET['MM_checkout'] == "oiaya")) {
    $id_user = $_GET['id_user'];
    $id_toko = $_GET['id_toko'];
    $pesanan = $_GET['pesanan'];
    $jumlah = $_GET['jumlah'];
    $total = $_GET['total'];
    $pengiriman = $_GET['pengiriman'];
    $pembayaran = $_GET['pembayaran'];
    $ongkir = $_GET['ongkir'];

    $insertSQL = sprintf(
        "INSERT INTO `tb_pesanan`(`id_user`, `id_toko`, `pesanan`, `jumlah`, `total`, `pengiriman`, `pembayaran`, `ongkir`) 
        VALUES ('$id_user','$id_toko','$pesanan','$jumlah','$total','$pengiriman','$pembayaran','$ongkir')",
    );

    $Result1 = mysqli_query($koneksi, $insertSQL) or die(mysqli_error($koneksi));


    if ($Result1) {
        $response['kode'] = 1;
        $response['pesan'] = "Data berhasil disimpan";
    } else {
        $response['kode'] = 4;
        $response['pesan'] = "Data gagal disimpan";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}