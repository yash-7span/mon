<?php
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/page-header/page-header.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;
?>
<?php
if (function_exists('the_msls')) {
    function msls_lang_switcher()
    {
        ob_start(); // Start output buffering to capture the MSLS output
        the_msls(); // Render MSLS language links
        $links = ob_get_clean(); // Capture the output

        // Parse the links using DOMDocument
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress warnings for malformed HTML
        $dom->loadHTML($links);
        libxml_clear_errors();

        $items = $dom->getElementsByTagName('a'); // Get all anchor elements

        // Array to hold language options
        $languages = [];
        $current_url = home_url($_SERVER['REQUEST_URI']); // Get the current page URL

        // Populate the array with links
        foreach ($items as $item) {
            $url = $item->getAttribute('href');
            $label = $item->textContent;
            $languages[] = [
                'url' => $url,
                'label' => $label,
                'selected' => ($current_url === $url), // Check if it's the current language
            ];
        }

        // If the current language is missing, add it manually
        if (!array_filter($languages, fn($lang) => $lang['selected'])) {
            $languages[] = [
                'url' => $current_url,
                'label' => substr(get_locale(), 3), // Get the current locale (e.g., 'en_US')
                'selected' => true,
            ];
        }

        // Build the dropdown
        echo '<div class="switcher-wrap position-relative">';
        echo '<p class="selected-language p-2"><span></span><img class="ms-2 lang-dropdown-icon" src="' . get_stylesheet_directory_uri() . '/includes/assets/images/dropdown-icon.svg" alt="dropdown-icon"></p>';
        echo '<select class="d-none" id="language-switcher" onchange="location = this.value;">';
        foreach ($languages as $language) {
            $selected = $language['selected'] ? 'selected' : '';
            echo '<option value="' . esc_url($language['url']) . '" ' . $selected . '>';
            echo esc_html($language['label']);
            echo '</option>';
        }
        echo '</select>';
        echo '<ul class="language-switcher font-navy bg-white list-unstyled m-0 p-2">';
        foreach ($languages as $language) {
            $selected = $language['selected'] ? 'selected' : '';
            echo '<li class="lang-option">';
            echo '<a class="text-decoration-none d-block" href="' . esc_url($language['url']) . '" ' . $selected . '>';
            echo esc_html($language['label']);
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}
?>
<?php
// Header Block code Start

// Fetch Site logo from Acf Field
$site_logo = get_field('site_logo');

// Fetch Site Tagline
$site_tagline = get_field('site_tagline');
$tagline_background = get_field('tagline_background');
$tagline_color = get_field('tagline_color');

// Fetch Menu ID from Acf Field
$menu_term_id = get_field('select_menu');
$menu_items = wp_get_nav_menu_items($menu_term_id);


// Fetch Text Url from Acf Field
$contact_button = get_field('contact_us');
$contact_button_url = '';
$contact_button_title = '';
$contact_button_target = '';
if ($contact_button) {


    $contact_button_url = esc_html($contact_button['url']);
    $contact_button_title = esc_html($contact_button['title']);
    $contact_button_target = esc_html($contact_button['target']) ? $contact_button['target'] : '_self';
}
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
     // Start the element output
     function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
         // Ensure $args is an object
         if (is_array($args)) {
             $args = (object) $args;
         }
 
         $classes = empty($item->classes) ? array() : (array) $item->classes;
         $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
 
         // Add custom classes or attributes here
         $class_names = $class_names ? ' class="nav-item dropdown ' . esc_attr($class_names) . '"' : '';
 
         $output .= '<li' . $class_names . '>';
 
         $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
         $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
         $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
         $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
         $attributes .= ' class="nav-link"';
 
         $item_output = $args->before;
         $item_output .= '<a' . $attributes . '>';
         $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
         $item_output .= '</a>';
         $item_output .= $args->after;
 
         $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
     }
 
     // Start the submenu output
     function start_lvl(&$output, $depth = 0, $args = array()) {
         $output .= '<ul class="dropdown-menu">';
     }
 
     // End the submenu output
     function end_lvl(&$output, $depth = 0, $args = array()) {
         $output .= '</ul>';
     }
 }
