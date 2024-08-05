<?php
require_once('koneksi.php');

//INSERT DATA
if ((isset($_POST['MM_update'])) && ($_POST['MM_update'] == "oiaya")) {

    $id_pesanan = $_POST['id_pesanan'];
    $cari_query = sprintf(
        "SELECT id_pesanan FROM tb_pesanan WHERE id_pesanan=%d",
        app($koneksi, $id_pesanan, "int")
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {
        $updateSQL = sprintf(
            "UPDATE `tb_pesanan` SET `status`=%d WHERE `id_pesanan`=%d",
            app($koneksi, $_POST['status'], "int"),
            app($koneksi, $_POST['id_pesanan'], "int")
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

//VIEW PRODUK BERDASARKAN STATUS PESANAN
if ((isset($_POST['MM_viewts'])) && ($_POST['MM_viewts'] == "oiaya")) {
    $status = $_POST['status'];
    $id_toko = $_POST['id_toko'];

    $LoginRS__query = sprintf(
        "SELECT id_pesanan, id_user, id_toko, pesanan, jumlah, total, status, waktu FROM tb_pesanan WHERE id_toko=%s AND status=%s ORDER BY waktu DESC",
        app($koneksi, $id_toko, "text"),
        app($koneksi, $status, "text")
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
            $Data['status'] = $row_rs_LoginRS['status'];
            $Data['waktu'] = $row_rs_LoginRS['waktu'];
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

//VIEW PRODUK BERDASARKAN ID_TOKO
if ((isset($_POST['MM_view'])) && ($_POST['MM_view'] == "oiaya")) {
    $id_toko = $_POST['id_toko'];

    $LoginRS__query = sprintf(
        "SELECT id_pesanan, id_user, id_toko, pesanan, jumlah, total, status, waktu FROM tb_pesanan WHERE id_toko=%s",
        app($koneksi, $id_toko, "text")
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
            $Data['status'] = $row_rs_LoginRS['status'];
            $Data['waktu'] = $row_rs_LoginRS['waktu'];
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
        "SELECT id_produk, nama_produk, berat, dimensi, deskripsi, stok, terjual, harga, gambar FROM tb_produk WHERE id_toko=%s",
        app($koneksi, $id_toko, "text")
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



//EDIT DATA
if ((isset($_POST['MM_update'])) && ($_POST['MM_update'] == "oiaya")) {

    $id_pesanan = $_POST['id_pesanan'];
    $cari_query = sprintf(
        "SELECT id_pesanan FROM tb_pesanan WHERE id_pesanan=%d",
        app($koneksi, $id_pesanan, "int")
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {
        $updateSQL = sprintf(
            "UPDATE `tb_pesanan` SET status`=%d WHERE `id_pesanan`=%d",
            app($koneksi, $_POST['status'], "int"),
            app($koneksi, $_POST['id_pesanan'], "int")
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

    $id = $_POST['id'];
    $cari_query = sprintf(
        "SELECT id FROM tb_user WHERE id=%s",
        app($koneksi, $id, "int")
    );
    $cari = mysqli_query($koneksi, $cari_query) or die(mysqli_error($koneksi));
    $ResultCari = mysqli_num_rows($cari);

    if ($ResultCari > 0) {

        $deleteSQL = sprintf(
            "DELETE FROM `tb_user` WHERE id = %s",
            app($koneksi, $_POST['id'], "int")
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
