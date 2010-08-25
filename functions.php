<?php

require_once('functions-widgets.php');

function d2code_core_setup() {

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

?>