<div id="main">
    <div class="right">
        <h1>Tambah Data Bayar Cicilan</h1>
        <?php echo form_open('leasing/CBayarCicilan/add'); ?>
        <table class="form">
            <tr>
                <td>Kode Kredit</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodekrd'); ?>
                </td>
            </tr>
            <tr>
                <td>Kode Paket</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodepkt'); ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo form_input('tgl'); ?>
                </td>
            </tr>
            <tr>
                <td>Jumlah Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo form_input('jumcil'); ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan ke</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cilke'); ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan Sisa ke</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cilsisake'); ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan Sisa Harga</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cilsisahrg'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit', 'Tambah', 'id="submit"'); ?>
                    <?php echo nbs(); ?>
                    <?php echo form_reset('reset', 'Reset'); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>