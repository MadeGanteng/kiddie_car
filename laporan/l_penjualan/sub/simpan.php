<?php

include '../../../app/config.php';

$id_list_anggaran    = $_POST['id_list_anggaran'];
$id_barang          = $_POST['id_barang'];
$jumlah                = $_POST['jumlah'];
$harga                = $_POST['harga'];
$sub_total                = $_POST['sub_total'];

$tambah = $con->query("INSERT INTO sub_list_anggaran VALUES (
    default,
    '$id_list_anggaran', 
    '$id_barang',
    '$jumlah',
    '$harga',
    '$sub_total'
)");

if ($tambah) {
    $data['hasil'] = 'sukses';
} else {

    $data['hasil'] = 'gagal';
}

echo json_encode($data);
