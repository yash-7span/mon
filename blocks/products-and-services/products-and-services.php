<?php
// Product and Services Block Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/products-and-services/product-and-services-accordian.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : 'white';
if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
   $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
else:
  $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#fff';
endif;


// Fetch Acf Field 
$i = 0;
$section_title = get_field('section_title');
$section_heading = get_field('section_heading');
$service_source = get_field('services_source');

$services_data = array(); // Ensure this is always initialized

if ($service_source == "Custom Services") {
    if (have_rows('products_and_services')) {
        while (have_rows('products_and_services')) {
            the_row();
            $title = get_sub_field('title'); 
            $description = get_sub_field('description');
            $link = get_sub_field('link');
            $image = get_sub_field('image'); 

            if (!empty($title)) {
                $services_data[] = array(
                    'title' => $title,
                    'description' => preg_replace('/^<p>(.*?)<\/p>/i', '$1', $description),
                    'link' => $link,
                    'image' => $image
                );
            }
        }
    }
} else {
    $product_services = get_field('select_product_services');

    if (is_array($product_services) && !empty($product_services)) { // Ensure it's an array before looping
        foreach ($product_services as $services) {
            $services_data[] = array(
                'title' => $services->name,
                'description' => $services->description,
                'link' => array(
                    'url' => get_term_link_by_slug_default($services->slug, $services->taxonomy),
                    'title' => get_category_acf_field('button_title', $services->term_id),
                ),
                'image' => array(
                    'url' => get_category_acf_field('featured_image', $services->term_id)['url'],
                    'title' => get_category_acf_field('featured_image', $services->term_id)['title'],
                )
            );
        }
    }
}

?>
<div class="our-offerings sec-padding container-fluid" id="RedirectOurOfferings" style="background-color:<?php echo $background_color;?>;">
    <div class="title-offerings">
        <div class="row align-items-center">
            <?php if(!empty($section_title)):?>
                <div class="col-lg-4">
                    <h5 class="red-text text-uppercase mb-0">
                        <span><?php echo $section_title;?></span>
                    </h5>
                </div>
            <?php endif;?>
            <?php if(!empty($section_heading)):?>
                <div class="col-lg-8">
                    <h2 class="h-title mb-0"><?php echo $section_heading;?></h2>
                </div>
            <?php endif;?>
        </div>
    </div>
    
    <div class="accordion" id="ourOfferings" style="background-color:<?php echo $background_color;?>;">
        <?php 
        if($services_data):
            foreach($services_data as $data): 
                $i++;
                if($i == 1):
                    ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#itemOne" aria-expanded="true">
                                    <div class="col-xl-4 col-lg-3 col-md-1">
                                        <h3 class="mb-0 light-grey"><?php echo '0'.$i;?></h3>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-5">
                                        <h3 class="mb-0"><?php echo $data['title'];?></h3>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="hover-t">
                                        <a href="<?php echo $data['link']['url'];?>" class="animate-text subscribe">
                                            <p class="mb-0 text-uppercase slide-text"><?php echo $data['link']['title'];?></p>

                                            <svg class="move-arrow" xmlns="http://www.w3.org/2000/svg" width="21"
                                                height="12" viewBox="0 0 21 12" fill="none">
                                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                    fill="#74253A" />
                                            </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-collapse collapse show" data-bs-parent="#ourOfferings" id="itemOne">
                                    <div class="accordion-body row">
                                        <div class="column_4 col-p">

                                        </div>
                                        <div class="column_8 col-p order-xs-2">
                                            <div class="custom-flex">
                                                    <div class="products-disc">
                                                        <p class="mb-0 text-uppercase visible-m"><?php echo $data['link']['title'];?></p>
                                                        <h5 class="grey-text"><?php echo $data['description'];?></h5>
                                                        <div class="hover-t custom-move">
                                                            <a href="<?php echo $data['link']['url'];?>" class="animate-text subscribe">
                                                                <p class="mb-0 text-uppercase slide-text"><?php echo $data['link']['title'];?></p>

                                                                <svg class="move-arrow" xmlns="http://www.w3.org/2000/svg"
                                                                        width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                                            fill="#74253A" />
                                                                </svg>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <?php if(!empty($data['image']['url'])):?>
                                                    <div class="img-product">
                                                    <img src="<?php echo $data['image']['url'];?>" class="img-fluid" alt="<?php echo $data['image']['title'];?>" />
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                    <?php
                else:
                ?>
                    <div class="accordion-item">
                        <div class="accordion-header">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#item<?php echo $i;?>"">
                                    <div class="col-xl-4 col-lg-3 col-md-1">
                                        <h3 class="mb-0 light-grey"><?php echo ($i < 10) ? '0' . $i : $i; ?></h3>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-5">
                                        <h3 class="mb-0"><?php echo $data['title'];?></h3>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="hover-t">
                                            <a href="<?php echo $data['link']['url'];?>" class="animate-text subscribe">
                                                    <p class="mb-0 text-uppercase slide-text"><?php echo $data['link']['title'];?></p>
                                                    <svg class="move-arrow" xmlns="http://www.w3.org/2000/svg" width="21"
                                                        height="12" viewBox="0 0 21 12" fill="none">
                                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                            fill="#74253A" />
                                                    </svg>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div class="accordion-collapse collapse" data-bs-parent="#ourOfferings" id="item<?php echo $i;?>"">
                                    <div class="accordion-body row">
                                        <div class="column_4 col-p">

                                        </div>
                                        <div class="column_8 col-p order-xs-2">
                                            <div class="custom-flex">
                                                <div class="products-disc">
                                                    <p class="mb-0 text-uppercase visible-m"><?php echo $data['link']['title'];?></p>

                                                    <h5 class="grey-text"><?php echo $data['description'];?>
                                                    </h5>
                                                    <div class="hover-t custom-move">
                                                        <a href="<?php echo $data['link']['url'];?>" class="animate-text subscribe">
                                                            <p class="mb-0 text-uppercase slide-text"><?php echo $data['link']['title'];?></p>

                                                            <svg class="move-arrow" xmlns="http://www.w3.org/2000/svg"
                                                                    width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                                                        fill="#74253A" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php if(!empty($data['image']['url'])):?>
                                                    <div class="img-product">
                                                    <img src="<?php echo $data['image']['url'];?>" class="img-fluid" alt="<?php echo $data['image']['title'];?>" />
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                <?php 
                endif;
            endforeach;
        endif;?>
    </div>
</div>



<!-- Product and Services Block Code End  -->