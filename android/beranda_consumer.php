<?php
require_once('koneksi.php');

//INSERT keranjang
if ((isset($_GET['MM_tambahkeranjang'])) && ($_GET['MM_tambahkeranjang'] == "oiaya")) {

    $id_user = $_GET['id_user'];
    $pesanan = $_GET['pesanan'];
    $jumlah = $_GET['jumlah'];
    $harga = $_GET['harga'];

    $query = sprintf(
        "SELECT * FROM  keranjang WHERE id_user = %s and pesanan = %s",
        app($koneksi, $id_user, "int"),
        app($koneksi, $pesanan, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {
        $jumlahakhir = $rs_data['jumlah'] + $jumlah;
        $hargaakhir = $rs_data['harga'] + $harga;
        $updateSQL = sprintf(
            "UPDATE `keranjang` SET `jumlah`='$jumlahakhir',`harga`='$hargaakhir' WHERE id_user = %s and pesanan = %s",
            app($koneksi, $id_user, "int"),
            app($koneksi, $pesanan, "int")
        );

        $Resultupdate = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));

        if ($Resultupdate) {
            $response['kode'] = 2;
            $response['pesan'] = "Data berhasil diubah";
        }else{
    
        $response['kode'] = 3;
        $response['pesan'] = "gagal menambahkan ke keranjang";
        }
    } else {
        $insertSQL = sprintf(
            "INSERT INTO `keranjang`(`id_user`, `pesanan`, `jumlah`, `harga`) VALUES ('%d','%d','%d','%d')",
            app($koneksi, $_GET['id_user'], "int"),
            app($koneksi, $_GET['pesanan'], "int"),
            app($koneksi, $_GET['jumlah'], "int"),
            app($koneksi, $_GET['harga'], "int")
        );
    
        $Result1 = mysqli_query($koneksi, $insertSQL) or die(mysqli_error($koneksi));
    
    
        if ($Result1) {
            $response['kode'] = 1;
            $response['pesan'] = "Data berhasil disimpan";
        } else {
            $response['kode'] = 4;
            $response['pesan'] = "Data gagal disimpan";
        }
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}

//VIEW semua produk beranda
if ((isset($_GET['MM_viewberanda'])) && ($_GET['MM_viewberanda'] == "oiaya")) {
    
    $query = sprintf(
        "SELECT * FROM  tb_produk",
        app($koneksi, $id_produk, "int")
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
            $arr['id_produk'] = $user['id_produk'];
            $arr['id_toko'] = $user['id_toko'];
            $arr['nama_produk'] = $user['nama_produk'];
            $arr['berat'] = $user['berat'];
            $arr['dimensi'] = $user['dimensi'];
            $arr['deskripsi'] = $user['deskripsi'];
            $arr['stok'] = $user['stok'];
            $arr['terjual'] = $user['terjual'];
            $arr['harga'] = $user['harga'];
            $arr['gambar'] = $user['gambar'];
            $arr['review'] = $user['review'];
            array_push($response['data'], $arr);
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "Data tidak ditemukan!";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
