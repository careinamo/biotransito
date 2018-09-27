<?php
/**
 * get theme option
 */
function cargo_pifour_get_theme_option(){
    global $opt_theme_options, $opt_meta_options;

    return $opt_theme_options;
}
 
/**
 * get meta option
 */
function cargo_pifour_get_meta_option(){
     global $opt_meta_options;
     return $opt_meta_options;
}

/**
 * @param $pr1_package_number Package number
 * @param $atts Shortcode attributes
 * @param $pricing_lists Pricing list
 */
function wp_hosthubs_build_pricing_data($heading = array('heading' => '', 'subheading' => '', 'options' => array()), $pr1_package_number, $atts, $pricing_lists)
{
    $col_collection = array(
        'heading' => $heading
    );

    for ($i = 1; $i <= intval($pr1_package_number); $i++) {
        $col_collection[$i] = array(
            'heading'    => $atts['pr1_heading_' . $i],
            'currency'   => $atts['pr1_price_currency_' . $i],
            'value_type' => '',
            'values'     => array()
        );
    }

    foreach ($pricing_lists as $key => $row) {
            foreach ($col_collection as $param_name => $value_param_name) {
                if ($param_name == 'heading' && !empty($row['pr1_param_name'])) {
                    $col_collection['heading']['options'][] = $row['pr1_param_name'];

                    if($key == count($pricing_lists) - 1) $col_collection['heading']['options']['end_row'] = '';

                } else {
                    $prefix = ($row['value_type'] == 'text') ? 'text' : 'checkbox';

                    $filtered = array_intersect_key($row, array_flip(preg_grep('/^.+\_' . $prefix . '\_' . $param_name . '/', array_keys($row))));

                    reset($filtered);
                    $first_key = key($filtered);

                    $filtered['value'] = !empty($filtered[$first_key]) ? $filtered[$first_key]: '';
                    unset($filtered[$first_key]);
                    $filtered['value_type'] = $prefix;
                    $col_collection[$param_name]['values'][] = $filtered;

                    if($key == count($pricing_lists) - 1) {
                        $link = (isset($atts["pr1_url_{$param_name}"])) ? $atts["pr1_url_{$param_name}"] : '';
                        $col_collection[$param_name]['values']['end_row'] = $link;
                    }
                }
            }

    }


    return $col_collection;
}

/**
 * get header top layout.
 */
function cargo_pifour_header_top(){
    global $opt_theme_options, $opt_meta_options;
    if(!class_exists('EF4Framework') || ( class_exists('EF4Framework') && empty($opt_theme_options['header_top_layout']))){ 
        get_template_part('inc/header/headertop', 'layout1');
        return;
    }
    
    if(is_page() && isset($opt_meta_options['enable_header_top']))
            $opt_theme_options['enable_header_top'] = $opt_meta_options['enable_header_top'];
     
    if ( isset($opt_theme_options['enable_header_top']) && $opt_theme_options['enable_header_top'] == 1 ){
        if(is_page() && !empty($opt_meta_options['header_top_layout']))
            $opt_theme_options['header_top_layout'] = $opt_meta_options['header_top_layout'];
    
        get_template_part('inc/header/headertop', $opt_theme_options['header_top_layout']);
    }else{
        return;
    }
}

/**
 * get header layout.
 */
function cargo_pifour_header(){
    global $opt_theme_options, $opt_meta_options;

    if(empty($opt_theme_options)){
        get_template_part('inc/header/header', 'default');
        return;
    }

    if(is_page() && !empty($opt_meta_options['header_layout']))
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
    /* load custom header template. */
    get_template_part('inc/header/header', $opt_theme_options['header_layout']);
}

/**
 * get theme logo.
 */
