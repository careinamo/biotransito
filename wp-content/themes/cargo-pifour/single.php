<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

/* get side-bar position. */
$_get_sidebar = cargo_pifour_post_sidebar();


get_header(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="primary" class="container ">
    <div class="row row-single <?php echo esc_attr($_get_sidebar); ?>">
        <div class="<?php cargo_pifour_post_class(); ?>">
            <main id="main" class="site-main" role="main">

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the single content template.
                    get_template_part( 'single-templates/single/content', get_post_format() );
  
                    // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    // Get single post nav.
                    cargo_pifour_post_nav();
                    // End the loop.
                endwhile;
                ?>

            </main>
        </div><!-- #main -->

        <?php  
          if($_get_sidebar != 'is-sidebar-full'):
            get_sidebar();
          endif; ?>

    </div>
    <div class="comentarios">
        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="10" data-order-by="social" data-colorscheme="light"></div>
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>