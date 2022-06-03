<?php

// if ( file_exists( GK_ROOT . '/init.php' ) ) {
// 	require_once  GK_ROOT . '/init.php';
// } elseif ( file_exists(  GK_ROOT . 'CMB2.php' ) ) {
// 	require_once GK_ROOT . '/CMB2.php';
// }

if ( !function_exists( 'geek_post_meta' ) ) {

	add_action( 'cmb2_admin_init', 'geek_post_meta' );
	function geek_post_meta() {

		$prefix = '_geek_';

		$gk_header = new_cmb2_box( array(
	        'id'           => $prefix . 'header_setup',
	        'title'        => 'Page Header Settings',
	        'object_types' => array( 'page' ), // post type
	        'context'      => 'normal', //  'normal', 'advanced', or 'side'
	        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	        'show_names'   => true, // Show field names on the left
	    ) );
	    
		$gk_header->add_field( array(
			'name'             => esc_html__( 'Menu Style', 'geek' ),
			'desc'             => esc_html__( 'Choose a menu style from dropdown.', 'geek' ),
			'id'               => $prefix . 'menu_style',
			'type'             => 'select',
			'show_option_none' => false,
			'options'          => array(
				'default' => esc_html__( 'Default', 'geek' ),
				'vertical'   => esc_html__( 'Vertical Menu', 'geek' ),
				'horizontal'     => esc_html__( 'Horizontal Menu', 'geek' ),
			),
		) );

		$gk_posts = new_cmb2_box( array(
	        'id'           => $prefix . 'pagefw_setup',
	        'title'        => 'One Page Settings',
	        'object_types' => array( 'page' ), // post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'page-onepage.php' ),
	        'context'      => 'normal', //  'normal', 'advanced', or 'side'
	        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
	        'show_names'   => true, // Show field names on the left
	    ) );	    

		$gk_posts->add_field( array(
			'name' => esc_html__( 'Enable/Disable Banner', 'geek' ),
			'desc' => esc_html__( 'check to enable/disable banner in frontpage', 'geek' ),
			'id'   => $prefix . 'ed_banner',
			'type' => 'checkbox',
		) );

		$gk_posts->add_field( array(

			'name'       => esc_html__( 'Section ID', 'geek' ),
			'desc'       => esc_html__( 'this section will show at the very first portion of the page', 'geek' ),
			'id'         => $prefix . 'section_id',
			'type'       => 'text',
			'default'    => 'home-banner',
		) );

		$gk_posts->add_field( array(

			'name' => esc_html__( 'Banner Background', 'geek' ),
			'desc' => esc_html__( 'Upload banner background image', 'geek' ),
			'id'   => $prefix . 'banner_bg',
			'type' => 'file',
		) );

		$gk_posts->add_field( array(

			'name'       => esc_html__( 'Banner Content', 'geek' ),
			'id'         => $prefix . 'banner_content',
			'type'       => 'wysiwyg',
		) );

		$group_field_id = $gk_posts->add_field( array(
			'id'          => $prefix . 'social_icons_list',
			'type'        => 'group',
			'description' => esc_html__( 'Choose Social Icons To Be Displayed On Header Secion', 'geek' ),
			'options'     => array(
				'group_title'   => esc_html__( 'Social Icon {#}', 'geek' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Icon', 'geek' ),
				'remove_button' => esc_html__( 'Remove Icon', 'geek' ),
				'sortable'      => true, // beta
				'closed'     => true, // true to have the groups closed by default
			),
		) );

		$gk_posts->add_group_field( $group_field_id, array(
		  'name'        => esc_html__( 'Select Icon', 'geek' ),
		  'id'          => $prefix . 'icon',
		  'type'        => 'fontawesome_icon', // This field type		  
		) );

		$gk_posts->add_group_field( $group_field_id, array(
			'name'       => esc_html__( 'Icon URL', 'geek' ),
			'id'         => $prefix . 'icon_url',
			'type'       => 'text_url',
		) );
	}
}
