<div id="main">
    <div class="right">
        <h1>Pilih Paket Kredit</h1>
        <table>
            <tr>
                <td>
                    <p>Pilih Mobil &raquo; Metode Pembayaran &raquo; <b>Pilih Paket Kredit</b> &raquo; Pilih Pembeli &raquo; Konfirmasi Pembelian &raquo; Tambah Data Kredit</p>
                </td>
            </tr>
        </table>
        <?php
            if (empty($hasil)) {
                echo heading('Tidak Ada Data', 2);
                echo heading('Untuk menambah data paket kredit, silakan hubungi petugas.', 3);
            } else {
        ?>
        <?php echo form_open('leasing/CKredit/pilih_pembeli/'.$kode); ?>
        <table class="CSSTableGenerator">
            <tr>
                <td>&nbsp;</td>
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
                <td>
                    <?php $isi = array(
                                    'name'=>'kode_paket',
                                    'id'=>'kode_paket',
                                    'value'=>$data->kode_paket,
                                    'checked'=>FALSE
                                    );
                    echo form_radio($isi); ?>
                </td>
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
        <?php echo form_submit('submit','Lanjutkan','id="submit"'); ?>
        <?php echo form_close(); ?>
    </div>
</div>