<?php
require('../../assets/vendor/fpdf/fpdf.php');
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($con, "SELECT * FROM mutasi a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON c.id_ruang = a.id_ruang WHERE tgl_mutasi BETWEEN '$tgl1' AND '$tgl2' ORDER BY a.tgl_mutasi ASC");
    $label = 'LAPORAN DATA MUTASI INVENTARIS <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = mysqli_query($con, "SELECT * FROM mutasi a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON c.id_ruang = a.id_ruang ORDER BY a.tgl_mutasi DESC");
    $label = 'LAPORAN DATA MUTASI INVENTARIS';
}

require_once '../../assets/vendor/autoload.php';
$pdf = new Fpdf('P');
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Mutasi Inventaris</title>
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan</th>
                            <th>Ruangan Lama</th>
                            <th>Ruangan Sekarang</th>
                            <th>Tanggal Mutasi</th>
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
                                <td align="left">
                                    <?php
                                    $dt = $con->query("SELECT * FROM ruang WHERE id_ruang = '$data[id_ruang_lama]' ")->fetch_array();
                                    echo $dt['nm_ruang'];
                                    ?>
                                </td>
                                <td align="left"><?= $data['nm_ruang'] ?></td>
                                <td align="center"><?= tgl($data['tgl_mutasi']) ?></td>
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