<?php

// Register Custom Block
function register_acf_block_types() { 

	// Register a Header block
	acf_register_block_type(array(
		'name'              => 'page-header', // Block name
		'title'             => ('Page Header'), // Title shown in the block editor
		'description'       => ('A custom block for page header content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/page-header/page-header.php', // Path to HTML template file
		'category'          => 'widgets', // Category where the block will appear (you can use your own category)
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
		'category'          => 'widgets', // Category where the block will appear (you can use your own category)
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

	// Register Flash Screen Block
	acf_register_block_type(array(
		'name'              => 'flash-screen', // Block name
		'title'             => __('Flash Screen'), // Title shown in the block editor
		'description'       => __('A custom block for Flash Screen content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/flash-screen/flash-screen.php', // Path to HTML template file
		'category'          => 'widgets', // Category where the block will appear (you can use your own category)
		'icon'              => 'fullscreen-alt', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('flash', 'sreen', 'home', 'popup', 'up'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/flash-screen/flash-screen.png', // Path to your preview image
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

	// Register About Company Block
	acf_register_block_type(array(
		'name'              => 'about-company', // Block name
		'title'             => __('About Company'), // Title shown in the block editor
		'description'       => __('A custom block for About Company content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/about-company/about-company.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'editor-insertmore', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','about','us', 'image', 'company'),
		'supports'      => array(
			'align'      => true,
		),
		'mode' => 'preview',
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/about-company/about-company.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Star Image Product Block
	acf_register_block_type(array(
		'name'              => 'top-rated-products', // Block name
		'title'             => __('Top Rated Products'), // Title shown in the block editor
		'description'       => __('A custom block that displays top rated product images'), // Block description
		'render_template'   => get_template_directory(). '/blocks/top-rated-products/top-rated-products.php', // Path to HTML template file
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/top-rated-products/star-image-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Product and Services Accordian Block
	acf_register_block_type(array(
		'name'              => 'products-and-services', // Block name
		'title'             => __('Products and Services'), // Title shown in the block editor
		'description'       => __('A custom block for Products and Services content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/products-and-services/products-and-services.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'products', // Block icon (you can use Dashicon or custom SVG)
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/products-and-services/product-and-services-accordian.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
	
	// Register USPS Section Block
	acf_register_block_type(array(
		'name'              => 'usps-section', // Block name
		'title'             => __('Unique Selling Propositions'), // Title shown in the block editor
		'description'       => __('A custom block for USPS Section content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/usps-section/usps-section.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'chart-line', // Block icon (you can use Dashicon or custom SVG)
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

	// Register Our Leader Block
	acf_register_block_type(array(
		'name'              => 'our-leader', // Block name
		'title'             => __('Our Leader'), // Title shown in the block editor
		'description'       => __('A custom block for Our Leader content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/our-leader/our-leader.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'buddicons-buddypress-logo', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','leader', 'our','build', 'image'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/our-leader/our-leader.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
	
	// Register policy Section Block
	acf_register_block_type(array(
		'name'              => 'our-policies', // Block name
		'title'             => __('Our Policies'), // Title shown in the block editor
		'description'       => __('A custom block for our policies content'), // Block description
		'render_template'   => get_template_directory(). '/blocks/our-policies/our-policies.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'welcome-write-blog', // Block icon (you can use Dashicon or custom SVG)
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/our-policies/policy-section.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register News blogs Section Block
	acf_register_block_type(array(
		'name'              => 'news-blogs', // Block name
		'title'             => __('News Blogs'), // Title shown in the block editor
		'description'       => __('A custom block for blogs list'), // Block description
		'render_template'   => get_template_directory(). '/blocks/news-blogs/news-blogs.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'format-aside', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','news', 'blogs','build', 'image'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/news-blogs/news-blogs.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a CTA Footer block
	acf_register_block_type(array(
		'name'              => 'cta-footer', // Block name
		'title'             => ('CTA Footer'), // Title shown in the block editor
		'description'       => ('A custom block CTA footer content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/CTA-footer/CTA-footer.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'button', // Block icon (you can use Dashicon or custom SVG)
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/CTA-footer/CTA-footer-img.svg', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Innner Hero Banner block
	acf_register_block_type(array(
		'name'              => 'page-hero', // Block name
		'title'             => ('Page Hero'), // Title shown in the block editor
		'description'       => ('A custom block Page Hero Section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/page-hero/page-hero.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'media-interactive', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('hero banner', 'banner', 'page hero','hero section'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/page-hero/hero-banner-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Our Mission & Vision block
	acf_register_block_type(array(
		'name'              => 'mission-vision', // Block name
		'title'             => ('Mission & Vision'), // Title shown in the block editor
		'description'       => ('A custom block For Our Misson & Vision'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/mission-and-vision/mission-and-vision.php', // Path to HTML template file
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/mission-and-vision/our-mission-and-vision-img.png', // Path to your preview image
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

	// Register Industry Section Block
    acf_register_block_type(array(
        'name'              => 'industry-section', // Block name
        'title'             => __('Industry Section'), // Title shown in the block editor
        'description'       => __('A custom block for Industry Section content'), // Block description
        'render_template'   => get_template_directory(). '/blocks/industry-section/industry-section.php', // Path to HTML template file
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
                    'preview_image' => get_stylesheet_directory_uri() . '/blocks/industry-section/industry-section.png', // Path to your preview image
                    'is_preview'    => true
                ),
            ),
        ),
    ));

	// Register a History block
	acf_register_block_type(array(
		'name'              => 'history', // Block name
		'title'             => ('History'), // Title shown in the block editor
		'description'       => ('A custom block For history Section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/history/history.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'clock', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('history'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/history/history-imgs.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Responsibility block
	acf_register_block_type(array(
		'name'              => 'responsibility', // Block name
		'title'             => ('Responsibility'), // Title shown in the block editor
		'description'       => ('A custom block For Responsibility Section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/responsibility/responsibility.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'feedback', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('responsibility'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/responsibility/responsibility-imgs.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Get In Touch block
	acf_register_block_type(array(
		'name'              => 'contact-us', // Block name
		'title'             => ('Contact Us'), // Title shown in the block editor
		'description'       => ('A custom block For Contact Us content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/contact-us/contact-us.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'phone', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('get in touch', 'Contact','inquiry','address'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/contact-us/get-in-touch-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Our Locations block
	acf_register_block_type(array(
		'name'              => 'our-locations', // Block name
		'title'             => ('Our Locations'), // Title shown in the block editor
		'description'       => ('A custom block For Our Locations Contact Us page section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/our-locations/our-locations.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'location-alt', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('locations', 'our locations','address','contact','offices'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/our-locations/our-locations-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
	
	// Register a Service Details block
	acf_register_block_type(array(
		'name'              => 'service-details', // Block name
		'title'             => ('Service Details'), // Title shown in the block editor
		'description'       => ('A custom block For Service Details section in Service page'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/service-details/service-details.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'media-interactive', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('services', 'service details','about services','details'),
		'mode'				=> 'preview',
		'supports' => array(
			'align' => true,          // Allow alignment options
			'anchor' => true,         // Enable anchor links
			'customClassName' => true, // Allow custom CSS classes
			'color'  => array(
				'background' => true, // Enables background color support
				'text'       => false  // Enables text color support
			)
		),
	));

	// Register Product List Block
	acf_register_block_type(array(
		'name'              => 'product-list', // Block name
		'title'             => ('Product List'), // Title shown in the block editor
		'description'       => ('A custom block Product List content'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/product-list/product-list.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'products', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('product', 'list', 'section', 'item', 'posts'),
		'mode'				=> 'preview',
		'supports' => array(
			'align' => true,          // Allow alignment options
		),
		'enqueue_assets' => function(){
			wp_enqueue_style( 'product_lists_css', get_stylesheet_directory_uri() . '/blocks/product-list/block.css',arrat(), time() );
		},
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/product-list/product-list-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Investor Relations listing Section Block
	acf_register_block_type(array(
		'name'              => 'investor-relations-list', // Block name
		'title'             => __('Investor Relations List'), // Title shown in the block editor
		'description'       => __('A custom block for Investor Relations listing.'), // Block description
		'render_template'   => get_template_directory(). '/blocks/investor-relations-list/investor-relations-list.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'tickets-alt', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('investor','relations', 'events','listing'),
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
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/investor-relations-list/investor-relations-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Latest blogs Section Block
	acf_register_block_type(array(
		'name'              => 'latest-blogs', // Block name
		'title'             => __('Latest Blogs'), // Title shown in the block editor
		'description'       => __('A custom block for latest blogs list'), // Block description
		'render_template'   => get_template_directory(). '/blocks/latest-blogs/latest-blogs.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'tickets-alt', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('home','latest', 'blogs','build', 'image'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => false,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/latest-blogs/latest-blogs.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Company Activity Section Block
	acf_register_block_type(array(
		'name'              => 'company-activities', // Block name
		'title'             => __('Company Activity'), // Title shown in the block editor
		'description'       => __('A custom block for Company Activity list'), // Block description
		'render_template'   => get_template_directory(). '/blocks/company-activities/company-activities.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'tide', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('investor', 'relations', 'activity','company', 'blogs', 'build', 'image'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => false,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/company-activities/company-activities.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	acf_register_block_type(array(
		'name'              => 'gallery-image', // Block name
		'title'             => __('Image Gallery'), // Title shown in the block editor
		'description'       => __('A custom block for Company Event Gallery'), // Block description
		'render_template'   => get_template_directory(). '/blocks/image-gallery/image-gallery.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'format-gallery', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('image', 'gallery', 'event','company', 'photo'),
		'mode'				=> 'preview',
		'supports'      => array(
			'align'      => true,
			'color'      => array(
				'text' => false,
				'background' => false,
			),
		),
		// Add example for the preview image
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/image-gallery/image-gallery-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register Upcoming Meeting Section Block
	acf_register_block_type(array(
		'name'              => 'upcoming-meeting', // Block name
		'title'             => __('Upcoming Meeting'), // Title shown in the block editor
		'description'       => __('A custom block for Upcoming Meeting list'), // Block description
		'render_template'   => get_stylesheet_directory(). '/blocks/upcoming-meeting/upcoming-meeting.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'video-alt2', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('investor', 'relations', 'activity','company', 'blogs', 'build', 'image'),
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
					'preview_image' => get_stylesheet_directory() . '/blocks/upcoming-meeting/upcoming-meeting.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Shareholder Services block
	acf_register_block_type(array(
		'name'              => 'shareholder-services', // Block name
		'title'             => ('Shareholder Services'), // Title shown in the block editor
		'description'       => ('A custom block For Shareholder Services section in Service page'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/shareholder-services/shareholder-services.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'buddicons-groups', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('services', 'Shareholder Services','about services','details'),
		'mode'				=> 'preview',
		'supports' => array(
			'align' => true,          // Allow alignment options
			'anchor' => true,         // Enable anchor links
			'customClassName' => true, // Allow custom CSS classes
			'color'  => array(
				'background' => true, // Enables background color support
				'text'       => false  // Enables text color support
			)
		),
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/shareholder-services/shareholder-services.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Yearly Report block
	acf_register_block_type(array(
		'name'              => 'yearly-report', // Block name
		'title'             => ('Yearly Report'), // Title shown in the block editor
		'description'       => ('A custom block For Yearly Report section in Service page'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/yearly-report/yearly-report.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'calendar', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('services', 'Yearly Report','about services','details'),
		'mode'				=> 'preview',
		'supports' => array(
			'align' => true,          // Allow alignment options
			'anchor' => true,         // Enable anchor links
			'customClassName' => true, // Allow custom CSS classes
			'color'  => array(
				'background' => false, // Enables background color support
				'text'       => false  // Enables text color support
			)
		),
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/yearly-report/yearly-report.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Breadcrumb block
	acf_register_block_type(array(
		'name'              => 'breadcrumb-section', // Block name
		'title'             => ('Breadcrumb'), // Title shown in the block editor
		'description'       => ('A custom block For Breadcrumb section in Service page'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/breadcrumb/breadcrumb.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'controls-repeat', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('services', 'Breadcrumb','about services','details'),
		'mode'				=> 'preview',
		'supports' => array(
			'align' => true,
			'anchor' => false,
			'customClassName' => true, 
			'color'  => array(
				'background' => true, 
				'text'       => true  
			)
		),
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/breadcrumb/breadcrumb.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));

	// Register a Retail Stations block
	acf_register_block_type(array(
		'name'              => 'retail-station', // Block name
		'title'             => ('Retail Stations'), // Title shown in the block editor
		'description'       => ('A custom block For Retail Stations section'), // Block description
		'render_template'   => get_stylesheet_directory() . '/blocks/retail-stations/retail-stations.php', // Path to HTML template file
		'category'          => 'mrs', // Category where the block will appear (you can use your own category)
		'icon'              => 'location', // Block icon (you can use Dashicon or custom SVG)
		'keywords'          => array('services', 'stations','retail','locations','retail stations'),
		'mode'				=> 'preview',
		'supports' => array(
			'align' => true,
			'anchor' => false,
			'customClassName' => true, 
			'color'  => array(
				'background' => true, 
				'text'       => true  
			)
		),
		'example' => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_stylesheet_directory_uri() . '/blocks/retail-stations/retail-station-img.png', // Path to your preview image
					'is_preview'    => true
				),
			),
		),
	));
}
add_action('acf/init', 'register_acf_block_types');