function cargo_pifour_header_logo(){
    global $opt_theme_options;

    $has_sticky_logo =  !empty($opt_theme_options['sticky_logo']['url']) ? 'has-sticky-logo' : '';
    echo '<div class="main_logo '.esc_attr($has_sticky_logo).'">';

    if(!empty($opt_theme_options['main_logo']['url'])) {
        echo '<a class="main-logo" href="' . esc_url(home_url('/')) . '"><img alt="' .  get_bloginfo( "name" ) . '" src="' . esc_url($opt_theme_options['main_logo']['url']) . '"></a>';
       
    }else {
        echo '<h3 class="site-title"><a href="' . esc_url( home_url( '/' )) . '" rel="home">' . get_bloginfo( "name" ) . '</a></h3>';
        echo '<p class="site-description">' . get_bloginfo( "description" ) . '</p>';
    }

    echo '</div>';
}

/**
 * get header layout class
 */
function cargo_pifour_header_layout_class($class = ''){
    global $opt_theme_options,$opt_meta_options;
      
    if(empty($opt_theme_options)){
        echo esc_attr($class);
        return;
    }
    
    if(is_page() && !empty($opt_meta_options['header_layout']))
        $opt_theme_options['header_layout'] = $opt_meta_options['header_layout'];
        
    if(!empty($opt_theme_options['header_layout']))
        $class = 'header-'.$opt_theme_options['header_layout'];
 
    echo esc_attr($class);
}

function cargo_pifour_archive_sidebar(){
    global $opt_theme_options;

    $_sidebar = 'right';

    if(isset($opt_theme_options['archive_layout']))
        $_sidebar = $opt_theme_options['archive_layout'];
        
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'full' )
        $_sidebar = 'full';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'left' )
        $_sidebar = 'left';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'right' )
        $_sidebar = 'right';
        
    return 'is-sidebar-' . esc_attr($_sidebar);
}

function cargo_pifour_archive_class(){
    global $opt_theme_options;

    $_class = "col-xs-12 col-sm-12 col-md-8 col-lg-8";

    if(isset($opt_theme_options['archive_layout']) && $opt_theme_options['archive_layout'] == 'full')
        $_class = "col-xs-12 col-sm-12 col-md-10 col-md-push-1";
        
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'full' )
        $_class = "col-xs-12 col-sm-12 col-md-10 col-md-push-1";
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'left' )
        $_class = "col-xs-12 col-sm-12 col-md-8 col-lg-8";
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'right' )
        $_class = "col-xs-12 col-sm-12 col-md-8 col-lg-8";
        
        
    echo esc_attr($_class);
}





/**
 * get header class.
 */
function cargo_pifour_header_class($class = ''){
    global $opt_theme_options;

    if(empty($opt_theme_options)){
        echo esc_attr($class);
        return;
    }

    if($opt_theme_options['menu_sticky'])
        $class .= ' sticky-desktop';

    echo esc_attr($class);
}

function cargo_pifour_footer_class($class = ''){
    global $opt_theme_options;
    if(isset($opt_theme_options['footer_bottom_center']) && $opt_theme_options['footer_bottom_center'])
        $class .= ' col-md-12 col-sm-12 col-xs-12 text-center';
    else
        $class .= ' col-md-6 col-sm-6 col-xs-12';

    echo esc_attr($class);
}
/**
 * main navigation.
 */
function cargo_pifour_header_navigation(){

    global $opt_meta_options;

    $attr = array(
        'menu_class' => 'nav-menu menu-main-menu',
        'theme_location' => 'primary'
    );

    if(is_page() && !empty($opt_meta_options['header_menu']))
        $attr['menu'] = $opt_meta_options['header_menu'];

    /* enable mega menu. */
    if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }

    $locations = get_nav_menu_locations();

    if(empty($locations[ 'primary' ]))
        return;

    /* main nav. */
    wp_nav_menu( $attr );
}

/**
 * get page title layout
 */
