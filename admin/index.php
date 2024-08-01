<?php
require '../app/config.php';
include_once '../template/header.php';
$page = 'dashboard';
include_once '../template/sidebar.php';

$total_barang = $con->query("SELECT COUNT(*) AS total FROM barang WHERE musnah = 0")->fetch_assoc();
$total_barang_musnah = $con->query("SELECT COUNT(*) AS total FROM barang WHERE musnah = 1")->fetch_assoc();
$total_mutasi_barang = $con->query("SELECT COUNT(*) AS total FROM mutasi")->fetch_assoc();

$total_barang_jual = $con->query("SELECT COUNT(*) AS total FROM barang_jual")->fetch_assoc();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        Dashboard
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $total_barang['total']; ?></h3>
                            <p>Total Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $total_barang_musnah['total']; ?></h3>
                            <p>Total Barang Rusak</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo $total_mutasi_barang['total']; ?></h3>
                            <p>Total Mutasi Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-swap"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $total_barang_jual['total']; ?></h3>
                            <p>Total Barang dijual</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-usd"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>


      
                </section>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

          

        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? ',' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>

<?php
include_once '../template/footer.php';
?>