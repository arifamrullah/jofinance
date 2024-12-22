<div id="main">
    <div class="right">
        <h1>Tambah Data User</h1>
        <?php echo form_open('admin/CUser/add'); ?>
        <table class="form">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <?php echo form_input('user'); ?>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <?php echo form_password('pass'); ?>
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>
                    <?php echo form_input('nama'); ?>
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
                    echo form_dropdown('hak', $options); ?>
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