<?php
/**
 * Theme Framework functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 1170;
	
/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */


//add_meta_box( 'meta-box-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_display_callback', 'producto' );

register_post_type('blog', array(
        'labels' => array(
            'name' => __('Blog', 'happykids'),
            'singular_name' => 'blog',
            'add_new' => __('Add New', 'happykids'),
            'add_new_item' =>__('Add New Item', 'happykids'),
            'edit_item' => __('Edit Item', 'happykids'),
            'new_item' => __('New Item', 'happykids'),
            'view_item' => __('View Item', 'happykids'),
            'search_items' => __('Search Items', 'happykids'),
            'not_found' =>  __('No item found', 'happykids'),
            'not_found_in_trash' => __('No items found in Trash', 'happykids'),
            'menu_name' => __('Blog', 'happykids'),
        ),      
        'singular_label' => __('Blog', 'happykids'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 8,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes','post-formats'),
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'blog', 'with_front' => false),
        'can_export' => true,
        'show_in_nav_menus' => true,
    ));

    //register taxonomy for portfolio
    /*register_taxonomy('portfolio_category','portfolio',array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Portfolio Categories', 'happykids'),
            'menu_name' => __('Categories', 'happykids'),
            'singular_name' => __('Portfolio Category', 'happykids')
        ),
        'show_ui' => true,
    ));*/


 
function cargo_pifour_setup() {

	// load language.
	load_theme_textdomain( 'cargo-pifour' , get_template_directory() . '/languages' );

	// Adds title tag
	add_theme_support( "title-tag" );
	
	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'quote','link','status') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'cargo-pifour' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array('default-color' => 'e6e6e6',) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	update_option( 'thumbnail_size_w', 370); 	
    update_option( 'thumbnail_size_h', 370 ); 
    update_option( 'thumbnail_crop', 1);
    update_option( 'medium_size_w', 570);		
    update_option( 'medium_size_h', 380);	
    update_option( 'medium_crop', 1);	
	update_option( 'large_size_w', 1170);  		
    update_option( 'large_size_h', 494);
    update_option( 'large_crop', 1);
    
    add_image_size('cargo_pifour-370-207', 370, 207, true);	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}

add_action( 'after_setup_theme', 'cargo_pifour_setup' );

/**
 * Call default WC single image gallery
 */
function cargo_pifour_wc_single_gallery()
{
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider'); 
}

add_action('after_setup_theme', 'cargo_pifour_wc_single_gallery');
/**
 * support shortcodes
 * @return array
 */
function cargo_pifour_shortcodes(){
	return array(
		'cms_grid',
		'cms_fancybox_single',
	);
}



add_action('vc_before_init', 'cargo_pifour_vc_after');

function cargo_pifour_vc_after() {
    require( get_template_directory() . '/vc_params/vc_custom.php' );
    require( get_template_directory() . '/vc_params/vc_row.php' );
}
/**
 * Add new elements for VC
 * 
 * @author FOX
 */
add_action('vc_before_init', 'cargo_pifour_vc_before');

