<?php

/*============================ VC CUSTOM MASTER ==========================*/


//Shortcode Button Master
function button_master_func( $atts ) {
	
	global $geniorama;

	$atts = shortcode_atts(
        array(
            'text-button' => 'something',
			'link-button' => '#',
			'class-color' => 'principal-button',
			'size-button' => 'large-button',
        ),
        $atts,
        'button_master'
    );

    $texto_boton = $atts['text-button'];
    $url_boton = $atts['link-button'];
	$clase_color = $atts['class-color'];
	$clase_tamano = $atts['size-button'];
	
	$clase_master_boton = '';

	if ($geniorama['select-button-type'] == 1) {
		$clase_master_boton = 'button-rounded';
	} elseif($geniorama['select-button-type'] == 2){
		$clase_master_boton = 'button-half-rounded';
	} else {
		$clase_master_boton = 'button-squared';
	}

	$boton = '<a href="'.$url_boton.'" class="button-master '.$clase_master_boton.' '.$clase_color.' '.$clase_tamano.'">'.$texto_boton.'</a>';
  
    return $boton;
}

add_shortcode( 'button_master', 'button_master_func' );


//VC Custom Button Master
function button_master_vc() {
 vc_map( array(
  "name" => __( "Button Master", "master-template" ),
  "base" => "button_master",
  "class" => "",
  "category" => __( "Content", "master-template"),
  "params" => array(
			array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __( "Button Text", "master-template" ),
			"param_name" => "text-button"
			),

			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __( "Link", "master-template" ),
				"param_name" => "link-button",
				"value"	=> "#"
			),

			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Button Color", "master-template" ),
				"param_name" => "class-color",
				"value" => array(
					__( 'Principal Button',  "master-template"  ) => 'principal-button',
					__( 'Secondary Button',  "master-template"  ) => 'secondary-button',
				),
				"description" => __( "Description for foo param.", "master-template" )
			),

			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Button Size", "master-template" ),
				"param_name" => "size-button",
				"value" => array(
					__( 'Large',  "master-template"  ) => 'large-button',
					__( 'Normal',  "master-template"  ) => 'normal-button',
					__( 'Small',  "master-template"  ) => 'small-button',
				),
				"description" => __( "Chose Small, Normal or Large", "master-template" )
			),
  )
 ) );
}

add_action( 'vc_before_init', 'button_master_vc' );



//Shortcode Master Carousel
function master_carousel_func( $atts ) {

	$clases_carousel = get_class_button('owl-nav');
	$nav_alignment = get_alignment_classes('owl-nav'); 

	// Attributes
	$atts = shortcode_atts(
		array(
			'data-images' => '',
			'title-carousel' => '',
			'carousel-nav'   => true,
			'carousel-dots'  => true,
			'carousel-items' => true,
			'carousel-loop' => true,
			'carousel-center' => true,
			'carousel-aplay' => true,
			'carousel-time' => 5000,
			'lightbox-img' => '',
			'custom-url' => '#',
		),
		$atts,
		'master_carousel'
	);
	

	//Atributes Carousel
	$carousel_nav = $atts['carousel-nav'];
	$carousel_dots = $atts['carousel-dots'];
	$carousel_items = $atts['carousel-items'];
	$carousel_loop = $atts['carousel-loop'];
	$carousel_center = $atts['carousel-center'];
	$carousel_aplay = $atts['carousel-aplay'];
	$carousel_time = $atts['carousel-time'];

	$lightbox_img = $atts['lightbox-img'];
	$custom_url_img = $atts['custom-url'];

	

	//images carousel
	$image_ids=explode(',',$atts['data-images']);


	//id carousel
	$id_carousel = $atts['title-carousel'];
	$id_carousel = str_replace(' ', '-', $id_carousel);
	$id_carousel = strtolower($id_carousel);
	
	// Output Code
	$output .= "<div id='$id_carousel' class='owl-carousel'  data-nav='$carousel_nav' data-items='$carousel_items' data-dots='$carousel_dots' data-loop='$carousel_loop' data-center='$carousel_center' data-aplay='$carousel_aplay' data-time='$carousel_time' data-carousel-class='$clases_carousel' data-nav-class='$nav_alignment'>";
  
	foreach( $image_ids as $image_id ){
	  //URL IMAGE
	  if ($lightbox_img == 'image-gallery') {
		$url_image = wp_get_attachment_image_url($image_id, 'full');
		$the_image = wp_get_attachment_image( $image_id, 'full' , '', array('class' => 'img-fluid') );
		$the_tag = "<a href='$url_image' data-lightbox='roadtrip'>$the_image</a>";

	  } elseif ($lightbox_img == 'custom-link') {
		$url_image = $custom_url_img;
		$the_image = wp_get_attachment_image( $image_id, 'full' , '', array('class' => 'img-fluid') );
		$the_tag = "<a href='$url_image' target='_blank'>$the_image</a>";

	  } elseif ($lightbox_img == 'none') {
		$the_image = wp_get_attachment_image( $image_id, 'full' , '', array('class' => 'img-fluid') );
		$the_tag = "<div>$the_image</div>";
	  }
	  

	  $output .='<div class="item-owl">';
	  $output .=$the_tag;
	  $output .='</div>';
	}
	$output .= '</div>';
  
	return $output;

}

