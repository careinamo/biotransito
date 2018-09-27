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
<style type="text/css">
	.entry-header{

	}
	.entry-header .post-thumbnail{
		margin-bottom: 2em;
	}
	.entry-header .entry-title{
		font-weight: normal;
		font-size: 5em;
	    hyphens: manual;
	    line-height: 1.2;
	    margin-bottom: .333333em;
	    margin-top: .333333em;
	    -ms-word-wrap: break-word;
	    word-wrap: break-all;
	    word-wrap: break-word;
	}
	.entry-content p{
		line-height: 1.75;
		color: #474747;
		font-size:18px;
		margin-bottom: 2em;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class('cargo-pifour-blog wow fadeInUp'); ?>>



	<header class="entry-header">
		<?php if(is_sticky())
            echo '<span class="post-sticky"><span class="pe-7s-pin"></span>';
        ?>
		<?php the_title('<h2 class="entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>'); ?>
		<?php the_date( 'Y-m-d', '<span>', '</span>' ); ?> Por <?php the_author(); ?>
		<div class="post-thumbnail">
			<a href="<?php echo esc_url(get_permalink()) ; ?>"><?php cargo_pifour_post_thumbnail(); ?></a>		
		</div>
		<div class="entry-meta">
			<?php cargo_pifour_archive_detail(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->


	<div class="entry-content">
	  <p>
		<?php
		/* translators: %s: Name of current post */
		echo cargo_pifour_limit_words(strip_tags(get_the_excerpt()))." . . . .";
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
