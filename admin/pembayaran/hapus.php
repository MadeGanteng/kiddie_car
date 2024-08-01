<?php
require '../../app/config.php';
include_once '../../template/header.php';
include_once '../../template/sidebar.php';
include_once '../../template/footer.php';

$id = $_GET['id'];
$query = $con->query(" DELETE FROM pembayaran WHERE id_pembayaran = '$id' ");
$con->query("UPDATE laba_rugi SET  harga_beli = '0', laba = '0', rugi = '0'");
if ($query) {
    $con->query(" DELETE FROM sub_pembayaran WHERE id_pembayaran = '$id' ");
    $_SESSION['pesan'] = "Data Berhasil di Hapus";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}
