<?php

// Latest Blog Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/latest-blogs/latest-blogs.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$section_title = get_field('section_title') ?? '';
$latest_blogs = get_field('select_blogs');
// var_dump($latest_blogs);

?>

<div class="latest-post-sec">
    <div class="relation-layout sec-padding container-fluid add-investor">
        <h4 class="fw-bold latest-post">Latest Post</h4>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="investor-main">
                    <div class="inner-img">
                        <img src="./images/knowledge/oil-gas-02.png" class="img-fluid image-scale" alt="" />
                    </div>
                    <div class="investor-content">
                        <h6 class="red-text">Oil & Gas</h6>
                        <h5 class="mb-1 fw-bold">
                            Understanding Safety Protocols in Offshore Operations: The Pros
                            and The Cons
                        </h5>
                        <p class="mb-4 grey-text">
                            Safety remains our top priority in all offshore operations. Learn
                            about our comprehensive safety measures, and advanced monitoring
                            systems.
                        </p>

                        <div class="latest-profile-info">
                            <div class="post-profile-name">
                                <img src="./images/knowledge/post-profile-name.png" alt="post-profile-name" />
                                <h6 class="mb-0">John Lamech</h6>
                            </div>
                            <div class="post-profile-date">
                                <h6 class="mb-0">February 20, 2025</h6>
                            </div>
                        </div>

                        <a href="blog-read.html" class="join-us-btn red-btn">
                            <div class="join-us">Read More</div>
                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                viewBox="0 0 21 12" fill="none">
                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>