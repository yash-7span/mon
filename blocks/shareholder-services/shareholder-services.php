<?php
// Share Holder Services Block (Single Detail page) Code Start
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/shareholder-services/shareholder-services.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;

$shareholder_description = get_field('shareholder_description');
$notice = get_field('notice_title');
$notice_link = get_field('notice_link');
if($notice_link):
    $notice_url = $notice_link['url'];
    $notice_title = $notice_link['title'];
    $notice_target = $notice_link['target'] ?? '_self';
endif;
?>
<div class="shareholders-sec custom-padding">
    <div class="hero-title">
        <h1 class="mb-4"><?php echo esc_html(get_the_title());?></h1>
        <h5 class="mb-0"><?php echo $shareholder_description;?></h5>
    </div>
</div>
<div class="service-details bg-grey container-fluid shareholder_services">
    <?php

        if (have_rows('shareholder_contacts')):
            $i = 1;
            while (have_rows('shareholder_contacts')):
                $class ='';
                if($i%2 != 0):
                    echo '<div class="row border_bottom">';
                    $class ='border-block';
                endif;
                the_row();
                $shareholder_contact_title = get_sub_field('title');
                $email_label = get_sub_field('email_label');
                $email_value = get_sub_field('email_value');
                $tel_label = get_sub_field('telphone_label');
                $tel_value = get_sub_field('telephone_value');
                $labelandvalue = get_sub_field();
                
                ?>
                
                <div class="col-md-6">
                    <div class="inner-details <?php echo $class;?>">
                        <h4 class="mb-3">
                            <?php echo esc_html($shareholder_contact_title);?>
                        </h4>
                        <div class="inner-desc">
                            <?php 
                                if(have_rows('label_and_values')):
                                    while(have_rows('label_and_values')):
                                        the_row();
                                        $label = get_sub_field('label');
                                        $value = get_sub_field('value');
                                        echo' 
                                        <h5 class="grey-text mb-0">
                                            <span class="black-text"> ' .esc_html($label). '</span> ' .esc_html($value). '
                                        </h5>
                                        ';
                                    
                                    endwhile;
                                endif;
                                
                                if(!empty($email_value)):
                                    echo '<h5>';
                                    if(!empty($tel_value)):
                                        echo '<span class="black-text">'.esc_html($tel_label).' </span><a href="tel: 01-2799" class="grey-text">'.substr($tel_value, 0, 2) . '-' . substr($tel_value, 2).', </a>';
                                    endif;
                                    if(!empty($email_value)):
                                        echo '<span class="black-text">'.esc_html($email_label).'</span><a href="mailto: '.$email_value.'" class="grey-text">'.$email_value.'</a>';
                                    endif;
                                    echo '</h5>';
                                endif;  
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            if($i%2 == 0):
                echo '</div>';
            endif;
            $i++;
        endwhile;
    endif;
    ?>
</div>
<div class="policy-sec">
    <div class="policy-content">
        <h5 class="mb-0 grey-text"><?php echo esc_html($notice);?></h5>
        <?php if($notice_link):?>
            <div class="click-here-btn">
                <h5 class="mb-0 black-text">
                    <a href="<?php echo $notice_url;?>" class="text-uppercase" target="<?php echo $notice_target;?>"><?php echo esc_html($notice_title);?></a>
                </h5>
            </div>
        <?php endif;?>
    </div>
</div>