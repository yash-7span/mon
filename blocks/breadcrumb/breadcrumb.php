<?php
// BreadCrumb Block Code Start 


// Check Block Preview is Exists or not
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/breadcrumb/breadcrumb.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : 'black';

if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
    $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
else:
    $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#000';
endif;

// Fetch text Color From Block Editor
$text_key = isset($block['textColor']) ? $block['textColor'] : 'sun';

if (array_key_exists($text_key, CUSTOM_COLOR_PALETTE)):
    $text_color =  CUSTOM_COLOR_PALETTE[$text_key];
else:
    $text_color = !empty($block['style']['color']['text']) ? $block['style']['color']['text'] : '#F7A209';
endif;

// Fetch Additional Classname
$classname = $block['className'] ?? '';


$parent_id = wp_get_post_parent_id( get_the_ID() );
?>
<div class="inner-page-link breadcrumb <?php echo $classname;?>" style="background-color: <?php echo $background_color;?>">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo get_the_permalink($parent_id);?>" class="bd-title" style="color: <?php echo $text_color;?>;"><?php echo esc_html(get_the_title($parent_id));?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a href="<?php echo get_the_permalink();?>" class="bd-title" style="color: <?php echo $text_color;?>;"><?php echo get_the_title();?></a>
        </li>
    </ol>
    </nav>
</div>

<!-- Breadcrumb  Block CSS End -->