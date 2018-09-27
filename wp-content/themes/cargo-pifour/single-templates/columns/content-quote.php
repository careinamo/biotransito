<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
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
<article id="post-<?php the_ID(); ?>" <?php post_class('cargo-pifour-blog wow fadeInUp'); ?>>
	<div class="entry-wrap entry-blog" <?php echo ''.$style; ?>>
	    <div class="entry-inside">
	    	<?php cargo_pifour_post_quote(); ?>
	    </div>
    </div>
   	<header class="entry-header">  
		<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
	</header><!-- .entry-header -->
    <div class="entry-meta entry-out">
		<?php cargo_pifour_archive_detail1(); ?>
	</div><!-- .entry-meta -->
	<div class="entry-content">
	    <p>
	    	<?php 
	    	echo cargo_pifour_grid_limit_words(strip_tags(get_the_excerpt()),12);
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'cargo-pifour' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</p>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>"><?php esc_html_e('View News Details', 'cargo-pifour') ?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
