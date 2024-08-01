<?php
include_once '../../app/config.php';

$id = $_GET['id'];
$data = $con->query("SELECT *, SUM(sub_total) AS total FROM biaya_operasional, sub_biaya_operasional WHERE biaya_operasional.id_biaya_operasional = '$id' AND biaya_operasional.id_biaya_operasional = sub_biaya_operasional.id_biaya_operasional GROUP BY sub_biaya_operasional.id_biaya_operasional");
$row = $data->fetch_array();

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
ob_start();
?>

<html>

<head>
    <title>Biaya Operasional <?= $row['nama_kegiatan'] ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">

</head>

<body bgcolor="#FFFFFF">
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
    <table width="670" border="0" cellspacing="2" cellpadding="2" align="center">
        <tr>
            <td align="center">
                <h4><b>DAFTAR PENGELUARAN BIAYA OPERASIONAL <br>
                ANGGARAN BULAN  <?= strtoupper($row['bulan']) ?> <?= strtoupper($row['tahun']) ?> <br>

                </b>
                </h4>
                <!-- <h5> <u>Nomor : <?= $row['no_surat'] ?></u></h5> -->
            </td>
        </tr>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <div>
                <td>
                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tr>
                            <td align="justify">Pada Hari <?= hari($row['tgl_penggunaan']) ?>, Tanggal <?= tgl($row['tgl_penggunaan']) ?> telah menggunakan anggaran untuk keperluan  <b> <?= $row['nama_kegiatan'] ?></b> dengan rincian sebagai berikut :</td>
                        </tr>
                        <tr>
                            <td>&nbsp;<br></td>
                        </tr>
                        <tr>
                            <td>
                                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Jenis Pengeluaran</th>
                                            <th>Jumlah</th>
                                            <th>Biaya</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $d = $con->query("SELECT * FROM sub_biaya_operasional WHERE id_biaya_operasional = '$row[id_biaya_operasional]' ");
                                        while ($r = $d->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td><?= $r['jenis_pengeluaran'] ?></td>
                                                <td align="right"><?= number_format($r['jumlah'], 0, ',','.') ?></td>
                                                <td align="right">Rp <?= number_format($r['biaya'], 0, ',','.') ?></td>
                                                <td align="right">Rp <?= number_format($r['sub_total'], 0, ',','.') ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <th>Total Pengeluaran</th>
                                            <th colspan="3" align="right">Rp <?= number_format($row['total'], 0, ',','.') ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;<br></td>
                        </tr>
                        <tr>
                            <td>Demikian penggunaan biaya operasional anggaran ini kami buat berdasarkaan keadaan yang sebenarnya atas perhatian dan kerja samanya kami mengucapkan terima kasih.</td>
                        </tr>
                    </table>
                </td>
            </div>
        </tr>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <td>&nbsp;<br></td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="50%"></td>
                        <td width="10%"></td>
                        <td width="40%" align="center">Disetujui oleh,<br>
                            Kasubbag Umpeg

                        </td>
                    </tr>
                    <tr>
                        <td width="50%"><br>
                            <p class="signature"></p>
                        </td>

                        <td width="30%"><br><br><br><br><br><br></td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td width="10%"></td>
                        <td width="40%"></td>
                    </tr>
                    <tr>
                        <td width="50%" align="left">

                        </td>
                        <td width="10%"></td>
                        <td width="40%" align="left">
                            <p style="text-align: center;"><br></p>
                            <hr size="1" width="100%" color="#000000">
                        </td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td width="10%"></td>
                        <td width="40%" align="center">Rabiatul Adawiyah, S.P</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>

        </tr>
    </table>

</body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>