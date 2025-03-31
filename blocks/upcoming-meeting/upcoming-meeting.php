<?php

// Upcoming Meeting Block Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/upcoming-meeting/upcoming-meeting.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;


// Fetch Background Color From Block Editor
$background_key = isset($block['backgroundColor']) ? $block['backgroundColor'] : 'wild-sand';

if (array_key_exists($background_key, CUSTOM_COLOR_PALETTE)):
    $background_color =  CUSTOM_COLOR_PALETTE[$background_key];
else:
    $background_color = !empty($block['style']['color']['background']) ? $block['style']['color']['background'] : '#f5f5f5';
endif;

// Fetch ACf Field 
$section_title = get_field('section_title') ?? '';

$year = date('Y');
$select_year_type = get_field('select_year_type');
if($select_year_type == 'Static Year'):
    $year = get_field('enter_year');
endif;
?>

<div class="upcoming-meetings sec-padding overflow-hidden-x-hidden" style="background-color: <?php echo $background_color;?>;">
    <div class="title-upm title-calendar">
        <h3 class="fw-bold mb-0"><?php echo $section_title;?></h3>
        <h3 class="red-text mb-0"><?php echo $year;?></h3>
    </div>
    <div class="inner-upm bg_white">
        <?php 
        if(have_rows('meeting_schedule')):
            while(have_rows('meeting_schedule')):
                the_row();
                $agenda = get_sub_field('meeting_agenda');
                $date = get_sub_field('meeting_date');
                $time = get_sub_field('meeting_time');
                ?>
                    <div class="upm-content">
                        <div class="upm-inner">
                            <h5 class="red-text upm-date mb-0">
                                <?php echo esc_html($date);?>
                            </h5>
                            <h5 class="mb-0 grey-text">
                                <?php echo esc_html($agenda);?>
                            </h5>
                            <h5 class="mb-0 red-text cal-hover upm_col_min">
                                + Add to Calendar <img src="<?php echo get_stylesheet_directory_uri().'/blocks/upcoming-meeting/cal-vector.svg';?>" alt="" class="img-fluid">
                            </h5>
                            <h5 class="mb-0 upm_col_max">
                                <?php if(!empty($time)):?>
                                    <span class="grey-text"><?php echo $time;?></span>
                                    <span class="red-text">Onwards</span>
                                <?php else:?>
                                    <span class="red-text">To be Announced</span>
                                <?php endif;?>
                            </h5>
                        </div>
                    </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>

</div>