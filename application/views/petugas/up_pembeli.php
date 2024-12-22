<div id="main">
    <div class="right">
        <h1>Ubah Data Pembeli</h1>
        <?php echo form_open('petugas/CPembeli/update/'.$hasil->KTP); ?>
        <table class="form">
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td>
                    <?php echo form_input('ktp', $hasil->KTP); ?>
                </td>
            </tr>
            <tr>
                <td>Nama Pembeli</td>
                <td>:</td>
                <td>
                    <?php echo form_input('nama', $hasil->nama_pembeli); ?>
                </td>
            </tr>
            <tr>
                <td>Alamat Pembeli</td>
                <td>:</td>
                <td>
                    <?php echo form_input('alamat', $hasil->alamat_pembeli); ?>
                </td>
            </tr>
            <tr>
                <td>No. Telpon Pembeli</td>
                <td>:</td>
                <td>
                    <?php echo form_input('telp', $hasil->telp_pembeli); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit','Ubah','id="submit"'); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>