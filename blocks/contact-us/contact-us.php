<?php
// GET IN Touch Block Code Start

if (!empty($block['data']['is_preview'])):
?>
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/contact-us/get-in-touch-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
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

$heading = get_field('heading_text');
$head_office = get_field('head_office');
$email_address = get_field('email_address');
$telephone_number = get_field('telephone_number');
?>

<div class="contact-sec sec-padding container-fluid update_section" id="get-in-touch">
     <div class="row">
          <div class="col-12">

               <div class="contact-form bg-grey">
                    <div class="contact-title">
                         <h2 class="mb-0"><?php echo $heading;?></h2>
                    </div>
           
                    <div class="contact-info bg-grey">
                         <div class="item-contact brief_width">
                              <div class="bg-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                        fill="none">
                                        <path d="M6.25 35H33.75M7.5 5H32.5M8.75 5V35M31.25 5V35M15 11.25H17.5M15 16.25H17.5M15 21.25H17.5M22.5 11.25H25M22.5 16.25H25M22.5 21.25H25M15 35V29.375C15 28.34 15.84 27.5 16.875 27.5H23.125C24.16 27.5 25 28.34 25 29.375V35"
                                             stroke="#F7A209" stroke-width="2.5" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                   </svg>
                              </div>
                              <p class="fw-bold black-text mb-1 pt-3">Head Office</p>
                              <p class="black-text mb-0"><?php echo $head_office;?></p>
                         </div>

                         <div class="item-contact">
                              <div class="bg-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                        fill="none">
                                        <path d="M5.75 12.3333C5.75 11.4493 6.10119 10.6014 6.72631 9.97631C7.35143 9.35119 8.19928 9 9.08333 9H32.4167C33.3007 9 34.1486 9.35119 34.7737 9.97631C35.3988 10.6014 35.75 11.4493 35.75 12.3333V29C35.75 29.8841 35.3988 30.7319 34.7737 31.357C34.1486 31.9821 33.3007 32.3333 32.4167 32.3333H9.08333C8.19928 32.3333 7.35143 31.9821 6.72631 31.357C6.10119 30.7319 5.75 29.8841 5.75 29V12.3333Z"
                                             stroke="#F7A209" stroke-width="2.5" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                        <path d="M5.75 12.332L20.75 22.332L35.75 12.332" stroke="#F7A209" stroke-width="2.5"
                                             stroke-linecap="round" stroke-linejoin="round" />
                                   </svg>
                              </div>
                              <p class="fw-bold black-text mb-1 pt-3">Email</p>
                              <p class="black-text mb-0">
                                   <a href="mailto: <?php echo $email_address;?>" class="black-text">
                                        <?php echo $email_address;?></a>
                              </p>
                         </div>

                         <div class="item-contact">
                              <div class="bg-icons">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
                                        fill="none">
                                        <path d="M23.4164 3.66422C26.8135 4.02217 29.9867 5.52889 32.4112 7.93519C34.8357 10.3415 36.3662 13.5032 36.7497 16.8976M23.4164 10.3309C25.0556 10.6541 26.5598 11.4626 27.7337 12.6514C28.9076 13.8402 29.6971 15.3544 29.9997 16.9976M36.6664 28.5309V33.5309C36.6683 33.9951 36.5732 34.4545 36.3872 34.8798C36.2013 35.3051 35.9286 35.6869 35.5865 36.0007C35.2445 36.3145 34.8407 36.5534 34.401 36.7021C33.9613 36.8508 33.4953 36.906 33.0331 36.8642C27.9044 36.307 22.9781 34.5545 18.6497 31.7476C14.6228 29.1887 11.2086 25.7745 8.64973 21.7476C5.83302 17.3996 4.08013 12.4492 3.53306 7.29756C3.49141 6.83667 3.54618 6.37216 3.69389 5.9336C3.8416 5.49504 4.07901 5.09204 4.391 4.75026C4.70299 4.40848 5.08273 4.13541 5.50604 3.94843C5.92935 3.76145 6.38696 3.66466 6.84973 3.66422H11.8497C12.6586 3.65626 13.4427 3.94269 14.056 4.47011C14.6693 4.99754 15.0699 5.72997 15.1831 6.53089C15.3941 8.131 15.7855 9.7021 16.3497 11.2142C16.574 11.8108 16.6225 12.4591 16.4896 13.0824C16.3566 13.7056 16.0478 14.2777 15.5997 14.7309L13.4831 16.8476C15.8557 21.0201 19.3105 24.475 23.4831 26.8476L25.5997 24.7309C26.0529 24.2828 26.625 23.974 27.2483 23.841C27.8715 23.7081 28.5199 23.7567 29.1164 23.9809C30.6285 24.5451 32.1996 24.9365 33.7997 25.1476C34.6093 25.2618 35.3487 25.6696 35.8773 26.2934C36.4058 26.9172 36.6867 27.7135 36.6664 28.5309Z"
                                             stroke="#F7A209" stroke-width="2.5" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                   </svg>
                              </div>
                              <p class="fw-bold black-text mb-1 pt-3">Tel</p>
                              <p class="black-text mb-0">
                                   <a href="tel: <?php echo $telephone_number;?>" class="black-text"><?php echo $telephone_number;?></a>
                              </p>
                         </div>
                    </div>
              </div>
          </div>
     </div>
</div>