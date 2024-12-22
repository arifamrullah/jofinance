<div id="main">
    <div class="right">
        <h1>Tambah Data Kredit</h1>
        <table>
            <tr>
                <td>
                    <p>Pilih Mobil &raquo; Metode Pembayaran &raquo; Pilih Pembeli &raquo; <b>Konfirmasi Pembelian</b> &raquo; Tambah Data ke Sistem</p>
                </td>
            </tr>
        </table>
        <?php echo form_open('leasing/CKredit/add/'); ?>
        <table class="form">
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td>
                    <?php echo form_input('ktp', $KTP, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Kode Paket</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodepkt', $kode_paket, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Kode Mobil</td>
                <td>:</td>
                <td>
                    <?php echo form_input('kodembl', $kode, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Kredit</td>
                <td>:</td>
                <td>
                    <?php echo form_input('tgl', date('Y-m-d'), 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Fotokopi KTP</td>
                <td>:</td>
                <td>
                    <?php $data = array(
                        'name'=>'fkktp',
                        'id'=>'fkktp',
                        'value'=>'Ada',
                        'checked'=>FALSE
                        );
                    echo form_radio($data); ?>
                    Ada
                    <br />
                    <?php $data = array(
                        'name'=>'fkktp',
                        'id'=>'fkktp',
                        'value'=>'Tidak Ada',
                        'checked'=>FALSE
                        );
                    echo form_radio($data); ?>
                    Tidak Ada
                </td>
            </tr>
            <tr>
                <td>Fotokopi KK</td>
                <td>:</td>
                <td>
                    <?php $data = array(
                        'name'=>'fkkk',
                        'id'=>'fkkk',
                        'value'=>'Ada',
                        'checked'=>FALSE
                        );
                    echo form_radio($data); ?>
                    Ada
                    <br />
                    <?php $data = array(
                        'name'=>'fkkk',
                        'id'=>'fkkk',
                        'value'=>'Tidak Ada',
                        'checked'=>FALSE
                        );
                    echo form_radio($data); ?>
                    Tidak Ada
                </td>
            </tr>
            <tr>
                <td>Fotokopi Slip Gaji</td>
                <td>:</td>
                <td>
                    <?php $data = array(
                        'name'=>'fksg',
                        'id'=>'fksg',
                        'value'=>'Ada',
                        'checked'=>FALSE
                        );
                    echo form_radio($data); ?>
                    Ada
                    <br />
                    <?php $data = array(
                        'name'=>'fksg',
                        'id'=>'fksg',
                        'value'=>'Tidak Ada',
                        'checked'=>FALSE
                        );
                    echo form_radio($data); ?>
                    Tidak Ada
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