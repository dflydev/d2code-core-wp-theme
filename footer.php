
    </div><!-- .content-content -->
    </div><!-- #content -->
    <div id="sidebar">
    <div class="sidebar-content">
        <?php get_sidebar(); ?>
    </div><!-- .sidebar-content -->
    </div><!-- #sidebar -->
    </div><!-- #main -->
    
    <div id="extra">
    <div class="extra-content">
    Reserved for future use.
    </div><!-- .extra-content -->
    </div><!-- #extra -->

    <div id="footer" role="contentinfo">
        <div id="colophon">
            <div id="site-info">
                <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
                <br />
                    
                    Copyright 2010 - <a href="http://dflydev.com/">Dragonfly Development, Inc.</a> - All rights Reserved
            </div><!-- #site-info -->
        </div><!-- #colophon -->
    </div><!-- #footer -->
    
</div><!-- #wrapper -->

<?php wp_footer(); ?>
</body>
</html>