<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'barang';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM barang WHERE id_barang ='$id'");
$row = $query->fetch_array();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-server ml-1 mr-1"></i> Detail Data Inventaris Barang</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 float-right">
                    <a href="#" onClick="history.go(-1);" class="btn btn-xs bg-dark float-right"><i class="fa fa-arrow-left"> Kembali</i></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-purple card-outline">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body" style="background-color: white;">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Barang</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['kd_barang'] ?>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['nm_barang'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['satuan'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['jenis_barang'] ?>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kondisi</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['kondisi'] ?>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Barang</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['harga'] ?>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stok Barang</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['jumlah_barang'] ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Ruangan</label>
                                    <div class="col-sm-10">
                                        <select name="id_ruang" class="form-control" style="background-color: white; width: 100%;" disabled>
                                            <?php
                                            $q = $con->query("SELECT * FROM ruang ORDER BY id_ruang DESC");
                                            while ($d = $q->fetch_array()) {
                                                if ($d['id_ruang'] == $row['id_ruang']) {
                                            ?>
                                                    <option value="<?= $d['id_ruang']; ?>" selected="<?= $d['id_ruang']; ?>"><?= $d['nm_ruang'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?= $d['id_ruang'] ?>"><?= $d['nm_ruang'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar Barang</label>
                                    <div class="col-sm-10">
                                        <div>
                                        <img src="../../foto/<?php echo $row['foto']; ?>" width="200px" />
                                        </div>
                                    </div>
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
