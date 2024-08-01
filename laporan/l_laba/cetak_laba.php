<?php
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $bulan = $_POST['bulan'];

    // $sql = mysqli_query($con, "SELECT * FROM kondisi a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON b.id_ruang = c.id_ruang WHERE tgl_cek BETWEEN '$tgl1' AND '$tgl2' ORDER BY a.tgl_cek ASC");
    $sql = mysqli_query($con, "SELECT month(penjualan.tgl_trx) AS bulan, year(penjualan.tgl_trx) AS tahun, SUM(sub_penjualan.sub_total) AS hasil FROM penjualan, sub_penjualan WHERE penjualan.id_penjualan = sub_penjualan.id_penjualan  AND penjualan.tgl_trx LIKE '%$bulan%' GROUP BY month(penjualan.tgl_trx), year(penjualan.tgl_trx)");

    $label = 'LAPORAN DATA LABA <br> Bulan : ' . tgl_indo2($bulan);
} else {
    $sql = mysqli_query($con, "SELECT month(penjualan.tgl_trx) AS bulan, year(penjualan.tgl_trx) AS tahun, SUM(sub_penjualan.sub_total) AS hasil FROM penjualan, sub_penjualan WHERE penjualan.id_penjualan = sub_penjualan.id_penjualan GROUP BY month(penjualan.tgl_trx), year(penjualan.tgl_trx)");
    $label = 'LAPORAN DATA LABA';
}

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Laba</title>
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
                    <h2>INFINITY CCTV BANJARMASIN</h2>
                    <h4>Jl. Pulau Laut No.24, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70123</h4>
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
                            <th>Bulan</th>
                            <th>Laba</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center" width="10%"><?= $no++ ?></td>
                                <td align="center"><?= bulan($data['bulan']) ?></td>
                                <td align="center">Rp <?= number_format($data['hasil'],0,',','.') ?></td>
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
                <td align="center" width="65%">
                </td>
                <td align="center">
                    <h6>
                        Banjarmasin, <?= tgl(date('Y-m-d')) ?><br>
                        Mengetahui <br>
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