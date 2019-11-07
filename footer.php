<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Master_Template
 */

global $geniorama;

?>

</div><!-- #content -->
	<?php if ($geniorama['active-buttons'] == '1'): ?>
		<!-- FLOAT BUTTONS -->
		<div class="float-buttons  position-fixed <?php echo get_alignment_classes('float-buttons'); ?> animation-up">
			<ul class="nav flex-column">
				<?php if ($geniorama['float-pt-button'] == '1'): ?>
					<!-- Pinterest -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['social-pt']) {
								echo $geniorama['social-pt'];
							}	
						?>" class="float-link link-pinterest button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($geniorama['float-li-button'] == '1'): ?>
					<!-- Linked In -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['social-li']) {
								echo $geniorama['social-li'];
							}	
						?>" class="float-link link-linkedin button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($geniorama['float-tw-button'] == '1'): ?>
					<!-- Twitter -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['social-tw']) {
								echo $geniorama['social-tw'];
							}	
						?>" class="float-link link-twitter button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($geniorama['float-ins-button'] == '1'): ?>
					<!-- Instagram -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['social-ins']) {
								echo $geniorama['social-ins'];
							}	
						?>" class="float-link link-instagram button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($geniorama['float-fb-button'] == '1'): ?>
					<!-- Facebook -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['social-fb']) {
								echo $geniorama['social-fb'];
							}	
						?>" class="float-link link-facebook button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($geniorama['float-yt-button'] == '1'): ?>
					<!-- YouTube -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['social-yt']) {
								echo $geniorama['social-yt'];
							}	
						?>" class="float-link link-youtube button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>

				<?php if ($geniorama['float-what-button'] == '1'): ?>
					<!-- Whatsapp -->
					<li class="nav-item">
						<a href="<?php
							if ($geniorama['opt-whp']) {
								$number_whatsapp = $geniorama['opt-whp'];
							} else {
								$number_whatsapp = "#";
							}

							if ($geniorama['opt-whp-msje']) {
								$message_whatsapp = $geniorama['opt-whp-msje'];

								$message_whatsapp = sprintf(__($message_whatsapp, 'master-template'), $message_whatsapp);
							} else{
								$message_whatsapp = 'Hola';
							}

							echo $api_whatsapp = 'https://wa.me/' . $number_whatsapp . '?text=' . $message_whatsapp;
						?>" class="float-link link-whatsapp button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
					</li>
				<?php endif; ?>
				
				<?php if ($geniorama['float-custom-button'] == '1'): ?>
					<!-- Custom Link -->
					<li class="nav-item"><a href="<?php echo $geniorama['float-link-custom-button']; ?>" class="float-link link-custom button-icon <?php add_class_button('float-buttons'); ?>" target="_blank"><i class="<?php echo $geniorama['icon-custom-button']; ?>"></i></a></li>
				<?php endif; ?>			

				<?php if ($geniorama['float-top-button'] == '1'): ?>
					<!-- Back to top -->
					<li class="nav-item"><a href="#page" class="float-link link-backtop button-icon <?php add_class_button('float-buttons'); ?>"><i class="fa fa-angle-up" aria-hidden="true"></i></a></li>
				<?php endif; ?>
			</ul>
		</div>
	<?php endif; ?>
	

	<footer id="colophon" class="site-footer">
		<!-- Top Footer -->
		<?php if($geniorama['footer-on-off'] == '1'): ?>
			<div class="top-footer">
				<div class="container">
					<?php if ($geniorama['columns-footer'] == '1'): ?>
						<div class="row">
							<div class="col-12 col-md-4">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1')): endif; ?>
							</div>
							<div class="col-12 col-md-4">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2')): endif; ?>
							</div>
							<div class="col-12 col-md-4">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3')): endif; ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ($geniorama['columns-footer'] == '2'): ?>
						<div class="row">
							<div class="col-12 col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1')): endif; ?>
							</div>
							<div class="col-12 col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2')): endif; ?>
							</div>
							<div class="col-12 col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3')): endif; ?>
							</div>
							<div class="col-12 col-md-3">
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4')): endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif;?>

		<!-- Bottom Footer -->
		<div class="bottom-footer p-2 pt-4">
			<div class="container">
				<div class="row">
					
					<?php if ($geniorama['social-nav-on-off'] == '1'): ?>
						<div class="col-12 col-md-4 text-center">
							<ul class="nav social-nav">
								<!--Facebook link-->
								<?php if ($geniorama['social-fb'] && $geniorama['float-fb-button'] == '1'): ?>
									<li class="nav-item">
										<a href="<?php echo $geniorama['social-fb']; ?>" class="button-icon <?php add_class_button('social-nav'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									</li>
								<?php endif; ?>

								<!--Twitter link-->
								<?php if ($geniorama['social-tw'] && $geniorama['float-tw-button'] == '1'): ?>
									<li class="nav-item">
										<a href="<?php echo $geniorama['social-tw']; ?>" class="button-icon <?php add_class_button('social-nav'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									</li>
								<?php endif; ?>

								<!--YouTube link-->
								<?php if ($geniorama['social-yt'] && $geniorama['float-yt-button'] == '1'): ?>
									<li class="nav-item">
										<a href="<?php echo $geniorama['social-yt']; ?>" class="button-icon <?php add_class_button('social-nav'); ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
									</li>
								<?php endif; ?>

								<!--Instagram link-->
								<?php if ($geniorama['social-ins'] && $geniorama['float-ins-button'] == '1'): ?>
									<li class="nav-item">
										<a href="<?php echo $geniorama['social-ins']; ?>" class="button-icon <?php add_class_button('social-nav'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									</li>
								<?php endif; ?>

								<!--Pinterest link-->
								<?php if ($geniorama['social-pt'] && $geniorama['float-pt-button'] == '1'): ?>
									<li class="nav-item">
										<a href="<?php echo $geniorama['social-pt']; ?>" class="button-icon <?php add_class_button('social-nav'); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
									</li>
								<?php endif; ?>

								<!--LinkedIn link-->
								<?php if ($geniorama['social-li'] && $geniorama['float-li-button'] == '1'): ?>
									<li class="nav-item">
										<a href="<?php echo $geniorama['social-li']; ?>" class="button-icon <?php add_class_button('social-nav'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
					<div class="col-12 col-md-4 text-center">
						<p>Copyright <?php if ($geniorama['client-name']): echo $geniorama['client-name']; endif;?> 2019 | Todos los derechos reservados</p>
					</div>
					<div class="col-12 col-md-4 text-center">
						<p>Diseñado y desarrollado por <a href="<?php if ($geniorama['copy-url']): echo $geniorama['copy-url']; endif;?>" target="_blank" class="text-link"><?php if ($geniorama['copy-name']): echo $geniorama['copy-name']; endif;?></a></p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
