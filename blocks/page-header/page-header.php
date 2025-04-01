<?php
// Header Block code Start
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
     <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/page-header/page-header.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
     return;
endif;

// Fetch Site logo from Acf Field
$site_logo = get_field('header_logo');
$mobile_header_logo = get_field('mobile_header_logo');


// Fetch Menu ID from Acf Field
$menu_term_id = get_field('select_header_menu');
$menu_items = wp_get_nav_menu_items($menu_term_id);

$nav_menu = array();
foreach ($menu_items as $items):
     $nav_menu[] = array(
          'id' => $items->ID,
          'title' => $items->title,
          'url' => $items->url,
          'menu_item_parent' => $items->menu_item_parent,
     );
endforeach;

$contact_button = get_field('contact_us');
if ($contact_button) {
     $contact_button_url = esc_html($contact_button['url']);
     $contact_button_title = esc_html($contact_button['title']);
     $contact_button_target = esc_html($contact_button['target']) ? $contact_button['target'] : '_self';
}

$header_cta_button = get_field('header_buttons');

if ($header_cta_button) {

     $quick_app_button_text = $header_cta_button['quick_app_text'];
     $quick_app_icon = $header_cta_button['quick_app_icon'];
     $contact_button_text = $header_cta_button['contact_button_text'];
     $contact_button_link = $header_cta_button['contact_button_link'];
     $login_button_text = $header_cta_button['login_button_text'];
     $mobile_quick_app_button_text = $header_cta_button['mobile_quick_app_button_text'];
}

// Quick Now Popup 
$quick_now_popup_tagline = get_field('pop_up_description', 'option') ?? '';
if (!empty($quick_now_popup_tagline)):
     $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $quick_now_popup_tagline);
     $quick_now_popup_button_text  = esc_html(get_field('quick_now_button_text', 'option')) ?? '';
?>
     <div class="add-full-block" style="display: block;">
          <div class="inner-addfull">
               <p class="mb-0 text-black text-center">
                    <?php echo $description; ?>
                    <button data-bs-toggle="modal" data-bs-target="#openPopup" class="head_btn link_re"><span class=""><?php echo $quick_now_popup_button_text; ?></span></button>
               </p>
               <div class="close_add_btn">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/add-close-v.svg'; ?>" alt="" class="img-fluid">
               </div>
          </div>
     </div>
<?php endif; ?>

<!-- Marquee Section Start  -->
<div class="header-container">
     <div class="create-marquee marquee-block">
          <div class="flex marquee-inner">
               <?php
               $marquee_location = array();
               $args = array(
                    'post_type' => 'fuel-price',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'order_by' => 'date',
               );
               $query = new WP_Query($args);

               if ($query->have_posts()) :
                    while ($query->have_posts()) :
                         $query->the_post();
                         $id = get_the_ID();
                         $title = get_the_title();
                         $slug = basename(get_permalink($id)) ?? '';
                         $marquee_location[] = array(
                              'id' => $id,
                              'title' => $title,
                              'slug' => $slug,
                         );
                         $prices = get_field('latest_prices', $id);
                         if (!empty($prices)) :
                              echo '<div class="flex marquee-text" id="' . $slug . '">';
                              $i = 1; // Initialize $i INSIDE the first loop
                              foreach ($prices as $price) :
                                   $label = $price['label'] ?? '';
                                   $value = $price['value'] ?? '';
                                   $label_color = $price['label_color'] ?? '#fff';
                                   ?>
                                   <span class="flex m-item">
                                        <span class="d-inline-block grand-bold title title-highlight">
                                             <span style="color:<?php echo $label_color; ?>"><?php echo $label; ?>:</span>
                                             <span class="hover_blue">₦<?php echo $value; ?></span>
                                        </span>
                                        <ul class="dropdown tooltip_btn">
                                             <li class="text-black mb-0 option_text">
                                                  <a href="https://quickmart.com/product/1/premium-motor-spirit" class="link_re" target="_blank">Are you a retail customer?</a>
                                                  OR
                                                  <a href="contact-us.html#redirect_sec" class="link_re">corporate customer?</a>
                                             </li>
                                             <div class="traingle-up"></div>
                                        </ul>
                                   </span>

                                   <?php
                                   if ($i % 3 == 0) :
                                        echo '
                                             <span class="flex m-item">
                                                  <div class="yellow_dot"></div>
                                                  <span class="d-inline-block text_price title-highlight">Check out the
                                                  latest prices!</span>
                                                  <div class="yellow_dot"></div>
                                             </span>
                                        ';
                                   endif;
                                   $i++;
                              endforeach;
                              echo '</div>';
                         endif;
                    endwhile;
                    wp_reset_postdata();
               endif;
               ?>
          </div>
     </div>
     <div class="location-dropdown">
          <div class="loc-dropdown-inner">
          <img src="<?php echo get_stylesheet_directory_uri().'/images/rl-vector.svg';?>" alt="">
              <div class="btn-group">
                   <button type="button" class="btn-city dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Location
                        <div class="arrow">
                             <div class="arrow-line left"></div>
                             <div class="arrow-line right"></div>
                        </div>
                   </button>
                   
                   <ul class="dropdown-menu">
                    <?php foreach($marquee_location as $location):?>
                         <li><a class="dropdown-item loc_text vr_padding" href="#"><?php echo $location['title'];?></a></li>
                    <?php endforeach;?>
                   </ul>
              </div>
          </div>
     </div>
