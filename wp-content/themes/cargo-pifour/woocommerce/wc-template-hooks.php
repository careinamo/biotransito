<?php
/**
 * WooCommerce Template Hooks
 *
 * Action/filter hooks used for WooCommerce functions/templates.
 *
 * @author      Knight
 * @category    Core
 * @package     WooCommerce/Templates
 * @version     3.1.x
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

add_filter( 'woocommerce_show_page_title' , 'cargo_pifour_woo_hide_page_title' );
 
function cargo_pifour_woo_hide_page_title() {
	return false;
}

/**
 * Remove all default css style
 * add_filter('woocommerce_enqueue_styles', '__return_empty_array');
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');


/* Remove style of plugin WooCommerce Quantity Increment */
add_action('wp_enqueue_scripts', 'wcqi_dequeue_quantity');
function wcqi_dequeue_quantity()
{
    wp_dequeue_style('wcqi-css');
}

/**
 * Shop sidebar
 */
function cargo_pifour_shop_sidebar(){
    global $opt_theme_options;

    $_sidebar = 'full';

    if(isset($opt_theme_options['woo_loop_layout']))
        $_sidebar = $opt_theme_options['woo_loop_layout'];
    
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'full' )
        $_sidebar = 'full';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'left' )
        $_sidebar = 'left';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'right' )
        $_sidebar = 'right';
    return 'is-sidebar-' . esc_attr($_sidebar);
}

function cargo_pifour_loop_columns(){
	global $opt_theme_options;
    if(!isset($opt_theme_options['woo_loop_layout']))
        return '4';
        
    $is_sidebar = cargo_pifour_shop_sidebar();

    if(isset($_GET['cols']) && trim($_GET['cols']) == 2 )
            return '2';
        if(isset($_GET['cols']) && trim($_GET['cols']) == 3 )
            return '3';
        if(isset($_GET['cols']) && trim($_GET['cols']) == 4 )
            return '4';
    if($is_sidebar == 'is-sidebar-full'){
        return $opt_theme_options['shop_columns_full'];
    }else{
        return $opt_theme_options['shop_columns'];
    }
}



/**
 * Shop product sidebar
 */
function cargo_pifour_shop_single_sidebar(){
    global $opt_theme_options;

    $_sidebar = 'full';

    if(isset($opt_theme_options['woo_single_layout']))
        $_sidebar = $opt_theme_options['woo_single_layout'];
    
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'full' )
        $_sidebar = 'full';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'left' )
        $_sidebar = 'left';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'right' )
        $_sidebar = 'right';
    return 'is-sidebar-' . esc_attr($_sidebar);
}

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);


/** add div wrap loop product
 * add_action('woocommerce_before_shop_loop_item', 'cargo_pifour_wc_loop_open', 0);
 * add_action('woocommerce_after_shop_loop_item', 'cargo_pifour_wc_loop_close', 99999);
*/
add_action('woocommerce_before_shop_loop_item', 'cargo_pifour_wc_loop_open', 0);
if (!function_exists('cargo_pifour_wc_loop_open')) {
    function cargo_pifour_wc_loop_open()
    {
        echo '<div class="wc-product-wrap clearfix">';
    }
}
add_action('woocommerce_after_shop_loop_item', 'cargo_pifour_wc_loop_close', 99999);
if (!function_exists('cargo_pifour_wc_loop_close')) {
    function cargo_pifour_wc_loop_close()
    {
        echo '</div>';
    }
}

