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
                    <h4 class="m-0 text-dark"><i class="fa fa-server ml-1 mr-1"></i> Edit Data Inventaris Barang</h4>
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
                                        <input type="text" class="form-control" name="kd_barang" value="<?= $row['kd_barang'] ?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_barang" value="<?= $row['nm_barang'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="satuan" value="<?= $row['satuan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_barang" value="<?= $row['jenis_barang'] ?>" required>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kondisi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kondisi"  value="<?= $row['kondisi'] ?>" required >
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="harga"  value="<?= $row['harga'] ?>" required >
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stok Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jumlah_barang"  value="<?= $row['jumlah_barang'] ?>" required >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Ruangan</label>
                                    <div class="col-sm-10">
                                        <select name="id_ruang" class="form-control select2" style="width: 100%;">
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
                                    <div class="col-sm-5">
                                        <input type="file" id="foto" name="foto" required>
                                        <p class="help-block">
                                            <font color="red">"Format file Jpg/Png"</font>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gambar Sebelumnya</label>
                                    <div class="col-sm-10">
                                        <div>
                                        <img src="../../foto/<?php echo $row['foto']; ?>" width="200px" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm bg-cyan float-right"><i class="fa fa-save"> Update</i></button>
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


    $nm_barang = $_POST['nm_barang'];
    $satuan = $_POST['satuan'];
    $jenis_barang = $_POST['jenis_barang'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $id_ruang = $_POST['id_ruang'];


    $update = $con->query("UPDATE barang SET 
        nm_barang = '$nm_barang',
        satuan = '$satuan',
        jenis_barang = '$jenis_barang',
        kondisi = '$kondisi',
        jumlah_barang = '$jumlah_barang',
        harga = '$harga',
        id_ruang = '$id_ruang',
        foto = '$nama_file'
        WHERE id_barang = '$id'
    ");

    if ($update) {
        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=edit?id=$id'>";
    }
}


?>