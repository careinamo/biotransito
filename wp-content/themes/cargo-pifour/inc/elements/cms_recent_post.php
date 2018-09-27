<?php
vc_map(
	array(
		"name" => esc_html__("CMS Recent Post", 'cargo-pifour'),
	    "base" => "cms_recent_post",
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
	            "type" => "textfield",
	            "heading" => esc_html__("Extra Class",'cargo-pifour'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => esc_html__("",'cargo-pifour'),
	        ),
	         array(
	        	'type' => 'vc_link',
	            'heading' => esc_html__( 'URL (Link)', 'cargo-pifour' ),
	            'param_name' => 'link',
	            'description' => esc_html__( 'Add link to header .', 'cargo-pifour' ),
        	),
	    	 
	    )
	)
);
class WPBakeryShortCode_cms_recent_post extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'source' => '',
            'not__in'=> 'false', 
            'class' => '',
                ), $atts);
		$atts = array_merge($atts_extra, $atts);
		  
        $source = $atts['source'];
        if (get_query_var('paged')){ 
        	$paged = get_query_var('paged'); 
        }
	    elseif(get_query_var('page')){ 
	    	$paged = get_query_var('page'); 
	    }
	    else{ 
	    	$paged = 1; 
	    }
        if(isset($atts['not__in']) && $atts['not__in']){
	    	list($args, $wp_query) = vc_build_loop_query($source, get_the_ID());
	    }
        else{
        	list($args, $wp_query) = vc_build_loop_query($source);
        }
                 
        //default categories selected
        $args['cat_tmp'] = isset($args['cat'])?$args['cat']:'';
        // if select term on custom post type, move term item to cat.
        if(strstr($source, 'tax_query')){
        	$source_a = explode('|', $source);
        	foreach ($source_a as $key => $value) {
        		$tmp = explode(':', $value);
        		if($tmp[0] == 'tax_query'){
        			$args['cat_tmp'] = $tmp[1];
        		}
        	}
        }
	    if($paged > 1){
	    	$args['paged'] = $paged;
	    	$wp_query = new WP_Query($args);
	    }
        $atts['cat'] = isset($args['cat_tmp'])?$args['cat_tmp']:'';
        $atts['limit'] = isset($args['posts_per_page'])?$args['posts_per_page']:3;
        /* get posts */
        $atts['posts'] = $wp_query;
          
		return parent::content($atts, $content);
	}
}

?>