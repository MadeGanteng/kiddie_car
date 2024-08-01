<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'pembayaran';
include_once '../../template/sidebar.php';
$idT = uniqid();

$tes = $con->query("SELECT  AUTO_INCREMENT AS nilai FROM information_schema.tables WHERE  Table_SCHEMA = 'skripsi_renaldi' AND table_name = 'pembayaran'");
$data = $tes->fetch_array();
// $nilai = $data['nilai']+2;
$nilai = rand(10,100);
$a = "PAY/";
$num = $a . sprintf('%06s', $nilai);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-file-alt ml-1 mr-1"></i> Tambah Data Pembayaran Pelanggan</h4>
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
                                <input type="hidden" name="id_pembayaran" value="<?= $idT ?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Transaksi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $num; ?>" name="kode_trx" required readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_trx" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_pelanggan" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_telepon" required>
                                    </div>
                                </div>
                                
                                <hr>
                                <div style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#modal-tambah" class="btn btn-sm bg-olive mb-2"><i class="fa fa-plus-circle"></i> Tambah Pembayaran Pelanggan</a>
                                    <input type="hidden" id="dataid" value="<?= $idT; ?>">
                                </div>
                                <div id="data-inventaris">

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

<div class="modal fade" id="modal-tambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pembayaran </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-tambah" method="POST" enctype="multipart/form-data" action="sub/simpan.php">
                    <div class="card-body">
                        <input type="hidden" name="id_pembayaran" value="<?= $idT ?>">
                       
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" id="id_jenis" name="id_jenis" required onchange="abc(this.value)">
                                    <option value=""> -- Pilih -- </option>
                                    <?php
                                            $jsArray = "var tampil = new Array();\n";
                                            $data_barang = mysqli_query($con, "SELECT * from jenis_pembayaran");
                                            while ($hasil = mysqli_fetch_array($data_barang)) {
                                            echo "<option value='$hasil[id_jenis]'>Jenis : $hasil[jenis_pembayaran] - Biaya $hasil[biaya]</option>";
                                            $jsArray .= "tampil['" . $hasil['id_jenis'] . "'] = {
                                            biaya:'" . addslashes($hasil['biaya']) . "',
                                            keterangan:'" . addslashes($hasil['keterangan']) . "'};\n";
                                            }
                                        ?>

                                </select>
                            </div>
                        </div>
                        
                        <script type="text/javascript">
                                    <?php echo $jsArray; ?>

                                    function abc(id) {
                                      document.getElementById('biaya').value = tampil[id].biaya;
                                      document.getElementById('keterangan').value = tampil[id].keterangan;
                                    };
                                    
                        </script>
                       
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Biaya</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="biaya" name="biaya" required readonly>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="keterangan" name="keterangan" required readonly>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<?php
include_once '../../template/footer.php';
?>

<script>
    muncul();
    var data = "sub/tampil.php";

    function muncul() {
        $.post('sub/tampil.php', {
                id: $("#dataid").val()
            },
            function(data) {
                $("#data-inventaris").html(data);
            }
        );
    }

    $("#form-tambah").submit(function(e) {
        e.preventDefault();

        var dataform = $("#form-tambah").serialize();
        $.ajax({
            url: "sub/simpan.php",
            type: "POST",
            data: dataform,
            success: function(result) {
                alert('Jenis Pembayaran Ditambahkan !');
                var hasil = JSON.parse(result);
                if (hasil.hasil == "sukses") {
                    $('#modal-tambah').modal('hide');
                    $("#id_jenis").val('');
                    $("#biaya").val('');
                    muncul();
                }
            }
        });
    });

    $(document).on('click', '#hapus', function(e) {
        e.preventDefault();
        $.post('sub/hapus.php', {
                id: $(this).attr('data-id')
            },
            function(html) {
                muncul();
            }
        );
    });
</script>

<script type="text/javascript">
function findTotal(){
    var jumlah = document.getElementById('jumlah').value;
    var biaya = document.getElementById('biaya').value;
    var sub_total = document.getElementById('sub_total').value;

    var sub_total =  jumlah * biaya;

    document.getElementById('sub_total').value = sub_total;
}
    
</script>

<?php

if (isset($_POST['submit'])) {

    $id_pembayaran = $_POST['id_pembayaran'];
    $kode_trx = $_POST['kode_trx'];
    $tgl_trx = $_POST['tgl_trx'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telepon = $_POST['no_telepon'];

    $tambah = $con->query("INSERT INTO pembayaran VALUES (
        '$id_pembayaran', 
        '$kode_trx', 
        '$tgl_trx',
        '$nama_pelanggan',
        '$no_telepon'
    )");

    if ($tambah) {
        $_SESSION['pesan'] = "Data Berhasil di Simpan";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=tambah'>";
    }
}


?>