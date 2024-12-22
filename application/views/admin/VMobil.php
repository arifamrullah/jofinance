<div id="main">
    <div class="right">
        <h1>Data Mobil</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <!--
                <td>
                    <p>* Untuk menambah data mobil, silakan hubungi petugas</p>
                </td>
                -->
                <td>
                    <div id="search">
                        <form action="<?php echo site_url('admin/CMobil/search'); ?>" method="post">
                            <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Kode / Merk / Type" class="txt_field" />
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
                        <td>Kode Mobil</td>
                        <td>Merk</td>
                        <td>Type</td>
                        <td>Warna</td>
                        <td>Harga</td>
                        <td>Gambar</td>
                    </tr>
                    <?php
                        $no=1;
                        foreach($hasil as $data):
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo $data->kode_mobil; ?></td>
                        <td><?php echo $data->merk; ?></td>
                        <td><?php echo $data->type; ?></td>
                        <td><?php echo $data->warna; ?></td>
                        <td><?php echo 'Rp '.number_format($data->harga_mobil,0,',','.'); ?></td>
                        <td>
                            <img src="<?php echo base_url(); ?>assets/img/car/thumbnails/<?php echo $data->gambar; ?>" /></a>
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