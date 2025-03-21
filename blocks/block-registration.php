<?php

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
		'title'             => __('About Company'), // Title shown in the block editor
		'description'       => __('A custom block for About Company content'), // Block description
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
		'name'              => 'top-rated-product-images', // Block name
		'title'             => __('Top Rated Product Images'), // Title shown in the block editor
		'description'       => __('A custom block that displays top rated product images'), // Block description
		'render_template'   => get_template_directory(). '/blocks/top-rated-product-images/top-rated-product-images.php', // Path to HTML template file
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

	// Register Auto Carousel Block
	acf_register_block_type(array(
		'name'              => 'auto-carousel', // Block name
		'title'             => __('Auto Carousel'), // Title shown in the block editor
		'description'       => __('A custom block for Auto Carousel content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/auto-carousel/auto-carousel.php', // Path to HTML template file
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/auto-carousel/auto-carousel.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
	
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