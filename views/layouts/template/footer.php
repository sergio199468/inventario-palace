  <!-- Add your site or application content here -->
        <p>Hello world! This is HTML5 Boilerplate.</p>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Pie de pagina</p>
                </div>
                
            </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-1.11.3.min.js"><\/script>')</script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>vendor/bootstrap.min.js"></script> 
        <script src="<?php echo $_layoutParams['ruta_js']; ?>plugins.js"></script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        </div>
    </body>
</html>
