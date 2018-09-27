<?php
$theme_options = cargo_pifour_get_theme_option();
$container_class = 'container';
if( !empty($theme_options['header_top_full_width']) && $theme_options['header_top_full_width'] == '1')
    $container_class = 'container-fullwidth';
?>
<?php if ( is_active_sidebar( 'header-top-1-left' ) || is_active_sidebar( 'header-top-1-right' )  ) : ?>
<div id="header_top" class="header-top layout1">
    <div class="<?php echo esc_attr($container_class);?>">
        <div class="header-top-wrap clearfix">
            <?php if ( is_active_sidebar( 'header-top-1-left' )  ) : ?>
            <div class="header-top-left">
                <?php dynamic_sidebar('header-top-1-left'); ?>
            </div>
            <?php endif;?>
            <?php if ( is_active_sidebar( 'header-top-1-right' )  ) : ?>
            <div class="header-top-right hidden-xs hidden-sm">
                <?php dynamic_sidebar('header-top-1-right'); ?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php endif;?> 