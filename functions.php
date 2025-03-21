<?php
/**
 * MRS Oil functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MRS_Oil
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}
// define version
define('THEME_VERSION', wp_get_theme(get_stylesheet())->get('Version'));
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mrs_oil_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MRS Oil, use a find and replace
		* to change 'mrs-oil' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mrs-oil', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mrs-oil' ),
		)
	);

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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mrs_oil_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mrs_oil_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mrs_oil_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mrs_oil_content_width', 640 );
}
add_action( 'after_setup_theme', 'mrs_oil_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mrs_oil_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mrs-oil' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mrs-oil' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mrs_oil_widgets_init' );


//svg mime type upload permission
define('ALLOW_UNFILTERED_UPLOADS', true);
function svg_mime_types_perm($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'svg_mime_types_perm');

//permission of uploaded svg file display on media library
function custom_admin_head_display_svg_perm() {
  $css = '';
  $css = 'td.media-icon img[src$=".svg"] { width: 100% !important; height: auto !important; }';
  echo '<style type="text/css">'.$css.'</style>';
}
add_action('admin_head', 'custom_admin_head_display_svg_perm');
//END - svg mime type upload permission

/**
 * Enqueue scripts and styles.
 */

function mrs_oil_scripts() {
    
    // Enqueue external and local CSS files
	wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array());
	wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), true);
	wp_enqueue_script('jquery-script', 'https://code.jquery.com/jquery-1.12.1.min.js', array(), true);
	
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), time());
    wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array(), time());
    wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css', array(), time());
    wp_enqueue_style('icons-css', get_stylesheet_directory_uri() . '/css/icons.css', array(), time());
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), time());
    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/css/style.css', array(), time());
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css', array(), time());
    wp_enqueue_style('responsive-css', get_stylesheet_directory_uri() . '/css/responsive.css', array(), time());
    wp_enqueue_style('splitting-css','https://unpkg.com/splitting/dist/splitting.css', array(), time());
    wp_enqueue_style('splitting-cells-css','https://unpkg.com/splitting/dist/splitting-cells.css', array(), time());
	wp_enqueue_style('page-header-block-style', get_stylesheet_directory_uri() . '/blocks/page-header/block.css', array(),time());
    // Enqueue JavaScript files
    wp_enqueue_script('mrs-oil-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), time(), true);

	// Enqueue the main stylesheet
    wp_enqueue_style('mrs-oil-style', get_stylesheet_directory_uri(), array(), time());
    wp_style_add_data('mrs-oil-style', 'rtl', 'replace');

	// Enqueue comment reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mrs_oil_scripts');
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ), // Register the Header Menu
        )
    );
}
add_action( 'init', 'register_my_menus' );

// Register Blocks function 
function register_acf_block_types()
{

	// Register a Header block
	acf_register_block_type(array(
		'name'              => 'page-header', // Block name
		'title'             => ('Page Header'), // Title shown in the block editor
		'description'       => ('A custom block for page header content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/page-header/page-header.php', // Path to HTML template file
		'category'          => 'isoclima', // Category where the block will appear (you can use your own category)
		'icon'              => 'admin-home', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('header', 'page', 'title'),
		'mode'				=> 'preview',
		'enqueue_assets' => function () {
			// wp_enqueue_style(
			// 	'page-header-block-style',
			// 	get_stylesheet_directory_uri() . '/blocks/page-header/block.css',
			// 	array(),
			// 	THEME_VERSION
			// );
			// wp_enqueue_script('page_header_js', get_stylesheet_directory_uri() . '/blocks/page-header/block.js', array('jquery'), THEME_VERSION, true);
		},
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/page-header/page-header.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	//Hero slider Block register
	acf_register_block_type(array(
		'name'              => 'hero_slider',
		'title'             => __('Hero Slider'),
		'render_template'   => get_stylesheet_directory() . '/blocks/hero-slider/hero-slider.php',
		'category'          => 'isoclima',
		'icon'              => 'images-alt2',
		'keywords'          => array('carousel', 'slider', 'hero'),
		'mode'				=> 'preview',
		'enqueue_assets' => function () {
			// wp_enqueue_style(
			// 	'page_hero_css',
			// 	get_stylesheet_directory_uri() . '/blocks/hero-slider/block.css',
			// 	array(),
			// 	THEME_VERSION
			// );
			wp_enqueue_script(
				'page_hero_js',
				get_stylesheet_directory_uri() . '/blocks/hero-slider/block.js',
				array('jquery'),
				THEME_VERSION,
				true
			);
		},
		// Support widget functionality by setting these parameters:
		'supports' => array(
			'align' => true,          // Allow alignment options
			'anchor' => true,         // Enable anchor links
			'customClassName' => true, // Allow custom CSS classes
			'color'  => array(
				'background' => true, // Enables background color support
				'text'       => true  // Enables text color support
			)
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/hero-slider/hero-slider.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
}

// Header widget register
function header_widget_init()
{
	register_sidebar(array(
		'name'          => __('Header Widget', 'genesis-block-theme-child'),
		'id'            => 'header-widget',
		'description'   => __('Widgets in this area will appear in the header.', 'genesis-block-theme-child'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action('acf/init', 'register_acf_block_types');
add_action('widgets_init', 'header_widget_init');

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load TGM plugin file.
 */
require get_template_directory() . '/inc/tgm-plugins.php';