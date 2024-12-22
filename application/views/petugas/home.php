<div id="main">
    <div class="right">
        <h1>Selamat Datang <?php echo $this->session->userdata('nama_lengkap');?></h1>
        <img src="<?php echo base_url();?>assets/img/18.jpg"/>
        <p>Selamat Datang di
        <br />
        <b>Aplikasi Kredit Mobil</b> dibuat dengan framework PHP yang bernama Code Igniter. Bebeberapa modul yang terdapat dalam aplikasi ini meliputi:
        <br />
        <b>1. Modul User</b>, yang berfungsi untuk mengelola data pengguna<br />
        <b>2. Modul Mobil</b>, yang berfungsi untuk mengelola data mobil. <br />
        <b>3. Modul Pembeli</b>, yang berfungsi untuk mengelola data pembeli. <br />
        <b>4. Modul Beli Cash</b>, yang berfungsi untuk mengelola data transaksi beli cash. <br />
        <b>5. Modul Paket Kredit</b>, yang berfungsi untuk mengelola data paket kredit.<br />
        <b>6. Modul Kredit</b>, yang berfungsi untuk mengelola data transaksi kredit.<br />
        <b>7. Modul Bayar Cicilan</b>, yang berfungsi untuk mengelola data transaksi bayar cicilan per bulan.<br />
        <br />
        <b>Administrator</b> dapat mengelola <b>data user</b>, dan dapat melihat <b>semua data</b> (tidak dapat mengelola).<br />
        <b>Leasing</b> dapat mengelola <b>data transaksi</b>, seperti <b>data beli cash</b>, <b>data kredit</b>, dan <b>data bayar cicilan</b>, namun leasing tidak dapat mengelola <b>data master</b>.<br />
        <b>Petugas</b> dapat mengelola <b>data master</b>, seperti <b>data mobil</b>, <b>data pembeli</b>, dan <b>data paket kredit</b>, namun petugas tidak dapat mengelola <b>data user</b> dan <b>data transaksi</b>.<br />
        <b>Manajer</b> dapat menghapus dan melihat <b>semua data</b>, termasuk <b>data login</b>.<br />
        </p>
    </div>
</div>