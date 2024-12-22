<div class="left">
    <div id="menu">
        <ul>
            <li>
                <a href="<?php echo base_url(); ?>index.php/petugas/home">
                    <img src="<?php echo base_url(); ?>assets/img/ico/house.svg" />Home
                </a>
            </li>
            <li>
                <a>
                    <img src="<?php echo base_url(); ?>assets/img/ico/folder.svg" />Master
                </a><span class="dropRight"></span>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/petugas/CMobil">Kelola Mobil</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/petugas/CPembeli">Kelola Pembeli</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/petugas/CPaketKredit">Kelola Paket Kredit</a>
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