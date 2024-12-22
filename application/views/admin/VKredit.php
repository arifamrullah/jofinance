<div id="main">
    <div class="right">
        <h1>Data Kredit</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <div id="search">
                        <form action="<?php echo site_url('admin/CKredit/search'); ?>" method="post">
                            <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Kode Kredit / Paket / Mobil" class="txt_field" />
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
                        <td>Kode Kredit</td>
                        <td>KTP</td>
                        <td>Kode Paket</td>
                        <td>Kode Mobil</td>
                        <td>Tanggal Kredit</td>
                        <td>Fotokopi KTP</td>
                        <td>Fotokopi KK</td>
                        <td>Fotokopi Slip Gaji</td>
                    </tr>
                    <?php 
                        $no = 1;
                        foreach ($hasil as $data):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->kode_kredit; ?></td>
                        <td><?php echo $data->KTP; ?></td>
                        <td><?php echo $data->kode_paket; ?></td>
                        <td><?php echo $data->kode_mobil; ?></td>
                        <td><?php echo $data->tgl_kredit; ?></td>
                        <td><?php echo $data->fotokopi_ktp; ?></td>
                        <td><?php echo $data->fotokopi_kk; ?></td>
                        <td><?php echo $data->fotokopi_slip_gaji; ?></td>
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