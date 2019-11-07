<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

global $geniorama;
?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		 <?php
			/*Sub heading*/
			if ($geniorama['woo-subheader-on-off']) {
				do_action('heading_section');
			}
			/*End Sub heading*/
		?>	
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="info-filter">
					<span class="filter-toggle d-flex align-items-center">
						<p class="text-toggle m-0 mr-2">Filtros:</p>
						<a href="#"></a>
					</span>
					<form class="woocommerce-ordering" method="get">
							<select name="orderby" class="orderby form-control" aria-label="Pedido de la tienda">
									<option value="menu_order" selected="selected">Predeterminado</option>
									<option value="popularity">Popularidad</option>
									<option value="rating">Calificación media</option>
									<option value="date">Más reciente</option>
									<option value="price">Precio: Menor a Mayor</option>
									<option value="price-desc">Precio: Mayor a Menor</option>
							</select>
							<input type="hidden" name="paged" value="1">
					</form>
				</div>
			</div>
			<div class="col-12 col-md-3 d-none" id="sidebar-container">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Products')): endif; ?>
			</div>
			<div class="col-12" id="products-loop-container">
				<div class="loop-productos padding-section">
					<?php
						if ( woocommerce_product_loop() ) {

							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked woocommerce_output_all_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						
							woocommerce_product_loop_start();
						
							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();
						
									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );
						
									wc_get_template_part( 'content', 'product' );
								}
							}
						
							woocommerce_product_loop_end();
						
							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */


get_footer( 'shop' );
