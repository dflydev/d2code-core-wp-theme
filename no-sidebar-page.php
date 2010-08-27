<?php
/**
 * Template Name: No Sidebar Page
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php get_header(); ?>
<?php get_template_part( 'loop', 'index' ); ?>
<?php comments_template( '', true ); ?>
<?php get_footer(); ?>