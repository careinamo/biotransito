<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (! class_exists('Redux')) {
    return;
}

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('opt_name', 'opt_theme_options');

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => $theme->get('Name'),
    'page_title' => $theme->get('Name'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-smiley',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    // 'open_expanded' => true, // Allow you to start the panel in an expanded way initially.
    'disable_save_warn' => true, // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => 'dashicons-dashboard',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'dashicons-smiley',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit' => '', // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => ''
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right'
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover'
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave'
            )
        )
    )
);

Redux::setArgs($opt_name, $args);

/**
 * General Options.
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('General', 'cargo-pifour'),
    'icon' => 'el-icon-adjust-alt',
    'fields' => array(
       array(
            'title'     => esc_html__('Boxed Layout', 'cargo-pifour'),
            'subtitle'  => esc_html__('make your site is boxed?', 'cargo-pifour'),
            'id'        => 'general_layout',
            'type'      => 'switch',
            'default'   => false
        ),
        array(
            'title'     => esc_html__('Boxed width', 'cargo-pifour'),
            'subtitle'  => esc_html__('This option just applied for screen larger than value you enter here!', 'cargo-pifour'),
            'id'        => 'body_width',
            'type'      => 'dimensions',
            'units'     => array('px'),
            'height'    => false,
            'default'   => array(
                'width' => '1238px',
                'units' => 'px'
            ),
            'required'  => array( 'general_layout', '=', 1),
        ),
         
        array(
            'title'             => esc_html__('Body Background', 'cargo-pifour'),
            'id'                => 'general_background',
            'type'              => 'background',
            'preview'           => false,
            'output'            => array( '.boxed-layout' ),
            'required'  => array( 'general_layout', '=', 1),
        ),
         array(
            'title'             => esc_html__('Content Background', 'cargo-pifour'),
            'id'                => 'content_background',
            'type'              => 'background',
            'preview'           => false,
            'output'            => array( '.boxed-layout .site-content' ),
            'required'  => array( 'general_layout', '=', 1),
        ),
        array(
            'subtitle'          => esc_html__('Enable back to top button.', 'cargo-pifour'),
            'id'                => 'general_back_to_top',
            'type'              => 'switch',
            'title'             => esc_html__('Back To Top', 'cargo-pifour'),
            'default'           => true,
        )
    )
));

/**
 * Header Options
 * 
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Header', 'cargo-pifour'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id'                => 'header_layout',
            'title'             => esc_html__('Layouts', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for header', 'cargo-pifour'),
            'default'           => 'default',
            'type'              => 'image_select',
            'options'           => array(
                                        'default' => get_template_directory_uri().'/assets/images/header/header1.png',
                                        'layout2' => get_template_directory_uri().'/assets/images/header/header2.png',
                                        'layout3' => get_template_directory_uri().'/assets/images/header/header3.png'
                                    )
        ),

        array(
            'title'             => esc_html__('Select Logo', 'cargo-pifour'),
            'subtitle'          => esc_html__('Select an image file for your logo.', 'cargo-pifour'),
            'id'                => 'main_logo', 
            'type'              => 'media',
            'url'               => true,
            'default'           => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'subtitle'          => esc_html__('Set max height for logo.', 'cargo-pifour'),
            'id'                => 'logo_max_height',
            'type'              => 'dimensions',
            'units'             => array('px'),
            'width'             => false,
            'title'             => esc_html__('Logo Max Height', 'cargo-pifour'),
        ),
         
        array(
            'id'                => 'header_middle_color',
            'type'              => 'color_rgba',
            'title'             => esc_html__( 'Middle Header Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Header background color', 'cargo-pifour' ),
            'output'   => array(
                'background-color' => '#header_middle'
            ),
            'required' => array( 'header_layout', '=', array('default','layout3') )  
        ),
         array(
            'id'                => 'header_border_color',
            'type'              => 'color_rgba',
            'title'             => esc_html__( 'Header Border Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Header border color', 'cargo-pifour' ),
            'output'   => array(
                'background-color' => '#cshero-header a:before,#header_middle .widget:before'
            ),
            'required' => array( 'header_layout', '=', array('default','layout3') )  
        ),
        array(
            'id'                => 'header_background_color',
            'type'              => 'color_rgba',
            'title'             => esc_html__( ' Menu Background Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Header background color', 'cargo-pifour' ),
            'output'   => array(
                'background-color' => '#cshero-header'
            ),
            
        ),
        array(
            'title'             => esc_html__('Background Image', 'cargo-pifour'),
            'subtitle'          => esc_html__('Header background image.', 'cargo-pifour'),
            'id'                => 'header_background_image',
            'type'              => 'background',
            'preview'           => false,
            'background-color'  => false,
            'output'            => array( '#cshero-header' )
        ),
        array(
            'id'                => 'header_text_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Text Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Select text color in header', 'cargo-pifour' ),
            'output'            => array( '#cshero-header, #header_middle p' ),
        ),
        array(
            'id'                => 'header_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Select links color in header', 'cargo-pifour' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( '#cshero-header a, #header_middle a' ),
        ),
        array(
            'subtitle'          => esc_html__('enable sticky mode for menu.', 'cargo-pifour'),
            'id'                => 'menu_sticky',
            'type'              => 'switch',
            'title'             => esc_html__('Sticky Header', 'cargo-pifour'),
            'default'           => false,
        ),
    )
));
/* Header top */
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-minus',
    'title' => esc_html__('Header top', 'cargo-pifour'),
    'subsection' => true,
    'fields' => array(
        array(
            'title'     => esc_html__('Enable', 'cargo-pifour'),
            'id'        => 'enable_header_top',
            'type'      => 'switch',
            'default'   => true
        ),
        array(
            'id'                => 'header_top_layout',
            'title'             => esc_html__('Layouts', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for header', 'cargo-pifour'),
            'default'           => 'layout1',
            'type'              => 'image_select',
            'options'           => array(
                                        'layout1' => get_template_directory_uri().'/assets/images/header/ht-style1.png',
                                        'layout2' => get_template_directory_uri().'/assets/images/header/ht-style2.png',
                                        'layout3' => get_template_directory_uri().'/assets/images/header/ht-style3.png',
                                    ),
            'required'  => array( 'enable_header_top', '=', 1),          
        ),
        array(
            'subtitle'          => esc_html__('Full width', 'cargo-pifour'),
            'id'                => 'header_top_full_width',
            'type'              => 'switch',
            'title'             => esc_html__('Full Width', 'cargo-pifour'),
            'default'           => false,
            'required'  => array( 'enable_header_top', '=', 1),
        ), 
        array(
            'id'                => 'header_top_background',
            'type'              => 'color_rgba',
            'title'             => esc_html__( 'Background Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Header top background color', 'cargo-pifour' ),
            'output'   => array(
                'background-color' => '#header_top'
            ),
            'required'  => array( 'enable_header_top', '=', 1),
        ),
        array(
            'id'                => 'header_top_text_color',
            'type'              => 'color',
            'title'             => esc_html__( 'Text color', 'cargo-pifour' ),
            'output'            => '#header_top p,.header-top .widget,.header-top p,.header-top .widget_text ul li,.header-top.layout2 .contact-info-top,#header_top p i',
            'required'  => array( 'enable_header_top', '=', 1),
        ),
        array(
            'id'                => 'header_top_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Select links color in header top', 'cargo-pifour' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( '#header_top a,.header-top a, .header-top ul li a,.header-top .cms-socials a,.header-top.layout2 .cms-socials a,.header-top .widget_nav_menu ul li a'),
            'required'  => array( 'enable_header_top', '=', 1),
        ),
        array(
            'id' => 'header_top_border_color',
            'type' => 'color',
            'title' => esc_html__('Border color', 'cargo-pifour'),
            'output'    => array(
                'border-bottom-color' => '#header_top.layout1,#header_top.layout2', 
                'border-left-color' => '#header_top.layout3 .header-top-wrap .cms-socials > li:first-child',
                'border-right-color' => '#header_top.layout3 .header-top-wrap .cms-socials > li',
            ),
            'required'  => array('enable_header_top', '=', 1), 
        ),    
    )
)); 
/* Sub menu*/
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-minus',
    'title' => esc_html__('Sub menu', 'cargo-pifour'),
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'sub_menu_background',
            'type'              => 'color_rgba',
            'title'             => esc_html__( 'Background Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Sub menu background color', 'cargo-pifour' ),
            'output'   => array(
                'background-color' => '#cshero-header-navigation .sub-menu'
            ),
        ),
        array(
            'id'                => 'sub_menu_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Links Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Select links color in sub menu', 'cargo-pifour' ),
            'regular'           => true,
            'hover'             => true,
            'active'            => false,
            'visited'           => false,
            'output'            => array( '#cshero-header-navigation .sub-menu li a'),
        ),
        array(
            'id' => 'sub_menu_border_color',
            'type' => 'color',
            'title' => esc_html__('Border color', 'cargo-pifour'),
            'output'    => array(
                'border-bottom-color' => '#cshero-header-navigation .sub-menu li a',
            ),
        ),  
 
    )
)); 

