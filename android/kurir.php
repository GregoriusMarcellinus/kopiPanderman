<?php
require_once('koneksi.php');

//view pesanan kurir
if ((isset($_GET['MM_viewkurir'])) && ($_GET['MM_viewkurir'] == "oiaya")) {

    $LoginRS__query = sprintf(
        "SELECT * FROM `tb_pesanan` WHERE `status` = 2"
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
            $Data['id_pesanan'] = $row_rs_LoginRS['id_pesanan'];
            $Data['id_user'] = $row_rs_LoginRS['id_user'];
            $Data['id_toko'] = $row_rs_LoginRS['id_toko'];
            $Data['pesanan'] = $row_rs_LoginRS['pesanan'];
            $Data['jumlah'] = $row_rs_LoginRS['jumlah'];
            $Data['total'] = $row_rs_LoginRS['total'];
            $Data['pengiriman'] = $row_rs_LoginRS['pengiriman'];
            $Data['pembayaran'] = $row_rs_LoginRS['pembayaran'];
            $Data['status'] = $row_rs_LoginRS['status'];
            $Data['waktu'] = $row_rs_LoginRS['waktu'];
            $Data['resi'] = $row_rs_LoginRS['resi'];
            $Data['estimasi'] = $row_rs_LoginRS['estimasi'];
            $Data['bukti'] = $row_rs_LoginRS['bukti'];
            array_push($response['data'], $Data);
            $no++;
        }
        
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "gagal";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}

//VIEW PER PRODUK
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

//update resi dan estimai
if ((isset($_GET['MM_updateresi'])) && ($_GET['MM_updateresi'] == "oiaya")) {
    $id_pesanan = $_GET['id_pesanan'];
    $resi = $_GET['resi'];
    $estimasi = $_GET['estimasi'];

    $query = sprintf(
        "SELECT * FROM  tb_pesanan WHERE id_pesanan = %s",
        app($koneksi, $id_pesanan, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {

        $updateSQL = sprintf(
            "UPDATE `tb_pesanan` SET `resi`='$resi', `estimasi`='$estimasi', `status`='6'WHERE id_pesanan = $id_pesanan",
        );

        $Resultupdate = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));

        if ($Resultupdate) {
            $response['kode'] = 1;
            $response['pesan'] = "Data berhasil diubah";
        }else{
    
        $response['kode'] = 0;
        $response['pesan'] = "gagal menambahkan ke keranjang";
        }
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}

//view data user
if ((isset($_GET['MM_viewuser'])) && ($_GET['MM_viewuser'] == "oiaya")) {
    $id_user = $_GET['id_user'];

    $LoginRS__query = sprintf(
        "SELECT * FROM tb_user WHERE id_user=%s",
        app($koneksi, $id_user, "int")
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
            $Data['id_user'] = $row_rs_LoginRS['id_user'];
            $Data['id_toko'] = $row_rs_LoginRS['id_toko'];
            $Data['nama'] = $row_rs_LoginRS['nama'];
            $Data['email'] = $row_rs_LoginRS['email'];
            $Data['telp'] = $row_rs_LoginRS['telp'];
            $Data['alamat'] = $row_rs_LoginRS['alamat'];
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