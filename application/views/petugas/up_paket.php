<div id="main">
    <div class="right">
        <h1>Ubah Data Paket Kredit</h1>
        <?php echo form_open('petugas/CPaketKredit/update/'.$hasil->kode_paket); ?>
        <table class="form">
            <tr>
                <td>Kode Paket</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kode', $hasil->kode_paket); ?>
                </td>
            </tr>
            <tr>
                <td>Harga Paket</td>
                <td>:</td>
                <td>
                    <?php echo form_input('harga', $hasil->harga_paket); ?>
                </td>
            </tr>
            <tr>
                <td>Uang Muka</td>
                <td>:</td>
                <td>
                    <?php echo form_input('dp', $hasil->uang_muka); ?>
                </td>
            </tr>
            <tr>
                <td>Paket Jumlah Cicilan</td>
                <td>:</td>
                <td>
                    <?php
                        if ($hasil->paket_jumlah_cicilan == '11') {
                            echo form_radio('jumcil','11','TRUE');
                            echo "11 bulan";
                            echo br();
                            echo form_radio('jumcil','23');
                            echo "23 bulan";
                        } else if ($hasil->paket_jumlah_cicilan == '23'){
                            echo form_radio('jumcil','11');
                            echo "11 bulan";
                            echo br();
                            echo form_radio('jumcil','23',TRUE);
                            echo "23 bulan";
                        } else {
                            echo form_radio('jumcil','11');
                            echo "11 bulan";
                            echo br();
                            echo form_radio('jumcil','23');
                            echo "23 bulan";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Bunga</td>
                <td>:</td>
                <td>
                    <?php echo form_input('bunga', $hasil->bunga); ?>
                </td>
            </tr>
            <tr>
                <td>Nilai Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo form_input('nilcil', $hasil->nilai_cicilan); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit', 'Ubah', 'id="submit"'); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>