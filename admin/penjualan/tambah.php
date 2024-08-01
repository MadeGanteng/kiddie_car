<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'penjualan';
include_once '../../template/sidebar.php';
$idT = uniqid();

$tes = $con->query("SELECT  AUTO_INCREMENT AS nilai FROM information_schema.tables WHERE  Table_SCHEMA = 'skripsi_renaldi' AND table_name = 'penjualan'");
$data = $tes->fetch_array();
// $nilai = $data['nilai']+1;
$nilai = rand(10,100);
$a = "SELL/";
$num = $a . sprintf('%06s', $nilai);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-file-alt ml-1 mr-1"></i> Tambah Data Penjualan Barang</h4>
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
                                <input type="hidden" name="id_penjualan" value="<?= $idT ?>">
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
                                
                                <hr>
                                <div style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#modal-tambah" class="btn btn-sm bg-olive mb-2"><i class="fa fa-plus-circle"></i> Tambah Transaksi</a>
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
                <h4 class="modal-title">Tambah Data Barang </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-tambah" method="POST" enctype="multipart/form-data" action="sub/simpan.php">
                    <div class="card-body">
                        <input type="hidden" name="id_penjualan" value="<?= $idT ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Data Barang</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" id="id_barang" name="id_barang" required onchange="abc(this.value)">
                                    <option value=""> -- Pilih -- </option>
                                    <?php
                                            $jsArray = "var tampil = new Array();\n";
                                            $data_barang = mysqli_query($con, "SELECT * from barang_jual where jumlah_barang >= 1");
                                            while ($hasil = mysqli_fetch_array($data_barang)) {
                                            echo "<option value='$hasil[id_barang]'>$hasil[kd_barang] - $hasil[nm_barang]</option>";
                                            $jsArray .= "tampil['" . $hasil['id_barang'] . "'] = {
                                            jumlah_barang:'" . addslashes($hasil['jumlah_barang']) . "',
                                            harga_beli:'" . addslashes($hasil['harga_beli']) . "',
                                            harga:'" . addslashes($hasil['harga']) . "'};\n";
                                            }
                                        ?>

                                </select>
                            </div>
                        </div>

                        <script type="text/javascript">
                                    <?php echo $jsArray; ?>

                                    function abc(id) {
                                      document.getElementById('jumlah_barang').value = tampil[id].jumlah_barang;
                                      document.getElementById('harga').value = tampil[id].harga;
                                      document.getElementById('harga_beli').value = tampil[id].harga_beli;
                                    };
                                    
                        </script>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Stok Awal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" required readonly>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="harga_beli" name="harga_beli" required readonly>
                        
                        <!-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga Beli</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="harga_beli" name="harga_beli" required readonly>
                            </div>
                        </div> -->
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" name="harga" required readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Jual</label>
                            <div class="col-sm-10">
                                <input type="number" onkeyup="findTotal()" onchange="findTotal()" class="form-control" id="jumlah_jual" name="jumlah_jual" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Total</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sub_total" name="sub_total" readonly required>
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
                alert('Penjualan Barang Ditambahkan !');
                var hasil = JSON.parse(result);
                if (hasil.hasil == "sukses") {
                    $('#modal-tambah').modal('hide');
                    $("#id_barang").val('');
                    $("#jumlah_barang").val('');
                    $("#harga_beli").val('');
                    $("#harga").val('');
                    $("#jumlah_jual").val('');
                    $("#sub_total").val('');
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
    var harga = document.getElementById('harga').value;
    var jumlah_jual = document.getElementById('jumlah_jual').value;
    var sub_total = document.getElementById('sub_total').value;

    var sub_total = harga * jumlah_jual;

    document.getElementById('sub_total').value = sub_total;
}
    

</script>

<?php
if (isset($_POST['submit'])) {

    $id_penjualan = $_POST['id_penjualan'];
    $kode_trx = $_POST['kode_trx'];
    $tgl_trx = $_POST['tgl_trx'];

    $tambah = $con->query("INSERT INTO penjualan VALUES (
        '$id_penjualan', 
        '$kode_trx', 
        '$tgl_trx'
    )");

    if ($tambah) {
        // $con->query("INSERT INTO laba (id_laba_rugi, id_penjualan, tanggal, keterangan) VALUES (NULL, '$id_penjualan', '$tgl_trx', 'laba')");
        $_SESSION['pesan'] = "Data Berhasil di Simpan";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=tambah'>";
    }
}


?>