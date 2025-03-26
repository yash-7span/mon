<?php
// Blog Section Block Code Start

// set Preview for Block
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/news-blogs/news-blogs.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

$title = get_field('section_title');
$heading = get_field('section_heading');
$blogs = get_field('select_blogs');
if (is_array($blogs) && !empty($blogs)) {
    $blog_post = array_slice($blogs, 0, 2);
} else {
    $blog_post = [];
}

?>
<div class="blogs-sec sec-padding" id="RedirectBlogs" style="background-color:<?php echo esc_attr($background_color); ?>;">
    <div class="blog-title">
        <?php if(!empty($title)):?>
            <h5 class="red-text text-uppercase mb-1"><?php echo $title;?></h5>
        <?php endif;?>
        <?php if(!empty($heading)):?>
            <h2 class="mb-0 h-title"><?php echo $heading;?></h2>
        <?php endif;?>
    </div>

    <div class="row">
        <?php 
        if($blog_post):
            foreach($blog_post as $data):

                // Fetch Taxonomy List Using Post if and convert it into a string
                $post_id = $data->ID;
                $taxonomy = 'category';
                $terms_data = get_post_taxonomy_terms( $post_id, $taxonomy );
                $taxonomy_string = '';
                if ( ! is_wp_error( $terms_data ) && ! empty( $terms_data ) ) { 
                    foreach ( $terms_data as $term ) :
                        $taxonomy_string .= esc_html( $term->name ) . ' '; 
                    endforeach;
                    $taxonomy_string = trim( $taxonomy_string );
                }

                // Remove html tag from the content
                $text_content = strip_tags( $data-> post_content);
                $text_content = html_entity_decode( $text_content );
                $text_content = trim( $text_content );
                
                ?>
                <div class="col-lg-6">
                    <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" class="img-fluid" alt="" />
                    <div class="news-conent mr-b">
                        <p class="mb-1 mt-4 red-text"><?php echo $taxonomy_string;?></p>
                        <h4 class="mb-3 sec-title fw-bold"><?php echo esc_html($data->post_title); ?></h4>
                        <p class="mb-3 grey-text"><?php echo esc_html($text_content); ?></p>

                        <div class="read-more">
                            <a href="<?php echo get_the_permalink($post_id); ?>" class="text-uppercase read-more-btn cursor_p">Read more</a>
                            <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="#74253A" />
                            </svg>
                        </div>

                    </div>
                </div>
            <?php 
            endforeach;
        endif;?>
    </div>
</div>

<!-- Blog Section Block Code End  -->