/**
 * Page Title
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page Title & BC', 'cargo-pifour'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'                => 'page_title_layout', 
            'title'             => esc_html__('Layouts', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for page title', 'cargo-pifour'),
            'default'           => '2',
            'type'              => 'image_select',
            'options'           => array(
                                    '2' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-1.png',
                                    '3' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-2.png',
                                    '4' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-3.png',
                                    '5' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-4.png',
                                    '6' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-5.png',
                                    '7' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-6.png',
                                )
        ),
        array(
            'id'                => 'page_title_background_color',
            'type'              => 'color_rgba',
            'title'             => esc_html__( 'Background color', 'cargo_pifour' ),
            'output'   => array(
                'background' => '#page-title .bg-overlay',
            ),
        ),       
        array(
            'title'             => esc_html__('Background image', 'cargo_pifour'),
            'subtitle'          => esc_html__('Page title background image.', 'cargo_pifour'),
            'id'                => 'page_title_background_image',
            'type'              => 'background',
            'preview'           => true,
            'background-color'  => false,
            'output'            => array( '#page-title' )

        ),
        array(
            'title'             => esc_html__('Typography', 'cargo-pifour'),
            'subtitle'          => esc_html__('Page title typography.', 'cargo-pifour'),
            'id'                => 'page_title_typography',
            'type'              => 'typography',
            'google'            => true,
            'output'            => array( '#page-title #page-title-text h2' )
        ),
        array(
            'title'             => esc_html__('Padding', 'cargo-pifour'),
            'subtitle'          => esc_html__('Page title padding (top/bottom).', 'cargo-pifour'),
            'id'                => 'page_title_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array( 'em', 'px', '%' ),
            'top'               => true,
            'right'             => false,
            'bottom'            => true,
            'left'              => false,
            'output'            => array( '#page-title' )
        ),
    )
));
/* Breadcrumb */
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-random',
    'title' => esc_html__('Breadcrumb', 'cargo-pifour'),
    'subsection' => true,
    'fields' => array(
        array(
            'title'             => esc_html__('Typography', 'cargo-pifour'),
            'subtitle'          => esc_html__('Breadcrumb typography.', 'cargo-pifour'),
            'id'                => 'breadcrumb_typography',
            'type'              => 'typography',
            'google'            => true,
            'output'            => array( '#page-title #breadcrumb-text' )
        ),
        array(
            'id'                => 'breadcrumb_link_color',
            'type'              => 'link_color',
            'title'             => esc_html__( 'Link Color', 'cargo-pifour' ),
            'subtitle'          => esc_html__( 'Select link color in breadcrumb', 'cargo-pifour' ),
            'output'            => array( '#page-title #breadcrumb-text span' ),
        ),
    )
));

