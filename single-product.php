<?php
get_header();
// Fetch Current Post Id;
$current_post_id = get_the_id();

// Fetch Current Taxonomy Detail
$taxonomy = get_the_terms($current_post_id, 'product-services')[0];
$taxonomy_name = $taxonomy->name;
$taxonomy_slug = $taxonomy->slug;
$taxonomy_description = $taxonomy->description;
$taxonomy_image = get_field('featured_image', 'product-services_' . $taxonomy->term_id);
$taxonomy_image_url = $taxonomy_image['url'];

$products = array();

// Fetch Head Office detail from General Settings
$head_office_address = get_field('head_office_address', 'option');
$head_office_address_name = '';
$head_office_address_url = '';
$head_office_address_target = '_blank';

if ($head_office_address) {
    $head_office_address_name = $head_office_address['title'];
    $head_office_address_url = $head_office_address['url'];
    $head_office_address_target = $head_office_address['target'];
}

$head_office_number = get_field('telephone_number', 'option');

//Format the Contact Numbers
$c_number = preg_replace("/[^0-9]/", "", $head_office_number);
if (!empty($c_number)) {
    $formatted_c_number = substr($c_number, 0, 3) . " (" . substr($c_number, 3, 3) . ") " . substr($c_number, 6, 3) . "-" . substr($c_number, 9, 4);
    $contact_number =  $formatted_c_number;
}

$head_office_address_email = get_field('head_office_email', 'option');


?>
<style>
    .form-check-input {
        background: transparent;
        border: 0;
    }

    input.wpcf7-form-control.wpcf7-submit.has-spinner.join-us.text-uppercase {
        color: #fff;
        justify-content: center;
        text-align: center;
        margin: 0 auto;
        display: flex;
        align-items: center;
        width: 100%;
        border: none;
        padding: 10px 20px;
        background: #74252a;
        font-size: 18px;

    }
</style>


</script>

