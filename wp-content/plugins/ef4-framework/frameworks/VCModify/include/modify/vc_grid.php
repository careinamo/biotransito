<?php
/**
 * Created by FsFlex.
 * User: VH
 * Date: 9/18/2017
 * Time: 5:18 PM
 */
add_action('vc_plugins_loaded',function (){
    VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Basic_Grid' );
    require_once vc_path_dir( 'PARAMS_DIR', 'vc_grid_item/class-vc-grid-item.php' );
    require_once 'vc_grid/vc_base_grid_modify.php';
    require_once 'vc_grid/vc_masonry_grid_modify.php';
    require_once 'vc_grid/vc_media_grid_modify.php';
    require_once 'vc_grid/vc_masonry_media_grid_modify.php';
    EF4VCGrid::instance();
});
add_action( 'wp_ajax_vc_get_vc_grid_data', 'ef4_vc_modify_getGridDataForAjax',9 );
add_action( 'wp_ajax_nopriv_vc_get_vc_grid_data', 'ef4_vc_modify_getGridDataForAjax',9 );
$ef4_vc_grid_shortcode_data = false;
function ef4_vc_modify_getGridDataForAjax() {
    global $ef4_vc_grid_shortcode_data;
    $tag = str_replace( '.', '', vc_request_param( 'tag' ) );
    $allowed = true;// apply_filters( 'vc_grid_get_grid_data_access', vc_verify_public_nonce() && $tag, $tag );
    if ( $allowed ) {
        $ef4_vc_grid_shortcode_data = isset($_REQUEST['data']) ? $_REQUEST['data'] : false;
        $shortcode_fishbone = visual_composer()->getShortCode( $tag );
        if ( is_object( $shortcode_fishbone ) && vc_get_shortcode( $tag ) ) {
            /** @var $vc_grid WPBakeryShortcode_Vc_Basic_Grid */
            $vc_grid = $shortcode_fishbone->shortcodeClass();//new EF4_WPBakeryShortCode_VC_Basic_Grid();//$shortcode_fishbone->shortcodeClass();
            switch (get_class($vc_grid))
            {
                case 'WPBakeryShortCode_VC_Basic_Grid':
                    $vc_grid = new EF4_WPBakeryShortCode_VC_Basic_Grid();
                    break;
                case 'WPBakeryShortCode_VC_Masonry_Grid':
                    $vc_grid = new EF4_WPBakeryShortCode_VC_Masonry_Grid();
                    break;
                case 'WPBakeryShortCode_VC_Masonry_Media_Grid':
                    $vc_grid = new EF4_WPBakeryShortCode_VC_Masonry_Media_Grid( array( 'base' => 'vc_basic_grid' ) );
                    break;
                case 'WPBakeryShortCode_VC_Media_Grid':
                    $vc_grid = new EF4_WPBakeryShortCode_VC_Media_Grid(array( 'base' => 'vc_basic_grid' ) );
                    break;
            }
            if ( method_exists( $vc_grid, 'isObjectPageable' ) && $vc_grid->isObjectPageable() && method_exists( $vc_grid, 'renderAjax' ) ) {
                echo $vc_grid->renderAjax( vc_request_param( 'data' ) );
                die();
            }
        }
    }
}
add_filter('vc_gitem_template_attribute_post_image_background_image_css','ef4_vc_grid_mix_background_css_size',11,2);
function ef4_vc_grid_mix_background_css_size($img_css,$data)
{
    global $ef4_vc_grid_mix_background_css_size;
    $raw_size = $data['data'];
    if(empty($raw_size))
        return $img_css;
    if(empty($ef4_vc_grid_mix_background_css_size))
        $ef4_vc_grid_mix_background_css_size = array();
    $raw_size = trim($raw_size,':,|');
    if(!key_exists($raw_size,$ef4_vc_grid_mix_background_css_size))
    {
        $size_map = explode(',',$raw_size);
        if(count($size_map)<2)
            $size_map = explode('|',$raw_size);
        $current_index = 0;
        if(count($size_map) < 2)
            return $img_css;
        $ef4_vc_grid_mix_background_css_size[$raw_size]= array(
            'current_index' => $current_index,
            'size_map'=>$size_map
        );
        $current_size = $size_map[$current_index];
    }
    else
    {
        $size_map = $ef4_vc_grid_mix_background_css_size[$raw_size]['size_map'];
        $current_index = $ef4_vc_grid_mix_background_css_size[$raw_size]['current_index'];
        $current_size = $size_map[$current_index];
    }
    $current_index++;
    if(empty($ef4_vc_grid_mix_background_css_size[$raw_size]['size_map'][$current_index]))
        $ef4_vc_grid_mix_background_css_size[$raw_size]['current_index'] = 0;
    else
        $ef4_vc_grid_mix_background_css_size[$raw_size]['current_index'] = $current_index;

    $new_datasend = $data;
    $new_datasend['data']= ':'.$current_size;
    $img_css = apply_filters('vc_gitem_template_attribute_post_image_background_image_css',$img_css,$new_datasend);
    return $img_css;
}
add_filter('vc_gitem_template_attribute_post_image_url','ef4_modify_vc_post_image_url',11,2);
function ef4_modify_vc_post_image_url($url,$data){
    global $ef4_vc_grid_mix_size;
    $raw_size = $data['data'];
    if(empty($raw_size))
        return $url;
    if(empty($ef4_vc_grid_mix_size))
        $ef4_vc_grid_mix_size = array();
    $raw_size = trim($raw_size,':,|');
    if(!key_exists($raw_size,$ef4_vc_grid_mix_size))
    {
        $size_map = explode(',',$raw_size);
        if(count($size_map)<2)
            $size_map = explode('|',$raw_size);
        $current_index = 0;
        if(count($size_map) < 2)
            return $url;
        $ef4_vc_grid_mix_size[$raw_size]= array(
            'current_index' => $current_index,
            'size_map'=>$size_map
        );
        $current_size = $size_map[$current_index];
    }
    else
    {
        $size_map = $ef4_vc_grid_mix_size[$raw_size]['size_map'];
        $current_index = $ef4_vc_grid_mix_size[$raw_size]['current_index'];
        $current_size = $size_map[$current_index];
    }
    $current_index++;
    if(empty($ef4_vc_grid_mix_size[$raw_size]['size_map'][$current_index]))
        $ef4_vc_grid_mix_size[$raw_size]['current_index'] = 0;
    else
        $ef4_vc_grid_mix_size[$raw_size]['current_index'] = $current_index;

    $new_datasend = $data;
    $new_datasend['data']= ':'.$current_size;
    $img = apply_filters('vc_gitem_template_attribute_post_image_url',$url,$new_datasend);
    return $img;
}