</div>
<!-- Marquee Section End  -->

<header class="head">
     <nav class="navbar navbar-expand-lg">
          <div class="navbar-logo position-relative">
               <a class="navbar-brand">
                    <?php
                    // Site Logo
                    if ($site_logo) { ?>
                         <img src="<?php echo $site_logo; ?>" class="img-fluid logo-img" alt="Logo">
                    <?php
                    }
                    //Mobile Logo
                    if ($mobile_header_logo) { ?>
                         <img src="<?php echo $mobile_header_logo; ?>" class="img-fluid logo-img device" alt="Logo Mobile">
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

          <!-- Nav Menu  -->
          <div class="desk-block header-menus">
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                         <!-- Set Nav Menu  -->
                         <?php mrs_nav_menu($nav_menu); ?>

                         <li class="nav-item login_btn pop-btn">
                              <button type="button" class="btn nav-link b-padding contact-btn" data-bs-toggle="modal"
                                   data-bs-target="#openPopup">
                                   <?php
                                   //Quick app button icon
                                   if (isset($quick_app_icon)) { ?>
                                        <img src="<?php echo $quick_app_icon; ?>" alt="Quick app Icon">
                                   <?php }

                                   // Get Button Text
                                   if ($quick_app_button_text) { ?>
                                        <div class="join-us white-text"><?php echo $quick_app_button_text; ?></div>
                                   <?php }
                                   ?>
                              </button>
                         </li>
                         <li class="nav-item login_btn">
                              <a href="<?php echo $contact_button_link['url']; ?>" target="<?php echo $contact_button_link['target'] ?>" class="nav-link b-padding contact-btn join-us-btn red-btn">
                                   <?php

                                   // Get Contact Button Text
                                   if (isset($contact_button_text)) { ?>
                                        <div class="join-us white-text"><?php echo $contact_button_text; ?></div>
                                   <?php
                                   }
                                   ?>
                                   <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                        viewBox="0 0 21 12" fill="none">
                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                             fill="white" />
                                   </svg>
                              </a>
                         </li>
                         <li class="nav-item login_btn">
                              <a class="nav-link b-padding contact-btn join-us-btn red-btn" data-bs-toggle="modal"
                                   data-bs-target="#LoginPopup">
                                   <?php

                                   // Get Login Button Text
                                   if (isset($login_button_text)) { ?>
                                        <div class="join-us white-text"><?php echo $login_button_text; ?></div>
                                   <?php
                                   }
                                   ?>
                                   <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                        viewBox="0 0 21 12" fill="none">
                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                             fill="white" />
                                   </svg>
                              </a>

                         </li>
                    </ul>
               </div>
          </div>

          <!-- Mobile Menu  -->
          <div class="header-menus mobile-block">
               <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    mrs_mobile_nav_menu($nav_menu);
                    ?>
                    <div class="mobile-menu">
                         <li class="nav-item login_btn pop-btn">
                              <button type="button" class="btn nav-link b-padding contact-btn" data-bs-toggle="modal"
                                   data-bs-target="#openPopup">
                                   <?php
                                   //Quick app button icon
                                   if (isset($quick_app_icon)) { ?>
                                        <img src="<?php echo $quick_app_icon; ?>" alt="Quick app Icon">
                                   <?php }

                                   // Get Button Text
                                   if ($mobile_quick_app_button_text) { ?>
                                        <div class="join-us white-text"><?php echo $mobile_quick_app_button_text; ?></div>
                                   <?php }
                                   ?>
                              </button>
                         </li>
                         <div class="fix-menu-btn">
                              <li class="nav-item login_btn">
                                   <a href="<?php echo $contact_button_link['url']; ?>" target="<?php echo $contact_button_link['target'] ?>" class="nav-link b-padding contact-btn join-us-btn red-btn">
                                        <?php

                                        // Get Contact Button Text
                                        if (isset($contact_button_text)) { ?>
                                             <div class="join-us white-text"><?php echo $contact_button_text; ?></div>
                                        <?php
                                        }
                                        ?>
                                        <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                             viewBox="0 0 21 12" fill="none">
                                             <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                  fill="white" />
                                        </svg>
                                   </a>
                              </li>
                              <li class="nav-item login_btn">
                                   <a class="nav-link b-padding contact-btn join-us-btn red-btn" data-bs-toggle="modal"
                                        data-bs-target="#LoginPopup">
                                        <?php

                                        // Get Login Button Text
                                        if (isset($login_button_text)) { ?>
                                             <div class="join-us white-text"><?php echo $login_button_text; ?></div>
                                        <?php
                                        }
                                        ?>
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

<?php
// Fetch ACF group field
$quick_app_popup = get_field('quick_app_popup');
$title_quick_app = $quick_app_popup['title'];
$description = $quick_app_popup['description'];
$android_title_text = $quick_app_popup['android_title_text'];
$android_description = $quick_app_popup['android_description'];
$android_qr = $quick_app_popup['android_qr_code_image'];
$android_play_store_text = $quick_app_popup['android_play_store_text'];
$android_play_store_icon = $quick_app_popup['android_play_store_icon'];
$android_play_store_app_link = $quick_app_popup['android_play_store_app_link'];

$ios_title_text = $quick_app_popup['ios_title_text'];
$ios_description = $quick_app_popup['ios_description'];
$ios_qr = $quick_app_popup['ios_qr_code_image'];
$ios_app_store_text = $quick_app_popup['ios_app_store_text'];
$ios_app_store_app_link = $quick_app_popup['ios_app_store_app_link'];
$ios_play_store_icon = $quick_app_popup['ios_play_store_icon'];


if ($quick_app_popup) {
?>
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
                                                       <?php
                                                       if ($title_quick_app) {
                                                            echo $title_quick_app;
                                                       }
                                                       ?>
                                                       <!-- <span class="d-block">
                                                      QuickmArt app
                                                 </span> -->
                                                  </h1>
                                                  <p class="mb-0">
                                                       <?php
                                                       if ($description) {
                                                            echo $description;
                                                       }
                                                       ?>
                                                  </p>
                                             </div>
                                        </div>
                                        <div class="col_5 col-lg-5">
                                             <div class="app-qr-body mr_right">
                                                  <div class="qr-image">
                                                       <img src="<?php echo $android_qr; ?>" alt="QR image" class="qr_app">
                                                       <div class="which-app">
                                                            <h5 class="fw-bold mb-0"><?php echo $android_title_text; ?></h5>
                                                            <p class="mb-0"><?php echo $android_description; ?></p>
                                                            <a href="<?php echo $android_play_store_app_link; ?>" class="flex_name" target="_blank"><img src="<?php echo $android_play_store_icon; ?>" alt="Android icon" class="mini-icons">
                                                                 <p class="mb-0"><?php echo $android_play_store_text; ?></p>
                                                            </a>
                                                       </div>
                                                  </div>
                                                  <div class="qr-image second">
                                                       <img src="<?php echo $ios_qr; ?>" alt="QR image" class="qr_app">
                                                       <div class="which-app">
                                                            <h5 class="fw-bold mb-0"><?php echo $ios_title_text; ?></h5>
                                                            <p class="mb-0"><?php echo $ios_description; ?></p>
                                                            <a href="<?php echo $ios_app_store_app_link; ?>" class="flex_name" target="_blank"><img src="<?php echo $ios_play_store_icon; ?>" alt="Ios App QA" class="mini-icons">
                                                                 <p class="mb-0"><?php echo $ios_app_store_text; ?></p>
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
<?php
} ?>
<?php
// Fetch ACF group field
$login_popup = get_field('login_popup');

// Extract fields from the group
$popup_logo = $login_popup['login_popup_logo'] ?? '';
$login_buttons = $login_popup['login_buttons'] ?? [];
?>
<div class="login-popup">
     <div class="modal fade" id="LoginPopup" tabindex="-1" aria-labelledby="LoginPopupLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header bg_popup">
                         <button type="button" class="order-1 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg_popup">
                         <div class="mrs-logo">
                              <img src="<?php echo $popup_logo; ?>" alt="login popup logo" class="img-fluid">
                         </div>

                         <form class="contact-us LoginForm" method="post" role="form">
                              <?php
                              if (!empty($login_buttons)): ?>

                                   <?php foreach ($login_buttons as $index => $button):

                                        // Extract subfields
                                        $button_text = $button['login_buttons']['title'] ?? 'Login';
                                        $button_url = $button['login_buttons']['url'] ?? '#';
                                        $new_tab = $button['login_buttons']['target'] ?? '';

                                        if ($index == 0) {
                                             $class = "c_login";
                                        } else {
                                             $class = "staff_login";
                                        }
                                   ?>
                                        <div class="<?php echo $class; ?> ">
                                             <div class="nav-item login_btn">
                                                  <a href="<?php echo esc_url($button_url); ?>" target="<?php echo $new_tab; ?>" class="nav-link b-padding contact-btn join-us-btn max_width red-btn">
                                                       <div class="join-us white-text"><?php echo esc_html($button_text); ?></div>
                                                       <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                            <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                       </svg>
                                                  </a>
                                             </div>
                                        </div>
                                   <?php endforeach; ?>

                              <?php endif; ?>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>


<!-- Header Block code End -->