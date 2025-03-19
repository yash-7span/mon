<?php
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/hero-slider/hero-slider.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;
?>

<div class="main-wrapper">
    <div class="swiper" id="heroSlider">
        <div class="swiper-wrapper">
            <?php
            if (have_rows('slides')):
                while (have_rows('slides')):
                    the_row();
                    $background_image = get_sub_field('background_image');
                    $slider_content = get_sub_field('slider_content');
                    $heading = $slider_content['heading'];
                    $title = $slider_content['title'];
                    $button_title_and_url = $slider_content['button_title_and_url'];
                    $button_title = $button_title_and_url['title'];
                    $button_url = $button_title_and_url['url'];
                    $button_target = $button_title_and_url['target'];
                    $description = $slider_content['description'];
                    ?>
                    <div class="swiper-slide one-slide">
                        <div class="main-hero-banner homepage" style="background-image: url(<?php echo $background_image; ?>);">
                            <div class="fade-content">
                                <div class="hero-title">
                                    <?php if(!empty($heading)):?>
                                        <h1 class="mb-0 white-text">
                                            <?php echo $heading; ?>
                                        </h1>
                                    <?php endif;?>
                                    <?php if(!empty($title)):?>
                                        <h3 class="white-text"><?php echo $title; ?></h3>
                                    <?php endif;?>
                                    <div class="order-xs-2">
                                        <a href="<?php echo $button_url ?>" class="join-us-btn" target='<?php echo $button_target; ?>'>
                                            <div class="join-us"> <?php echo $button_title; ?></div>
                                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="#1E1916" />
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                                <?php if(!empty($description)):?>
                                    <div class="order-xs-1">
                                        <div class="hero-desc">
                                            <h5 class="white-text mb-0"><?php echo $description;?></h5>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
            <?php endif;?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>