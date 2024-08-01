<?php
require('../../assets/vendor/fpdf/fpdf.php');
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $ruang = $_POST['ruang'];

    $sql = mysqli_query($con, "SELECT * FROM barang, ruang where barang.id_ruang = ruang.id_ruang AND barang.musnah = 0 AND barang.id_ruang = '$ruang'");
    $dt = $con->query("SELECT * FROM ruang WHERE id_ruang = '$ruang'")->fetch_array();
    $label = 'LAPORAN DATA INVENTARIS BARANG <br> RUANGAN : ' . $dt['nm_ruang'];
    $pd = $con->query("SELECT * FROM barang")->fetch_array();

   
} else {
    $sql = mysqli_query($con, "SELECT * FROM barang, ruang where barang.id_ruang = ruang.id_ruang AND barang.musnah = 0");
    $label = 'LAPORAN DATA INVENTARIS BARANG';
    $pd = $con->query("SELECT * FROM barang")->fetch_array();

}

require_once '../../assets/vendor/autoload.php';


ob_start();
$pdf = new Fpdf('P');
$pdf->AddPage();
?>
<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Inventaris Barang</title>
    
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

   
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#17A2B8" align="center">
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Ruangan</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="left"><?= $data['kd_barang'] ?></td>
                                <td align="left"><?= $data['nm_barang'] ?></td>
                                <td align="left"><?= $data['jenis_barang'] ?></td>
                                <td align="left"><?= $data['satuan'] ?></td>
                                <td align="left"><?= $data['nm_ruang'] ?></td>
                                <td align="center"><img src="../../foto/<?php echo $data['foto']; ?>" width="70px" /></td>
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


