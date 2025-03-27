<?php
/**
 * Template Name: Privacy Policy
 * Template Post Type: page
 */

get_header();
?>

<div class="privacy-policy custom-padding">
     <div class="hero-title">
          <div class="container">
               <h1 class="mb-0"><?php echo esc_html(get_the_title());?></h1>
          </div>
     </div>
</div>
<div class="policy-content">
    <div class="container">
        <?php echo get_the_content();?>
    </div>
</div>
<?php
get_footer();
?>