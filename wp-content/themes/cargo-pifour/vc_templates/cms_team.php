<?php 
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
    $options=(array) vc_param_group_parse_atts($options );

    $link = (isset($atts['link'])) ? $atts['link'] : '';
    $link = vc_build_link( $link );
    $use_link = false; 
    if ( strlen( $link['url'] ) > 0 ) {
        $use_link = true;
        $a_href = $link['url'];
        $a_title = $link['title'];
        $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
    }
 
    $image_url = '';
    if (!empty($atts['image'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image'], 'thumbnail');
        $image_url = $attachment_image[0];
    } 
    $layout_mode = (!empty($atts['layout_mode'])) ? $atts['layout_mode'] : '';
?>
 <?php if(!empty($layout_mode)): ?>
<div class="team-block wow fadeIn <?php echo esc_attr($layout_mode);?> " style="text-align: <?php echo $textalign_type;?>">
<?php switch($layout_mode){
    case 'layout1': ?>
	<?php if(!empty($image_url)):?>
        <div class="avatar">
            <img src="<?php echo esc_url($image_url);?>" alt=""/>
            <?php if(!empty($options)): ?>
             <ul class="team-socials">
                <?php 
                foreach($options as $option):                     
                    if( !empty($option['social_link']) && !empty($option['icon_class'])){
                        echo '<li>';
                        echo '<a href="'.esc_url($option['social_link']).'"><i class="'.$option['icon_class'].'"></i></a>';
                        echo '</li>';
                    }                   
                endforeach; 
                 ?>
            </ul>
        <?php endif; ?>
        </div>
    <?php endif; ?>    
        <div class="team-detail">
            <div class="team-detail-wrap">
                 <div class="team_name_position">
                    <?php if(!empty($name)):?>
                        <?php if($use_link):?>
                            <h6 class="name"><a href="<?php echo $a_href;?>" target="<?php echo $a_target;?>"><?php echo esc_html($name);?></a></h6>
                        <?php else:?>
                            <h6 class="name"><?php echo esc_html($name);?></h6>
                        <?php endif;?>
                    <?php endif; ?>  
                    <?php if(!empty($position)):?> 
                        <p class="position"><?php echo esc_html($position);?></p>
                    <?php endif; ?>    
                </div>
                <div class="team_phone_email">
                    <?php if(!empty($phone)):?> 
                        <p class="phone"><span><?php echo esc_html($phone);?></span></p>
                    <?php endif; ?>    
                    <?php if(!empty($email)):?>
                        <p class="email"><a href="<?php echo esc_url('mailto:'.$email); ?>"><?php echo esc_html($email);?></a></p>
                    <?php endif; ?> 
                </div>
            </div>              
        </div>
    <?php break; 
        case 'layout2': ?>
        <?php if(!empty($image_url)):?>
            <div class="avatar">
                <img src="<?php echo esc_url($image_url);?>" alt=""/>
                <?php if(!empty($options)): ?>
                    <div class="avatar-wrap">
                        <ul class="team-socials">
                        <?php 
                        foreach($options as $option):                     
                            if( !empty($option['social_link']) && !empty($option['icon_class'])){
                                echo '<li>';
                                echo '<a href="'.esc_url($option['social_link']).'"><i class="'.$option['icon_class'].'"></i></a>';
                                echo '</li>';
                            }                   
                        endforeach; 
                         ?>
                        </ul>
                        <div class="team_phone_email">
                            <?php if(!empty($phone)):?> 
                                <p class="phone"><span><?php echo esc_html($phone);?></span></p>
                            <?php endif; ?>    
                            <?php if(!empty($email)):?>
                                <p class="email"><a href="<?php echo esc_url('mailto:'.$email); ?>"><?php echo esc_html($email);?></a></p>
                            <?php endif; ?> 
                        </div>
                    </div>
            <?php endif; ?>
            </div>
        <?php endif; ?> 
            <div class="team-detail">
                <?php if(!empty($name)):?>
                    <?php if($use_link):?>
                        <h6 class="name"><a href="<?php echo $a_href;?>" target="<?php echo $a_target;?>"><?php echo esc_html($name);?></a></h6>
                    <?php else:?>
                        <h6 class="name"><?php echo esc_html($name);?></h6>
                    <?php endif;?>
                <?php endif; ?>  
                <?php if(!empty($position)):?> 
                    <p class="position"><?php echo esc_html($position);?></p>
                <?php endif; ?>    
                <?php if(!empty($desc)):?>
                    <p class="desc"><?php echo esc_html($desc);?></p>
                <?php endif; ?> 
            </div>
    <?php 
        break; 
        } 
    ?>
</div>
<?php endif; ?> 
	 
             