/**
 * Content
 *
 * css color.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'cargo-pifour'),
    'icon' => 'el-icon-pencil',
    'fields' => array(
        array(
            'title'     => esc_html__('Padding', 'cargo-pifour'),
            'subtitle'  => esc_html__('Choose padding for content tag', 'cargo-pifour'),
            'id'        => 'content_padding',
            'type'      => 'spacing',
            'mode'      => 'padding',
            'right' => false,
            'left' => false,
            'units'     => array('px'),     
            'output'    => array('.site-content')
        ),
    )
));



/* archive */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Archive', 'cargo-pifour'),
    'icon' => 'el-icon-list',
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'archive_layout',
            'title'             => esc_html__('Layouts', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for archive, search, index...', 'cargo-pifour'),
            'default'           => 'right',
            'type'              => 'image_select',
            'options'           => array(
                                        'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                        'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                        'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                    )
        ),
        array(
            'title' => esc_html__('Text Limit Excerpt', 'cargo-pifour'),
            'id' => 'excerpt_length',
            'type' => 'text',
            'default'=>'22',
        ),
        array(
            'subtitle'          => esc_html__('Show author.', 'cargo-pifour'),
            'id'                => 'archive_author',
            'type'              => 'switch',
            'title'             => esc_html__('Author', 'cargo-pifour'),
            'default'           => false,
        ),
        array(
            'subtitle'          => esc_html__('Show date time.', 'cargo-pifour'),
            'id'                => 'archive_date',
            'type'              => 'switch',
            'title'             => esc_html__('Date', 'cargo-pifour'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show categories.', 'cargo-pifour'),
            'id'                => 'archive_categories',
            'type'              => 'switch',
            'title'             => esc_html__('Categories', 'cargo-pifour'),
            'default'           => true,
        ),       
        array(
            'subtitle'          => esc_html__('Show comment count.', 'cargo-pifour'),
            'id'                => 'archive_comment',
            'type'              => 'switch',
            'title'             => esc_html__('Comment', 'cargo-pifour'),
            'default'           => true,
        ),
         array(
            'subtitle'          => esc_html__('Show tags.', 'cargo-pifour'),
            'id'                => 'archive_tag',
            'type'              => 'switch',
            'title'             => esc_html__('Tags', 'cargo-pifour'),
            'default'           => false,
        ),
        
    )
));
/*page*/
Redux::setSection($opt_name, array(
    'title' => esc_html__('Page', 'cargo-pifour'),
    'icon' => 'el-icon-list',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle'          => esc_html__('Show editor', 'cargo-pifour'),
            'id'                => 'page_show_frontend_editor',
            'type'              => 'switch',
            'title'             => esc_html__('Frontend editor', 'cargo-pifour'),
            'default'           => false,
        ),
      
    )
));
/* Single */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Single', 'cargo-pifour'),
    'icon' => 'el-icon-file-edit',
    'subsection' => true,
    'fields' => array(
        array(
            'id'                => 'single_layout',
            'title'             => esc_html__('Layouts', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for single...', 'cargo-pifour'),
            'default'           => 'right',
            'type'              => 'image_select',
            'options'           => array(
                                        'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                        'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                        'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                    )
        ),
       
        array(
            'subtitle'          => esc_html__('Show date time.', 'cargo-pifour'),
            'id'                => 'single_date',
            'type'              => 'switch',
            'title'             => esc_html__('Date', 'cargo-pifour'),
            'default'           => true,
        ),
        array(
            'subtitle'          => esc_html__('Show categories.', 'cargo-pifour'),
            'id'                => 'single_categories',
            'type'              => 'switch',
            'title'             => esc_html__('Categories', 'cargo-pifour'),
            'default'           => true,
        ),
        
        array(
            'subtitle'          => esc_html__('Show comment count.', 'cargo-pifour'),
            'id'                => 'single_comment',
            'type'              => 'switch',
            'title'             => esc_html__('Comment', 'cargo-pifour'),
            'default'           => false,
        ),        
        array(
            'subtitle'          => esc_html__('Show tags.', 'cargo-pifour'),
            'id'                => 'single_tag',
            'type'              => 'switch',
            'title'             => esc_html__('Tags', 'cargo-pifour'),
            'default'           => false,
        ),
         array(
            'subtitle'          => esc_html__('Show share socials.', 'cargo-pifour'),
            'id'                => 'single_social_share',
            'type'              => 'switch',
            'title'             => esc_html__('Share Socials', 'cargo-pifour'),
            'default'           => true,
        ),
         array(
            'subtitle'          => esc_html__('Show author.', 'cargo-pifour'),
            'id'                => 'single_author',
            'type'              => 'switch',
            'title'             => esc_html__('Author', 'cargo-pifour'),
            'default'           => false,
        ),
        array(
            'subtitle'          => esc_html__('Show post previous/next.', 'cargo-pifour'),
            'id'                => 'single_post_nav',
            'type'              => 'switch',
            'title'             => esc_html__('Post Navigation', 'cargo-pifour'),
            'default'           => false,
        ),
        

    )
));
/**
 * 404 option
 * 
 * extra css for customer.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('404', 'cargo-pifour'),
    'icon' => 'el el-exclamation-sign',
    'fields' => array(
        array(
            'title' => esc_html__('404 title', 'cargo-pifour'),
            'id' => 'page_404_title',
            'type' => 'text',
        ),
        array(
            'title' => esc_html__('404 sub title', 'cargo-pifour'),
            'id' => 'page_404_sub_title',
            'type' => 'text',
        ),
        array(
            'id' => 'page_404_message',
            'type' => 'textarea',
            'title' => esc_html__('Message', 'cargo-pifour'),
            'subtitle' => esc_html__('Add message notify output', 'cargo-pifour'),
            'validate' => 'no_html',
        ),
        array(
            'title'             => esc_html__('Is display home button?', 'cargo-pifour'),
            'id'                => 'page_404_button',
            'type'              => 'switch',
            'default'           => false,
        ), 
    )
));

/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Styling', 'cargo-pifour'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set color main color.', 'cargo-pifour'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'cargo-pifour'),
            'default' => '#006db7'
        ),
        array(
            'id'       => 'link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Links Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Links Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
            'default'           => array(
                'regular'           => '#717171',
                'hover'             => '#006db7',
            ),
            'output'   => array( 'a' ),
        ),

        array(
            'id'       => 'button_primary_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Primary Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Primary Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),  
        array(
            'id'       => 'button_primary_bg',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Primary Background Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Background Primary Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),
         array(
            'id'       => 'button_primary_border',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Primary Border Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Primary Border Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),
        array(
            'id'       => 'button_default_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Default Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Default Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),  
        array(
            'id'       => 'button_default_bg',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Default Background Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Default Background Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),
         array(
            'id'       => 'button_default_border',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Default Border Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Default Border Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),

         array(
            'id'       => 'button_inverse_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Inverse Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Inverse Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),  
        array(
            'id'       => 'button_inverse_bg',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Inverse Background Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Inverse Background Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),
         array(
            'id'       => 'button_inverse_border',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Button Inverse Border Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Button Inverse Border Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
        ),

    )
));

/**
 * Typography
 * 
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'cargo-pifour'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body,body p'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h1'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h2'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h3'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h4'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h5'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h6'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour')
        )
    )
));

/* extra font. */
$custom_font_1 = Redux::getOption($opt_name, 'google-font-selector-1');
$custom_font_1 = !empty($custom_font_1) ? explode(',', $custom_font_1) : array();

