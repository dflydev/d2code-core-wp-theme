<div class="post">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( $post->post_parent ) { ?>
    <div class="post-parent">
        <ul>
        <?php
            $parentPosts = array();
            $parentPostId = $post->post_parent;
            while ( $parentPostId ) {
                $parentPosts[] = $thisParentPost = get_post($parentPostId);
                $parentPostId = $thisParentPost->post_parent;
            }
            $parentPostCount = 0;
            foreach ( array_reverse($parentPosts) as $parentPost ) {
        ?>
            <?php if ( $parentPostCount > 0 ) { ?><li>/</li><?php } ?>
            <li><a href="<?php echo get_permalink($parentPost->ID); ?>"><?php echo get_the_title($parentPost->ID); ?></a></li>
        <?php $parentPostCount++; } ?>
        </ul>
    </div>
    <?php } ?>

    <?php if ( ! get_post_meta($post->ID, 'd2code.core.no-meta', true) or ( is_search() || is_archive() )) { ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'd2code_core' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

    <?php if ( ! get_post_meta($post->ID, 'd2code.core.no-author', true) ) { ?>
    <div class="entry-meta">
    <?php d2code_core_posted_on(); ?>
    </div><!-- .entry-meta -->
    <?php } ?>
    <?php } ?>
    
    <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
        <div class="entry-summary">
        <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else: ?>
        <div class="entry-content <?php if ( get_post_meta($post->ID, 'd2code.core.no-meta', true) ) : ?>entry-content-no-meta<?php endif;?>">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'd2code_core' ) ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'd2code_core' ), 'after' => '</div>' ) ); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-utility">
        <?php if ( count( get_the_category() ) ) : ?>
            <span class="cat-links">
                <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'd2code_core' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
            </span>
            <span class="meta-sep">|</span>
        <?php endif; ?>
        <?php
        $tags_list = get_the_tag_list( '', ', ' );
        if ( $tags_list ):
        ?>
            <span class="tag-links">
                <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'd2code_core' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
            </span>
            <span class="meta-sep">|</span>
        <?php endif; ?>
        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'd2code_core' ), __( '1 Comment', 'd2code_core' ), __( '% Comments', 'd2code_core' ) ); ?></span>
        <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
    </div><!-- .entry-utility -->
        
</div>
</div>