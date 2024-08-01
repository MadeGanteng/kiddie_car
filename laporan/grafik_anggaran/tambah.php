<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'list_anggaran';
include_once '../../template/sidebar.php';
$idT = uniqid();
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-file-alt ml-1 mr-1"></i> Tambah Data List Anggaran</h4>
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
                                <input type="hidden" name="id_list_anggaran" value="<?= $idT ?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_pengajuan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Anggaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_anggaran" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bulan</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="month" class="form-control" name="jenis" required> -->
                                        <select  class="form-control" name="bulan" id="bulan" required>
                                            <option value="">- Pilih Bulan -</option>
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="2019" class="form-control" name="tahun" required>
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Total Anggaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="total_anggaran" required>
                                    </div>
                                </div> -->
                                
                                
                                <hr>
                                <div style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#modal-tambah" class="btn btn-sm bg-olive mb-2"><i class="fa fa-plus-circle"></i> Tambah Inventaris</a>
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
                <h4 class="modal-title">Tambah Data Inventaris </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-tambah" method="POST" enctype="multipart/form-data" action="sub/simpan.php">
                    <div class="card-body">
                        <input type="hidden" name="id_list_anggaran" value="<?= $idT ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Inventaris</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" id="id_barang" name="id_barang" required>
                                    <option disabled selected value=""> -- Pilih -- </option>
                                    <?php
                                    $q = $con->query("SELECT * FROM barang WHERE musnah = 0 ORDER BY nm_barang ASC");
                                    while ($d = $q->fetch_array()) {
                                    ?>
                                        <option value="<?= $d['id_barang'] ?>"><?= $d['kd_barang'] ?> | <?= $d['nm_barang'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" onkeyup="findTotal()" class="form-control" id="jumlah" name="jumlah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" onkeyup="findTotal()" class="form-control" id="harga" name="harga" required>
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
                alert('Inventaris Ditambahkan !');
                var hasil = JSON.parse(result);
                if (hasil.hasil == "sukses") {
                    $('#modal-tambah').modal('hide');
                    $("#id_barang").val('');
                    $("#jumlah").val('');
                    $("#harga").val('');
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
    var harga = document.getElementById('harga').value;
    var sub_total = document.getElementById('sub_total').value;

    var sub_total =  jumlah * harga;

    document.getElementById('sub_total').value = sub_total;
}
    
    // harga.addEventListener('keyup', function(e)
    // {
    //     sub_total1 = jumlah.value * harga.value;
    //     sub_total2 = sub_total1, 'Rp ';

    //     sub_total.value = sub_total2;
    // });
    
    // harga.addEventListener('focusout', function(e)
    // {
    //     harga.value = formatRupiah(this.value, 'Rp ');
    // });

    // harga.addEventListener('focus', function(e)
    // {
    //     harga.value = hapusRupiah(this.value, '');
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
if (isset($_POST['submit'])) {

    $id_list_anggaran = $_POST['id_list_anggaran'];
    $nama_anggaran = $_POST['nama_anggaran'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $tambah = $con->query("INSERT INTO list_anggaran VALUES (
        '$id_list_anggaran', 
        '$nama_anggaran', 
        '$tgl_pengajuan',  
        '$bulan',
        '$tahun'
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