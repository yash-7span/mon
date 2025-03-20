<?php
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/star-image-section/star-image-section.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;


$image1 = get_field('product_image');
$image1_url = !empty(get_field('product_image_url')) ? get_field('product_image_url') : '#';
$image2 = get_field('product_image_2');
$image2_url = !empty(get_field('product_image_2_url')) ? get_field('product_image_2_url') : '#';

if(!empty($image1) && !empty($image2) == 1):?>
    <div class="our-counting-sec">
        <div class="row">
            <?php if(!empty($image1)):?>
                <div class="col-lg-6 col-md-12 pb-0 px-1">
                    <div class="about-right-img">
                        <a href="<?php echo $image1_url;?>" target="_blank">
                            <img src="<?php echo $image1['url'];?>" class="img-fluid" alt="<?php echo $image1['title'];?>" />
                        </a>
                    </div>
                </div>
            <?php endif;?>

            <?php if(!empty($image2)):?>
                <div class="col-lg-6 col-md-12 pb-0 px-1">
                    <div class="about-right-img">
                        <a href="<?php echo $image2_url;?>" target="_blank">
                            <img src="<?php echo $image2['url'];?>" class="img-fluid" alt="<?php echo $image2['title'];?>" />
                        </a>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
<?php endif;?>