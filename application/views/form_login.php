<div class="form-login">
    <?php echo form_open('CLogin/login_check');?>
    <?php echo validation_errors(); ?>
    <fieldset>
        <legend>
            <img src="<?php echo base_url(); ?>assets/img/ico/lock.png" width="24px">
        </legend>
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <?php echo form_input('username');?>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <?php echo form_password('password');?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo form_submit('submit','Log In');?>
                    <?php echo nbs();?>
                    <?php echo form_reset('reset','Reset');?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php echo form_close();?>
</div>