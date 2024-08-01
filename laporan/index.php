<?php
require '../app/config.php';
include_once '../template/header.php';
$page = 'dashboard';
include_once '../template/sidebar.php';

$barang = $con->query("SELECT COUNT(*) AS total FROM barang WHERE musnah = 0 ")->fetch_array();
$kondisi = $con->query("SELECT COUNT(*) AS total FROM kondisi")->fetch_array();
$mutasi = $con->query("SELECT COUNT(*) AS total FROM mutasi")->fetch_array();
$musnah = $con->query("SELECT COUNT(*) AS total FROM musnah")->fetch_array();
$berita_acara = $con->query("SELECT COUNT(*) AS total FROM berita_acara")->fetch_array();
$pengadaan = $con->query("SELECT COUNT(*) AS total FROM pengadaan")->fetch_array();
$perawatan = $con->query("SELECT COUNT(*) AS total FROM perawatan")->fetch_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="info-box mb-3 bg-white">
                        <span class="info-box-icon"><i class="fas fa-server"></i></span>

                        <div class="info-box-content"> 
                            <span class="info-box-text"><a style="color: black; font-weight: bold;" href="barang/index.php">Data Barang Inventaris</a></span>
                            <span class="info-box-number"><?= $barang['total'] ?> Data</span>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-red">
                        <span class="info-box-icon"><i class="fas fa-temperature-high"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="kondisi/index.php">Data Kondisi Barang</a></span>
                            <span class="info-box-number"><?= $kondisi['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-teal">
                        <span class="info-box-icon"><i class="fas fa-cubes"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="mutasi/index.php">Data Mutasi Barang</a></span>
                            <span class="info-box-number"><?= $mutasi['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-orange">
                        <span class="info-box-icon"><i style="color: white; font-weight: bold;" class="fas fa-trash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="musnah/index.php">Data Pemusnahan Barang</a></span>
                            <span class="info-box-number" style="color: white; font-weight: bold;"><?= $musnah['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-cyan">
                        <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="berita-acara/index.php">Data Berita Acara</a></span>
                            <span class="info-box-number"><?= $berita_acara['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-yellow">
                        <span class="info-box-icon"><i style="color: white; font-weight: bold;" class="fas fa-arrows-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="pengadaan/index.php">Data Pengadaan Barang</a></span>
                            <span class="info-box-number" style="color: white; font-weight: bold;"><?= $pengadaan['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box mb-3 bg-blue">
                        <span class="info-box-icon"><i style="color: white; font-weight: bold;" class="fas fa-cogs"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><a style="color: white; font-weight: bold;" href="perawatan/index.php">Data Perawatan Barang</a></span>
                            <span class="info-box-number" style="color: white; font-weight: bold;"><?= $perawatan['total'] ?> Data</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                

            </div>

            <div>
            <h4>Grafik Dana Anggaran dan Biaya Operasional Berdasarkan Bulan</h4>
                 <script type="text/javascript" src="../chartjs/Chart.js"></script>
                            
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
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template/footer.php';
?>