<div id="main">
    <div class="right">
        <h1>Data Pembeli</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <h3>
                        <a class="add" title="Tambah" href="<?php echo site_url('petugas/CPembeli/add'); ?>">
                        </a>
                    </h3>
                </td>
                <td>
                    <div id="search">
                         <form action="<?php echo base_url(); ?>index.php/petugas/CPembeli/search" method="post">
                             <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Nama Pembeli" class="txt_field" />
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
                <td>KTP</td>
                <td>Nama Pembeli</td>
                <td>Alamat Pembeli</td>
                <td>No. Telp Pembeli</td>
                <td style="text-align:center;" colspan="2">Aksi</td>
            </tr>
            <?php
                $no = 1;
                foreach($hasil as $data):
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data->KTP; ?></td>
                <td><?php echo $data->nama_pembeli; ?></td>
                <td><?php echo $data->alamat_pembeli; ?></td>
                <td><?php echo $data->telp_pembeli; ?></td>
                <td>
                    <a class="ubah" title="Ubah" href ="<?php echo base_url(); ?>index.php/petugas/CPembeli/update/<?php echo $data->KTP; ?>"></a>
                </td>
                <td>
                    <a class="hapus" title="Hapus" href ="<?php echo base_url(); ?>index.php/petugas/CPembeli/delete/<?php echo $data->KTP; ?>" onClick="return confirm('Apakah Anda Yakin?');"></a>
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