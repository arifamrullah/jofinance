<div id="main">
    <div class="right">
        <h1>Ubah Data User</h1>
        <?php echo form_open('admin/CUser/update/'.$hasil->username); ?>
        <table class="form">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <?php echo form_input('user', $hasil->username); ?>
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>
                    <?php echo form_input('nama', $hasil->nama_lengkap); ?>
                </td>
            </tr>
            <tr>
                <td>Hak Akses</td>
                <td>:</td>
                <td>
                    <?php $options = array(
                                    'Administrator'=>'Administrator',
                                    'Leasing'=>'Leasing',
                                    'Manajer'=>'Manajer',
                                    'Petugas'=>'Petugas'
                                    );
                    echo form_dropdown('hak', $options, $hasil->hak_akses); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit', 'Ubah', 'id="submit"'); ?>
                    <?php echo nbs(); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>