?>

<div class="add-full-block">
    <div class="inner-addfull">
         <p class="mb-0 text-black text-center">
         Log In and get up to<button class="head_btn cursor_def">
              <span class="fw-bold link_re text-decoration-none cursor_def">1000 Reward Points</span></button>
         on your first order.<button data-bs-toggle="modal" data-bs-target="#openPopup" class="head_btn link_re">
              <span class="">Download QuickMart Now!</span></button>
         </p>
         <div class="close_add_btn">
              <img src="./images/add-close-v.svg" alt="" class="img-fluid">
         </div>
    </div>
</div>

<div class="header-container">
    <div class="marquee-block create-marquee">
         <div class="marquee-inner flex">
              <div class="marquee-text flex">
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <div class="yellow_dot"></div>
                        <span class="text_price title-highlight d-inline-block">Check out the
                             latest prices!</span>
                        <div class="yellow_dot"></div>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <div class="yellow_dot"></div>
                        <span class="text_price title-highlight d-inline-block">Check out the
                             latest prices!</span>
                        <div class="yellow_dot"></div>

                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <div class="yellow_dot"></div>
                        <span class="text_price title-highlight d-inline-block">Check out the
                             latest prices!</span>
                        <div class="yellow_dot"></div>

                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
              </div>
              <div class="marquee-text flex">

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <div class="yellow_dot"></div>
                        <span class="text_price title-highlight d-inline-block">Check out the
                             latest prices!</span>
                        <div class="yellow_dot"></div>

                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <div class="yellow_dot"></div>
                        <span class="text_price title-highlight d-inline-block">Check out the
                             latest prices!</span>
                        <div class="yellow_dot"></div>

                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <div class="yellow_dot"></div>
                        <span class="text_price title-highlight d-inline-block">Check out the
                             latest prices!</span>
                        <div class="yellow_dot"></div>

                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_blue">PMS</span>
                             <span class="hover_blue">₦26.75</span>
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_green">AGO</span>
                             <span class="hover_green">₦25.75</span>
                        
                        </span>
                        <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/2/automotive-gas-oil" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>

                   <span class="m-item flex">
                        <span class="title title-highlight grand-bold d-inline-block">
                             <span class="t_yellow"> LPG</span>
                             <span class="hover_yellow"> ₦25.78</span>
                        </span>
                             <ul class="dropdown tooltip_btn">
                             <li class="mb-0 option_text text-black">
                                  <a href="https://quickmart.com/product/3/dual-purpose-kerosene" class="link_re"
                                  target="_blank">Are you a retail customer?</a>
                                  OR
                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                             </li>
                             <div class="traingle-up"></div>
                        </ul>
                   </span>
                   
              </div>
         </div>
    </div>
    <div class="location-dropdown">
         <div class="loc-dropdown-inner">
              <img src="http://localhost/mod/wp-content/uploads/2025/03/rl-vector.svg" alt="">
              <div class="btn-group">
                   <button type="button" class="btn-city dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Lagos, Tanke Road
                        <div class="arrow">
                             <div class="arrow-line left"></div>
                             <div class="arrow-line right"></div>
                        </div>
                   </button>
                   
                   <ul class="dropdown-menu">
                        <li><a class="dropdown-item loc_text vr_padding" href="#">Ogosa Ajegunle</a></li>
                        <li><a class="dropdown-item loc_text vr_padding" href="#">Church Bus Stop Ogijo</a></li>
                        <li><a class="dropdown-item loc_text vr_padding" href="#">Shirash-Hauwa Bridge Station</a></li>
                        <li><a class="dropdown-item loc_text vr_padding" href="#">MRS RORO - Absen Plaza Mishfat</a></li>
                   </ul>
              </div>
         </div>
    </div>
</div>

