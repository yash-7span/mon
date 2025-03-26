<?php
// Service Details Block (Service page) Code Start
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/service-details/service-details-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : 'wild-sand';
if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
   $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
else:
  $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#fff';
endif;

 
$service_heading = get_field('service_heading');
$service_image = get_field('service_image');
$service_description = get_field('service_description');
$btn_text = get_field('view_more_button_text');
$btn_link = get_field('view_more_btn_link');
?>

<div class="layout-service sec-padding container-fluid" style="background-color: <?php echo $background_color;?>;" id="Lubricants">
     <div class="row align-items-center">
          <div class="col-xxl-6">
               <div class="image-serivce">
                    <?php 
                    if($service_image){ ?>
                        <img src="<?php echo $service_image;?>" class="img-fluid fix-width" alt="">
                    <?php }?>
               </div>
          </div>
          <div class="col-xxl-6">
               <div class="title-service">
                    <h2 class="mb-0"><?php echo $service_heading;?></h2>

                    <p class="mb-3">
                        <?php 
                            $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $service_description);
                            echo wp_kses_post($description);
                        ?>
                    </p>
                    
                    <div class="col-lg-12 mt-3 lubricant-btn">
                        <?php 
                            if($btn_text != ''){ ?> 
                                <div class="join-us-btn red-btn">
                                
                                    <a href="<?php echo $btn_link;?>" class="join-us"><?php echo $btn_text;?></a>
                                    <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                    </svg>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php 
                        // Get the ACF group field 'what_service_offerings'
                        $what_service_offerings = get_field('what_service_offerings');

                        if (!empty($what_service_offerings)) {
                            // Access the service offering heading inside the group
                            $service_heading_text = $what_service_offerings['service_offering_heading']; 
                            $description = $what_service_offerings['description'];
                            if (!empty($service_heading_text)) {
                                ?>
                                <h5 class="mb-0 mt-3"><?php echo esc_html($service_heading_text); ?></h5>
                                <div class="row produce-detail">
                                    <?php 
                                    // Access the repeater field inside the group
                                    if (!empty($what_service_offerings['offering_services'])) {
                                        foreach ($what_service_offerings['offering_services'] as $service) {
                                            $service_name = $service['service_name']; // Access the sub field

                                            if (!empty($service_name)) {
                                                ?>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="list-produce pb-bottom">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                                            <path d="M19.166 16.4829C19.0787 15.5924 18.8028 14.7327 18.3579 13.9652L13.9815 7.2377C13.6057 6.65854 12.8297 6.4936 12.2489 6.86982C12.1031 6.96455 11.9781 7.08987 11.882 7.2377L7.50297 13.9652C5.98603 16.5951 6.5767 19.9338 8.90537 21.8844C9.93597 22.7447 11.1996 23.2516 12.521 23.3346" stroke="#74253A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 20.4167L18.0556 23.3333L24.1667 17.5" stroke="#74253A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <p class="mb-0 grey-text"><?php echo esc_html($service_name); ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <?php 
                            } 
                            // after what service offer points show text
                            if($description != ''){ ?>
                                
                                <p class="mb-0"><?php echo $description;?></p>
                                
                                <?php
                            }
                            
                        }
                    ?>


               </div>
          </div>
     </div>
</div>