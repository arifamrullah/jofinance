<div id="main">
    <div class="right">
        <h1>Tambah Data Mobil</h1>
        <?php echo form_open_multipart('petugas/CMobil/add'); ?>
        <table class="form">
            <tr>
                <td>Kode Mobil</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kode','KM_'); ?>
                </td>
            </tr>
            <tr>
                <td>Merk</td>
                <td>:</td>
                <td>
                    <?php echo form_input('merk'); ?>
                </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>:</td>
                <td>
                    <?php echo form_input('type'); ?>
                </td>
            </tr>
            <tr>
                <td>Warna</td>
                <td>:</td>
                <td>
                    <?php echo form_input('warna'); ?>
                </td>
            </tr>
            <tr>
                <td>Harga Mobil</td>
                <td>:</td>
                <td>
                    <?php echo form_input('harga'); ?>
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td>
                    <?php echo form_upload('userfile'); ?>
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