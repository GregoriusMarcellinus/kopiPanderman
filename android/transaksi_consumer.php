<?php
require_once('koneksi.php');

//VIEW transaksi
if ((isset($_GET['MM_viewtransaksi'])) && ($_GET['MM_viewtransaksi'] == "oiaya")) {
    $id_user = $_GET['id_user'];

    $LoginRS__query = sprintf(
        "SELECT * FROM tb_pesanan WHERE id_user=%s",
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
            $Data['id_pesanan'] = $row_rs_LoginRS['id_pesanan'];
            $Data['id_toko'] = $row_rs_LoginRS['id_toko'];
            $Data['pesanan'] = $row_rs_LoginRS['pesanan'];
            $Data['jumlah'] = $row_rs_LoginRS['jumlah'];
            $Data['total'] = $row_rs_LoginRS['total'];
            $Data['pengiriman'] = $row_rs_LoginRS['pengiriman'];
            $Data['pembayaran'] = $row_rs_LoginRS['pembayaran'];
            $Data['ongkir'] = $row_rs_LoginRS['ongkir'];
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


//update sampai
if ((isset($_GET['MM_sampai'])) && ($_GET['MM_sampai'] == "oiaya")) {
    $id_pesanan = $_GET['id_pesanan'];
    $id_toko = $_GET['id_toko'];
    $harga_total = $_GET['harga_total'];

    $query = sprintf(
        "SELECT * FROM  tb_user WHERE id_toko = %s",
        app($koneksi, $id_toko, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {
        $hargaakhir = $rs_data['saldo'] + $harga_total;

        $updateSQL = sprintf(
            "UPDATE `tb_user` SET `saldo`='$hargaakhir' WHERE id_toko = $id_toko",
        );

        $Resultupdate = mysqli_query($koneksi, $updateSQL) or die(mysqli_error($koneksi));

        if ($Resultupdate) {
            
            $updateStatus = sprintf(
                "UPDATE `tb_pesanan` SET `status`='5'WHERE id_pesanan = $id_pesanan",
            );
    
            $Resultupdates = mysqli_query($koneksi, $updateStatus) or die(mysqli_error($koneksi));
    
            if ($Resultupdates) {
                $response['kode'] = 1;
                $response['pesan'] = "Data berhasil diubah";
            }
        }else{
    
        $response['kode'] = 0;
        $response['pesan'] = "gagal menambahkan ke keranjang";
        }
    }
    echo json_encode($response);
    mysqli_close($koneksi);
}

//update batal
if ((isset($_GET['MM_batal'])) && ($_GET['MM_batal'] == "oiaya")) {
    $id_pesanan = $_GET['id_pesanan'];

    $query = sprintf(
        "SELECT * FROM  tb_pesanan WHERE id_pesanan = %s",
        app($koneksi, $id_pesanan, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {

        $updateSQL = sprintf(
            "UPDATE `tb_pesanan` SET `status`='4'WHERE id_pesanan = $id_pesanan",
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

//update/upload pembayaran
if ((isset($_GET['MM_uploadbukti'])) && ($_GET['MM_uploadbukti'] == "oiaya")) {
    $id_pesanan = $_GET['id_pesanan'];
    $bukti = $_GET['bukti'];

    $query = sprintf(
        "SELECT * FROM  tb_pesanan WHERE id_pesanan = %s",
        app($koneksi, $id_pesanan, "int")
    );
    $data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    $rs_data = mysqli_fetch_assoc($data);
    $ResultData = mysqli_num_rows($data);

    if ($ResultData > 0) {

        $updateSQL = sprintf(
            "UPDATE `tb_pesanan` SET `bukti`='$bukti',`status`='7' WHERE id_pesanan = $id_pesanan",
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