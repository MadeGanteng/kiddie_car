<?php
include '../../../app/config.php';

$id = $_POST['id'];

$query = $con->query("DELETE FROM sub_list_anggaran WHERE id_sub_list_anggaran = '$id' ");
if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}
