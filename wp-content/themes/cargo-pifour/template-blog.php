<?php
/**
 * Template Name: Blog
 *
 * Creada por deivi lopez para pagina que lista el blog.
 *
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php 
$kale_pages_featured_image_show = 'Default';
$kale_page_meta = get_post_meta(get_the_ID(),'_page_options_meta',TRUE);
if($kale_page_meta) {
    $kale_pages_featured_image_show = $kale_page_meta['featured_image'];
    if($kale_pages_featured_image_show == '' || empty($kale_pages_featured_image_show)) $kale_pages_featured_image_show = 'Default';
} 
?>

<?php while ( have_posts() ) : the_post(); ?>

<?php 
if($kale_pages_featured_image_show == 'Banner' && has_post_thumbnail()) {
    ?>
    <!-- Featured Image (Banner) -->
    <div class="internal-banner">
        <?php 
        $src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'kale-slider' ) ;
        if ($src)$featured_image = $src[0]
        ?>
        <img src="<?php echo esc_url($featured_image) ?>" alt="<?php the_title_attribute(); ?>" />
        
        <div class="caption">
        
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php _e('Page ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            
        </div>
    </div>
    <!-- /Featured Image (Banner) -->
<?php } ?>

<div class="blog-feed">
<!-- Two Columns -->
<div class="row two-columns">
    <?php get_template_part('parts/blog'); ?>
    <?php get_sidebar(); ?>
</div>
<!-- /Two Columns -->
<hr />
</div>
<!-- /Full Width -->

<?php endwhile; ?>
<hr />

<?php get_footer(); ?>