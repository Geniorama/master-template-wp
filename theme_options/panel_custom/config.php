<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "geniorama";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'geniorama/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'master-template' ),
        'page_title'           => __( 'Theme Options', 'master-template' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 10,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'master-template' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'master-template' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'master-template' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'master-template' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'master-template' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'master-template' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'master-template' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'master-template' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'master-template' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'master-template' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'master-template' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

/*============= HEADER ================*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'master-template' ),
        'id'               => 'opt-header',
        'customizer_width' => '400px',
        'icon'             => 'el el-edit'
    ) );

    //Custom Logo
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo personalizado', 'master-template' ),
        'id'               => 'logo-header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'img-logo-dark',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Logo Oscuro', 'master-template'),
                'desc'     => __('Imagen del logo en versión oscura', 'master-template'),
                'desc'     => __('Medidas sugeridas Ancho: 300px, Alto: 300px', 'master-template'),
                'default'  => array(
                    'url'=>'http://s.wordpress.org/style/images/codeispoetry.png'
                ),
            ),

            array(
                'id'       => 'img-logo-light',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Logo Claro', 'master-template'),
                'desc'     => __('Imagen del logo en versión clara', 'master-template'),
                'desc'     => __('Width: 300px, heigth: 300px', 'master-template'),
                'default'  => array(
                    'url'=>'http://s.wordpress.org/style/images/codeispoetry.png'
                ),
            ),
        )
    ) );

    //Top Header
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Encabezado superior', 'master-template' ),
        'id'               => 'top-header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header-top-on-off',
                'type'     => 'switch',
                'title'    => __( 'Mostrar / Ocultar', 'master-template' ),
                'subtitle' => __( 'Muestre u oculte el encabezado superior', 'master-template' ),
                'on'        => 'Mostrar',
                'off'       => 'Ocultar',
                'default'  => true
            ),

            array(
                'id'       => 'header-top-full-w-on-off',
                'type'     => 'switch',
                'title'    => __( 'Ancho completo', 'master-template' ),
                'subtitle' => __( 'Muestre el encabezado de ancho completo o dentro de un contenedor', 'master-template' ),
                'default'  => '2',
                'on'        => 'Ancho completo',
                'off'       => 'Contenedor',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'        => 'top-header-icons',
                'title'     => __('Iconos', 'master-template'),
                'type'      => 'section',
                'subtitle'  => __('Use las clases de Fontawesome 5', 'master-template'),
                'indent'    => true,
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'        => 'icon-mail',
                'title'     => __('Icono correo', 'master-template'),
                'desc'      => __('Ejemplo: "far fa-envelope"'),
                'type'      => 'text',
                'default'   => 'far fa-envelope',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'        => 'icon-phone',
                'title'     => __('Icono teléfono', 'master-template'),
                'desc'      => __('Ejemplo: "fas fa-phone"'),
                'type'      => 'text',
                'default'   => 'fas fa-phone',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'        => 'icon-address',
                'title'     => __('Icono Dirección', 'master-template'),
                'desc'      => __('Ejemplo: "fas fa-map-marker-alt"'),
                'type'      => 'text',
                'default'   => 'fas fa-map-marker-alt',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'      => 'section-search-start',
                'type'    => 'section',
                'title'   => __('Barra de búsqueda', 'master-template'),
                'indent' => true,
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'       => 'search-on-off',
                'type'     => 'switch',
                'title'    => __( 'Mostrar / Ocultar', 'master-template' ),
                'subtitle'    => __( 'Muestre u oculte la barra de búsqueda en el encabezado superior', 'master-template' ),
                'default'  => '1',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'       => 'search-text',
                'type'     => 'text',
                'title'    => __( 'Texto placeholder', 'master-template' ),
                'default'  => 'Buscar',
                'required'  => array('search-on-off', '=', '1' ),

            ),

             //Color Top Header
             array(
                'id'        => 'section-color-top-header',
                'title'     => 'Colores encabezado superior',
                'type'      => 'section',
                'indent'    => true,
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'          => 'opt-header-top-bg',
                'type'        => 'color', 
                'title'       => __('Color Fondo', 'master-template'),
                'output'      => array(
                    'background' => '.top-header',
                ),
                'default'  => '#353535',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'          => 'opt-header-top-text',
                'type'        => 'color', 
                'title'       => __('Color texto', 'master-template'),
                'output'      => array(
                    'color' => '.top-header p',
                ),
                'default'  => '#ccc',
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

            array(
                'id'          => 'opt-header-top-link',
                'type'        => 'link_color', 
                'title'       => __('Color texto enlaces', 'master-template'),
                'output'      => array(
                    'color' => '.top-header a',
                ),
                'default'  => array(
                    'regular'  => '#1e73be',
                    'hover'    => '#dd3333',
                    'active'   => '#8224e3',
                    'visited'  => '#8224e3',
                ),
                'required'  => array( 'header-top-on-off', '=', '1' ),
            ),

        )
    ) );

    //Bottom Header
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Encabezado principal', 'master-template' ),
        'id'               => 'bottom-header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'header-bottom-on-off',
                'type'     => 'switch',
                'title'    => __( 'Mostrar / Ocultar', 'master-template' ),
                'subtitle' => __('Muestra u oculta el menú principal'),
                'on'        => 'Mostrar',
                'off'       => 'Ocultar',
                'default'  => '1'
            ),

            array(
                'id'       => 'header-bottom-full-w-on-off',
                'type'     => 'switch',
                'title'    => __( 'Ancho completo', 'master-template' ),
                'subtitle' => __( 'Muestra el menú principal en ancho completo o dentro de un contenedor', 'master-template' ),
                'default'  => '1',
                'on'        => 'Ancho completo',
                'off'       => 'Contenedor',
                'required'  => array( 'header-bottom-on-off', '=', '1' ),
            ),

            array(
                'id'        => 'sticky_header',
                'type'      => 'switch',
                'title'     => esc_html__('Encabezado fijo', 'master-template'),
                'subtitle'  => __('Tu encabezado se mantiene fijo en la parte superior de la página', 'master-template'),
                'default'   => 0,
                'required'  => array( 'header-bottom-on-off', '=', '1' ),
            ),

            array(
                'id'       => 'header-bottom-style',
                'type'     => 'image_select',
                'title'    => __( 'Estilo encabezado', 'master-template' ),
                'options'  => array(
                    '1'       => array(
                        'alt' => 'Left Logo',
                        'img' => get_template_directory_uri() . '/assets/img/logo-left.jpg',
                    ),

                    '2'       => array(
                        'alt' => 'Center Logo',
                        'img' => get_template_directory_uri() . '/assets/img/logo-center.jpg',
                    ),

                    '3'       => array(
                        'alt' => 'Right Logo',
                        'img' => get_template_directory_uri() . '/assets/img/logo-right.jpg',
                    ),

                    '4'       => array(
                        'alt' => 'Menu Toggle',
                        'img' => get_template_directory_uri() . '/assets/img/menu-toggle.jpg',
                    ),
                ),

                'default'  => 1,

                'required'  => array( 'header-bottom-on-off', '=', '1' ),
            ),

            //Static Header
            array(
                'id'          => 'section-static-header',
                'type'        => 'section', 
                'title'       => __('Opciones encabezado estático', 'master-template'),
                'indent'      => true,
            ),

            array(
                'id'       => 'opt-logo-select',
                'type'     => 'select',
                'title'    => __('Selecciona un tipo de logo', 'master-template'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Logo Oscuro',
                    '2' => 'Logo Claro'
                ),
                'default'  => '1',
                'required'  => array( 'header-bottom-on-off', '=', '1' ),
            ),

            array(
                'id'          => 'opt-header-bg',
                'type'        => 'color_rgba', 
                'title'       => __('Color fondo', 'master-template'),
                'output'      => array(
                    'background-color' => '.bottom-header',
                ),
                'default'  => '#fff',
                'required'  => array( 'header-bottom-on-off', '=', '1' ),
            ),

            array(
                'id'          => 'opt-nav-color',
                'type'        => 'link_color', 
                'title'       => __('Color enlaces menú', 'master-template'),
                'output'      => '.static-header .nav-link',
                'default'  => array(
                    'regular'  => '#252525',
                    'hover'    => '#EA472F',
                    'active'   => '#ea472f',
                    'visited'  => '#ea472f',
                )
            ),


            //Sticky Header
            array(
                'id'          => 'section-sticky-header',
                'type'        => 'section', 
                'title'       => __('Opciones encabezado fijo', 'master-template'),
                'indent'      => true,
                'required'  => array( 'sticky_header', '=', '1' ),
            ),


            array(
                'id'       => 'opt-logo-sticky-select',
                'type'     => 'select',
                'title'    => __('Selecciona un tipo de logo', 'master-template'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Logo Oscuro',
                    '2' => 'Logo Claro'
                ),
                'default'  => '1',
                'required'  => array( 'sticky_header', '=', '1' ),
            ),

            array(
                'id'          => 'opt-header-sticky-bg',
                'type'        => 'color_rgba', 
                'title'       => __('Color fondo', 'master-template'),
                'output'      => array(
                    'background-color' => '.sticky-header'),
                'required'    => array( 'sticky_header', '=', '1' ),
            ),

            array(
                'id'          => 'opt-nav-sticky-color',
                'type'        => 'link_color', 
                'title'       => __('Color enlaces menú', 'master-template'),
                'output'      => '.sticky-header .nav-link',
                'default'  => array(
                    'regular'  => '#fff',
                    'hover'    => '#f2f2f2',
                    'active'   => '#f2f2f2',
                    'visited'  => '#f2f2f2',
                ),
                'required'  => array( 'sticky_header', '=', '1' ),
            ),


            //Color Menu Lateral

            array(
                'id'        => 'style-color-menu-lateral',
                'title'     => __('Color Menú Lateral','master-template'),
                'type'      => 'section',
                'indent'    => true,
                'required'    => array( 'header-bottom-style', '=', '4' ),
            ),

            array(
                'id'          => 'bg-menu-lateral',
                'type'        => 'color_rgba', 
                'title'       => __('Color fondo', 'master-template'),
                'output'      => array(
                    'background-color' => '.menu-toggle-container'),
                'required'    => array( 'header-bottom-style', '=', '4' ),
            ),

            array(
                'id'          => 'color-text-menu-lateral',
                'type'        => 'link_color', 
                'title'       => __('Color enlaces menú', 'master-template'),
                'output'      => '.menu-toggle-container .nav-link',
                'default'  => array(
                    'regular'  => '#303030',
                    'hover'    => '#ccc',
                    'active'   => '#ccc',
                    'visited'  => '#ccc',
                ),
                'required'    => array( 'header-bottom-style', '=', '4' ),
            ),
        )
    ) );

/*============= BODY ================*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Body', 'master-template' ),
        'id'               => 'opt-body',
        'customizer_width' => '400px',
        'icon'             => 'el el-photo'
    ) );

    //Buttons
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Botones', 'master-template' ),
        'id'               => 'opt-style-buttons',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'          => 'section-style-master-buttons',
                'type'        => 'section', 
                'title'       => __('Opciones "Button Master"', 'master-template'),
                'subtitle'    => __('Se aplica a los botones generados por el tema', 'master-template'),
                'indent'     => true
            ),

            array(
                'id'       => 'select-button-type',
                'type'     => 'select',
                'title'    => __('Selecciona el tipo de botones que usarás', 'master-template'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Redondo',
                    '2' => 'Esquinas redondeadas',
                    '3' => 'Recto',
                ),
                'default'  => '1'
            ),

            array(
                'id'          => 'section-opt-button-toggle',
                'type'        => 'section', 
                'title'       => __('Opciones botón menú', 'master-template'),
                'indent'     => true,
                'required'    => array('header-bottom-style','=','4')

            ),

            array(
                'id'       => 'style-color-button-toggle',
                'type'     => 'select',
                'title'    => __('Selecciona el estilo para el botón del menú', 'master-template'),
                'options'  => array(
                    '1' => 'Principal',
                    '2' => 'Secundario'
                ),
                'default'  => '1',
                'required'    => array('header-bottom-style','=','4')
            ),

            array(
                'id'       => 'size-button-toggle',
                'type'     => 'select',
                'title'    => __('Tamaño botón de menú', 'master-template'),
                'options'  => array(
                    '1' => 'Normal',
                    '2' => 'Largo',
                    '3' => 'Pequeño'
                ),
                'default'  => '1',
                'required'    => array('header-bottom-style','=','4')
            ),

            array(
                'id'          => 'section-opt-float-buttons',
                'type'        => 'section', 
                'title'       => __('Opciones botones flotantes', 'master-template'),
                'indent'     => true
            ),

            array(
                'id'          => 'active-buttons',
                'type'        => 'switch', 
                'title'       => __('Mostrar / Ocultar', 'master-template'),
                'on'          => __('Mostrar', 'master-template'),
                'off'          => __('Ocultar', 'master-template'),
                'default'     => '1'
            ),

            array(
                'id'       => 'style-alignment-float-buttons',
                'type'     => 'select',
                'title'    => __('Fijar en', 'master-template'),
                'options'  => array(
                    '1' => 'Centro',
                    '2' => 'Derecha',
                    '3' => 'Izquierda'
                ),
                'default'  => '2',
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'       => 'style-color-float-buttons',
                'type'     => 'select',
                'title'    => __('Estilo', 'master-template'),
                'options'  => array(
                    '1' => 'Principal',
                    '2' => 'Secundario'
                ),
                'default'  => '1',
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'       => 'size-float-buttons',
                'type'     => 'select',
                'title'    => __('Tamaño', 'master-template'),
                'options'  => array(
                    '1' => 'Normal',
                    '2' => 'Largo',
                    '3' => 'Pequeño'
                ),
                'default'  => '1',
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'social-float-buttons',
                'type'        => 'section', 
                'title'       => __('Botones redes', 'master-template'),
                'indent'     => true,
                'required'  => array('active-buttons', '=', '1' ),
            ),
            

            array(
                'id'          => 'float-what-button',
                'type'        => 'switch', 
                'title'       => __('Whatsapp', 'master-template'),
                'default'     => 1,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-fb-button',
                'type'        => 'switch', 
                'title'       => __('Facebook', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-yt-button',
                'type'        => 'switch', 
                'title'       => __('YouTube', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-tw-button',
                'type'        => 'switch', 
                'title'       => __('Twitter', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-ins-button',
                'type'        => 'switch', 
                'title'       => __('Instagram', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-pt-button',
                'type'        => 'switch', 
                'title'       => __('Pinterest', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-li-button',
                'type'        => 'switch', 
                'title'       => __('Linked In', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'other-float-buttons',
                'type'        => 'section', 
                'title'       => __('Otros botones', 'master-template'),
                'indent'     => true,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-top-button',
                'type'        => 'switch', 
                'title'       => __('Regresar arriba', 'master-template'),
                'default'     => 1,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-custom-button',
                'type'        => 'switch', 
                'title'       => __('Botón personalizado', 'master-template'),
                'default'     => 2,
                'required'  => array('active-buttons', '=', '1' ),
            ),

            array(
                'id'          => 'float-link-custom-button',
                'type'        => 'text', 
                'title'       => __('Enlace', 'master-template'),
                'default'     => '#',
                'required'  => array('float-custom-button', '=', '1' ),
            ),

            array(
                'id'        => 'icon-custom-button',
                'title'     => __('Icono botón', 'master-template'),
                'desc'      => __('Usa las clases de Fontawesome 5. Ejemplo: "fas fa-at"'),
                'type'      => 'text',
                'default'   => 'fas fa-at',
                'required'  => array('float-custom-button', '=', '1' ),
            ),

            array(
                'id'        => 'section-color-buttons',
                'title'     => __('Color botones y enlaces', 'master-template'),
                'type'      => 'section',
                'indent'    => true,
            ),

            
            //Principal Button
            array(
                'id'          => 'section-principal-button',
                'type'        => 'section', 
                'title'       => __('Botón principal', 'master-template'),
                'indent' => true,
                
            ),

            array(
                'id'          => 'button-principal-bg',
                'type'        => 'color', 
                'title'       => __('Color fondo', 'master-template'),
                'output'      => array(
                    'background-color' => '.principal-button, .filter-toggle.active a',
                ),
                'default'     => '#EA472F',
            ),

            array(
                'id'          => 'hover-button-cta-bg',
                'type'        => 'color', 
                'title'       => __('Color fondo (Hover)', 'master-template'),
                'output'      => array(
                    'background-color' => '.principal-button:hover',
                ),
                'default'     => '#c93e2c',
            ),

            array(
                'id'          => 'opt-button-principal-color',
                'type'        => 'link_color', 
                'title'       => __('Color texto botón', 'master-template'),
                'output'      => '.principal-button',
                'default'  => array(
                    'regular'  => '#fff',
                    'hover'    => '#fff',
                    'active'   => '#f2f2f2',
                    'visited'  => '#f2f2f2',
                ),
            ),

            array(
                'id'        => 'border-button',
                'type'      => 'switch',
                'title'     => esc_html__('Borde', 'master-template'),
                'default'   => 0,
                'on'        => 'Con borde',
                'off'       => 'Sin borde',
            ),

            array(
                'id'       => 'principal-button-border',
                'type'     => 'border',
                'title'    => __('Opciones borde', 'master-template'),
                'output'   => array('.principal-button'),
                'default'  => array(
                    'border-color'  => '#1e73be', 
                    'border-style'  => 'solid', 
                    'border-top'    => '3px', 
                    'border-right'  => '3px', 
                    'border-bottom' => '3px', 
                    'border-left'   => '3px'
                ),
                'required' => array( 'border-button', '=', '1' ),
            ),

            array(
                'id'       => 'color-principal-button-border',
                'type'     => 'color',
                'title'    => __('Color borde (Hover)', 'master-template'),
                'output'   => array('.principal-button:hover'),
                'default'  => '#1a5991',
                'required' => array( 'border-button', '=', '1' ),
            ),


            //Secondary Button
            array(
                'id'          => 'section-secondary-button',
                'type'        => 'section', 
                'title'       => __('Botón secundario', 'master-template'),
                'indent' => true,
                
            ),

            array(
                'id'          => 'button-secondary-bg',
                'type'        => 'color', 
                'title'       => __('Color fondo', 'master-template'),
                'output'      => array(
                    'background-color'   => '.secondary-button',
                ),
                'default'     => '#84B300',
            ),

            array(
                'id'          => 'hover-button-secondary-bg',
                'type'        => 'color', 
                'title'       => __('Color fondo (Hover)', 'master-template'),
                'output'      => array(
                    'background-color'   => '.secondary-button:hover',
                ),
                'default'     => '#739908',
            ),

            array(
                'id'          => 'opt-button-secondary-color',
                'type'        => 'link_color', 
                'title'       => __('Color texto', 'master-template'),
                'output'      => '.secondary-button',
                'default'  => array(
                    'regular'  => '#fff',
                    'hover'    => '#fff',
                    'active'   => '#f2f2f2',
                    'visited'  => '#f2f2f2',
                ),
            ),

            array(
                'id'        => 'border-secondary-button',
                'type'      => 'switch',
                'title'     => esc_html__('Borde', 'master-template'),
                'default'   => 0,
                'on'        => 'Con borde',
                'off'       => 'Sin borde',
            ),

            array(
                'id'       => 'secondary-button-border',
                'type'     => 'border',
                'title'    => __('Opciones borde', 'master-template'),
                'output'   => '.secondary-button',
                'default'  => array(
                    'border-color'  => '#739908', 
                    'border-style'  => 'solid', 
                    'border-top'    => '3px', 
                    'border-right'  => '3px', 
                    'border-bottom' => '3px', 
                    'border-left'   => '3px'
                ),
                'required' => array( 'border-secondary-button', '=', '1' ),
            ),

            array(
                'id'       => 'color-secondary-button-border',
                'type'     => 'color',
                'title'    => __('Color borde (Hover)', 'master-template'),
                'output'   => array(
                    'border-color' => '.secondary-button:hover'
                ),
                'default'  => '#353535',
                'required' => array( 'border-secondary-button', '=', '1' ),
            ),


            //Aux Button
            array(
                'id'          => 'section-aux-button',
                'type'        => 'section', 
                'title'       => __('Botón auxiliar', 'master-template'),
                'indent' => true,
                
            ),

            array(
                'id'          => 'button-aux-bg',
                'type'        => 'color', 
                'title'       => __('Color fondo', 'master-template'),
                'output'      => array(
                    'background-color'   => '.aux-button',
                ),
                'default'     => '#84B300',
            ),

            array(
                'id'          => 'hover-button-aux-bg',
                'type'        => 'color', 
                'title'       => __('Color fondo (Hover)', 'master-template'),
                'output'      => array(
                    'background-color'   => '.aux-button:hover',
                ),
                'default'     => '#739908',
            ),

            array(
                'id'          => 'opt-button-aux-color',
                'type'        => 'link_color', 
                'title'       => __('Color texto', 'master-template'),
                'output'      => '.aux-button',
                'default'  => array(
                    'regular'  => '#fff',
                    'hover'    => '#fff',
                    'active'   => '#f2f2f2',
                    'visited'  => '#f2f2f2',
                ),
            ),

            array(
                'id'        => 'border-aux-button',
                'type'      => 'switch',
                'title'     => esc_html__('Borde', 'master-template'),
                'default'   => 0,
                'on'        => 'Con borde',
                'off'       => 'Sin borde',
            ),

            array(
                'id'       => 'aux-button-border',
                'type'     => 'border',
                'title'    => __('Opciones borde', 'master-template'),
                'output'   => '.aux-button',
                'default'  => array(
                    'border-color'  => '#739908', 
                    'border-style'  => 'solid', 
                    'border-top'    => '3px', 
                    'border-right'  => '3px', 
                    'border-bottom' => '3px', 
                    'border-left'   => '3px'
                ),
                'required' => array( 'border-aux-button', '=', '1' ),
            ),

            array(
                'id'       => 'color-aux-button-border',
                'type'     => 'color',
                'title'    => __('Color borde (Hover)', 'master-template'),
                'output'   => array(
                    'border-color' => '.aux-button:hover'
                ),
                'default'  => '#353535',
                'required' => array( 'border-aux-button', '=', '1' ),
            ),


            //Text Link
            array(
                'id'       => 'section-text-link',
                'type'     => 'section',
                'title'    => __('Enlaces', 'master-template'),
                'indent'  => true,
            ),

            array(
                'id'       => 'color-text-link',
                'type'     => 'link_color',
                'title'    => __('Color', 'master-template'),
                'default'  => array(
                    'regular'  => '#1e73be',
                    'hover'    => '#1a5991',
                    'active'   => '#1a5991',
                    'visited'  => '#1a5991',
                ),
            ),
            
        ),
    ) );


    //Sub Header
    Redux::setSection($opt_name, array(
        'title'            => __( 'Sub Headers', 'master-template' ),
        'id'               => 'opt-subheaders',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'        => 'section-style-subheaders',
                'title'     => __('Style','master-template'),
                'type'      => 'section',
                'indent'    => true
            ),

            array(
                'id'        => 'opt-bg-subheaders',
                'title'     => __('Background','master-template'),
                'type'      => 'select',
                'options'   => array(
                    '1'     => 'Background Image',
                    '2'     => 'Color Solid'
                ),
                'default'   => '1'
            ),

            array(
                'id'        => 'opt-content-ha-subheaders',
                'title'     => __('Horizontal aligment content ','master-template'),
                'type'      => 'select',
                'options'   => array(
                    '1'     => 'Left',
                    '2'     => 'Right',
                    '3'     => 'Center'
                ),
                'default'   => '1'
            ),

            array(
                'id'        => 'opt-content-va-subheaders',
                'title'     => __('Vertical aligment content ','master-template'),
                'type'      => 'select',
                'options'   => array(
                    '1'     => 'Top',
                    '2'     => 'Bottom',
                    '3'     => 'Center'
                ),
                'default'   => '3'
            ),

            array(
                'id'        => 'section-breadcrumbs',
                'title'     => __('Breadcrumbs','master-template'),
                'type'      => 'section',
                'indent'    => true
            ),

            array(
                'id'        => 'breadcrumbs-on-off',
                'title'     => __('Enable Breadcrumbs','master-template'),
                'type'      => 'switch',
                'default'   => true
            ),

            array(
                'id'        => 'opt-separator',
                'title'     => __('Separator','master-template'),
                'type'      => 'text',
                'default'   => '/',
                'required'  => array('breadcrumbs-on-off','=',true)
            ),

            array(
                'id'        => 'section-color-subheader',
                'title'     => 'Color Subheader',
                'type'      => 'section',
                'indent'    => true
            ),

            array(
                'id'          => 'bg-layer-subheader-color',
                'type'        => 'color_rgba', 
                'title'       => __('Background Color Layer Image', 'master-template'),
                'subtitle'    => __('Choose the color for background Sub Header', 'master-template'),
                'output'      => array(
                    'background-color' => '.sub-heading-section.opacity-layer:before',
                ),
                'default'     => '#EA472F',
                'required'    => array('opt-bg-subheaders','=','1')
            ),

            array(
                'id'          => 'bg-subheader-color',
                'type'        => 'color', 
                'title'       => __('Background Color Subheader', 'master-template'),
                'subtitle'    => __('Choose the color for background Sub Header', 'master-template'),
                'output'      => array(
                    'background-color' => '.sub-heading-section',
                ),
                'default'     => '#EA472F',
                'required'    => array('opt-bg-subheaders','=','2')
            ),

            array(
                'id'          => 'color-text-subheader',
                'type'        => 'color', 
                'title'       => __('Text title Color', 'master-template'),
                'subtitle'    => __('Choose the color for text Sub Header', 'master-template'),
                'output'      => '.sub-heading-section .content-box h1',
                'default'     => '#EA472F',
            ),

            array(
                'id'          => 'color-breadcrumbs-subheader',
                'type'        => 'color', 
                'title'       => __('Text Breadcrumbs Color', 'master-template'),
                'subtitle'    => __('Choose the color for text Sub Header', 'master-template'),
                'output'      => '.sub-heading-section .content-box .item-breadcrumb',
                'default'     => '#EA472F',
                'required'  => array('breadcrumbs-on-off','=',true)
            ),

            array(
                'id'          => 'color-link-breadcrumbs-subheader',
                'type'        => 'link_color', 
                'title'       => __('Link Breadcrumbs Color', 'master-template'),
                'subtitle'    => __('Choose the color for text Sub Header', 'master-template'),
                'output'      => '.sub-heading-section .content-box .link-breadcrumb',
                'default'  => array(
                    'regular'  => '#1e73be',
                    'hover'    => '#dd3333',
                    'active'   => '#8224e3',
                    'visited'  => '#8224e3',
                ),
                'required'  => array('breadcrumbs-on-off','=',true)
            ),

            array(
                'id'          => 'color-separator-breadcrumbs-subheader',
                'type'        => 'color', 
                'title'       => __('Separator Breadcrumbs Color', 'master-template'),
                'subtitle'    => __('Choose the color for text Sub Header', 'master-template'),
                'output'      => '.sub-heading-section .content-box .separator-breadcrumb',
                'default'     => '#EA472F',
                'required'  => array('breadcrumbs-on-off','=',true)
            ),
        )
    ));
    
    //Typography
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Typography', 'master-template' ),
        'id'               => 'typography-body',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Options font body', 'master-template' ),
        'fields'           => array(
            

            array(
                'id'          => 'opt-typography',
                'type'        => 'typography', 
                'title'       => __('Typography Headings', 'master-template'),
                'subtitle'       => __('Choose the font for h1, h2, h3, h4, h5', 'master-template'),
                'google'      => true, 
                'font-backup' => true,
                'units'       =>'em',
                'text-align'  => false,
                'subsets'     => false,
                'output'      => 'h1, h2, h3, h4, h5',
                'default'     => array(
                    'color'       => '#333', 
                    'font-style'  => '700', 
                    'font-family' => 'Poppins', 
                    'google'      => true,
                    'font-size'   => '2em', 
                    'line-height' => '2.5'
                ),
            ),


            array(
                'id'          => 'opt-pr-typography',
                'type'        => 'typography', 
                'title'       => __('Typography Paragraph', 'master-template'),
                'subtitle'       => __('Choose the font for body text', 'master-template'),
                'google'      => true, 
                'font-backup' => true,
                'units'       =>'em',
                'text-align'  => false,
                'subsets'     => false,
                'output'      => 'p',
                'default'     => array(
                    'color'       => '#757575', 
                    'font-style'  => '500', 
                    'font-family' => 'Roboto', 
                    'google'      => true,
                    'font-size'   => '1em', 
                    'line-height' => '1.5'
                ),
            ),

            array(
                'id'          => 'opt-typography-menu',
                'type'        => 'typography', 
                'title'       => __('Typography Menú', 'master-template'),
                'subtitle'       => __('Choose the font for menú nav links', 'master-template'),
                'google'      => true, 
                'font-backup' => true,
                'units'       =>'em',
                'text-align'  => false,
                'subsets'     => false,
                'color'     => false,
                'font-size'   => false,
                'line-height' => false,
                'font-style'  => false, 
                'output'      => 'header, header p',
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-style'  => '500',
                ),
            ),
        )
    ) );

    //Settings Sections
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Sections', 'master-template' ),
        'id'               => 'section-body',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'Options sections body', 'master-template' ),
        'fields'           => array(
            array(
                'id'             => 'opt-spacing',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'units'          => array('em', 'px', 'vw'),
                'units_extended' => 'false',
                'title'          => __('Padding Option', 'master-template'),
                'subtitle'       => __('Allow your users to choose the spacing or margin they want.', 'master-template'),
                'desc'           => __('Use the class "padding-section"  at the container for apply', 'master-template'),
                'output'         => '.padding-section',
                'default'            => array(
                    'padding-top'     => '5vw',  
                    'padding-right'   => '0', 
                    'padding-bottom'  => '5vw', 
                    'padding-left'    => '0',
                    'units'          => 'em', 
                )
            ),

            array(
                'id'             => 'bg-color-section',
                'type'           => 'color',
                'title'          => __('Section Dark Background', 'master-template'),
                'subtitle'       => __('Choose the background color of the dark sections', 'master-template'),
                'desc'           => __('Use the class "dark-section"  at the container for apply', 'master-template'),
                'output'         => array(
                    'background-color'  => '.dark-section',
                ),
                'default'        => '#252525',
            ),

            array(
                'id'             => 'bg-color-section-light',
                'type'           => 'color',
                'title'          => __('Section Light Background', 'master-template'),
                'subtitle'       => __('Choose the background color of the light sections', 'master-template'),
                'desc'           => __('Use the class "light-section"  at the container for apply', 'master-template'),
                'output'         => array(
                    'background-color'  => '.light-section',
                ),
                'default'        => '#f2f2f2',
            ),
        )
    ) );

/*============= WOOCOMMERCE ================*/

if ($woocommerce) {
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Woocommerce', 'master-template' ),
        'id'               => 'opt-woocommerce',
        'desc'             => __( 'Options for Woocommerce', 'master-template' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-shopping-cart'
    ) );

    //Page product
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Product page', 'master-template' ),
        'id'               => 'opt-woo-product',
        'desc'             => __( 'Options for Product page of Woocommerce', 'master-template' ),
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'            => 'woo-subheader-on-off',
                'title'         => 'Enable Sub Header',
                'type'          => 'switch',
                'default'       => true
            ),

            array(
                'id'       => 'woo-select-product-subheader',
                'type'     => 'select',
                'title'    => __('Image Subheader', 'master-template'), 
                'subtitle' => __('Select a option image subheader', 'master-template'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Custom Image',
                    '2' => 'Attachment Image'
                ),
                'default'  => '1',
                'required' => array('woo-subheader-on-off','=',true)
            ),

            array(
                'id'       => 'woo-img-product',
                'type'     => 'media', 
                'url'      => true,
                'title'    => __('Image Sub Header', 'master-template'),
                'subtitle' => __('Upload your custom image', 'master-template'),
                'desc'     => __('Width: 1920px, heigth: 1080px', 'master-template'),
                'default'  => array(
                    'url'=>'http://localhost/masterpage_ecommerce/wp-content/uploads/2019/07/adults-collaborate-collaboration-1036641.jpg'
                ),
                'required' => array('woo-select-product-subheader','=','1')
            ),

            array(
                'id'            => 'woo-comments-on-off',
                'title'         => 'Enable Comments Section',
                'type'          => 'switch',
                'default'       => false
            ),
        )
    ) );
}

