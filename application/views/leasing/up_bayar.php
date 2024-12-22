<div id="main">
    <div class="right">
        <h1>Ubah Data Bayar Cicilan</h1>
        <?php echo form_open('leasing/CBayarCicilan/update/'.$hasil->kode_cicilan); ?>
        <table class="form">
            <tr>
                <td>Kode Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kode', $hasil->kode_cicilan, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Kode Kredit</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodekrd', $hasil->kode_kredit, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo form_input('tgl', $hasil->tgl_cicilan); ?>
                </td>
            </tr>
            <tr>
                <td>Jumlah Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo form_input('jumcil', $hasil->jumlah_cicilan); ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan ke</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cilke', $hasil->cicilan_ke); ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan Sisa ke</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cilsisake', $hasil->cicilan_sisa_ke); ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan Sisa Harga</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cilsisahrg', $hasil->cicilan_sisa_harga); ?>
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