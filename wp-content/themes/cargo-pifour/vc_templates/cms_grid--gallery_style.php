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
        if(isset($atts['show_read_more']) && $atts['show_read_more']):  
            wp_register_script( 'cms-loadmore-js', get_template_directory_uri().'/assets/js/cms_loadmore.js', array('jquery') ,'1.0',true);
            // What page are we on? And what is the pages limit?
            global $wp_query;
            $max = $wp_query->max_num_pages;
            $limit = $atts['limit'];
            $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
            // Add some parameters for the JS.
            $current_id =  str_replace('-','_',$atts['html_id']);
            wp_localize_script(
                'cms-loadmore-js',
                'cms_more_obj'.$current_id,
                array(
                    'startPage' => $paged,
                    'maxPages' => $max,
                    'total' => $wp_query->found_posts,
                    'perpage' => $limit,
                    'nextLink' => next_posts($max, false),
                    'masonry' => $atts['layout']
                )
            );
            wp_enqueue_script( 'cms-loadmore-js' ); 
        endif;
?>
    <?php if(isset($atts['top-overlap']) && $atts['top-overlap']): ?>
        <div class="cms-grid-wraper top-overlap <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php else: ?>
        <div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php endif; ?>  
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ($atts['layout']=='basic')?'cargo_pifour-370-207':'cargo_pifour-370-207';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
                <div class=" wow fadeIn <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>            
                <div class="grid-gallery ">
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
                            <p><?php echo cargo_pifour_grid_limit_words(strip_tags(get_the_excerpt()),$word_number);  ?></p>
                        </div> 
                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'cargo-pifour') ?><i class="fa fa-angle-right"></i></a>
                        </footer><!-- .entry-footer -->
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
     <?php
    if(isset($atts['show_read_more']) && $atts['show_read_more'])
        echo '<div class="loadmore text-center"><div class="cms_pagination grid-loadmore"></div></div>';
    if(isset($atts['show_patination']) && $atts['show_patination'])
        cargo_pifour_paging_nav();
    ?>
</div>