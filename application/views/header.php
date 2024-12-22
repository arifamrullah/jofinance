<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang = "en" lang = "en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aplikasi Kredit Mobil</title>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/ArifTable.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.js"></script>
        <script type="text/javascript">
            $(function() {
                $(window).scroll(function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop != 0)
                        $('#header_wrapper').stop().animate({'opacity':'0.9'}, 400);
                    else
                        $('#header_wrapper').stop().animate({'opacity':'1'}, 400);
                });
        
                $('#header_wrapper').hover(function(e) {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop != 0) {
                        $('#header_wrapper').stop().animate({'opacity':'1'}, 400);
                    }
                },
                function(e) {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop != 0) {
                        $('#header_wrapper').stop().animate({'opacity':'0.9'}, 400);
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <header id="header_wrapper">
                <div id="header">
                    <h1><em>Jo</em>Finance</h1>
                    <ul>
                        <li>
                            <img src="<?php echo base_url(); ?>assets/img/ico/person.svg" />
                            <p><?php echo $this->session->userdata('nama_lengkap'); ?></p>
                        </li>
                    </ul>
                </div>
            </header>