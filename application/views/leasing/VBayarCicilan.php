<div id="main">
    <div class="right">
        <h1>Data Bayar Cicilan</h1>
            <table style="margin:10px 0 20px;width:100%;">
                <tr>
                    <td>
                        <div id="search">
                            <form action="<?php echo base_url(); ?>index.php/leasing/CBayarCicilan/search" method="post">
                                <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari berdasarkan kode cicilan" class="txt_field" />
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
                <td>Kode Cicilan</td>
                <td>Kode Kredit</td>
                <td>Tanggal Cicilan</td>
                <td>Jumlah Cicilan</td>
                <td>Cicilan ke</td>
                <td>Cicilan Sisa ke</td>
                <td>Cicilan Sisa Harga</td>
                <td colspan="2">Aksi</td>
            </tr>
            <?php 
                $no = 1;
                foreach ($hasil as $data):
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data->kode_cicilan; ?></td>
                <td><?php echo $data->kode_kredit; ?></td>
                <td><?php echo $data->tgl_cicilan; ?></td>
                <td><?php echo 'Rp '.number_format($data->jumlah_cicilan,0,',','.'); ?></td>
                <td><?php echo $data->cicilan_ke; ?></td>
                <td><?php echo $data->cicilan_sisa_ke; ?></td>
                <td><?php echo 'Rp '.number_format($data->cicilan_sisa_harga,0,',','.'); ?></td>
                <td>
                    <a class="ubah" title="Ubah" href = "<?php echo base_url(); ?>index.php/leasing/CBayarCicilan/update/<?php echo $data->kode_cicilan; ?>"></a>
                </td>
                <td>
                    <a class="hapus" title="Hapus" href = "<?php echo base_url(); ?>index.php/leasing/CBayarCicilan/delete/<?php echo $data->kode_cicilan; ?>" onClick="return confirm('Apakah Anda Yakin?');"></a>
                    <a class="view" title="Detail" href = "<?php echo base_url(); ?>index.php/leasing/CBayarCicilan/detail/<?php echo $data->kode_cicilan; ?>"></a>
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