function cargo_pifour_page_title(){
     global $opt_theme_options, $opt_meta_options;
    
    if(is_404()) return;
    /* default. */
    $layout = '2';

    /* get theme options */
    if(isset($opt_theme_options['page_title_layout']))
        $layout = $opt_theme_options['page_title_layout'];
     
     /* custom layout from page. */
    if(is_page() && !empty($opt_meta_options['page_title_layout']))
        $layout = $opt_meta_options['page_title_layout'];

    if(isset($opt_meta_options['page_title_enable']) && $opt_meta_options['page_title_enable']=='0'){
        return;
    }
     
    /* custom layout from page. */
      
    ?>
    <div id="page-title" class="page-title <?php echo 'layout-'.esc_attr($layout);?>">
        <div class="bg-overlay"></div>
        <div class="container">
        <div class="row">
        <?php switch ($layout){
            case '2':
                ?>
                <div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2><?php cargo_pifour_get_page_title(); ?></h2></div>
                <div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php cargo_pifour_get_bread_crumb(); ?></div>
                <?php
                break;
            case '3':
                ?>
                <div id="breadcrumb-text" class="breadcrumb-text  col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php cargo_pifour_get_bread_crumb(); ?></div>
                <div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2><?php cargo_pifour_get_page_title(); ?></h2></div>
                <?php
                break;
             case '4':
                ?>
                <div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-6 col-lg-6"><h2><?php cargo_pifour_get_page_title(); ?></h2></div>
                <div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-6 col-lg-6"><?php cargo_pifour_get_bread_crumb(); ?></div>
                <?php
                break;
            case '5':
                ?>
                <div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-6 col-lg-6"><?php cargo_pifour_get_bread_crumb(); ?></div>
                <div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-6 col-lg-6"><h2><?php cargo_pifour_get_page_title(); ?></h2></div>
                <?php
                break;
            case '6':
                ?>
                <div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2><?php cargo_pifour_get_page_title(); ?></h2></div>
                <?php
                break;
            case '7':
                ?>
                <div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-6 col-lg-6"><?php cargo_pifour_get_bread_crumb(); ?></div>
                <?php
                break;
        } ?>
        </div>
        </div>
    </div><!-- #page-title -->
    <?php
}

/**
 * page title
 */
