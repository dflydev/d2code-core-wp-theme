<?php

require_once('functions-widgets.php');

function d2code_core_setup() {
    
    if ( ! is_admin() ) {
        if ( defined('D2CODE_CHILD_IN_USE') ) {
            wp_enqueue_style('d2code_core-reset-fonts', get_bloginfo('template_directory').'/reset-fonts.css', null, null, 'all');
            wp_enqueue_style('d2code_core', get_bloginfo('template_directory').'/style.css', null, null, 'all');
            if ( function_exists('d2code_child_enqueue_style') ) {
                d2code_child_enqueue_style();
            }
        } else {
            wp_enqueue_style('d2code_core-reset-fonts', get_bloginfo('stylesheet_directory').'/reset-fonts.css', null, null, 'all');
            wp_enqueue_style('d2code_core', get_bloginfo('stylesheet_directory').'/style.css', null, null, 'all');
        }
    }
    
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'd2code_core' ),
    ) );
    
}

add_action( 'after_setup_theme', 'd2code_core_setup' );

function d2code_core_posted_on() {
    printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'd2code_core' ),
        'meta-prep meta-prep-author',
        sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
            get_permalink(),
            esc_attr( get_the_time() ),
            get_the_date()
        ),
        sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
            get_author_posts_url( get_the_author_meta( 'ID' ) ),
            sprintf( esc_attr__( 'View all posts by %s', 'd2code_core' ), get_the_author() ),
            get_the_author()
        )
    );
}

if ( ! function_exists( 'd2code_core_comment' ) ) :
function d2code_core_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
                case '' :
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                        <?php echo get_avatar( $comment, 40 ); ?>
                        <?php printf( __( '%s <span class="says">says:</span>', 'd2code_core' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Your comment is awaiting moderation.', 'd2code_core' ); ?></em>
                        <br />
                <?php endif; ?>

                <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <?php
                                /* translators: 1: date, 2: time */
                                printf( __( '%1$s at %2$s', 'd2code_core' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'd2code_core' ), ' ' );
                        ?>
                </div><!-- .comment-meta .commentmetadata -->

                <div class="comment-body"><?php comment_text(); ?></div>

                <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
        </div><!-- #comment-##  -->

        <?php
                        break;
                case 'pingback'  :
                case 'trackback' :
        ?>
        <li class="post pingback">
                <p><?php _e( 'Pingback:', 'd2code_core' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'd2code_core'), ' ' ); ?></p>
        <?php
                        break;
        endswitch;
}
endif;
?>