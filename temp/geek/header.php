<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Geek
 */
global $geek_theme_options;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
		<?php if ( !empty( $geek_theme_options['gk_favicon']['url'] ) ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( $geek_theme_options['gk_favicon']['url'] ); ?>">
		<?php endif; ?>
		<?php if ( !empty( $geek_theme_options['gk_apple_fav_114']['url'] ) ) : ?>
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( $geek_theme_options['gk_apple_fav_114']['url'] ); ?>">
		<?php endif; ?>
		<?php if ( !empty( $geek_theme_options['gk_apple_fav_72']['url'] ) ) : ?>
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( $geek_theme_options['gk_apple_fav_72']['url'] ); ?>">
		<?php endif; ?>
		<?php if ( !empty( $geek_theme_options['gk_apple_fav_57']['url'] ) ) : ?>
		<link rel="apple-touch-icon" href="<?php echo esc_url( $geek_theme_options['gk_apple_fav_57']['url'] ); ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	$home_class = '';
	$menu_select = get_post_meta( get_the_ID(), '_geek_menu_style', true );
	if( isset( $geek_theme_options['gk_menu_style'] ) && $geek_theme_options['gk_menu_style'] != 'none' && $menu_select =='default' ) :
		if( $geek_theme_options['gk_menu_style'] == 'vertical' ) :			
			$home_class = "home-one";
		elseif( $geek_theme_options['gk_menu_style'] == 'horizontal' ):
			$home_class = "home-two";
		else :
			$home_class = "home-onw";
		endif;
	elseif( isset( $geek_theme_options['gk_menu_style'] )  && $menu_select == '' ) :
		if( $geek_theme_options['gk_menu_style'] == 'vertical' ) :			
			$home_class = "home-one";
		elseif( $geek_theme_options['gk_menu_style'] == 'horizontal' ):
			$home_class = "home-two";
		else :
			$home_class = "home-one";
		endif;
	elseif ( $menu_select =='vertical' ) :
		$home_class = "home-one";
	elseif ( $menu_select =='horizontal') :
		$home_class = "home-two";
	else :
		$home_class = "home-one";
	endif;	
?>

	<div class="main-wrapper <?php echo esc_attr( $home_class ); ?>">		
        <?php 
        	if( is_home() || is_single() ) {
        		get_template_part( 'template-parts/header/horizontal', 'header' );
        	}
        	else {
	    		if( isset( $geek_theme_options['gk_menu_style'] ) && $geek_theme_options['gk_menu_style'] != 'none' && $menu_select =='default' ) {
					if( $geek_theme_options['gk_menu_style'] == 'vertical' ) {
						if( is_page() ){
							global $wp_query;
						   	$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
						   	$ed_banner = get_post_meta( $wp_query->post->ID, '_geek_ed_banner', true );
						   	if( $template_name == 'page-onepage.php' ) {
								if( isset( $ed_banner ) && $ed_banner == 'on' )
									do_action( 'geek_banner' );
							}
						}
						get_template_part( 'template-parts/header/vertical', 'header' );
					}
					elseif( $geek_theme_options['gk_menu_style'] == 'horizontal' ){
						if( is_page() ){
							global $wp_query;
						   	$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
						   	$ed_banner = get_post_meta( $wp_query->post->ID, '_geek_ed_banner', true );
						   	if( $template_name == 'page-onepage.php' ) {
								if( isset( $ed_banner ) && $ed_banner == 'on' )
									do_action( 'geek_side_banner' );
							}
						}
						get_template_part( 'template-parts/header/horizontal', 'header' );
					}
					else
						get_template_part( 'template-parts/header/vertical', 'header' );
				}
				elseif( isset( $geek_theme_options['gk_menu_style'] )  && $menu_select == '' ) {
					if( $geek_theme_options['gk_menu_style'] == 'vertical' ) {
						if( is_page() ){
							global $wp_query;
						   	$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
						   	$ed_banner = get_post_meta( $wp_query->post->ID, '_geek_ed_banner', true );
						   	if( $template_name == 'page-onepage.php' ) {
								if( isset( $ed_banner ) && $ed_banner == 'on' )
									do_action( 'geek_banner' );
							}
						}
						get_template_part( 'template-parts/header/vertical', 'header' );
					}
					elseif( $geek_theme_options['gk_menu_style'] == 'horizontal' ){
						if( is_page() ){
							global $wp_query;
						   	$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
						   	$ed_banner = get_post_meta( $wp_query->post->ID, '_geek_ed_banner', true );
						   	if( $template_name == 'page-onepage.php' ) {
								if( isset( $ed_banner ) && $ed_banner == 'on' )
									do_action( 'geek_side_banner' );
							}
						}
						get_template_part( 'template-parts/header/horizontal', 'header' );
					}
					else
						get_template_part( 'template-parts/header/vertical', 'header' );
				}
				elseif ( $menu_select =='vertical' ){
					if( is_page() ){
						global $wp_query;
					   	$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
					   	$ed_banner = get_post_meta( $wp_query->post->ID, '_geek_ed_banner', true );
					   	if( $template_name == 'page-onepage.php' ) {
							if( isset( $ed_banner ) && $ed_banner == 'on' )
								do_action( 'geek_banner' );
						}
					}
					get_template_part( 'template-parts/header/vertical', 'header' );
				}
				elseif ( $menu_select =='horizontal'){
					if( is_page() ){
						global $wp_query;
					   	$template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
					   	$ed_banner = get_post_meta( $wp_query->post->ID, '_geek_ed_banner', true );
					   	if( $template_name == 'page-onepage.php' ) {
							if( isset( $ed_banner ) && $ed_banner == 'on' )
								do_action( 'geek_side_banner' );
						}
					}
					get_template_part( 'template-parts/header/horizontal', 'header' );
				}
				else
					get_template_part( 'template-parts/header/vertical', 'header' );
			}
        ?>
	<div id="page" class="site">
		<div id="content" class="site-content">
