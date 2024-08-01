<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'l_laba';
include_once '../../template/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="text-left">
                    <a href="#" onClick="history.go(-1);" class="btn btn-sm bg-dark"><i class="fa fa-arrow-left"> Kembali</i></a>
                </div>
                <div class="col-sm-5">
                    <h4 class="m-0 text-dark"><i class="fa fa-user ml-1 mr-1"></i> Data Rugi</h4>
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
                                            <th>Rugi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT month(biaya_operasional.tgl_penggunaan) AS bulan, year(biaya_operasional.tgl_penggunaan) AS tahun, SUM(sub_biaya_operasional.sub_total) AS hasil FROM biaya_operasional, sub_biaya_operasional WHERE biaya_operasional.id_biaya_operasional = sub_biaya_operasional.id_biaya_operasional GROUP BY month(biaya_operasional.tgl_penggunaan), year(biaya_operasional.tgl_penggunaan)");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td align="center"><?php echo bulan($row['bulan']) ?></td>
                                                
                                                <td align="center">Rp <?= number_format($row['hasil'],0,',','.') ?></td>
                                                
                                                 
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
                <h4 class="modal-title">Laporan Data Rugi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('laporan/l_laba/cetak_rugi') ?>">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <label>Bulan, Tahun</label>
                            <input type="month" class="form-control" name="bulan" value="<?= $date_old ?>" required>
                        </div>
                       
                        <div class="col-md-2" style="margin-top: 31px;">
                            <button type="submit" name="cetak1" class="btn btn-info btn-sm"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-md-12 text-center">
                    <a href="<?= base_url('laporan/l_laba/cetak_rugi') ?>" target="_blank" class="btn bg-purple btn-sm"><i class="fa fa-print"> </i> Cetak Semua </a>
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