<div id="main">
    <div class="right">
        <h1>Data Paket Kredit</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <div id="search">
                        <form action="<?php echo site_url('admin/CPaketKredit/search'); ?>" method="post">
                            <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Kode Paket" class="txt_field" />
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
                <table class="CSSTableGenerator" cellpadding="5">
                    <tr>
                        <td>No</td>
                        <td>Kode Paket</td>
                        <td>Harga Paket</td>
                        <td>Uang Muka</td>
                        <td>Paket Jumlah Cicilan</td>
                        <td>Bunga</td>
                        <td>Nilai Cicilan</td>
                    </tr>
                    <?php 
                        $no = 1;
                        foreach ($hasil as $data):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data->kode_paket; ?></td>
                        <td><?php echo 'Rp '.number_format($data->harga_paket,0,',','.'); ?></td>
                        <td><?php echo 'Rp '.number_format($data->uang_muka,0,',','.'); ?></td>
                        <td><?php echo $data->paket_jumlah_cicilan; ?></td>
                        <td><?php echo $data->bunga; ?></td>
                        <td><?php echo 'Rp '.number_format($data->nilai_cicilan,0,',','.'); ?></td>
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