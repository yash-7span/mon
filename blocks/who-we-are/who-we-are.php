<?php
// About us Who we are Block Code Start

if (!empty($block['data']['is_preview'])): 
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/who-we-are/who-we-are-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : '';
$background_color = '';
$bg_class = 'bg-gray'; // Default class if no color selected

if (!empty($background_key) && array_key_exists($background_key, CUSTOM_COLOR_PALETTE)) {
    $background_color = CUSTOM_COLOR_PALETTE[$background_key];
    $bg_class = '';
} elseif (!empty($block['style']['color']['background'])) {
    $background_color = $block['style']['color']['background'];
    $bg_class = '';
}

$left_image = get_field('image');
$about_us_description = get_field('description');                 
?>
<div class="who-we-are sec-padding container-fluid overflow-hidden" id="RedirectWhoWeAre">
    <div class="row d-view">
        <div class="col-lg-7">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="whoweAre" role="tabpanel">
                    <div class="tab-img">
                        <img src="<?php echo $left_image;?>" class="img-fluid" alt="Who We Are" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="whoWeAre nav nav-tabs">
                <div class>
                    <?php echo $about_us_description;?>
                </div>
            </div>
        </div>
    </div>
    <div class="row media-view">
        <div class="whoweare-media">
            <!-- <h2 class="mb-0 h-title">Who we are</h2> -->
            <div class="tab-img">
                <img src="<?php echo $left_image;?>" class="img-fluid" alt />
            </div>
            <div class="content-tab">
                <?php echo $about_us_description;?>
            </div>
        </div>
    </div>
</div>