<?php
/**
 * gustumexlibro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gustumexlibro
 */

/**
 * Enables the HTTP Strict Transport Security (HSTS) header.
 *
 * @since 1.0.0
 */
function gustumexlibro_hsts() { 
    header( 'Strict-Transport-Security: max-age=63072000; includeSubDomains; preload' );
}
add_action( 'send_headers', 'gustumexlibro_hsts' );

add_filter( 'show_admin_bar', '__return_false' );

if ( ! function_exists( 'gustumexlibro_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function gustumexlibro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gustumexlibro, use a find and replace
	 * to change 'gustumexlibro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gustumexlibro', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
    
    // Add WooCommerce compatibility.
    add_theme_support( 'woocommerce' );

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
        set_post_thumbnail_size( 150, 150, true );
        add_image_size( 'gustumexlibro-featured', 525, 275, true );
        add_image_size( 'gustumexlibro-archive', 700, 375, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
	    'menu-top' => esc_html__( 'Primary', 'gustumexlibro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

	// Set up the WordPress core custom background feature.
	add_theme_support(
            'custom-background',
            apply_filters(
                'gustumexlibro_custom_background_args',
                array(
                    'default-color' => 'f6eabe',
		    'default-image' => get_template_directory_uri() . '/assets/img/gustrum-ex-libro_background.jpg'
		)
            )
        );

	/**
         * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
        'custom-logo',
        array(
            'height'      => 300,
            'width'       => 300,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array( 'site-title', 'site-description' )
	    )
    );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
    }
endif;
add_action( 'after_setup_theme', 'gustumexlibro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gustumexlibro_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'gustumexlibro_content_width', 1024 );
}
add_action( 'after_setup_theme', 'gustumexlibro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gustumexlibro_widgets_init() {
    register_sidebar( array(
	'name'          => esc_html__( 'Sidebar', 'gustumexlibro' ),
	'id'            => 'sidebar-1',
	'description'   => esc_html__( 'Add widgets here.', 'gustumexlibro' ),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
	)
    );
}
add_action( 'widgets_init', 'gustumexlibro_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gustumexlibro_scripts() {
    $gustumexlibro_theme = wp_get_theme();
    $gustumexlibro_version = $gustumexlibro_theme['Version'];
    // css includes
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/fa-svg-with-js.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'gustumexlibro-style', get_stylesheet_uri() );
    wp_enqueue_style( 'leaflet', get_template_directory_uri() . '/assets/css/leaflet.css' );
    wp_enqueue_style( 'awesomemarkers', get_template_directory_uri() . '/assets/css/leaflet.awesome-markers.css' );
    wp_enqueue_style( 'locatecontrol', get_template_directory_uri() . '/assets/css/leaflet.locatecontrol.min.css' );
    wp_enqueue_style( 'rrssb', get_template_directory_uri() . '/assets/css/rrssb.css' );
    
    //js includes
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.3.1', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script( 'gustumexlibro-custom', get_template_directory_uri() . '/assets/js/gustumexlibro.js', array('jquery'), $gustumexlibro_version, true );
    wp_enqueue_script( 'font-awesome', get_template_directory_uri() . '/assets/js/fontawesome-all.min.js', array('jquery'), '5.0.6', true );
    wp_enqueue_script( 'leaflet', get_template_directory_uri() . '/assets/js/leaflet.min.js', array('jquery'), null, false );
    wp_enqueue_script( 'awesomemarkers', get_template_directory_uri() . '/assets/js/leaflet.awesome-markers.js', array('leaflet'), null, false );
    wp_enqueue_script( 'locatecontrol', get_template_directory_uri() . '/assets/js/leaflet.locatecontrol.min.js', array('leaflet'), null, false );
    wp_enqueue_script( 'rrssb', get_template_directory_uri() . '/assets/js/rrssb.min.js', array(), null, false );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'gustumexlibro_scripts' );

/**
 * Register custom fonts.
 */
function gustumexlibro_fonts_url() {
    $fonts_url = '';
	
    /* Translators: If there are characters in your language that are not
    * supported by Roboto Slab, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto_slab = _x( 'on', 'Roboto Slab: on or off', 'gustumexlibro' );

    /* Translators: If there are characters in your language that are not
    * supported by Roboto, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto = _x( 'on', 'Roboto: on or off', 'gustumexlibro' );

    if ( 'off' !== $roboto_slab || 'off' !== $roboto ) {
        $font_families = array();	
        if ( 'off' !== $roboto_slab ) {
            $font_families[] = 'Roboto Slab:400,700';
	}
	if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto:300,400,500,700,900';
	}
	$query_args = array(
	    'family' => urlencode( implode( '|', $font_families ) ),
	    'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    return esc_url_raw( $fonts_url );
}

function gustumexlibro_google_fonts() {
    wp_enqueue_style( 'gustumexlibro-fonts', gustumexlibro_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'gustumexlibro_google_fonts' );

/**
 * Customize the login.php page
 */
function gustumexlibro_login_logo() {
?>
    <style type="text/css">
        body.login {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/gustrum-ex-libro_background.jpg');
            background-position: center;
            background-size: auto;
            background-repeat: repeat;
            background-attachment: scroll;
        }
        body.login div#login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/gustrum-ex-libro_logo_500x500.png');
            background-size: 300px 300px;
            background-repeat: no-repeat;
            height:250px;
            position:relative;
            top: -50px;
            width:320px;
        }
        body.login #loginform {position:relative;top:-50px;}
        body.login #nav a, body.login #backtoblog a {
            text-decoration: none;
            color: #b11312;
        }
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'gustumexlibro_login_logo' );

function gustumexlibro_login_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'gustumexlibro_login_url' );

/**
 * Change the custom logo class
 */
function gustumexlibro_logo_classes( $html ) {
    $html = str_replace( 'custom-logo', 'custom-logo img-fluid', $html );
    return $html;
}
add_filter( 'get_custom_logo', 'gustumexlibro_logo_classes' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
if ( ! function_exists( 'gustumexlibro_excerpt_more' ) && ! is_admin() ) :
    function gustumexlibro_excerpt_more() {
        return ' &hellip; ';
    }
    add_filter( 'excerpt_more', 'gustumexlibro_excerpt_more' );
endif;

/* Change Excerpt length */
if ( ! function_exists( 'gustumexlibro_excerpt_length' ) && ! is_admin() ) :
    function gustumexlibro_excerpt_length( $length ) {
        return 34;
    }
    add_filter( 'excerpt_length', 'gustumexlibro_excerpt_length', 999 );
endif;

function gustumexlibro_images_addclasses($content){
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
    $document = new DOMDocument();
    libxml_use_internal_errors(true);
    $document->loadHTML(utf8_decode($content), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $imgs = $document->getElementsByTagName('img');
    foreach ($imgs as $img) {
        $existing_class = $img->getAttribute('class');
        $img->setAttribute('class', $existing_class .' img-fluid');
    }

    $html = $document->saveHTML();
    return $html;   
}
add_filter('the_content', 'gustumexlibro_images_addclasses');

/* Custom tiled gallery content width */
function gustumexlibro_jetpacktiledgallery_width() {
    return '676';
}
add_filter( 'tiled_gallery_content_width', 'gustumexlibro_jetpacktiledgallery_width' );

/* Custom tiled gallery type ('rectangular', 'square', 'circle', 'rectangle', 'columns') */
function gustumexlibro_jetpacktiledgallery_type() {
        return 'rectangular';
}
add_filter( 'jetpack_default_gallery_type', 'gustumexlibro_jetpacktiledgallery_type', 20 );

function gustumexlibro_jetpackrelatedposts_remove() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'gustumexlibro_jetpackrelatedposts_remove', 20 );

function gustumexlibro_jetpackrelatedposts_custom( $atts ) {
    $posts_titles = array();
 
    if ( class_exists( 'Jetpack_RelatedPosts' ) && method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) {
        $related = Jetpack_RelatedPosts::init_raw()
            ->set_query_name( 'jetpackme-shortcode' )
            ->get_for_post_id(
                get_the_ID(),
                array( 'size' => 3 )
            );
 
        if ( $related ) {
            //print_r($related);
            $jtrel =  '<div id="related-posts" class="mt-3 p-3 bg-white border border-dark rounded">';
            $jtrel .= '<ul class="list-group list-group-flush">';
            foreach ( $related as $result ) {
                $jtrel .= '<li class="list-group-item">';
                $jtrel .= '<a href="' . get_permalink( $result[ 'id' ] ) . '"><img class="img-fluid mr-3 border border-secondary rounded float-left" src="' . get_the_post_thumbnail_url( $result[ 'id' ] ) . '" alt=""></a>';
                $jtrel .= '<h5><a href="' . get_permalink( $result[ 'id' ] ) . '" class="text-dark nounderline" rel="bookmark">' . get_the_title( $result[ 'id' ] ) . '</a></h5>';
                $jtrel .= '<p class="text-muted"><small>' . get_the_excerpt( $result[ 'id' ] ) . '</small></p>';
                $jtrel .= '<p class="text-muted text-right"><small>' . get_the_date( 'd/m/Y', $result[ 'id' ] ) . '</small></p>';
                $jtrel .= '</li><!-- /.li -->';
            }
            $jtrel .= '</ul><!-- /.list-group -->';
            $jtrel .= '</div><!-- /#related-posts -->';
        }
    }
    return $jtrel;
}
add_shortcode( 'gustumexlibro_jetpackrelatedposts_shortcode', 'gustumexlibro_jetpackrelatedposts_custom' );

function gustumexlibro_admin_scripts() {
    wp_enqueue_style( 'gustumexlibro-admin-style', get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );   
    wp_enqueue_script( 'gustumexlibro-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );    	
}
add_action( 'customize_controls_enqueue_scripts', 'gustumexlibro_admin_scripts' );

/**
 * Install necessary and recommended plugins for the theme
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}