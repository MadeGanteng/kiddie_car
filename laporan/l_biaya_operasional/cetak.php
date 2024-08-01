<?php
require('../../assets/vendor/fpdf/fpdf.php');
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($con, "SELECT * FROM biaya_operasional WHERE tgl_penggunaan BETWEEN '$tgl1' AND '$tgl2' ORDER BY tgl_penggunaan ASC");
    $label = 'LAPORAN DATA BIAYA OPERASIONAL <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = mysqli_query($con, "SELECT * FROM biaya_operasional ORDER BY tgl_penggunaan DESC");
    $label = 'LAPORAN DATA BIAYA OPERASIONAL';
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
    <title>Laporan Data Biaya Operasional</title>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#17A2B8" align="center">
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Penggunaan</th>
                            <th>Detail Biaya Operasional</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="center"><?= $data['nama_kegiatan'] ?></td>
                                <td align="center"><?= tgl($data['tgl_penggunaan']) ?></td>
                                <td align="center">
                                    <table border="1" cellspacing="0" cellpadding="6" width="100%">
                                        <thead>
                                            <tr bgcolor="#17A2B8" align="center">
                                                <th>Jenis Pengeluaran</th>
                                                <th>Jumlah</th>
                                                <th>biaya</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $d = $con->query("SELECT * FROM sub_biaya_operasional WHERE id_biaya_operasional = '$data[id_biaya_operasional]' ");
                                            while ($r = $d->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td align="left"><?= $r['jenis_pengeluaran'] ?></td>
                                                    <td align="center"><?= number_format($r['jumlah'],0,',','.') ?></td>
                                                    <td align="left">Rp <?= number_format($r['biaya'],0,',','.') ?></td>
                                                    <td align="left">Rp <?= number_format($r['sub_total'],0,',','.') ?></td>
                                                </tr>
                                               
                                            <?php } ?>

                                            <?php $e = $con->query("SELECT *, SUM(sub_total) AS total FROM sub_biaya_operasional WHERE id_biaya_operasional = '$data[id_biaya_operasional]' LIMIT 1");
                                            while ($r = $e->fetch_array()) {
                                            ?>
                                                
                                                <tr>
                                                    <td><b>Total Anggaran</b></td>
                                                    <td colspan='3' align="right"><b>Rp <?= number_format($r['total'],0,',','.') ?></b></td>
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
