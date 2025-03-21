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

// Fixed Container sized align
add_theme_support( 'align-wide' );

// Full Width Alignment
add_theme_support( 'align-full' );

// Register Blocks Category
function mrs_block_category($categories)
{
	// Add the new category at the beginning of the array
	array_unshift(
		$categories,
		[
			'slug'  => 'mrs',
			'title' => __('MRS', 'text-domain'),
		]
	);

	return $categories;
}
add_filter('block_categories_all', 'mrs_block_category');

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

	// Fixed Container sized align
	add_theme_support( 'align-wide' );

	// Full Width Alignment
	add_theme_support( 'align-full' );


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
	register_sidebar(array(
        'name'          => 'Header Widget',
        'id'            => 'header_widget',
        'before_widget' => '<div class="header-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => 'Footer Widget',
        'id'            => 'footer_widget',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
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
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), time());
    wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array(), time());
    wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css', array(), time());
    wp_enqueue_style('icons-css', get_stylesheet_directory_uri() . '/css/icons.css', array(), time());
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), time());
    wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/css/style.css', array(), time());
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css', array(), time());
    wp_enqueue_style('responsive-css', get_stylesheet_directory_uri() . '/css/responsive.css', array(), time());
	wp_enqueue_style('vanilla-calender', get_stylesheet_directory_uri() . '/css/vanilla-calendar.min.css', array(), time());
    wp_enqueue_style('splitting-css','https://unpkg.com/splitting/dist/splitting.css', array(), time());
    wp_enqueue_style('splitting-cells-css','https://unpkg.com/splitting/dist/splitting-cells.css', array(), time());

	// // Enqueue External and Local Script File
	wp_enqueue_script('header-js', get_stylesheet_directory_uri() . '/js/header.js', array(), time(), true);
	wp_enqueue_script('footer-js', get_stylesheet_directory_uri() . '/js/footer.js', array(), time(), true);
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@next/dist/aos.js', array(), time(), true);
	wp_enqueue_script('jquery-min-js', get_stylesheet_directory_uri() . '/js/jquery-3.6.4.min.js', array(), time(), true);
	wp_enqueue_script('jqueryajax-js', get_stylesheet_directory_uri() . '/js/jquery-ajax.min.js', array(), time(), true);
	wp_enqueue_script('smoothscroll-js', get_stylesheet_directory_uri() . '/js/SmoothScroll.js', array(), time(), true);
	wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), time(), true);
	wp_enqueue_script('swiper-bundle-js', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array(), time(), true);
	wp_enqueue_script('marquee-js', get_stylesheet_directory_uri() . '/js/jquery.marquee.min.js', array(), time(), true);
	wp_enqueue_script('form-js', get_stylesheet_directory_uri() . '/js/form.js', array(), time(), true);
	wp_enqueue_script('formsubscriber-js', get_stylesheet_directory_uri() . '/js/formsubscriber.js', array(), time(), true);
	wp_enqueue_script('gsap-js', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js?r=5426', array(), time(), true);
	wp_enqueue_script('scrollTrigger-js', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollTrigger.min.js', array(), time(), true);
	wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), time(), true);
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), time(), true);
	wp_enqueue_script('index-js', get_stylesheet_directory_uri() . '/js/index.js', array(), time(), true);
          
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


// Set the Menu Choices to ACf Field 
function set_menu_list_to_acf_footer($field) {
	$menus = wp_get_nav_menus();
	$menu_fields = array('select_header_menu', 'footer_menu_1', 'footer_menu_2', 'footer_menu_3', 'footer_menu_4');
	if (in_array($field['name'], $menu_fields)) {
		$field['choices'] = array();
		foreach ($menus as $menu) {
			$field['choices'][$menu->term_id] = ucwords($menu->name);
		}
	}
	return $field;
}
add_filter('acf/load_field', 'set_menu_list_to_acf_footer');


