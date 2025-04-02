<?php
// Yearly Report Block Code Start 

// Check Block Preview is Exists or not
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/yearly-report/yearly-report.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;



?>

<div class="presionatation financial-sec custom-padding overflow-hidden yearly-report">
    <div class="title-presiontation hero-title">
        <h1 class="mb-0">
            <?php echo get_the_title();?>
        </h1>
    </div>
    <div class="financial-tabs nav nav-tabs redirectTabs">
    <?php 
        if(have_rows('report')):
            $flag = true;
            while(have_rows('report')):
                the_row();
                $active = '';
                if($flag == true):
                    $active = 'active';
                endif;
                $year = get_sub_field('enter_year');
                echo '
                    <a class="nav-link '.$active.'" data-bs-toggle="tab" data-bs-target="#Report'.$year.'" type="button" role="tab">
                        <h5 class="mb-0 fw-bold">'.$year.'</h5>
                    </a>
                ';
                $flag = false;
            endwhile;
        endif;    
    ?>
    </div>
        
    <div class="tab-content general-items">
    <?php 
        if(have_rows('report')):
            $flag = true;
            while(have_rows('report')):
                the_row();

                $active = ($flag == true) ? 'show active' : '';
                $year = get_sub_field('enter_year');
                ?>
                    <div class="tab-pane fade <?php echo $active;?>" id="Report<?php echo esc_html($year);?>" role="tabpanel">
                        <div class="row">
                            <?php
                                if(have_rows('attachment')):
                                    $i = 1;
                                    $m = true;
                                    while(have_rows('attachment')):
                                        the_row();
                                        $attachment_title = get_sub_field('attachment_title') ?? '';
                                        $upload_attachment = get_sub_field('upload_attachment') ?? array();
                                        if(!empty($upload_attachment)):
                                            $attachment_url = $upload_attachment['url'];
                                            $attachment_name = $upload_attachment['filename'];
                                            $allow = get_sub_field('allow_download');
                                            $button_type = ($allow == 1) ? 'download' : 'title';
                                        endif;
                                        $class = ($i > 2) ? 'space-top' : '';
                                        $mobile_class = ($m == true) ? '' : 'm-space-top';
                                        ?>
                                            <div class="col-md-6">
                                                <div class="annual-points <?php echo $class.' '.$mobile_class;?>">
                                                    <h5 class="mb-0 fw-bold"><?php echo esc_html($attachment_title);?></h5>
                                                    <?php if(!empty($upload_attachment)):?>
                                                        <div class="item-download">
                                                            <a href="<?php echo $attachment_url;?>" <?php echo $button_type .'='.esc_html($attachment_name);?> class="file-btn">
                                                                <svg class="d-line" width="26" height="8" viewBox="0 0 26 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path id="Vector" d="M1 1.33871V2.66671C1 3.72757 1.47411 4.74499 2.31802 5.49513C3.16193 6.24528 4.30653 6.66671 5.5 6.66671H20.5C21.6935 6.66671 22.8381 6.24528 23.682 5.49513C24.5259 4.74499 25 3.72757 25 2.66671V1.33337" stroke="#555555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        <?php
                                        $m = false;
                                        $i ++;
                                    endwhile;
                                else:
                                    echo '
                                        <div class="row">
                                            <div class="no-data text-center">
                                                    <img src="'.get_stylesheet_directory_uri() . '/blocks/yearly-report/no-data-img.png'.'" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    ';
                                endif;
                            ?>
                        </div>
                    </div>
                <?php
                $flag = false;
            endwhile;
        endif;

        if(have_rows('upload_attachment')):
            echo '<div class="general-items">';
            echo '<div class="row">';
            $i = 1;
            while(have_rows('upload_attachment')):
                the_row();
                $attachment_title = get_sub_field('attachment_title');
                $attachment = get_sub_field('attachment_file');
                $class ='';
            
                $class = ($i > 2) ? 'space-top' : '';

                if(!empty($attachment)):
                    $attachment_name =$attachment['filename'];
                    $attachment_url = $attachment['url'];
                    echo '
                        
                        <div class="col-md-6">
                                <div class="annual-points '.$class.'">
                                    <h5 class="mb-0 fw-bold">'.esc_html($attachment_title).'</h5>

                                    <div class="item-download">
                                        <a href="'.$attachment_url.'" title="'.esc_html($attachment_name).'" class="file-btn">
                                            <svg class="d-line" width="26" height="8" viewBox="0 0 26 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path id="Vector" d="M1 1.33871V2.66671C1 3.72757 1.47411 4.74499 2.31802 5.49513C3.16193 6.24528 4.30653 6.66671 5.5 6.66671H20.5C21.6935 6.66671 22.8381 6.24528 23.682 5.49513C24.5259 4.74499 25 3.72757 25 2.66671V1.33337" stroke="#555555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                        </div>
                    ';
                endif;
                $i++;
            endwhile;
            echo '</div>';
            echo '</div>';
        endif;
    ?>
    </div>
</div>