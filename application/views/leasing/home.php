<div id="main">
    <div class="right">
        <h1>Pilih Mobil</h1>
        <div id="search">
            <form action="<?php echo base_url(); ?>index.php/leasing/home/search" method="post">
                <input type="text" name="keyword" id="keyword" title="Masukkan Kata Kunci" placeholder="Cari Merk / Type" class="txt_field" />
                <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Cari" class="sub_btn"  />
            </form>
        </div>
        <?php 
            if (empty($hasil)) {
                echo heading('Tidak Ada Data',2);
            } else {
                foreach($hasil as $data):
            ?>
        <div class="right_left">
            <?php echo form_hidden('kode', $data->kode_mobil); ?>
            <h2>
                <?php echo $data->merk, nbs(), $data->type; ?>
            </h2>
            <img src="<?php echo base_url(); ?>assets/img/car/<?php echo $data->gambar; ?>" />
            <br />
            <a href="" class="view" title="Lihat Rincian"></a>
            <?php echo nbs(3); ?>
            <a class="beli" title="Beli" href="<?php echo base_url(); ?>index.php/leasing/home/pilih_metode/<?php echo $data->kode_mobil; ?>"></a>
        </div>
        <?php
                endforeach;
            }
        ?>
        <div id="pagination">
            <ul class="tsc_pagination">
                <?php foreach ($links as $link) {
                    echo $link.'&nbsp;';
                } ?>
            </ul>
        </div>
    </div>
</div>