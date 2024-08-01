<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
<strong>Copyright &copy; <?= date('Y') ?> I Made Indrawan</strong>
    <!--     <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.3-pre
    </div> -->
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/assets/plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/assets/plugins/moment/moment.min.js"></script>
<!-- ekko lightbox -->
<script src="<?= base_url() ?>/assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?= base_url() ?>/assets/alert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>/assets/alert/qunit-1.18.0.js"></script>

<script src="<?= base_url() ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url() ?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- JQUERY MASK -->
<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.mask.js"></script>

<!-- Load File jquery.form.js yang ada di folder js -->
<script type="text/javascript" src="<?= base_url() ?>/assets/dist/js/jquery.form.js"></script>

<!-- Load File main.js yang ada di folder js -->
<script type="text/javascript" src="<?= base_url() ?>/assets/dist/js/main.js"></script>

<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.media.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>

<!-- Summernote -->
<script src="<?= base_url() ?>/assets/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>



<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    });

    $('.select2').select2();

    $('.alert-logout').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
                title: '',
                text: '<b style="color: black">Anda Akan Keluar Dari Aplikasi, Lanjutkan ?</b>',
                type: "warning",
                html: true,
                confirmButtonColor: '#87CEFA',
                showCancelButton: true,
            },
            function() {
                window.location.href = getLink
            });
        return false;
    });

    $('.alert-hapus').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
                title: '',
                text: '<b style="color: black">Data Akan Dihapus, Lanjutkan ?</b>',
                type: "warning",
                html: true,
                confirmButtonColor: '#87CEFA',
                showCancelButton: true,
            },
            function() {
                window.location.href = getLink
            });
        return false;
    });

    $('.alert-hapus-foto').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
                title: '',
                text: '<b style="color: black">Foto Akan Dihapus, Lanjutkan ?</b>',
                type: "warning",
                html: true,
                confirmButtonColor: '#87CEFA',
                showCancelButton: true,
            },
            function() {
                window.location.href = getLink
            });
        return false;
    });

    $('.alert-setuju').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
                title: '',
                text: '<b style="color: black">Data Akan Disetujui, Lanjutkan ?</b>',
                type: "warning",
                html: true,
                confirmButtonColor: '#87CEFA',
                showCancelButton: true,
            },
            function() {
                window.location.href = getLink
            });
        return false;
    });

    $('.alert-tolak').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
                title: '',
                text: '<b style="color: black">Data Akan Ditolak, Lanjutkan ?</b>',
                type: "warning",
                html: true,
                confirmButtonColor: '#87CEFA',
                showCancelButton: true,
            },
            function() {
                window.location.href = getLink
            });
        return false;
    });


    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $("#notif").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    });
</script>

</body>

</html>