<?php

function d2code_core_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'd2code_core' ),
        'id' => 'primary-widget-area',
        'description' => __( 'The primary widget area', 'd2code_core' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'd2code_core' ),
        'id' => 'secondary-widget-area',
        'description' => __( 'The secondary widget area', 'd2code_core' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}

add_action( 'widgets_init', 'd2code_core_widgets_init' );

?>