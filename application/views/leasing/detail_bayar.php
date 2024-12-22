<div id="main">
    <div class="right">
        <h1>Detail Data Bayar Cicilan</h1>
        <?php echo form_open('leasing/CBayarCicilan/detail/'.$hasil->kode_cicilan); ?>
        <?php echo form_hidden('kp', $hasil->kode_paket) ?>
        <table class="form">
            <tr>
                <td>Kode Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->kode_cicilan ?>
                </td>
            </tr>
            <tr>
                <td>Kode Kredit</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->kode_kredit ?>
                </td>
            </tr>
            <tr>
                <td>Tanggal Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->tgl_cicilan ?>
                </td>
            </tr>
            <tr>
                <td>Jumlah Cicilan</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->jumlah_cicilan ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan ke</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->cicilan_ke ?>
                    <?php echo form_hidden('cilke', $hasil->cicilan_ke) ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan Sisa ke</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->cicilan_sisa_ke ?>
                    <?php echo form_hidden('cilsiske', $hasil->cicilan_sisa_ke) ?>
                </td>
            </tr>
            <tr>
                <td>Cicilan Sisa Harga</td>
                <td>:</td>
                <td>
                    <?php echo $hasil->cicilan_sisa_harga ?>
                    <?php echo form_hidden('sishar', $hasil->cicilan_sisa_harga) ?>
                </td>
            </tr>
            <tr>
                <td>Bayar</td>
                <td>:</td>
                <td>
                    <?php $opt = array(
                            '1'=>'1 bulan',
                            '2'=>'2 bulan',
                            '3'=>'3 bulan',
                            '4'=>'4 bulan',
                            '5'=>'5 bulan',
                            '6'=>'6 bulan',
                            '7'=>'7 bulan',
                            '8'=>'8 bulan',
                            '9'=>'9 bulan',
                            '10'=>'10 bulan',
                            '11'=>'11 bulan'
                            );
                    echo form_dropdown('bulan', $opt); ?>
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