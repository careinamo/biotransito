<?php
/**
 * @name : Default Header
 * @package : Spyropress
 * @author : Knight
 */
 
?>
<?php cargo_pifour_header_top();?>
<div id="header_middle" class="header-middle">
    <div class="container">
        <div class="header-middle-wrap">
            <?php if ( is_active_sidebar( 'header-middle-1-left' )  ) : ?>
            <div class="header-middle-left hidden-xs hidden-sm hidden-md">
                <?php dynamic_sidebar('header-middle-1-left'); ?>
            </div>
            <?php endif;?>
            <div id="cshero-header-logo" class="site-branding header-middle-center">
                <?php cargo_pifour_header_logo(); ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-navigation" aria-expanded="false">
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
            </div>                    
            <?php if ( is_active_sidebar( 'header-middle-1-right' )  ) : ?>
            <div class="header-middle-right hidden-xs hidden-sm hidden-md">
                <?php dynamic_sidebar('header-middle-1-right'); ?>
            </div>
            <?php endif;?>
        </div> 
    </div>
</div>
<div id="cshero-header" class="<?php cargo_pifour_header_class('cshero-main-header'); ?>">
    <div class="main-header-wrap">
        <div class="container">
            <div class="main-header-outer">
                <div id="cshero-header-navigation" class="header-navigation ">
                    <nav id="site-navigation" class="collapse main-navigation">
                        <?php cargo_pifour_header_navigation(); ?>
                    </nav> 
                    <?php if ( is_active_sidebar( 'menu-sidebar' )  ) : ?>
                    <div class="menu-sidebar-list hidden-xs hidden-sm hidden-md">
                        <?php dynamic_sidebar('menu-sidebar'); ?>
                    </div>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>
     
</div>  