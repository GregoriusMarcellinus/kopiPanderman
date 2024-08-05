<?php
require_once('koneksi.php');

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