<table class="table table-striped table-bordered">
    <thead class="bg-cyan">
        <tr align="center">
            <th>
                <center>No</center>
            </th>
            <th>
                <center>Jenis Pembayaran</center>
            </th>
            <th>
                <center>Biaya</center>
            </th>
            <th>
                <center>Aksi</center>
            </th>
        </tr>
    </thead>

    <tbody>

        <?php
        include "../../../app/config.php";
        $no1 = 1;
        $id1 = $_POST['id'];

        $data1 = mysqli_query($con, "SELECT * FROM sub_pembayaran, jenis_pembayaran  WHERE  sub_pembayaran.id_jenis = jenis_pembayaran.id_jenis AND sub_pembayaran.id_pembayaran = '$id1' ");
        while ($tampil1 = mysqli_fetch_array($data1)) {
        ?>
            <tr>
                <td align="center"><?= $no1++; ?></td>
                <td><?= $tampil1['jenis_pembayaran'] ?></td>
                <td align="right">Rp <?= number_format($tampil1['biaya'], 0, ',','.') ?></td>
                <td align="center">
                    <a class="btn btn-sm btn-danger" href="#" id="hapus" data-id="<?= $tampil1[0]; ?>"> <i class="fa fa-trash"></i> Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>


<hr>