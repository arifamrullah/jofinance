<div id="main">
    <div class="right">
        <h1>Data Pembeli</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <div id="search">
                         <form action="<?php echo base_url(); ?>index.php/manajer/CPembeli/search" method="post">
                             <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Nama Pembeli" class="txt_field" />
                             <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Cari" class="sub_btn"  />
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
        <table class="CSSTableGenerator">
            <tr>
                <td>No</td>
                <td>KTP</td>
                <td>Nama Pembeli</td>
                <td>Alamat Pembeli</td>
                <td>No. Telp Pembeli</td>
                <td style="text-align:center;">Aksi</td>
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
                    <a class="hapus" title="Hapus" href ="<?php echo base_url(); ?>index.php/manajer/CPembeli/delete/<?php echo $data->KTP; ?>" onClick="return confirm('Apakah Anda Yakin?');"></a>
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