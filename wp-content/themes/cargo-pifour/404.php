<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$theme_options = cargo_pifour_get_theme_option(); 
get_header(); ?>
     
        <div id="primary" class="container ">
            
                <main id="main" class="site-main text-center">
                    <section class="error-404 not-found">

                        <h1 class="page-title-404"><?php echo !empty($theme_options['page_404_title'])? $theme_options['page_404_title'] : esc_html__( '404', 'cargo-pifour' ); ?></h1>
                        <h2><?php echo !empty($theme_options['page_404_sub_title'])? $theme_options['page_404_sub_title'] : esc_html__( 'This page is not be found', 'cargo-pifour' ); ?></h2> 
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <p ><?php echo !empty($theme_options['page_404_message'])? $theme_options['page_404_message'] : esc_html__( 'The page you were looking for is not here. ', 'cargo-pifour' ); ?></p>
                            </div>
                        </div>
                        <?php if(isset($theme_options['page_404_button']) && $theme_options['page_404_button']=='1'): ?>
                            <div class="btn-action">
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="" class="btn btn-primary btn-large" style=""><?php echo esc_html__( 'Back to home', 'cargo-pifour' )?></a>
                            </div>  
                        <?php endif; ?>
                    </section><!-- .error-404 -->
                </main><!-- .site-main -->
            
        </div><!-- .content-area -->
    
<?php get_footer(); ?>