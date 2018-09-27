<?php
/**
 * Meta box config file
 */
if (! class_exists('MetaFramework')) {
    return;
}

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => apply_filters('opt_meta', 'opt_meta_options'),
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Allow you to start the panel in an expanded way initially.
    'open_expanded' => false,
    // Disable the save warning when a user changes a field
    'disable_save_warn' => true,
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => false,

    'output' => false,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // 'disable_google_fonts_link' => true, // Disable this in case you want to create your own google fonts loader
    'admin_bar' => false,
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => false,
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => false,
    // save meta to multiple keys.
    'meta_mode' => 'multiple'
);

// -> Set Option To Panel.
MetaFramework::setArgs($args);

add_action('admin_init', 'cargo_pifour_meta_boxs');

MetaFramework::init();

function cargo_pifour_meta_boxs()
{

    /** page options */
    MetaFramework::setMetabox(array(
        'id' => '_page_main_options',
        'label' => esc_html__('Page Setting', 'cargo-pifour'),
        'post_type' => 'page',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => false,
        'sections' => array(
            array(
                'title' => esc_html__('General', 'cargo-pifour'),
                'id' => 'tab-page-general',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'title'     => esc_html__('Boxed Layout', 'cargo-pifour'),
                        'subtitle'  => esc_html__('make your site is boxed?', 'cargo-pifour'),
                        'id'        => 'opt_general_layout',
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
                        'required'  => array( 'opt_general_layout', '=', 1),
                    ), 
                    array(
                        'title'             => esc_html__('Body Background', 'cargo-pifour'),
                        'id'                => 'opt_general_background',
                        'type'              => 'background',
                        'preview'           => false,
                        'required'  => array( 'opt_general_layout', '=', 1),
                    ),  
                    array(
                        'title'             => esc_html__('Content Background', 'cargo-pifour'),
                        'id'                => 'opt_content_background',
                        'type'              => 'background',
                        'preview'           => false,
                        'required'  => array( 'opt_general_layout', '=', 1),
                    ),   
                )
            ), 
            array(
                'title' => esc_html__('Header', 'cargo-pifour'),
                'id' => 'tab-page-header',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'id' => 'header_layout',
                        'title' => esc_html__('Layouts', 'cargo-pifour'),
                        'subtitle' => esc_html__('select a layout for header', 'cargo-pifour'),
                        'default' => '',
                        'type' => 'image_select',
                        'options' => array(
                            'default' => get_template_directory_uri() . '/assets/images/header/header1.png',
                            'layout2' => get_template_directory_uri() . '/assets/images/header/header2.png',
                            'layout3' => get_template_directory_uri() . '/assets/images/header/header3.png'
                        ),
                    ),
                    array(
                        'id' => 'header_menu',
                        'type' => 'select',
                        'title' => esc_html__('Select Menu', 'cargo-pifour'),
                        'subtitle' => esc_html__('custom menu for current page', 'cargo-pifour'),
                        'options' => cargo_pifour_get_nav_menu(),
                        'default' => '',
                    ),
                )
            ),
            array(
                'title' => esc_html__('Header Top', 'cargo-pifour'),
                'id' => 'tab-page-header-top',
                'icon' => 'el el-credit-card',
                'fields' => array(
                    array(
                        'title'     => esc_html__('Enable', 'cargo-pifour'),
                        'id'        => 'enable_header_top',
                        'type'      => 'switch',
                        'default'   => true
                    ),
                    array(
                        'id' => 'header_top_layout',
                        'title' => esc_html__('Layouts', 'cargo-pifour'),
                        'subtitle' => esc_html__('select a layout for header top', 'cargo-pifour'),
                        'default' => '',
                        'type' => 'image_select',
                        'options' => array(
                            'layout1' => get_template_directory_uri().'/assets/images/header/ht-style1.png ',
                            'layout2' => get_template_directory_uri().'/assets/images/header/ht-style2.png',
                            'layout3' => get_template_directory_uri().'/assets/images/header/ht-style3.png',
                        ),
                        'required'  => array( 'enable_header_top', '=', 1),       
                    ),
                        
                )
            ),
            array(
                'title' => esc_html__('Page Title & BC', 'cargo-pifour'),
                'id' => 'tab-page-title-bc',
                'icon' => 'el el-map-marker',
                'fields' => array(
                    array(
                        'id' => 'page_title_enable',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Page Title', 'cargo-pifour'),
                        'subtitle' => esc_html__('On /Off page title on this page .', 'cargo-pifour'),
                         'default' => true 
                    ),
                    array(
                        'id' => 'page_title_layout',
                        'title' => esc_html__('Layouts', 'cargo-pifour'),
                        'subtitle' => esc_html__('select a layout for page title', 'cargo-pifour'),
                        'default' => '2',
                        'type' => 'image_select',
                        'options' => array(
                            '2' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-1.png',
                            '3' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-2.png',
                            '4' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-3.png',
                            '5' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-4.png',
                            '6' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-5.png',
                            '7' => get_template_directory_uri().'/assets/images/pagetitle/pt-s-6.png',
                        ),
                        'required'  => array( 'page_title_enable', '=', 1),
                    ),
                    array(
                        'id' => 'page_title_text',
                        'type' => 'text',
                        'title' => esc_html__('Custom Title', 'cargo-pifour'),
                        'subtitle' => esc_html__('Custom current page title.', 'cargo-pifour'),
                        'required'  => array( 'page_title_enable', '=', 1),
                    )
                )
            ),
             array(
                'title' => esc_html__('Content', 'cargo-pifour'),
                'id' => 'tab-content',
                'icon' => 'el el-pencil',
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
                    ),
                    
                )
            ),
           
        )
    ));

    /** post options */
    MetaFramework::setMetabox(array(
        'id' => '_page_post_format_options',
        'label' => esc_html__('Post Format', 'cargo-pifour'),
        'post_type' => 'post',
        'context' => 'advanced',
        'priority' => 'default',
        'open_expanded' => true,
        'sections' => array(
            array(
                'title' => '',
                'id' => 'color-Color',
                'icon' => 'el el-laptop',
                'fields' => array(
                    array(
                        'id' => 'opt-video-type',
                        'type' => 'select',
                        'title' => esc_html__('Select Video Type', 'cargo-pifour'),
                        'subtitle' => esc_html__('Local video, Youtube, Vimeo', 'cargo-pifour'),
                        'options' => array(
                            'local' => esc_html__('Upload', 'cargo-pifour'),
                            'youtube' => esc_html__('Youtube', 'cargo-pifour'),
                            'vimeo' => esc_html__('Vimeo', 'cargo-pifour'),
                        )
                    ),
                    array(
                        'id' => 'otp-video-local',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Local Video', 'cargo-pifour'),
                        'subtitle' => esc_html__('Upload video media using the WordPress native uploader', 'cargo-pifour'),
                        'required' => array('opt-video-type', '=', 'local')
                    ),
                    array(
                        'id' => 'opt-video-youtube',
                        'type' => 'text',
                        'title' => esc_html__('Youtube', 'cargo-pifour'),
                        'subtitle' => esc_html__('Load video from Youtube.', 'cargo-pifour'),
                        'placeholder' => esc_html__('https://youtu.be/iNJdPyoqt8U', 'cargo-pifour'),
                        'required' => array('opt-video-type', '=', 'youtube')
                    ),
                    array(
                        'id' => 'opt-video-vimeo',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo', 'cargo-pifour'),
                        'subtitle' => esc_html__('Load video from Vimeo.', 'cargo-pifour'),
                        'placeholder' => esc_html__('https://vimeo.com/155673893', 'cargo-pifour'),
                        'required' => array('opt-video-type', '=', 'vimeo')
                    ),
                    array(
                        'id' => 'otp-video-thumb',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Video Thumb', 'cargo-pifour'),
                        'subtitle' => esc_html__('Upload thumb media using the WordPress native uploader', 'cargo-pifour'),
                        'required' => array('opt-video-type', '=', 'local')
                    ),
                    array(
                        'id' => 'otp-audio',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Audio Media', 'cargo-pifour'),
                        'subtitle' => esc_html__('Upload audio media using the WordPress native uploader', 'cargo-pifour'),
                    ),
                    array(
                        'id' => 'opt-gallery',
                        'type' => 'gallery',
                        'title' => esc_html__('Add/Edit Gallery', 'cargo-pifour'),
                        'subtitle' => esc_html__('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'cargo-pifour'),
                    ),
                    array(
                        'id' => 'opt-quote-title',
                        'type' => 'text',
                        'title' => esc_html__('Quote Title', 'cargo-pifour'),
                        'subtitle' => esc_html__('Quote title or quote name...', 'cargo-pifour'),
                    ),
                    array(
                        'id' => 'opt-quote-sub-title',
                        'type' => 'text',
                        'title' => esc_html__('Quote Sub Title', 'cargo-pifour'),
                        'subtitle' => esc_html__('Quote sub title or quote position...', 'cargo-pifour'),
                    ),
                    array(
                        'id' => 'opt-quote-content',
                        'type' => 'textarea',
                        'title' => esc_html__('Quote Content', 'cargo-pifour'),
                    ),
                      array(
                        'id' => 'opt-status',
                        'type' => 'media',
                        'url' => true,
                        'mode' => false,
                        'title' => esc_html__('Add/Edit Status image', 'cargo-pifour'),
                        'subtitle' => esc_html__('uploading new images using the WordPress native uploader', 'cargo-pifour'),
                    ),
                )
            ),
        )
    ));
}
