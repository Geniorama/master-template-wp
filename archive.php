<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Master_Template
 */

get_header();
?>

<section class="heading-services" style="background-image: url('<?php echo $ruta_imagen ?>');">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php the_archive_title(); ?></h1>
			<p><?php the_archive_description(); ?></p>
		<!-- Breadcrumb -->
			<div class="breadcrumbs">
			<?php agregar_breadcrumb(); ?>
		<!-- Fin Breadcrumb -->
			</div>
		</div>
	</div>
</section>
		
					<section class="padding-section">
						<div class="container">
							<div class="row">
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
										<div class="col-12 col-md-6">
										<article class="article-archive">
											<?php the_post_thumbnail('thumnail', array('class' => 'img-fluid')); ?>
											<div class="caption-article d-flex justify-content-center align-items-center flex-column text-center">
												<h2 class="text-light"><?php the_title(); ?></h2>
												<a href="#" class="button-master principal-button">Ver servicio</a>
											</div>
										</article>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</section>
				


<?php

get_footer();
