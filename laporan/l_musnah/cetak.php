<?php
require('../../assets/vendor/fpdf/fpdf.php');
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($con, "SELECT * FROM musnah a LEFT JOIN barang b ON a.id_barang = b.id_barang WHERE tgl_musnah BETWEEN '$tgl1' AND '$tgl2' ORDER BY a.tgl_musnah ASC");
    $label = 'LAPORAN DATA PEMUSNAHAN BARANG <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = mysqli_query($con, "SELECT * FROM musnah a LEFT JOIN barang b ON a.id_barang = b.id_barang ORDER BY a.tgl_musnah DESC");
    $label = 'LAPORAN DATA PEMUSNAHAN BARANG';
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
    <title>Laporan Data Pemusnahan Barang</title>
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
                            <th>Kode Inventaris</th>
                            <th>Nama Inventaris</th>
                            <th>Jenis Barang</th>
                            <th>Satuan</th>
                            <th>Tanggal Pemusnahan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="left"><?= $data['kd_barang'] ?></td>
                                <td align="left"><?= $data['nm_barang'] ?></td>
                                <td align="left"><?= $data['jenis_barang'] ?></td>
                                <td align="center"><?= $data['satuan'] ?></td>
                                <td align="center"><?= tgl($data['tgl_musnah']) ?></td>
                                <td><?= $data['ket'] ?></td>
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
                        Banjarmasin <br>
                        <br><br><br><br>
                        <u>Admin</u><br>
                    </h6>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
