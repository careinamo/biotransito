<?php
/**
 * Template Name: Productos Deivi
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header(); ?>

<div id="primary" class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <main id="main" class="site-main" role="main">
                <?php
                $wp_query->query('post_type=producto&showposts='.get_option('posts_per_page').'&paged='.$paged);
                // Start the loop.
                while ( have_posts() ) : the_post();
                    // Include the page content template.
                    get_template_part( 'single-templates/content', 'page' );
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile;
                ?>

            </main><!-- .site-main -->
        </div>
    </div>
</div><!-- .content-area -->

<?php get_footer(); ?>