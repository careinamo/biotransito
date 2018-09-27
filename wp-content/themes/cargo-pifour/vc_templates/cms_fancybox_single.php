<?php
    $classes=array('fancyboxe-single');
    if(!empty($atts['css'])){
        $classes[]=vc_shortcode_custom_css_class($atts['css']);
    }
 
    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), $this->settings['base'], $atts ) );
    
    $icon_name = $iconClass = $a_href = $a_title = $a_target = $image_url = $link = $box = '';
    $icon_name = "icon_" . $atts['icon_type'];
    $iconClass = isset($atts[$icon_name]) ? $atts[$icon_name] : '';
    
    $link = (isset($atts['link'])) ? $atts['link'] : '';
    $link = vc_build_link( $link );
    $use_link = false;
    if ( strlen( $link['url'] ) > 0 ) {
        $use_link = true;
        $a_href = $link['url'];
        $a_title = !empty($link['title'])?$link['title']: esc_html__('Get Started','cargo-pifour');
        $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
    }
     
    if (!empty($atts['image'])) {
        $attachment_image = wp_get_attachment_image_src($atts['image'], 'full');
        $image_url = $attachment_image[0];
    }
    if (!empty($atts['box_shadow'])){
        $box = 'box-shadow';
    }   
    $fancy_style = ( !empty($atts['fancy_style']) ) ? $atts['fancy_style'] : 'style-0';
    
    $animate_class = !empty($atts['animation_effect']) ? $atts['animation_effect'] : ''; 
    $duration = !empty($atts['data_wow_duration'])?'data-wow-duration='.$atts['data_wow_duration']:'';
    $delay  = !empty($atts['data_wow_delay'])?'data-wow-delay='.$atts['data_wow_delay']:'';
     
    ?>
    <div <?php echo esc_attr($duration); ?> <?php echo esc_attr($delay); ?> class="cms-fancy-single-wraper <?php echo esc_attr($css_class);?> <?php echo esc_attr($atts['template']);?> <?php echo esc_attr($animate_class);?> clearfix" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    switch ($fancy_style) {
        case 'style-1': 
        ?>
            <div class="cms-fancybox-item fancy-style1 <?php echo esc_attr($box);?>">
                <?php if (!empty($atts['image'])) : ?>
                    <div class="fancy-img">
                        <img src="<?php echo esc_url($image_url);?>" alt="" class="img-responsive"/>
                    </div>
                <?php endif; ?>
                <div class="item-content ">
                    <div class="fancy-content">
                        <?php 
                        if(!empty($atts['title_item'])){ 
                            echo '<h4 class="fancy-title">';
                                    echo $atts['title_item'];
                            echo '</h4>';
                        } 
                        ?>
                        <?php
                        if(!empty($atts['description_item']))
                            echo apply_filters('the_content',$atts['description_item']);
                        ?>
                    </div>
                    <?php if($use_link):?>
                         <a class="btn-primary readmore" href="<?php echo $a_href;?>" target="<?php echo $a_target;?>"><?php echo $a_title;?> <i class="fa fa-angle-right"></i></a>
                    <?php endif;?> 
                </div>
                    
                
            </div> 
        <?php
        break;
        case 'style-2': 
        ?>
            <div class="cms-fancybox-item fancy-style2 ">
                <div class="style2-wrap">   
                    <div class="style2-content">
                        <?php 
                        if(!empty($atts['title_item'])){ 
                            echo '<h6 class="fancy-title">';
                                    echo $atts['title_item'];
                            echo '</h6>';
                        } 
                        ?>
                        <div class="fancy-description">
                        <?php
                        if(!empty($atts['description_item']))
                            echo apply_filters('the_content',$atts['description_item']);
                        ?>
                        </div>
                    </div>
                    <?php if (!empty($iconClass)) : ?>
                        <div class="fancy-icon">
                            <i class="<?php echo esc_attr($iconClass);?>"></i>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>     
        <?php
        break;
         case 'style-3': 
        ?>
            <div class="cms-fancybox-item fancy-style3 ">
                <div class="style3-wrap"> 
                    <?php if (!empty($iconClass)) : ?>
                        <div class="fancy-icon">
                            <i class="<?php echo esc_attr($iconClass);?>"></i>
                        </div>
                    <?php endif; ?>  
                    <div class="style3-content">
                        <?php 
                        if(!empty($atts['title_item'])){ 
                            echo '<h6 class="fancy-title">';
                                    echo $atts['title_item'];
                            echo '</h6>';
                        } 
                        ?>
                        <div class="fancy-description">
                        <?php
                        if(!empty($atts['description_item']))
                            echo apply_filters('the_content',$atts['description_item']);
                        ?>
                        </div>
                    </div>  
                </div>
            </div>     
        <?php
        break;
        case 'style-4': 
        ?>
            <div class="cms-fancybox-item fancy-style4 ">
                <div class="style4-wrap"> 
                    <div class="style4-content">
                        <?php 
                        if(!empty($atts['title_item'])){ 
                            echo '<h6 class="fancy-title">';
                                    echo $atts['title_item'];
                            echo '</h6>';
                        } 
                        ?>
                        <div class="fancy-description">
                        <?php
                        if(!empty($atts['description_item']))
                            echo apply_filters('the_content',$atts['description_item']);
                        ?>
                        </div>
                    </div>  
                </div>
            </div>     
        <?php
        break;
        }
        ?>
    </div>