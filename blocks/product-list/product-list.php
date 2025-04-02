<?php
// Product List  Block Start


// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/product-list/product-list.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$selected_services = get_field('product_servcies');
$download_catalogue = '';
$download_catalogue_file = get_field('download_catalogue_file');
$download_catalogue_file_url = '';
if($download_catalogue_file){
    $download_catalogue = get_field('download_catalogue_title');
    $download_catalogue_file_url = $download_catalogue_file['url'];
}
$full_description = get_field('product_page_tagline');
$product_page_tagline = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $full_description);

$post_type = 'product';
$taxonomy_slug = 'product-services'; // Replace with the *slug* of your taxonomy
$taxonomy = get_taxonomy($taxonomy_slug);

if (!$taxonomy){
    echo "Taxonomy not found.";
    return;
}

$terms = array();
if(empty($selected_services)):
    $terms = get_terms( array(
        'taxonomy' => $taxonomy->name, 
        'hide_empty' => false, 
        'orderby' => 'name',   
        'order'   => 'ASC',    
        'number'  => 0, 
    ) );
else:
    $terms = $selected_services;
endif;

$services  = array();
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $services = array();

    foreach ( $terms as $term ) {
        $term_slug = $term->slug; //

        $term = get_term_by( 'slug', $term_slug, $taxonomy_slug );

        if ( $term && ! is_wp_error( $term ) ) {
            if ( $term->count > 0 ) {
                $services[] = array(
                    'name' => esc_html( $term->name ),
                    'slug' => esc_html( $term->slug ),
                );
            }
        } 
    }
    $services = array_reverse($services);

}
$flag = 0;

?>

<div class="our_products">
    <div class="all-inspires products sec-padding container-fluid">
        <div class="financial-tabs nav nav-tabs redirectTabs position-relative">
            <div class="d-inline-flex">
                <?php if($services):?>
                    <?php foreach($services as $service): $flag++;?>
                        <a class="nav-link <?php if($flag== 1){echo 'active';}?>" data-bs-toggle="tab" data-bs-target="#<?php echo $service['slug'];?>" type="button" role="tab">
                            <h5 class="mb-0 fw-bold"><?php echo $service['name'];?></h5>
                        </a>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
            <?php if(!empty($download_catalogue_file_url)):?>
                <div class="annual-points export_pdf">
                    <h5 class="mb-0 fw-bold"><?php echo $download_catalogue;?></h5>
                    <div class="item-download">
                        <a href="<?php echo $download_catalogue_file_url;?>" download="" class="file-btn">
                        <svg class="d-line" width="20" height="8" viewBox="0 0 26 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path id="Vector" d="M1 1.33871V2.66671C1 3.72757 1.47411 4.74499 2.31802 5.49513C3.16193 6.24528 4.30653 6.66671 5.5 6.66671H20.5C21.6935 6.66671 22.8381 6.24528 23.682 5.49513C24.5259 4.74499 25 3.72757 25 2.66671V1.33337" stroke="#555555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endif;?>
        </div>

        
        <div class="tab-content general-items lubricants_product">
        <?php $flag = 0;?>
        <?php foreach($services as $service): $flag++;?>
                <div class="tab-pane fade <?php if($flag == 1){echo 'show active';}?>" id="<?php echo $service['slug'];?>" role="tabpanel">
<<<<<<< HEAD
                    <div class="d-grid">
=======
                    <div class="d-grid product-grid">
>>>>>>> a3a68b55bf93b875fbcaa183dc232bcb031ab380
                    <?php

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product-services', 
                                    'field' => 'slug',      
                                    'terms' => $service['slug'],
                                ),
                            ),
                            'orderby' => 'date',
                            'order'   => 'ASC',
                        );
                        $query = new WP_Query($args);

                        $index = 1;
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $post_id = get_the_ID();
                                $title = get_the_title();
                                $external_link = get_field('external_url', $post_id);
    
                                if (is_array($external_link) && !empty($external_link)) {
                                    $external_link_url = isset($external_link['url']) ? esc_url($external_link['url']) : ''; // Sanitize URL
                                    $external_link_target = isset($external_link['target']) ? esc_attr($external_link['target']) : '_self'; // Default target
                                    $external_link_title = isset($external_link['title']) ? esc_html($external_link['title']) : 'Join Us'; // Default title
                                } else {
                                    $external_link_url = get_the_permalink($post_id); 
                                    $external_link_target = '_self'; 
                                    $external_link_title = 'View Product'; 
                                }

                                $permalink = get_the_permalink($post_id);
                                $performance = get_field('performance', $post_id);
                                $featured_image = get_the_post_thumbnail_url();
                                
                                $product_class = 'h-col pb-bottom';
                                ?>
                                    <div class="product-grid-item <?php echo $product_class;?>">
                                        <a href="<?php echo esc_url($permalink);?>" class="tab-open">
                                            <div class="inspire-main">
                                                <img src="<?php echo esc_url($featured_image);?>" class="img-fluid" alt="<?php echo esc_attr($title);?>">
                                                <div class="inspire-name">
                                                    <h4 class="mb-1 fw-bold"><?php echo esc_html($title) ;?></h4>
                                                    <?php if(!empty($performance)):?>
                                                        <p class="mb-0 grey-text">Performance: <?php echo esc_html($performance) ;?></p>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="product_btn join-us-btn red-btn">
                                            <a href="<?php echo esc_url($external_link_url) ;?>"
                                                target="<?php echo esc_attr($external_link_target) ;?>" class="join-us"><?php echo esc_html($external_link_title) ;?></a>
                                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12"
                                                viewBox="0 0 21 12" fill="none">
                                                <path
                                                    d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                    fill="white" />
                                            </svg>
                                        </div>
                                    </div>
                                <?php
                                $index++;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    </div>
</div>

<div class="policy-sec pro-desk">
    <div class="policy-content justify-content-center">
        <h5 class="mb-0 white-text">
            <?php echo $product_page_tagline;?>
        </h5>
    </div>
</div>

<!-- Product List Block Code End  -->