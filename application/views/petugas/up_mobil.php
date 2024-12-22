<div id="main">
    <div class="right">
        <h1>Ubah Data Mobil</h1>
        <?php echo form_open_multipart('petugas/CMobil/update/'.$hasil->kode_mobil); ?>
        <table class="form">
            <tr>
                <td>Kode Mobil</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kode', $hasil->kode_mobil, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Merk</td>
                <td>:</td>
                <td>
                    <?php echo form_input('merk', $hasil->merk); ?>
                </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>:</td>
                <td>
                    <?php echo form_input('type', $hasil->type); ?>
                </td>
            </tr>
            <tr>
                <td>Warna</td>
                <td>:</td>
                <td>
                    <?php echo form_input('warna', $hasil->warna); ?>
                </td>
            </tr>
            <tr>
                <td>Harga Mobil</td>
                <td>:</td>
                <td>
                    <?php echo form_input('harga', $hasil->harga_mobil); ?>
                </td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td>
                    <img src="<?php echo base_url('assets/img/car/thumbnails/'.$hasil->gambar); ?>" /><br />
                    <?php
                        echo form_upload('userfile', base_url('assets/img/car/'.$hasil->gambar));
                    ?>
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