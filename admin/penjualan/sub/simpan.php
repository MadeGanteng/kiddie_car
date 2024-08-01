<?php

include '../../../app/config.php';

$id_penjualan    = $_POST['id_penjualan'];
$id_barang          = $_POST['id_barang'];
$jumlah_barang                = $_POST['jumlah_barang'];
$harga                = $_POST['harga'];
$jumlah_jual                = $_POST['jumlah_jual'];
$sub_total                = $_POST['sub_total'];
$harga_beli                = $_POST['harga_beli'];
$total_beli = $harga_beli * $jumlah_jual;

$tambah = $con->query("INSERT INTO sub_penjualan VALUES (
    default,
    '$id_penjualan', 
    '$id_barang',
    '$jumlah_barang',
    '$harga',
    '$jumlah_jual',
    '$sub_total',
    '$harga_beli',
    '$total_beli'
)");

if ($tambah) {
    $data['hasil'] = 'sukses';
} else {

    $data['hasil'] = 'gagal';
}

echo json_encode($data);
