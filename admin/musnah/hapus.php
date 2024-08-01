<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';
include_once '../../template/footer.php';

$id = $_GET['id'];
$data = $con->query(" SELECT * FROM musnah WHERE id_musnah = '$id' ")->fetch_array();
$query = $con->query(" DELETE FROM musnah WHERE id_musnah = '$id' ");
if ($query) {
    $con->query("UPDATE barang SET musnah = 0 WHERE id_barang = '$data[id_barang]' ");
    $_SESSION['pesan'] = "Data Berhasil di Hapus";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}
