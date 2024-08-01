<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'grafik_anggaran';
include_once '../../template/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-clipboard ml-1 mr-1"></i> Data List Anggaran</h4>
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
                            <script type="text/javascript" src="../../chartjs/Chart.js"></script>
                            
                            <div style="width: 1000px; margin: 0px auto;">
		                        <canvas id="myChart"></canvas>
	                        </div>
        <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Dana Anggaran ',
					data: [
                
					<?php 
                    $januari1 = $con->query("SELECT SUM(sub_list_anggaran.sub_total)  AS total1, list_anggaran.bulan FROM sub_list_anggaran, list_anggaran where sub_list_anggaran.id_list_anggaran = list_anggaran.id_list_anggaran AND list_anggaran.bulan = 'Januari' GROUP BY sub_list_anggaran.id_list_anggaran");
                    while ($row = mysqli_fetch_array($januari1)) {
					echo $row['total1'];
                    } ?>,
                
                    <?php 
                    $februari1 = $con->query("SELECT SUM(sub_list_anggaran.sub_total)  AS total1, list_anggaran.bulan FROM sub_list_anggaran, list_anggaran where sub_list_anggaran.id_list_anggaran = list_anggaran.id_list_anggaran AND list_anggaran.bulan = 'Februari' GROUP BY sub_list_anggaran.id_list_anggaran");
                    while ($row = mysqli_fetch_array($februari1)) {
					echo $row['total1'];
                    } ?>,
            
                    <?php 
                    $maret1 = $con->query("SELECT SUM(sub_list_anggaran.sub_total)  AS total1, list_anggaran.bulan FROM sub_list_anggaran, list_anggaran where sub_list_anggaran.id_list_anggaran = list_anggaran.id_list_anggaran AND list_anggaran.bulan = 'maret' GROUP BY sub_list_anggaran.id_list_anggaran");
                    while ($row = mysqli_fetch_array($maret1)) {
					echo $row['total1'];
                    } ?>,

                    <?php 
                    $april1 = $con->query("SELECT SUM(sub_list_anggaran.sub_total)  AS total1, list_anggaran.bulan FROM sub_list_anggaran, list_anggaran where sub_list_anggaran.id_list_anggaran = list_anggaran.id_list_anggaran AND list_anggaran.bulan = 'April' GROUP BY sub_list_anggaran.id_list_anggaran");
                    while ($row = mysqli_fetch_array($april1)) {
					echo $row['total1'];
                    } ?>,

                    <?php 
                    $mei = $con->query("SELECT SUM(sub_list_anggaran.sub_total)  AS total1, list_anggaran.bulan FROM sub_list_anggaran, list_anggaran where sub_list_anggaran.id_list_anggaran = list_anggaran.id_list_anggaran AND list_anggaran.bulan = 'Mei' GROUP BY sub_list_anggaran.id_list_anggaran");
                    while ($row = mysqli_fetch_array($mei)) {
					echo $row['total1'];
                    } ?>,

					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				},
                {
					label: 'Biaya Operasional ',
					data: [
                
					<?php 
                    $januari = $con->query("SELECT SUM(sub_biaya_operasional.sub_total)  AS total, biaya_operasional.bulan FROM sub_biaya_operasional, biaya_operasional where sub_biaya_operasional.id_biaya_operasional = biaya_operasional.id_biaya_operasional AND biaya_operasional.bulan = 'Januari' GROUP BY sub_biaya_operasional.id_biaya_operasional");
                    while ($row = mysqli_fetch_array($januari)) {
					echo $row['total'];
                    } ?>,

					<?php 
                    $februari = $con->query("SELECT SUM(sub_biaya_operasional.sub_total)  AS total, biaya_operasional.bulan FROM sub_biaya_operasional, biaya_operasional where sub_biaya_operasional.id_biaya_operasional = biaya_operasional.id_biaya_operasional AND biaya_operasional.bulan = 'Februari' GROUP BY sub_biaya_operasional.id_biaya_operasional");
                    while ($row = mysqli_fetch_array($februari)) {
					echo $row['total'];
                    } ?>,

					<?php 
                    $maret = $con->query("SELECT SUM(sub_biaya_operasional.sub_total)  AS total, biaya_operasional.bulan FROM sub_biaya_operasional, biaya_operasional where sub_biaya_operasional.id_biaya_operasional = biaya_operasional.id_biaya_operasional AND biaya_operasional.bulan = 'Maret' GROUP BY sub_biaya_operasional.id_biaya_operasional");
                    while ($row = mysqli_fetch_array($maret)) {
					echo $row['total'];
                    } ?>,

					<?php 
                    $april = $con->query("SELECT SUM(sub_biaya_operasional.sub_total)  AS total, biaya_operasional.bulan FROM sub_biaya_operasional, biaya_operasional where sub_biaya_operasional.id_biaya_operasional = biaya_operasional.id_biaya_operasional AND biaya_operasional.bulan = 'April' GROUP BY sub_biaya_operasional.id_biaya_operasional");
                    while ($row = mysqli_fetch_array($april)) {
					echo $row['total'];
                    } ?>,

					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}
            ]
			},
			options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            // callback: function(value, index, values) {
                            //     return '$ ' + number_format(value);
                            // }
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, chart){
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel, 0);
                        }
                    }
                }
            }

		});
	</script>                            
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
            toFixedFix = function (n, prec) {
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
include_once '../../template/footer.php';
?>