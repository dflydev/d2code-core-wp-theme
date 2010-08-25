<div class="post">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( ! get_post_meta($post->ID, 'd2code.core.no-meta', true) ) { ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'd2code_core' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    
    <div class="entry-meta">
    <?php d2code_core_posted_on(); ?>
    </div><!-- .entry-meta -->
    <?php } ?>
    
    <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
        <div class="entry-summary">
        <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else: ?>
        <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'd2code_core' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'd2code_core' ), 'after' => '</div>' ) ); ?>
        </div>
    <?php endif; ?>
        
</div>
</div>