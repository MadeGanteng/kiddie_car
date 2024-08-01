<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'pembayaran';
include_once '../../template/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-arrows-alt ml-1 mr-1"></i> Data Pembayaran Pelanggan</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="tambah" class="btn btn-sm bg-dark"><i class="fa fa-plus-circle"> Tambah Data</i></a>
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
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>No Telepon</th>
                                            <th>Total Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT pembayaran.id_pembayaran,pembayaran.kode_trx, pembayaran.tgl_trx, SUM(sub_pembayaran.biaya) AS total, pembayaran.nama_pelanggan, pembayaran.no_telepon FROM pembayaran, sub_pembayaran where pembayaran.id_pembayaran = sub_pembayaran.id_pembayaran GROUP BY sub_pembayaran.id_pembayaran ORDER BY pembayaran.tgl_trx DESC");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td align="left"> <?= $row['kode_trx'] ?></td>
                                                <td align="center"> <?= tgl($row['tgl_trx']) ?></td>
                                                <td align="left"> <?= $row['nama_pelanggan'] ?></td>
                                                <td align="left"> <?= $row['no_telepon'] ?></td>
                                                <td align="left">Rp <?= number_format($row['total'], 0,',','.') ?></td>

                                                <td align="center" width="14%">
                                                     <!-- <a href="nota?id=<?= $row[0] ?>" class="btn btn-xs bg-blue" target="_BLANK" title="Nota Biaya Operasional"><i class="fa fa-sticky-note"></i></a> -->

                                                    <!-- <a href="surat?id=<?= $row[0] ?>" class="btn btn-xs bg-olive" target="_BLANK" title="Cetak"><i class="fa fa-print"></i></a> -->

                                                    <a href="edit?id=<?= $row[0] ?>" class="btn btn-primary btn-xs" title="Edit"><i class="fa fa-edit"></i></a>

                                                    <a href="hapus?id=<?= $row[0] ?>" class="btn btn-danger btn-xs alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
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

<?php
include_once '../../template/footer.php';
?>