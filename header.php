<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="site-header" style='background-image: url("<?=get_header_image() ?>")'>
		<div class="container">
			<div class="site-logo-container">
				<?php the_custom_logo() ?>
				<div class="logo-title">
					<?php bloginfo('name'); ?>
				</div>
				<div class="logo-subtitle">
					<?php bloginfo('description'); ?>
				</div>
			</div>
			<?php wp_nav_menu(['theme_location'=>'menu-top', 'container'=>'nav']);?>
		</div>


	</header>

	<main>