// Register Custom Block
function register_acf_block_types() { 

	// Register a Header block
	acf_register_block_type(array(
		'name'              => 'page-header', // Block name
		'title'             => ('Page Header'), // Title shown in the block editor
		'description'       => ('A custom block for page header content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/page-header/page-header.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'admin-home', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('header', 'page', 'title'),
		'mode'				=> 'preview',
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

	// Register Page Footer Block
	acf_register_block_type(array(
		'name'              => 'page-footer', // Block name
		'title'             => __('Page Footer'), // Title shown in the block editor
		'description'       => __('A custom block for page Footer content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/page-footer/page-footer.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'admin-multisite', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('footer', 'page', 'foot'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/page-footer/page-footer.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),

	));

	// Register Hero Slider Block
	acf_register_block_type(array(
		'name'              => 'hero-slider', // Block name
		'title'             => __('Hero Slider'), // Title shown in the block editor
		'description'       => __('A custom block for Hero slider content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/hero-slider/hero-slider.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'slides', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('hero','banner','page', 'slider', 'slide'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			
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

	// Register About Us Block
	acf_register_block_type(array(
		'name'              => 'about-us', // Block name
		'title'             => __('About Us'), // Title shown in the block editor
		'description'       => __('A custom block for About Us content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/about-us/about-us.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'editor-insertmore', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','about','us', 'image', 'product'),
		'supports'      => array(
			'align'      => true,
		),
		'mode' => 'preview',
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/about-us/about-us.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Star Image Product Block
	acf_register_block_type(array(
		'name'              => 'star-image-section', // Block name
		'title'             => __('Star Image Product'), // Title shown in the block editor
		'description'       => __('A custom block for Star Image Product content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/star-image-section/star-image-section.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'star-filled', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','Star', 'image', 'product', 'section'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/star-image-section/star-image-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Product and Services Accordian Block
	acf_register_block_type(array(
		'name'              => 'product-and-services-accordian', // Block name
		'title'             => __('Product and Services Accordian'), // Title shown in the block editor
		'description'       => __('A custom block for Product and Services Accordian content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/product-and-services-accordian/product-and-services-accordian.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'insert', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','services','accordian', 'section', 'product'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => true,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/product-and-services-accordian/product-and-services-accordian.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
	
	// Register USPS Section Block
	acf_register_block_type(array(
		'name'              => 'usps-section', // Block name
		'title'             => __('USPS Section'), // Title shown in the block editor
		'description'       => __('A custom block for USPS Section content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/usps-section/usps-section.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'plus', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','usps','us', 'section'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => true,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/usps-section/usps-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Industry Section Block
	acf_register_block_type(array(
		'name'              => 'industry-section', // Block name
		'title'             => __('Industry Section'), // Title shown in the block editor
		'description'       => __('A custom block for Industry Section content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/industry-section/industry-section.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'building', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','Industry','build', 'image'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => true,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/industry-section/industry-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register policy Section Block
	acf_register_block_type(array(
		'name'              => 'policy-section', // Block name
		'title'             => __('Policy Section'), // Title shown in the block editor
		'description'       => __('A custom block for policy Section content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/policy-section/policy-section.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'editor-ol', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','policy','build', 'image'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => true,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/policy-section/policy-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register blogs Section Block
	acf_register_block_type(array(
		'name'              => 'blogs-section', // Block name
		'title'             => __('Blogs Section'), // Title shown in the block editor
		'description'       => __('A custom block for blogs Section content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/blogs-section/blogs-section.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'grid-view', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','blogs','build', 'image'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => true,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/blogs-section/blogs-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a CTA Banner block
	acf_register_block_type(array(
		'name'              => 'cta-banner', // Block name
		'title'             => ('CTA Banner'), // Title shown in the block editor
		'description'       => ('A custom block CTA Banner content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/CTA-banner/cta-banner.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'admin-home', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('CTA', 'banner', 'contact'),
		'mode'				=> 'preview',
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/CTA-banner/CTA-banner-img.svg', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Innner Hero Banner block
	acf_register_block_type(array(
		'name'              => 'hero-banner', // Block name
		'title'             => ('Hero Banner'), // Title shown in the block editor
		'description'       => ('A custom block Hero Banner Section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/hero-banner/hero-banner.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'cover-image', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('hero banner', 'banner', 'hero','hero section'),
		'mode'				=> 'preview',
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/hero-banner/hero-banner-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Our Mission & Vision block
	acf_register_block_type(array(
		'name'              => 'our-mission-vision', // Block name
		'title'             => ('Our Mission & Vision'), // Title shown in the block editor
		'description'       => ('A custom block For Our Misson & Vision'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/our-mission-and-vision/our-mission-and-vision.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'lightbulb', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('our mission & vision', 'mission', 'vision','goal','target'),
		'mode'				=> 'preview',
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/our-mission-and-vision/our-mission-and-vision-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Who We Are block
	acf_register_block_type(array(
		'name'              => 'who-we-are', // Block name
		'title'             => ('Who We Are'), // Title shown in the block editor
		'description'       => ('A custom block For Who We Are Section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/who-we-are/who-we-are.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'info-outline', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('who we are', 'image and text', 'image','text','about'),
		'mode'				=> 'preview',
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/who-we-are/who-we-are-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Corporate Values block
	acf_register_block_type(array(
		'name'              => 'corporate-values', // Block name
		'title'             => ('Corporate Values'), // Title shown in the block editor
		'description'       => ('A custom block For Corporate values Section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/corporate-values/corporate-values.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'admin-site-alt3', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('corporate values', 'values', 'key points','corporate','key values'),
		'mode'				=> 'preview',
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/corporate-values/corporate-values.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));


	// Register Auto Carousel Block
    acf_register_block_type(array(
        'name'              => 'auto-carousel', // Block name
        'title'             => __('Auto Carousel'), // Title shown in the block editor
        'description'       => __('A custom block for Auto Carousel content'), // Block description
        'render_template'   => get_template_directory(). '/blocks/auto-carousel/auto-carousel.php', // Path to HTML template file
        'category'          => 'mrs', // Category where the block will appear (you can use your own category)
        'icon'              => 'building', // Block icon (you can use Dashicon or custom SVG)
        'keywords'          => array('home','Industry','build', 'image'),
        'mode'                => 'preview',
        'supports'      => array(
            'align'      => true,
            'color'      => array(
                'text' => false,
                'background' => true,
            ),
        ),
        // Add example for the preview image
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image' => get_stylesheet_directory_uri() . '/blocks/auto-carousel/auto-carousel.png', // Path to your preview image
                    'is_preview'    => true
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'register_acf_block_types');


// Fetch Acf field of Product services taxonomy
function get_category_acf_field( $field_name, $category_id = 0 ) {
    if ( ! $category_id ) {
        $category_id = get_queried_object_id();
    }
    if ( ! $category_id ) {
        return null;
    }
    $term_id = 'category_' . $category_id;
    $field_value = get_field( $field_name, $term_id );
    return $field_value;
}

// Fetch The permalink of Post Taxonomy
function get_term_link_by_slug_default( $term_slug, $taxonomy = 'category' ) {
    $term_slug = sanitize_title( $term_slug );

    $term = get_term_by( 'slug', $term_slug, $taxonomy );

    if ( ! $term || is_wp_error( $term ) ) {
        return new WP_Error( 'term_not_found', 'Term not found with slug: ' . $term_slug . ' and taxonomy: ' . $taxonomy );
    }

    $term_link = get_term_link( $term );

    if ( is_wp_error( $term_link ) ) {
        return $term_link; 
    }
    return $term_link;
}

function get_post_taxonomy_terms( $post_id, $taxonomy = 'category' ) {
    $post_id = intval( $post_id );
	$terms = wp_get_post_terms( $post_id, $taxonomy );
    if ( is_wp_error( $terms ) ) {
        return $terms; 
    }
	return $terms;
}

// Define Global Color to fetch color from  Block Editor
define('CUSTOM_COLOR_PALETTE',array(
    'white' => '#FFFFFF',
    'wild-sand' => '#F5F5F5',
    'grey' => '#B0B0B0',
    'dove-gray' => '#666666',
    'emperor' => '#555555',
    'sun' => '#F7A209',
    'tawny-port' => '#74253A',
    'zeus' => '#1E1916',
    'cod-gray' => '#111111',
    'black' => '#000000'
));
// Rewrite the Color Of Block Editor 
function my_custom_block_editor_palette() {
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('White', 'textdomain'),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
		array(
            'name'  => __('Wild Sand', 'textdomain'),
            'slug'  => 'wild-sand',
            'color' => '#F5F5F5',
        ),
		array(
            'name'  => __('Grey', 'textdomain'),
            'slug'  => 'grey',
            'color' => '#B0B0B0',
        ),
        array(
            'name'  => __('Dove Gray', 'textdomain'),
            'slug'  => 'dove-gray',
            'color' => '#666666',
        ),
		array(
            'name'  => __('Emperor', 'textdomain'),
            'slug'  => 'emperor',
            'color' => '#555555',
        ),
        array(
            'name'  => __('Sun', 'textdomain'),
            'slug'  => 'sun',
            'color' => '#F7A209',
        ),
        array(
            'name'  => __('Tawny Port', 'textdomain'),
            'slug'  => 'tawny-port',
            'color' => '#74253A',
        ),
        array(
            'name'  => __('Zeus', 'textdomain'),
            'slug'  => 'zeus',
            'color' => '#1E1916',
        ),
        array(
            'name'  => __('Cod Gray', 'textdomain'),
            'slug'  => 'cod-gray',
            'color' => '#111111',
        ),
		array(
            'name'  => __('Black', 'textdomain'),
            'slug'  => 'black',
            'color' => '#000000',
        ),
    ));
}
add_action('after_setup_theme', 'my_custom_block_editor_palette');


// Add Gutenberg Block Category
function my_custom_block_category($categories, $post) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'mrs',
				'title' => __('MRS', 'textdomain'),
			),
		)
	);
}
function my_custom_blocks() {
	add_filter('block_categories', 'my_custom_block_category', 10, 2);
}
add_action('init', 'my_custom_blocks');



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

function mrs_nav_menu($navmenu, $menu_parent = 0) {
    $menu_items = $navmenu;
    foreach ($menu_items as $items) {
        if ($items['menu_item_parent'] == $menu_parent) {
            echo '<li class="nav-item dropdown">';
            echo '<a href="' . esc_url($items['url']) . '" class="nav-link myElement dropdown-toggle dt-none" data-bs-hover="dropdown" aria-expanded="false">' . esc_html($items['title']);
            echo '<div class="arrow"><div class="arrow-line left"></div><div class="arrow-line right"></div></div></a>';
            mrs_nav_menu_sub_item($menu_items, $items['id'], 1); // Initial level set to 1
            echo '</li>';
        }
    }
}

function mrs_nav_menu_sub_item($navmenu, $parent_id, $level) {
    $sub_items = array_filter($navmenu, function($item) use ($parent_id) {
        return $item['menu_item_parent'] == $parent_id;
    });

    if (!empty($sub_items)) {
        $sub_menu_class = ($level === 2 || $level === 1) ? 'dropend' : 'dropdown';
        echo '<ul class="dropdown-menu">';

        foreach ($sub_items as $sub_item) {
            $has_children = array_filter($navmenu, function($item) use ($sub_item) {
                return $item['menu_item_parent'] == $sub_item['id'];
            });

            if (($level === 2 || $level === 1) && !empty($has_children)) {
				
                echo '<li class="nav-item ' . $sub_menu_class . '">';
                echo '<a href="' . esc_url($sub_item['url']) . '" class="dropdown-item">' . esc_html($sub_item['title']);
                echo '<div class="arrow"><div class="arrow-line left"></div><div class="arrow-line right"></div></div></a>';
            } else {
                echo '<li class="nav-item dropdown"><a href="' . esc_url($sub_item['url']) . '" class="dropdown-item">' . esc_html($sub_item['title']) . '</a>';
            }

            // Recursive call for deeper levels, increasing the level
            mrs_nav_menu_sub_item($navmenu, $sub_item['id'], $level + 1);

            echo '</li>';
        }

        echo '</ul>';
    }
}

function mrs_mobile_nav_menu($navmenu, $menu_parent = 0, $level = 0) {
    $menu_items = $navmenu;
    $has_dropdown_class = ($level > 0) ? 'dropend' : 'dropdown';

    echo '<ul class="navbar-nav">';

    foreach ($menu_items as $item) {
        if ($item['menu_item_parent'] == $menu_parent) {
            $has_submenu = !empty(array_filter($menu_items, function($child) use ($item) {
                return $child['menu_item_parent'] == $item['id'];
            }));

            $dropdown_toggle = $has_submenu ? 'dropdown-toggle' : '';
            $aria_expanded = $has_submenu ? 'aria-expanded="false"' : '';
            $data_toggle = $has_submenu ? 'data-bs-toggle="dropdown"' : '';
            $nav_link_class = $has_submenu ? 'nav-link dt-none myElement' . ($level + 1) : 'nav-link';

            echo '<li class="' . esc_attr($has_dropdown_class) . ' nav-item">';

            echo '<a href="' . esc_url($item['url']) . '" class="' . esc_attr($nav_link_class) . '" ' . $data_toggle . ' ' . $aria_expanded . '>';
            echo esc_html($item['title']);

            if ($has_submenu) {
                echo '<div class="arrow">
                        <div class="arrow-line left"></div>
                        <div class="arrow-line right"></div>
                      </div>';
            }

            echo '</a>';

            if ($has_submenu) {
                echo '<ul class="dropdown-menu">';
                mrs_mobile_nav_menu($menu_items, $item['id'], $level + 1);
                echo '</ul>';
            }

            echo '</li>';
        }
    }

    echo '</ul>';
}
