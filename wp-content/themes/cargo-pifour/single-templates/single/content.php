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
<style>
	article a.imagen_portada img{
		max-width:945px;
		min-width:945px;
		max-height: 630px;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<br>
	<header class="entry-header">
			<?php the_title( '<h1 style"font:24px;" class="entry-title">', '</h1>' ); ?>			
			<?php the_date( 'Y-m-d', '<span>', '</span>' ); ?> Por <?php the_author(); ?>
	</header><!-- .entry-header -->
	<br>
	<div class="post-thumbnail">
	<a class="imagen_portada" href="#"><?php cargo_pifour_post_thumbnail(); ?></a>
		
	</div>
	<br>
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
			<?php cargo_pifour_post_detail_share(); ?>

    </div>
		<?php  cargo_pifour_post_author(); ?>
</article><!-- #post-## -->
