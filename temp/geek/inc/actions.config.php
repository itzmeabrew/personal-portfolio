<?php
/**
 * The template for requried actions hooks.
 *
 * @package geek
 * @since 1.0
 */

add_action( 'wp_enqueue_scripts', 'geek_enqueue_scripts' );
add_action( 'widgets_init', 'geek_widgets_init' );

/*
 * Register sidebar.
 */
 if ( ! function_exists( 'geek_widgets_init' ) ) {
     function geek_widgets_init() {
     	register_sidebar( array(
     		'name'          => esc_html__( 'Blog Sidebar', 'geek' ),
     		'id'            => 'blog-sidebar',
     		'description'   => esc_html__( 'Add widgets here.', 'geek' ),
     		'before_widget' => '<div id="%1$s" class="widget %2$s">',
     		'after_widget'  => '</div>',
     		'before_title'  => '<h3 class="widget_title">',
     		'after_title'   => '</h3>',
     	) );
     }
 }
function geek_custom_fonts( $custom_fonts ) {
    return array(
        'Web Fonts' => array(
            'rookies' => 'rookies'
        )
    );
}
add_filter( 'redux/option_name/field/typography/custom_fonts', 'geek_custom_fonts' );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'geek_enqueue_scripts' ) ) {
	function geek_enqueue_scripts() {

		// geek options
		$geek = wp_get_theme();
        global $geek_theme_options;

		// general settings
		if ( ( is_admin() ) ) {
			return;
		}

		wp_enqueue_style( 'gk-style', get_stylesheet_uri() );
		wp_enqueue_style( 'bootstrap', GK_URI . '/assets/css/bootstrap.min.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
		wp_enqueue_style( 'fontawesome', GK_URI . '/assets/css/font-awesome.min.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
		wp_enqueue_style( 'magnific-popup', GK_URI . '/assets/css/magnific-popup.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
        wp_enqueue_style( 'animate', GK_URI . '/assets/css/animate.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
        wp_enqueue_style( 'gk-underscore', GK_URI . '/assets/css/underscore.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
        wp_enqueue_style( 'gk-base', GK_URI . '/assets/css/main.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
		wp_enqueue_style( 'gk-responsive', GK_URI . '/assets/css/responsive.css', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
        // geek Default Google Fonts
		wp_enqueue_style( 'gk-gfonts-sacramento', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Sacramento', '', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
        //Custom fonts
        wp_enqueue_style( 'rookies-font', GK_URI . '/assets/css/rookies.css','', apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ) );
        // Custom CSS
        wp_enqueue_style( 'geek-dynamic-style', admin_url( 'admin-ajax.php' ) . '?action=geek_dynamic_css', '', true, 'all' );

        // add TinyMCE style
		add_editor_style();

		// including jQuery plugins
		wp_localize_script( 'jquery', 'get',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'siteurl' => get_template_directory_uri(),
			)
		);

        wp_enqueue_script( 'html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array( '' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), false );
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array( '' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), false );
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

        $jsFinder = '(function(html){html.className = html.className.replace(/\bno-js\b/,"js")})(document.documentElement);';
        wp_add_inline_script( 'jquery', $jsFinder );

        wp_enqueue_script( 'bootstrap', GK_URI . '/assets/js/bootstrap.min.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
        wp_enqueue_script( 'waypoints', 'http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
        wp_enqueue_script( 'counterup', GK_URI . '/assets/js/counterup.min.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
        wp_enqueue_script( 'inview', GK_URI . '/assets/js/inview.min.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
        wp_enqueue_script( 'easypiechart', GK_URI . '/assets/js/easypiechart.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
        wp_enqueue_script( 'magnific-popup', GK_URI . '/assets/js/magnific-popup.min.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
        wp_enqueue_script( 'jquery-nav', GK_URI . '/assets/js/jquery.nav.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
		wp_enqueue_script( 'gk-main', GK_URI . '/assets/js/main.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
		wp_enqueue_script( 'gk-navigation', GK_URI . '/assets/js/navigation.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );
		wp_enqueue_script( 'gk-skip-link-focus-fix', GK_URI . '/assets/js/skip-link-focus-fix.js', array( 'jquery' ), apply_filters( 'gk_version_filter', $geek->get( 'Version' ) ), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

        /* Add Custom JS */
		if ( !empty( $geek_theme_options['gk_js_editor_header'] ) ) {
			wp_add_inline_script( 'jquery-migrate', $geek_theme_options['gk_js_editor_header'] );
		}
        if ( !empty( $geek_theme_options['gk_js_editor_footer'] ) ) {
			wp_add_inline_script( 'gk-main', $geek_theme_options['gk_js_editor_footer'] );
		}
	}
}

// Custom row styles for onepage site type+-.
if ( ! function_exists('geek_dynamic_css' ) ) {
    function geek_dynamic_css() {
        require_once get_template_directory() . '/assets/css/dynamic.css.php';
        wp_die();
    }
}
add_action( 'wp_ajax_nopriv_geek_dynamic_css', 'geek_dynamic_css' );
add_action( 'wp_ajax_geek_dynamic_css', 'geek_dynamic_css' );

/**
 * Filter the page title.
 */
if ( ! function_exists( 'geek_wp_title' ) ) {
	function geek_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title = "$title $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'geek' ), max( $paged, $page ) );
		}

		return $title;
	}
}
add_filter( 'wp_title', 'geek_wp_title', 10, 2 );

/**
 * Comment Form functions
 */
if ( !function_exists( 'geek_move_comment_below' ) ) {
	function geek_move_comment_below( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'geek_move_comment_below' );
}

if ( !function_exists( 'geek_replace_reply_link_class' ) ) {
    add_filter('comment_reply_link', 'geek_replace_reply_link_class');
    function geek_replace_reply_link_class($class){
        $class = str_replace("class='comment-reply-link", "class='btn-reply pull-right", $class);
        return $class;
    }
}


if ( !function_exists( 'geek_core_activated' ) ) {
    function geek_core_activated() {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        $plugin='geek-core/geek-core.php';
        if( is_plugin_active( $plugin ) ){
            return true;
        } else {
            return false;
        }
    }
}

if ( !function_exists( 'geek_onepage_banner' ) ){
    function geek_onepage_banner(){
        $metaPrefix    = '_geek_';
        $banner = get_post_meta( get_the_ID(), $metaPrefix.'ed_banner', true );
        $section = get_post_meta( get_the_ID(), $metaPrefix.'section_id', true );
        $bgbanner = get_post_meta( get_the_ID(), $metaPrefix.'banner_bg', true );
        $content = get_post_meta( get_the_ID(), $metaPrefix.'banner_content', true );
        $social_meta = get_post_meta( get_the_ID(), $metaPrefix.'social_icons_list', true );

        $edBanner      = ( !empty( $banner ) ) ? $banner : '';
        $sectionID     = ( !empty( $section ) ) ? $section : '';
        $bannerBG      = ( !empty( $bgbanner ) ) ? $bgbanner : '';
        $bannerContent = ( !empty( $content ) ) ?  $content : '';        
        $socialList = ( !empty( $social_meta ) ) ? $social_meta : '';

        $output = '';

        if ( $edBanner != '' ) :
            $output .= '<div id="'. esc_attr( $sectionID ) .'" style="background-image: url('. esc_url( $bannerBG ) .');">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';
                        $output .= '<div class="col-sm-9">';
                            $output .= '<div class="banner-content">';
                                $output .= '<div class="home-social">';
                                    $output .= '<ul class="list-inline">';
                                    foreach( $socialList as $list ) :
                                        $output .= '<li><a href="'. esc_url( $list['_geek_icon_url'] ) .'"><i class="fa '. esc_html( $list['_geek_icon'] ) .'"></i></a></li>';
                                    endforeach;
                                    $output .= '</ul>';
                                $output .= '</div>';
                                $output .= '<div class="banner-info">';
                                    $output .= $bannerContent;
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';                              
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';

            printf ( '%s', $output );
        else :
            echo '';
        endif;
    }

    add_action( 'geek_banner', 'geek_onepage_banner' );
}
if ( !function_exists( 'geek_onepage_banner_side' ) ){
    function geek_onepage_banner_side(){
        $metaPrefix    = '_geek_';
        $banner = get_post_meta( get_the_ID(), $metaPrefix.'ed_banner', true );
        $section = get_post_meta( get_the_ID(), $metaPrefix.'section_id', true );
        $bgbanner = get_post_meta( get_the_ID(), $metaPrefix.'banner_bg', true );
        $content = get_post_meta( get_the_ID(), $metaPrefix.'banner_content', true );
        $social_meta = get_post_meta( get_the_ID(), $metaPrefix.'social_icons_list', true );

        $edBanner      = ( !empty( $banner ) ) ? $banner : '';
        $sectionID     = ( !empty( $section ) ) ? $section : '';
        $bannerBG      = ( !empty( $bgbanner ) ) ? $bgbanner : '';
        $bannerContent = ( !empty( $content ) ) ?  $content : '';        
        $socialList     = ( !empty( $social_meta ) ) ? $social_meta : '';
        $output = '';

        if ( $edBanner != '' ) :
            $output .= '<div id="'. esc_attr( $sectionID ) .'" style="background-image: url('. esc_url( $bannerBG ) .');">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';
                        $output .= '<div class="col-sm-9">';
                            $output .= '<div class="banner-content">';
                                $output .= '<div class="banner-info">';
                                    $output .= $bannerContent;
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';                              
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';

            printf ( '%s', $output );
        else :
            echo '';
        endif;
    }

    add_action( 'geek_side_banner', 'geek_onepage_banner_side' );
}
if ( !function_exists( 'geek_side_nav_social' ) ){
function geek_side_nav_social($items, $args) {
    
    if($args->theme_location == 'vertical-nav'){
        $metaPrefix    = '_geek_'; 
        $social_meta = get_post_meta( get_the_ID(), $metaPrefix.'social_icons_list', true );
        $socialList = ( !empty( $social_meta ) ) ? $social_meta : '';
        if( !empty( $socialList )  ):
            $social_items = '<li>';
                $social_items .='<ul class="social list-inline">';
                        foreach( $socialList as $list ) :
                            $social_items .='<li><a href="'. esc_url( $list['_geek_icon_url'] ) .'"><i class="fa '. esc_html( $list['_geek_icon'] ) .'"></i></a></li>';
                        endforeach;
                $social_items .= '</ul>';
            $social_items .='</li>';
            $items .= $social_items;
        else :
            $items = '';
        endif;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'geek_side_nav_social', 10, 2);
}
if( !function_exists( 'excerpt' ) ){
   // Custom Excerpt 
    function excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        } 
            $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        return $excerpt;
    }
}