/* add div wrap image */
add_action('woocommerce_before_shop_loop_item_title', 'cargo_pifour_wc_loop_image_open', 0);
if (!function_exists('cargo_pifour_wc_loop_image_open')) {
    function cargo_pifour_wc_loop_image_open()
    {
        echo '<div class="wc-img-wrap"><a href="' . esc_url( get_permalink() ) . '">';
    }
}
if (!function_exists('cargo_pifour_wc_loop_image_close')) {
    function cargo_pifour_wc_loop_image_close()
    {
        echo '</a></div>';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'cargo_pifour_wc_loop_image_close', 9999);

/* add div wrap product content after image overlay */
add_action('woocommerce_shop_loop_item_title', 'cargo_pifour_wc_loop_content_open', 1);
function cargo_pifour_wc_loop_content_open(){
    echo '<div class="wc-loop-content-wrap">';
}
add_action('woocommerce_after_shop_loop_item', 'cargo_pifour_wc_loop_content_close', 999999);
function cargo_pifour_wc_loop_content_close(){
    echo '</div>';
}

/**
 * Change title structure
 * woocommerce_after_shop_loop_item hook.
 *
 * @hooked cargo_pifour_woocommerce_template_loop_product_title - 10
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'cargo_pifour_woocommerce_template_loop_product_title', 10);
if (!function_exists('cargo_pifour_woocommerce_template_loop_product_title')) {
    function cargo_pifour_woocommerce_template_loop_product_title()
    {
        the_title('<h5 class="wc-loop-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h5>' );
    }
}

/**
 * Change Add to cart button text 
 * cargo_pifour_wc_loop_add_to_cart_text
*/
//add_filter( 'woocommerce_product_add_to_cart_text' , 'cargo_pifour_wc_loop_add_to_cart_text' );
function cargo_pifour_wc_loop_add_to_cart_text() {
    global $product;
    $product_type = $product->get_type();
    $product_id = $product-> get_id();
    switch ( $product_type ) {
        case 'external':
            return esc_html__('Add To Cart','cargo-pifour');
        break;
        case 'grouped':
            return esc_html__('Add To Cart','cargo-pifour');
        break;
        case 'simple':
            return esc_html__('Add To Cart','cargo-pifour');
        break;
        case 'variable':
            return esc_html__('Select Options','cargo-pifour');
        break;
        default:
            return esc_html__('Add To Cart','cargo-pifour');
    }
}


/**
 * Change title structure
 * woocommerce_after_shop_loop hook.
 *
 * @hooked cargo_pifour_woocommerce_pagination - 10
 */
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'cargo_pifour_woocommerce_pagination', 10);
if (!function_exists('cargo_pifour_woocommerce_pagination')) {
    function cargo_pifour_woocommerce_pagination()
    {
        global $wp_query;
        if ( $wp_query->max_num_pages <= 1 ) {
        	return;
        }
        ?>
        <nav class="woocommerce-pagination">
            <div class="pagination">
        	<?php
        		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
        			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
        			'format'       => '',
        			'add_args'     => false,
        			'current'      => max( 1, get_query_var( 'paged' ) ),
        			'total'        => $wp_query->max_num_pages,
        			'prev_text'    => '<i class="fa fa-angle-left"></i>',
        			'next_text'    => '<i class="fa fa-angle-right"></i>',
        			'type'         => 'list',
        			'end_size'     => 3,
        			'mid_size'     => 3,
        		) ) );
        	?>
            </div>
        </nav>
        <?php
    }
}


/* Single Product */
/* add div wrap image / summary */
add_action('woocommerce_before_single_product_summary', 'cargo_pifour_woo_wrap_image_summary_open', 0);
if (!function_exists('cargo_pifour_woo_wrap_image_summary_open')) {
    function cargo_pifour_woo_wrap_image_summary_open()
    {
        echo '<div class="img-summary-wrap row clearfix">';

    }
}
add_action('woocommerce_after_single_product_summary', 'cargo_pifour_woo_wrap_image_summary_close', 0);
if (!function_exists('cargo_pifour_woo_wrap_image_summary_close')) {
    function cargo_pifour_woo_wrap_image_summary_close()
    {
        echo '</div></div>';
    }
}
add_action('woocommerce_before_single_product_summary', 'cargo_pifour_woo_wrap_image_open', 1);
add_action('woocommerce_before_single_product_summary', 'cargo_pifour_woo_wrap_image_close', 999999);
if (!function_exists('cargo_pifour_woo_wrap_image_open')) {
    function cargo_pifour_woo_wrap_image_open()
    {
        echo '<div class="wc-single-img-wrap col-md-5 col-lg-5">';
    }
}
if (!function_exists('cargo_pifour_woo_wrap_image_close')) {
    function cargo_pifour_woo_wrap_image_close()
    {
        echo '</div><div class="col-md-7 col-lg-7">';
    }
}

