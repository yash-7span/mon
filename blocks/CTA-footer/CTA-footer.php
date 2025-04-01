<!-- CTA Banner Section -->
<?php 
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
    ?>
    <img src="<?php echo esc_url(get_template_directory_uri() . '/blocks/CTA-footer/CTA-footer-img.svg'); ?>" alt="Preview" style="width: 100%; height: auto;">
    <?php
    return;
endif;

// Get Data
$bg_image = get_field('background_image');
$heading_text = get_field('banner_heading_text');
$button = get_field('button_text_link');
?>
<div class="connect-with-sec">
    <?php 
    if($bg_image){ ?>
        <img src="<?php echo $bg_image['url'];?>" class="connect-img img-fluid" alt="<?php echo $bg_image['alt'];?>" />
        <?php 
    }?>
     <div class="desc-connect container">
        <?php
        //Heading text
        if(isset($heading_text) && !empty($heading_text)){ ?>
            <h2 class="h-title mb-0">
                <?php 
                    echo $heading_text;
                ?>
            </h2>
          <?php 
        }
        if($button){
            ?>
            <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'];?>" class="join-us-btn red-btn">
                <div class="join-us"><?php echo $button['title'];?></div>
                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                </svg>
            </a>
            <?php 
        }
        ?>
     </div>
</div>