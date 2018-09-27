<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $values
 * Shortcode class
 * @var $this WPBakeryShortCode_cms_images_carousel
 */
/* get Shortcode custom value */
    extract(shortcode_atts(array(
        'layout_mode'   => '1',
        'color_mode'    => '',
    ), $atts));

$testimonial = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $testimonial['values'] );
if(!isset($values[0]['text'])){
    echo '<p class="require required">'.esc_html__('Please add a testimonial text!','cargo-pifour').'</p>';
    return;
}
$thumbnail = '';
$bgimage_url = '';
if (!empty($atts['image'])) {
    $bgattachment_image = wp_get_attachment_image_src($atts['image'], 'full');
    $bgimage_url = $bgattachment_image[0];
}
$layout_mode = !empty($atts['layout_mode']) ? $atts['layout_mode'] : ''; 
?>
<div class="cms-testimonials <?php echo esc_html($layout_mode);?>">
    <?php if (!empty($atts['image'])): ?>
        <div class="bg-overlay" style="background: <?php echo !empty($atts['background_overlay'])? $atts['background_overlay'] : 'rgba(0, 0, 0, 0.7)';?>;"></div>
    <?php endif; ?>
    <?php switch($layout_mode){ 
       case 'layout1':
        ?>
    <?php
        foreach($values as $value){
            if(isset($value['text']) && !empty($value['text'])){ 
                $image_url = '';
                if (!empty($value['testi_avatar'])) {  
                    $attachment_image = wp_get_attachment_image_src($value['testi_avatar'], 'thumbnail');
                    $image_url = $attachment_image[0];
                }
            ?>
            <div class="testi-item ">
				
				<div class="testi-media">
                    <?php
                    if(!empty($image_url)){
                        ?>
                        <div class="testi-avatar">
							<img src="<?php echo esc_url($image_url);?>" alt="" class="round"/>
						</div>
                        <?php
                    }
                    ?>
                    <div class="testi-content">
                        <div class="testi-title">
    					<?php if(!empty($value['title'])):?>
    						<h6><?php echo esc_html($value['title']);?></h6>
                        <?php endif;?>
                        </div>                   
                        <p><?php echo esc_html($value['text']);?></p>                   
                    </div>
				</div>
			</div>   
        <?php 
            }    
        }
        break;
        case 'layout2':
        ?>
        <?php
        foreach($values as $value){
            if(isset($value['text']) && !empty($value['text'])){ 
                $image_url = '';
                if (!empty($value['testi_avatar'])) {  
                    $attachment_image = wp_get_attachment_image_src($value['testi_avatar'], 'thumbnail');
                    $image_url = $attachment_image[0];
                }
            ?>
            <div class="testi-item ">
                
                <div class="testi-media">
                    <?php
                    if(!empty($image_url)){
                        ?>
                        <div class="testi-avatar">
                            <img src="<?php echo esc_url($image_url);?>" alt=""/>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="testi-content">
                        <div class="testi-title">
                        <?php if(!empty($value['title'])):?>
                            <h4><?php echo esc_html($value['title']);?></h4>
                        <?php endif;?>
                        </div>                   
                        <p><?php echo esc_html($value['text']);?></p>                   
                    </div>
                </div>
            </div>   
        <?php 
            }    
        }
        break;
    }
        ?>
</div>
 