/*
* Custom image gallery Style
*/
if (!function_exists('cargo_pifour_custom_wc_single_gallery')) {
    function cargo_pifour_custom_wc_single_gallery()
    {
        $options = array(
            'rtl'            => is_rtl(),
            'animation'      => 'slide',
            'smoothHeight'   => true,
            'directionNav'   => true,
            'controlNav'     => 'thumbnails',
            'slideshow'      => false,
            'animationSpeed' => 500,
            'animationLoop'  => false, // Breaks photoswipe pagination if true.
        );
        return $options;
    }
}
//add_filter('woocommerce_single_product_carousel_options', 'cargo_pifour_custom_wc_single_gallery');
 
/* Change title structure */
if (!function_exists('woocommerce_template_single_title')) {
    /**
     * Output the product title.
     *
     * @subpackage  Product
     */
    function woocommerce_template_single_title()
    {
        the_title('<h3 class="product-title">', '</h3>');
    }
}

/**
 * Change title structure
 * woocommerce_single_product_summary hook.
 *
 * @hooked woocommerce_template_single_rating - 10
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'cargo_pifour_woocommerce_template_single_rating', 5);
if (!function_exists('cargo_pifour_woocommerce_template_single_rating')) {
    function cargo_pifour_woocommerce_template_single_rating()
    {
        global $product;
        if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
        	return;
        }
        
        $rating_count = $product->get_rating_count();
        $review_count = $product->get_review_count();
        $average      = $product->get_average_rating();
        
        if ( $rating_count > 0 ) : ?>
        
        	<div class="woocommerce-product-rating">
        		<?php echo wc_get_rating_html( $average, $rating_count ); ?>
        		<?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s Review', '%s Reviews', $review_count, 'cargo-pifour' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
        	</div>
        
        <?php endif; ?>
        <?php
    }
}

/**
 * Add theme share
 * add_action('woocommerce_product_meta_end', 'cargo_pifour_product_sharing', 0);
 */
add_action('woocommerce_share','cargo_pifour_product_sharing');
 

add_action('woocommerce_product_additional_information', 'cargo_pifour_add_post_nav', 99999);
if (!function_exists('cargo_pifour_add_post_nav')) {
    function cargo_pifour_add_post_nav()
    {
        cargo_pifour_product_nav();
    }
}


add_action('woocommerce_review_before_comment_meta', 'cargo_pifour_review_before_comment_meta_open', 0);
if (!function_exists('cargo_pifour_review_before_comment_meta_open')) {
    function cargo_pifour_review_before_comment_meta_open()
    {
        echo '<div class="comment-meta-wrap">';
    }
}

add_action('woocommerce_review_meta', 'cargo_pifour_woocommerce_review_meta_close', 999);
if (!function_exists('cargo_pifour_woocommerce_review_meta_close')) {
    function cargo_pifour_woocommerce_review_meta_close()
    {
        echo '</div>';
    }
}

/* Move process checkout button */
remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
add_action('woocommerce_cart_actions', 'woocommerce_button_proceed_to_checkout', 20);
 
 
add_action('woocommerce_checkout_before_customer_details', 'cargo_pifour_woocommerce_checkout_before_customer_details', 0);
if (!function_exists('cargo_pifour_woocommerce_checkout_before_customer_details')) {
    function cargo_pifour_woocommerce_checkout_before_customer_details()
    {
        echo '<div class="row"><div class="col-sx-12 col-sm-12 col-md-6">';
    }
}

add_action('woocommerce_checkout_after_customer_details', 'cargo_pifour_woocommerce_checkout_after_customer_details', 999);
if (!function_exists('cargo_pifour_woocommerce_checkout_after_customer_details')) {
    function cargo_pifour_woocommerce_checkout_after_customer_details()
    {
        echo '</div>';
    }
}
add_action('woocommerce_checkout_before_order_review', 'cargo_pifour_woocommerce_checkout_before_order_review', 999);
if (!function_exists('cargo_pifour_woocommerce_checkout_before_order_review')) {
    function cargo_pifour_woocommerce_checkout_before_order_review()
    {
        echo '<div class="col-sx-12 col-sm-12 col-md-6">';
    }
}

