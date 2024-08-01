<?php
include '../../../app/config.php';

$id = $_POST['id'];

$query = $con->query("DELETE FROM sub_pembayaran WHERE id_sub_pembayaran = '$id' ");
if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}
