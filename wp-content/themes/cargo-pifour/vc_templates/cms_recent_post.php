<?php 
$link='';
    //parse link
    global $post;
    $link = (isset($atts['link'])) ? $atts['link'] : '';
    if (!isset($atts['link'])) {
        $link = '';
    }
    else{
        $link = vc_build_link( $atts['link'] );
        $use_link = false;

        if ( strlen( $link['url'] ) > 0 ) {
            $use_link = true;
            $a_href = $link['url'];
            $a_title = $link['title'];
            $a_target = $link['target'];
            $link_url= esc_url(get_permalink());
             
        }
    }
 ?>
<div class="cms-recent-post-wraper ">
    <ul class="post-list">
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();
            ?>             
                <li class="post-list-item">
            		<?php the_title( '<h6 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' ); ?>
            		<div class="entry-meta">
            			<p><?php echo esc_html__('by','cargo-pifour'); ?> <?php the_author_posts_link(); ?></p>
            		</div>             		
                </li>
            <?php
        }
        ?>
    </ul>
    <?php if (isset($a_title)) {?>
        <div class="btn-readmore">
            <a class="btn-primary readmore" href="<?php echo $a_href; ?>"><?php echo  $a_title; ?><i class="fa fa-angle-right"></i></a>
        </div>
    <?php
    } ?>    
</div>