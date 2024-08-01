<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'l_laba';
include_once '../../template/sidebar.php';
?>

<?php
$data = $con->query("SELECT month(penjualan.tgl_trx) AS bulan, year(penjualan.tgl_trx) AS tahun, SUM(sub_penjualan.sub_total) AS hasil FROM penjualan, sub_penjualan WHERE penjualan.id_penjualan = sub_penjualan.id_penjualan GROUP BY month(penjualan.tgl_trx), year(penjualan.tgl_trx)");
while ($row = $data->fetch_array()) {
?>
    <?php

    $bulan = $row['bulan'];
    $hasil = $row['hasil'];
    $con->query("UPDATE laba_rugi SET laba = '$hasil' WHERE laba_rugi.bulan = '$bulan';");

    ?>
<?php } ?>

<?php
$data2 = $con->query("SELECT month(penjualan.tgl_trx) AS bulan2, SUM(sub_penjualan.total_beli) AS hasil2 FROM penjualan, sub_penjualan, barang_jual WHERE penjualan.id_penjualan = sub_penjualan.id_penjualan AND sub_penjualan.id_barang = barang_jual.id_barang GROUP BY month(penjualan.tgl_trx), year(penjualan.tgl_trx)");
while ($row2 = $data2->fetch_array()) {
?>
    <?php
    $bulan2 = $row2['bulan2'];
    $hasil2 = $row2['hasil2'];
    $con->query("UPDATE laba_rugi SET harga_beli = '$hasil2' WHERE laba_rugi.bulan = '$bulan2';");
    ?>
<?php } ?>

<?php
$data1 = $con->query("SELECT month(biaya_operasional.tgl_penggunaan) AS bulan1, year(biaya_operasional.tgl_penggunaan) AS tahun, SUM(sub_biaya_operasional.sub_total) AS hasil1 FROM biaya_operasional, sub_biaya_operasional WHERE biaya_operasional.id_biaya_operasional = sub_biaya_operasional.id_biaya_operasional GROUP BY month(biaya_operasional.tgl_penggunaan), year(biaya_operasional.tgl_penggunaan)");
while ($row1 = $data1->fetch_array()) {
?>
    <?php
    $bulan1 = $row1['bulan1'];
    $hasil1 = $row1['hasil1'];
    $con->query("UPDATE laba_rugi SET rugi = '$hasil1' WHERE laba_rugi.bulan = '$bulan1';");
    ?>
<?php } ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-arrows-alt ml-1 mr-1"></i> Data Laba Rugi</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="#" data-toggle="modal" data-target="#lap_penjualan_barang" class="btn btn-sm bg-dark"><i class="fa fa-print"> Cetak</i></a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-purple card-outline">
                        <!-- form start -->
                        <div class="card-body" style="background-color: white;">

                            <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                                <div id="notif" class="alert bg-teal" role="alert"><i class="fa fa-check-circle mr-2"></i><b><?= $_SESSION['pesan'] ?></b></div>
                            <?php $_SESSION['pesan'] = '';
                            } ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead class="bg-lightblue">
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Laba Kotor</th>
                                            <!-- <th>Laba Kotor</th> -->
                                            <th>Beban</th>
                                            <th>Laba Bersih</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT * FROM laba_rugi");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>

                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td align="left"><?php echo bulan($row['bulan']) ?></td>
                                                <td align="left">Rp <?php echo number_format($row['harga_beli'], 0, ',', '.') ?></td>
                                                <td align="left">Rp <?php echo number_format($row['rugi'], 0, ',', '.') ?></td>

                                                <td align="left">Rp
                                                    <?php
                                                    $laba = $row['laba'];
                                                    $harga_beli = $row['harga_beli'];
                                                    $rugi = $row['rugi'];
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
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (left) -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="lap_penjualan_barang" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Laba Rugi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('laporan/l_laba/cetak_hasil') ?>">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan" id="bulan">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <!-- <input type="month" class="form-control" name="bulan" required> -->
                        </div>

                        <div class="col-md-2" style="margin-top: 31px;">
                            <button type="submit" name="cetak1" class="btn btn-info btn-sm"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-md-12 text-center">
                    <a href="<?= base_url('laporan/l_laba/cetak_hasil') ?>" target="_blank" class="btn bg-purple btn-sm"><i class="fa fa-print"> </i> Cetak Semua </a>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php
include_once '../../template/footer.php';
?>