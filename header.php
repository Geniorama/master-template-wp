<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Master_Template
 */
global $geniorama;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<!--Start Top Header-->
		<?php if ($geniorama['header-top-on-off'] == true): ?>
			<div class="top-header">
				<div class="<?php
					if ($geniorama['header-top-full-w-on-off'] == '1') {
						echo "container-fluid";
					} else {
						echo "container";
					}			
				?>">
					<div class="row align-items-center justify-content-between">
						<div class="col-12 col-md-10 container-top-header">
							<ul class="nav justify-content-start text-left">
								<!--Email header-->
								<?php if ($geniorama['opt-email-info']):?>
								<li class="nav-item">
									<a href="mailto:<?php echo $geniorama['opt-email-info'] ?>" class="nav-link"><i class="<?php echo $geniorama['icon-mail'] ?>"></i> <span><?php echo $geniorama['opt-email-info'] ?></span></a>
								</li>
								<?php endif; ?>

								<!--Phone header-->
								<?php if ($geniorama['opt-phone']):?>
								<li class="nav-item">
									<a href="<?php
									$tel = $geniorama['opt-phone'];
									$tel = str_replace(array('/' , '(' , ')' , '-' , ' '), '', $tel);
									echo $tel;
									?>" class="nav-link" target='_blank'><i class="<?php echo $geniorama['icon-phone'] ?>" aria-hidden="true"></i> <span><?php echo $geniorama['opt-phone'] ?></span></a>
								</li>
								<?php endif; ?>

								<!--Address header-->
								<?php if ($geniorama['opt-address']):?>
								<li class="nav-item">
									<a href="<?php echo $geniorama['opt-url-address'] ?>" class="nav-link" target='_blank'><i class="<?php echo $geniorama['icon-address'] ?>" aria-hidden="true"></i> <span><?php echo $geniorama['opt-address'] ?></span></a>
								</li>
								<?php endif; ?>
							</ul>
						</div>

						<!-- Search box-->
						<?php if($geniorama['search-on-off'] == '1'): ?>
							<div class="col-2 container-box-search text-right">
								<form class="form-search">
									<div class="input-group">
										<input type="search" class="form-control" id="inputsearch" placeholder="<?php echo $geniorama['search-text']; ?>">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-search"></i></div>
										</div>
									</div>
								</form>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<!--Start Bottom Header-->
		<?php if ($geniorama['header-bottom-on-off'] == '1'): ?>
			
			<!-------------------------------Logo left--------------------------------->
			<?php if ($geniorama['header-bottom-style'] == '1'): ?>
				<div class="bottom-header static-header logo-left p-3">
					<div class="<?php
						if ($geniorama['header-bottom-full-w-on-off'] == '1') {
							echo "container-fluid";
						} else {
							echo "container";
						}			
					?>">
						<div class="row align-items-center justify-content-between">
							<div class="col-6 col-md-2">
								<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-select'] == '1') {
									$url_logo_dark = $geniorama['img-logo-dark']['url'];
									

									echo "<img src='$url_logo_dark' class='img-brand' style='max-height: 80px;'>";
								} else {
									$url_logo_light = $geniorama['img-logo-light']['url'];
									echo "<img src='$url_logo_light' class='img-brand' style='max-height: 80px;'>";
								} ?>
								</a>
							</div>
							<div class="col-2  d-block d-md-none">
								<button class="button-toggle-custom button-icon <?php add_class_button('button-toggle'); ?>">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</button>
							</div>
							<div class="col-12 col-md-10 container-nav-header">
								<nav>
									<?php 
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'items_wrap' => '<ul class="nav text-center justify-content-end">%3$s</ul>',
											'menu_class' => 'nav-item'
										) );
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>

				<!----Sticky header left---->
				<?php if ($geniorama['sticky_header'] == '1'): ?>
					<div class="bottom-header sticky-header logo-left p-3">
						<div class="<?php
							if ($geniorama['header-bottom-full-w-on-off'] == '1') {
								echo "container-fluid";
							} else {
								echo "container";
							}			
						?>">
							<div class="row align-items-center justify-content-between">
								<div class="col-8 col-md-2">
									<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-sticky-select'] == '1') {
										$url_logo_dark = $geniorama['img-logo-dark']['url'];
										

										echo "<img src='$url_logo_dark' class='img-fluid img-brand' style='max-height: 80px;'>";
									} else {
										$url_logo_light = $geniorama['img-logo-light']['url'];
										echo "<img src='$url_logo_light' class='img-fluid img-brand' style='max-height: 80px;'>";
									} ?>
									</a>
								</div>
								<div class="col-2  d-block d-md-none">
									<button class="button-toggle-custom button-icon <?php add_class_button('button-toggle'); ?>">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
								</div>
								<div class="col-12 col-md-10 container-nav-header">
									<nav>
										<?php 
											wp_nav_menu( array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'items_wrap' => '<ul class="nav text-center justify-content-end">%3$s</ul>',
												'menu_class' => 'nav-item'
											) );
										?>
									</nav>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			
			<!-------------------------------Logo center--------------------------------->
			<?php if ($geniorama['header-bottom-style'] == '2'): ?>
				<div class="bottom-header static-header logo-center p-3">
					<div class="<?php
						if ($geniorama['header-bottom-full-w-on-off'] == '1') {
							echo "container-fluid";
						} else {
							echo "container";
						}			
					?>">
						<div class="row align-items-center justify-content-between">
							<div class="col-12 col-md-2 order-2">
								<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-select'] == '1') {
										$url_logo_dark = $geniorama['img-logo-dark']['url'];
										

										echo "<img src='$url_logo_dark' class='img-fluid img-brand' style='max-height: 80px;'>";
									} else {
										$url_logo_light = $geniorama['img-logo-light']['url'];
										echo "<img src='$url_logo_light' class='img-fluid img-brand' style='max-height: 80px;'>";
									} ?>
								</a>
							</div>
							<div class="col-12 col-md-5 order-1">
								<nav>
									<?php 
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'items_wrap' => '<ul class="nav text-left ml-0 justify-content-start">%3$s</ul>',
											'menu_class' => 'nav-item'
										) );
									?>
								</nav>
							</div>
							<div class="col-12 col-md-5 text-right order-3">
								<nav>
									<?php 
										wp_nav_menu( array(
											'theme_location' => 'menu-2',
											'menu_id'        => 'secondary-menu',
											'items_wrap' => '<ul class="nav text-left ml-0 justify-content-end">%3$s</ul>',
											'menu_class' => 'nav-item'
										) );
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
				
				<!----Sticky header left---->
				<?php if ($geniorama['sticky_header'] == '1'): ?>
					<div class="bottom-header sticky-header logo-center p-3">
						<div class="<?php
							if ($geniorama['header-bottom-full-w-on-off'] == '1') {
								echo "container-fluid";
							} else {
								echo "container";
							}			
						?>">
							<div class="row align-items-center justify-content-between">
								<div class="col-12 col-md-2 order-2">
									<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-sticky-select'] == '1') {
											$url_logo_dark = $geniorama['img-logo-dark']['url'];
											

											echo "<img src='$url_logo_dark' class='img-fluid img-brand' style='max-height: 80px;'>";
										} else {
											$url_logo_light = $geniorama['img-logo-light']['url'];
											echo "<img src='$url_logo_light' class='img-fluid img-brand' style='max-height: 80px;'>";
										} ?>
									</a>
								</div>
								<div class="col-12 col-md-5 order-1">
									<nav>
										<?php 
											wp_nav_menu( array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'items_wrap' => '<ul class="nav text-left ml-0 justify-content-start">%3$s</ul>',
												'menu_class' => 'nav-item'
											) );
										?>
									</nav>
								</div>
								<div class="col-12 col-md-5 text-right order-3">
									<nav>
										<?php 
											wp_nav_menu( array(
												'theme_location' => 'menu-2',
												'menu_id'        => 'secondary-menu',
												'items_wrap' => '<ul class="nav text-left ml-0 justify-content-end">%3$s</ul>',
												'menu_class' => 'nav-item'
											) );
										?>
									</nav>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>


			<!-------------------------------Logo Right--------------------------------->
			<?php if ($geniorama['header-bottom-style'] == '3'): ?>
				<div class="bottom-header static-header logo-right p-3">
					<div class="<?php
						if ($geniorama['header-bottom-full-w-on-off'] == '1') {
							echo "container-fluid";
						} else {
							echo "container";
						}			
					?>">
						<div class="row align-items-center justify-content-between">
							<div class="col-6 col-md-2 order-2">
								<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-select'] == '1') {
									$url_logo_dark = $geniorama['img-logo-dark']['url'];
									

									echo "<img src='$url_logo_dark' class='img-brand' style='max-height: 80px;'>";
								} else {
									$url_logo_light = $geniorama['img-logo-light']['url'];
									echo "<img src='$url_logo_light' class='img-brand' style='max-height: 80px;'>";
								} ?>
								</a>
							</div>
							<div class="col-2  d-block d-md-none order-3">
								<button class="button-toggle-custom button-icon <?php add_class_button('button-toggle'); ?>">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</button>
							</div>
							<div class="col-12 col-md-10 container-nav-header order-1">
								<nav>
									<?php 
										wp_nav_menu( array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'items_wrap' => '<ul class="nav text-center justify-content-start">%3$s</ul>',
											'menu_class' => 'nav-item'
										) );
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>

				<!----Sticky header Right---->
				<?php if ($geniorama['sticky_header'] == '1'): ?>
					<div class="bottom-header sticky-header logo-left p-3">
						<div class="<?php
							if ($geniorama['header-bottom-full-w-on-off'] == '1') {
								echo "container-fluid";
							} else {
								echo "container";
							}			
						?>">
							<div class="row align-items-center justify-content-between">
								<div class="col-8 col-md-2 order-2">
									<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-sticky-select'] == '1') {
										$url_logo_dark = $geniorama['img-logo-dark']['url'];
										

										echo "<img src='$url_logo_dark' class='img-fluid img-brand' style='max-height: 80px;'>";
									} else {
										$url_logo_light = $geniorama['img-logo-light']['url'];
										echo "<img src='$url_logo_light' class='img-fluid img-brand' style='max-height: 80px;'>";
									} ?>
									</a>
								</div>
								<div class="col-2  d-block d-md-none order-3">
									<button class="button-toggle-custom button-icon <?php add_class_button('button-toggle'); ?>">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
								</div>
								<div class="col-12 col-md-10 container-nav-header order-1">
									<nav>
										<?php 
											wp_nav_menu( array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
												'items_wrap' => '<ul class="nav text-center justify-content-start">%3$s</ul>',
												'menu_class' => 'nav-item'
											) );
										?>
									</nav>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<!-------------------------------Menu Toggle--------------------------------->
			<?php if ($geniorama['header-bottom-style'] == '4'): ?>
				
				<div class="bottom-header menu-toggle-theme p-3
					<?php 
						if ($geniorama['header-top-on-off'] == false) {
							echo "absolute-menu";
						}
					?>">
					<div class="<?php
						if ($geniorama['header-bottom-full-w-on-off'] == '1') {
							echo "container-fluid";
						} else {
							echo "container";
						}			
					?>">
						<div class="row align-items-center justify-content-between">
							<div class="col-6 col-md-2 order-1">
								<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-select'] == '1') {
									$url_logo_dark = $geniorama['img-logo-dark']['url'];
									

									echo "<img src='$url_logo_dark' class='img-brand' style='max-height: 80px;'>";
								} else {
									$url_logo_light = $geniorama['img-logo-light']['url'];
									echo "<img src='$url_logo_light' class='img-brand' style='max-height: 80px;'>";
								} ?>
								</a>
							</div>
							
							<div class="col-2 col-md-1 order-3 jusfity-content-end">
								<button class="button-toggle-custom button-icon <?php add_class_button('button-toggle'); ?>">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Sticky Header Menu Toggle -->

				<?php if ($geniorama['sticky_header'] == '1'): ?>
					<div class="bottom-header sticky-header menu-toggle-theme p-3">
						<div class="<?php
							if ($geniorama['header-bottom-full-w-on-off'] == '1') {
								echo "container-fluid";
							} else {
								echo "container";
							}			
						?>">
							<div class="row align-items-center justify-content-between">
								<div class="col-6 col-md-2 order-1">
									<a href="<?php echo site_url(); ?>"><?php if ($geniorama['opt-logo-select'] == '1') {
										$url_logo_dark = $geniorama['img-logo-dark']['url'];
										

										echo "<img src='$url_logo_dark' class='img-brand' style='max-height: 80px;'>";
									} else {
										$url_logo_light = $geniorama['img-logo-light']['url'];
										echo "<img src='$url_logo_light' class='img-brand' style='max-height: 80px;'>";
									} ?>
									</a>
								</div>
								
								<div class="col-2 col-md-1 order-3 jusfity-content-end">
									<button class="button-toggle-custom button-icon <?php add_class_button('button-toggle'); ?>">
										<i class="fa fa-bars" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="col-12 col-md-3 container-nav-header menu-toggle-container">
					<button class="button-toggle-custom close-menu button-icon <?php add_class_button('button-toggle'); ?>">
						<i class="fas fa-times"></i>
					</button>
					<nav>
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'items_wrap' => '<ul class="nav text-left justify-content-start flex-column">%3$s</ul>',
								'menu_class' => 'nav-item'
							) );
						?>
					</nav>
				</div>
				
			<?php endif; ?>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
