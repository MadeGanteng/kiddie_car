<?php
include_once '../../app/config.php';

$id = $_GET['id'];
$data = $con->query("SELECT * FROM berita_acara WHERE id_berita_acara = '$id'");
$row = $data->fetch_array();

require_once '../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
ob_start();
?>

<html>

<head>
    <title>Berita Acara <?= $row['jenis'] ?></title>
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
                <h4><b>BERITA ACARA <?= strtoupper($row['jenis']) ?></b>
                </h4>
                <h5> <u>Nomor : <?= $row['no_surat'] ?></u></h5>
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
                            <td align="justify">Pada Hari <?= hari($row['tanggal']) ?>, Tanggal <?= tgl($row['tanggal']) ?> Bertempat di DKP3 BANJARBARU telah melaksanakan <?= $row['jenis'] ?> barang yaitu :</td>
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
                                            <th>Nama Inventaris</th>
                                            <th>Kode</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $d = $con->query("SELECT * FROM sub_berita_acara a LEFT JOIN barang b ON a.id_barang = b.id_barang WHERE a.id_berita_acara = '$row[id_berita_acara]' ");
                                        while ($r = $d->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td align="center"><?= $r['nm_barang'] ?></td>
                                                <td align="center"><?= $r['kd_barang'] ?></td>
                                                <td><?= $r['ket'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;<br></td>
                        </tr>
                        <tr>
                            <td>Demikian Berita Acara ini kami buat berdasarkaan keadaan yang sebenarnya atas perhatian dan kerja samanya kami mengucapkan terima kasih</td>
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