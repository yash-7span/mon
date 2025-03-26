<?php
// Page Footer Block Code Start 

// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/page-footer/page-footer.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
    return;
endif;
?>
<?php
// Fetch Site Logo and tagline 
$site_logo = get_field('footer_logo', 'option');
$site_logo_url = $site_logo['url'];
$site_logo_title = $site_logo['name'];
$site_tagline = get_field('site_tagline');
$footer_tagline = get_field('footer_tagline');

// Fetch Social Media Url 
$social_links = get_field('social_links');
$facebook_url = $social_links['facebook_url'];
$twitter_url = $social_links['twitter_url'];
$instagram_url = $social_links['instagram_url'];
$linkedin_url = $social_links['linkedin_url'];
$thread_url = $social_links['thread_url'];

// Fetch All Footer Menu 
$footer_menu = get_field('footer_menus');

$footer_menu_1 = $footer_menu['footer_menu_1'];
$menu_items1 = wp_get_nav_menu_items($footer_menu_1);
$menu_item1_heading = wp_get_nav_menu_object($footer_menu_1);

$footer_menu_2 = $footer_menu['footer_menu_2'];
$menu_items2 = wp_get_nav_menu_items($footer_menu_2);
$menu_item2_heading = wp_get_nav_menu_object($footer_menu_2);

$footer_menu_3 = $footer_menu['footer_menu_3'];
$menu_items3 = wp_get_nav_menu_items($footer_menu_3);
$menu_item3_heading = wp_get_nav_menu_object($footer_menu_3);

$footer_menu_4 = $footer_menu['footer_menu_4'];
$menu_items4 = wp_get_nav_menu_items($footer_menu_4);
$menu_item4_heading = wp_get_nav_menu_object($footer_menu_4);

// Fetch Social Contact Details 
$social_contact = get_field('social_contact');


$fax_number = '';
$f_number = $social_contact['fax_number'];

// Set Pattern Of Fax Number
$f_number = preg_replace("/[^0-9]/", "", $f_number);
if (!empty($f_number)) {
    $formatted_f_number = substr($f_number, 0, 3) . " (" . substr($f_number, 3, 1) . ") " . substr($f_number, 4, 3) . "-" . substr($f_number, 7, 4);
    $fax_number =  $formatted_f_number;
}

// Fetch Head Office detail from General Settings
$head_office_address = get_field('head_office_address', 'option');
$head_office_address_name = '';
$head_office_address_url = '';
$head_office_address_target = '_blank';

if ($head_office_address) {
    $head_office_address_name = $head_office_address['title'];
    $head_office_address_url = $head_office_address['url'];
    $head_office_address_target = $head_office_address['target'];
}

$head_office_number = get_field('telephone_number', 'option');

//Format the Contact Numbers
$c_number = preg_replace("/[^0-9]/", "", $head_office_number);
if (!empty($c_number)) {
    $formatted_c_number = substr($c_number, 0, 3) . " (" . substr($c_number, 3, 3) . ") " . substr($c_number, 6, 3) . "-" . substr($c_number, 9, 4);
    $contact_number =  $formatted_c_number;
}

$company_email = get_field('head_office_email', 'option');

// Fetch Copy right section setting from option page (General Settings)
$copyright = get_field('copyright', 'option');

$copyright_ptitle = $copyright['copyright_title'];
$copyright_title = preg_replace('/^<p>(.*?)<\/p>/i', '$1', $copyright_ptitle);
$page_links = $copyright['page_link'];
$creater_logo = $copyright['creater_logo'];
$creater_company_name = $copyright['created_by']['title'];
$creater_company_url = $copyright['created_by']['url'];
$creater_company_target= $copyright['created_by']['target'];
?>

