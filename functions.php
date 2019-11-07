<?php
/**
 * Master Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Master_Template
 */


if ( ! function_exists( 'master_template_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function master_template_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Master Template, use a find and replace
		 * to change 'master-template' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'master-template', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'master-template' ),
			'menu-2' => esc_html__( 'Secondary', 'master-template' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		
		add_theme_support( 'custom-background', apply_filters( 'master_template_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'master_template_setup' );

/* Quitar opciones del personalizador */
function ayudawp_quitar_opciones_personalizador( $wp_customize ) {
    $wp_customize->remove_section( 'static_front_page' ); //Ajustes de portada
    //$wp_customize->remove_section( 'title_tagline' ); //Identidad del sitio
    $wp_customize->remove_section( 'colors' ); //Colores
    $wp_customize->remove_section( 'header_image' ); //Imagen de cabecera
    $wp_customize->remove_section( 'background_image' ); //Imagen de fondo
    //$wp_customize->remove_section( 'nav' ); //Menús
    //$wp_customize->remove_section( 'themes' ); //Temas
    //$wp_customize->remove_section( 'featured_content' ); //Contenido destacado
    //$wp_customize->remove_panel( 'widgets' ); //Widgets
}
add_action('customize_register','ayudawp_quitar_opciones_personalizador', 30);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function master_template_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'master_template_content_width', 640 );
}
add_action( 'after_setup_theme', 'master_template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function master_template_setup(){
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'master_template_setup' );


function master_template_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'master-template' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'master-template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar Woocommerce', 'master-template' ),
		'id'            => 'sidebar-products',
		'description'   => __( 'Add widgets here.', 'master-template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'master-template' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Añade este widget a tu pie de página.', 'master-template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'master-template' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Añade este widget a tu pie de página.', 'master-template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'master-template' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Añade este widget a tu pie de página.', 'master-template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	global $geniorama;
	if ($geniorama['columns-footer'] == '2') {
		register_sidebar( array(
			'name'          => __( 'Footer 4', 'master-template' ),
			'id'            => 'sidebar-5',
			'description'   => __( 'Añade este widget a tu pie de página.', 'master-template' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'master_template_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function master_template_scripts() {
	wp_enqueue_style( 'master-template-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '4.1' );

	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', '2.3.4' );

	wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/assets/css/lightbox.min.css', '2.3.4' );

	wp_enqueue_style( 'general-style', get_template_directory_uri() . '/assets/css/style.css', '1.0' );

	wp_enqueue_script( 'smoothscroll-js', get_template_directory_uri() . '/assets/js/jquery.smoothscroll.min.js', array('jquery'), '2.3.4', true );

	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.2', true );

	wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), '2.3.4', true );

	wp_enqueue_script( 'customizer-template', get_template_directory_uri() . '/js/customizer.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'master_template_scripts' );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Customizer Bakery Builder additions.
 */
require get_template_directory() . '/inc/vc-custom-master.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Add Class Menu link
add_filter('nav_menu_link_attributes','clase_link', 10, 3);

function clase_link($atts, $item, $args){

	$class = 'nav-link';

	$atts['class'] = $class;

	return $atts;

}

//Add Redux Framework

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/theme_options/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme_options/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme_options/panel_custom/config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/theme_options/panel_custom/config.php' );
}



//Breadcrumbs  
	function agregar_breadcrumb() {
	echo '<a href="'.home_url().'">Home</a>';
	if ( is_single() || is_category()) {  
		if (is_single()) {	 
			echo "<span class='separator-breadcrumb'> | </span>";
			echo "<span class='item-breadcrumb'>";
			the_title();
			echo "</span>";
		}}
		elseif (is_page()) {
		echo "<span class='separator-breadcrumb'> | </span>";
		echo "<span class='item-breadcrumb'>";
		echo the_title();
		echo "</span>";
		} 
	}   


	function get_breadcrumb(){
		$bread = '';
		global $geniorama;
		if ($geniorama['breadcrumbs-on-off'] == true) {
			if (is_single() || is_category()) {
				if (is_single()) {
					$bread .= '<div class="breadcrumbs">';
					$bread .= '<a href="'.home_url().'" class="link-breadcrumb">Inicio</a>';
					$bread .= '<span class="separator-breadcrumb"> '. $geniorama['opt-separator'] .' </span>';
					$bread .= '<span class="item-breadcrumb">';
					$bread .= get_the_title();
					$bread .= '</span>';
					$bread .= '</div>';
				}
			} elseif (is_page()) {
					$bread .= '<div class="breadcrumbs">';
					$bread .= '<a href="'.home_url().'" class="link-breadcrumb">Inicio</a>';
					$bread .= '<span class="separator-breadcrumb"> '. $geniorama['opt-separator'] .' </span>';
					$bread .= '<span class="item-breadcrumb">';
					$bread .= get_the_title();
					$bread .= '</span>';
					$bread .= '</div>';
			}
			return $bread;
		}
		
	}
	

/*========================= COUNTER =========================*/
function counter_master_func( $atts ) {
	$counter = '';
	// Attributes
	$atts = shortcode_atts(
		array(
			'icon' => '',
			'counter' => '',
			'name' => '',
			'id-counter' => '',
		),
		$atts,
		'counter_master'
	);

	$counter .= '<div id='.$atts['id-counter'].' class="container-counter text-center">
					<div class="m-auto circle d-flex flex-column alig-items-center justify-content-center text-center"> 
						<i class="fas '.$atts['icon'].'"></i>
					</div>    
						<h3 class="counter">'.$atts['counter'].'</h3>
						<h2 class="name-counter">'.$atts['name'].'</h2>';

	$counter .='</div>';
	return $counter;
}

add_shortcode( 'counter_master', 'counter_master_func' );


/*========================= SUB HEADER PAGES =========================*/

//Function Heading Section
function heading_section_func(){
	
	global $geniorama;

	//VERIFICAR SUBHEADER
	if ($geniorama['opt-bg-subheaders'] === '1') {
		//OBTENER URL IMAGEN DE FONDO
		if (get_field('field_5d6079a741a2d')) {

			//Banner páginas
			$urlImagen = get_field('field_5d6079a741a2d');

		} elseif($geniorama['woo-select-product-subheader'] == '1') {

			//Banner productos
			$urlImagen = $geniorama['woo-img-product']['url'];

		} elseif($geniorama['woo-select-product-subheader'] == '2'){

			$thumbID = get_post_thumbnail_id( $post->ID );
			$urlImagen = wp_get_attachment_url( $thumbID );

		}

		//Salida de propiedad con imagen
		$bg_heading = 'style="background-image: url('. $urlImagen .')"';
		$classBanner = 'opacity-layer';
	} else {

		//Salida de propiedad sin imagen
		$bg_heading = false;
		$classBanner = 'banner-solid';
	}

	//ESTILOS SUBHEADER
	if ($geniorama['opt-content-ha-subheaders'] == '1') {
		$alHorizontal = "text-left";
	} elseif ($geniorama['opt-content-ha-subheaders'] == '2'){
		$alHorizontal = "text-right";
	} elseif ($geniorama['opt-content-ha-subheaders'] == '3'){
		$alHorizontal = "text-center";
	}

	//Salida de Contenido
	$string .= '<section class="sub-heading-section '.$classBanner.' mb-5" ' . $bg_heading . '>';
	$string .= '<div class="container">';
	$string .= '<div class="position-relative content-box '.$alHorizontal.'">';
	$string .= '<h1>'. get_the_title() .'</h1>';
	$string .= 	get_breadcrumb();
	$string .= '</div>';
	$string .= '</div>';
	$string .= '</section>';

	echo $string;
}

add_action('heading_section','heading_section_func');


//CLASSES BUTTONS
function add_class_button($thebutton){

	global $geniorama;

	//Color Button
	if ($geniorama['style-color-'.$thebutton.''] == 1) {
		$class_button_color = 'principal-button';
	} else {
		$class_button_color = 'secondary-button';
	};

	//Size Button
	if ($geniorama['size-'.$thebutton.''] == 1) {
		$class_button_size = 'normal-button';
	} elseif($geniorama['size-'.$thebutton.''] == 2) {
		$class_button_size = 'large-button';
	} elseif ($geniorama['size-'.$thebutton.''] == 3) {
		$class_button_size = 'small-button';
	};

	//Type Button
	if ($geniorama['select-button-type'] == 2) {
		$class_button = "link-half-rounded";
	} elseif ($geniorama['select-button-type'] == 1){
		$class_button = "link-rounded";
	} elseif ($geniorama['select-button-type'] == 3) {
		$class_button = "link-squared";
	};

	$classes_button = $class_button_color . " " . $class_button_size . " " . $class_button;

	echo $classes_button;
}

function get_class_button($thebutton){

	global $geniorama;

	//Color Button
	if ($geniorama['style-color-'.$thebutton.''] == 1) {
		$class_button_color = 'principal-button';
	} else {
		$class_button_color = 'secondary-button';
	};

	//Size Button
	if ($geniorama['size-'.$thebutton.''] == 1) {
		$class_button_size = 'normal-button';
	} elseif($geniorama['size-'.$thebutton.''] == 2) {
		$class_button_size = 'large-button';
	} elseif ($geniorama['size-'.$thebutton.''] == 3) {
		$class_button_size = 'small-button';
	};

	//Type Button
	if ($geniorama['select-button-type'] == 2) {
		$class_button = "link-half-rounded";
	} elseif ($geniorama['select-button-type'] == 1){
		$class_button = "link-rounded";
	} elseif ($geniorama['select-button-type'] == 3) {
		$class_button = "link-squared";
	};

	$classes_button = $class_button_color . " " . $class_button_size . " " . $class_button;

	return $classes_button;
}


function get_alignment_classes($element){
	global $geniorama;

	if ($geniorama['style-alignment-'.$element.''] == 1) {
		$class_aligment = "alignment-center";
	} elseif ($geniorama['style-alignment-'.$element.''] == 2){
		$class_aligment = "alignment-right";
	} elseif ($geniorama['style-alignment-'.$element.''] == 3) {
		$class_aligment = "alignment-left";
	}

	return $class_aligment;
}

function alignment_classes($element){
	global $geniorama;

	if ($geniorama['style-alignment-'.$element.''] == 1) {
		$class_aligment = "alignment-center";
	} elseif ($geniorama['style-alignment-'.$element.''] == 2){
		$class_aligment = "alignment-right";
	} elseif ($geniorama['style-alignment-'.$element.''] == 3) {
		$class_aligment = "alignment-left";
	}

	echo $class_aligment;
}