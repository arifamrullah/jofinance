<div id="main">
    <div class="right">
        <h1>Ubah Data Paket Kredit</h1>
        <?php echo form_open('CBeliCash/update/'.$hasil->kode_cash); ?>
        <table class="form">
            <tr>
                <td>Kode Cash</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kode', $hasil->kode_cash, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>No. KTP</td>
                <td>:</td>
                <td>
                    <?php echo form_input('ktp', $hasil->KTP); ?>
                </td>
            </tr>
            <tr>
                <td>Kode Mobil</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodembl', $hasil->kode_mobil); ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Cash</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cashtgl', $hasil->cash_tgl); ?>
                </td>
            </tr>
            <tr>
                <td>Bayar Cash</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cashbyr', $hasil->cash_bayar); ?>
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