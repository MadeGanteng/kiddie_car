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
                    <h4 class="m-0 text-dark"><i class="fa fa-server ml-1 mr-1"></i> Foto <?= $row['nm_barang'] ?></h4>
                </div><!-- /.col -->
                <div class="col-sm-6 float-right">
                    <a href="index.php" class="btn btn-xs bg-dark float-right"><i class="fa fa-arrow-left"> Kembali</i></a>
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
                                    <div class="col-sm-10">
                                        <div>
                                        <img src="../../foto/<?php echo $row['foto']; ?>" width="700px" />
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
