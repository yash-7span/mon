<?php 

// Company Activity Block Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/company-activities/company-activities.png',); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Acf Field
if(have_rows('activity')):
    echo '<div class="relation-layout sec-padding container-fluid add-investor company-events">
     <div class="row">';
    while(have_rows('activity')):
        the_row();
        $title = get_sub_field('title') ?? '';
        $full_description = get_sub_field('description') ?? '';
        $description = '';
        if($full_description):
            $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $full_description);
        endif;
        $image = get_sub_field('featured_image') ?? '';
        $image_url = $image['url'] ?? '';
        $image_title = $image['title'] ?? ''; 
        $button = get_sub_field('link') ?? '';
        $button_url = $button['url'] ?? '';
        $button_title = !empty($button) ? $button['title'] : 'Read More';
        $button_target = $button['target'] ?? '_self';
        $block_id = empty($button) ? 'governace_main' : '';
        
        ?>
            <div class="col-md-6">
               <div class="investor-main <?php echo $block_id;?>" id="<?php echo $block_id;?>">
                    <div class="inner-img">
                        <img src="<?php echo $image_url;?>" class="img-fluid image-scale" alt="<?php echo esc_html($image_title);?>">
                    </div>
                    <div class="investor-content pb_0">
                        <h4 class="mb-1 fw-bold"><?php echo esc_html($title);?></h4>
                        <?php if(!empty($button)):?>
                            <p class="mb-4 grey-text"><?php echo esc_html($description);?></p>
                        <?php else:?>
                            <div class="flex_text">
                                <p class="mb-4 grey-text">
                                    <?php echo esc_html($description);?>
                                </p>
                            </div>
                        <?php endif;?>
                        <?php if(!empty($button)):?>
                            <div class="view-all-link">
                                <a href="<?php echo $button_url;?>" class="join-us-btn red-btn" target="<?php echo esc_html($button_target);?>">
                                    <div class="join-us"><?php echo esc_html($button_title);?></div>
                                    <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                        <?php else:?>
                            <div class="view-all-link">
                                <div class="read-more" id="more-less">
                                    <a  class="moreless-button text-uppercase read-more-btn"></a>
                                    <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                            <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="#74253A" />
                                    </svg>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
               </div>
          </div>
        <?php
    endwhile;
    echo '</div></div>';
endif;
?>









<!-- Company Block Code End  -->