function cargo_pifour_vc_before(){
   
    if(!class_exists('CmsShortCode'))
        return ;
    
    require( get_template_directory() . '/inc/elements/cms_post_services.php' );
    require( get_template_directory() . '/inc/elements/cms_download_file.php' );
    require( get_template_directory() . '/inc/elements/cms_team.php' );
    require( get_template_directory() . '/inc/elements/cms_gallery.php' );
    require( get_template_directory() . '/inc/elements/cms_social.php' );
    require( get_template_directory() . '/inc/elements/cms_googlemap.php' );
    require( get_template_directory() . '/inc/elements/cms_button.php' );
    require( get_template_directory() . '/inc/elements/cms_icon_carousel.php' );
    require( get_template_directory() . '/inc/elements/cms_testimonial_carousel.php' );
    require( get_template_directory() . '/inc/elements/cms_recent_post.php' );
    require( get_template_directory() . '/inc/elements/cms_client_carousel.php' );
    require( get_template_directory() . '/inc/elements/cms_grid_services.php' );
    require( get_template_directory() . '/inc/elements/cms_table_position.php' );
    require( get_template_directory() . '/inc/elements/cms_pricing.php' );
    require( get_template_directory() . '/inc/elements/cms_pricing_table.php' );
    require( get_template_directory() . '/inc/elements/cms_testimonials.php' );
    add_filter('cms-shorcode-list', 'cargo_pifour_shortcodes');
     
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function cargo_pifour_front_end_scripts() {
    
	global $wp_styles, $opt_meta_options;

	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.2');
		
	 /* Adds JavaScript Bootstrap. */
	wp_enqueue_script('wow-effect', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.0.1', true);	
	/* Add main.js */
	wp_enqueue_script('cargo-pifour-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
	
	/* Add menu.js */
	wp_enqueue_script('cargo-pifour-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '1.0.0', true);

	wp_enqueue_script('bootstrap-select',get_template_directory_uri().'/assets/js/bootstrap-select.js',array('bootstrap'),'1.0');

 /* Adds magnific popup. */
    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.0.0', true);
	
    
	/* Comment */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/** ----------------------------------------------------------------------------------- */
	
	wp_enqueue_style( 'cargo_pifour-poppins-font',cargo_pifour_poppins(), array(), null );
	wp_enqueue_style( 'cargo_pifour-lato-font',cargo_pifour_lato(), array(), null );	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('bootstrap-select-css', get_template_directory_uri() . '/assets/css/bootstrap-select.css');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

	wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/animate.css');	

	    /* Load magnific popup css*/
    wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.1');

  	/* Loads Stroke gap font */
	wp_enqueue_style('font-stroke-7-icon', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css');
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'cargo-pifour-style', get_stylesheet_uri());

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'cargo-pifour-ie', get_template_directory_uri() . '/assets/css/ie.css');
	
	/* ie */
	$wp_styles->add_data( 'cargo-pifour-ie', 'conditional', 'lt IE 9' );
	
	/* Load static css*/
	wp_enqueue_style('cargo-pifour-static', get_template_directory_uri() . '/assets/css/static.css');
	


}

add_action( 'wp_enqueue_scripts', 'cargo_pifour_front_end_scripts' );

function cargo_pifour_poppins() {
    $fonts_url = '';
    $poppins = _x( 'on', 'Poppins font: on or off', 'cargo-pifour' );
    if ( 'off' !== $poppins ) {
        $query_args = array(
        'family' =>  'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 
        'subset' => urlencode( 'latin,latin-ext' )
        );
    }  
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    return esc_url_raw( $fonts_url );
}

function cargo_pifour_lato() {
    $fonts_url = '';
    $Lato = _x( 'on', 'Lato font: on or off', 'cargo-pifour' );
    if ( 'off' !== $Lato ) {
        $query_args = array(
        'family' =>  'Lato:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 
        'subset' => urlencode( 'latin,latin-ext' )
        );
    }  
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    return esc_url_raw( $fonts_url );
}

/**
 * load admin scripts.
 * 
 * @author FOX
 */
function cargo_pifour_admin_scripts($hook){

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	$screen = get_current_screen();

	/* load js for edit post. */
	if($screen->post_type == 'post'){
		/* post format select. */
		wp_enqueue_script('post-format', get_template_directory_uri() . '/assets/js/post-format.js', array(), '1.0.0', true);
	}
	// Widget scripts
    if ( 'widgets.php' == $hook || 'post-new.php' == $hook || 'post.php' == $hook )
    {
        wp_enqueue_media();
    }
     
    // Include theme styles for admin
    wp_enqueue_style( 'cargo-pifour-admin', get_template_directory_uri() . '/assets/css/admin.css' );
    wp_enqueue_script( 'cargo-pifour-admin', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'media-upload' ) );
    wp_localize_script( 'cargo-pifour-admin', 'cargo_pifourMediaLocalize', array(
        'add_video' => esc_html__( 'Add Video', 'cargo-pifour' ),
        'add_audio' => esc_html__( 'Add Audio', 'cargo-pifour' ),
        'add_images' => esc_html__( 'Add Image(s)', 'cargo-pifour' ),
        'add_image' => esc_html__( 'Add Image', 'cargo-pifour' )
    ) );
}

add_action( 'admin_enqueue_scripts', 'cargo_pifour_admin_scripts' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function cargo_pifour_widgets_init() {

	global $opt_theme_options;

	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'cargo-pifour' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	if (class_exists('WooCommerce')) {
        register_sidebar(array(
            'name'          => esc_html__('WooCommerce Sidebar', 'cargo-pifour'),
            'id'            => 'sidebar-shop',
            'description'   => esc_html__('Appears in WooCommerce Archive page', 'cargo-pifour'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="wg-title"><span>',
            'after_title'   => '</span></h4>',
        ));
    }
    register_sidebar( array(
		'name' => esc_html__( 'Header top 1 left Side', 'cargo-pifour' ),
		'id' => 'header-top-1-left',
		'description' => esc_html__( 'Appears on the top left of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
    register_sidebar( array(
		'name' => esc_html__( 'Header top 1 right Side', 'cargo-pifour' ),
		'id' => 'header-top-1-right',
		'description' => esc_html__( 'Appears on the top right of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Header top 2 left Side', 'cargo-pifour' ),
		'id' => 'header-top-2-left',
		'description' => esc_html__( 'Appears on the top left of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
    register_sidebar( array(
		'name' => esc_html__( 'Header top 2 right Side', 'cargo-pifour' ),
		'id' => 'header-top-2-right',
		'description' => esc_html__( 'Appears on the top right of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
		register_sidebar( array(
		'name' => esc_html__( 'Header top 3 left Side', 'cargo-pifour' ),
		'id' => 'header-top-3-left',
		'description' => esc_html__( 'Appears on the top left of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
    register_sidebar( array(
		'name' => esc_html__( 'Header top 3 right Side', 'cargo-pifour' ),
		'id' => 'header-top-3-right',
		'description' => esc_html__( 'Appears on the top right of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	 register_sidebar( array(
		'name' => esc_html__( 'Header middle 1 left Side', 'cargo-pifour' ),
		'id' => 'header-middle-1-left',
		'description' => esc_html__( 'Appears on the middle left of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
    register_sidebar( array(
		'name' => esc_html__( 'Header middle 1 right Side', 'cargo-pifour' ),
		'id' => 'header-middle-1-right',
		'description' => esc_html__( 'Appears on the middle right of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Menu widget right 1 Sidebar', 'cargo-pifour' ),
		'id' => 'menu-sidebar',
		'description' => esc_html__( 'Menu widget ', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
    register_sidebar( array(
		'name' => esc_html__( 'Menu widget right 2 Sidebar', 'cargo-pifour' ),
		'id' => 'menu-sidebar2',
		'description' => esc_html__( 'Menu widget  ', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Header middle 3 left Side', 'cargo-pifour' ),
		'id' => 'header-middle-3-left',
		'description' => esc_html__( 'Appears on the middle left of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
    register_sidebar( array(
		'name' => esc_html__( 'Header middle 3 right Side', 'cargo-pifour' ),
		'id' => 'header-middle-3-right',
		'description' => esc_html__( 'Appears on the middle right of header', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Menu widget right 3 Sidebar', 'cargo-pifour' ),
		'id' => 'menu-sidebar3',
		'description' => esc_html__( 'Menu widget ', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	/* footer-top */
	if(!empty($opt_theme_options['footer-top-column'])) {

		for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){
			register_sidebar(array(
				'name' => sprintf(esc_html__('Footer Top %s', 'cargo-pifour'), $i),
				'id' => 'sidebar-footer-top-' . $i,
				'description' => esc_html__('Appears on posts and pages except the optional Front Page template, which has its own widgets', 'cargo-pifour'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="wg-title">',
				'after_title' => '</h3>',
			));
		}
	}
register_sidebar( array(
		'name' => esc_html__( 'Footer Bottom Left Sidebar', 'cargo-pifour' ),
		'id' => 'sidebar-footer-bottom-left',
		'description' => esc_html__( 'Footer Bottom Left Sidebar', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
register_sidebar( array(
		'name' => esc_html__( 'Footer Bottom Right Sidebar', 'cargo-pifour' ),
		'id' => 'sidebar-footer-bottom-right',
		'description' => esc_html__( 'Footer Bottom Right Sidebar ', 'cargo-pifour' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'cargo_pifour_widgets_init' );

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function cargo_pifour_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cargo-pifour' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'cargo-pifour' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'cargo-pifour' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function cargo_pifour_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
			<div class="pagination loop-pagination">
				<?php echo wp_kses_post($links); ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
function cargo_pifour_product_nav() {
    global $post; 
    
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation product-navigation">
		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): 
            ?>
            <a class="pro-prev left btn btn-default" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo esc_html__('Previous','cargo-pifour'); ?></a>   
			<?php endif; ?>
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { 
                ?>
    			<a class="pro-next right btn btn-default" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo esc_html__('Next','cargo-pifour'); ?></a>   
			<?php } ?>
		</div> 
	</nav> 
	<?php
}

function cargo_pifour_limit_words($string) {
    global $opt_theme_options;
    if(isset($opt_theme_options['excerpt_length']) && !empty($opt_theme_options['excerpt_length']) && (int) $opt_theme_options['excerpt_length'] > 0){
        $word_limit =  $opt_theme_options['excerpt_length'];
        if(is_sticky()) $word_limit = 22;
        $words = explode(' ', $string, ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return implode(' ', $words);
    }else{
        return $string;
    }
}

function cargo_pifour_grid_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if (count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words).'...';
}

/* Remove [...] after excerpt text */
function cargo_pifour_new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'cargo_pifour_new_excerpt_more');

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function cargo_pifour_post_nav() {
     global $post,$opt_theme_options;
     
    if(!isset($opt_theme_options['single_post_nav']) ||  ( isset($opt_theme_options['single_post_nav']) && !$opt_theme_options['single_post_nav']))
        return;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="row nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): 
            $thumbnail_bg = get_the_post_thumbnail_url($prev_post->ID, 'medium');
            $style='';
            if ( $thumbnail_bg ) {
                $style = 'style="background-image:url('.$thumbnail_bg.'); background-size: cover;"';
            }
            ?>
            <div class="col-sm-6">
                <div class="post-nav-wrap text-center" <?php echo $style;?>>
                <a class="post-prev left" href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><?php echo esc_html__('Previous','cargo-pifour'); ?></a>
                <h3><a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><?php echo get_the_title($prev_post->ID);?></a></h3>
                </div>  
            </div>
			<?php endif; ?>
            
			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { 
    			$thumbnail_bg = get_the_post_thumbnail_url($next_post->ID, 'thumbnail');
                $style='';
                if ( $thumbnail_bg ) {
                    $style = 'style="background-image:url('.$thumbnail_bg.'); background-size: cover;"';
                }
                 ?>
                <div class="col-sm-6 text-right">
                    <div class="post-nav-wrap text-center" <?php echo $style;?>>
    			     <a class="post-next right" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Next','cargo-pifour'); ?></a>
                     <h3><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title($next_post->ID);?></a></h3>
                    </div>  
                </div>  
			<?php } ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}


/**
 * Move comment form field to bottom
 */
function cargo_pifour_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'cargo_pifour_comment_field_to_bottom' ); 

function cargo_pifour_footer_share(){
    ?>
        <div class="entry-share">
            <ul class="social-share">
                <li class="share-title">Share:</li>
                <li><a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" title="Share This"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>

                <li><a class="twitter" target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'cargo-pifour');?>:%20<?php echo strip_tags(get_the_title());?>%20-%20<?php the_permalink();?>" title="Share This"><i aria-hidden="true" class="fa fa-twitter"></i></a></li>
                
                <li><a class="google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>" title="Share This"><i aria-hidden="true" class="fa fa-google-plus"></i></a></li>

                <li><a class="pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink());?>" title="Share This"><i class="fa fa-pinterest"></i></a></li>

            </ul>
        </div>
    <?php
}



/* Add Custom Comment */
function cargo_pifour_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
    ?>
    <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
    <?php endif; ?>
	    <div class="comment-author-image vcard">
	    	<?php echo get_avatar( $comment, 100 ); ?>
	    </div>
		<div class="comment-meta commentmetadata">
		    <div class="comment-author">
				<h5 class="comment-author-title"><?php echo get_comment_author_link(); ?></h5>
				<div class="reply">
		    		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		    	</div>
	    	</div>
			<span class="comment-date">
			<?php
				//echo get_the_date(get_option('date_format', 'Y/m/d'));
				  printf( _x( '%s ago', '%s = human-readable time difference', 'cargo-pifour' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); 
			?>
			</span>

			<?php if ( $comment->comment_approved == '0' ) : ?>
	    	<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' , 'cargo-pifour'); ?></em>
		    <?php endif; ?>

		    <div class="comment-main">
		    	<div class="comment-content">
		    		<?php comment_text(); ?>
		    		
		    	</div>
		    </div>

		</div>
    
    
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}

/* core functions. */
require_once( get_template_directory() . '/inc/functions.php' );




/* require widget*/

require( get_template_directory() . '/inc/widgets/cms_socials.php' );  
require( get_template_directory() . '/inc/widgets/cart_search/cart_search.php' );     
require( get_template_directory() . '/inc/widgets/widget_text.php' ); 
require( get_template_directory() . '/inc/widgets/cms_image.php' ); 
require( get_template_directory() . '/inc/widgets/recent_post_v2.php' ); 



function cargo_pifour_generate_uiqueid( $length = 6 )
{
    return substr( md5( microtime() ), rand( 0, 26 ), $length );
}
/**
 * theme actions.
 */

/* add footer back to top. */
add_action('wp_footer', 'cargo_pifour_footer_back_to_top');

/* Woo commerce function */
if(class_exists('Woocommerce')){
    require get_template_directory() . '/woocommerce/wc-template-hooks.php';
}