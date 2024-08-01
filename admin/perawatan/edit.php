<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'perawatan';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM perawatan a LEFT JOIN barang b ON a.id_barang = b.id_barang LEFT JOIN ruang c ON b.id_ruang = c.id_ruang WHERE id_perawatan ='$id'");
$row = $query->fetch_array();
$old_barang = $row['id_barang'];
$old_kondisi = $row['kondisi_awal'];
$kon = [
    '' => '-- Pilih --',
    'Baik' => 'Baik',
    'Rusak Ringan' => 'Rusak Ringan',
    'Rusak Parah' => 'Rusak Parah',
];

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-thermometer-half ml-1 mr-1"></i> Edit Data Perawatan Barang</h4>
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
                                        <input type="text" class="form-control" hidden name="id_barang" id="id_barang" value="<?= $row['id_barang'] ?>" required>
                                        <input type="text" class="form-control" id="kd_barang" value="<?= $row['kd_barang'] ?>" required readonly>
                                        <span class="input-group-append">
                                            <button type="button" data-toggle="modal" data-target="#modal_barang" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nm_barang" class="form-control" value="<?= $row['nm_barang'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="jenis_barang" class="form-control" value="<?= $row['jenis_barang'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ruangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nm_ruang" class="form-control" value="<?= $row['nm_ruang'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kondisi Awal</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="kondisi" name="kondisi_awal" class="form-control" value="<?= $row['kondisi_awal'] ?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kondisi Sekarang</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('cek_kondisi', $kon, $row['cek_kondisi'], 'class="form-control" required') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Perawatan</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_cek" value="<?= $row['tgl_cek'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Perawatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jenis_perawatan" value="<?= $row['jenis_perawatan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="catatan" value="<?= $row['catatan'] ?>" required>
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
                                <th>Ruangan</th>
                                <th>Kondisi Awal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $data = $con->query("SELECT *, barang.id_barang AS ID_barang FROM barang, ruang where barang.id_ruang = ruang.id_ruang AND barang.musnah = 0 AND barang.jenis_barang != 'Barang Habis Pakai' ORDER BY id_barang DESC");
                            while ($row = $data->fetch_array()) {
                            ?>
                                <tr>
                                    <td align="center" width="5%"><?= $no++ ?></td>
                                    <td>
                                        <b>Kode</b> : <?= $row['kd_barang'] ?><br>
                                        <b>Nama</b> : <?= $row['nm_barang'] ?><br>
                                        <b>Satuan</b> : <?= $row['satuan'] ?><br>
                                        <b>Jenis</b> : <?= $row['jenis_barang'] ?><br>
                                    </td>
                                    <td align="center"><?= $row['nm_ruang'] ?></td>
                                    <td align="center"><?= $row['kondisi'] ?></td>
                                    <td align="center" width="7%">
                                        <button class="btn btn-xs btn-success" id="select" data-id_barang="<?= $row['id_barang'] ?>" data-kd_barang="<?= $row['kd_barang'] ?>" data-nm_barang="<?= $row['nm_barang'] ?>" data-jenis_barang="<?= $row['jenis_barang'] ?>" data-nm_ruang="<?= $row['nm_ruang'] ?>" data-kondisi="<?= $row['kondisi'] ?>">
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
            var nm_ruang = $(this).data('nm_ruang');
            var kondisi = $(this).data('kondisi');
            $('#id_barang').val(id_barang);
            $('#kd_barang').val(kd_barang);
            $('#nm_barang').val(nm_barang);
            $('#jenis_barang').val(jenis_barang);
            $('#nm_ruang').val(nm_ruang);
            $('#kondisi').val(kondisi);
            $('#modal_barang').modal('hide');
        });
    })
</script>

<?php
if (isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $kondisi_awal = $_POST['kondisi_awal'];
    $cek_kondisi = $_POST['cek_kondisi'];
    $tgl_cek = $_POST['tgl_cek'];
    $jenis_perawatan = $_POST['jenis_perawatan'];
    $catatan = $_POST['catatan'];

    $update = $con->query("UPDATE perawatan SET 
        id_barang = '$id_barang',
        kondisi_awal = '$kondisi_awal',
        cek_kondisi = '$cek_kondisi',
        tgl_cek = '$tgl_cek',
        jenis_perawatan = '$jenis_perawatan',
        catatan = '$catatan'
        WHERE id_perawatan = '$id'
    ");

    if ($update) {
        $con->query("UPDATE barang SET kondisi = '$old_kondisi' WHERE id_barang = '$old_barang' ");
        $con->query("UPDATE barang SET kondisi = '$cek_kondisi' WHERE id_barang = '$id_barang' ");
        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=edit?id=$id'>";
    }
}


?>