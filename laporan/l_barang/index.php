<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'l_barang';
include_once '../../template/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-cube ml-1 mr-1"></i> Data Inventaris Barang</h4>
                </div><!-- /.col -->

                <div class="col-sm-6 text-right">
                    <a href="#" data-toggle="modal" data-target="#lap_barang" class="btn btn-sm bg-dark"><i class="fa fa-print"> Cetak</i></a>
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

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped dataTable">
                                    <thead class="bg-lightblue">
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Data Barang</th>
                                            <th>Gambar</th>
                                            <th>Tempat/Ruangan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT * FROM barang, ruang where barang.id_ruang = ruang.id_ruang AND barang.musnah = 0 ORDER BY id_barang DESC");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td>
                                                    <b>Kode</b> : <?= $row['kd_barang'] ?><br>
                                                    <b>Nama</b> : <?= $row['nm_barang'] ?><br>
                                                    <b>Satuan</b> : <?= $row['satuan'] ?><br>
                                                    <b>Jenis Barang</b> : <?= $row['jenis_barang'] ?> <br>
                                                    <?php if ($row['kondisi'] != '') { ?>
                                                        <b>Kondisi</b> : <?= $row['kondisi'] ?>
                                                    <?php } ?> <br>
                                                    <?php if ($row['jumlah_barang'] >= 1) { ?>
                                                        <b>Jumlah Barang</b> : <?= $row['jumlah_barang'] ?>
                                                    <?php } ?>
                                                    <?php if ($row['jumlah_barang'] <= 0 && $row['jenis_barang'] == 'Barang Habis Pakai') { ?>
                                                        <b>Jumlah Barang</b> : <?= $row['jumlah_barang'] ?>
                                                    <?php } ?>
                                                    
                                                </td>
                                                <td align="center">
                                                    <img src="../../foto/<?php echo $row['foto']; ?>" width="70px" />
                                                </td>
                                                <td align="center"><?= $row['nm_ruang'] ?></td>
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


<div class="modal fade" id="lap_barang" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Inventaris Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('laporan/l_barang/cetak') ?>">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <label>Nama Ruangan / Tempat</label>
                            <select name="ruang" class="form-control" style="width: 100%;" required>
                                <option value="">-- Pilih --</option>
                                <?php $data = $con->query("SELECT * FROM ruang ORDER BY id_ruang ASC"); ?>
                                <?php foreach ($data as $row) : ?>
                                    <option value="<?php echo $row['id_ruang'] ?>"><?php echo $row['nm_ruang'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-2" style="margin-top: 31px;">
                            <button type="submit" name="cetak1" class="btn btn-info btn-sm"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="col-md-12 text-center">
                    <a href="<?= base_url('laporan/l_barang/cetak') ?>" target="_blank" class="btn bg-purple btn-sm"><i class="fa fa-print"> </i> Cetak Semua </a>
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