Redux::setSection($opt_name, array(
    'title' => esc_html__('Extra Fonts', 'cargo-pifour'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Custom Font', 'cargo-pifour'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  =>  $custom_font_1,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'cargo-pifour'),
            'default' => array(
                'color' => '',
                'font-style' => '',
                'font-weight' => '',
                'font-family' => '',
                'google' => true,
                'font-size' => '',
                'line-height' => '',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'cargo-pifour'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'cargo-pifour'),
            'validate' => 'no_html',
            'default' => '',
        )
    )
));

/**
 * Footer
 *
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer', 'cargo-pifour'),
    'icon' => 'el el-website',
    'fields' => array()
));

/* footer top. */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Top', 'cargo-pifour'),
    'icon' => 'el el-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'title'     => esc_html__('Enable','cargo-pifour'),
            'subtitle'  => esc_html__('Enable footer top','cargo-pifour'),
            'id'        => 'enable_footer_top',
            'type'      => 'switch',
            'default'   => true
        ),
        array(
            'id'       => 'footer-top-column',
            'type'     => 'select',
            'title'    => esc_html__( 'Column', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Footer Column', 'cargo-pifour' ),
            'default'    => 4, 
            'options'  => array(
                1 => esc_html__('1', 'cargo-pifour' ),
                2 => esc_html__('2', 'cargo-pifour' ),
                3 => esc_html__('3', 'cargo-pifour' ),
                4 => esc_html__('4', 'cargo-pifour' ),
            ),
            'required'  => array('enable_footer_top','=',1)
        ),
         array(
            'id'                => 'footer_top_background_color',
            'type'              => 'color_rgba',
            'title'             => esc_html__( 'Background color', 'cargo-pifour' ),
            'output'   => array('background-color' => '.footer-top .bg-overlay'),
            'required'  => array('enable_footer_top','=',1)
        )
        ,
        array(
            'title'             => esc_html__('Background image', 'cargo-pifour'),
            'subtitle'          => esc_html__('Footer top background image', 'cargo-pifour'),
            'id'                => 'footer_top_background_image',
            'type'              => 'background',
            'background-color'  => false,
            'output'            => array( 'footer .footer-top' ),
            'required'  => array('enable_footer_top','=',1)
        ),
        array(
            'title'             => esc_html__('Padding', 'cargo-pifour'),
            'subtitle'          => esc_html__('Footer top padding (top/bottom).', 'cargo-pifour'),
            'id'                => 'footer_top_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array('px'),
            'right'             => false,
            'left'              => false,
            'output'            => array( 'footer #footer-top' ),
            'required'  => array('enable_footer_top','=',1)
        ),
         array(
            'subtitle' => esc_html__('Title color.', 'cargo-pifour'),
            'id' => 'footer_top_title_color',
            'type' => 'color',
            'title' => esc_html__('Title Color', 'cargo-pifour'),
            'output'    => array('.site-footer .widget .wg-title'),
            'required'  => array('enable_footer_top','=',1)
        ),
        array(
            'subtitle' => esc_html__('Text color.', 'cargo-pifour'),
            'id' => 'footer_top_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'cargo-pifour'),
            'output'    => array('.footer-top,.footer-top p,.footer-top p i,.footer-top .widget_text,.footer-top .widget,.footer-top .widget i,.footer-top table caption,.footer-top table th,.footer-top table td'),
            'required'  => array('enable_footer_top','=',1)
        ),
        array(
            'id'       => 'footer_top_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Links Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Links Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
            'output'   => array( '.footer-top a,.footer-top .widget a,.footer-top ul li a,.footer-top .widget_nav_menu ul li a,.footer-top table td a,.footer-top .cms-socials a' ),
            'required'  => array('enable_footer_top','=',1)
        ),
    )
));

