<?php
include '../../../app/config.php';

$id = $_POST['id'];

$query = $con->query("DELETE FROM sub_biaya_operasional WHERE id_sub_biaya_operasional = '$id' ");
if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}
