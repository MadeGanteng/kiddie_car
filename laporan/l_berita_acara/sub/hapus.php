<?php
include '../../../app/config.php';

$id = $_POST['id'];

$query = $con->query("DELETE FROM sub_berita_acara WHERE id_sub_berita_acara = '$id' ");
if ($query) {
    echo "Data Berhasil Dihapus";
} else {
    echo "Data Gagal Dihapus";
}
