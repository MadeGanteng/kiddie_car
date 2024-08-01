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
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-server ml-1 mr-1"></i> Data Laba Rugi</h4>
                </div><!-- /.col -->
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-teal">
                        <span class="info-box-icon"><i class="fa fa-cube"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="laba.php">Laporan Data Laba</a></span>
                            <span class="info-box-number">
                                <?php $laba = $con->query("SELECT SUM(sub_penjualan.sub_total) AS laba FROM sub_penjualan")->fetch_array();
                                ?>
                                Rp <?php echo number_format($laba['laba'],0,',','.') ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-red">
                        <span class="info-box-icon"><i class="fa fa-cube"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="rugi.php">Laporan Data Rugi</a></span>
                            <span class="info-box-number">
                                 <?php $rugi = $con->query("SELECT SUM(sub_biaya_operasional.sub_total) AS rugi FROM sub_biaya_operasional")->fetch_array();
                                ?>
                               Rp <?php echo number_format($rugi['rugi'],0,',','.') ?></span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../../template/footer.php';
?>