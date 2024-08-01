<?php

include '../../../app/config.php';

$id_berita_acara    = $_POST['id_berita_acara'];
$id_barang          = $_POST['id_barang'];
$ket                = $_POST['ket'];

$tambah = $con->query("INSERT INTO sub_berita_acara VALUES (
    default,
    '$id_berita_acara', 
    '$id_barang',
    '$ket'
)");

if ($tambah) {
    $data['hasil'] = 'sukses';
} else {

    $data['hasil'] = 'gagal';
}

echo json_encode($data);
