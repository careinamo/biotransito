<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<?php  global $opt_theme_options; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

			<?php the_content(); ?>

	</div><!-- .entry-content -->

	<?php if(!empty( $opt_theme_options['page_show_frontend_editor']) && $opt_theme_options['page_show_frontend_editor'] == '1'):?>
		<footer class="entry-meta">

				<?php edit_post_link( esc_html__( 'Edit Page', 'cargo-pifour' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-meta -->
	<?php endif; ?>
</article><!-- #post -->
