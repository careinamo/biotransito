<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @since 1.0.0
 */
?>
<?php
 
$style ='';
if(has_post_thumbnail()){
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
    $image_url = esc_url($image[0]);
    $style = 'style="background-image:url('.$image_url.'); background-size: cover;background-position: center;"';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('cargo-pifour-blog'); ?>>
  
	<div class="entry-wrap" <?php echo ''.$style;?>>
		<header class="entry-header">
	        <?php cargo_pifour_post_status(); ?>
			<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>

		</header><!-- .entry-header -->
    </div>
	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'cargo-pifour' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'cargo-pifour' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->
    <div class="entry-footer1">
    	<div class="entry-meta">

			<?php cargo_pifour_post_detail(); ?>

		</div><!-- .entry-meta -->
			<?php cargo_pifour_footer_share(); ?>

    </div>
		
</article><!-- #post-## -->
