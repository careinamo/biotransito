<?php
vc_map(array(
    'name' => 'CMS Client Carousel',
    'base' => 'cms_client_carousel',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    'description' => esc_html__('Add clients testimonial', 'cargo-pifour'),
    'params' => array(
        array(
            "type"       => "checkbox",
            "class"      => "",
            "heading"    => esc_html__("Border Image", 'cargo-pifour'),
            "param_name" => "border_image",
            'value' => array(
            'Yes' => true
            ),
            'std' => false,
        ),
        array(
            'type'          => 'param_group',
            'heading'       => esc_html__( 'Add your Client', 'cargo-pifour' ),
            'param_name'    => 'values',
            'params' => array(
                array(
                    'type'          => 'attach_image',
                    'heading'       => esc_html__( 'Author Image', 'cargo-pifour' ),
                    'param_name'    => 'client_image',
                    'value'         => ''
                ),
                array(
                    "type" => "vc_link",
                    "heading" => esc_html__("URL (Link)",'cargo-pifour'),
                    "param_name" => "link",
                    "value" => "",
                ),
            ),
            'group' => esc_html__('Client Item','cargo-pifour')
        ),
        /* Carousel Settings */
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('XSmall Devices','cargo-pifour'),
            'param_name'        => 'xsmall_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Small Devices','cargo-pifour'),
            'param_name'        => 'small_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Medium Devices','cargo-pifour'),
            'param_name'        => 'medium_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__('Large Devices','cargo-pifour'),
            'param_name'        => 'large_items',
            'edit_field_class'  => 'vc_col-sm-3 vc_carousel_item',
            'value'             => array(1,2,3,4,5,6),
            'std'               => 1,
            'group'             => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Margin Items','cargo-pifour'),
            'param_name'    => 'margin',
            'value'         => '30',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Loop Items','cargo-pifour'),
            'param_name'    => 'loop',
            'std'           => 'false',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Mouse Drag','cargo-pifour'),
            'param_name'    => 'mousedrag',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Pause On Hover','cargo-pifour'),
            'param_name'    => 'autoplayhoverpause',
            'std'           => 'true',
            'dependency'    => array(
                'element'   =>'autoplay',
                'value'     => 'true'
                ),
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Show Next/Preview','cargo-pifour'),
            'param_name'    => 'nav',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Show Dots','cargo-pifour'),
            'param_name'    => 'dots',
            'std'           => 'false',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Auto Play','cargo-pifour'),
            'param_name'    => 'autoplay',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Auto Play TimeOut','cargo-pifour'),
            'param_name'    => 'autoplaytimeout',
            'value'         => '2000',
            'dependency'    => array(
                'element'   => 'autoplay',
                'value'     => 'true'
            ),
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Auto Height','cargo-pifour'),
            'param_name'    => 'autoheight',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            'type'          => 'textfield',
            'heading'       => esc_html__('Smart Speed','cargo-pifour'),
            'param_name'    => 'smartspeed',
            'value'         => '1000',
            'description'   => esc_html__('Speed scroll of each item','cargo-pifour'),
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),  
    )
));

global $cms_carousel;
$cms_carousel = array();
class WPBakeryShortCode_cms_client_carousel extends CmsShortCode
{
    protected function content($atts, $content = null){
        $atts_extra = shortcode_atts(array(
            'xsmall_items'          => 1,
            'small_items'           => 1,
            'medium_items'          => 1,
            'large_items'           => 1,
            'margin'                => 30,
            'loop'                  => 'false',
            'mousedrag'             => 'true',
            'nav'                   => 'true',
            'dots'                  => 'false',
            'autoplay'              => 'true',
            'autoplaytimeout'       => '2000',
            'smartspeed'            => '1000',
            'autoplayhoverpause'    => 'true',
            'autoheight'            => 'true',
        ), $atts);
        $atts = array_merge($atts_extra,$atts);
        global $cms_carousel;
        
        wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.min.css','','2.2.1','all');
        wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.2.1',true);
        wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);
        $html_id = cmsHtmlID('cms-testimonial-carousel');
        
        $atts['autoplaytimeout'] = isset($atts['autoplaytimeout']) ? (int)$atts['autoplaytimeout'] : 2000;
        $atts['smartspeed']      = isset($atts['smartspeed']) ? (int)$atts['smartspeed'] : 1000; 
 
        $cms_carousel[$html_id]     = array(
            'margin'                => $atts['margin'],
            'loop'                  => $atts['loop'],
            'mouseDrag'             => $atts['mousedrag'],
            'nav'                   => $atts['nav'],
            'dots'                  => $atts['dots'],
            'autoplay'              => $atts['autoplay'],
            'autoplayTimeout'       => $atts['autoplaytimeout'],
            'smartSpeed'            => $atts['smartspeed'],
            'autoplayHoverPause'    => $atts['autoplayhoverpause'],
            'navText'               => array('<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'),
            'autoHeight'            => $atts['autoheight'],
            'responsive'    => array(
                0       => array(
                    'items' => (int)$atts['xsmall_items'],
                ),
                768     => array(
                    'items' => (int)$atts['small_items'],
                ),
                992     => array(
                    'items' => (int)$atts['medium_items'],
                ),
                1200    => array(
                    'items' => (int)$atts['large_items'],
                )
            )
        );
        wp_localize_script('owl-carousel-cms', 'cmscarousel', $cms_carousel);
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}
?>