<?php
// USPS Section Block Code Start 

// Check if the preview is exists or not
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/usps-section/usps-section.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;
$title = get_field('section_title');
$heading = get_field('section_heading');

?>

<div class="usps-section js-scroll" id="RedirectUSPs">
    <?php if(!empty($title) && !empty($heading)):?>
        <div class="usps-title">
            <?php if(!empty($title)):?>
                <h5 class="red-text text-uppercase mb-1"><?php echo $title;?></h5>
            <?php endif;?>
            <?php if(!empty($heading)):?>
                <h2 class="mb-0 h-title"><?php echo $heading; ?></h2>
            <?php endif;?>
        </div>
    <?php endif;?>

    <!-- Desktop Layout Start  -->
    <div class="usps-verticle-slider desktop">
        <div class="uspsMain">
            <?php 
                if(have_rows('usps_services')):
                    $i = 0;
                    while(have_rows('usps_services')):
                        the_row();
                        $i++;
                        $title = get_sub_field('title');
                        $full_description = get_sub_field('description');
                        $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $full_description);
                        $image= get_sub_field('featured_image');
                        $image_url = $image['url'];
                        $image_title = $image['title'];
                        
                        if($i == 1){ 
                            $flag = ' active';
                        }
                        else{
                            $flag = '';
                        }
                        echo '
                            <div class="usps-item position-relative'.$flag.'">
                                <div class="media-flex-item">
                                    <div class="switch-title">
                                        <span class="p-number"> ' .$i. '</span>
                                    </div>
                                    <div class="distinction">
                                        <h4 class=""> ' . $title. ' </h4>
                                        <p class="mb-0">' . $description . ' </p>
                                    </div>
                                </div>
                                <div class="usap-item-img mt-3">
                                    <img src="' . $image_url . '" class="img-fluid" alt="' . $image_title . '" />
                                </div>
                            </div>
                        ';
                    endwhile;
                    // wp_reset_postdata();
                endif;
            ?>
        </div>

        <div class="gallery-thumbs">
            <?php 
                if(have_rows('usps_services')):
                    $i = 0;
                    while(have_rows('usps_services')):
                        the_row();
                        $i++;
                        $image= get_sub_field('featured_image');
                        $image_url = $image['url'];
                        $image_title = $image['title'];
                        // var_dump($image_url);
                        if($i == 1){ 
                            $flag = ' is-active';
                        }
                        else{
                            $flag = '';
                        }
                        echo '
                        <div class="image-usps' .$flag. '">
                            <img src="' . $image_url . '" class="img-fluid" alt="' . $image_title . '" />
                        </div>';
                    endwhile;
                endif;
            ?>
        </div>
    </div>
    <!-- Desktop Layout End  -->

    <!-- Mobile Layout Start  -->
    <div class="usps-verticle-slider mobile">
        <div class="row">
            <div class="col-12">
                <div class="swiper uspsMain">
                    <div class="swiper-wrapper">
                        <?php 
                        if(have_rows('usps_services')):
                            $i = 0;
                            while(have_rows('usps_services')):
                                the_row();
                                $i++;
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                $image= get_sub_field('featured_image');
                                $image_url = $image['url'];
                                $image_title = $image['title'];
                                echo '
                                <div class="swiper-slide">
                                    <div class="usps-item position-relative">
                                        <div class="media-flex-item">
                                            <div class="switch-title">
                                                <span class="p-number">'.$i.'</span>
                                            </div>
                                            <div class="distinction">
                                                <h4 class="">'. $title .'</h4>
                                                <p class="mb-0">'. $description .'</p>
                                            </div>
                                        </div>
                                        <div class="usap-item-img mt-3">
                                            <img src="' . $image_url . '" class="img-fluid" alt="' . $image_title . '" />
                                        </div>
                                    </div>
                                </div>
                                ';
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Layout End  -->
</div>


<!-- USPS Section Block Code End  -->
