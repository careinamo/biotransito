<?php 
    /* get categories */
        $taxo = 'services_category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
        $word_number = !empty($atts['word_number']) ? $atts['word_number'] : '22';
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
   
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'medium':'medium';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="grid-services cms-grid-item wow fadeIn <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.CMS_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="cms-grid-media '.esc_attr($class).'"><a href="' . esc_url( get_permalink() ) . '">'.$thumbnail.'</a></div>';
                ?>
                <div class="entry-wrap">
                    <header class="entry-header">
                        <?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
                    </header> 
                    <div class="entry-content">
                        <?php echo cargo_pifour_grid_limit_words(strip_tags(get_the_excerpt()),$word_number);  ?>
                    </div> 
                    <footer class="entry-footer">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'cargo-pifour') ?></a>
                    </footer><!-- .entry-footer -->
                </div>
            </div>
            <?php
        }
        ?>
    </div>
     <?php 
        if( !isset($atts['show_patination']) || (isset($atts['show_patination']) && $atts['show_patination']=='1'))
            cargo_pifour_paging_nav();
    ?>
</div>