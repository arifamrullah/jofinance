<div id="main">
    <div class="right">
        <h1>Tambah Data Pembeli</h1>
        <?php echo form_open('petugas/CPembeli/add'); ?>
        <table class="form">
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td>
                    <?php echo form_input('ktp'); ?>
                </td>
            </tr>
            <tr>
                <td>Nama Pembeli</td>
                <td>:</td>
                <td>
                    <?php echo form_input('nama'); ?>
                </td>
            </tr>
            <tr>
                <td>Alamat Pembeli</td>
                <td>:</td>
                <td>
                    <?php echo form_input('alamat'); ?>
                </td>
            </tr>
            <tr>
                <td>No. Telpon Pembeli</td>
                <td>:</td>
                <td>
                    <?php echo form_input('telp'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit','Tambah','id="submit"'); ?>
                    <?php echo nbs(); ?>
                    <?php echo form_reset('reset','Reset'); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close();?>
    </div>
</div>