add_shortcode( 'master_carousel', 'master_carousel_func' );


//VC Master Carousel
function master_carousel_vc() {
 vc_map(
	array(
		'name' => __( 'Master Carousel' ),
		'base' => 'master_carousel',
		"category" => __( "Content", "master-template"),
		'params' => array(
			array(
				"type"        => "textfield",
				"holder" => "div",
				"heading"     => esc_html__( "Title Carousel", "master-template" ),
				"param_name"  => "title-carousel",
			),

			array(
			"type"        => "attach_images",
			"heading"     => esc_html__( "Add Images", "master-template" ),
			"param_name"  => "data-images",
			),

			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Number Items Show", "master-template" ),
				"param_name"  => "carousel-items",
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Autoplay", "master-template" ),
				"description" => esc_html__( "Activate or desactivate autoplay", "master-template" ),
				"param_name" => "carousel-aplay",
				"value" => array(
					__('Active','master-template') => 'true',
					__('Inactive','master-template') => 'false'
				),
			),

			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Miliseconds Autoplay", "master-template" ),
				"param_name"  => "carousel-time",
				"value"       => 5000,
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Show nav", "master-template" ),
				"description" => esc_html__( "Show or hide nav arrows", "master-template" ),
				"param_name" => "carousel-nav",
				"value" => array(
					__('Active','master-template') => 'true',
					__('Inactive','master-template') => 'false'
				),
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Show Dots", "master-template" ),
				"description" => esc_html__( "Show or hide nav dots", "master-template" ),
				"param_name" => "carousel-dots",
				"value" => array(
					__('Active','master-template') => 'true',
					__('Inactive','master-template') => 'false'
				),
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Loop Items", "master-template" ),
				"description" => esc_html__( "Add the loop to your carousel", "master-template" ),
				"param_name" => "carousel-loop",
				"value" => array(
					__('Active','master-template') => 'true',
					__('Inactive','master-template') => 'false'
				),
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Center Items", "master-template" ),
				"description" => esc_html__( "Center your items carousel", "master-template" ),
				"param_name" => "carousel-center",
				"value" => array(
					__('Active','master-template') => 'true',
					__('Inactive','master-template') => 'false'
				),
			),

			array(
				"type" => "dropdown",
				"heading" => esc_html__( "Lightbox Image", "master-template" ),
				"description" => esc_html__( "Lightbox Image", "master-template" ),
				"param_name" => "lightbox-img",
				"value" => array('Select Option', 'None' ,'Image Gallery', 'Custom Link'),
				"value" => array(
					__('None','master-template') => 'none',
					__('Image Gallery','master-template') => 'image-gallery',
					__('Custom Link','master-template') => 'custom-link'
				),
			),

			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Custom URL", "master-template" ),
				"param_name"  => "custom-url",
				"value"       => "#",
				"dependency"  => array(
					'element'	=>	'lightbox-img',
					'value'		=>	'Custom Link'
				),
			),

		)
	)
 );
}

add_action( 'vc_before_init', 'master_carousel_vc' );