<header class="head">
    <nav class="navbar navbar-expand-lg">
    <div class="navbar-logo position-relative">
          <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
               <?php 
               if (has_custom_logo()) {
                    the_custom_logo(); // Fetches the logo set in WordPress Customizer
               } else { 
               ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-svg.svg" class="img-fluid logo-img" alt="Site Logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-mobile.svg" class="img-fluid logo-img device" alt="Mobile Logo">
               <?php 
               } 
               ?>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span></span>
               <span></span>
               <span></span>
          </button>
     </div>

     <div class="header-menus desk-block">
          <div class="collapse navbar-collapse" id="navbarNav">
               <?php
               wp_nav_menu( array(
                    'theme_location' => 'header-menu', // Use the registered menu location
                    'menu_class'     => 'navbar-nav', // Add the class for the menu container
                    'container'      => false, // Remove the default container
                    'depth'          => 3, // Set the depth of the menu (3 levels: menu, submenu, sub-submenu)
                    'walker'         => new Custom_Walker_Nav_Menu(), // Use a custom walker if needed
               ) );
               ?>
          </div>
     </div>
         <!-- <div class="header-menus desk-block">
              <div class="collapse navbar-collapse" id="navbarNav">
                   <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                             <a href="index.html" class="myElement nav-link">Home
                             </a>
              
                        </li>
                        <li class="nav-item dropdown">
                             <a href="about-us.html" class="myElement2 nav-link dropdown-toggle dt-none" data-bs-hover="dropdown" aria-expanded="false">About Us
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>

                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="about-us.html#RedirectOurMission">Our Mission & Vision</a></li>
                                  <li><a class="dropdown-item" href="about-us.html#RedirectValues">Corporate Values</a></li>
                                  <li><a class="dropdown-item" href="about-us.html#RedirectOurHistory">Our History & Legacy</a></li>
                                  <li class="nav-item dropend">
                                       <a class="dropdown-item" href="about-us.html#RedirectOurLeaders">Our Leaders
                                            <div class="arrow">
                                                 <div class="arrow-line left"></div>
                                                 <div class="arrow-line right"></div>
                                            </div>  
                                       </a>         
                                                                    
                                       <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="about-us.html#RedirectLeaders">Board Members</a></li>
                                            <li><a class="dropdown-item" href="about-us.html#RedirectLeaders">Management Team</a></li>
                                       </ul>
                                  </li>
                                  <li><a class="dropdown-item" href="about-us.html#RedirectResponsibility">Our Responsibility</a></li>
                             </ul>
                        </li>

                        <li class="nav-item dropdown">
                             <a class="myElement3 nav-link" href="products.html" data-bs-hover="dropdown" aria-expanded="false">Products
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>

                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="products.html#LubricantsProduct">Lubricants</a></li>
                                  <li><a class="dropdown-item" href="products.html#IBCproduct">Corporate & Industrial</a></li>
                             </ul>
                        </li>

                        <li class="nav-item dropdown">
                             <a class="myElement4 nav-link" href="service.html" data-bs-hover="dropdown" aria-expanded="false">Services
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>

                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="service.html#retailNetwork">Retail Stations</a></li>
                                  <li><a class="dropdown-item" href="service.html#Depot">Depot</a></li>
                                  <li><a class="dropdown-item" href="service.html#Fules">Fuels</a></li>
                                  <li><a class="dropdown-item" href="service.html#Eviation">Aviation</a></li>
                                  <li><a class="dropdown-item" href="service.html#Lubricants">Lubricants and Greases</a></li>
                             </ul>
                        </li>

                        <li class="nav-item dropdown">
                             <a class="myElement5 nav-link" href="investor-relation.html" data-bs-hover="dropdown" aria-expanded="false">Investor Relations
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="presentation.html">Presentations</a></li>
                                  <li><a class="dropdown-item" href="financial-report.html">Financial Reports</a></li>
                                  <li><a class="dropdown-item" href="shareholder-service.html">Shareholder Services</a></li>
                                  <li><a class="dropdown-item" href="publications.html">Publications</a></li>
                                  <li><a class="dropdown-item" href="investor-relation.html#ShareholderList">Shareholders List</a></li>
                                  <li><a class="dropdown-item" href="anuual-general.html">Annual General Meeting</a></li>
                                  <li><a class="dropdown-item" href="company-events.html">Company Events</a></li>
                                  <li><a class="dropdown-item" href="investor-relation.html#governace_main">Corporate Governance</a></li>
                             </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                             <a class="myElement6 nav-link" href="blogs.html" aria-expanded="false">Blogs
                             </a>
                        </li>

                        <li class="nav-item login_btn pop-btn">
                             <button type="button" class="btn nav-link contact-btn b-padding" data-bs-toggle="modal"
                                  data-bs-target="#openPopup">
                                  <svg width="30" height="22" viewBox="0 0 30 22" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.5768 6.67597L22.1773 7.02368C22.4735 7.19526 22.4289 7.82653 22.2828 7.74059L21.6823 7.39288C21.3861 7.22129 21.4307 6.59002 21.5768 6.67597Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.22852 13.7734H9.58546C9.81768 13.7739 10.0403 13.8718 10.2045 14.0455C10.3687 14.2193 10.4611 14.4549 10.4616 14.7007C10.4611 14.9464 10.3687 15.182 10.2045 15.3558C10.0403 15.5296 9.81768 15.6274 9.58546 15.6279H8.80229L7.22852 13.7734Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.07227 10.0703H10.9438C11.176 10.0708 11.3986 10.1686 11.5628 10.3424C11.727 10.5162 11.8195 10.7518 11.8199 10.9975C11.8195 11.2433 11.727 11.4789 11.5628 11.6527C11.3986 11.8265 11.176 11.9243 10.9438 11.9248H5.64604L4.07227 10.0703Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.927734 6.35156H12.3102C12.5424 6.35204 12.765 6.44989 12.9292 6.62367C13.0934 6.79746 13.1858 7.03303 13.1863 7.2788C13.1858 7.52456 13.0934 7.76013 12.9292 7.93392C12.765 8.1077 12.5424 8.20555 12.3102 8.20603H2.50037L0.927734 6.35156Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M29.5547 11.0038C29.5579 13.3466 28.8403 15.6268 27.5103 17.4996H29.5547V21.8313H19.3243C15.2232 21.8313 12.4851 19.8864 10.2014 17.2977C10.9533 15.5153 12.0268 13.9053 13.3615 12.5581C13.7224 14.0972 14.6028 15.4435 15.8368 16.3431C17.0708 17.2427 18.573 17.6335 20.0604 17.4419C21.5478 17.2502 22.9176 16.4893 23.9116 15.3026C24.9056 14.1159 25.455 12.5854 25.4565 10.9996C24.6696 9.74159 24.3207 9.19204 23.9273 8.56531C23.9353 5.71461 21.8869 4.49959 19.3355 4.49959H16.2474C15.8429 4.49943 15.4456 4.38669 15.0953 4.17268C14.745 3.95868 14.454 3.65093 14.2516 3.28033C14.0471 3.65001 13.9406 4.07122 13.9434 4.49959H9.36186L9.08594 4.17336H11.3734C12.7074 2.438 14.5162 1.18214 16.5515 0.578164C18.5868 -0.0258077 20.7489 0.0517124 22.7409 0.800084C24.7329 1.54846 26.4573 2.931 27.6773 4.75794C28.8972 6.58488 29.5531 8.76667 29.5547 11.0038Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.1191 17.5045C13.1901 11.0087 22.3971 7.75888 25.4689 11.0087C25.4689 4.51327 13.1901 7.75888 10.1191 17.5045Z"
                                            fill="#8399A4" />
                                  </svg>
                                  <div class="join-us white-text">quick app</div>
                             </button>
                        </li>
                        <li class="nav-item login_btn">
                             <a href="contact.html" class="nav-link contact-btn b-padding join-us-btn red-btn">
                                  <div class="join-us white-text">Contact</div>
                                  <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                       viewBox="0 0 21 12" fill="none">
                                       <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                            fill="white" />
                                  </svg>
                             </a>
                        </li>
                        <li class="nav-item login_btn">
                             <a class="nav-link contact-btn b-padding join-us-btn red-btn" data-bs-toggle="modal"
                                  data-bs-target="#LoginPopup">
                                  <div class="join-us white-text">Login</div>
                                  <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                       viewBox="0 0 21 12" fill="none">
                                       <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                            fill="white" />
                                  </svg>
                             </a>
                            
                        </li>
                   </ul>
              </div>
         </div> -->



         
         <div class="header-menus mobile-block">
              <div class="collapse navbar-collapse" id="navbarNav">
                   <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                             <a href="index.html" class="myElement nav-link">Home
                             </a>
                        </li>
                        <li class="nav-item dropdown">
                             <a href="about-us.html" class="myElement2 nav-link dropdown-toggle dt-none" data-bs-toggle="dropdown" aria-expanded="false">About Us
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>

                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="about-us.html#RedirectOurMission">Our Mission & Vision</a></li>
                                  <li><a class="dropdown-item" href="about-us.html#RedirectValues">Corporate Values</a></li>
                                  <li><a class="dropdown-item" href="about-us.html#RedirectOurHistory">Our History & Legacy</a></li>
                                  <li class="nav-item dropend">
                                       <a class="dropdown-item nav-link dropdown-toggle dt-none" href="about-us.html#RedirectOurLeaders" data-bs-toggle="dropdown" aria-expanded="false">Our Leaders
                                            <div class="arrow">
                                                 <div class="arrow-line left"></div>
                                                 <div class="arrow-line right"></div>
                                            </div>  
                                       </a>         
                                                                    
                                       <ul class="dropdown-menu submenu">
                                            <li><a class="dropdown-item" href="about-us.html#RedirectLeaders">Board Members</a></li>
                                            <li><a class="dropdown-item" href="about-us.html#RedirectLeaders">Management Team</a></li>
                                       </ul>
                                  </li>
                                  <li><a class="dropdown-item" href="about-us.html#RedirectResponsibility">Our Responsibility</a></li>
                             </ul>
                        </li>
                        <li class="nav-item dropdown">
                             <a class="myElement3 nav-link" href="products.html" data-bs-toggle="dropdown" aria-expanded="false">Products
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>

                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="products.html#LubricantsProduct">Lubricants</a></li>
                                  <li><a class="dropdown-item" href="products.html#IBCproduct">Corporate & Industrial</a></li>
                             </ul>
                        </li>
                        <li class="nav-item dropdown">
                             <a class="myElement4 nav-link" href="service.html" data-bs-toggle="dropdown" aria-expanded="false">Services
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>

                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="service.html#retailNetwork">Retail Stations</a></li>
                                  <li><a class="dropdown-item" href="service.html#Depot">Depot</a></li>
                                  <li><a class="dropdown-item" href="service.html#Fules">Fuels</a></li>
                                  <li><a class="dropdown-item" href="service.html#Eviation">Aviation</a></li>
                                  <li><a class="dropdown-item" href="service.html#Lubricants">Lubricants and Greases</a></li>
                             </ul>
                        </li>
                        <li class="nav-item dropdown">
                             <a class="myElement5 nav-link" href="investor-relation.html" data-bs-toggle="dropdown" aria-expanded="false">Investor Relations
                                  <div class="arrow">
                                       <div class="arrow-line left"></div>
                                       <div class="arrow-line right"></div>
                                  </div>
                             </a>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="presentation.html">Presentations</a></li>
                                  <li><a class="dropdown-item" href="financial-report.html">Financial Reports</a></li>
                                  <li><a class="dropdown-item" href="shareholder-service.html">Shareholder Services</a></li>
                                  <li><a class="dropdown-item" href="publications.html">Publications</a></li>
                                  <li><a class="dropdown-item" href="investor-relation.html#ShareholderList">Shareholders List</a></li>
                                  <li><a class="dropdown-item" href="anuual-general.html">Annual General Meeting</a></li>
                                  <li><a class="dropdown-item" href="company-events.html">Company Events</a></li>
                                  <li><a class="dropdown-item" href="investor-relation.html#governace_main">Corporate Governance</a></li>
                             </ul>
                        </li>
                        <li class="nav-item dropdown">
                             <a class="myElement6 nav-link" href="blogs.html" aria-expanded="false">Blogs
                             </a>
                        </li>
                   </ul>
                   <div class="mobile-menu">
                        <li class="nav-item login_btn pop-btn">
                             <button type="button" class="btn nav-link contact-btn b-padding" data-bs-toggle="modal"
                                  data-bs-target="#openPopup">
                                  <svg width="30" height="22" viewBox="0 0 30 22" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.5768 6.67597L22.1773 7.02368C22.4735 7.19526 22.4289 7.82653 22.2828 7.74059L21.6823 7.39288C21.3861 7.22129 21.4307 6.59002 21.5768 6.67597Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.22852 13.7734H9.58546C9.81768 13.7739 10.0403 13.8718 10.2045 14.0455C10.3687 14.2193 10.4611 14.4549 10.4616 14.7007C10.4611 14.9464 10.3687 15.182 10.2045 15.3558C10.0403 15.5296 9.81768 15.6274 9.58546 15.6279H8.80229L7.22852 13.7734Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.07227 10.0703H10.9438C11.176 10.0708 11.3986 10.1686 11.5628 10.3424C11.727 10.5162 11.8195 10.7518 11.8199 10.9975C11.8195 11.2433 11.727 11.4789 11.5628 11.6527C11.3986 11.8265 11.176 11.9243 10.9438 11.9248H5.64604L4.07227 10.0703Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.927734 6.35156H12.3102C12.5424 6.35204 12.765 6.44989 12.9292 6.62367C13.0934 6.79746 13.1858 7.03303 13.1863 7.2788C13.1858 7.52456 13.0934 7.76013 12.9292 7.93392C12.765 8.1077 12.5424 8.20555 12.3102 8.20603H2.50037L0.927734 6.35156Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M29.5547 11.0038C29.5579 13.3466 28.8403 15.6268 27.5103 17.4996H29.5547V21.8313H19.3243C15.2232 21.8313 12.4851 19.8864 10.2014 17.2977C10.9533 15.5153 12.0268 13.9053 13.3615 12.5581C13.7224 14.0972 14.6028 15.4435 15.8368 16.3431C17.0708 17.2427 18.573 17.6335 20.0604 17.4419C21.5478 17.2502 22.9176 16.4893 23.9116 15.3026C24.9056 14.1159 25.455 12.5854 25.4565 10.9996C24.6696 9.74159 24.3207 9.19204 23.9273 8.56531C23.9353 5.71461 21.8869 4.49959 19.3355 4.49959H16.2474C15.8429 4.49943 15.4456 4.38669 15.0953 4.17268C14.745 3.95868 14.454 3.65093 14.2516 3.28033C14.0471 3.65001 13.9406 4.07122 13.9434 4.49959H9.36186L9.08594 4.17336H11.3734C12.7074 2.438 14.5162 1.18214 16.5515 0.578164C18.5868 -0.0258077 20.7489 0.0517124 22.7409 0.800084C24.7329 1.54846 26.4573 2.931 27.6773 4.75794C28.8972 6.58488 29.5531 8.76667 29.5547 11.0038Z"
                                            fill="#293A8D" />
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.1191 17.5045C13.1901 11.0087 22.3971 7.75888 25.4689 11.0087C25.4689 4.51327 13.1901 7.75888 10.1191 17.5045Z"
                                            fill="#8399A4" />
                                  </svg>
                                  <div class="join-us white-text">download quickmart App</div>
                             </button>
                        </li>
                        <div class="fix-menu-btn">
                             <li class="nav-item login_btn">
                                  <a href="contact.html" class="nav-link contact-btn b-padding join-us-btn red-btn">
                                       <div class="join-us white-text">Contact</div>
                                       <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                            viewBox="0 0 21 12" fill="none">
                                            <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                 fill="white" />
                                       </svg>
                                  </a>
                             </li>
                             <li class="nav-item login_btn">
                                  <a class="nav-link contact-btn b-padding join-us-btn red-btn" data-bs-toggle="modal"
                                       data-bs-target="#LoginPopup">
                                       <div class="join-us white-text">Login</div>
                                       <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                            viewBox="0 0 21 12" fill="none">
                                            <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                 fill="white" />
                                       </svg>
                                  </a>
                             </li>
                        </div>
                   </div>
              </div>
         </div>  
    </nav>
