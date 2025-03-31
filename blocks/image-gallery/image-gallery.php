<?php
// Image Gallery Block Code Start

if (!empty($block['data']['is_preview'])): 
    ?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/image-gallery/image-gallery-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
    <?php
    return;
endif;

// Get Images Gallery
$images = get_field('select_images');
if(!empty($images)){
    $chunks = array_chunk($images, 3);
    ?>
    <div class="company-events container-fluid">
        <div class="row">
            <?php 
                foreach($chunks as $index => $chunk) {
                    if( count($chunk) === 3 ) {
                        // Pattern: 1 landscape + 2 portrait
                        if( $index % 2 === 0 ) {
                            echo '<div class="col-lg-8' . ($index > 0 ? ' grid-p' : '') . '">';
                            echo '<div class="grid-landscap' . ($index === 0 ? ' pt_0' : '') . '">';
                            echo '<img src="' . esc_url($chunk[0]['url']) . '" class="img-fluid" alt="' . esc_attr($chunk[0]['alt']) . '">';
                            echo '</div></div>';
                            
                            echo '<div class="col-lg-4' . ($index > 0 ? ' grid-p' : '') . '">';
                            echo '<div class="row flex-items">';
                            echo '<div class="col-lg-12 col-sm-6"><div class="grid-portrait">';
                            echo '<img src="' . esc_url($chunk[1]['url']) . '" class="img-fluid" alt="' . esc_attr($chunk[1]['alt']) . '">';
                            echo '</div></div>';
                            echo '<div class="col-lg-12 col-sm-6"><div class="grid-portrait">';
                            echo '<img src="' . esc_url($chunk[2]['url']) . '" class="img-fluid" alt="' . esc_attr($chunk[2]['alt']) . '">';
                            echo '</div></div>';
                            echo '</div></div>';
                        } 
                        // Pattern: 2 portrait + 1 landscape
                        else {
                            echo '<div class="col-lg-4 grid-p">';
                            echo '<div class="row flex-items">';
                            echo '<div class="col-lg-12 col-sm-6"><div class="grid-portrait">';
                            echo '<img src="' . esc_url($chunk[0]['url']) . '" class="img-fluid" alt="' . esc_attr($chunk[0]['alt']) . '">';
                            echo '</div></div>';
                            echo '<div class="col-lg-12 col-sm-6"><div class="grid-portrait">';
                            echo '<img src="' . esc_url($chunk[1]['url']) . '" class="img-fluid" alt="' . esc_attr($chunk[1]['alt']) . '">';
                            echo '</div></div>';
                            echo '</div></div>';
                            
                            echo '<div class="col-lg-8 grid-p">';
                            echo '<div class="grid-landscap">';
                            echo '<img src="' . esc_url($chunk[2]['url']) . '" class="img-fluid" alt="' . esc_attr($chunk[2]['alt']) . '">';
                            echo '</div></div>';
                        }
                    }
                }
            ?>
        </div>
    </div>
    <?php 
}
?>