<div class="about-us main-wrapper product_new">
    <div class="main-hero-banner servie-img" style="background-image: url('<?php echo esc_url($taxonomy_image_url); ?>');">
        <div class="hero-title">
            <h5 class="yellow-text mb-4 mx-auto">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb center_bd">
                        <li class="breadcrumb-item">
                            <a href="<?php echo get_the_permalink(298); ?>" class="bd-title yellow-text"><?php echo get_the_title(298); ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="<?php echo get_permalink();?>" class="bd-title yellow-text"><?php echo $taxonomy_name; ?></a>
                        </li>
                    </ol>
                </nav>
            </h5>
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8">
                    <h1 class="mb-3 white-text"><?php echo esc_html($taxonomy_name); ?></h1>
                    <p class="text-white mt-3"><?php echo $taxonomy_description; ?></p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="leader-tabs pro sec-padding container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="set-flow">
                <div class="all-leaders nav nav-tabs">
                    <?php

                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => -1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'product-services',
                                'field'    => 'slug',
                                'terms'    => $taxonomy_slug,
                            ),
                        ),
                        'orderby'        => 'date',
                        'order'          => 'ASC',
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        $index = 1;
                        while ($query->have_posts()) {
                            $query->the_post();
                            $product_id = get_the_id();
                            $product_title = get_the_title();
                            $product_slug  = get_post_field('post_name', get_the_ID());
                            if ($product_id === $current_post_id) {
                                $class = 'active';
                                $aria_selected = 'true';
                                $tab_index = 'tab-index : "-1"';
                            } else {
                                $class = '';
                                $aria_selected = 'false';
                                $tab_index = '';
                            }
                            $products[] = array(
                                'title' => $product_title,
                                'slug' => $product_slug
                            )
                    ?>
                            <a id="<?php echo $product_slug; ?>" href="#p<?php echo $index; ?>" class="nav-link <?php echo $class; ?>" data-bs-toggle="tab" data-bs-target="#p<?php echo $index; ?>" type="button" role="tab" aria-expanded="<?php echo $aria_selected . ' ' . $tab_index; ?>">
                                <div class="item-leader">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="15" viewBox="0 0 9 15" fill="none">
                                        <path d="M1 1.5L7 7.5L1 13.5" stroke="#1E1916" stroke-width="1.5" />
                                    </svg>
                                    <p class="mb-0 grey-text"><?php echo esc_html($product_title); ?></p>
                                </div>
                            </a>

                    <?php
                            $index++;
                        }

                        wp_reset_postdata();
                    }

                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="tab-content">
                <?php

                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'product-services',
                            'field'    => 'slug',
                            'terms'    => $taxonomy_slug,
                        ),
                    ),
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    $index = 1;
                    while ($query->have_posts()) {
                        $query->the_post();
                        $product_id = get_the_id();
                        $product_title = get_the_title();
                        $product_slug  = get_post_field('post_name', get_the_ID());
                        $image_url = get_the_post_thumbnail_url();
                        $content = get_the_content();
                        $product_performance = get_field('performance', $product_id);
                        $permalink = get_the_permalink();
                        $brochure = get_field('upload_brochure', $product_id);
                        $brochure_url = '#';
                        if (!empty($brochure)) {
                            $brochure_url = $brochure['url'];
                        }
                        $external_link = get_field('external_url', $product_id);

                        $external_link_url = '#';
                        $external_link_title = 'View Product';
                        $external_link_target = '_self';
                        if ($external_link) {
                            $external_link_url = $external_link['url'];
                            $external_link_title = $external_link['title'];
                            $external_link_target = $external_link['target'];
                        }
                        if ($product_id === $current_post_id) {
                            $class = 'active show';
                        } else {
                            $class = '';
                        }
                ?>
                        <div class="tab-pane <?php echo $class; ?>" id="p<?php echo $index; ?>" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 ">
                                    <div class="leader-img">
                                        <img src="<?php echo $image_url; ?>" class="img-fluid" alt="<?php echo $product_title; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 ">
                                    <div class="leader-role">
                                        <div class="l-name">
                                            <h3 class="mb-2 fw-bold"><?php echo $product_title; ?></h3>
                                            <?php if (!empty($product_performance)): ?>
                                                <h5 class="mb-0 grey-text fw-bold">Performance: <?php echo esc_html($product_performance); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($content)): ?>
                                            <div class="l-content">
                                                <h5 class="mb-0 grey-text"><?php echo $content; ?></h5>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($external_link)): ?>
                                            <div class="product_btn join-us-btn red-btn">
                                                <a href="<?php echo $external_link_url; ?>" target="_blank" class="join-us"><?php echo $external_link_title; ?></a>
                                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                </svg>
                                            </div>
                                        <?php else: ?>
                                            <div class="go-to-cta ci-list">
                                                <?php if(!empty($brochure)):?>
                                                    <div class="product_btn join-us-btn red-btn">
                                                        <a href="<?php echo $brochure_url; ?>" class="join-us" download>download brochure</a>
                                                        <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21"
                                                            height="12" viewBox="0 0 21 12" fill="none">
                                                            <path
                                                                d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                                fill="white" />
                                                        </svg>
                                                    </div>
                                                <?php endif;?>
                                                <a href="#inquiryForm" class="join-us-btn red-btn request_btn">
                                                    <div class="join-us">request</div>
                                                    <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21"
                                                        height="12" viewBox="0 0 21 12" fill="none">
                                                        <path
                                                            d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
                        $index++;
                    }

                    wp_reset_postdata();
                }

                ?>
            </div>
        </div>
    </div>
</div>

