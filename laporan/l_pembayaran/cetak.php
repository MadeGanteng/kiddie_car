<?php
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($con, "SELECT * FROM pembayaran WHERE tgl_trx BETWEEN '$tgl1' AND '$tgl2' ORDER BY tgl_trx ASC");
    $label = 'LAPORAN DATA PEMBAYARAN PELANGGAN <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = mysqli_query($con, "SELECT * FROM pembayaran ORDER BY tgl_trx DESC");
    $label = 'LAPORAN DATA PEMBAYARAN PELANGGAN';
}

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pembayaran Pelanggan</title>
</head>

<style>
    th {
        color: white;
    }
</style>

<body>
    <div class="table-responsive">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center">
                    <img src="<?= base_url('assets/images/logo_toko.png') ?>" align="left" height="75">
                </td>
                <td align="center">
                    <h2 style="text-transform: uppercase;">Salma Digital Studio</h4>
                    <h4>Jl. A. Yani No.5,700, Pemurus Dalam, Kec. Banjarmasin Sel., Kota Banjarmasin, Kalimantan Selatan 70249</h6>
                </td>
                <td align="center">
                    <img src="<?= base_url('assets/images/pelengkap.png') ?>" align="right" height="75">
                </td>
            </tr>
        </table>
    </div>
    <hr size="2px" color="black">

    <h4 align="center">
        <?= $label ?><br>
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#17A2B8" align="center">
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Detail Pembayaran</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="center"><?= $data['kode_trx'] ?></td>
                                <td align="center"><?= tgl($data['tgl_trx']) ?></td>
                                <td align="center">
                                    <table border="1" cellspacing="0" cellpadding="6" width="100%">
                                        <thead>
                                            <tr bgcolor="#17A2B8" align="center">
                                                <th>Jenis Pembayaran</th>
                                                <th>biaya</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $d = $con->query("SELECT * FROM sub_pembayaran, jenis_pembayaran WHERE sub_pembayaran.id_jenis = jenis_pembayaran.id_jenis AND sub_pembayaran.id_pembayaran = '$data[id_pembayaran]' ");
                                            while ($r = $d->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td align="left"><?= $r['jenis_pembayaran'] ?></td>
                                                    <td align="left">Rp <?= number_format($r['biaya'],0,',','.') ?></td>
                                                </tr>
                                               
                                            <?php } ?>

                                            <?php $e = $con->query("SELECT *, SUM(biaya) AS total FROM sub_pembayaran WHERE id_pembayaran = '$data[id_pembayaran]' LIMIT 1");
                                            while ($r = $e->fetch_array()) {
                                            ?>
                                                
                                                <tr>
                                                    <td><b>Total Pembayaran</b></td>
                                                    <td align="right"><b>Rp <?= number_format($r['total'],0,',','.') ?></b></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <br>
    <br>

    <br>
    <div class="table-responsive">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center" width="85%">
                </td>
                <td align="center">
                    <h6>
                        <?= tgl_indo(date('Y-m-d')) ?><br>
                        Banjarbaru <br>
                        <br><br><br><br>
                        <u>Admin</u><br>
                    </h6>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>