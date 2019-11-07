<?php get_header();

/*
Template Name: Page with heading
*/

global $post;

$imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
$ruta_imagen = $imagen[0];
?>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); $type = get_post_type( get_the_ID() ); ?>
                    <section class="heading-services" style="background-image: url('<?php echo $ruta_imagen ?>');">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1><?php the_title(); ?></h1>
                                <!-- Breadcrumb -->
                                <div class="breadcrumbs">
                                    <?php agregar_breadcrumb(); ?>
                                    <!-- Fin Breadcrumb -->
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="padding-section content-with-heading">
                        <div class="container">
                            <div class="row">
                               <div class="col-12">
                                    <?php the_content(); ?>
                               </div>
                            </div>
                        </div>
                    </section>
            <?php endwhile; ?>
        <?php endif; ?>
<?php get_footer(); ?>