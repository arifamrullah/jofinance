        </div>
        <script type="text/javascript">
            $(function() {
                $(window).scroll(function() {
                    var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
                    if(scrollBottom != 0)
                        $('.footer > p').stop().animate({'opacity':'0'}, 20);
                    else
                        $('.footer > p').stop().animate({'opacity':'1'}, 1000);
                });
            });
        </script>
        <div class="footer">
            <p>
                &copy; 2015 <a href="<?php echo site_url(); ?>">JoFinance</a> | Designed by <a href="http://www.facebook.com/tol48">Arif Amrullah</a>
            </p>
        </div>
    </body>
</html>