//Shortcode Master Post Carousel
function master_post_carousel_func($atts){
		$atts = shortcode_atts(
			array(
				'title-carousel'	=> '',
				'carousel-nav'   	=> true,
				'carousel-dots'  	=> true,
				'carousel-items' 	=> 3,
				'carousel-loop' 	=> false,
				'carousel-center'   => false,
				'carousel-aplay' 	=> true,
				'carousel-time' 	=> 5000,
				'post-type'	  		=> 'post'
			),
			$atts,
			'master_post_carousel'
		);

        $args = array(
            'post_type' => $atts['post-type'],
			'post_status' => 'publish'
			//'posts_per_page' => 3	
		);
		
		//id carousel
		$id_carousel = $atts['title-carousel'];
		$id_carousel = str_replace(' ', '-', $id_carousel);
		$id_carousel = strtolower($id_carousel);

		$string = '';
		
        $query = new WP_Query( $args );
        if( $query->have_posts() ){
		   
			//Contenedor Carrusel
			$string .= '<div id="'.$id_carousel.'" class="owl-carousel" data-nav="'. $atts["carousel-nav"] .'" data-items="'. $atts["carousel-items"] .'" data-dots="'. $atts["carousel-dots"] .'" data-center="'. $atts["carousel-center"] .'" data-loop="'. $atts["carousel-loop"] .'" data-aplay="'. $atts["carousel-aplay"] .'" data-time="'. $atts["carousel-time"] .'">';
				
				//Loop de items carrusel
				while( $query->have_posts() ){
					$query->the_post();
					$type = get_post_type( get_the_ID() );

					if ($type == 'product') {
						global $woocommerce;
						$currency = get_woocommerce_currency_symbol();
						$price = get_post_meta( get_the_ID(), '_regular_price', true);
						$sale = get_post_meta( get_the_ID(), '_sale_price', true);

						//Salida de contenido
						$string .= '<div class="card mb-4 item-carousel">';
						$string .= '<div class="container-caption">';
						$string .= get_the_post_thumbnail($post = null, $size = "post-full", $attr = "class=card-img-top img-fluid");
						$string .= '<div class="caption d-flex flex-column justify-content-center align-items-center">';
						$string .= '<a href='. get_the_permalink() .' class="info" title="Full Image"><i class="fas fa-link"></i></a>';		
						$string .= '</div>';
						$string .= '</div>';
						$string .= '<div class="card-body">';
						$string .= '<span class="date-blog">';
						$string .=  $currency . $sale;
						$string .= '</span>';
						$string .= '<hr>';		
						$string .= '<a href='. get_the_permalink() .' class="title-link"><h5 class="card-title blog-title" style="padding-top:0px">' . get_the_title() . '</h5></a>';			
						$string .= '<p class="card-text">';
						$string .= get_the_excerpt();
						$string .= '</p>';
						$string .= '<a href='. get_the_permalink() .' class="btn btn-primary btn-lg btn-block">Leer más</a>';
						$string .= '</div>';
						$string .= '</div>';
						
					} else {
						//Salida de contenido
						$string .= '<div class="card mb-4 item-carousel">';
						$string .= '<div class="container-caption">';
						$string .= get_the_post_thumbnail($post = null, $size = "post-full", $attr = "class=card-img-top img-fluid");
						$string .= '<div class="caption d-flex flex-column justify-content-center align-items-center">';
						$string .= '<a href='. get_the_permalink() .' class="info" title="Full Image"><i class="fas fa-link"></i></a>';		
						$string .= '</div>';
						$string .= '</div>';
						$string .= '<div class="card-body">';
						$string .= '<span class="date-blog">';
						$string .=  get_the_date();
						$string .= '</span>';
						$string .= '<hr>';		
						$string .= '<a href='. get_the_permalink() .' class="title-link"><h5 class="card-title blog-title" style="padding-top:0px">' . get_the_title() . '</h5></a>';			
						$string .= '<p class="card-text">';
						$string .= get_the_excerpt();
						$string .= '</p>';
						$string .= '<a href='. get_the_permalink() .' class="btn btn-primary btn-lg btn-block">Leer más</a>';
						$string .= '</div>';
						$string .= '</div>';
					}

				}
            $string .= '</div>';
        }
        wp_reset_postdata();
        return $string;
}

add_shortcode( 'master_post_carousel', 'master_post_carousel_func' );


