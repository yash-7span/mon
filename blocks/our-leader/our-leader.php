<!-- CTA Banner Section -->
<?php 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
    ?>
    <img src="<?php echo esc_url(get_template_directory_uri() . '/blocks/our-leader/our-leader.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
    <?php
    return;
endif;