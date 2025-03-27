<?php
// Auto Carousel Section Block Code Start

if (!empty($block['data']['preview_image'])):
?>
    <img src="<?php echo esc_url($block['data']['preview_image']); ?>" alt="Preview" style="width: 100%; height: auto;">
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


$section_title = get_field('section_title');
$section_heading = get_field('section_heading');
$industries = get_field('industry_services');

?>
<div class="industry-sec sec-padding container-fluid bg-grey overflow-hidden" id="RedirectIndustry">
<div class="industry-title">
     <h5 class="red-text text-uppercase mb-1"><?php echo esc_html($section_title);?></h5>
     <h2 class="mb-0 h-title">
        <?php echo $section_heading;?>
     </h2>
</div>
<div class="inner-height">
     <div class="row">
          <div class="col-xxl-4 col-xl-3">

            <!-- custom pagination -->
            <div class="pagination_process swiper-pagination">
                <ul class="swiper-pagination-custom">
                    <?php if(have_rows('industry_services')):
                        while(have_rows('industry_services')):
                            the_row();
                            $title = get_sub_field('title');
                            echo '
                                <li class="side-title">
                                    <h4 class="mb-0 sec-title">'.$title.'</h4>
                                </li>
                            ';
                        endwhile;
                    endif;
                    ?>
                    <li class="line"></li>
                </ul>
            </div>

          </div>

          <div class="col-xxl-8 col-xl-9">
               <div class="swiper industrySlider">
                    <div class="swiper-wrapper">
                    <?php if(have_rows('industry_services')):
                        while(have_rows('industry_services')):
                            the_row();
                            $title = get_sub_field('title') ?? '';
                            $image = get_sub_field('featured_image') ?? '';
                            $image_url = $image['url'];
                            $image_name = $image['title'];
                            $full_description = get_sub_field('description') ?? '';
                            $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $full_description);
                            $button = get_sub_field('button_link');
                            $button_title = $button['title'] ?? 'Dive in to the WOrld';
                            $button_url = $button['url'];
                            $button_target = $button['target'] ?? '_self';
                            ?>
                            <div class="swiper-slide">
                                <div class="row sec-h fade-text">
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="img-slide sec-h">
                                                <img src="<?php echo $image_url;?>" class="img-fluid sec-h" alt="<?php echo $image_name;?>" />
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="content-slider sec-h">
                                                <p class="mb-0 grey-text"><?php echo $description;?></p>

                                                <a href="<?php echo $button_url;?>" class="join-us-btn red-btn slide_btn" target="<?php echo $button_target;?>">
                                                    <div class="join-us"> <?php echo $button_title;?></div>
                                                    <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                    </svg>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endwhile;
                        endif;?>
                    </div>
               </div>
          </div>

     </div>
</div>
</div>