//VC Master Post Carousel
function master_post_carousel_vc() {
	vc_map(
	   array(
		   'name' => __( 'Master Post Carousel' ),
		   'base' => 'master_post_carousel',
		   "category" => __( "Content", "master-template"),
		   'params' => array(
			   array(
				   "type"        => "textfield",
				   "holder" => "div",
				   "heading"     => esc_html__( "Title Post Carousel", "master-template" ),
				   "param_name"  => "title-carousel",
				   "value"       => ""
			   ),
   
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Post Type", "master-template" ),
				   "description" => esc_html__( "Select the Post Type to show", "master-template" ),
				   "param_name" => "post-type",
				   'value' => array(
						__( 'Post',  "master-template"  ) => 'post',
						__( 'Product Woocommerce',  "master-template"  ) => 'product'
					)
			   ),
   
			   array(
				   "type"        => "textfield",
				   "heading"     => esc_html__( "Number Items to Show", "master-template" ),
				   "param_name"  => "carousel-items",
				   "value"       => ""
			   ),
   
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Autoplay", "master-template" ),
				   "description" => esc_html__( "Activate or desactivate autoplay", "master-template" ),
				   "param_name" => "carousel-aplay",
				   'value' => array(
						__( 'Activate',  "master-template"  ) => true,
						__( 'Desactivate',  "master-template"  ) => false
					)
			   ),
   
			   
			   array(
				   "type"        => "textfield",
				   "heading"     => esc_html__( "Miliseconds Autoplay", "master-template" ),
				   "param_name"  => "carousel-time",
				   "value"       => ""
			   ),
   
			   
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Show nav", "master-template" ),
				   "description" => esc_html__( "Show or hide nav arrows", "master-template" ),
				   "param_name" => "carousel-nav",
				   'value' => array(
						__( 'Activate',  "master-template"  ) => true,
						__( 'Desactivate',  "master-template"  ) => false
					)
			   ),
			  
			   
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Show Dots", "master-template" ),
				   "description" => esc_html__( "Show or hide nav dots", "master-template" ),
				   "param_name" => "carousel-dots",
				   "value" => array(
						__( 'Activate',  "master-template"  ) => true,
						__( 'Desactivate',  "master-template"  ) => false
					)
			   ),
			   
			 
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Loop Items", "master-template" ),
				   "description" => esc_html__( "Add the loop to your carousel", "master-template" ),
				   "param_name" => "carousel-loop",
				   "value" => array(
						__( 'Activate',  "master-template"  ) => true,
						__( 'Desactivate',  "master-template"  ) => false
					)
			   ),
   
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Center Items", "master-template" ),
				   "description" => esc_html__( "Center your items carousel", "master-template" ),
				   "param_name" => "carousel-center",
				   "value" => array(
						__( 'Activate',  "master-template"  ) => true,
						__( 'Desactivate',  "master-template"  ) => false
					)
			   ),
		   )
	   )
	);
}
   
add_action( 'vc_before_init', 'master_post_carousel_vc' );

