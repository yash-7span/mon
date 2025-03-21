<?php
// Our Mission & Vision Block Code Start

if (!empty($block['data']['is_preview'])): 
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/our-mission-and-vision/our-mission-and-vision-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

$mission_heading = get_field('mission_heading');
$mission_description = get_field('mission_description');
$vision_heading = get_field('vision_heading');
$vision_description = get_field('vision_description');
$right_side_image = get_field('image');

?>

<div class="mission-vision-sec sec-padding container-fluid <?php echo $bg_class; ?>" style="<?php echo $background_color ? 'background-color:' . esc_attr($background_color) . ';' : ''; ?>" id="RedirectOurMission">
    <div class="row align-items-center">
        <div class="col-md-7 order_2">
            <div class="mission-vision-text">
                <h2 class="mb-4 h-title"><?php echo $mission_heading; ?></h2>
                <h5 class="mb-0 p-title">
                    <?php echo $mission_description; ?>
                </h5>
            </div>
            <div class="mission-vision-text space-t">
                <h2 class="mb-4 h-title"><?php echo $vision_heading; ?></h2>
                <h5 class="mb-0 p-title">
                    <?php echo $vision_description; ?>
                </h5>
            </div>
        </div>
        <div class="col-md-5 order_1">
            <div class="mission-vision-img">
                <?php if (!empty($right_side_image)): ?>
                    <img src="<?php echo esc_url($right_side_image); ?>" class="img-fluid" alt="our mission and vision" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
