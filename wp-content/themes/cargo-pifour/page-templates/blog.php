<?php
/**
 * Template Name: Blog Deivi
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

/* get side-bar position. */
$_get_sidebar = cargo_pifour_archive_sidebar();
 
get_header(); ?>
<style type="text/css">
    h1{
        text-align: center;
    }
    article header h4 a{
        color: #f00;
    }
    #primary{
        padding-top:60px;
    }
    .site-content .site-main .cargo-pifour-blog, .site-content .site-main .post {
        /*padding-top:60px;   */
    }
    .site-content .site-main .cargo-pifour-blog, .site-content .site-main .post {
        margin-bottom: 60px;
    }
</style>
<section style="background: #fff;" id="primary" class="container ">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile;  ?> 

    <h1 >Nuestro Blog</h1>
<?php
global $wp_query, $paged; 
$wp_query->query('post_type=blog&showposts='.get_option('posts_per_page').'&paged='.$paged);
if ( have_posts() ) :
?>
    <div  class="row <?php echo esc_attr($_get_sidebar); ?> " >
        <div class="<?php cargo_pifour_archive_class(); ?>">
            <main id="main" class="site-main" role="main">
                <?php                     
                    while ( have_posts() ) : the_post();
                        if(!is_sticky())
                        get_template_part( 'single-templates/content/content_blog', get_post_format() );                        
                    endwhile; // end of the loop.                     
                    /* blog nav. */
                    cargo_pifour_paging_nav();
                ?>
            </main><!-- #content -->
        </div>
        <?php
        if($_get_sidebar != 'is-sidebar-full'):
            get_sidebar();
        endif; ?>

    </div>
<?php 
else : 
    ?>
    <div class="row <?php echo esc_attr($_get_sidebar); ?>">
        <div class="<?php cargo_pifour_archive_class(); ?>">
            <main id="main" class="site-main" role="main">
            <?php get_template_part( 'single-templates/content', 'none' ); ?>
            </main><!-- #content -->
        </div>
        <?php
        if($_get_sidebar != 'is-sidebar-full'):
            get_sidebar();
        endif; ?>
    </div>
<?php endif; ?>
</section><!-- #primary -->

<?php get_footer(); ?>