//Shortcode Master Post Grid
function master_post_grid_func($atts){
	$atts = shortcode_atts(
		array(
			'title-grid'		=> 'Default title',
			'post-type'	  		=> 'post',
			'limit-post'	  	=> '',
			'cat-post'			=> '',
			'orderby'			=> 'name',
			'order'				=> 'ASC',
			'number-cols'		=> 3
		),
		$atts,
		'master_post_grid'
	);

	$post_cat = $atts['cat-post'];

	$num_cols = '';

	if ($atts['number-cols'] == 4) {
		$num_cols = 'col-md-3';
	} elseif ($atts['number-cols'] == 3){
		$num_cols = 'col-md-4';
	}

	$args = array(
		'post_type' 		=> $atts['post-type'],
		'post_status' 		=> 'publish',
		'posts_per_page' 	=> $atts['limit-post'],
		//'cat'				=> $post_cat,
		'orderby'			=> $atts['orderby'],
		'order'				=> $atts['order']
	);
	
	$id_grid = $atts['title-grid'];
	$id_grid = str_replace(' ', '-', $id_grid);
	$id_grid = strtolower($id_grid);

	$string = '';
	
	$query = new WP_Query( $args );
	if( $query->have_posts() ){
	   
		//Contenedor Grid
		$string .= '<div id="'.$id_grid.'" class="row">';
			
			//Loop de Items Grid
			while( $query->have_posts() ){
				$query->the_post();
				$type = get_post_type( get_the_ID() );
				$productId = $query->post->ID;
				
				

				if ($type == 'product') {
					global $woocommerce;
					global $product;
					$currency = get_woocommerce_currency_symbol();
					$price = get_post_meta( get_the_ID(), '_regular_price', true);
					$sale = get_post_meta( get_the_ID(), '_sale_price', true);

					$price_html = $product->get_price_html();

					$category = wc_get_product_category_list( $product->get_id(), ', ', '<span class="category">' . _n( '', '', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' );

					//Salida de contenido
					$string .= '<div class="col-12 p-2 '.$num_cols.'">';
					$string .= '<div class="card-post product">';
					$string .= '<div class="container-image">';
					$string .= get_the_post_thumbnail($post = null, $size = "post-full", $attr = "class=img-card-post img-fluid");
					$string .= '<div class="caption">';
					$string .= '<a href="#" class="button-circle">Button Icon</a>';
					$string .= '<a class="button-circle add_to_cart_button ajax_add_to_cart" href="?add-to-cart='.$productId.'" data-product_id="'.$productId.'"><i class="fas fa-cart-plus"></i></a>';
					$string .= '</div>';
					$string .= '</div>';
					$string .= '<div class="info">';
					$string .= $category;		
					$string .= '<hr>';
					$string .= '<a href="'.get_the_permalink().'" class="link-title"><h5 class="title">'.get_the_title().'</h5></a>';
					//$string .= '<p class="excerpt">'.get_the_excerpt().'</p>';
					$string .= '<span class="price d-block">'.$price_html.'</span>';	
					$string .= '<a href="'.get_the_permalink().'" class="button-master principal-button">Ver Productos</a>';
					$string .= '</div>';
					$string .= '</div>';
					$string .= '</div>';
					
				} else {
					$categories = get_the_category();
					

					foreach ($categories as $category_post) {
						$name = $category_post->name;
						$cat_link = get_category_link($category_post->cat_ID);
						var_dump($link);
						$div_cat = "<a href=".$cat_link."><span class='category'>".$name."</span></a>";
					}
					
					
					
					//Salida de contenido
					$string .= '<div class="col-12 p-5 '.$num_cols.'">';
					$string .= '<div class="card-post post">';
					$string .= '<div class="container-image">';
					$string .= '<span class="category">'.get_the_category().'</span>';	
					$string .= get_the_post_thumbnail($post = null, $size = "post-full", $attr = "class=img-card-post img-fluid");
					$string .= '<div class="caption">';
					$string .= '<a href="#">Button</a>';
					$string .= '<a href="#">Button 2</a>';
					$string .= '</div>';
					$string .= '</div>';
					$string .= '<div class="info">';
					$string .= $div_cat;	
					$string .= '<span class="date d-block">'.get_the_date().'</span>';		
					$string .= '<hr>';
					$string .= '<a href="'.get_the_permalink().'" class="link-title"><h5 class="title">'.get_the_title().'</h5></a>';
					$string .= '<p class="excerpt">'.get_the_excerpt().'</p>';
					$string .= '<a href="'.get_the_permalink().'" class="button-master principal-button">Ver Más</a>';
					$string .= '</div>';
					$string .= '</div>';
					$string .= '</div>';
				}

			}
		$string .= '</div>';
	}
	wp_reset_postdata();
	return $string;
}

add_shortcode( 'master_post_grid', 'master_post_grid_func' );


//VC Master Post Grid
function master_post_grid_vc() {
	vc_map(
	   array(
		   'name' => __( 'Master Post Grid' ),
		   'base' => 'master_post_grid',
		   "category" => __( "Content", "master-template"),
		   'params' => array(
			   array(
				   "type"        => "textfield",
				   "holder" => "div",
				   "heading"     => esc_html__( "Title Post Grid", "master-template" ),
				   "param_name"  => "title-carousel",
				   "value"       => ""
			   ),
   
			   array(
				   "type" => "dropdown",
				   "heading" => esc_html__( "Post Type", "master-template" ),
				   "description" => esc_html__( "Select the Post Type to show", "master-template" ),
				   "param_name" => "post-type",
				   'value' => array(
						__( 'Post',  "master-template"  ) => 'post',
						__( 'Product Woocommerce',  "master-template"  ) => 'product'
					)
			   ),
   
			   array(
				   "type"        => "textfield",
				   "heading"     => esc_html__( "Limit Items to Show", "master-template" ),
				   "param_name"  => "limit-post",
				   "value"       => ""
			   ),
   
			   array(
				   "type" => "textfield",
				   "heading" => esc_html__( "Categories", "master-template" ),
				   "description" => esc_html__( "Show only this categories", "master-template" ),
				   "param_name" => "cat-post",
				   "value"       => ""
			   ),

			   array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", "master-template" ),
					"description" => esc_html__( "Order your elements by this atributes", "master-template" ),
					"param_name" => "orderby",
					'value' => array(
						__( 'Name',  "master-template"  ) => 'name',
						__( 'Date',  "master-template"  ) => 'date'
					)
				),
   
			   
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", "master-template" ),
					"description" => esc_html__( "Order your elements Asc or Desc", "master-template" ),
					"param_name" => "order",
					'value' => array(
						__( 'Upward',  "master-template"  ) => 'ASC',
						__( 'Falling',  "master-template"  ) => 'DESC'
					)
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number of Columns", "master-template" ),
					"description" => esc_html__( "Show the items in this number of columns", "master-template" ),
					"param_name" => "number-cols",
					'value' => array(
						__( '3 cols',  "master-template"  ) => 3,
						__( '4 cols',  "master-template"  ) => 4
					)
				),
   
		   )
	   )
	);
}
   
