<?php
require '../../app/config.php';
include_once '../../template/header.php';
$page = 'user';
include_once '../../template/sidebar.php';

$id = $_GET['id'];
$query = $con->query(" SELECT * FROM user WHERE id_user ='$id'");
$row = $query->fetch_array();

$level = [
    '' => '---Pilih---',
    '1' => 'Admin',
    '2' => 'User',
];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><i class="fa fa-user ml-1 mr-1"></i> Edit Data Pengguna</h4>
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
                                    <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nm_user" value="<?= $row['nm_user'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" value="<?= $row['username'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="input-group col-sm-10">
                                        <input type="password" id="pw" class="form-control" name="password" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text" id="lihatpw">
                                                <span class="fas fa-eye" title="Lihat Password" onclick="change1();"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <label style="color: red; font-style: italic; font-size: 12px;">* Kosongkan Password Jika Tidak Diubah</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Level Pengguna</label>
                                    <div class="col-sm-10">
                                        <?= form_dropdown('level', $level, $row['level'], 'class="form-control" required') ?>
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

<script>
    function change1() {
        var x = document.getElementById('pw').type;

        if (x == 'password') {
            document.getElementById('pw').type = 'text';
            document.getElementById('lihatpw').innerHTML = '<span class="fas fa-eye" title="Lihat Password" style="color: blue;" id="lihatpw" onclick="change1();"></span>';
        } else {
            document.getElementById('pw').type = 'password';
            document.getElementById('lihatpw').innerHTML = '<span class="fas fa-eye" title="Lihat Password" id="lihatpw" onclick="change1();"></span>';
        }
    }
</script>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nm_user'];
    $user = $_POST['username'];
    if (!empty($_POST['password'])) {
        $pw = md5($_POST['password']);
    } else {
        $pw = $row['password'];
    }
    $level = $_POST['level'];

    $update = $con->query("UPDATE user SET 
        nm_user = '$nama', 
        username = '$user', 
        password = '$pw', 
        level = '$level' 
        WHERE id_user = '$id'
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