<?php 
extract( $atts );
 
$css_class  = '';

$classes=array('cms-services-wrap text-center');
if(!empty($atts['css'])){
    $classes[]=vc_shortcode_custom_css_class($atts['css']);
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );

$client = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $client['values'] );
?>
<div class="cms-grid-services-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row cms-grid with_grid_dividers <?php echo esc_attr($atts['grid_class']);?> ">  
        <?php foreach($values as $value){?>
        <div class="cms-grid-service-item <?php echo esc_attr($atts['item_class']);?>">   
            <div class="transport-logo">
                    <div class="transport-icon">
                    <?php 
                        if(!empty($value['icon_class']))
                        echo '<i class="'.$value['icon_class'].'"></i>';
                     ?>
                    </div>
                    <?php if(!empty($value['title']) && !empty($value['desc'])): ?>
                    <div class="transport-content">
                    <?php if(!empty($value['title'])){
                       echo '<h6 class="transport-title"><a href="'. esc_url($value['icon_link']).'" title="" target="_blank">'.esc_html($value['title']).' </a> </h6>';
                   }
                     else{
                        echo '<h6 class="transport-title">'. esc_html($value['title']).' </h6>';
                     }?>
                        <p class="transport-desc"><?php echo esc_html($value['desc']);?></p>
                    
                    </div>
                   <?php endif; ?>
                
            </div>   
        </div>   
            <?php  }  ?>  
    </div>
</div>
 