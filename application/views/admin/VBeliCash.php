<div id="main">
    <div class="right">
        <h1>Data Beli Cash</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <div id="search">
                        <form action="<?php echo site_url('admin/CBeliCash/search'); ?>" method="post">
                            <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Kode Cash / Kode Mobil" class="txt_field" />
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
                        <td>Kode Cash</td>
                        <td>No. KTP</td>
                        <td>Kode Mobil</td>
                        <td>Tanggal Cash</td>
                        <td>Bayar Cash</td>
                    </tr>
                    <?php 
                        $no = 1;
                        foreach ($hasil as $data):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->kode_cash; ?></td>
                        <td><?php echo $data->KTP; ?></td>
                        <td><?php echo $data->kode_mobil; ?></td>
                        <td><?php echo $data->cash_tgl; ?></td>
                        <td><?php echo 'Rp '.number_format($data->cash_bayar,0,',','.'); ?></td>
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