/*============= OWL CAROUSEL ================*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Owl Carousel', 'master-template' ),
        'id'               => 'opt-owl-carousel',
        'customizer_width' => '450px',
        'icon'             => 'el el-picture',
        'desc'             => __( 'Options color Owl Carousel', 'master-template' ),
        'fields'           => array(

            //Owl Nav
            array(
                'id'          => 'section-owl-nav',
                'type'        => 'section', 
                'title'       => __('Arrows Nav', 'master-template'),
                'subtitle'       => __('Choose the colors for arrows nav', 'master-template'),
                'indent' => true,  
            ),

            array(
                'id'           => 'size-owl-nav',
                'title'        => 'Size Arrows Nav',
                'type'         => 'select',
                'output'       => '',
                'options'      => array(
                    '1'     => 'Normal',
                    '2'     => 'Large',
                    '3'     => 'Small' 
                ),
                'default'      => '1',
            ),

            array(
                'id'           => 'style-color-owl-nav',
                'title'        => 'Color Arrows Nav',
                'type'         => 'select',
                'output'       => '',
                'options'      => array(
                    '1'     => 'Principal button',
                    '2'     => 'Secondary button',
                ),
                'default'      => '1',
            ),

            array(
                'id'           => 'style-alignment-owl-nav',
                'title'        => 'Alignment Arrows Nav',
                'type'         => 'select',
                'output'       => '',
                'options'      => array(
                    '1'     => 'Center',
                    '2'     => 'End',
                    '3'     => 'Start',
                ),
                'default'      => '1',
            ),

            //Owl Dots
            array(
                'id'          => 'section-owl-dots',
                'type'        => 'section', 
                'title'       => __('Dots', 'master-template'),
                'subtitle'       => __('Choose the colors for dots', 'master-template'),
                'indent' => true,  
            ),

            array(
                'id'           => 'style-owl-dots',
                'title'        => 'Style Dots Nav',
                'type'         => 'select',
                'output'       => '',
                'options'      => array(
                    '1'     => 'Circle',
                    '2'     => 'Squared',
                ),
                'default'      => '1',
            ),

            array(
                'id'           => 'bg-color-dot-owl',
                'title'        => 'Background Dots',
                'type'         => 'color',
                'output'       => array(
                    'background-color'  => '.owl-carousel .owl-dots .owl-dot'
                ),
                'default'      => '#151515',
            ),

            array(
                'id'          => 'border-dot-owl',
                'type'        => 'color', 
                'title'       => __('Border Color Dots', 'master-template'),
                'output'      => array(
                    'border-color'  => '.owl-carousel .owl-dots .owl-dot'
                ),
                'default'      => '#151515',
            ),

            array(
                'id'           => 'bg-color-dot-active-owl',
                'title'        => 'Background Dot Active',
                'type'         => 'color',
                'output'       => array(
                    'background-color'  => '.owl-carousel .owl-dots .owl-dot.active'
                ),
                'default'      => '#ccc',
            ),

            array(
                'id'          => 'border-dot-active-owl',
                'type'        => 'color', 
                'title'       => __('Border Color Dot active', 'master-template'),
                'output'      => array(
                    'border-color'  => '.owl-carousel .owl-dot.active'
                ),
                'default'      => '#151515',
            ),

        )
    ) );


/*============= SOCIAL SHAPES ================*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social shapes', 'master-template' ),
        'id'               => 'social-shapes',
        'customizer_width' => '400px',
        'icon'             => 'el el-rss',
        'fields'           => array(
            //Facebook
            array(
                'id'            => 'social-fb',
                'title'         => 'Facebook',
                'subtitle'      => 'The Facebook fanpage URL',
                'type'          => 'text',
                'placeholder'   => 'ej: https://www.facebook.com/myprofile',
                'default'       => 'https://www.facebook.com/'
            ),

            //Instagram
            array(
                'id'            => 'social-ins',
                'title'         => 'Instagram',
                'subtitle'      => 'The Instagram profile URL',
                'type'          => 'text',
                'placeholder'   => 'ej: https://www.instagram.com/myprofile',
                'default'       => 'https://www.instagram.com/'
            ),

            //Twitter
            array(
                'id'            => 'social-tw',
                'title'         => 'Twitter',
                'subtitle'      => 'The Twitter profile URL',
                'type'          => 'text',
                'placeholder'   => 'ej: https://www.twitter.com/myprofile',
                'default'       => 'https://twitter.com/?lang=es'
            ),

            //Linked In
            array(
                'id'            => 'social-li',
                'title'         => 'Linked In',
                'subtitle'      => 'The Linked In profile URL',
                'type'          => 'text',
                'placeholder'   => 'ej: https://www.linkedin.com/myprofile',
                'default'       => 'https://co.linkedin.com/'
            ),

            //YouTube
            array(
                'id'            => 'social-yt',
                'title'         => 'YouTube',
                'subtitle'      => 'The YouTube URL channel',
                'type'          => 'text',
                'placeholder'   => 'ej: https://www.youtube.com/myprofile',
                'default'       => 'https://www.youtube.com/'
            ),

            //Pinterest
            array(
                'id'            => 'social-pt',
                'title'         => 'Pinterest',
                'subtitle'      => 'The Pinterest URL profile',
                'type'          => 'text',
                'placeholder'   => 'ej: https://www.youtube.com/myprofile',
                'default'       => 'https://co.pinterest.com/'
            )
        )
    ) );

/*============= INFO CONTACT ================*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Info Contact', 'master-template' ),
        'id'               => 'opt-contact',
        'desc'             => __( 'Info contact of the Company', 'master-template' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-address-book',
        'fields'           => array(
            //Address

            array(
                'id'            => 'section-address',
                'title'         => 'Address Section',
                'type'          => 'section',
                'indent'        => true
            ),

            array(
                'id'            => 'opt-address',
                'title'         => 'Address',
                'type'          => 'text'
            ),
            
            array(
                'id'            => 'opt-url-address',
                'title'         => 'URL Google Maps',
                'type'          => 'text',
                'default'       => '#'
            ),

            array(
                'id'     => 'section-end',
                'type'   => 'section',
                'indent' => false,
            ),

            //Section end

            //Phone
            array(
                'id'            => 'opt-phone',
                'title'         => 'Phone',
                'type'          => 'text'
            ),

            //Whatsapp
            array(
                'id'            => 'section-whatsapp',
                'title'         => 'Whatsapp Section',
                'type'          => 'section',
                'indent'        => true
            ),

            array(
                'id'            => 'opt-whp',
                'title'         => 'Phone Whatsapp',
                'type'          => 'text'
            ),

            array(
                'id'            => 'opt-whp-msje',
                'title'         => 'Message Api Whatsapp',
                'type'          => 'text',
                'default'       => 'Hola, deseo información sobre'
            ),

            array(
                'id'     => 'section-end',
                'type'   => 'section',
                'indent' => false,
            ),

            //Section end

            //Website
            array(
                'id'            => 'opt-web',
                'title'         => 'Website URL',
                'type'          => 'text',
                'default'       => '#'
            ),

            array(
                'id'            => 'opt-email-info',
                'title'         => 'Email info',
                'type'          => 'text',
                'default'       => '#'
            )
        )
    ) );

/*============= FORM CONTACT ================*/
Redux::setSection( $opt_name, array(
    'title'            => __( 'Forms Contact', 'master-template' ),
    'id'               => 'opt-forms-contact',
    'desc'             => __( 'Forms contact', 'master-template' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-envelope-alt',
    'fields'           => array(
        array(
            'id'        => 'section-style-forms',
            'title'     => __('Style Forms','master-template'),
            'type'      => 'section',
            'subtitle'      => __('Use the class "form-control" at the inputs in Contact Form','master-template'),
            'indent'    => true
        ),

        array(
            'id'        => 'border-style-forms',
            'title'     => __('Border Inputs','master-template'),
            'type'      => 'border',
            'output'    => array('.form-control'),
            'all'       => false,
            'default'  => array(
                'border-color'  => '#ccc', 
                'border-style'  => 'solid', 
                'border-top'    => '1px', 
                'border-right'  => '1px', 
                'border-bottom' => '1px', 
                'border-left'   => '1px'
            )
        ),

        array(
            'id'        => 'bg-style-forms',
            'title'     => __('Background Inputs','master-template'),
            'type'      => 'color_rgba',
            'output'    => array(
                'background-color'  => '.form-control'
            ),
            'default'  => 'transparent'
        ),

        array(
            'id'        => 'color-style-forms',
            'title'     => __('Color text Inputs','master-template'),
            'type'      => 'color',
            'output'    => array(
                'color'  => '.form-control, .form-control:focus'
            ),
            'default'  => '#d7d7d7'
        ),

        array(
            'id'        => 'color-style-forms-label',
            'title'     => __('Color text Label','master-template'),
            'type'      => 'color',
            'output'    => array(
                'color'  => '.wpcf7-form label'
            ),
            'default'  => '#d7d7d7'
        ),

        array(
            'id'        => 'color-style-forms-placeholder',
            'title'     => __('Color text Placeholder','master-template'),
            'type'      => 'color',
            'output'    => array(
                'color'  => '.form-control::placeholder'
            ),
            'default'  => '#d7d7d7'
        ),
    )
) );

/*============= FOOTER ================*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'master-template' ),
        'id'               => 'opt-footer',
        'customizer_width' => '400px',
        'icon'             => 'el el-tasks',
        'fields'           => array(

            array(
                'id'       => 'footer-on-off',
                'type'     => 'switch',
                'title'    => __( 'Enable footer', 'master-template' ),
                'subtitle' => __( 'Enable or disable your Top Footer', 'master-template' ),
                'default'  => '1',
            ),

            array(
                'id'       => 'footer-full-w-on-off',
                'type'     => 'switch',
                'title'    => __( 'Full Width', 'master-template' ),
                'subtitle' => __( 'Enable or disable Full Width for Footer', 'master-template' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'master-template' ),
                'default'  => '2',
            ),

            array(
                'id'            => 'section-columns',
                'title'         => __( 'Options Footer', 'master-template' ),
                'type'          => 'section',
                'indent'       => true,
            ),


            array(
                'id'       => 'columns-footer',
                'type'     => 'image_select',
                'title'    => __( 'Columns Footer', 'master-template' ),
                'subtitle' => __( 'Choose the style of the footer', 'master-template' ),
                'options'  => array(
                    '1'       => array(
                        'alt' => 'Footer 3 cols',
                        'img' => get_template_directory_uri() . '/assets/img/footer-3-col.jpg',
                    ),

                    '2'       => array(
                        'alt' => 'Footer 4 cols',
                        'img' => get_template_directory_uri() . '/assets/img/footer-4-col.jpg',
                    ),
                ),

                'default'  => 2,
            ),

            array(
                'id'            => 'section-copyright',
                'title'         => __( 'Copyright', 'master-template' ),
                'type'          => 'section',
                'indent'       => true,
            ),

            array(
                'id'            => 'copy-name',
                'title'         => 'Agency Developer',
                'type'          => 'text',
                'default'       => 'UniverCity'
            ),

            array(
                'id'            => 'copy-url',
                'title'         => 'Agency Link',
                'type'          => 'text',
                'default'       => 'https://univercity.com.co/'
            ),

            array(
                'id'            => 'client-name',
                'title'         => 'Customer name',
                'type'          => 'text',
                'default'       => 'MyCustomerBrand'
            ),

            array(
                'id'            => 'section-social-nav',
                'title'         => __( 'Social Shapes', 'master-template' ),
                'type'          => 'section',
                'indent'       => true,
            ),

            array(
                'id'       => 'social-nav-on-off',
                'type'     => 'switch',
                'title'    => __( 'Show Social Icons', 'master-template' ),
                'subtitle' => __( 'Enable or disable Social Icons for Footer', 'master-template' ),
                'default'  => '2',
            ),

            array(
                'id'       => 'size-social-nav',
                'type'     => 'select',
                'title'    => __('Size button social nav', 'master-template'),
                'options'  => array(
                    '1' => 'Normal',
                    '2' => 'Large',
                    '3' => 'Small'
                ),
                'default'  => '1',
                'required'    => array('social-nav-on-off','=','1')
            ),

            array(
                'id'       => 'style-color-social-nav',
                'type'     => 'select',
                'title'    => __('Color Buttons Social', 'master-template'),
                'options'  => array(
                    '1' => 'Principal',
                    '2' => 'Secondary'
                ),
                'default'  => '1',
                'required'    => array('social-nav-on-off','=','1')
            ),

            array(
                'id'       => 'section-color-footer',
                'type'     => 'section',
                'title'    => __('Color footer', 'master-template'),
                'indent'  => true,
            ),


            array(
                'id'          => 'opt-footer-color',
                'type'        => 'color', 
                'title'       => __('Background Footer Color', 'master-template'),
                'subtitle'       => __('Choose the color for Bakcground Footer', 'master-template'),
                'output'      => array(
                    'background-color' => '.top-footer'
                ),
                'default'  => '#252525',
                'required'  => array('footer-on-off' , '=', '1')
            ),

            array(
                'id'          => 'opt-text-footer-color',
                'type'        => 'color', 
                'title'       => __('Text Footer Color', 'master-template'),
                'subtitle'       => __('Choose the color for Text Footer', 'master-template'),
                'default'  => '#ccc',
                'required'  => array('footer-on-off' , '=', '1')
            ),

            array(
                'id'       => 'footer-text-link',
                'type'     => 'link_color',
                'title'    => __('Footer Link Color', 'master-template'),
                'output'   => '.site-footer .text-link, .site-footer .nav-link, .site-footer .menu .menu-item .nav-link',
                'default'  => array(
                    'regular'  => '#1e73be',
                    'hover'    => '#1a5991',
                    'active'   => '#1a5991',
                    'visited'  => '#1a5991',
                ),
            ),

            array(
                'id'    => 'sect-bottom-footer',
                'type'  => 'section',
                'title' => 'Bottom Footer (copyright)',
                'indent'=> true
            ),

            array(
                'id'          => 'opt-bottom-footer-color',
                'type'        => 'color', 
                'title'       => __('Background Bottom Footer Color', 'master-template'),
                'subtitle'       => __('Choose the color for Background Bottom Footer', 'master-template'),
                'output'      => array(
                    'background-color' => '.bottom-footer',
                ),
                'default'  => '#252525',
            ),

            array(
                'id'          => 'opt-text-bottom-footer-color',
                'type'        => 'color', 
                'title'       => __('Text Bottom Footer Color', 'master-template'),
                'subtitle'       => __('Choose the color for Text Bottom Footer', 'master-template'),
                'output'      => array(
                    'color'     => '.bottom-footer p'
                ),
                'default'  => '#fff'
            ),

        )
    ) );
    
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'master-template' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'master-template' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