add_action('woocommerce_checkout_after_order_review', 'cargo_pifour_woocommerce_checkout_after_order_review', 0);
if (!function_exists('cargo_pifour_woocommerce_checkout_after_order_review')) {
    function cargo_pifour_woocommerce_checkout_after_order_review()
    {
        echo '</div></div>';
    }
}

/**
 * Remove field label
 * add_filter( 'woocommerce_form_field_args' , 'cargo_pifour_override_woocommerce_form_field' );
 */
add_filter( 'woocommerce_form_field_args' , 'cargo_pifour_override_woocommerce_form_field' );
function cargo_pifour_override_woocommerce_form_field($args)
{
    $args['label'] = false;
    return $args;
}

/* Overide checkout field */
function cargo_pifour_override_checkout_fields( $fields ) {
    $fields['billing']['billing_first_name']['placeholder'] = esc_html__('First Name *','cargo-pifour');
    $fields['billing']['billing_last_name']['placeholder'] = esc_html__('Last Name *','cargo-pifour');
    $fields['billing']['billing_company']['placeholder'] = esc_html__('Company Name','cargo-pifour');
    $fields['billing']['billing_email']['placeholder'] = esc_html__('Email Address *','cargo-pifour');
    $fields['billing']['billing_phone']['placeholder'] = esc_html__('Phone *','cargo-pifour');
    $fields['billing']['billing_city']['placeholder'] = esc_html__('Town / City *','cargo-pifour');
    $fields['billing']['billing_postcode']['placeholder'] = esc_html__('Postcode *','cargo-pifour');
    $fields['billing']['billing_state']['placeholder'] = esc_html__('State *','cargo-pifour');
    $fields['billing']['billing_country']['placeholder'] = esc_html__('Country *','cargo-pifour');

    $fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('First Name *','cargo-pifour');
    $fields['shipping']['shipping_last_name']['placeholder'] = esc_html__('Last Name *','cargo-pifour');
    $fields['shipping']['shipping_company']['placeholder'] = esc_html__('Company Name','cargo-pifour');
    $fields['shipping']['shipping_city']['placeholder'] = esc_html__('Town / City *','cargo-pifour');
    $fields['shipping']['shipping_postcode']['placeholder'] = esc_html__('Postcode *','cargo-pifour');
    $fields['shipping']['shipping_state']['placeholder'] = esc_html__('State *','cargo-pifour');
    $fields['shipping']['shipping_country']['placeholder'] = esc_html__('Country *','cargo-pifour');
    
    $fields['account']['account_username']['placeholder'] = esc_html__('Username or email *','cargo-pifour');
    $fields['account']['account_password']['placeholder'] = esc_html__('Password *','cargo-pifour');
    $fields['account']['account_password-2']['placeholder'] = esc_html__('Retype Password *','cargo-pifour');

    $fields['order']['order_comments']['placeholder'] = esc_html__('Order Notes','cargo-pifour');

    /* Add Email/ Phone on Shipping fields*/
    $fields['shipping']['shipping_email'] = array(
		'label'     	=> esc_html__('Email Address', 'cargo-pifour'),
		'placeholder'   => _x('Email Address', 'placeholder', 'cargo-pifour'),
		'required'  	=> false,
		'class'     	=> array('form-row-first'),
		'clear'     	=> false
	);
    $fields['shipping']['shipping_phone'] = array(
		'label'     	=> esc_html__('Phone', 'cargo-pifour'),
		'placeholder'   => _x('Phone', 'placeholder', 'cargo-pifour'),
		'required'  	=> false,
		'class'     	=> array('form-row-last'),
		'clear'     	=> true,
		'order'			=> '6'
	);

    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'cargo_pifour_override_checkout_fields' );


