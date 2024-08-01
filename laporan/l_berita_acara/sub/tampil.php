<table class="table table-striped table-bordered">
    <thead class="bg-cyan">
        <tr align="center">
            <th>
                <center>No</center>
            </th>
            <th>
                <center>Nama Inventaris</center>
            </th>
            <th>
                <center>Kode</center>
            </th>
            <th>
                <center>Keterangan</center>
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

        $data1 = mysqli_query($con, "SELECT * FROM sub_berita_acara a LEFT JOIN barang b ON a.id_barang = b.id_barang WHERE id_berita_acara = '$id1' ");
        while ($tampil1 = mysqli_fetch_array($data1)) {
        ?>
            <tr>
                <td align="center"><?= $no1++; ?></td>
                <td align="center"><?= $tampil1['nm_barang'] ?></td>
                <td align="center"><?= $tampil1['kd_barang'] ?></td>
                <td><?= $tampil1['ket'] ?></td>
                <td align="center">
                    <a class="btn btn-sm btn-danger" href="#" id="hapus" data-id="<?= $tampil1[0]; ?>"> <i class="fa fa-trash"></i> Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>


<hr>