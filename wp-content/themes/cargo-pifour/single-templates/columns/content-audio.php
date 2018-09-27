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
    <?php  cargo_pifour_post_audio(); ?>
	<header class="entry-header">   
		<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
		<div class="entry-meta">
			<?php cargo_pifour_archive_detail1(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
	    <p>
			<?php
			/* translators: %s: Name of current post */
			echo cargo_pifour_grid_limit_words(strip_tags(get_the_excerpt()),19);
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