function cargo_pifour_get_page_title(){

    global $opt_meta_options;

    if (!is_archive()){
        /* page. */
        if(is_page()) :
            /* custom title. */
            if(!empty($opt_meta_options['page_title_text'])):
                echo esc_html($opt_meta_options['page_title_text']);
            else :
                the_title();
            endif;
        elseif (is_front_page()):
            esc_html_e('Blog', 'cargo-pifour');
        /* search */
        elseif (is_search()):
            printf( esc_html__( 'Search Results for: %s', 'cargo-pifour' ), '<span>' . get_search_query() . '</span>' );
        /* 404 */
        elseif (is_404()):
            esc_html_e( '404', 'cargo-pifour');
        /* other */
        else :
            the_title();
        endif;
    } else {
        /* category. */
        if ( is_category() ) :
            single_cat_title();
        elseif ( is_tag() ) :
            /* tag. */
            single_tag_title();
        /* author. */
        elseif ( is_author() ) :
            printf( esc_html__( 'Author: %s', 'cargo-pifour' ), '<span class="vcard">' . get_the_author() . '</span>' );
        /* date */
        elseif ( is_day() ) :
            printf( esc_html__( 'Day: %s', 'cargo-pifour' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
            printf( esc_html__( 'Month: %s', 'cargo-pifour' ), '<span>' . get_the_date() . '</span>' );
        elseif ( is_year() ) :
            printf( esc_html__( 'Year: %s', 'cargo-pifour' ), '<span>' . get_the_date() . '</span>' );
        /* post format */
        elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
            esc_html_e( 'Asides', 'cargo-pifour' );
        elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
            esc_html_e( 'Galleries', 'cargo-pifour');
        elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
            esc_html_e( 'Images', 'cargo-pifour');
        elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
            esc_html_e( 'Videos', 'cargo-pifour' );
        elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
            esc_html_e( 'Quotes', 'cargo-pifour' );
        elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
            esc_html_e( 'Links', 'cargo-pifour' );
        elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
            esc_html_e( 'Statuses', 'cargo-pifour' );
        elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
            esc_html_e( 'Audios', 'cargo-pifour' );
        elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
            esc_html_e( 'Chats', 'cargo-pifour' );
        /* woocommerce */
        elseif (function_exists('is_woocommerce') && is_woocommerce()):
            woocommerce_page_title();
        else :
            /* other */
            the_title();
        endif;
    }
}

/**
 * Breadcrumb NavXT
 *
 * @since 1.0.0
 */
function cargo_pifour_get_bread_crumb() {

    if(!function_exists('bcn_display')) return;

    bcn_display();
}

function cargo_pifour_my_search_form( $form ) {
    $form = '<form method="get" action="'. esc_url( home_url( '/'  ) ).'" class="searchform search-form">
            <div class="form-group">
                <input type="text" value="' . get_search_query() . '" name="s" class="form-control" placeholder="'.esc_html__("Search...",'cargo-pifour').'" id="modal-search-input">
            </div>
            <button type="submit" class="theme_button"><i class="fa fa-search"></i></button>
             ';
         $form .='</form>';
    return $form;
}
add_filter( 'get_search_form', 'cargo_pifour_my_search_form' );

/**
 * Display an optional post detail.
 */
function cargo_pifour_post_detail(){
    global $opt_theme_options;
    $single_year  = get_the_time('Y'); 
    $single_month = get_the_time('m'); 
    $single_day   = get_the_time('d'); 
    ?>
    <ul class="single_detail">
        <?php if(!isset($opt_theme_options['single_date']) || (isset($opt_theme_options['single_date']) && $opt_theme_options['single_date'])): ?>
            <li class="detail-date"><a href="<?php echo get_day_link( $single_year, $single_month, $single_day); ?>"><?php echo get_the_date(); ?></a></li>
        <?php endif; ?>

        <?php if(has_category() && (!isset($opt_theme_options['single_categories']) || (isset($opt_theme_options['single_categories']) && $opt_theme_options['single_categories']))): ?>

            <li class="detail-terms"><?php printf(('<span> %1$s</span>'),get_the_category_list( ', ' ));  ?></li>

        <?php endif; ?>

        <?php if(!isset($opt_theme_options['single_comment']) || (isset($opt_theme_options['single_comment']) && $opt_theme_options['single_comment'])): ?>

            <li class="detail-comment"><a href="<?php the_permalink(); ?>"><?php echo esc_html(comments_number('0','1','%')); ?> <?php esc_html_e('Comments', 'cargo-pifour'); ?></a></li>

        <?php endif; ?>

        <?php if(has_tag() && (!isset($opt_theme_options['single_tag']) || (isset($opt_theme_options['single_tag']) && $opt_theme_options['single_tag']))): ?>

            <li class="detail-tags"><span class="lbl-tags"><?php echo esc_html__('Tags: ','cargo-pifour');?></span><?php the_tags('', ', ' ); ?></li>

        <?php endif; ?>


    </ul>
    <?php
}

/**
 * Display an optional post video.
 */
function cargo_pifour_post_video() {

    global $opt_meta_options, $wp_embed;

    /* no video. */
    if(empty($opt_meta_options['opt-video-type'])) {
        cargo_pifour_post_thumbnail();
        return;
    }

    if($opt_meta_options['opt-video-type'] == 'local' && !empty($opt_meta_options['otp-video-local']['id'])){

        $video = wp_get_attachment_metadata($opt_meta_options['otp-video-local']['id']);

        echo do_shortcode('[video width="'.esc_attr($opt_meta_options['otp-video-local']['width']).'" height="'.esc_attr($opt_meta_options['otp-video-local']['height']).'" '.$video['fileformat'].'="'.esc_url($opt_meta_options['otp-video-local']['url']).'" poster="'.esc_url($opt_meta_options['otp-video-thumb']['url']).'"][/video]');

    } elseif($opt_meta_options['opt-video-type'] == 'youtube' && !empty($opt_meta_options['opt-video-youtube'])) {

        echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($opt_meta_options['opt-video-youtube']).'[/embed]'));

    } elseif($opt_meta_options['opt-video-type'] == 'vimeo' && !empty($opt_meta_options['opt-video-vimeo'])) {

        echo do_shortcode($wp_embed->run_shortcode('[embed]'.esc_url($opt_meta_options['opt-video-vimeo']).'[/embed]'));

    }
}

