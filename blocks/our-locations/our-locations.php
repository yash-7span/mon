<?php
// Inner Our Locations (Abouts US) Code Start
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/our-locations/our-locations-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : 'wild-sand';
if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
   $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
else:
  $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#f5f5f5';
endif;

 
$heading = get_field('heading_text');
$description = get_field('description_text');
?>

<div class="our-locations" id="RedirectLocation">
    <div class="aboutus-title text-center" id="RedirectAtrr">
        <h2 class="mb-4 h-title"><?php echo esc_html($heading); ?></h2>
        <p class="mb-0 center-disc"><?php echo esc_html($description); ?></p>
    </div>

    <?php if (have_rows('location_type')): ?>
        <div class="location-boxes position-relative">
            <!-- Tab Navigation -->
            <div class="financial-tabs nav nav-tabs redirectTabs" role="tablist">
                <?php 
                $location_types = [];
                $is_first_tab = true;
                
                while (have_rows('location_type')) : the_row();
                    $office_type = get_sub_field('office_type_depot_warehouse');
                    $office_slug = sanitize_title($office_type);

                    if (!in_array($office_slug, $location_types)) {
                        $location_types[] = $office_slug;
                        ?>
                        <a class="nav-link <?php echo $is_first_tab ? 'active' : ''; ?>" data-bs-toggle="tab" href="#tab-<?php echo $office_slug; ?>" role="tab">
                            <h5 class="mb-0 fw-bold"><?php echo esc_html($office_type); ?></h5>
                        </a>
                        <?php
                        $is_first_tab = false;
                    }
                endwhile;
                ?>
            </div>

            <!-- Tab Content -->
            <div class="tab-content general-items">
                <?php 
                $is_first_content = true;
                
                foreach ($location_types as $type_slug): ?>
                    <div class="tab-pane fade <?php echo $is_first_content ? 'show active' : ''; ?>" id="tab-<?php echo $type_slug; ?>" role="tabpanel">
                        <div class="row row_lc">
                            <?php
                            // Loop through location types again to display the corresponding locations
                            while (have_rows('location_type')) : the_row();
                                $current_type = sanitize_title(get_sub_field('office_type_depot_warehouse'));

                                if ($current_type === $type_slug && have_rows('office_locations')) {
                                    while (have_rows('office_locations')) : the_row();
                                        $office_name = get_sub_field('office_name');
                                        $address = get_sub_field('office_address');
                                        $location_map_url = get_sub_field('location_map_url');
                                        $email = get_sub_field('office_email_address');
                                        $telephone = get_sub_field('office_telephone_no');
                                        $fax = get_sub_field('office_fax_no');
                                        ?>
                                        <div class="col-md-4 width_30">
                                            <div class="inner-lbox">
                                                <a href="<?php echo esc_url($location_map_url); ?>" class="title-lbox" target="_blank">
                                                    <h5 class="fw-bold mb-0 hover_title"><?php echo esc_html($office_name); ?></h5>
                                                    <svg class="loc-arrow" width="41" height="16" viewBox="0 0 41 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M40.7071 8.70711C41.0976 8.31659 41.0976 7.68342 40.7071 7.2929L34.3431 0.928935C33.9526 0.538411 33.3195 0.538411 32.9289 0.928935C32.5384 1.31946 32.5384 1.95262 32.9289 2.34315L38.5858 8L32.9289 13.6569C32.5384 14.0474 32.5384 14.6805 32.9289 15.0711C33.3195 15.4616 33.9526 15.4616 34.3431 15.0711L40.7071 8.70711ZM-8.74228e-08 9L40 9L40 7L8.74228e-08 7L-8.74228e-08 9Z" fill="white" />
                                                    </svg>
                                                </a>
                                                <div class="details-lbox">
                                                    
                                                        <a href="<?php echo esc_url($location_map_url); ?>" class="items-lbox" target="_blank">
                                                            <?php 
                                                            if($address){ ?>
                                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.50586 26.2539H25.1309M5.44336 3.75391H24.1934M6.38086 3.75391V26.2539M23.2559 3.75391V26.2539M11.0684 8.44141H12.9434M11.0684 12.1914H12.9434M11.0684 15.9414H12.9434M16.6934 8.44141H18.5684M16.6934 12.1914H18.5684M16.6934 15.9414H18.5684M11.0684 26.2539V22.0352C11.0684 21.2589 11.6984 20.6289 12.4746 20.6289H17.1621C17.9384 20.6289 18.5684 21.2589 18.5684 22.0352V26.2539" stroke="#F7A209" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                                <p class="mb-0 hover_p">
                                                                    <?php 
                                                                    echo esc_html($address); 
                                                                    ?>
                                                                </p>
                                                                <?php
                                                            } ?>
                                                        </a>
                                                    </p>
                                                    <?php if ($email): ?>
                                                        <a href="mailto:<?php echo esc_attr($email); ?>" class="items-lbox">
                                                            <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1.76367 3.73828C1.76367 3.07524 2.02706 2.43936 2.4959 1.97051C2.96475 1.50167 3.60063 1.23828 4.26367 1.23828H21.7637C22.4267 1.23828 23.0626 1.50167 23.5314 1.97051C24.0003 2.43936 24.2637 3.07524 24.2637 3.73828V16.2383C24.2637 16.9013 24.0003 17.5372 23.5314 18.006C23.0626 18.4749 22.4267 18.7383 21.7637 18.7383H4.26367C3.60063 18.7383 2.96475 18.4749 2.4959 18.006C2.02706 17.5372 1.76367 16.9013 1.76367 16.2383V3.73828Z" stroke="#F7A209" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M1.76367 3.74609L13.0137 11.2461L24.2637 3.74609" stroke="#F7A209" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <p class="mb-0 hover_p">
                                                                <?php echo esc_html($email); ?>
                                                            </p>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($telephone): ?>
                                                        <a href="tel:+<?php echo esc_attr($telephone); ?>" class="items-lbox">
                                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.5711 1.4845C19.1189 1.75296 21.4988 2.88299 23.3172 4.68772C25.1355 6.49245 26.2834 8.86376 26.5711 11.4095M16.5711 6.4845C17.8005 6.72692 18.9286 7.33328 19.8091 8.22488C20.6895 9.11649 21.2816 10.2522 21.5086 11.4845M26.5086 20.1345V23.8845C26.51 24.2326 26.4387 24.5772 26.2992 24.8962C26.1598 25.2152 25.9552 25.5015 25.6987 25.7368C25.4422 25.9722 25.1393 26.1514 24.8095 26.2629C24.4797 26.3744 24.1303 26.4158 23.7836 26.3845C19.9371 25.9665 16.2423 24.6522 12.9961 22.547C9.97587 20.6278 7.41525 18.0672 5.49608 15.047C3.38356 11.786 2.06889 8.07324 1.65858 4.2095C1.62735 3.86383 1.66843 3.51545 1.77921 3.18653C1.88999 2.85761 2.06805 2.55536 2.30204 2.29902C2.53603 2.04269 2.82084 1.83788 3.13832 1.69765C3.4558 1.55741 3.79901 1.48482 4.14608 1.4845H7.89608C8.50272 1.47853 9.09082 1.69334 9.55078 2.08891C10.0107 2.48448 10.3112 3.0338 10.3961 3.6345C10.5544 4.83458 10.8479 6.0129 11.2711 7.147C11.4393 7.5944 11.4757 8.08064 11.376 8.5481C11.2763 9.01555 11.0447 9.44463 10.7086 9.7845L9.12108 11.372C10.9005 14.5014 13.4917 17.0926 16.6211 18.872L18.2086 17.2845C18.5484 16.9484 18.9775 16.7168 19.445 16.6171C19.9124 16.5174 20.3987 16.5538 20.8461 16.722C21.9802 17.1452 23.1585 17.4387 24.3586 17.597C24.9658 17.6827 25.5203 17.9885 25.9167 18.4564C26.3132 18.9242 26.5238 19.5215 26.5086 20.1345Z" stroke="#F7A209" stroke-width="1.875" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <p class="mb-0 hover_p">
                                                            <?php echo '+'.esc_html($telephone); ?>
                                                        </p>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($fax): ?>
                                                        <p class="items-lbox"><?php echo esc_html($fax); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile; // End office locations loop
                                }
                            endwhile; // End location type loop
                            //rewind_posts(); // Reset the repeater loop
                            ?>
                        </div>
                    </div>
                    <?php 
                    $is_first_content = false;
                endforeach;
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>
