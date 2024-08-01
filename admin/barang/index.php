<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'barang';
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
                                            <th>Data Inventaris</th>
                                            <th>Kondisi</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Tempat/Ruangan</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT * FROM barang, ruang where barang.id_ruang = ruang.id_ruang AND barang.musnah = 0  ORDER BY id_barang DESC");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td>
                                                    <b>Kode</b> : <?= $row['kd_barang'] ?><br>
                                                    <b>Nama</b> : <?= $row['nm_barang'] ?><br>
                                                    <b>Satuan</b> : <?= $row['satuan'] ?><br>
                                                    <b>Jenis Barang</b> : <?= $row['jenis_barang'] ?>
                                                </td>
                                                
                                                <td align="center"><?= $row['kondisi'] ?></td>
                                                <td align="center">Rp <?= number_format($row['harga'],0,',','.') ?></td>
                                                <td align="center"><?= $row['jumlah_barang'] ?></td>
                                                <td align="center"><?= $row['nm_ruang'] ?></td>
                                                <td align="center">
                                                    <img src="../../foto/<?php echo $row['foto']; ?>" width="70px" />
                                                </td>
                                                <td align="center" width="11%">
                                                    <a href="read?id=<?= $row[0] ?>" class="btn btn-warning btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>
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