/**
 * Display an optional post audio.
 */
function cargo_pifour_post_audio() {
    global $opt_meta_options;

    /* no audio. */
    if(empty($opt_meta_options['otp-audio']['id'])) {
        cargo_pifour_post_thumbnail();
        return;
    }

    $audio = wp_get_attachment_metadata($opt_meta_options['otp-audio']['id']);

    echo do_shortcode('[audio '.$audio['fileformat'].'="'.esc_url($opt_meta_options['otp-audio']['url']).'"][/audio]');
}


/**
 * Display an optional post quote.
 */
function cargo_pifour_post_quote() {
    global $opt_meta_options;
 
    $style ='';
    if(has_post_thumbnail()){
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        $image_url = esc_url($image[0]);
        $style = 'style="background-image:url('.$image_url.'); background-size: cover;background-position: center;"';
    }

    if(empty($opt_meta_options['opt-quote-content'])){
        cargo_pifour_post_thumbnail();
        return;
    }

    $opt_meta_options['opt-quote-title'] = !empty($opt_meta_options['opt-quote-title']) ? '<p>'.esc_html($opt_meta_options['opt-quote-title']).'</p>' : '' ;
    $quote_sub_title = !empty($opt_meta_options['opt-quote-sub-title']) ? '<p>'.esc_html($opt_meta_options['opt-quote-sub-title']).'</p>' : '' ;
?>
    <div class="entry-wrap" <?php echo ''.$style;?>>
        <div class="entry-inside">
            <?php  
                echo '<blockquote class ="quote-meta">'.'<p>'.esc_html($opt_meta_options['opt-quote-content']).'</p class="quote-title">'.wp_kses_post($opt_meta_options['opt-quote-title']).wp_kses_post($quote_sub_title).'</blockquote>';
                
            ?>
        </div>
    
    </div>
<?php  
}


function cargo_pifour_archive_link(){
   preg_match('/\<a(.*)\>(.*)\<\/a\>/', get_the_content(), $link);
    if(!empty($link[0])){

       echo wp_kses($link[0],true);
       
    } else {     
        return ;
    }
}
function cargo_pifour_post_link() {
    global $opt_meta_options;
 
    $style ='';
    if(has_post_thumbnail()){
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        $image_url = esc_url($image[0]);
        $style = 'style="background-image:url('.$image_url.'); background-size: cover;background-position: center;"';
    }

    if(empty($opt_meta_options['opt-link-content'])){
        cargo_pifour_post_thumbnail();
        return;
    }
?>
    <div class="entry-wrap" <?php echo ''.$style;?>>
        <div class="entry-inside">
        <?php cargo_pifour_archive_link(); ?>
        </div>
    
    </div>
<?php  
}

/**
 * Display an optional post gallery.
 */
function cargo_pifour_post_gallery($size='large'){
    global $opt_theme_options, $opt_meta_options;

    /* no audio. */
    if(empty($opt_meta_options['opt-gallery'])) {
        cargo_pifour_post_thumbnail();
        return;
    }
    if(is_single()) $img_size = 'large';
    else $img_size = $size;
    $array_id = explode(",", $opt_meta_options['opt-gallery']);

    ?>
    <div class="post_gallery_wrap">
        <div id="carousel-post-gallery" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i = 0; ?>
                <?php foreach ($array_id as $image_id): ?>
                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, $img_size, false);
                    if($attachment_image[0] != ''):?>
                        <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                            <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                        </div>
                    <?php $i++; endif; ?>
                <?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#carousel-post-gallery" role="button" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-post-gallery" role="button" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
        </div>
        <?php
        if(is_single()){
            if(isset($opt_theme_options['single_triangular']) && $opt_theme_options['single_triangular']){
                echo '<div class="pafter">';
                if(!isset($opt_theme_options['single_sharing_icon']) || (isset($opt_theme_options['single_sharing_icon']) && $opt_theme_options['single_sharing_icon']))
                    cargo_pifour_post_sharing();
                echo '</div>';
            }
        }else{
            if(isset($opt_theme_options['archive_triangular']) && $opt_theme_options['archive_triangular']){
                echo '<div class="pafter">';
                if(!isset($opt_theme_options['archive_link_icon']) || (isset($opt_theme_options['archive_link_icon']) && $opt_theme_options['archive_link_icon']))
                    echo '<a class="bl-plink" href="'. get_the_permalink(). '" title="'. get_the_title() .'"><i class="flaticon-link"></i></a>';
                echo '</div>';
            }
        }
        ?>
    </div>
    <?php
}

