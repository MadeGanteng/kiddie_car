<?php

include '../../../app/config.php';

$id_biaya_operasional    = $_POST['id_biaya_operasional'];
$jenis_pengeluaran          = $_POST['jenis_pengeluaran'];
$jumlah                = $_POST['jumlah'];
$biaya                = $_POST['biaya'];
$sub_total                = $_POST['sub_total'];

$tambah = $con->query("INSERT INTO sub_biaya_operasional VALUES (
    default,
    '$id_biaya_operasional', 
    '$jenis_pengeluaran',
    '$jumlah',
    '$biaya',
    '$sub_total'
)");

if ($tambah) {
    $data['hasil'] = 'sukses';
} else {

    $data['hasil'] = 'gagal';
}

echo json_encode($data);
