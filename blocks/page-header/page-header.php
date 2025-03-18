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

?>
<div class="container-fluid position-relative z-3 bg-white px-0">
    <div class="container-fluid px-0 custom-navbar">
        <nav class="navbar navbar-expand-xl">
            <a class="" href="<?php echo esc_url(get_site_url()); ?>">
                <img src="<?php echo $site_logo; ?>" alt="logo" class="header-logo">
            </a>
            <button class="navbar-toggler p-0 border-0 foshadow-none " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation" id="toggleButton">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mobile-menu" id="navbarSupportedContent">
                <div class="language-dropdown--mobile">
                    <div class="language-dropdown d-xl-none">
                        <?php if (function_exists('the_msls')) {
                            echo msls_lang_switcher();
                        } ?>
                    </div>
                </div>
                <?php
                // Initialize the menu tree
                $menu_tree = [];

                // Create an array to store references to all menu items by their ID
                $menu_lookup = [];

                // First loop: Initialize all menu items and prepare the lookup array
                foreach ($menu_items as $menu_item) {
                    $menu_item->children = [];  // Initialize children array for each item
                    $menu_lookup[$menu_item->ID] = $menu_item;
                }

                // Second loop: Build the tree structure
                foreach ($menu_items as $menu_item) {
                    if ($menu_item->menu_item_parent == 0) {
                        // This is a top-level item, add it directly to the tree
                        $menu_tree[$menu_item->ID] = $menu_item;
                    } else {
                        // This is a child item, attach it to its parent if the parent exists
                        if (isset($menu_lookup[$menu_item->menu_item_parent])) {
                            $menu_lookup[$menu_item->menu_item_parent]->children[] = $menu_item;
                        }
                    }
                }

                ?>

                <!-- Main Navigation Menu -->
                <ul class="navbar-nav mx-auto navbar-gap">
                    <?php if (!empty($menu_tree)): ?>
                        <?php foreach ($menu_tree as $item):
                            // Get its coming soon menu or not
                            $is_coming_soon = get_field('is_coming_soon', $item->ID);
                        ?>
                            <li class="nav-item <?php echo !empty($item->children) ? 'dropdown' : ''; ?> <?php echo ($is_coming_soon == 1) ? 'is-coming' : ''; ?>">
                                <?php
                                $is_coming_soon = get_field('is_coming_soon', $item->ID);
                                // Check its Coming soon or not
                                if ($is_coming_soon == 1) { ?>
                                    <button class="fw-normal coming-soon-btn border-0">Coming soon</button>
                                <?php
                                }
                                ?>

                                <a class="nav-link d-flex align-items-center p-0 <?php echo !empty($item->children) ? 'dropdown-toggle' : ''; ?> font-navy fs-6 fw-light lh-base"
                                    href="<?php echo esc_url($item->url); ?>" <?php echo !empty($item->children) ? 'role="button" data-bs-toggle="dropdown" aria-expanded="false"' : ''; ?>>
                                    <?php echo esc_html($item->title); ?>
                                    <?php if (!empty($item->children)): ?>
                                        <img class="ms-2 dropdown-icon" src="<?php echo get_stylesheet_directory_uri() . '/includes/assets/images/dropdown-icon.svg'; ?>" alt="dropdown-icon">
                                    <?php endif; ?>
                                </a>

                                <!-- Render mega menu if children exist -->
                                <?php if (!empty($item->children)): ?>
                                    <div class="dropdown-menu mega-menu-dropdown border-0">
                                        <?php
                                        // echo 'Count----'.$item->children;
                                        if (!empty($item->children) && (count($item->children) >= 2)) {
                                            // Assuming the first item is Solution 1 and the second item is Solution 2
                                            $solution1 = $item->children[0]; // First submenu (Solution 1)
                                            $solution2 = $item->children[1]; // Second submenu (Solution 2)

                                            // Extract first child of Solution 1
                                            if (!empty($solution1->children)) {
                                                $first_child = $solution1->children[0];
                                                $description = get_field('description', $first_child->ID);
                                                $link_text = get_field('link_text', $first_child->ID);
                                                $link = get_field('link', $first_child->ID);
                                            }

                                            // Display Solution 1’s first child in col-3
                                            echo '<div class="section-spacing bg-white tab-menu">';
                                            echo '    <div class="container-xxl px-xl-1 px-0">';
                                            echo '        <div class="d-flex">';

                                            echo '<div class="col-3 d-none d-xl-block">';
                                            if (!empty($first_child)) {
                                                echo '<h5 class="font-navy fw-light fs-3 mb-3">' . esc_html($description) . '</h5>';
                                                echo '<a class="font-navy fw-light lh-base text-decoration-none border-bottom border-dark" href="' . esc_url($link) . '">' . esc_html($link_text) . '</a>';
                                            }
                                            echo '</div>'; // Close col-3

                                            // Display Solution 2’s children in col-9
                                            echo '<div class="megamenu-item--wrap col-xl-9">';
                                            if (!empty($solution2->children)) {
                                                echo '<div class="list-unstyled grid-masonary" data-masonry=\'{ "percentPosition": true }\'>';
                                                foreach ($solution2->children as $child) {
                                                    if ($child->type == 'post_type') {
                                                        $child_link = $child->url;
                                                    } else {
                                                        $child_link = get_field('link', $child->ID);
                                                    }
                                                    $child_description = get_field('description', $child->ID);
                                                    $icon = get_field('icon', $child->ID);
                                                    echo '<div class="grid-item">';
                                                    echo '<a class="sub-menu-item text-decoration-none" href="' . esc_url($child_link) . '">';
                                                    echo '<div class= "nav-link sub-heading d-flex gap-2 align-items-center mb-2 pt-0">';
                                                    if ($icon) {
                                                        echo '<img src="' . $icon . '" alt="menu-icon">';
                                                    }
                                                    echo '<h6 class="font-navy fw-medium fs-6 lh-sm text-start">' . esc_html($child->title) . '</h6>
                                                    </div>';
                                                    echo '<p class="font-navy fw-light m-0 text-start border-bottom-grey submenu-item-description">' . esc_html($child_description) . '</p></a>';
                                                    echo '</div>';
                                                }
                                                echo '</div>';
                                            } else {
                                                echo '<p>No sub-items found in Solution 2.</p>';
                                            }
                                            echo '</div>'; // Close col-9

                                            echo '        </div>'; // Close flex container
                                            echo '    </div>'; // Close container
                                            echo '</div>'; // Close main wrapper
                                        } ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="nav-item">Menu not found.</li>
                    <?php endif; ?>
                </ul>
                <!-- Mega menu end -->

                <div class="d-flex flex-column flex-xl-row align-items-xl-center cta-gap ">
                    <!-- <a class="font-navy fs-6 fw-light lh-base text-decoration-none login-btn" href="#">Login -->
                    <!-- <span class="ms-1"><img src="<?php //echo get_stylesheet_directory_uri() . '/includes/assets/images/arrowgold.svg'; 
                                                        ?>" alt="arrow"></span></a> -->
                    <!-- Language Switcher -->
                    <div class="language-dropdown d-none d-xl-block">
                        <?php if (function_exists('the_msls')) {
                            echo msls_lang_switcher();
                        } ?>
                    </div>
                    <!-- Language Switcher END -->
                    <a class="contact-btn" href="<?php echo $contact_button_url; ?>">
                        <button class="rounded-pill font-navy fs-6 fw-light lh-base cta-btn border-0" target="<?php echo $contact_button_target; ?>"><?php echo $contact_button_title; ?></button>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="bg-gold py-1 px-2 seperator">
        <?php if ($site_tagline != '') { ?>
            <p class="font-navy fw-light lh-sm fs-6 my-2 text-center" style="color:<?php //echo $tagline_color; 
                                                                                    ?>; background-color:<?php //echo $tagline_background; 
                                                                                                            ?>;"><?php //echo $site_tagline; 
                                                                                                                    ?></p>
        <?php } ?>
    </div>
</div>


<!-- Header Block code End -->