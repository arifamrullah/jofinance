<div id="main">
    <div class="right">
        <h1>Tambah Data Paket Kredit</h1>
        <?php echo form_open('petugas/CPaketKredit/add'); ?>
            <table class="form">
                <tr>
                    <td>Kode Paket</td>
                    <td>:</td>
                    <td>
                        <?php echo form_input('kode'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Harga Paket</td>
                    <td>:</td>
                    <td>
                        <?php echo form_input('harga'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Uang Muka</td>
                    <td>:</td>
                    <td>
                        <?php echo form_input('dp'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Paket Jumlah Cicilan</td>
                    <td>:</td>
                    <td>
                        <?php $data = array(
                            'name'=>'jumcil',
                            'id'=>'jumcil',
                            'value'=>'11',
                            'checked'=>FALSE
                            );
                        echo form_radio($data); ?>
                        11 bulan
                        <br />
                        <?php $data = array(
                            'name'=>'jumcil',
                            'id'=>'jumcil',
                            'value'=>'23',
                            'checked'=>FALSE
                            );
                        echo form_radio($data); ?>
                        23 bulan
                    </td>
                </tr>
                <tr>
                    <td>Bunga</td>
                    <td>:</td>
                    <td>
                        <?php echo form_input('bunga'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Nilai Cicilan</td>
                    <td>:</td>
                    <td>
                        <?php echo form_input('nilcil'); ?>
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