<?php
require('../../assets/vendor/fpdf/fpdf.php');
include '../../app/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$no = 1;

if (isset($_POST['cetak1'])) {

    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($con, "SELECT * FROM penjualan WHERE tgl_trx BETWEEN '$tgl1' AND '$tgl2'");
    $label = 'LAPORAN DATA PENJUALAN BARANG ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = mysqli_query($con, "SELECT * FROM penjualan ORDER BY tgl_trx DESC");
    $label = 'LAPORAN DATA PENJUALAN BARANG';
}

$pdf = new FPDF('P');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'PT Kiddie Car', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(0, 3, 'Jl. A. Yani No.98, Melayu, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70232 Dutamall lantai dasar', 0, 1, 'C');
$pdf->SetLineWidth(.1);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, $label, 0, 1, 'C');
$pdf->Ln(1);



$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(23, 162, 184);
$pdf->SetTextColor(0); // Set text color to black
$pdf->SetDrawColor(221, 221, 221);
$pdf->SetLineWidth(.3);
$pdf->SetFont('', 'B');
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Kode Transaksi', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Tanggal Transaksi', 1, 0, 'C', true);
$pdf->Cell(80, 10, 'Detail Penjualan', 1, 1, 'C', true);

$pdf->SetFont('Arial', '');

while ($data = mysqli_fetch_array($sql)) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(50, 10, $data['kode_trx'], 1, 0, 'C');
    $pdf->Cell(50, 10, tgl($data['tgl_trx']), 1, 0, 'C');

    $detail = "";
    $d = $con->query("SELECT * FROM sub_penjualan a LEFT JOIN barang_jual b ON a.id_barang = b.id_barang WHERE a.id_penjualan = '$data[id_penjualan]' ");
    while ($r = $d->fetch_array()) {
        $detail .= $r['nm_barang'] . " (" . number_format($r['jumlah_jual'], 0, ',', '.') . " pcs) - Rp " . number_format($r['sub_total'], 0, ',', '.') . "\n";
    }

    $pdf->SetLineWidth(0);
    $pdf->Cell(80, 10, $detail, 1, 0, 'P');
    $pdf->SetLineWidth(.3);

    $pdf->Cell(10, 1, '', 0, 0, 'C');
    $pdf->Cell(50, 10, '', 0, 0, 'C');
    $pdf->Cell(50, 10, '', 0, 0, 'C');
    $pdf->Cell(80, 10, '', 0, 1, 'C');
}

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Banjarmasin, ' . tgl_indo(date('Y-m-d')), 0, 1, 'R');

$pdf->Ln(20);
$pdf->SetFont('Arial', 'U', 10);
$pdf->Cell(0, 10, 'Admin', 0, 1, 'R');

$pdf->Output();
?>
<script type="text/javascript">
    window.print();
</script>
