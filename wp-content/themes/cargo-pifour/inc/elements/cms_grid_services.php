<?php
vc_map(
	array(
		"name" => esc_html__("CMS Grid Services", 'cargo-pifour'),
	    "base" => "cms_grid_services",
	    "class" => "vc-cms-grid",
	    "category" => esc_html__("CmsSuperheroes Shortcodes", 'cargo-pifour'),
	    "params" => array(       
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
	            "heading" => esc_html__("Columns XS Devices",'cargo-pifour'),
	            "param_name" => "col_xs",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 1,
	            "group" => esc_html__("Grid Settings", 'cargo-pifour')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Columns SM Devices",'cargo-pifour'),
	            "param_name" => "col_sm",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 2,
	            "group" => esc_html__("Grid Settings", 'cargo-pifour')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Columns MD Devices",'cargo-pifour'),
	            "param_name" => "col_md",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 3,
	            "group" => esc_html__("Grid Settings", 'cargo-pifour')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => esc_html__("Columns LG Devices",'cargo-pifour'),
	            "param_name" => "col_lg",
	            "edit_field_class" => "vc_col-sm-3 vc_column",
	            "value" => array(1,2,3,4,6,12),
	            "std" => 4,
	            "group" => esc_html__("Grid Settings", 'cargo-pifour')
	        ),
	    

	    	array(
	            "type" => "cms_template",
	            "param_name" => "cms_template",
	            "shortcode" => "cms_grid_services",
	            "admin_label" => true,
	            "heading" => esc_html__("Shortcode Template",'cargo-pifour'),
	            "group" => esc_html__("Template", 'cargo-pifour'),
	        )
	    )
	)
);
class WPBakeryShortCode_cms_grid_services extends CmsShortCode{
	protected function content($atts, $content = null){
		global $wp_query,$post;
		$atts_extra = shortcode_atts(array(
            'source' => '',
            'col_lg' => 4,
            'col_md' => 3,
            'col_sm' => 2,
            'col_xs' => 1,
            'not__in'=> 'false', 
            'cms_template' => 'cms_grid_services.php',
            'class' => '',
                ), $atts);
		$atts = array_merge($atts_extra, $atts);
	 
        $html_id = cmsHtmlID('cms-grid-services');
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
        $atts['limit'] = isset($args['posts_per_page'])?$args['posts_per_page']:5;
        /* get posts */
        $atts['posts'] = $wp_query;
        
        
        $col_lg = 12 / $atts['col_lg'];
        $col_md = 12 / $atts['col_md'];
        $col_sm = 12 / $atts['col_sm'];
        $col_xs = 12 / $atts['col_xs'];
        $atts['item_class'] = "cms-grid-item col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-xs-{$col_xs}";
        $atts['grid_class'] = "cms-grid-services";
        $class = $atts['class'];
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' '. $class;
         
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>