<?php
// Our Mission & Vision Block Code Start

if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/our-mission-and-vision/our-mission-and-vision-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

$heading = get_field('heading');
$description = get_field('description');
$background_image = get_field('background_image');

?>

<div class="mission-vision-sec sec-padding container-fluid bg-grey" id="RedirectOurMission">
    <div class="row align-items-center">
        <div class="col-md-7 order_2">
            <div class="mission-vision-text">
                <h2 class="mb-4 h-title">Our Mission</h2>
                <h5 class="mb-0 p-title">
                    “To be the preferred fuel marketer in the hearts and minds of the
                    customers mostly recognized for the reliability, the quality, the
                    cleanliness and the safety of the product and services offered.”
                </h5>
            </div>
            <div class="mission-vision-text space-t">
                <h2 class="mb-4 h-title">Our Vision</h2>
                <h5 class="mb-0 p-title">
                    “To be the Leading Integrated African Energy Company, recognized
                    for its People, Excellence and Values.”
                </h5>
            </div>
        </div>
        <div class="col-md-5 order_1">
            <div class="mission-vision-img">
                <img src="./images/mission-vision-img.png" class="img-fluid" alt />
            </div>
        </div>
    </div>
</div>