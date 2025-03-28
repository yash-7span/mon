<?php

// Our Leader Section Block Code Start

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
$leaders = get_field('select_leaders');


?>
<div class="leadership-sec" id="RedirectOurLeaders">
    <div class="industry-sec sec-padding container-fluid overflow-hidden" id="RedirectLeaders" style="background-color:<?php echo $background_color;?>;">
        <div class="industry-title">
            <h2 class="mb-0 h-title"><?php echo esc_html($section_title);?></h2>
        </div>
        <div class="inner-height">
            <div class="row">
                <div class="col-xxl-3 col-xl-3">
                    <!-- custom pagination -->
                    <div class="pagination_process swiper-pagination">
                        <ul class="swiper-pagination-custom">
                            <?php foreach($leaders as $data):?>
                            <li class="side-title">
                                <h4 class="mb-0 sec-title"><?php echo $data->name;?></h4>
                            </li>
                            <?php endforeach;?>
                            <li class="line"></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-9">
                    <div class="swiper industrySlider">
                        <div class="swiper-wrapper">
                            <?php
                            foreach($leaders as $items):
                                $image = get_field('featured_image','leader-categories_' . $items->term_id);
                                $image_url = $image['url'];
                                $description = $items->description ?? '';
                                $button_title = get_field('button_title','leader-categories_' . $items->term_id) ? esc_html(get_field('button_title','leader-categories_' . $items->term_id)) : '';
                                $button_url = get_term_link_by_slug_default($items->slug, $items->taxonomy) ? esc_url(get_term_link_by_slug_default($items->slug, $items->taxonomy)) : '';
                                $button_target = '_self';
                                
                            ?>
                            <div class="swiper-slide">
                                <div class="row sec-h fade-text">
                                    <div class="col-xxl-7 col-xl-6 col-md-6">
                                        <div class="img-slide sec-h">
                                            <img src="<?php echo $image_url;?>" class="img-fluid sec-h" alt />
                                        </div>
                                    </div>

                                    <div class="col-xxl-5 col-xl-6 col-md-6">
                                        <div class="content-slider sec-h">
                                            <p class="mb-0 grey-text">
                                                <?php echo $description;?>
                                            </p>

                                            <a href="<?php echo $button_url;?>" class="join-us-btn red-btn slide_btn">
                                                <div class="join-us"><?php echo $button_title;?></div>
                                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21"
                                                    height="12" viewBox="0 0 21 12" fill="none">
                                                    <path
                                                        d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>