<?php  

    //parse link
    global $post;
    $link='';
    $link = (isset($atts['link'])) ? $atts['link'] : '';
    if (!isset($atts['link'])) {
        $link ='';
    }
    else
    $link = vc_build_link( $atts['link'] );
    $use_link = false;
    $pos = false;
    if(isset($atts['link'])){
        if ( strlen( $link['url'] ) > 0 ) {
            $use_link = true;
            $a_href = $link['url'];
            $a_title = $link['title'];
            $a_target = $link['target'];
            $link_url= esc_url(get_permalink());
            $pos = strpos(  $link_url , $a_href);
        }    
    }
?>
<div class="cms-post-services " >
    <ul class="services-list">
        <li class="services-list-item services-header">
            <?php if($pos === false): ?>
                <a  href="<?php echo $a_href; ?>" title="<?php echo esc_html__( 'All Services', 'cargo-pifour' ); ?>"><?php echo esc_html__( 'All Services', 'cargo-pifour' ); ?></a>
            <?php else: ?>
                <a class="active" href="<?php echo $a_href; ?>" title="<?php echo esc_html__( 'All Services', 'cargo-pifour' ); ?>"><?php echo esc_html__( 'All Services', 'cargo-pifour' ); ?></a>
            <?php endif; ?>
        </li>
        <?php
        $posts = $atts['posts'];
        while($posts->have_posts()){
            $posts->the_post();

            $post_slug=$post->post_name;
            ?>

            <li class="services-list-item">
                <?php   if(isset($_GET['services']) && trim($_GET['services']) == $post_slug ): ?>
                    <a class="active" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                 <?php  else: ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                <?php endif; ?>
            </li>
            <?php
        }
        ?>
    </ul>
</div>