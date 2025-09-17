<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php do_action('fl_head_open'); ?>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php FLTheme::title(); ?>
<?php FLTheme::favicon(); ?>
<?php FLTheme::fonts(); ?>
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
 <!-- Owl Carousel Assets -->
    <link href="<?php echo constant("FL_CHILD_THEME_URL"); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo constant("FL_CHILD_THEME_URL"); ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo constant("FL_CHILD_THEME_URL"); ?>/css/owl.transitions.css" rel="stylesheet">
<?php 

wp_head(); 

FLTheme::head();

?>
  <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-104332177-1', 'auto');
ga('send', 'pageview');

</script>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="<?php echo constant("FL_CHILD_THEME_URL"); ?>/responsive.css" media="all" />
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php 
	
FLTheme::header_code();
	
do_action('fl_body_open'); 

?>
<div class="fl-page">
<?php
	FLTheme::fixed_header();
	?>
<header class="page-header fl-page-header fl-page-header-primary<?php FLTheme::header_classes(); ?>"<?php FLTheme::header_data_attrs(); ?> itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<div class="fl-page-header-wrap">
		<div class="fl-page-header-container container">
			<div class="fl-page-header-row row">
				<div class="col-md-2 col-sm-12 fl-page-header-logo-col">
					<div class="fl-page-header-logo" itemscope="itemscope" itemtype="http://schema.org/Organization">
						<a href="<?php echo home_url(); ?>" itemprop="url"><?php FLTheme::logo(); ?></a>
					</div>
				</div>
				<div class="col-md-10 col-sm-12">
					<div class="fl-page-nav-wrap">
						<div class="fl-page-nav-container container">
							<nav class="fl-page-nav navbar navbar-default" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".fl-page-nav-collapse">
									<span><?php FLTheme::nav_toggle_text(); ?></span>
								</button>
								<div class="fl-page-nav-collapse collapse navbar-collapse">
									<?php

									wp_nav_menu(array(
										'theme_location' => 'header',
										'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
										'container' => false,
										'fallback_cb' => 'FLTheme::nav_menu_fallback'
									));
									?>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="fl-page-header-content">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'social-menu',
						'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
						'container' => false,
						'menu_class' => 'social_menu',
						'fallback_cb' => 'FLTheme::nav_menu_fallback'
					));

					?>
			</div>
		</div>
	</div>
</header><!-- .fl-page-header -->

	<div class="fl-page-content" itemprop="mainContentOfPage">
	
		<?php do_action('fl_content_open'); ?>