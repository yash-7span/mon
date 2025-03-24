<?php
// History Block Code Start

if (!empty($block['data']['is_preview'])): 
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/history/history-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : '#F5F5F5';
$background_color = '';
$bg_class = 'bg-gray'; // Default class if no color selected

if (!empty($background_key) && array_key_exists($background_key, CUSTOM_COLOR_PALETTE)) {
    $background_color = CUSTOM_COLOR_PALETTE[$background_key];
    $bg_class = '';
} elseif (!empty($block['style']['color']['background'])) {
    $background_color = $block['style']['color']['background'];
    $bg_class = '';
}


$history_title = get_field('title');
$history_heading = get_field('heading');
$history_items = get_field('history'); // Assuming it's a repeater field
?>

<div class="history-slider sec-padding" id="RedirectOurHistory">
    <div class="aboutus-title">
        <h5 class="red-text text-uppercase mb-4"><?php echo $history_title; ?></h5>
        <h2 class="mb-0 h-title custom-t"><?php echo $history_heading; ?></h2>
    </div>

    <?php if ($history_items) : ?>
        <div class="swiper historyslider">
            <div class="swiper-wrapper">
                <?php foreach ($history_items as $item) : ?>
                    <div class="swiper-slide">
                        <div class="history-layout container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="image-history">
                                        <img src="<?php echo esc_url($item['history_image']); ?>" class="img-fluid" alt="History Image" />
                                        <div class="year-number">
                                            <h2 class="mb-0"><?php echo esc_html($item['history_year']); ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="content-history">
                                        <p class="mb-0">
                                            <?php echo esc_html($item['history_description']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cstom-padding">
                <ul class="swiper-pagination-timeline">
                    <?php foreach ($history_items as $item) : ?>
                        <li class="swiper-pagination-switch">
                            <h4 class="year-text mb-0"><?php echo esc_html($item['history_year']); ?></h4>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>
