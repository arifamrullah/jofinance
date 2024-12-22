<div id="main">
    <div class="right">
        <h1>Ubah Data Kredit</h1>
        <?php echo form_open('leasing/CKredit/update/'.$hasil->kode_kredit); ?>
        <table class="form">
            <tr>
                <td>Kode Kredit</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kode', $hasil->kode_kredit, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td>
                    <?php echo form_input('ktp', $hasil->KTP); ?>
                </td>
            </tr>
            <tr>
                <td>Kode Paket</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodepkt', $hasil->kode_paket); ?>
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
                <td>Tanggal Kredit</td>
                <td>:</td>
                <td>
                    <?php echo form_input('tgl', $hasil->tgl_kredit); ?>
                </td>
            </tr>
            <tr>
                <td>Fotokopi KTP</td>
                <td>:</td>
                <td>
                    <?php
                        if ($hasil->fotokopi_ktp == 'Ada') {
                            echo form_radio('fkktp','Ada','TRUE');
                            echo "Ada";
                            echo br();
                            echo form_radio('fkktp','Tidak Ada');
                            echo "Tidak Ada";
                        } else if ($hasil->fotokopi_ktp == 'Tidak Ada') {
                            echo form_radio('fkktp','Ada');
                            echo "Ada";
                            echo br();
                            echo form_radio('fkktp','Tidak Ada','TRUE');
                            echo "Tidak Ada";
                        } else {
                            echo form_radio('fkktp','Ada');
                            echo "Ada";
                            echo br();
                            echo form_radio('fkktp','Tidak Ada');
                            echo "Tidak Ada";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Fotokopi KK</td>
                <td>:</td>
                <td>
                    <?php
                        if ($hasil->fotokopi_ktp == 'Ada') {
                            echo form_radio('fkkk','Ada','TRUE');
                            echo "Ada";
                            echo br();
                            echo form_radio('fkkk','Tidak Ada');
                            echo "Tidak Ada";
                        } else if ($hasil->fotokopi_ktp == 'Tidak Ada') {
                            echo form_radio('fkkk','Ada');
                            echo "Ada";
                            echo br();
                            echo form_radio('fkkk','Tidak Ada','TRUE');
                            echo "Tidak Ada";
                        } else {
                            echo form_radio('fkkk','Ada');
                            echo "Ada";
                            echo br();
                            echo form_radio('fkkk','Tidak Ada');
                            echo "Tidak Ada";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Fotokopi Slip Gaji</td>
                <td>:</td>
                <td>
                    <?php
                        if ($hasil->fotokopi_ktp == 'Ada') {
                            echo form_radio('fksg','Ada','TRUE');
                            echo "Ada";
                            echo br();
                            echo form_radio('fksg','Tidak Ada');
                            echo "Tidak Ada";
                        } else if ($hasil->fotokopi_ktp == 'Tidak Ada') {
                            echo form_radio('fksg','Ada');
                            echo "Ada";
                            echo br();
                            echo form_radio('fksg','Tidak Ada','TRUE');
                            echo "Tidak Ada";
                        } else {
                            echo form_radio('fksg','Ada');
                            echo "Ada";
                            echo br();
                            echo form_radio('fksg','Tidak Ada');
                            echo "Tidak Ada";
                        }
                    ?>
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