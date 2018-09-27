<?php 
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
    $classes=array('cms-download-file');
    $css_class = '';
    if(!empty($atts['css'])){
        $classes[]=vc_shortcode_custom_css_class($atts['css']);
    }
    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );
    
    $files=(array) vc_param_group_parse_atts($files );
 
?>
<?php if(!empty($title) || !empty($files)): ?>
	<div class="<?php echo esc_attr($css_class); ?>">
        <div class="row">
            <?php if(!empty($title)):?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h6 class="title"><?php echo esc_html($title);?></h6>
            </div>
            <?php endif;?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="list-file">
                   
                    <?php foreach($files as $file): ?>
                        <li class="list-file-item">
                        <a href="<?php echo !empty($file['file_link']) ? esc_url($file['file_link']) : '#'; ?>">
                            <?php echo !empty($file['file_icon_class']) ? '<i class="'.esc_attr($file['file_icon_class']).'"></i>' : '';?>
                            <?php echo !empty($file['file_name']) ? esc_html($file['file_name']) : esc_html__('no name','cargo-pifour'); ?>
                        </a>
                        </li>
                    <?php endforeach;?>
                    
                </ul>
            </div>
        </div>	  
	</div>
<?php endif; ?>