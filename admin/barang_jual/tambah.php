<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'barang_jual';
include_once '../../template/sidebar.php';

// $cek = $con->query("SELECT max(kd_barang) AS no FROM barang");
// $data = $cek->fetch_array();
// $no = $data['no'];
// $nourut = (int) substr($no, 10, 11);
// $nourut++;
// $a = "INV/";
// $num = $a . sprintf('%06s', $nourut);


$tes = $con->query("SELECT  AUTO_INCREMENT AS nilai FROM information_schema.tables WHERE  Table_SCHEMA = 'skripsi_renaldi' AND table_name = 'barang_jual'");
$data = $tes->fetch_array();
$nilai = $data['nilai']+1;
// $nourut = (int) substr($nilai, 10, 11);
$a = "BRG/";
$num = $a . sprintf('%06s', $nilai);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-server ml-1 mr-1"></i> Tambah Data Barang Penjualan </h4>
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
                            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kd_barang" value="<?php echo $num; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_barang" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="satuan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_barang"  required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Beli</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="harga_beli">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Jual</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="harga">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stok Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jumlah_barang">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar Barang</label>
                                    <div class="col-sm-5">
                                        <input type="file" id="foto" name="foto" required>
                                        <p class="help-block">
                                            <font color="red">"Format file Jpg/Png"</font>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm bg-cyan float-right"><i class="fa fa-save"> Simpan</i></button>
                                        <button type="reset" class="btn btn-sm btn-danger float-right mr-1"><i class="fa fa-times-circle"> Batal</i></button>
                                    </div>
                                </div>
                            </form>
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

<?php
$sumber = @$_FILES['foto']['tmp_name'];
$target = '../../foto/';
$nama_file = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['submit'])) {
   
    if (!empty($sumber)) {
        $sql_simpan = "INSERT INTO barang_jual(kd_barang, nm_barang, satuan, jenis_barang,  jumlah_barang, harga_beli, harga, foto) VALUES (
            '" . $_POST['kd_barang'] . "',
			 '" . $_POST['nm_barang'] . "',
			'" . $_POST['satuan'] . "',
			'" . $_POST['jenis_barang'] . "',
			'" . $_POST['jumlah_barang'] . "',
			'" . $_POST['harga_beli'] . "',
			'" . $_POST['harga'] . "',
            '" . $nama_file . "')";
        $tambah = mysqli_query($con, $sql_simpan);
        mysqli_close($con);

        if ($tambah) {
            $_SESSION['pesan'] = "Data Berhasil di Simpan";
            echo "<meta http-equiv='refresh' content='0; url=index'>";
        } else {
            echo "Data anda gagal disimpan. Ulangi sekali lagi";
            echo "<meta http-equiv='refresh' content='0; url=tambah'>";
        }
    }
}
