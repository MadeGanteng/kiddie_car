<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'mutasi';
include_once '../../template/sidebar.php';

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-cubes ml-1 mr-1"></i> Tambah Data Mutasi Barang</h4>
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
                                    <div class="col-sm-10 input-group">
                                        <input type="hidden" class="form-control" name="id_barang" id="id_barang" required>
                                        <input type="text" class="form-control" id="kd_barang" required readonly>
                                        <span class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#modal_barang" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nm_barang" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="jenis_barang" class="form-control" readonly>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ruangan Lama</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" id="id_ruang_lama" name="id_ruang_lama" class="form-control" required>
                                        <input type="text" id="ruang_lama" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ruangan Baru</label>
                                    <div class="col-sm-10">
                                        <select name="id_ruang" class="form-control select2" style="width: 100%;">
                                            <option value="">-- Pilih --</option>
                                            <?php $data = $con->query("SELECT * FROM ruang ORDER BY id_ruang DESC"); ?>
                                            <?php foreach ($data as $row) : ?>
                                                <option value="<?= $row['id_ruang'] ?>"><?= $row['nm_ruang'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Mutasi</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_mutasi" required>
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

<div class="modal fade" id="modal_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered">
                        <thead class="bg-lightblue">
                            <tr align="center">
                                <th>No</th>
                                <th>Data Barang</th>
                                <th>Ruangan Lama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $data = $con->query("SELECT * FROM barang a LEFT JOIN ruang b ON a.id_ruang = b.id_ruang ");
                            while ($row = $data->fetch_array()) {
                            ?>
                                <tr>
                                    <td align="center" width="5%"><?= $no++ ?></td>
                                    <td>
                                        <b>Kode</b> : <?= $row['kd_barang'] ?><br>
                                        <b>Nama</b> : <?= $row['nm_barang'] ?><br>
                                        <b>Jenis</b> : <?= $row['jenis_barang'] ?><br>
                                        <b>Satuan</b> : <?= $row['satuan'] ?>
                                    </td>
                                    <td align="center"><?= $row['nm_ruang'] ?></td>
                                    <td align="center" width="7%">
                                        <button class="btn btn-xs btn-success" id="select" data-id_barang="<?= $row['id_barang'] ?>" data-kd_barang="<?= $row['kd_barang'] ?>" data-nm_barang="<?= $row['nm_barang'] ?>" data-jenis_barang="<?= $row['jenis_barang'] ?>" data-nm_ruang="<?= $row['nm_ruang'] ?>" data-id_ruang="<?= $row['id_ruang'] ?>">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../../template/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_barang = $(this).data('id_barang');
            var kd_barang = $(this).data('kd_barang');
            var nm_barang = $(this).data('nm_barang');
            var jenis_barang = $(this).data('jenis_barang');
            var id_ruang = $(this).data('id_ruang');
            var nm_ruang = $(this).data('nm_ruang');
            $('#id_barang').val(id_barang);
            $('#kd_barang').val(kd_barang);
            $('#nm_barang').val(nm_barang);
            $('#jenis_barang').val(jenis_barang);
            $('#id_ruang_lama').val(id_ruang);
            $('#ruang_lama').val(nm_ruang);
            $('#modal_barang').modal('hide');
        });
    })
</script>

<?php
if (isset($_POST['submit'])) {

    $id_barang = $_POST['id_barang'];
    $id_ruang_lama = $_POST['id_ruang_lama'];
    $id_ruang = $_POST['id_ruang'];
    $tgl_mutasi = $_POST['tgl_mutasi'];

    $tambah = $con->query("INSERT INTO mutasi VALUES (
        default, 
        '$id_barang', 
        '$id_ruang_lama', 
        '$id_ruang', 
        '$tgl_mutasi'
    )");

    if ($tambah) {
        $con->query("UPDATE barang SET id_ruang = '$id_ruang' WHERE id_barang = '$id_barang' ");
        $_SESSION['pesan'] = "Data Berhasil di Simpan";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=tambah'>";
    }
}


?>