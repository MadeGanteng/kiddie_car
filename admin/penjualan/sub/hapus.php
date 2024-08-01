<?php
include '../../../app/config.php';

$id = $_POST['id'];

$query = $con->query("DELETE FROM sub_penjualan WHERE id_sub_penjualan = '$id' ");
if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}
