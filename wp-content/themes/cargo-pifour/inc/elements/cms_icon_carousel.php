<?php
vc_map(array(
    'name' => 'CMS Icon Carousel',
    'base' => 'cms_icon_carousel',
    'icon' => 'cs_icon_for_vc',
    'category' => esc_html__('CmsSuperheroes Shortcodes', 'cargo-pifour'),
    'description' => esc_html__('Add icons', 'cargo-pifour'),
    'params' => array(
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Add your icon', 'cargo-pifour' ),
            'param_name' => 'values',
            'value' => urlencode( json_encode( array(
                array(
                    'values' => esc_html__( 'icon', 'cargo-pifour' ),
                ),
            ) ) ),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Icon Link",'cargo-pifour'),
                    "param_name" => "icon_link",
                ),
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Icon class (fa fa-facebook,... for Awesome Font)",'cargo-pifour'),
                    "param_name" => "icon_class",
                    "admin_label" => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Title",'cargo-pifour'),
                    "param_name" => "title",
                ),
                array(
                    "type" => "textarea",
                    "heading" => esc_html__("Description",'cargo-pifour'),
                    "param_name" => "desc",
                ),  
            ),
            'group' => esc_html__('Icon Item','cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("XSmall Devices",'cargo-pifour'),
            "param_name" => "xsmall_items",
            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
            "value" => array(1,2,3,4,5,6),
            "std" => 1,
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
    	array(
            "type" => "dropdown",
            "heading" => esc_html__("Small Devices",'cargo-pifour'),
            "param_name" => "small_items",
            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
            "value" => array(1,2,3,4,5,6),
            "std" => 2,
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Medium Devices",'cargo-pifour'),
            "param_name" => "medium_items",
            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
            "value" => array(1,2,3,4,5,6),
            "std" => 3,
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Large Devices",'cargo-pifour'),
            "param_name" => "large_items",
            "edit_field_class" => "vc_col-sm-3 vc_carousel_item",
            "value" => array(1,2,3,4,5,6),
           	"std" => 4,
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Margin Items",'cargo-pifour'),
            "param_name" => "margin",
            "value" => "20",
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Loop Items",'cargo-pifour'),
            "param_name" => "loop",
            "value" => array(
            	"True" => "true",
            	"False" => "false"
            	),
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
         
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Show Next/Preview','cargo-pifour'),
            'param_name'    => 'nav',
            'std'           => 'false',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        
        array(
            'type'          => 'checkbox',
            'heading'       => esc_html__('Show Dots','cargo-pifour'),
            'param_name'    => 'dots',
            'std'           => 'true',
            'group'         => esc_html__('Carousel Settings', 'cargo-pifour')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Auto Play",'cargo-pifour'),
            "param_name" => "autoplay",
            "value" => array(
            	"True" => "true",
            	"False" => "false"
            	),
            "group" => esc_html__("Carousel Settings", 'cargo-pifour')
        ),
         
        array(
            "type" => "cms_template",
            "param_name" => "cms_template",
            "shortcode" => "cms_icon_carousel",
            "admin_label" => true,
            "heading" => esc_html__("Shortcode Template",'cargo-pifour'),
            "group" => esc_html__("Template", 'cargo-pifour'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'cargo-pifour' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design Options', 'cargo-pifour' ),
        ),
    )
));

global $cms_carousel;
$cms_carousel = array();
class WPBakeryShortCode_cms_icon_carousel extends CmsShortCode
{
    protected function content($atts, $content = null){
       $atts_extra = shortcode_atts(array(
            'xsmall_items' => 1,
			'small_items' => 2,
			'medium_items' => 3,
			'large_items' => 4,
			'margin' => 20,
			'loop' => 'true',
			'nav' => 'true',
			'dots' => 'true',
			'autoplay' => 'true',
            
        ), $atts);
        $atts = array_merge($atts_extra,$atts);

        global $cms_carousel;
        
        wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.min.css','','2.2.1','all');
        wp_enqueue_script('owl-carousel',get_template_directory_uri().'/assets/js/owl.carousel.min.js',array('jquery'),'2.2.1',true);
        wp_enqueue_script('owl-carousel-cms',get_template_directory_uri().'/assets/js/owl.carousel.cms.js',array('jquery'),'1.0.0',true);
          
        $html_id = cmsHtmlID('cms-testimonial-carousel');
        $cms_carousel[$html_id] = array(
        	'margin' => $atts['margin'],
        	'loop' => $atts['loop'],
        	'mouseDrag' => 'true',
        	'nav' => $atts['nav'],
        	'dots' => $atts['dots'],
        	'autoplay' => $atts['autoplay'],
        	'autoplayTimeout' => 5000,
        	'smartSpeed' => 1000,
            //'animateOut' => 'fadeOut',
        	'autoplayHoverPause' => false,
        	'navText' => array('<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'),
        	'dotscontainer' => $html_id.' .cms-dots',
        	'responsive' => array(
        		0 => array(
        		"items" => (int)$atts['xsmall_items'],
        		),
	        	768 => array(
	        		"items" => (int)$atts['small_items'],
	        		),
	        	992 => array(
	        		"items" => (int)$atts['medium_items'],
	        		),
	        	1200 => array(
	        		"items" => (int)$atts['large_items'],
	        		)
	        	)
        );
        
        wp_localize_script('owl-carousel-cms', "cmscarousel", $cms_carousel);
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}
?>