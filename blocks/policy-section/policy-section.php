<?php
// Policy Section Block Code Start 

// Check if the block Preview is exits or not
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/policy-section/policy-section.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$section_title = get_field('section_title');
$section_heading = get_field('section_heading');

?>
<div class="responsibility-sec our-policies" id="RedirectResponsibility">
    <div class="aboutus-title respo-title">
        <?php if(!empty($section_title)):?>
            <h5 class="red-text text-uppercase mb-4"><?php echo $section_title;?></h5>
        <?php endif;?>

        <?php if(!empty($section_heading)):?>
            <h2 class="mb-4 h-title"><?php echo $section_heading;?></h2>
        <?php endif;?>
    </div>

    <div class="swiper responsibility-carousel">
        <div class="swiper-wrapper">
            <?php 
                if(have_rows('policy')):
                    $i = 0;
                    while(have_rows('policy')):
                        the_row();
                        $i++;
                        $title = get_sub_field('title');
                        $full_description= get_sub_field('description');
                        $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $full_description);
                        $image = get_sub_field('featured_image');
                        $image_url = $image['url'];
                        $image_title = $image['title'];
                        
                        ?>
                            <div class="swiper-slide <?php if($i == 1 ){echo 'active';}?>">
                                <div class="wrap-box respo-linear" style="background-image: url(<?php echo $image_url;?>);";>
                                    <div class="title-box">
                                        <h3 class="mb-0 white-text"><?php echo $title;?></h3>
                                        <p class="mb-0 white-text fade-out"><?php echo $description;?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                    endwhile;
                endif;
                ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>


<!-- Policy Section Block End  -->