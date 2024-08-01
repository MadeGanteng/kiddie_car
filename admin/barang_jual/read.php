<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'barang_jual';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM barang_jual WHERE id_barang ='$id'");
$row = $query->fetch_array();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-server ml-1 mr-1"></i> Detail Data Barang Penjualan</h4>
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
                                    <label class="col-sm-2 col-form-label">Harga Beli</label>
                                    <div class="col-sm-10">
                                        <div class="form-control"><?= $row['harga_beli'] ?>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Jual</label>
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
