<?php
// Responsibility Code Start

if (!empty($block['data']['is_preview'])): 
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/responsibility/responsibility-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

// Fields Get
$responsibility_title = get_field('title');
$responsibility_heading = get_field('heading');
$responsibility_description = get_field('description');
$responsibility_items = get_field('responsibility'); // Assuming it's a repeater field
?>

<div class="responsibility-sec" id="RedirectResponsibility">
    <div class="aboutus-title respo-title">
        <h5 class="red-text text-uppercase mb-4"><?php echo esc_html($responsibility_title); ?></h5>
        <h2 class="mb-4 h-title"><?php echo esc_html($responsibility_heading); ?></h2>
        <p class="mb-0">
            <?php echo esc_html($responsibility_description); ?>
        </p>
    </div>

    <?php if ($responsibility_items): ?>
        <div class="swiper responsibility-carousel">
            <div class="swiper-wrapper">
                <?php foreach ($responsibility_items as $index => $item): ?>
                    <div class="swiper-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="wrap-box respo-linear" style="background-image: url('<?php echo $item['responsibility_image'];?>');">
                            <div class="title-box">
                                <h3 class="mb-0 white-text"><?php echo esc_html($item['responsibility_name']); ?></h3>
                                <p class="mb-0 white-text fade-out">
                                    <?php echo esc_html($item['responsibility_description']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    <?php endif; ?>
</div>
