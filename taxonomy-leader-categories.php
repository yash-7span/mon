<?php get_header(); ?>

<?php 
    // Get the current category object
    $category = get_queried_object();
    $image = get_field('featured_image', 'category_' . $category->term_id);
    $heading_text = get_field('heading_text', 'category_' . $category->term_id);
    

?>
<div class="about-us main-wrapper">
    <div class="main-hero-banner leadership-main" style="background-image: url('<?php echo $image;?>');">
        <div class="hero-title">
            <h5 class="yellow-text mb-4">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb center_bd">
                        <li class="breadcrumb-item">
                            <a href="<?php echo home_url('/about-us'); ?>" class="bd-title yellow-text">about us</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="#" class="bd-title yellow-text">
                                <?php single_term_title(); ?>
                            </a>
                        </li>
                    </ol>
                </nav>
            </h5>
            <h1 class="mb-3 white-text">
                <?php echo $heading_text; ?>
            </h1>
            <p class="mb-0 white-text center-disc">
                <?php 
                    
                    $description = preg_replace('/^<p>(.*?)<\/p>/i', '$1', term_description());
                    echo wp_kses_post($description);
                ?>
            </p>
        </div>
    </div>
</div>

<div class="all-inspires sec-padding container-fluid">
<div class="row">
    <?php
    // Get the current category ID
    $category = get_queried_object();

    $args = array(
        'post_type' => 'leader',  // Your custom post type
        'orderby'   => 'date',
        'order'     => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'leader-categories',  // Adjust taxonomy if it's a custom taxonomy
                'field'    => 'term_id',
                'terms'    => $category->term_id,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) : 
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-lg-4 col-md-4 col-sm-6 box_width pb-bottom">
                <a href="<?php the_permalink(); ?>" class="tab-open">
                    <div class="inspire-main">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default-leader.png" class="img-fluid" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="inspire-name">
                            <h4 class="mb-1 fw-bold"><?php the_title(); ?></h4>
                            <p class="mb-0 grey-text">
                                <?php echo get_post_meta(get_the_ID(), 'position', true); ?>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile;
        wp_reset_postdata(); 
    else : ?>
        <p class="col-12 text-center">No leaders found in this category.</p>
    <?php endif; ?>
</div>


</div>

<?php get_footer(); ?>