</header>

<div class="download-popup">
    <div class="modal fade" id="openPopup" tabindex="-1" aria-labelledby="openPopupLabel" aria-hidden="true">
         <div class="modal-dialog">
              <div class="modal-content">
                   <div class="modal-body">
                        <div class="popup-body">
                             <div class="row p_row">
                                  <div class="col_7 col-lg-7">
                                       <div class="popup-title">
                                            <h1 class="title_text">
                                                 Download the
                                                 <span class="d-block">
                                                      QuickmArt app
                                                 </span>
                                            </h1>
                                            <p class="mb-0">Download the <a href="https://quickmart.com/" class="text-black" target="_blank">Quick Mart</a> Application to get exclusive benefits. Scan the QR Code to download the Application</p>
                                       </div>
                                  </div>
                                  <div class="col_5 col-lg-5">
                                       <div class="app-qr-body mr_right">
                                            <div class="qr-image">
                                                 <img src="./images/playstore-qr.png" alt="" class="qr_app">
                                                 <div class="which-app">
                                                      <h5 class="fw-bold mb-0">Android</h5>
                                                      <p class="mb-0">Scan this code to download</p>
                                                      <a href="https://play.google.com/store/apps/details?id=com.quick.mart&hl=en&gl=US" class="flex_name" target="_blank"><img src="./images/play-store.png" alt="" class="mini-icons">
                                                           <p class="mb-0"> Play Store</p>
                                                      </a>
                                                 </div>
                                            </div>
                                            <div class="qr-image second">
                                                 <img src="./images/ios-app-qr.png" alt="" class="qr_app">
                                                 <div class="which-app">
                                                      <h5 class="fw-bold mb-0">ios</h5>
                                                      <p class="mb-0">Scan this code to download</p>
                                                      <a href="https://apps.apple.com/ng/app/quickmart/id1614636080" class="flex_name" target="_blank"><img src="./images/ios-appstore.png" alt="" class="mini-icons">
                                                           <p class="mb-0"> App Store</p>
                                                      </a>
                                                 </div>
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>
                   </div>
              </div>
         </div>
    </div>
