<?php
// About us Who we are Block Code Start

if (!empty($block['data']['is_preview'])): 
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/corporate-values/corporate-values.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

// Get heading Text
$heading_text = get_field('heading_text');
?>
<div class="our-values-sec sec-padding container-fluid <?php echo $bg_class; ?>" style="<?php echo $background_color ? 'background-color:' . esc_attr($background_color) . ';' : ''; ?>" id="RedirectValues">
    <div class="row">
        <div class="col-xl-4">
            <div class="aboutus-title">
                <h2 class="mb-0 h-title custom-t">
                    <span class="d-block">
                        <?php echo $heading_text;?>
                    </span>
                </h2>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="main-value-base">
                <div class="row">
                <?php 
                    $values = get_field('values');
                    // Show inserted Corporate values on loop
                    if ($values) { 
                        foreach ($values as $value) { ?>
                            <div class="col-sm-6">
                                <div class="value-container">
                                    <div class="value-line"></div>
                                    <div class="text-value">
                                        <h4 class="mb-3 text-h4 fw-bold"><?php echo esc_html($value['values_heading']); ?></h4>
                                        <p class="grey-text mb-0 min-w">
                                            <?php echo esc_html($value['values_description']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } 
                ?>
                </div>
            </div>
        </div>
    </div>
</div>