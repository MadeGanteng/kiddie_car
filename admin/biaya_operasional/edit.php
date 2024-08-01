<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'biaya_operasional';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM biaya_operasional WHERE id_biaya_operasional ='$id'");
$row = $query->fetch_array();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-file-alt ml-1 mr-1"></i> Edit Data Biaya Operasional</h4>
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
                                    <label class="col-sm-2 col-form-label">Tanggal Penggunaan</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_penggunaan" value="<?= $row['tgl_penggunaan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_kegiatan" value="<?= $row['nama_kegiatan'] ?>" required>
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kwitansi</label>
                                    <div class="col-sm-5">
                                        <input type="file" id="foto" name="foto" required>
                                        <p class="help-block">
                                            <font color="red">"Format file Jpg/Png"</font>
                                        </p>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kwitansi Sebelumnya</label>
                                    <div class="col-sm-5">
                                        <?php if($row['foto'] == '') { ?>
                                            <img src="../../assets/images/no_image.png" width="100px" />
                                        <?php } ?>
                                        <?php if($row['foto'] != '') { ?>
                                            <img src="../../foto/<?php echo $row['foto']; ?>" width="100px" />
                                        <?php } ?>
                                    </div>
                                </div>

                                <hr>
                                <div style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#modal-tambah" class="btn btn-sm bg-olive mb-2"><i class="fa fa-plus-circle"></i> Tambah Jenis Pengeluaran</a>
                                    <input type="hidden" id="dataid" value="<?= $id; ?>">
                                </div>
                                <div id="data-inventaris">

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

<div class="modal fade" id="modal-tambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Jenis Pengeluaran </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-tambah" method="POST" enctype="multipart/form-data" action="sub/simpan.php">
                    <div class="card-body">
                        <input type="hidden" name="id_biaya_operasional" value="<?= $id ?>">
                      
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Pengeluaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jenis_pengeluaran" name="jenis_pengeluaran" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" onkeyup="findTotal()"  class="form-control" id="jumlah" name="jumlah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Biaya</label>
                            <div class="col-sm-10">
                                <input type="number" onkeyup="findTotal()"  class="form-control" id="biaya" name="biaya" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Total</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sub_total" name="sub_total" readonly required>
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
                alert('Inventaris Ditambahkan !');
                var hasil = JSON.parse(result);
                if (hasil.hasil == "sukses") {
                    $('#modal-tambah').modal('hide');
                    $("#jenis_pengeluaran").val('');
                    $("#jumlah").val('');
                    $("#biaya").val('');
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
    var jumlah = document.getElementById('jumlah').value;
    var biaya = document.getElementById('biaya').value;
    var sub_total = document.getElementById('sub_total').value;

    var sub_total =  jumlah * biaya;

    document.getElementById('sub_total').value = sub_total;
}
    
    // biaya.addEventListener('keyup', function(e)
    // {
    //     sub_total1 = jumlah.value * biaya.value;
    //     sub_total2 = sub_total1, 'Rp ';

    //     sub_total.value = sub_total2;
    // });
    
    // biaya.addEventListener('focusout', function(e)
    // {
    //     biaya.value = formatRupiah(this.value, 'Rp ');
    // });

    // biaya.addEventListener('focus', function(e)
    // {
    //     biaya.value = hapusRupiah(this.value, '');
    // });
    
    // function formatRupiah(angka, prefix)
    // {
    //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
    //         split    = number_string.split(','),
    //         sisa     = split[0].length % 3,
    //         rupiah     = split[0].substr(0, sisa),
    //         ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
    //     if (ribuan) {
    //         separator = sisa ? '.' : '';
    //         rupiah += separator + ribuan.join('.');
    //     }
        
    //     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    //     return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    // }

    // function hapusRupiah(angka)
    // {
    //     var number_string = angka.replace(/[^,\d/]/g, '');
        
    //     return number_string;
    // }

</script>

<?php
$sumber = @$_FILES['foto']['tmp_name'];
$target = '../../foto/';
$nama_file = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

if (isset($_POST['submit'])) {

    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tgl_penggunaan = $_POST['tgl_penggunaan'];
    // $bulan = $_POST['bulan'];
    // $tahun = $_POST['tahun'];

    $update = $con->query("UPDATE biaya_operasional SET 
        nama_kegiatan = '$nama_kegiatan',
        tgl_penggunaan = '$tgl_penggunaan',
        foto = '$nama_file'
        WHERE id_biaya_operasional = '$id'
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