</div>

<div class="login-popup">
    <div class="modal fade" id="LoginPopup" tabindex="-1" aria-labelledby="LoginPopupLabel" aria-hidden="true">
         <div class="modal-dialog">
              <div class="modal-content">
                   <div class="modal-header bg_popup">
                        <button type="button" class="btn-close order-1" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body bg_popup">
                        <div class="mrs-logo">
                             <img src="./images/logo-svg.svg" alt="" class="img-fluid">
                        </div>

                       <form class="contact-us LoginForm" method="post" role="form">
                             <div class="c_login">
                                  <div class="nav-item login_btn">
                                       <a href="https://dauth.mrsholdings.com/" target="_blank" class="nav-link contact-btn b-padding join-us-btn red-btn max_width">
                                            <div class="join-us white-text">Customer login</div>
                                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                 <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                            </svg>
                                       </a>
                                  </div>
                             </div>

                             <div class="staff_login">
                                  <div class="nav-item login_btn mt-0">
                                       <a href="https://dauth.mrsholdings.com/" target="_blank" class="nav-link contact-btn b-padding join-us-btn red-btn max_width">
                                            <div class="join-us white-text">staff login</div>
                                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                 <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="#74253A" />
                                            </svg>
                                       </a>
                                  </div>
                             </div>
                        </form>
                   </div>
              </div>
         </div>
    </div>
</div>


<!-- Header Block code End -->