add_action( 'vc_before_init', 'master_post_grid_vc' );


//Shortcode Master Categories
function master_categories_func( $atts ) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'title' => 'Título Categoría',
            'button-text' => 'Ver productos',
            'button-type' => 'principal-button',
            'button-url'  => '',
            'image-category'  => '',
        ),
        $atts,
        'master_categories'
    );

    $idImage = $atts['image-category'];
    $ImageCategory = wp_get_attachment_image_url($idImage, 'full');

    $string = '';

    $string .= '<div class="envases-categories mb-4">';
    $string .= '<img src='.$ImageCategory.' alt="" width="100%" height="auto">';
    $string .= '<div class="caption text-center d-flex flex-column justify-content-center align-items-center">';
    $string .= '<h3>'.$atts['title'].'</h3>';
    $string .= '<a href='.$atts['button-url'].' class="button-master '.$atts['button-type'].' mt-3">'.$atts['button-text'].'</a>';
    $string .= '</div>';
    $string .= '</div>';

    return $string;

}
add_shortcode( 'master_categories', 'master_categories_func' );


//VC Master Categories
function master_categories_vc() {
    vc_map(
       array(
           'name' => __( 'Master Categories Item' ),
           'base' => 'master_categories',
           'category' => __( 'Content', 'master-template'),
           'params' => array(
               array(
                   "type"        => "textfield",
                   "holder" => "div",
                   "heading"     => esc_html__( "Title Category", "master-template" ),
                   "param_name"  => "title",
                   "value"       => "",
               ),
   
               array(
               "type"        => "attach_image",
               "heading"     => esc_html__( "Add Image", "master-template" ),
               "param_name"  => "image-category",
               "value"       => "",
               ),
   
               array(
                   "type"        => "textfield",
                   "heading"     => esc_html__( "Button Text", "master-template"),
                   "param_name"  => "button-text",
                   "value"       => "",
               ),
   
               array(
                   "type" => "dropdown",
                   "heading" => esc_html__( "Button Style", "master-template" ),
                   "description" => esc_html__( "Select the style button", "master-template" ),
                   "param_name" => "button-type",
                   "value" => array('Select Option','principal-button', 'secondary-button'),
               ),
   
               array(
                   "type"        => "textfield",
                   "heading"     => esc_html__( "Button URL", "master-template" ),
                   "param_name"  => "button-url",
                   "value"       => "",
               ),
   
           )
       )
    );
}
   
add_action( 'vc_before_init', 'master_categories_vc' );
