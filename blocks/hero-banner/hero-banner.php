<?php
// Inner page banner Block Code Start

if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/page-banner/page-banner-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

$page_title = get_the_title();
$heading = get_field('heading');
$description = get_field('description');
$background_image = get_field('background_image');

?>
<div class="about-us main-wrapper">
    <div class="main-hero-banner" style="background-image: url('<?php echo $background_image;?>');">
        <div class="hero-title">
            <h5 class="yellow-text mb-4"><?php echo $page_title;?></h5>
            <?php
            // Get Heading
            if(isset($heading)){ ?>
                <h1 class="mb-3 white-text"><?php echo $heading;?></h1>
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
        </div>
    </div>
</div>