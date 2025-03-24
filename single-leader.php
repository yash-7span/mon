<?php
/**
 * Template Name: Single Leader Template
 * Template Post Type: leaders
 */
get_header(); 

// Get the current post ID
$post_id = get_the_ID();

// Get the category associated with the current leader post
$categories = get_the_terms($post_id, 'leader-categories');
$category = $categories ? $categories[0] : null;

// Fetch ACF fields of the category
$image = $category ? get_field('featured_image', 'category_' . $category->term_id) : '';
$heading_text = $category ? get_field('heading_text', 'category_' . $category->term_id) : '';
$description_text = $category ? get_field('team_member_details_page_text', 'category_' . $category->term_id) : '';
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const breadcrumb = document.getElementById('dynamic-breadcrumb');
        const sidebarLinks = document.querySelectorAll('.nav-link.team.targetDiv');

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function () {
                const leaderName = this.querySelector('.item-leader p').textContent;
                breadcrumb.textContent = leaderName;
            });
        });
    });
</script>
<div class="about-us main-wrapper">
    <div class="main-hero-banner leadership-main" style="background-image: url('<?php echo esc_url($image); ?>');">
        <div class="hero-title">
            <h5 class="yellow-text mb-4">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb center_bd">
                        <li class="breadcrumb-item">
                            <a href="<?php echo home_url('/about-us'); ?>" class="bd-title yellow-text">about us</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?php echo get_term_link($category); ?>" class="bd-title yellow-text">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        </li>
                        
                        <li class="breadcrumb-item" aria-current="page">
                            <a href="#" class="bd-title yellow-text" id="dynamic-breadcrumb"><?php the_title(); ?></a>
                        </li>
                    </ol>
                </nav>
            </h5>
            <h1 class="mb-3 white-text">
                <?php echo esc_html($heading_text); ?>
            </h1>
            <p class="mb-0 white-text center-disc">
                <?php 
                echo $description_text;
                ?>
            </p>
        </div>
    </div>
</div>


<?php
// Ensure this code is added in a template file like single.php or a custom template for your CPT
$current_post_id = get_the_ID();

// Get the current post categories
$current_categories = wp_get_post_terms($current_post_id, 'leader-categories');

// Get the first category (if available)
if (!empty($current_categories)) {
    $current_category = $current_categories[0];
    $category_id = $current_category->term_id;

    // Fetch related posts from 'leader' CPT in the same category
    $args = [
        'post_type' => 'leader',
        'orderby'   => 'date',
        'order'     => 'ASC',
        'tax_query' => [
            [
                'taxonomy' => 'leader-categories',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ],
        ],
        'posts_per_page' => -1,
    ];
    $leader_posts = new WP_Query($args);
    ?>
    <div class="leader-tabs manage sec-padding container-fluid">
        <div class="row">
            <!-- Sidebar: List of Related Leaders -->
            <div class="col-lg-4 col-md-4">
                <div class="set-flow">
                    <div class="all-leaders nav nav-tabs our__categories">
                        <?php if ($leader_posts->have_posts()) :
                            while ($leader_posts->have_posts()) : $leader_posts->the_post();
                                $post_id = get_the_ID();
                                $post_title = get_the_title();
                                $tab_id = 'leader_' . $post_id;
                                $is_current = ($post_id == $current_post_id) ? 'active' : '';
                                ?>
                                <a href="#<?php echo $tab_id; ?>" class="nav-link team targetDiv <?php echo $is_current; ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $tab_id; ?>" role="tab">
                                    <div class="item-leader">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="15" viewBox="0 0 9 15" fill="none">
                                            <path d="M1 1.5L7 7.5L1 13.5" stroke="#1E1916" stroke-width="1.5" />
                                        </svg>
                                        <p class="mb-0 grey-text"><?php echo $post_title; ?></p>
                                    </div>
                                </a>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </div>

            <!-- Content Area: Leader Details -->
            <div class="col-lg-8 col-md-8">
                <div class="tab-content">
                    <?php if ($leader_posts->have_posts()) :
                        while ($leader_posts->have_posts()) : $leader_posts->the_post();
                            $post_id = get_the_ID();
                            $post_title = get_the_title();
                            $tab_id = 'leader_' . $post_id;
                            $leader_image = get_the_post_thumbnail_url($post_id, 'medium') ?: '';
                            $leader_position = get_field('position', $post_id);
                            $leader_description = get_field('description', $post_id);
                            $is_current = ($post_id == $current_post_id) ? 'active show' : '';
                            ?>
                            <div class="tab-pane <?php echo $is_current; ?>" id="<?php echo $tab_id; ?>" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="leader-img">
                                            <img src="<?php echo $leader_image; ?>" class="img-fluid" alt="<?php echo $post_title; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="leader-role">
                                            <div class="l-name">
                                                <h3 class="mb-2 fw-bold"><?php echo $post_title; ?></h3>
                                                <h5 class="mb-0 grey-text fw-bold"><?php echo $leader_position ?: '(Position Not Available)'; ?></h5>
                                            </div>
                                            <div class="l-content">
                                                <h5 class="mb-0 grey-text"><?php echo $leader_description; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>
