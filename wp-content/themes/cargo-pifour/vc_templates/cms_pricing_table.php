<?php 
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
    $classes=array('cms-pricing-table',vc_shortcode_custom_css_class( $css ));
    $link = (isset($atts['link'])) ? $atts['link'] : '';
    $link = vc_build_link( $link );
    $use_link = false;
    if ( strlen( $link['url'] ) > 0 ) {
        $use_link = true;
        $a_href = $link['url'];
        $a_title = !empty($link['title']) ? $link['title'] : 'Get Started' ;
        $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
    }
    if(!empty($atts['css'])){
        $classes[]=vc_shortcode_custom_css_class($atts['css']);
    }
    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );
    $features = (array) vc_param_group_parse_atts($features );  
?>
 
<div class="<?php echo esc_attr($css_class);?> text-center <?php echo ( isset($is_active) && $is_active =='1' ) ? 'active' : '';?>">
      
     <?php if(!empty($title)): ?>
        <h3 class="title"><?php echo esc_html($title ); ?></h3>  
     <?php endif; ?> 
     <?php if(!empty($sub_title)): ?>	
		<span class="dur"><?php echo esc_html($sub_title); ?></span>
     <?php endif; ?>
     <hr />
     <?php  if( !empty($features)): ?>
		<ul class="features-list list-unstyled">
            <?php foreach($features as $feature): 
                if(!empty($feature['feature_name'] )): ?>
                <li><?php echo esc_attr($feature['feature_name'] ); ?></li>
            <?php endif;
                 endforeach; ?>
		</ul>
        <?php if (isset($a_title)): ?>
		  <a href="<?php echo esc_url($a_href);?>" class="btn btn-primary"><?php echo !empty($a_title) ? esc_html($a_title): esc_html__('Purchase Plan','cargo-pifour');?></a>
        <?php endif ?>
	 <?php endif; ?>
    
</div>
 
 
 
             
 
