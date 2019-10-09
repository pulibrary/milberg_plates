        </div><!-- end content -->

    </div><!-- end wrap -->
    

    <footer>

        <div id="footer-text">
            <?php echo get_theme_option('Footer Text'); ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
            <p><a href="http://www.princeton.edu/"><img src="/milberg/themes/milberg/images/pu_logo_trans.png" alt="Princeton University"/></a></p>
            <p><a href="http://library.princeton.edu/"><img src="/milberg/themes/milberg/images/pul-logo-300.png" /></a></p>
        </div>

        <?php fire_plugin_hook('public_footer'); ?>

    </footer><!-- end footer -->

    <script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.showAdvancedForm();        
        Omeka.moveNavOnResize();        
        Omeka.mobileMenu();        
    });
    </script>

</body>
</html>
