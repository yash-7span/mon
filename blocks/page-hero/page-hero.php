<?php
// Inner page banner Block Code Start

if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/page-hero/hero-banner-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : 'wild-sand';
if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
   $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
else:
  $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#f5f5f5';
endif;

// Fetch Additional class name form Block Editor
$classname = $block['className'] ?? '';

$parent_id = wp_get_post_parent_id( get_the_ID() );

$page_title = get_the_title();
$heading = get_field('heading');
$description = get_field('description');
$background_image = get_field('background_image');
$hero_button = get_field('hero_button');
if(!empty($hero_button)):
    $button_title = $hero_button['title'] ?? '';
    $button_url = $hero_button['url'] ?? '';
    $button_target = $hero_button['target'] ?? '_self';
endif;

?>
<div class="about-us main-wrapper page-hero">
    <div class="main-hero-banner <?php echo $classname;?> " style="background-image: url('<?php echo $background_image;?>');">
        <div class="hero-title">
            <?php if($parent_id !== 0):?>
                <h5 class="yellow-text mb-4 mx-auto text-upppercase breadcrumb heading_top">
                    <nav aria-label="breadcrumb " class="breadcrumb-nav">
                        <ol class="breadcrumb center_bd">
                            <li class="breadcrumb-item">
                                <a href="<?php echo get_the_permalink($parent_id);?>" class="bd-title yellow-text"><?php echo esc_html(get_the_title($parent_id));?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="<?php echo get_the_permalink();?>" class="bd-title yellow-text"><?php echo get_the_title();?></a>
                            </li>
                        </ol>
                    </nav>
                </h5>
                <?php
                else:
                    echo '<h5 class="yellow-text mb-4 text-uppercase">'.$page_title.'</h5>';
                endif;
                ?>
            <?php
            // Get Heading
            if(isset($heading)){ ?>
                <h1 class="mb-3 white-text text-capitalize"><?php echo $heading;?></h1>
            <?php }?>

            <?php
            // Get Description
            if(isset($description)){ ?>
                <p class="mb-0 white-text center-disc">
                    <?php 
                        $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $description);
                        echo wp_kses_post($description);
                    ?>
                </p>
            <?php }?>

            <?php if(!empty($hero_button)):?>
                <div class="rslocation-btn mb-0 lubricant-btn">
                    <a href="<?php echo $button_url;?>" target="<?php echo $button_target;?>" class="hero_button">
                        <div class="join-us-btn red-btn">
                            <div class="join-us"><?php echo esc_html($button_title);?></div>
                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="black" />
                            </svg>
                        </div>
                    </a>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>