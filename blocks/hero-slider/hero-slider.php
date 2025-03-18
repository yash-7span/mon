<?php
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/hero-slider/hero-slider.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;
?>
<?php
// Get all slider
$slides = get_field('hero_slider');

if (isset($block['backgroundColor'])) {

    // Fetch Background Color From Block Editor
    $background_key = $block['backgroundColor'];
    if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
        $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
    else:
        $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#fff';
    endif;
}

if (isset($block['textColor'])) {

    // Fetch Text Color From Block Editor
    $text_key = $block['textColor'];
    if (array_key_exists($text_key, CUSTOM_COLOR_PALETTE)):
        $text_color =  CUSTOM_COLOR_PALETTE[$text_key];
    else:
        $text_color = !empty($block['style']['color']['text']) ? $block['style']['color']['text'] : '#05202E';
    endif;
}

if (!empty($slides)):
    $total_slides = 0; ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            // Get total slides counter
            $total_slides = count($slides);
            if ($total_slides > 1) {

                foreach ($slides as $index => $slide): ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="<?php echo esc_attr($index); ?>"
                        class="<?php echo $index === 0 ? 'active' : ''; ?>"
                        aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                        aria-label="Slide <?php echo esc_attr($index + 1); ?>">
                    </button>

            <?php endforeach;
            } ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($slides as $index => $slide):
                $background_type = $slide['background_type'];
                $background_video = $slide['background_video'];
                $background_image = '';

                if ($background_type != 'video') {
                    $background_image = $slide['background_image'];
                }
            ?>


                <div class="carousel-item d-flex align-items-center <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo esc_url($background_image); ?>');">
                    <?php
                    if ($background_type == 'video') { ?>
                        <video autoplay class="d-block h-100 w-100 object-fit-cover position-absolute z-n1" loop="true" autoplay="autoplay" muted alt="<?php echo esc_attr($slide['title']); ?>">
                            <source src="<?php echo esc_url($background_video); ?>" type="video/mp4">
                        </video>
                    <?php } else { ?>
                        <!-- <img src="<?php //echo esc_url($background_image); 
                                        ?>" class="d-block w-100 h-100 object-fit-cover" alt="<?php //echo esc_attr($slide['title']); 
                                                                                                ?>"> -->
                    <?php } ?>

                    <div class="container-fluid hero-fluid section-spacing w-100 h-100 top-0 start-0 end-0 bottom-0 z-1">
                        <div class="carousel-content container px-0 px-xl-0 h-100">
                            <div class="col-lg-6 carousel-content-inner h-100">
                                <?php if ($slide['title']) : ?>
                                    <h1 class="carousel-content-heading font-navy fw-light mb-4 text-break">
                                        <?php echo esc_html($slide['title']); ?>
                                    </h1>
                                <?php endif; ?>
                                <?php if ($slide['content']) : ?>
                                    <p class="carousel-content-description font-navy fw-light lh-sm mb-0 pt-4">
                                        <?php echo esc_html($slide['content']); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ($slide['hero_button_text']) :
                                    if ($slide['hero_button_link_type'] == 'Internal Link' && $slide['btn_internal_link']) {
                                        $btn_link = $slide['btn_internal_link'];
                                    } elseif ($slide['hero_button_link_type'] == 'External Link' && $slide['btn_external_link'] != '') {
                                        $btn_link =  $slide['btn_external_link'];
                                    } else {
                                        $btn_link = '#';
                                    }
                                    $link_target = '';
                                    if ($slide['open_link_in_new_tab'][0] == 'Open Link in New Tab') {
                                        $link_target = "target = '_blank'";
                                    }
                                ?>
                                    <a class="hero-btn d-inline-block" href="<?php echo $btn_link; ?>" <?php echo $link_target ?>>
                                        <button class="rounded-pill font-navy fs-6 fw-light lh-base cta-btn border-0"><?php echo esc_html($slide['hero_button_text']) ?></button>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php if ($total_slides > 1) { ?>
                                <sup class="font-navy fw-medium lh-sm slide-title">
                                    <?php echo esc_html($slide['tag_line']); ?>
                                </sup>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>