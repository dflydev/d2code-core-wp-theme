<div id="primary" class="widget-area" role="complementary">
<ul><?php dynamic_sidebar( 'primary-widget-area' ); ?></ul>
</div><!-- #primary .widget-area -->

<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
<div id="secondary" class="widget-area" role="complementary">
<ul><?php dynamic_sidebar( 'secondary-widget-area' ); ?></ul>
</div><!-- #secondary .widget-area -->
<?php endif; ?>