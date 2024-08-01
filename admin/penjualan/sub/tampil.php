<table class="table table-striped table-bordered">
    <thead class="bg-cyan">
        <tr align="center">
            <th>
                <center>No</center>
            </th>
            <th>
                <center>Nama Barang</center>
            </th>
            <th>
                <center>Stok Awal</center>
            </th>
            
            <th>
                <center>Harga</center>
            </th>
            <th>
                <center>Jumlah Jual</center>
            </th>
            <th>
                <center>Sub Total</center>
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

        $data1 = mysqli_query($con, "SELECT * FROM sub_penjualan a LEFT JOIN barang_jual b ON a.id_barang = b.id_barang WHERE id_penjualan = '$id1' ");
        while ($tampil1 = mysqli_fetch_array($data1)) {
        ?>
            <tr>
                <?php
                $harga_beli = $tampil1['harga_beli']; 
                ?>
                <td align="center"><?= $no1++; ?></td>
                <td><?= $tampil1['nm_barang'] ?></td>
                <td align="center">
                    <?php 
                $jumlah_barang = $tampil1['jumlah_barang']; 
                $jumlah_jual = $tampil1['jumlah_jual']; 
                $stok =  $jumlah_barang + $jumlah_jual;
                echo number_format($stok, 0, ',','.')
                ?></td>
                <td align="right">Rp <?= number_format($tampil1['harga'], 0, ',','.') ?></td>
                <td align="center"><?= number_format($tampil1['jumlah_jual'], 0, ',','.') ?></td>
                <td align="right">Rp <?= number_format($tampil1['sub_total'], 0, ',','.') ?></td>
                <td align="center">
                    <a class="btn btn-sm btn-danger" href="#" id="hapus" data-id="<?= $tampil1[0]; ?>"> <i class="fa fa-trash"></i> Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>


<hr>