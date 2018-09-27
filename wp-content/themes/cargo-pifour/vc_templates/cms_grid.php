<?php 
    /* get categories */
    $taxo = 'category';
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
    $style ='';
if(has_post_thumbnail()){
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
    $image_url = esc_url($image[0]);
    $style = 'style="background-image:url('.$image_url.'); background-size: cover;background-position: center;"';
}
     
?>
<div class="cms-grid-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    
    <div class="row cms-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $index = 1; 
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(cmsGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            
            $post_format= get_post_format();
            ?>
            <div class="cms-grid-item <?php echo esc_attr($atts['item_class']);?> wow fadeIn" data-wow-delay="<?php echo $index * 50 ?>ms" data-groups='[<?php echo implode(',', $groups);?>]'>
                 <?php 
            get_template_part( 'single-templates/columns/content', get_post_format() ); ?>
            </div>
            <?php
            $index++;
        }
        ?>
    </div>
     <?php 
        if( !isset($atts['show_patination']) || (isset($atts['show_patination']) && $atts['show_patination']=='1'))
            cargo_pifour_paging_nav();
    ?>
</div>