/* footer bottom. */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Bottom', 'cargo-pifour'),
    'icon' => 'el el-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'title'             => esc_html__('Background', 'cargo-pifour'),
            'subtitle'          => esc_html__('Footer bottom background.', 'cargo-pifour'),
            'id'                => 'footer_bottom_background',
            'type'              => 'background',
            'output'            => array( 'footer #footer-bottom' ),   
        ),
        array(
            'title'             => esc_html__('Padding', 'cargo-pifour'),
            'subtitle'          => esc_html__('Footer bottom padding (top/bottom).', 'cargo-pifour'),
            'id'                => 'footer_bottom_padding',
            'type'              => 'spacing',
            'mode'              => 'padding',
            'units'             => array('px'),
            'right'             => false,
            'left'              => false,
            'output'            => array( 'footer #footer-bottom' )
        ),
        array(
            'subtitle' => esc_html__('Title color.', 'cargo-pifour'),
            'id' => 'footer_bottom_title_color',
            'type' => 'color',
            'title' => esc_html__('Title Color', 'cargo-pifour'),
            'output'    => array('.footer-bottom .wg-title'),
        ),
        array(
            'subtitle' => esc_html__('Text color.', 'cargo-pifour'),
            'id' => 'footer_bottom_text_color',
            'type' => 'color',
            'title' => esc_html__('Text Color', 'cargo-pifour'),
            'output'    => array('.footer-bottom,.footer-bottom p,.footer-bottom .widget_text,.footer-bottom table caption,.footer-bottom table th,.footer-bottom table td'),
        ),
        array(
            'id'       => 'footer_bottom_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Links Color', 'cargo-pifour' ),
            'subtitle' => esc_html__( 'Select Links Color Option', 'cargo-pifour' ),
            'regular'   => true,
            'hover'     => true,
            'active'    => false,
            'visited'   => false,
            'output'   => array( '.footer-bottom a,.footer-bottom .widget a,.footer-bottom ul li a,.footer-bottom .widget_nav_menu ul li a,.footer-bottom table td a' ),
        ),
    )
));

