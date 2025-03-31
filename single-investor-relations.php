<?php

/**
 * Template Name: Single Investor Relations Template
 * Template Post Type: Post
 */
get_header();
$id = get_the_ID();
?>
<div class="inner-page-link bg-black ">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo home_url('/investor-relations');?>" class="bd-title yellow-text">Investor Relations </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo get_the_permalink();?>" class="bd-title yellow-text"><?php echo get_the_title();?></a>
            </li>
        </ol>
    </nav>
</div>
<?php 

$block_post_id = $id; 
$block_post = get_post($block_post_id);
if($block_post){
    echo apply_filters('the_content', $block_post->post_content);
}
?>


<?php
get_footer();
?>