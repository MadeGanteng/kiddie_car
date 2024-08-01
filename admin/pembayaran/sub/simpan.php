<?php

include '../../../app/config.php';

$id_pembayaran    = $_POST['id_pembayaran'];
$id_jenis          = $_POST['id_jenis'];
$biaya                = $_POST['biaya'];

$tambah = $con->query("INSERT INTO sub_pembayaran VALUES (
    default,
    '$id_pembayaran', 
    '$id_jenis',
    '$biaya'
)");

if ($tambah) {
    $data['hasil'] = 'sukses';
} else {

    $data['hasil'] = 'gagal';
}

echo json_encode($data);