/**
 * Shop option
 * 
 * extra css for customer.
 * @author Fox
 */
/**
 * Shop option
 * 
 * extra css for customer.
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Woocommerces', 'cargo-pifour'),
    'icon' => 'el el-shopping-cart',
    'fields' => array(
       
        array(
            'id'                => 'woo_loop_layout',
            'title'             => esc_html__('Shop catalog layout', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for catalog shop page', 'cargo-pifour'),
            'default'           => 'right',
            'type'              => 'image_select',
            'options'           => array(
                                        'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                        'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                        'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                    )
        ),
        array(
            'subtitle' => esc_html__('Select catalog product column', 'cargo-pifour'),
            'id' => 'shop_columns',
            'type' => 'select',
            'title' => esc_html__('Products Columns', 'cargo-pifour'),
            'options'=>array(
                '2'=> esc_html__('2 Columns','cargo-pifour'),
                '3'=> esc_html__('3 Columns','cargo-pifour'),
            ),
            'default' => '3',
            'required'          => array( 'woo_loop_layout', '=', array('left','right') )
        ),
        array(
            'subtitle' => esc_html__('Select catalog product column', 'cargo-pifour'),
            'id' => 'shop_columns_full',
            'type' => 'select',
            'title' => esc_html__('Products Columns', 'cargo-pifour'),
            'options'=>array(
                '2'=> esc_html__('2 Columns','cargo-pifour'),
                '3'=> esc_html__('3 Columns','cargo-pifour'),
                '4'=> esc_html__('4 Columns','cargo-pifour'),
            ),
            'default' => '4',
            'required'          => array( 'woo_loop_layout', '=', 'full' )
        ),
        array(
            'subtitle' => esc_html__('Enter the number of products you want to show on catalog layout', 'cargo-pifour'),
            'id' => 'shop_products',
            'type' => 'text',
            'title' => esc_html__('Number Product Per Page', 'cargo-pifour'),
            'default' => '12',
        ),
        array(
            'id'                => 'woo_single_layout',
            'title'             => esc_html__('Product single layout', 'cargo-pifour'),
            'subtitle'          => esc_html__('select a layout for single product page', 'cargo-pifour'),
            'default'           => 'full',
            'type'              => 'image_select',
            'options'           => array(
                                        'left' => get_template_directory_uri().'/assets/images/content/right.png',
                                        'full' => get_template_directory_uri().'/assets/images/content/full.png',
                                        'right' => get_template_directory_uri().'/assets/images/content/left.png',
                                    )
        ),
          
    )
));

/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
Redux::setSection($opt_name, array(
    'title' => esc_html__('Optimal Core', 'cargo-pifour'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'cargo-pifour'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'cargo-pifour'),
            'default' => true
        )
    )
));