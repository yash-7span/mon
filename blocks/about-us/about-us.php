<?php
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/about-us/about-us.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch ACF Field
$title = get_field('section_title');
$heading = get_field('heading');
$description = get_field('description');
$button = get_field('section_button');
$button_url = $button['url'];
$button_title = $button['title'];
$button_target = $button['target'];
$image = get_field('image_group');
$image1 = $image['image_1'];
$image1_url = $image['image_1_url'];
$image2 = $image['image_2'];
$image2_url = $image['image_2_url'];
?>

<div class="aboutus-sec container-fluid overflow-hidden" id="RedirectAboutUs">
    <div class="row">
        <div class="col-xxl-5 col-xl-6 col-lg-6">
            <div class="aboutus-title">
                <?php if(!empty($title)):?>
                    <h5 class="red-text text-uppercase mb-1"><?php echo $title;?></h5>
                <?php endif;?>
                <?php if(!empty($heading)):?>
                    <h2 class="mb-0 h-title"><?php echo $heading;?></h2>
                <?php endif;?>
            </div>
        </div>
        <?php if(!empty($button_title)):?>
            <div class="col-xxl-7 col-xl-6 col-lg-6">
                <div class="desc-aboutus">
                    <h5 class="grey-text"><?php echo $description;?></h5>
                    <a href="<?php echo $button_url;?>" class="join-us-btn red-btn justify-content-center">
                        <div class="join-us"> <?php echo $button_title;?></div>
                        <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                            <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>

<?php if(!empty($image1) && !empty($image2) == 1):?>
    <div class="our-counting-sec">
        <div class="row">
            <?php if(!empty($image1)):?>
                <div class="col-lg-6 col-md-12 pb-0 px-1">
                    <div class="about-right-img">
                        <a href="<?php echo $image1_url;?>" target="_blank">
                            <img src="<?php echo $image1['url'];?>" class="img-fluid" alt="stallion-diesel" />
                        </a>
                    </div>
                </div>
            <?php endif;?>

            <?php if(!empty($image2)):?>
                <div class="col-lg-6 col-md-12 pb-0 px-1">
                    <div class="about-right-img">
                        <a href="<?php echo $image2_url;?>" target="_blank">
                            <img src="<?php echo $image2['url'];?>" class="img-fluid" alt="transmission-gear-oil" />
                        </a>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
<?php endif;?>