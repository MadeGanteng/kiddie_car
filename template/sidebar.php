<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
       
        <span class="brand-text">PT Kiddie Car</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-1 mb-1 d-flex">
            <div class="info">
                <a href="#" class="d-block"><i class="fas fa-user-circle mr-1"></i><b>
                        <?= $_SESSION['nm_user']; ?>
                    </b></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu</li>
                <?php if ($_SESSION['level'] == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/" class="nav-link <?php if ($page == 'dashboard') {
                                                                                echo 'active';
                                                                            } ?>">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview  <?php if ($page == 'user' || $page == 'ruang'|| $page == 'jenis_pembayaran') {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($page == 'user' || $page == 'ruang'|| $page == 'jenis_pembayaran') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/user/" class="nav-link <?php if ($page == 'user') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                    <i class="fas fa-user mr-1"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/ruang/" class="nav-link <?php if ($page == 'ruang') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="fas fa-map mr-1"></i>
                                    <p>Data Ruang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/jenis_pembayaran/" class="nav-link <?php if ($page == 'jenis_pembayaran') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="fas fa-map mr-1"></i>
                                    <p>Biaya Sewa</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview  <?php if ($page == 'barang' || $page == 'kartu' || $page == 'kondisi' || $page == 'mutasi' || $page == 'musnah' || $page == 'berita' || $page == 'pengadaan' || $page == 'perawatan' || $page == 'barang_jual') {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($page == 'barang' || $page == 'kartu' || $page == 'kondisi' || $page == 'mutasi' || $page == 'musnah' || $page == 'berita' || $page == 'pengadaan' || $page == 'perawatan' || $page == 'barang_jual') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-server"></i>
                            <p>
                                Manajemen Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/barang_jual/" class="nav-link <?php if ($page == 'barang_jual') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                    <i class="nav-icon fa fa-cube"></i>
                                    <p>Data Penjualan Barang Rusak</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/barang/" class="nav-link <?php if ($page == 'barang') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                    <i class="nav-icon fa fa-cube"></i>
                                    <p>Data Inventaris</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/kondisi/" class="nav-link <?php if ($page == 'kondisi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-thermometer-half"></i>
                                    <p>Data Kondisi Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/perawatan/" class="nav-link <?php if ($page == 'perawatan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-cogs"></i>
                                    <p>Data Perawatan Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/mutasi/" class="nav-link <?php if ($page == 'mutasi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-cubes"></i>
                                    <p>Data Mutasi Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/musnah/" class="nav-link <?php if ($page == 'musnah') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-trash"></i>
                                    <p>Data Pemusnahan Barang</p>
                                </a>
                            </li>
                           
                        </ul>
                    </li>

                    <li class="nav-item has-treeview  <?php if ($page == 'pembayaran' || $page == 'penjualan' || $page == 'biaya_operasional' || $page == 'grafik_anggaran') {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($page == 'pembayaran' || $page == 'penjualan' || $page == 'biaya_operasional' || $page == 'grafik_anggaran') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-bars"></i>
                            <p>
                                Manajemen Keuangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                            
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/penjualan/" class="nav-link <?php if ($page == 'penjualan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Penjualan Barang</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/biaya_operasional/" class="nav-link <?php if ($page == 'biaya_operasional') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Biaya Operasional</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-header">Laporan</li>

                    <li class="nav-item has-treeview  <?php if ($page == 'l_barang' || $page == 'l_kondisi' || $page == 'l_mutasi' || $page == 'l_musnah' || $page == 'l_pembayaran' || $page == 'l_penjualan' || $page == 'l_perawatan' || $page == 'l_list_anggaran' || $page == 'l_biaya_operasional' || $page == 'l_laba') {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($page == 'l_barang' || $page == 'l_kondisi' || $page == 'l_mutasi' || $page == 'l_musnah' || $page == 'l_pembayaran' || $page == 'l_penjualan' || $page == 'l_perawatan' || $page == 'l_list_anggaran' || $page == 'l_biaya_operasional' || $page == 'l_laba') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-print"></i>
                            <p>
                                Laporan Cetak
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_barang/" class="nav-link <?php if ($page == 'l_barang') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                    <i class="nav-icon fa fa-cube"></i>
                                    <p>Data Inventaris Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_kondisi/" class="nav-link <?php if ($page == 'l_kondisi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-thermometer-half"></i>
                                    <p>Data Kondisi Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_perawatan/" class="nav-link <?php if ($page == 'l_perawatan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-cogs"></i>
                                    <p>Data Perawatan Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_mutasi/" class="nav-link <?php if ($page == 'l_mutasi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-cubes"></i>
                                    <p>Data Mutasi Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_musnah/" class="nav-link <?php if ($page == 'l_musnah') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-trash"></i>
                                    <p>Data Musnah Barang</p>
                                </a>
                            </li>

                            
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_penjualan/" class="nav-link <?php if ($page == 'l_penjualan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Penjualan Barang</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_biaya_operasional/" class="nav-link <?php if ($page == 'l_biaya_operasional') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Biaya Operasional</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/laporan/l_laba/" class="nav-link <?php if ($page == 'l_laba') {
                                    echo 'active';
                                    } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Laba Rugi</p>
                                </a>

                                <!-- <a href="#" data-toggle="modal" data-target="#lap_penjualan_barang" class="nav-link"><i class="nav-icon fa fa-arrows-alt"></i><p>Data Laba Rugi</p></a> -->
                            </li>
                           
                        </ul>
                    </li>
                    
                <?php } else { ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/admin/" class="nav-link <?php if ($page == 'dashboard') {
                                                                                echo 'active';
                                                                            } ?>">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview  <?php if ($page == 'barang' || $page == 'kartu' || $page == 'kondisi' || $page == 'mutasi' || $page == 'musnah' || $page == 'berita' || $page == 'pengadaan' || $page == 'perawatan') {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($page == 'barang' || $page == 'kartu' || $page == 'kondisi' || $page == 'mutasi' || $page == 'musnah' || $page == 'berita' || $page == 'pengadaan' || $page == 'perawatan') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-server"></i>
                            <p>
                                Manajemen Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/barang/" class="nav-link <?php if ($page == 'barang') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                    <i class="nav-icon fa fa-cube"></i>
                                    <p>Data Inventaris Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/kondisi/" class="nav-link <?php if ($page == 'kondisi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-thermometer-half"></i>
                                    <p>Data Kondisi Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/perawatan/" class="nav-link <?php if ($page == 'perawatan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-cogs"></i>
                                    <p>Data Perawatan Barang</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/mutasi/" class="nav-link <?php if ($page == 'mutasi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-cubes"></i>
                                    <p>Data Mutasi Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/musnah/" class="nav-link <?php if ($page == 'musnah') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-trash"></i>
                                    <p>Data Musnah Barang</p>
                                </a>
                            </li>
                           
                        </ul>
                    </li>

                    <li class="nav-item has-treeview  <?php if ($page == 'pembayaran' || $page == 'penjualan' || $page == 'biaya_operasional' || $page == 'grafik_anggaran') {
                                                            echo 'menu-open';
                                                        } ?>">
                        <a href="#" class="nav-link <?php if ($page == 'pembayaran' || $page == 'penjualan' || $page == 'biaya_operasional' || $page == 'grafik_anggaran') {
                                                        echo 'active';
                                                    } ?>">
                            <i class="nav-icon fa fa-bars"></i>
                            <p>
                                Manajemen Keuangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
                          
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/penjualan/" class="nav-link <?php if ($page == 'penjualan') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Penjualan Barang</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin/biaya_operasional/" class="nav-link <?php if ($page == 'biaya_operasional') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fa fa-arrows-alt"></i>
                                    <p>Data Biaya Operasional</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>

<?php

$date_now = date('Y-m-d');
$date_old = date('Y-m-d', mktime(0, 0, 0, date('m') - 1, date('d'), date('y')));
?>

<div class="modal fade" id="lap_penjualan_barang" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Laporan Data Laba Rugi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" target="_blank" action="<?= base_url('laporan/l_laba/cetak_hasil') ?>">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <label>Bulan</label>
                            <select  class="form-control" name="bulan" id="bulan">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <!-- <input type="month" class="form-control" name="bulan" required> -->
                        </div>
                       
                        <div class="col-md-2" style="margin-top: 31px;">
                            <button type="submit" name="cetak1" class="btn btn-info btn-sm"><i class="fa fa-print"> </i> Cetak</button>
                        </div>
                    </div>
                </form>
                <hr>
                <!-- <div class="col-md-12 text-center">
                    <a href="<?= base_url('laporan/l_laba/cetak_hasil') ?>" target="_blank" class="btn bg-purple btn-sm"><i class="fa fa-print"> </i> Cetak Semua </a>
                </div> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
