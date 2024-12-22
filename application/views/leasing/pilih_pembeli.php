<div id="main">
    <div class="right">
        <h1>Pilih Pembeli</h1>
        <table style="margin:10px 0 20px;width:100%;">
            <tr>
                <td>
                    <div id="search">
                        <form action="<?php echo site_url('leasing/CPembeli/search/'.$kode); ?>" method="post">
                            <input type="text" name="keyword" title="Masukkan Kata Kunci" placeholder="Cari Nama" class="txt_field" />
                            <input type="submit" value="" title="Cari" class="sub_btn" />
                        </form>
                    </div>
                    <p>Pilih Mobil &raquo; Metode Pembayaran &raquo; <b>Pilih Pembeli</b> &raquo; Konfirmasi Pembelian &raquo; Tambah Data Pembelian Cash</p>
                </td>
            </tr>
        </table>
        <?php
            if (empty($hasil)) {
                echo heading('Tidak Ada Data', 2);
                echo heading('Untuk menambah data pembeli, silakan hubungi petugas.', 3);
            } else {
        ?>
        <?php echo form_open('leasing/CBeliCash/confirm/'.$kode); ?>
        <table class="CSSTableGenerator" cellpadding=5>
            <tr>
                <td>&nbsp;</td>
                <td>No</td>
                <td>KTP</td>
                <td>Nama Pembeli</td>
                <td>Alamat Pembeli</td>
                <td>No. Telp Pembeli</td>
            </tr>
            <?php
                $no = 1;
                foreach ($hasil as $data):
            ?>
            <tr>
                <td>
                    <?php $isi = array(
                                    'name'=>'ktp',
                                    'id'=>'ktp',
                                    'value'=>$data->KTP,
                                    'checked'=>FALSE
                                    );
                    echo form_radio($isi); ?>
                </td>
                <td><?php echo $no; ?></td>
                <td><?php echo $data->KTP; ?></td>
                <td><?php echo $data->nama_pembeli; ?></td>
                <td><?php echo $data->alamat_pembeli; ?></td>
                <td><?php echo $data->telp_pembeli; ?></td>
            </tr>
            <?php
                $no++;
                endforeach;
            ?>
        </table>
        <?php
            }
        ?>
        <?php echo form_submit('submit','Lanjutkan','id="submit"'); ?>
        <?php echo form_close(); ?>
    </div>
</div>