<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "geek_theme_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'geek_options/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Geek Options', 'geek' ),
        'page_title'           => __( 'Geek Options', 'geek' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off'  => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'geek-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'geek' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'geek' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'geek' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'geek' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'geek' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'geek' ),
        'id'               => 'gk_header',
        'desc'             => __( 'Settings for header!', 'geek' ),
        'subsection'       => false,
        'icon'             => 'el el-arrow-up',
        'fields'           => array(
            array(
                'id'       => 'gk_logo_header',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Logo', 'geek' ),
                'compiler' => 'true',
                'desc'     => __( 'Preferred image size: 105x31', 'geek' ),
                'default'  => array( 'url' => GK_URI . '/assets/images/logo.png' ),
            ),
            array(
                'id'       => 'gk_favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Favicon', 'geek' ),
                'compiler' => 'true',
                'desc'     => __( 'Upload image size: 16x16', 'geek' ),
                'default'  => array( 'url' => GK_URI . '/assets/images/ico/favicon.ico' ),
            ),
            array(
                'id'       => 'gk_apple_fav_57',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Apple Touch Icon 57x57', 'geek' ),
                'compiler' => 'true',
                'desc'     => __( 'Upload image size: 57x57', 'geek' ),
                'default'  => array( 'url' => GK_URI . '/assets/images/ico/apple-touch-icon-57-precomposed.png' ),
            ),
            array(
                'id'       => 'gk_apple_fav_72',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Apple Touch Icon 72x72', 'geek' ),
                'compiler' => 'true',
                'desc'     => __( 'Upload image size: 72x72', 'geek' ),
                'default'  => array( 'url' => GK_URI . '/assets/images/ico/apple-touch-icon-72-precomposed.png' ),
            ),
            array(
                'id'       => 'gk_apple_fav_114',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Apple Touch Icon 114x114', 'geek' ),
                'compiler' => 'true',
                'desc'     => __( 'Upload image size: 114x114', 'geek' ),
                'default'  => array( 'url' => GK_URI . '/assets/images/ico/apple-touch-icon-114-precomposed.png' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Menu Settings', 'geek' ),
        'id'               => 'gk_menu',
        'desc'             => __( 'Settings for header!', 'geek' ),
        'subsection'       => false,
        'icon'             => 'el el-adjust-alt',
        'fields'           => array(
            array(
                'id'       => 'gk_menu_style',
                'type'     => 'select',
                'title'    => __( 'Menu Style', 'geek' ),
                'compiler' => 'true',
                'desc'     => __( 'Preferred a menu style.', 'geek' ),
                'options'  => array(
                    'none'      => 'Select A Menu Style',
                    'vertical'  => 'Vertical Menu',
                    'horizontal'     => 'Horizontal Menu',
                ),
                'default'  => 'horizontal',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Styling', 'geek' ),
        'id'               => 'gk_styling',
        'desc'             => __( 'Choose different styles to change the look of the theme!', 'geek' ),
        'subsection'       => false,
        'icon'             => 'el el-brush',
        'fields'           => array(
            
            array(
                'id'          => 'gk_body_typo',
                'type'        => 'typography',
                'title'       => __( 'Body Typography', 'geek' ),
                'google'      => true,
                'subsets'     => false,
                'line-height' => false,
                'text-align'  => false,
                'font-weight' => true,
                'font-size'   => false,
                'units'       =>'px',
                'default'     => array(
                    'color'       => '#2d3038',
                    'font-family' => 'Montserrat',
                    'font-weight' => '400',
                    'google'      => true,
                ),
            ),
            array(
                'id'            => 'gk_head_typo',
                'type'          => 'typography',
                'title'         => __( 'Global Heading Typography', 'geek' ),
                'google'        => true,
                'text-transform'=> false,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-size'     => false,
                'units'         =>'px',
                'default'       => array(
                    'color'       => '#2d3038',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
                    'google'      => true,
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Custom Code', 'geek' ),
        'id'               => 'gk_custom_code',
        'desc'             => __( 'Advanced coding section for altering themes settings/styles!', 'geek' ),
        'subsection'       => false,
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'gk_css_editor',
                'type'     => 'ace_editor',
                'title'    => __( 'CSS Code', 'geek' ),
                'subtitle' => __( 'Paste your CSS code here.', 'geek' ),
                'mode'     => 'css',
                'theme'    => 'monokai'
            ),
            array(
                'id'       => 'gk_js_editor_header',
                'type'     => 'ace_editor',
                'title'    => __( 'Header Javascript Code', 'geek' ),
                'subtitle' => __( 'Paste your js code here without script tag. This code will be placed just before head tag closed', 'geek' ),
                'mode'     => 'js',
                'theme'    => 'monokai',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
            array(
                'id'       => 'gk_js_editor_footer',
                'type'     => 'ace_editor',
                'title'    => __( 'Footer Javascript Code', 'geek' ),
                'subtitle' => __( 'Paste your js code here without script tag. This code will be placed just before body tag closed', 'geek' ),
                'mode'     => 'js',
                'theme'    => 'monokai',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'geek' ),
        'id'               => 'footer_setting',
        'desc'             => __( 'Settings for footer!', 'geek' ),
        'subsection'       => false,
        'icon'             => 'el el-arrow-down',
        'fields'           => array(
            array(
                'id'       => 'gk_copyright',
                'title'    => __( 'Enter copyright by default or html', 'geek' ),
                'type'     => 'editor',
                'args'     => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                ),
                'default'  => 'Copyright © 2017 <a href="#">Geek</a>.'
            ),
        )
    ) );


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }