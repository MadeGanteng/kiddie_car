<?php
require '../app/config.php';
include_once '../template/header.php';
include_once '../template/sidebar.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Ubah Password</h4>
                </div><!-- /.col -->
                <div class="col-sm-6 float-right">
                    <a href="#" onClick="history.go(-1);" class="btn btn-sm bg-dark float-right"><i class="fa fa-arrow-left"> Kembali</i></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-lightblue card-outline">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body" style="background-color: white;">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password Lama</label>
                                    <div class="input-group col-sm-10">
                                        <input type="password" id="passlama" class="form-control" name="passlama" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text" id="lihatpasslama">
                                                <span class="fas fa-eye" title="Lihat Password" onclick="change1();"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password Baru</label>
                                    <div class="input-group col-sm-10">
                                        <input type="password" id="passbaru" class="form-control" name="passbaru" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text" id="lihatpassbaru">
                                                <span class="fas fa-eye" title="Lihat Password" onclick="change2();"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="input-group col-sm-10">
                                        <input type="password" id="confirm" class="form-control" name="confirm" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text" id="lihatconfirm">
                                                <span class="fas fa-eye" title="Lihat Password" onclick="change3();"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-sm btn-primary float-right"><i class="fa fa-save"> Ubah Password</i></button>
                                        <button type="reset" class="btn btn-sm btn-danger float-right mr-2"><i class="fa fa-times-circle"> Batal</i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!--/.col (left) -->
                </div>

            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template/footer.php';
?>

<script>
    function change1() {
        var x = document.getElementById('passlama').type;

        if (x == 'password') {
            document.getElementById('passlama').type = 'text';
            document.getElementById('lihatpasslama').innerHTML = '<span class="fas fa-eye" title="Lihat Password" style="color: blue;" id="lihatpasslama" onclick="change1();"></span>';
        } else {
            document.getElementById('passlama').type = 'password';
            document.getElementById('lihatpasslama').innerHTML = '<span class="fas fa-eye" title="Lihat Password" id="lihatpasslama" onclick="change1();"></span>';
        }
    }

    function change2() {
        var x = document.getElementById('passbaru').type;

        if (x == 'password') {
            document.getElementById('passbaru').type = 'text';
            document.getElementById('lihatpassbaru').innerHTML = '<span class="fas fa-eye" title="Lihat Password" style="color: blue;" id="lihatpassbaru" onclick="change2();"></span>';
        } else {
            document.getElementById('passbaru').type = 'password';
            document.getElementById('lihatpassbaru').innerHTML = '<span class="fas fa-eye" title="Lihat Password" id="lihatpassbaru" onclick="change2();"></span>';
        }
    }

    function change3() {
        var x = document.getElementById('confirm').type;

        if (x == 'password') {
            document.getElementById('confirm').type = 'text';
            document.getElementById('lihatconfirm').innerHTML = '<span class="fas fa-eye" title="Lihat Password" style="color: blue;" id="lihatconfirm" onclick="change3();"></span>';
        } else {
            document.getElementById('confirm').type = 'password';
            document.getElementById('lihatconfirm').innerHTML = '<span class="fas fa-eye" title="Lihat Password" id="lihatconfirm" onclick="change3();"></span>';
        }
    }
</script>

<?php
$user = $_SESSION['id_user'];
if (isset($_POST['submit'])) {
    $passlama     = $_POST['passlama'];
    $passbaru     = $_POST['passbaru'];
    $confirmpass  = $_POST['confirm'];

    $enc = md5($passbaru);

    // $data = $con->query("SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'")->fetch_array();
    $cek = $con->query("SELECT * FROM user WHERE id_user = '$user'")->fetch_array();
    // if ($cek['password'] == $lama) {

    if (md5($passlama) == $cek['password']) {

        if ($passbaru == $confirmpass) {
            $submit = $con->query("UPDATE user SET password = '$enc' WHERE id_user = '$user'");
        } else {
            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: 'Ubah Password Gagal',
                        text:  'Password Baru Tidak Sama !',
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
            </script>";
        }
    } else {
        echo "
        <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Ubah Password Gagal',
                    text:  'Password Lama Salah !',
                    type: 'error',
                    timer: 2000,
                    showConfirmButton: false
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
        </script>";
    }

    if ($submit) {
        echo "
        <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Ubah Password Berhasil',
                    text:  'Silahkan Login Menggunakan Password Baru ! ',
                    type: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });     
            },10);  
            window.setTimeout(function(){ 
                window.location.replace('../logout');
            } ,2000);   
        </script>";
    }
}


?>