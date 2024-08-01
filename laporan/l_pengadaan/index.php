<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'l_pengadaan';
include_once '../../template/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-arrows-alt ml-1 mr-1"></i> Data Pengadaan Barang</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="#" data-toggle="modal" data-target="#lap_pengadaan" class="btn btn-sm bg-dark"><i class="fa fa-print"> Cetak</i></a>
                </div><!-- /.col -->
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
                                            <th>Data Inventaris</th>
                                            <th>Lama Pakai</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Jumlah Pengajuan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT * FROM pengadaan a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON b.id_ruang = c.id_ruang ORDER BY id_pengadaan DESC");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td>
                                                    <b>Kode</b> : <?= $row['kd_barang'] ?><br>
                                                    <b>Nama</b> : <?= $row['nm_barang'] ?><br>
                                                    <b>Jenis</b> : <?= $row['jenis_barang'] ?><br>
                                                    <!-- <b>Tgl Inventaris</b> : <?= $row['tgl_inventaris'] ?><br> -->
                                                    <b>Tempat</b> : <?= $row['nm_ruang'] ?><br>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                    $tgl_1  = $row['tgl_inventaris'];
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
                                                <td align="center"><?= tgl($row['tgl_pengajuan']) ?></td>
                                                <td align="center"><?= $row['jumlah_pengajuan'] ?></td>
                                                
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


<div class="modal fade" id="lap_pengadaan" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Pengadaan Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('laporan/l_pengadaan/cetak') ?>">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label>Dari Tanggal</label>
                            <input type="date" class="form-control" name="tgl1" value="<?= $date_old ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label>Sampai Tanggal</label>
                            <input type="date" class="form-control" name="tgl2" value="<?= $date_now ?>" required>
                        </div>
                        <div class="col-md-2" style="margin-top: 31px;">
                            <button type="submit" name="cetak1" class="btn btn-info btn-sm"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-md-12 text-center">
                    <a href="<?= base_url('laporan/l_pengadaan/cetak') ?>" target="_blank" class="btn bg-purple btn-sm"><i class="fa fa-print"> </i> Cetak Semua </a>
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