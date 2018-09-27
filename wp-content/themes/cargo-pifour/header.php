<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(get_template_directory_uri() . '/favicon.ico'); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>
	<style type="text/css">
	html{
		font-size:50px;
	}
	#page-title-text{
		display:none;
	}

	main article h4{
		margin-top: 40px !important;
	}

	article header h4 a{
		color: #000;
	}

	article footer a{
		color: #000;
	}

	article .entry-content p{
		color: #000;
	}

	.mysocialwid{
		font-size: 30px !important;
	}

	.footer-bottom-left{
		width: 100% !important;
	}

	#my_social_widget-2{
		float: left !important;
		padding-left: 30px !important;
	}


	#text-8{
		float: right !important;
	  margin-top: 0px !important;
	}

	form{
		margin-top: 50px;
		text-align: center;
	}

	form label{
		color: green;
		font-size: 15px;
	}

	form label input{
		border-color: green !important;
	}

	form label textarea{
		border-color: green !important;
	}

	form p input{
		border-color: green !important;
		color: green;
	}
</style>
<body <?php body_class(); ?>>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119018897-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119018897-1');
</script>	
<div id="page" class="hfeed site <?php cargo_pifour_general_class();?>">
	<header id="masthead" class="site-header <?php cargo_pifour_header_layout_class('header-layout1');?>" role="banner">
		<?php cargo_pifour_header(); ?>
	</header><!-- #masthead -->
    <?php cargo_pifour_page_title(); ?><!-- #page-title -->
	<div id="content" class="site-content">