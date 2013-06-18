            <div id="push"></div>
        </div> <!-- /wrap -->
        <footer>
            <p>&copy; Bach PHP <?php echo date('Y') ?> - Disponible en <?php echo anchor('https://github.com/ozielmus/bach', 'Github') ?></p>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo site_url('js/jquery-1.9.1.min.js') ?>"><\/script>')</script>
        <script src="<?php echo site_url('js/jquery.easing.1.3.js') ?>"></script>
        <script type="text/javascript">      
            $(window).load(function() { 
                $('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){$(this).css('display','none')});  
            });                         
        </script>
        <script src="<?php echo site_url('js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo site_url('js/main.js') ?>"></script>
    </body>
</html>