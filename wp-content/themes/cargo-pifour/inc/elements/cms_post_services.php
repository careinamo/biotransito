<?php
vc_map(
	array(
		"name" => esc_html__("CMS Post Services ", 'cargo-pifour'),
	    "base" => "cms_post_services",
	    "class" => "vc-cms-grid",
	    "category" => esc_html__("CmsSuperheroes Shortcodes", 'cargo-pifour'),
	    "params" => array(
	    	array(
	            "type" => "loop",
	            "heading" => esc_html__("Source",'cargo-pifour'),
	            "param_name" => "source",
	            'settings' => array(
	                'size' => array('hidden' => false, 'value' => 10),
	                'order_by' => array('value' => 'date')
	            ),
	            "group" => esc_html__("Source Settings", 'cargo-pifour'),
	        ),
	         array(
        	'type' => 'vc_link',
            'heading' => esc_html__( 'URL (Link)', 'cargo-pifour' ),
            'param_name' => 'link',
            'description' => esc_html__( 'Add link for post service', 'cargo-pifour' ),
        ),
	    )
	)
);
class WPBakeryShortCode_cms_post_services extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'source' => '',
                ), $atts);
		$atts = array_merge($atts_extra, $atts);
       
        $source = $atts['source'];
       
        if(isset($atts['not__in']) && $atts['not__in']){
	    	list($args, $wp_query) = vc_build_loop_query($source, get_the_ID());
	    }
        else{
        	list($args, $wp_query) = vc_build_loop_query($source);
        }
        $atts['posts'] = $wp_query;
		return parent::content($atts, $content);
	}
}