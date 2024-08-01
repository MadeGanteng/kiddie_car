<?php
require('../../assets/vendor/fpdf/fpdf.php');
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $bulan = $_POST['bulan'];

    $sql = mysqli_query($con, "SELECT month(biaya_operasional.tgl_penggunaan) AS bulan, year(biaya_operasional.tgl_penggunaan) AS tahun, SUM(sub_biaya_operasional.sub_total) AS hasil FROM biaya_operasional, sub_biaya_operasional WHERE biaya_operasional.id_biaya_operasional = sub_biaya_operasional.id_biaya_operasional AND  biaya_operasional.tgl_penggunaan LIKE '%$bulan%'  GROUP BY month(biaya_operasional.tgl_penggunaan), year(biaya_operasional.tgl_penggunaan)");

    $sql2 = mysqli_query($con, "SELECT SUM(barang_jual.harga_beli) AS harga_beli, SUM(sub_penjualan.sub_total) AS total FROM sub_penjualan, barang_jual, penjualan WHERE sub_penjualan.id_penjualan = penjualan.id_penjualan AND barang_jual.id_barang = sub_penjualan.id_barang AND penjualan.tgl_trx LIKE '%$bulan%' GROUP BY month(penjualan.tgl_trx)");

    $hasil = mysqli_query($con, "SELECT *  FROM laba_rugi WHERE bulan LIKE '%$bulan%'");

    $label = 'LAPORAN DATA LABA RUGI <br> Bulan : ' . bulan($bulan);
}

require_once '../../assets/vendor/autoload.php';
$pdf = new Fpdf('P');
$pdf->AddPage();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Laba Rugi</title>
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
                    
                    </td>
                    <td align="center">
                        <h2 style="text-transform: uppercase;">PT Kiddie Car</h4>
                        <h4>Jl. A. Yani No.98, Melayu, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70232 Dutamall lantai dasar</h6>
                    </td>
                    <td align="center">
                       
                    </td>
            </tr>
        </table>
    </div>
    <hr size="2px" color="black">

    <h4 align="center">
        <?= $label ?><br>
    </h4>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="0" cellspacing="0" cellpadding="6" width="100%">
                    <?php while ($data2 = mysqli_fetch_array($hasil)) { ?>
                        <tbody>
                            <tr>
                                <td style="width: 60%;">Pendapatan Dari Penjualan</td>
                                <td style="width: 2px;">:</td>
                                <td style="width: 40%;">Rp <?= number_format($data2['laba'], 0, ',', '.') ?></td>
                            </tr>

                            <tr>
                                <td>Harga Pokok (Modal)</td>
                                <td>:</td>
                                <td>Rp <?= number_format($data2['harga_beli'], 0, ',', '.') ?></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan='2'>
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td style="font:weight: bold;">Laba Kotor</td>
                                <td style="font:weight: bold;">:</td>
                                <td style="font:weight: bold;">Rp
                                    <?php
                                    $laba = $data2['laba'];
                                    $harga_beli = $data2['harga_beli'];
                                    $laba_kotor = $laba - $harga_beli;

                                    echo number_format($laba_kotor, 0, ',', '.');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font:weight: bold;" colspan='3'>Beban :</td>
                            </tr>

                            <tr>
                                <td>Biaya Operasional</td>
                                <td>:</td>
                                <td>Rp <?= number_format($data2['rugi'], 0, ',', '.') ?></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan='2'>
                                    <hr>
                                </td>
                            </tr>

                            <tr>
                                <td style="font:weight: bold;">Laba Bersih</td>
                                <td style="font:weight: bold;">:</td>
                                <td style="font:weight: bold;">Rp
                                    <?php
                                    $laba = $data2['laba'];
                                    $harga_beli = $data2['harga_beli'];
                                    $rugi = $data2['rugi'];
                                    $laba_kotor = $laba - $harga_beli;
                                    $laba_bersih = $laba_kotor - $rugi;

                                    echo number_format($laba_bersih, 0, ',', '.');
                                    ?>
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
