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

?>