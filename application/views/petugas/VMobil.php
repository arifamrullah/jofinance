<div id="main">
    <div class="right">
    <h1>Data Mobil</h1>
    <table style="margin:10px 0 20px;width:100%;">
        <tr>
            <td>
                <h3>
                    <a class="add" title="Tambah" href="<?php echo site_url('petugas/CMobil/add'); ?>"></a>
                </h3>
            </td>
            <td>
                <div id="search">
                    <form action="<?php echo base_url(); ?>index.php/petugas/CMobil/search" method="post">
                        <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Kode Mobil / Merk / Type" class="txt_field" />
                    </form>
                </div>
            </td>
        </tr>
    </table>
    <?php
        if (empty($hasil)) {
            echo heading('Tidak Ada Data', 3);
        } else {
    ?>
            <table class="CSSTableGenerator" cellpadding="5">
                <tr>
                    <td>No</td>
                    <td>Kode Mobil</td>
                    <td>Merk</td>
                    <td>Type</td>
                    <td>Warna</td>
                    <td>Harga</td>
                    <td>Gambar</td>
                    <td colspan="2">Aksi</td>
                </tr>
                <?php
                    $no=1;
                    foreach($hasil as $data):
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data->kode_mobil; ?></td>
                    <td><?php echo $data->merk; ?></td>
                    <td><?php echo $data->type; ?></td>
                    <td><?php echo $data->warna; ?></td>
                    <td><?php echo 'Rp '.number_format($data->harga_mobil,0,',','.'); ?></td>
                    <td>
                        <img src="<?php echo base_url(); ?>assets/img/car/thumbnails/<?php echo $data->gambar; ?>" />
                    </td>
                    <td>
                        <a class="ubah" title="Ubah" href ="<?php echo base_url(); ?>index.php/petugas/CMobil/update/<?php echo $data->kode_mobil; ?>"></a>
                    </td>
                    <td>
                        <a class="hapus" title="Hapus" href ="<?php echo base_url(); ?>index.php/petugas/CMobil/delete/<?php echo $data->kode_mobil; ?>" onClick="return confirm('Apakah Anda Yakin?');"></a>
                    </td>
                </tr>
                <?php
                    $no++;
                    endforeach;
                ?>
            </table>
        <?php
        }
        ?>
    </div>
</div>