function cargo_pifour_post_thumbnail($img_size='') {
     
    global $opt_theme_options;
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }
     
    $img_size = !empty($img_size) ? $img_size : 'large';
     the_post_thumbnail($img_size);
   
}

/**
 * Display an optional post status.
 */
function cargo_pifour_post_status() {
    global $opt_meta_options;

    if(empty($opt_meta_options['opt-status'])){
        return;
    }
    echo '<div class="media inline-block">';
        echo '<img src="'.esc_url($opt_meta_options['opt-status']['thumbnail']).'" alt="" class="round">';
    echo '</div>';
     
}

/**
 * Display social share in single footer.
 */
function cargo_pifour_post_sharing(){
    ?>
        <a class="bl-plink link-popup-share" href="javascript:void(0);" title="<?php echo esc_html__('Share','cargo-pifour') ?>"><i class="fa fa-share-alt"></i></a>
        <div class="entry-share">
            <a class="twitter" target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'cargo-pifour');?>:%20<?php echo strip_tags(get_the_title());?>%20-%20<?php the_permalink();?>"><i aria-hidden="true" class="fa fa-twitter"></i></a>
            <a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
            <a class="google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a>
            <a class="pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink());?>"><i class="fa fa-pinterest"></i></a>
        </div>
    <?php
}


/**
 * Article social share
 */
function cargo_pifour_post_detail_share() {
    global $opt_theme_options;
    $url = get_the_permalink();
    ?>  
        <?php if(isset($opt_theme_options['single_social_share']) && ($opt_theme_options['single_social_share'] == 1)): ?>
        
             <div class="entry-share">
                <ul class="social-share">
                    <li class="share-title">Share:</li>
                    <li><a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" title="Share This"><i aria-hidden="true" class="fa fa-facebook"></i></a></li>

                    <li><a href="https://twitter.com/home?status=<?php echo esc_html(str_replace(' ','%20','Check out this article'));?>:%20<?php echo strip_tags(str_replace(' ','%20',get_the_title()));?>%20-%20<?php the_permalink();?>"  target="blank" title="Share This"><i class="fa fa-twitter"></i></a></li>
                    
                    <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>"  target="blank" title="Share This"><i class="fa fa-google-plus"></i></a></li>

                    <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>"  target="blank" title="Share This"><i class="fa fa-pinterest"></i></a> </li>
                </ul>
            </div>
         <?php endif;
}
function cargo_pifour_product_sharing(){
    ?>
    <div class="product-sharing">
        <a class="twitter" target="_blank" href="https://twitter.com/home?status=<?php esc_html_e('Check out this article', 'cargo-pifour');?>:%20<?php echo strip_tags(get_the_title());?>%20-%20<?php the_permalink();?>"><i aria-hidden="true" class="fa fa-twitter"></i></a>
        <a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i aria-hidden="true" class="fa fa-facebook"></i></a>
        <a class="google" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i aria-hidden="true" class="fa fa-google-plus"></i></a>
        <a class="linkedin" title="<?php esc_html_e('Share this article to Linkedin','cargo-pifour'); ?>" target="_blank" href="https://linkedin.com/shareArticle?url=<?php the_permalink();?>"><i class="fa fa-linkedin"></i></a>
    </div>
    <?php
}

