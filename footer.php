<footer>

<div class="container-fluid">
    <div class="top row-fluid">
        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        <?php endif; ?>
    </div>

    <div id="copyright" class="row-fluid">
        <div class="span12 text-center">
            <?php 
                    $copyright = get_option('ge_copyright');
                    $geekust = 'Design By <a href="http://www.geeku.net">Shu</a>' ;
                    if(!empty($copyright)) { 
                        echo $copyright . " | " . $geekust; 
                    } else { 
                        echo  $geekust; 
                    } 
                    $analysis = get_option('ge_copyright');
                    echo " | " . $analysis;
            ?>
        </div>
    </div>

</div>

<div id="totop" title="回到顶部">▲</div>

</footer>

</div><!-- END WRAPPER -->

<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/geeku_framework/js/slimbox.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/theme.js"></script>
<?php if(is_single() || is_page()) { ?>
<script type="text/javascript">
    jQuery(document).ready(function($){ 
        var select = $('a[href$=".bmp"],a[href$=".gif"],a[href$=".jpg"],a[href$=".jpeg"], a[href$=".png"],a[href$=".BMP"],a[href$=".GIF"],a[href$=".JPG"],a[href$=".JPEG"],a[href$=".PNG"]');
        select.slimbox();
    });
</script>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>