<div class="inquiry-form-overlay">
    <div class="contact-sec sec-padding container-fluid inquiry-form" id="inquiryForm">
        <div class="row">
            <div class="col-xxl-8">
                <div class="contact-form bg-grey">
                    <div class="contact-title">
                        <h2 class="mb-0">Get in touch</h2>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="c1479dd" title="Enquiry Form"]'); ?>
                </div>

            </div>

            <div class="col-xxl-4">
                <div class="contact-info bg-grey">
                    <div class="item-contact">
                        <div class="bg-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <path
                                    d="M6.25 35H33.75M7.5 5H32.5M8.75 5V35M31.25 5V35M15 11.25H17.5M15 16.25H17.5M15 21.25H17.5M22.5 11.25H25M22.5 16.25H25M22.5 21.25H25M15 35V29.375C15 28.34 15.84 27.5 16.875 27.5H23.125C24.16 27.5 25 28.34 25 29.375V35"
                                    stroke="#F7A209" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p class="fw-bold black-text mb-1 pt-3">Head Office</p>
                        <a href="<?php echo $head_office_address_url; ?>">
                            <p class="black-text mb-0"><?php echo esc_html($head_office_address_name); ?></p>
                        </a>
                    </div>

                    <div class="item-contact">
                        <div class="bg-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <path
                                    d="M5.75 12.3333C5.75 11.4493 6.10119 10.6014 6.72631 9.97631C7.35143 9.35119 8.19928 9 9.08333 9H32.4167C33.3007 9 34.1486 9.35119 34.7737 9.97631C35.3988 10.6014 35.75 11.4493 35.75 12.3333V29C35.75 29.8841 35.3988 30.7319 34.7737 31.357C34.1486 31.9821 33.3007 32.3333 32.4167 32.3333H9.08333C8.19928 32.3333 7.35143 31.9821 6.72631 31.357C6.10119 30.7319 5.75 29.8841 5.75 29V12.3333Z"
                                    stroke="#F7A209" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5.75 12.332L20.75 22.332L35.75 12.332" stroke="#F7A209" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p class="fw-bold black-text mb-1 pt-3">Email</p>
                        <p class="black-text mb-0">
                            <a href="mailto: <?php echo $head_office_address_email; ?>" class="black-text"><?php echo $head_office_address_email; ?></a>
                        </p>
                    </div>

                    <div class="item-contact">
                        <div class="bg-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                fill="none">
                                <path
                                    d="M23.4164 3.66422C26.8135 4.02217 29.9867 5.52889 32.4112 7.93519C34.8357 10.3415 36.3662 13.5032 36.7497 16.8976M23.4164 10.3309C25.0556 10.6541 26.5598 11.4626 27.7337 12.6514C28.9076 13.8402 29.6971 15.3544 29.9997 16.9976M36.6664 28.5309V33.5309C36.6683 33.9951 36.5732 34.4545 36.3872 34.8798C36.2013 35.3051 35.9286 35.6869 35.5865 36.0007C35.2445 36.3145 34.8407 36.5534 34.401 36.7021C33.9613 36.8508 33.4953 36.906 33.0331 36.8642C27.9044 36.307 22.9781 34.5545 18.6497 31.7476C14.6228 29.1887 11.2086 25.7745 8.64973 21.7476C5.83302 17.3996 4.08013 12.4492 3.53306 7.29756C3.49141 6.83667 3.54618 6.37216 3.69389 5.9336C3.8416 5.49504 4.07901 5.09204 4.391 4.75026C4.70299 4.40848 5.08273 4.13541 5.50604 3.94843C5.92935 3.76145 6.38696 3.66466 6.84973 3.66422H11.8497C12.6586 3.65626 13.4427 3.94269 14.056 4.47011C14.6693 4.99754 15.0699 5.72997 15.1831 6.53089C15.3941 8.131 15.7855 9.7021 16.3497 11.2142C16.574 11.8108 16.6225 12.4591 16.4896 13.0824C16.3566 13.7056 16.0478 14.2777 15.5997 14.7309L13.4831 16.8476C15.8557 21.0201 19.3105 24.475 23.4831 26.8476L25.5997 24.7309C26.0529 24.2828 26.625 23.974 27.2483 23.841C27.8715 23.7081 28.5199 23.7567 29.1164 23.9809C30.6285 24.5451 32.1996 24.9365 33.7997 25.1476C34.6093 25.2618 35.3487 25.6696 35.8773 26.2934C36.4058 26.9172 36.6867 27.7135 36.6664 28.5309Z"
                                    stroke="#F7A209" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <p class="fw-bold black-text mb-1 pt-3">Tel</p>
                        <p class="black-text mb-0">
                            <a href="tel: +<?php echo $contact_number; ?>" class="black-text">+<?php echo $contact_number; ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php



get_footer();

?>