<div class="row fd-row">
    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-5 col-mb one">
        <div class="title-of-footer">
            <a href="<?php echo get_site_url();?>">
                <img src="<?php echo $site_logo_url;?>" alt="" class="img-fluid d-inline-block" alt='<?php echo $site_logo_title?>'>
                <p class="text-title d-inline-block ms-2"><?php echo $site_tagline;?></p>
            </a>
        </div>
        <?php if(!empty($footer_tagline)):?>
            <div class="t-footer">
                <p class="text-title"><?php echo $footer_tagline;?></p>
            </div>
        <?php endif;?>
        <div class="social-icons">
            <a href="<?php echo $facebook_url;?>" class="">
                <li class="box-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M11.6895 30.4016H17.8457V18.2601H23.3925L24.002 12.2272H17.8457V9.18051C17.8457 8.7785 18.0079 8.39295 18.2965 8.10869C18.5851 7.82442 18.9766 7.66472 19.3848 7.66472H24.002V1.60156H19.3848C17.3439 1.60156 15.3866 2.40006 13.9434 3.82138C12.5003 5.24271 11.6895 7.17045 11.6895 9.18051V12.2272H8.61142L8.00195 18.2601H11.6895V30.4016Z" fill="#555555" />
                    </svg>
                </li>
            </a>
            <a href="<?php echo $twitter_url;?>" class="">
                <li class="box-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M24.2725 3H28.6831L19.0471 14.0133L30.3831 29H21.5058L14.5538 19.9107L6.59914 29H2.18581L12.4925 17.22L1.61914 3H10.7191L17.0031 11.308L24.2698 3H24.2725ZM22.7245 26.36H25.1685L9.39247 5.50133H6.76981L22.7245 26.36Z" fill="#555555" />
                    </svg>
                </li>
            </a>
            <a href="<?php echo $instagram_url;?>" class="">
                <li class="box-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M10.3993 2.66797H21.5993C25.866 2.66797 29.3327 6.13464 29.3327 10.4013V21.6013C29.3327 23.6523 28.5179 25.6193 27.0676 27.0696C25.6174 28.5199 23.6504 29.3346 21.5993 29.3346H10.3993C6.13268 29.3346 2.66602 25.868 2.66602 21.6013V10.4013C2.66602 8.35029 3.48078 6.38329 4.93106 4.93301C6.38134 3.48273 8.34834 2.66797 10.3993 2.66797ZM10.1327 5.33464C8.85964 5.33464 7.63874 5.84035 6.73857 6.74052C5.8384 7.6407 5.33268 8.8616 5.33268 10.1346V21.868C5.33268 24.5213 7.47935 26.668 10.1327 26.668H21.866C23.1391 26.668 24.36 26.1623 25.2601 25.2621C26.1603 24.3619 26.666 23.141 26.666 21.868V10.1346C26.666 7.4813 24.5193 5.33464 21.866 5.33464H10.1327ZM22.9993 7.33464C23.4414 7.33464 23.8653 7.51023 24.1779 7.82279C24.4904 8.13535 24.666 8.55927 24.666 9.0013C24.666 9.44333 24.4904 9.86725 24.1779 10.1798C23.8653 10.4924 23.4414 10.668 22.9993 10.668C22.5573 10.668 22.1334 10.4924 21.8208 10.1798C21.5083 9.86725 21.3327 9.44333 21.3327 9.0013C21.3327 8.55927 21.5083 8.13535 21.8208 7.82279C22.1334 7.51023 22.5573 7.33464 22.9993 7.33464ZM15.9993 9.33463C17.7675 9.33464 19.4632 10.037 20.7134 11.2873C21.9636 12.5375 22.666 14.2332 22.666 16.0013C22.666 17.7694 21.9636 19.4651 20.7134 20.7153C19.4632 21.9656 17.7675 22.668 15.9993 22.668C14.2312 22.668 12.5355 21.9656 11.2853 20.7153C10.0351 19.4651 9.33268 17.7694 9.33268 16.0013C9.33268 14.2332 10.0351 12.5375 11.2853 11.2873C12.5355 10.037 14.2312 9.33464 15.9993 9.33463ZM15.9993 12.0013C14.9385 12.0013 13.9211 12.4227 13.1709 13.1729C12.4208 13.923 11.9993 14.9404 11.9993 16.0013C11.9993 17.0622 12.4208 18.0796 13.1709 18.8297C13.9211 19.5799 14.9385 20.0013 15.9993 20.0013C17.0602 20.0013 18.0776 19.5799 18.8278 18.8297C19.5779 18.0796 19.9993 17.0622 19.9993 16.0013C19.9993 14.9404 19.5779 13.923 18.8278 13.1729C18.0776 12.4227 17.0602 12.0013 15.9993 12.0013Z" fill="#555555" />
                    </svg>
                </li>
            </a>    
            <a href="<?php echo $linkedin_url;?>" class="">
                <li class="box-icons">
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path d="M9.25716 6.668C9.25681 7.37524 8.97552 8.05338 8.47517 8.55323C7.97482 9.05307 7.29641 9.33369 6.58916 9.33333C5.88192 9.33298 5.20378 9.05169 4.70393 8.55134C4.20409 8.05099 3.92347 7.37258 3.92383 6.66533C3.92418 5.95809 4.20547 5.27995 4.70582 4.78011C5.20617 4.28026 5.88458 3.99965 6.59183 4C7.29907 4.00035 7.97721 4.28164 8.47706 4.78199C8.9769 5.28234 9.25752 5.96076 9.25716 6.668ZM9.33716 11.308H4.00383V28.0013H9.33716V11.308ZM17.7638 11.308H12.4572V28.0013H17.7105V19.2413C17.7105 14.3613 24.0705 13.908 24.0705 19.2413V28.0013H29.3372V17.428C29.3372 9.20133 19.9238 9.508 17.7105 13.548L17.7638 11.308Z" fill="#555555" />
                    </svg>
                
                </li>
            </a>
            <a href="<?php echo $thread_url;?>" class="">
                <li class="box-icons">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5668 10.1966C15.4667 10.1512 15.365 10.1074 15.2619 10.0656C15.0825 6.93667 13.2759 5.14536 10.2424 5.12703C10.2287 5.12695 10.215 5.12695 10.2013 5.12695C8.38685 5.12695 6.87783 5.85989 5.94903 7.19362L7.61735 8.27668C8.3112 7.28043 9.40012 7.06805 10.2021 7.06805C10.2113 7.06805 10.2206 7.06805 10.2298 7.06813C11.2286 7.07416 11.9823 7.34899 12.4701 7.88494C12.8251 8.27513 13.0626 8.81432 13.1801 9.49481C12.2946 9.35237 11.3368 9.30858 10.313 9.36413C7.42892 9.52135 5.5748 11.1132 5.69932 13.3251C5.76251 14.4471 6.35315 15.4124 7.36237 16.0429C8.21565 16.576 9.31461 16.8366 10.4568 16.7776C11.9651 16.6994 13.1484 16.1548 13.9739 15.1589C14.6008 14.4027 14.9974 13.4226 15.1724 12.1878C15.8913 12.5983 16.424 13.1386 16.7182 13.788C17.2185 14.8921 17.2477 16.7062 15.6835 18.1853C14.313 19.481 12.6657 20.0415 10.176 20.0588C7.41433 20.0395 5.3257 19.2013 3.96774 17.5676C2.69612 16.0378 2.03893 13.8281 2.01442 11C2.03893 8.17183 2.69612 5.96218 3.96774 4.43239C5.3257 2.79869 7.4143 1.96052 10.176 1.9411C12.9577 1.96067 15.0827 2.80287 16.4927 4.44446C17.184 5.24948 17.7053 6.26184 18.0489 7.44222L20.0039 6.94859C19.5874 5.49567 18.932 4.24367 18.0402 3.20535C16.2326 1.10077 13.589 0.0223607 10.1828 0H10.1692C6.76989 0.022283 4.15589 1.10479 2.39982 3.21742C0.837147 5.0974 0.031076 7.71326 0.003991 10.9923L0.00390625 11L0.003991 11.0077C0.031076 14.2867 0.837147 16.9026 2.39982 18.7826C4.15589 20.8952 6.76989 21.9778 10.1692 22H10.1828C13.2049 21.9802 15.3352 21.2314 17.0901 19.5721C19.386 17.4013 19.3169 14.6803 18.5602 13.0099C18.0173 11.8121 16.9822 10.8391 15.5668 10.1966ZM10.3488 14.8393C9.08475 14.9067 7.77153 14.3698 7.70678 13.2197C7.65879 12.367 8.34803 11.4155 10.4264 11.3021C10.6644 11.2891 10.8979 11.2828 11.1274 11.2828C11.8823 11.2828 12.5885 11.3522 13.2306 11.485C12.9911 14.3155 11.5864 14.7751 10.3488 14.8393Z" fill="#555555" />
                    </svg>
            
                </li>
            </a>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-3 col-lg-5 col-md-5 col-sm-4 col-xs-6 order_lg_2 media-min two">
        <ul class="page-links media-ml asso-mr">
            <li class="mb_5">
                <p class="title-page light-grey"><?php echo $menu_item1_heading->name;?></p>
            </li>
            <?php 
            foreach($menu_items1 as $item):
                $target = (get_field('open_in_new_tab', $item->ID ) == 1) ? '_blank' : '_self'; 
            ?>
                <li><a href="<?php echo $item->url;?>" class="white-text" target="<?php echo $target;?>"><?php echo $item->title;?></a></li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-6 order_lg_3 media-max media_sm three">
        <ul class="page-links">
            <li class="mb_5">
                <p class="title-page light-grey"><?php echo $menu_item2_heading->name;?></p>
            </li>
            <?php 
            foreach($menu_items2 as $item):
                $target = (get_field('open_in_new_tab', $item->ID ) == 1) ? '_blank' : '_self'; 
            ?>
                <li><a href="<?php echo $item->url;?>" class="white-text" target="<?php echo $target;?>"><?php echo $item->title;?></a></li>
            <?php endforeach;?>
        </ul>

        <ul class="page-links other-links">
            <li class="mb_5">
                <p class="title-page light-grey"><?php echo $menu_item3_heading->name;?></p>
            </li>
            <?php 
            foreach($menu_items3 as $item):
                $target = (get_field('open_in_new_tab', $item->ID ) == 1) ? '_blank' : '_self'; 
            ?>
                <li><a href="<?php echo $item->url;?>" class="white-text" target="<?php echo $target;?>"><?php echo $item->title;?></a></li>
            <?php endforeach;?>

        </ul>
    </div>

    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-5 col-sm-4 col-xs-6 order_lg_2 media-min media_sm four">
        <ul class="page-links media-ml">
            <li class="mb_5">
                <p class="title-page light-grey"><?php echo $menu_item4_heading->name;?></p>
            </li>
            <?php 
            foreach($menu_items4 as $item):
                $target = (get_field('open_in_new_tab', $item->ID ) == 1) ? '_blank' : '_self'; 
            ?>
                <li><a href="<?php echo $item->url;?>" class="white-text" target="<?php echo $target;?>"><?php echo $item->title;?></a></li>
            <?php endforeach;?>
        </ul>
    </div>

    <div class="col-xxl-2 col-xl-8 col-lg-7 col-md-7 five">
        <div class="contact-details mr-top desk-ele">
            
            <?php if(!empty($contact_number)):?>
                <div class="c-link">
                    <p class="grey-text mb-4">
                        <a href="tel: +<?php echo $contact_number;?>" class="white-text">+ <?php echo $contact_number;?></a>
                    </p>
                </div>
            <?php endif;?>
            
            <?php if(!empty($fax_number)):?>
                <div class="f-link">
                    <p class="grey-text mb-4">
                        <a href="fax: +<?php echo $fax_number;?>" class="white-text">+ <?php echo $fax_number;?><span class='fd-text ms-2'>(fax)</span></a>
                    </p>
                </div>
            <?php endif;?>

            <?php if(!empty($company_email) && !empty($head_office_address)):?>
                <div class="email-link">
                    <?php if(!empty($company_email)):?>
                        <p class="grey-text mb-4">
                            <!-- <span>Mail:</span> -->
                            <a href="mailto: <?php echo $company_email;?>" class="white-text"><?php echo $company_email;?></a>
                        </p>
                    <?php endif;?>
                    
                    <?php if(!empty($head_office_address_name)):?>
                        <p class="grey-text mb-0">
                            <a href="<?php echo $head_office_address_url;?>" target="<?php echo $head_office_address_target;?>" class="white-text">
                                    <span class=""><?php echo $head_office_address_name;?></span></a>
                        </p>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php if(!empty($copyright)):?>
<div class="row mr-top">
    <div class="col-lg-12">
        <div class="copy_rights border-t">
            <?php if(!empty($copyright_title)):?>
                <p class="fd-text mb-0"><?php echo $copyright_title;?></p>
            <?php endif;?>
            <?php if(!empty($page_links)):?>
                <ul class="page-links fd-flex">
                    <?php
                        foreach ($page_links as $item) {
                            $url = $item["page_link_url"];
                            $title = $item["page_link_title"];
                            echo '<li><a href="' . $url . '" class="fd-text">' . $title . '</a></li>';
                            
                        }
                    ?>
                </ul>
            <?php endif;?>

            <div class="crafted">
                <?php if(!empty($creater_logo)):?>
                    <img src="<?php echo $creater_logo['url'];?>" alt="<?php echo $creater_logo['title'];?>" class="img-fluid">
                <?php endif;?>
                <?php if(!empty($creater_company_name)):?>
                <p class="fd-text mb-0">Crafted by <a href="<?php echo $creater_company_url;?>" class="fd-text" target="<?php echo $creater_company_target;?>"><?php echo $creater_company_name;?></a></p>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php
endif;
?>

<!-- Page Footer Block Code End -->