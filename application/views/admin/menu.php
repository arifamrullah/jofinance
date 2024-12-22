<div class="left">
    <div id="menu">
        <ul>
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin/home">
                    <img src="<?php echo base_url(); ?>assets/img/ico/house.svg" />Home
                </a>
            </li>
            <li>
                <a>
                    <img src="<?php echo base_url(); ?>assets/img/ico/folder.svg" />Master
                </a><span class="dropRight"></span>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CMobil">Data Mobil</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CPembeli">Data Pembeli</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CPaketKredit">Data Paket Kredit</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CUser">Data User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                    <img src="<?php echo base_url(); ?>assets/img/ico/trans.svg" />Transaksi
                </a><span class="dropRight"></span>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CBeliCash">Data Beli Cash</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CKredit">Data Kredit</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/admin/CBayarCicilan">Data Bayar Cicilan</a>
                    </li>
                </ul>
            </li>
            <hr />
            <li>
                <a href="<?php echo base_url(); ?>index.php/CLogin/logout">
                    <img src="<?php echo base_url(); ?>assets/img/ico/unlocked.svg" />Logout
                </a>
            </li>
        </ul>
    </div>
</div>
<?php /*
<script type="text/javascript">
    $(function() {
        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop();
            if(scrollTop != 0)
                $('#menu').stop().animate({'opacity':'0.2'}, 400);
            else
                $('#menu').stop().animate({'opacity':'1'}, 400);
        });
        
        $('#menu').hover(function(e) {
            var scrollTop = $(window).scrollTop();
            if(scrollTop != 0) {
                $('#menu').stop().animate({'opacity':'1'}, 400);
            }
        },
                         function(e) {
            var scrollTop = $(window).scrollTop();
            if(scrollTop != 0) {
                $('#menu').stop().animate({'opacity':'0.2'}, 400);
            }
        }
                        );
    });
</script>
*/ ?>