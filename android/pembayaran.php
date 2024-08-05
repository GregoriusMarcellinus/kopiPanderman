<?php
require_once('koneksi.php');

//VIEW semua produk beranda
if ((isset($_GET['MM_viewpembayaran'])) && ($_GET['MM_viewpembayaran'] == "oiaya")) {
    
    $query = sprintf(
        "SELECT * FROM  pembayaran",
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
            $arr['metode'] = $user['metode'];
            $arr['kode'] = $user['kode'];
            $arr['nama'] = $user['nama'];
            $arr['gambar'] = $user['gambar'];
            array_push($response['data'], $arr);
        }
    } else {
        $response['kode'] = 0;
        $response['pesan'] = "Data tidak ditemukan!";
    }

    echo json_encode($response);
    mysqli_close($koneksi);
}
