<?php
include '../../app/config.php';

$no = 1;

if (isset($_POST['cetak1'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($con, "SELECT * FROM pengadaan a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON b.id_ruang = c.id_ruang WHERE tgl_pengajuan BETWEEN '$tgl1' AND '$tgl2' ORDER BY a.tgl_pengajuan ASC");
    $label = 'LAPORAN DATA PENGADAAN INVENTARIS <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = mysqli_query($con, "SELECT * FROM pengadaan a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON b.id_ruang = c.id_ruang ORDER BY a.tgl_pengajuan DESC");
    $label = 'LAPORAN DATA PENGADAAN INVENTARIS';
}

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'LEGAL-L']);
ob_start();
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pengadaan Inventaris</title>
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
                    <h4>PEMERINTAH KOTA BANJARBARU</h4>
                    <h2>DINAS KETAHANAN PANGAN, PERTANIAN DAN PERIKANAN</h2>
                    <h6>Jl. KH Agus Salim, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70711</h6>
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
                            <th>Kode Inventaris</th>
                            <th>Nama Inventaris</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Lama Pakai</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah Pengajuan</th>
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
                                        $tgl_1  = $data['tgl_inventaris'];
                                        $awal  = new DateTime($tgl_1);
                                        $akhir = new DateTime(); // Waktu sekarang
                                        $diff  = $awal->diff($akhir);
                                        if ($diff->m <= 0) {
                                            echo $diff->d . ' Hari';
                                        } else {
                                            echo $diff->m . ' Bulan '.$diff->d . ' Hari';
                                        }
                                    ?>
                                </td>
                                <td align="center"><?= tgl($data['tgl_pengajuan']) ?></td>
                                <td align="center"><?= $data['jumlah_pengajuan'] ?></td>

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