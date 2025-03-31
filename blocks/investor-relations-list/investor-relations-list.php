<?php

// Investor Relations List Block Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/investor-relations/investor-relations-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$select_investor_relations = get_field('select_investor_relations') ?? '';

if($select_investor_relations):
?>
<div class="relation-layout sec-padding container-fluid add-investor investor-relations-list">
    <div class="row">
        <?php 
        foreach($select_investor_relations as $id):
            $title = get_the_title($id) ?? '';
            $excerpt = get_the_excerpt($id) ?? '';
            $attachment = get_field('upload_attachment', $id) ?? '';
            $image = get_the_post_thumbnail_url($id) ?? '';
            $permalink = !empty($attachment) ?  $attachment : get_the_permalink($id);

            $button_title =  !empty($attachment) ? 'Download' : 'Learn More';
            ?>
            <div class="col-lg-4 col-md-6 invest_mb">
                <div class="investor-main">
                    <?php if(!empty($image)):?>
                        <div class="inner-img">
                            <img src="<?php echo $image;?>" class="img-fluid image-scale" alt="<?php echo esc_html($title);?>">
                        </div>
                    <?php endif;?>

                    <div class="investor-content">
                        <?php if(!empty($title)):?>
                            <h4 class="mb-1 fw-bold"><?php echo esc_html($title);?></h4>
                        <?php endif;?>

                        <?php if(!empty($excerpt)):?>
                            <p class="mb-4 grey-text extra-mr"><?php echo esc_html($excerpt);?></p>
                        <?php endif;?>
                        
                        <a href="<?php echo $permalink;?>" class="join-us-btn red-btn">
                            <div class="join-us"> <?php echo $button_title;?></div>
                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
<?php 
endif;

// Company Activity Block Code End 