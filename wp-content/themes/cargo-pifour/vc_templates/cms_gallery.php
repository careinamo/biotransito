<?php 
    $images_arr = array();
    $list_titles = array();
    //$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
    
    if(!empty($atts['images'])) 
        $images_arr = explode( ',', $atts['images'] );
     
    if(!empty($atts['list_title']))
        $list_titles = explode(',',$atts['list_title']);
     
    $classes=array('cms-gallerys layout-default');
    $css_class = '';
    if(!empty($atts['css'])){
        $classes[]=vc_shortcode_custom_css_class($atts['css']);
    }
    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );
?>
<div class="cms-gallery-wraper <?php echo esc_attr($css_class);?> <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($html_id);?>">
     
    <div class="row <?php echo esc_attr($grid_class);?>">
         
        <?php
        foreach ( $images_arr as $i => $image ) {
            if ( $image > 0 ) {
                $thumbnail = wp_get_attachment_image_src($image, 'thumbnail');
                $image_src = $thumbnail[0];
				$large_img = wp_get_attachment_image_src($image, 'full'); 
                $image_large_src = $large_img[0]; 
                
			} else {
				 $image_src = $image_large_src = esc_url(get_template_directory_uri().'/assets/images/no-image.jpg');
                
			}
            $attachment = get_post($image);
            $upload_date_i = get_the_date( 'F d, Y', $image );
        ?>
        <div class="<?php echo esc_attr($atts['item_class']);?> wow fadeIn" >
            <div class="gallery-outer" onclick="">
                <img src="<?php echo esc_url($image_src);?>" alt="" class="img-responsive"/>
                <div class="bg-overlay"></div>
                <div class="content-info ">
                    <a class="magic-popups" href="<?php echo $image_large_src; ?>" ><i class="fa fa-search"></i></a> 
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
    
</div>