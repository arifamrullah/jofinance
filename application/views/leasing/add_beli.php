<div id="main">
    <div class="right">
        <h1>Tambah Data Beli Cash</h1>
        <table>
            <tr>
                <td>
                    <p>Pilih Mobil &raquo; Metode Pembayaran &raquo; Pilih Pembeli &raquo; <b>Konfirmasi Pembelian</b> &raquo; Tambah Data ke Sistem</p>
                </td>
            </tr>
        </table>
        <?php echo form_open('leasing/CBeliCash/add'); ?>
        <table class="form">
            <tr>
                <td>No. KTP</td>
                <td>:</td>
                <td>
                    <?php echo form_input('ktp', $KTP, 'readonly'); ?>
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
                <td>Tanggal Cash</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cashtgl', date('Y-m-d'), 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td>Bayar Cash</td>
                <td>:</td>
                <td>
                    <?php echo form_input('cashbyr', $harga->harga_mobil, 'readonly'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo nbs(); ?>
                </td>
                <td>
                    <?php echo form_submit('submit', 'Tambah', 'id="submit"'); ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>