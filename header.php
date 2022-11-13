<?php global $theme_options; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<?php wp_head(); ?>
	
	<style><?php echo theme_options_css(); ?></style>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".anchor-section" data-offset="150">

<?php
$hc = "";
if($th = get_field('transparent_header')){
	$hc = "header-transparent";
	if($lc = get_field('transparent_header_link_color')){
		printf('<style>body:not(.scrolled) .header-main-menu a, body:not(.scrolled) header.main-header .header-main-menu ul.main-menu .menu-item-has-children>.dropdown-menu li a, body:not(.scrolled) .mobile-menu-container:not(.open) .mobile-menu-button a { color: %s; }</style>', $lc);
	}
}
?>

<div id="page" class="site <?php echo $hc; ?>">
	
	
	<header class="main-header">
		<div class="header-main-container container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="wrap">
						<div class="brand-container">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix">
								
								<?php
								
								if(isset($theme_options['logo']) && $theme_options['logo']){
									
									if(isset($theme_options['logo_inv']) && $theme_options['logo_inv']){
										printf('<img src="%s" alt="%s" %s class="inverted">', $theme_options['logo_inv']['url'], $theme_options['logo_inv']['alt'], (isset($theme_options['logo_w']) && $theme_options['logo_w'])? 'width="'.$theme_options['logo_w'].'"' : '');
									}
									else {
										//lets output this again so its not a headache to set the css logic
										printf('<img src="%s" alt="%s" %s class="inverted">', $theme_options['logo']['url'], $theme_options['logo']['alt'], (isset($theme_options['logo_w']) && $theme_options['logo_w'])? 'width="'.$theme_options['logo_w'].'"' : '');
									}
									printf('<img src="%s" alt="%s" %s class="default">', $theme_options['logo']['url'], $theme_options['logo']['alt'], (isset($theme_options['logo_w']) && $theme_options['logo_w'])? 'width="'.$theme_options['logo_w'].'"' : '');
								}
								else {
									?>
									<img src="http://placehold.it/200x55">
									<?php
								}
								
								if(isset($theme_options['tagline']) && $theme_options['tagline']){
									printf('<p class="tagline">%s</p>', get_bloginfo('description'));
								}
								?>
							</a>
						</div>
						<?php
						if ( has_nav_menu( 'main-menu' ) ) {
						?>
							<div class="header-main-menu">
							
								<?php 
									wp_nav_menu( array( 'theme_location' => 'main-menu', 
									'items_wrap' => '<ul id="%1$s" class="%2$s main-menu clearfix nav navbar-nav">%3$s</ul>', 
									'container' => 'div', 'container_class' => 'main-menu-wrapper clearfix',
									'walker' => new wp_bootstrap_navwalker(),
									'depth' => 0) );
								?>
							
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="sticky-nav-spacer"></div>
	
	
	<!-- Mobile Menu -->
	<div class="mobile-menu-container">
		<div class="mobile-fixed-buttons">
			<div class="brand-container">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix">
					<?php
					if(isset($theme_options['logo_inv']) && $theme_options['logo_inv']){
						printf('<img src="%s" alt="%s" %s class="inverted">', $theme_options['logo_inv']['url'], $theme_options['logo_inv']['alt'], (isset($theme_options['logo_w']) && $theme_options['logo_w'])? 'width="'.$theme_options['logo_w'].'"' : '');
					}
					else {
						//lets output this again so its not a headache to set the css logic
						printf('<img src="%s" alt="%s" %s class="inverted">', $theme_options['logo']['url'], $theme_options['logo']['alt'], (isset($theme_options['logo_w']) && $theme_options['logo_w'])? 'width="'.$theme_options['logo_w'].'"' : '');
					}
					printf('<img src="%s" alt="%s" %s class="default">', $theme_options['logo']['url'], $theme_options['logo']['alt'], (isset($theme_options['logo_w']) && $theme_options['logo_w'])? 'width="'.$theme_options['logo_w'].'"' : '');
					?>
				</a>
			</div>
			<?php
			if ( has_nav_menu( 'main-menu' ) ) {
			?>
			<div class="mobile-menu-button menu-m-button">
				<a href="#" class="menu-mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i><span class="hidden-xs">Menu</span></a>
			</div>
			<?php } ?>
		</div>
		<?php
		if ( has_nav_menu( 'main-menu' ) ) {
		?>
		<div class="col-sm-12 mobile-menu-overlay">
			<div class="mobile-menu-bg"></div>
			<div class="mobile-menu-content">
				
				<?php 
					wp_nav_menu( array( 'theme_location' => 'main-menu', 
					'items_wrap' => '<ul id="%1$s" class="%2$s main-menu">%3$s</ul>', 
					'container' => 'div', 'container_class' => 'main-menu-wrapper',
					'depth' => 0) );
				?>
				
			</div>
		</div>
		<?php } ?>
		
	</div>

	<main id="content" class="site-content">