function cargo_pifour_post_author(){
    global $opt_theme_options;
     $desc = get_the_author_meta('description');    
    ?>
     <?php if(isset($opt_theme_options['single_author']) && ($opt_theme_options['single_author'] == 1)): ?>
        <?php if(!empty($desc)):?>
        <div class="author-meta">
            <div class=" display_table_md">
                <div class="col-avatar display_table_cell_md">
                    <div class="item-media">
                        <?php echo get_avatar(get_the_author_meta('ID'), 200); ?>
                    </div>
                </div>
                <div class=" display_table_cell_md">
                    <div class="item-content">
                        <h4><?php echo get_the_author(); ?></h4>
                        <p class="desc"><?php echo $desc; ?></p>
                    </div>
                </div>

            </div>
        </div>

    <?php endif; endif;
}
function cargo_pifour_post_sidebar(){
    global $opt_theme_options;

    $_sidebar = 'right';

    if(isset($opt_theme_options['single_layout']))
        $_sidebar = $opt_theme_options['single_layout'];
        
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'full' )
        $_sidebar = 'full';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'left' )
        $_sidebar = 'left';
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'right' )
        $_sidebar = 'right';
    return 'is-sidebar-' . esc_attr($_sidebar);
}

function cargo_pifour_post_class(){
    global $opt_theme_options;

    $_class = "col-xs-12 col-sm-12 col-md-8 col-lg-8";

    if(isset($opt_theme_options['single_layout']) && $opt_theme_options['single_layout'] == 'full')
        $_class = "col-xs-12 col-sm-12 col-md-10 col-md-push-1";
    if(isset($_GET['layout']) && trim($_GET['layout']) == 'full' )
        $_class = "col-xs-12 col-sm-12 col-md-10 col-md-push-1";
    

    echo esc_attr($_class);
}

/**
 * Display an optional archive detail.
 */
function cargo_pifour_archive_detail(){
    global $opt_theme_options;
    $archive_year  = get_the_time('Y'); 
    $archive_month = get_the_time('m'); 
    $archive_day   = get_the_time('d'); 
    ?>
    <ul class="archive_detail">

        <?php if(!isset($opt_theme_options['archive_author']) || (isset($opt_theme_options['archive_author']) && $opt_theme_options['archive_author'])): ?>

            <li class="detail-author"><?php echo esc_html__('by','cargo-pifour'); ?> <?php the_author_posts_link(); ?></li>

        <?php endif; ?>

        <?php if(!isset($opt_theme_options['archive_date']) || (isset($opt_theme_options['archive_date']) && $opt_theme_options['archive_date'])): ?>
            <li class="detail-date"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a></li>
        <?php endif; ?>

        <?php if(has_category() && (!isset($opt_theme_options['archive_categories']) || (isset($opt_theme_options['archive_categories']) && $opt_theme_options['archive_categories']))): ?>

            <li class="detail-terms"><?php printf(('<span> %1$s</span>'),get_the_category_list( ', ' ));  ?></li>

        <?php endif; ?>

        <?php if(!isset($opt_theme_options['archive_comment']) || (isset($opt_theme_options['archive_comment']) && $opt_theme_options['archive_comment'])): ?>

            <li class="detail-comment"><a href="<?php the_permalink(); ?>"><?php echo esc_html(comments_number('0','1','%')); ?> <?php esc_html_e('Comments', 'cargo-pifour'); ?></a></li>

        <?php endif; ?>

        <?php if(has_tag() && (!isset($opt_theme_options['archive_tag']) || (isset($opt_theme_options['archive_tag']) && $opt_theme_options['archive_tag']))): ?>

            <li class="detail-tags"><span class="lbl"><?php echo esc_html__('Tags: ','cargo-pifour');?></span><?php the_tags('', ', ' ); ?></li>

        <?php endif; ?>

    </ul>
    <?php
}

