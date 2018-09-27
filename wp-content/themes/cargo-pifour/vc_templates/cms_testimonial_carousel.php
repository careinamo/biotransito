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
        'nav'           => true,
        'dots'          => false,
        'dotdata'       => false
    ), $atts));


$testimonial = vc_map_get_attributes( $this->getShortcode(), $atts );
$values = (array) vc_param_group_parse_atts( $testimonial['values'] );
if(!isset($values[0]['text'])){
    echo '<p class="require required">'.esc_html__('Please add a testimonial text!','cargo-pifour').'</p>';
    return;
}

$show_nav = $nav ? 'has-nav' : '';
$show_dots = $dots ? 'has-dots' : '';
$thumbnail = '';

$bgimage_url = '';
if (!empty($atts['image'])) {
    $bgattachment_image = wp_get_attachment_image_src($atts['image'], 'full');
    $bgimage_url = $bgattachment_image[0];
}

$layout_mode = !empty($atts['layout_mode']) ? $atts['layout_mode'] : ''; 
?>

<div class="cms-testimonial-wrap <?php  echo esc_attr($layout_mode);?>" style="background-image: url('<?php echo esc_url($bgimage_url);?>');background-size: cover;background-repeat: no-repeat;">
    <?php if (!empty($atts['image'])): ?>
        <div class="bg-overlay" style="background: <?php echo !empty($atts['background_overlay'])? $atts['background_overlay'] : 'rgba(0, 0, 0, 0.7)';?>;"></div>
    <?php endif; ?>
    <div class="cms-carousel owl-carousel <?php echo esc_attr($show_nav.' '.$show_dots);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php switch($layout_mode){ 
       case 'layout1':
        ?>
    <?php
        foreach($values as $value){
            if(isset($value['text']) && !empty($value['text'])){ 
                $image_url = '';
                if (!empty($value['author_avatar'])) {  
                    $attachment_image = wp_get_attachment_image_src($value['author_avatar'], 'thumbnail');
                    $image_url = $attachment_image[0];
                }
            ?>
            <div class="testi-item">
				<div class="blockquote">
                <p><?php echo esc_html($value['text']);?></p>
					
				</div>
				<div class="author-media">
                    <?php
                    if(!empty($image_url)){
                        ?>
                        <div class="author-avatar">
							<img src="<?php echo esc_url($image_url);?>" alt="" class="round"/>
						</div>
                        <?php
                    }
                    ?>
                    <div class="author-title">
					<?php if(!empty($value['author_name'])):?>
						<h6><?php echo esc_html($value['author_name']);?></h6>
                        <?php 
                        if(!empty($value['author_position'])):
                            echo '<p>'.esc_html($value['author_position']).'</p>';    
                        endif; 
                        ?>
                    <?php endif;?>
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
                if (!empty($value['author_avatar'])) {  
                    $attachment_image = wp_get_attachment_image_src($value['author_avatar'], 'thumbnail');
                    $image_url = $attachment_image[0];
                }
            ?>
            <div class="testi-item">
                <div class="client-desc">
                <p><?php echo esc_html($value['text']);?></p>
                    
                </div>
                <div class="author-media">
                    <?php
                    if(!empty($image_url)){
                        ?>
                        <div class="author-avatar">
                            <img src="<?php echo esc_url($image_url);?>" alt="" class="round"/>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="author-title">
                    <?php if(!empty($value['author_name'])):?>
                        <h6><?php echo esc_html($value['author_name']);?></h6>
                        <?php 
                        if(!empty($value['author_position'])):
                            echo '<p>'.esc_html($value['author_position']).'</p>';    
                        endif; 
                        ?>
                    <?php endif;?>
                    </div>
                </div>

            </div>   
        <?php 
            }    
        }
        break;
        case 'layout3':
        ?>
         <?php
        foreach($values as $value){
            if(isset($value['text']) && !empty($value['text'])){ 
                $image_url = '';
                if (!empty($value['author_avatar'])) {  
                    $attachment_image = wp_get_attachment_image_src($value['author_avatar'], 'thumbnail');
                    $image_url = $attachment_image[0];
                }
            ?>
            <div class="testi-item">
                <div class="author-media">
                    <?php
                    if(!empty($image_url)){
                        ?>
                        <div class="author-avatar">
                            <img src="<?php echo esc_url($image_url);?>" alt="" class="round"/>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="author-title">
                    <?php if(!empty($value['author_name'])):?>
                        <h6><?php echo esc_html($value['author_name']);?></h6>
                        <?php 
                        if(!empty($value['author_position'])):
                            echo '<p>'.esc_html($value['author_position']).'</p>';    
                        endif; 
                        ?>
                    <?php endif;?>
                    </div>
                </div>
                <div class="blockquote">
                <p><?php echo esc_html($value['text']);?></p>
                    
                </div>
            </div>   
        <?php 
            }    
        }
    }
        ?>

    </div>
</div>
 