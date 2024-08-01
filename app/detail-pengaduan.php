<?php
require 'configtables.php';
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
?>

<form action="#" method="POST" target="blank">
    <div id="id<?= $id = $row[0]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button> -->
                    <h5 class="modal-title" id="custom-width-modalLabel"> <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-info-circle"></i></button> Detail Data Pengaduan</h5>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
                </div>
                <?php
                $q = $con->query("SELECT * FROM pengaduan p LEFT JOIN pelapor pl ON pl.id_pelapor = p.id_pelapor LEFT JOIN jenis_pengaduan jp ON jp.id_jenis_pengaduan = p.id_jenis_pengaduan WHERE id_pengaduan = '$id' ");
                $d = $q->fetch_array();
                ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="card-body" style="text-align: left;">
                                <dl class="row">
                                    <dt class="col-sm-3">Nama Pelapor</dt>
                                    <dd class="col-sm-9">: <?= $d['nm_pelapor'] ?></dd>
                                    <dt class="col-sm-3">NIK Pelapor</dt>
                                    <dd class="col-sm-9">: <?= $d['nik'] ?></dd>
                                    <dt class="col-sm-3">No. HP Pelapor</dt>
                                    <dd class="col-sm-9">: <?= $d['hp'] ?></dd>
                                    <dt class="col-sm-3">Alamat Pelapor</dt>
                                    <dd class="col-sm-9">: <?= $d['alamat'] ?></dd>
                                </dl>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-3">Jenis Pengaduan</dt>
                                    <dd class="col-sm-9">: <?= $d['jenis_pengaduan'] ?></dd>
                                    <dt class="col-sm-3">Hari/ Tanggal Kejadian</dt>
                                    <dd class="col-sm-9">: <?= tgl_indo($d['tgl_kejadian']) ?></dd>
                                    <dt class="col-sm-3">Isi Laporan Pengaduan</dt>
                                    <dd class="col-sm-9">: <?= $d['isi_pengaduan'] ?></dd>
                                    <dt class="col-sm-3">Foto Bukti</dt>
                                    <dd class="col-sm-9">:
                                        <?php
                                        if ($d['bukti'] == 'Tidak Ada') {
                                            echo 'Tidak Ada';
                                        } else {
                                        ?>
                                            <a href="<?= base_url('foto/pengaduan/' . $d['foto_bukti']) ?>"><img src="<?= base_url('foto/pengaduan/' . $d['foto_bukti']) ?>" alt="Foto Bukti" width="500px"></a>
                                        <?php } ?>
                                    </dd>
                                    <dt class="col-sm-3">Tanggal Pengaduan</dt>
                                    <dd class="col-sm-9">: <?= tgl($d['tgl_pengaduan']) ?></dd>
                                </dl>
                                <hr>
                                <dl class="row">
                                    <dt class="col-sm-3">Verifikasi</dt>
                                    <dd class="col-sm-9">:
                                        <?php if ($d['verifikasi'] == 'Disetujui') { ?>
                                            <a href="#" class="btn btn-xs bg-teal"><?= $d['verifikasi'] ?></a>
                                        <?php } else if ($d['verifikasi'] == 'Ditolak') { ?>
                                            <a href="#" class="btn btn-xs bg-red"><?= $d['verifikasi'] ?></a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-xs bg-warning"><?= $d['verifikasi'] ?></a>
                                        <?php } ?>
                                    </dd>
                                    <?php if ($d['verifikasi'] == 'Disetujui' || $d['verifikasi'] == 'Ditolak') { ?>
                                        <dt class="col-sm-3">Tanggapan</dt>
                                        <dd class="col-sm-9">: <?= $d['tanggapan'] ?></dd>
                                        <dt class="col-sm-3">Tanggal Ditanggapi</dt>
                                        <dd class="col-sm-9">: <?= tgl($d['tgl_ditanggapi']) ?></dd>
                                    <?php } ?>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>