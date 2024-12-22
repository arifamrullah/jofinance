<div id="main">
    <div class="right">
        <h1>Data User</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <div id="search">
                        <form action="<?php echo base_url(); ?>index.php/manajer/CUser/search" method="post">
                            <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Username / Nama / Hak" class="txt_field" />
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
                        <td>Username</td>
                        <td>Nama Lengkap</td>
                        <td>Hak Akses</td>
                        <td style="text-align:center;">Aksi</td>
                    </tr>
                    <?php
                        $no=1;
                        foreach($hasil as $data):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->username; ?></td>
                        <td><?php echo $data->nama_lengkap; ?></td>
                        <td><?php echo $data->hak_akses; ?></td>
                        <td>
                            <a class="hapus" title="Hapus" href ="<?php echo base_url(); ?>index.php/manajer/CUser/delete/<?php echo $data->username; ?>" onClick="return confirm('Apakah Anda Yakin?');"></a>
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