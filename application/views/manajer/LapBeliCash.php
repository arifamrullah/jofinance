<div id="main">
    <div class="right">
        <h1>Data Beli Cash</h1>
        <?php echo form_open('manajer/CBeliCash/lap_search'); ?>
        <table class="form">
            <tr>
                <td>Tanggal Awal</td>
                <td>:</td>
                <td>
                    <?php echo form_date('tgl_awal'); ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Selesai</td>
                <td>:</td>
                <td>
                    <?php echo form_date('tgl_akhir'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit','Tampilkan','id="submit"'); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>