function cargo_pifour_archive_detail1(){
    global $opt_theme_options;
    $archive_year  = get_the_time('Y'); 
    $archive_month = get_the_time('m'); 
    $archive_day   = get_the_time('d'); 
    ?>
    <ul class="archive_detail">

        <?php if(!isset($opt_theme_options['archive_date']) || (isset($opt_theme_options['archive_date']) && $opt_theme_options['archive_date'])): ?>
            <li class="detail-date"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a></li>
        <?php endif; ?>
        
        <?php if(!isset($opt_theme_options['archive_author']) || (isset($opt_theme_options['archive_author']) && $opt_theme_options['archive_author'])): ?>

            <li class="detail-author"><?php echo esc_html__('by','cargo-pifour'); ?> <?php the_author_posts_link(); ?></li>

        <?php endif; ?>

    </ul>
    <?php
}

add_filter( 'body_class', 'cargo_pifour_body_extra_class' );
function cargo_pifour_body_extra_class( $classes ) {
    global $opt_theme_options,$opt_meta_options;
    
    if( !empty($opt_theme_options['general_layout']) && $opt_theme_options['general_layout'] == '1' ){
        $classes[] = 'boxed-layout';
    }  
    if(is_page() && isset($opt_meta_options['opt_general_layout']) && $opt_meta_options['opt_general_layout'] == '1')
        $classes[] = 'boxed-layout';
        
    return $classes;
     
}
function cargo_pifour_general_class(){
    global $opt_theme_options,$opt_meta_options;
    $classes = '';
    if( !empty($opt_theme_options['general_layout']) && $opt_theme_options['general_layout'] == '1' ){
        $classes = 'cs-boxed';
    }  
    if(is_page() && isset($opt_meta_options['opt_general_layout']) && $opt_meta_options['opt_general_layout'] == '1')
        $classes = 'cs-boxed';
    
    echo $classes;
}  

/**
 * Show main sidebar
 **/
function cargo_pifour_main_sidebar(){
    if(class_exists('Woocommerce')){
        if ( is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_product() ) {
            return;
        }
    }
        
    if ( is_active_sidebar( 'sidebar-1' ) ){
        echo '<div class="sidebar col-xs-12 col-sm-12 col-md-4 col-lg-4 wow fadeInUp">';
            echo '<div  id="widget-area" class="widget-area" role="complementary">';
                dynamic_sidebar( 'sidebar-1' ); 
            echo '</div>';
        echo '</div>';
    }
} 

/**
 * footer layout
 */
function cargo_pifour_footer_top(){
    global $opt_theme_options;

    /* footer-top */
    if(empty($opt_theme_options['footer-top-column']))
        return;

    $_class = "";
 if(isset($opt_theme_options['enable_footer_top']) && $opt_theme_options['enable_footer_top']== '1'): ?>
    <div id="footer-top" class="footer-top">
    <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">          
        <?php 
    switch ($opt_theme_options['footer-top-column']){
        case '1':
            $_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
            break;
        case '2':
            $_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
            break;
        case '3':
            $_class = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
            break;
        case '4':
            $_class = 'col-lg-3 col-md-3 col-sm-12 col-xs-12';
            break;
    }

    for($i = 1 ; $i <= $opt_theme_options['footer-top-column'] ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-top-' . $i ) ){
            echo '<div class="' . esc_html($_class) . '">';
                dynamic_sidebar( 'sidebar-footer-top-' . $i );
            echo "</div>";
        }
    }
    ?>
            </div>
        </div>
    </div><!-- #footer-top -->
    <?php  endif; 
}


function cargo_pifour_footer_back_to_top(){
    global $opt_theme_options;

    $_back_to_top = true;

    if(isset($opt_theme_options['general_back_to_top']))
        $_back_to_top = $opt_theme_options['general_back_to_top'];

    if($_back_to_top)
        echo '<div class="ef3-back-to-top"><i class="fa fa-angle-up"></i></div>';
}

/**
 * Change number product to show
 */
add_action('after_setup_theme','cargo_pifour_update_woo_number_item_in_page');
function cargo_pifour_update_woo_number_item_in_page(){
    global $opt_theme_options;
    if(class_exists('EF4Framework')){
        if(class_exists( 'Woocommerce' )){
            $number_product = ( !empty($opt_theme_options['shop_products']) ) ? $opt_theme_options['shop_products'] : 8; 
            add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$number_product.';' ), 20 );
        }
    }
}
