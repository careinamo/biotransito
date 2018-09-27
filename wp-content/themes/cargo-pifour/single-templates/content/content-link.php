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
<article id="post-<?php the_ID(); ?>" <?php post_class('cargo-pifour-blog wow fadeInUp'); ?>>
	<?php cargo_pifour_post_link(); ?>
   	<header class="entry-header">  
		<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
	</header><!-- .entry-header -->
    <div class="entry-meta entry-out">
		<?php cargo_pifour_archive_detail(); ?>
	</div><!-- .entry-meta -->
	<div class="entry-content">
	  <p>
		<?php
		/* translators: %s: Name of current post */
		echo cargo_pifour_limit_words(strip_tags(get_the_excerpt()));
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages', 'cargo-pifour' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>
	  </p>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'cargo-pifour') ?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->