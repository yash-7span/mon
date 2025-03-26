<?php
// Block Code of FLash Screen Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/flash-screen/flash-screen.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Acf Field of the Block Start 

$site_logo = get_field('footer_logo', 'option');
$display_popup = get_field('display_flash_screen', 'option');
if ($display_popup == 1):
    $title = get_field('title', 'option');
    $background_image = get_field('background_image','option') ?? '';

    $full_description = get_field('description', 'option') ?? '';
    $description = '';
    if (!empty($full_description)):
        $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $full_description);
    endif;

    $sub_title = get_field('sub_title', 'option') ?? '';
    $starting_price = get_field('starting_price', 'option') ?? '';

    $button = get_field('product_link', 'option');
    $button_title = '';
    $button_url = '';
    $button_target = '';
    if ($button):
        $button_title = $button['title'];
        $button_url = $button['url'];
        $button_target = $button['target'];
    endif;

?>

<div class="modal fade Get_It_Now" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content getitnow-main-img" style="background-image: url('<?php echo $background_image; ?>')">
                <div class="modal-header bg_popup">
                    <button type="button" class="btn-close order-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <img src="<?php echo $site_logo['url'];?>" alt="<?php echo $site_logo['title'];?>">

                    <div class="get-it-now-content">
                        <?php if (!empty($title)): ?>
                            <h3 class="text-white text-uppercase mb-0"><?php echo $title; ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($description)): ?>
                            <h4 class="text-white mb-0"><?php echo $description; ?></h4>
                        <?php endif; ?>

                        <?php if (!empty($sub_title)): ?>
                            <h5 class="text-white mb-0"><?php echo $sub_title; ?></h5>
                        <?php endif; ?>

                        <?php if (!empty($starting_price)): ?>
                            <h5 class="text-white mb-0"><?php echo $starting_price; ?></h5>
                        <?php endif; ?>
                    </div>

                    <div class="get-it-now-links">
                        <?php if($button):?>
                            <a href="<?php echo $button_url;?>" class="join-us-btn" target="<?php echo $button_target;?>">
                                <div class="join-us"><?php echo $button_title;?></div>
                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="#1E1916"></path>
                                </svg>

                            </a>
                        <?php endif;?>
                        <p class="mb-1 light-grey">Terms &amp; Conditions applied</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php
endif;
?>

<!-- Flash Screen Block Code End  -->