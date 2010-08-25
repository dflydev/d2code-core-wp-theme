<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php

    global $page, $paged;
    wp_title( '|', true, 'right' );
    bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'd2code_core' ), max( $paged, $page ) );

?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div id="wrapper" class="hfeed">

    <div id="header">
        <div id="masthead">
            <div id="branding" role="banner">
                <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
                <<?php echo $heading_tag; ?> id="site-title">
                    <span>
                    <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    </span>
                </<?php echo $heading_tag; ?>>
                <div id="site-description"><?php bloginfo( 'description' ); ?></div>
            </div><!-- #branding -->
            <div id="access" role="navigation">
                <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'd2code_core' ); ?>"><?php _e( 'Skip to content', 'd2code_core' ); ?></a></div>
                <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
            </div>
        </div><!-- #masthead -->
    </div><!-- #header -->

    <div id="main">
    <div id="content" role="main">
    <div class="content-content">
    