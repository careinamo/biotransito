<?php
extract( $atts );
 
$css_class  = '';

$classes=array('cms-client-wrap text-center');
if(!empty($atts['css'])){
    $classes[]=vc_shortcode_custom_css_class($atts['css']);
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );

$client = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $client['values'] );
 $dots = $nav = '';
 //$icon_name = "icon_" . $atts['icon_type'];
    //$iconClass = isset($atts[$icon_name]) ? $atts[$icon_name] : '';

?>
<div class="<?php echo esc_attr($css_class); ?>">
    <div class="cms-carousel owl-carousel home-carousel" id="<?php echo esc_attr($atts['html_id']);?>">

        <?php foreach($values as $value){?>
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
                
                <?php
            }
        ?>
    </div>
</div>
