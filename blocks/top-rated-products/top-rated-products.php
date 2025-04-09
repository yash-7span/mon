<?php
// Start Image Section Block Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/top-rated-products/star-image-section.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$image1 = get_field('product_image');
$image1_url = get_field('product_image_url') ?: array();
$image1_url_link = !empty($image1_url['url']) ? esc_url($image1_url['url']) : '';
$image1_url_target = !empty($image1_url['target']) ? esc_attr($image1_url['target']) : '_self';

$image2 = get_field('product_image_2');
$image2_url = get_field('product_image_2_url') ?: array();
$image2_url_link = !empty($image2_url['url']) ? esc_url($image2_url['url']) : '';
$image2_url_target = !empty($image2_url['target']) ? esc_attr($image2_url['target']) : '_self';

if (!empty($image1) && !empty($image2)): ?>
    <div class="our-counting-sec">
        <div class="row">
            <?php if (!empty($image1)): ?>
                <div class="col-lg-6 col-md-12 pb-0 px-1">
                    <div class="about-right-img">
                        <?php if(!empty($image1_url_link)):?>
                            <a href="<?php echo $image1_url_link; ?>" target="<?php echo $image1_url_target; ?>">
                        <?php endif;?>
                            <img src="<?php echo esc_url($image1['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image1['alt'] ?: $image1['title']); ?>" />
                        <?php if(!empty($image1_url_link)):?>
                        </a>
                        <?php endif;?>
                        
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($image2)): ?>
                <div class="col-lg-6 col-md-12 pb-0 px-1">
                    <div class="about-right-img">
                        <?php if(!empty($image2_url_link)):?>
                            <a href="<?php echo $image2_url_link; ?>" target="<?php echo $image2_url_target; ?>">
                        <?php endif;?>
                            <img src="<?php echo esc_url($image2['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image2['alt'] ?: $image2['title']); ?>" />
                        <?php if(!empty($image2_url_link)):?>
                            </a>
                        <?php endif;?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>