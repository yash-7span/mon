<?php

// Latest Blog Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/latest-blogs/latest-blogs.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$section_title = get_field('section_title') ?? '';
$latest_blogs = get_field('select_blogs') ?? '';

?>

<div class="latest-post-sec">
    <div class="relation-layout sec-padding container-fluid add-investor">
        <?php if(!empty($section_title)):?>
            <h4 class="fw-bold latest-post"><?php echo $section_title;?></h4>
        <?php endif;?>
        <div class="row">
            <?php 
            foreach($latest_blogs as $id):
                $image = get_the_post_thumbnail_url($id, 'full') ?? '';
                $video = get_field('video_url', $id) ?? '';
                $title = get_the_title($id) ?? '';
                $play_icon = get_stylesheet_directory_uri() . '/blocks/latest-blogs/play-icon.png' ?? '';
                $category = get_the_category($id)[0]->name ?? ''; 
                $post_excerpt = mb_strimwidth(get_the_excerpt($id), 0, '150', '...');
                $author_id = get_post_field('post_author', $id) ?? '';
                $author_name = get_the_author_meta('display_name', $author_id) ?? '';
                $author_image = get_avatar_url($author_id) ?? '';
                $publish_date = get_the_date('F j, Y', $id) ?? '';
                $permalink = get_the_permalink($id) ?? '';
                $button_title =  !empty($video) ? 'Watch Video' : 'Read More';

                ?>
                <div class="col-lg-4 col-md-6 invest_mb">
                    <div class="investor-main">
                        <?php if(!empty($image)):?>
                            <div class="inner-img">
                                <img src="<?php echo $image;?>" class="img-fluid image-scale" alt="<?php echo esc_html($title);?>" />
                                <?php if(!empty($video)):?>
                                    <img src="<?php echo $play_icon;?>" class="img-fluid v-play" alt="<?php echo esc_html($title);?>" />
                                <?php endif;?>
                            </div>
                        <?php endif;?>
                        <div class="investor-content">
                            
                            <?php if(!empty($category)):?>
                                <h6 class="red-text"><?php echo esc_html($category);?></h6>
                            <?php endif;?>
                            
                            <?php if(!empty($title)):?>
                                <h5 class="mb-1 fw-bold"><?php echo esc_html($title);?></h5>
                            <?php endif;?>

                            <?php if(!empty($post_excerpt)):?>
                                <p class="mb-4 grey-text"><?php echo esc_html($post_excerpt);?></p>
                            <?php endif;?>

                            <?php if(!empty($author_id)):?>
                                <div class="latest-profile-info">
                                    <div class="post-profile-name">
                                        <img src="<?php echo $author_image;?>" alt="post-profile-name" />
                                        <h6 class="mb-0 text-capitalize"><?php echo $author_name;?></h6>
                                    </div>
                                    <div class="post-profile-date">
                                        <h6 class="mb-0"><?php echo $publish_date;?></h6>
                                    </div>
                                </div>
                            <?php endif;?>

                            <a href="<?php echo $permalink;?>" class="join-us-btn red-btn">  
                                <div class="join-us"><?php echo esc_html($button_title);?></div>
                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                    viewBox="0 0 21 12" fill="none">
                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                        fill="white" />
                                </svg>
                            </a>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<!-- Latest Blog Code Start End -->