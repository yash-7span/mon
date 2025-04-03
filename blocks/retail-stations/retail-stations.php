<?php
// Reatil Stations Block code Start
// Check if it's in preview mode
if (!empty($block['data']['is_preview'])):
?>
     <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/blocks/retail-stations/retail-station-img.png'); ?>" alt="Preview" style="width: 100%; height: auto;">
<?php
     return;
endif;

// Fetch Additional Class Name form Block Editor
$className = $block['className'] ?? '';

?>

<div class="retail-st-tabs <?php echo $className;?>">

    <div class="financial-tabs nav nav-tabs redirectTabs">
        <div class="main_st_tab">
            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#rsAll" type="button" role="tab">
                <h5 class="mb-0 fw-bold">All</h5>
            </a>
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#rsNorth" type="button" role="tab">
                <h5 class="mb-0 fw-bold">North</h5>
            </a>
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#rsEast" type="button" role="tab">
                <h5 class="mb-0 fw-bold">East</h5>
            </a>
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#rsWest" type="button" role="tab">
                <h5 class="mb-0 fw-bold">West</h5>
            </a>
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#rsSouth" type="button" role="tab">
                <h5 class="mb-0 fw-bold">South</h5>
            </a>
        </div>
        <div class="retail-dropdown">
            <div class="btn-group">
            <select class="searching-dropdown btn-location dropdown-toggle loc_text text-white demoClass">
                <option selected class="text-white" value="1">All States</option>
                <?php 
                if (have_rows('retail_stations_information')):
                    $state_field = get_sub_field_object('select_states');
                endif;
                // Output unique states as dropdown options
                if (!empty($state_field)) {
                    $i = 2; // Start value for dynamic options
                    foreach ($state_field['choices'] as $key => $label): ?>
                        <option value="<?php echo esc_attr($i); ?>"><?php echo esc_html($label); ?></option>
                        <?php $i++; // Increment option value ?>
                    <?php endforeach;
                }
                ?>
            </select>

            </div>
        </div>
    </div>

    <div class="tab-content general-items">

        <!-- All Direction Section  -->
        <div class="tab-pane fade show active" id="rsAll" role="tabpanel">
            <div class="accordion" id="RetailStation">
                <?php 
                    if (have_rows('retail_stations_information')):
                        $count = 1; // Initialize counter
                        while (have_rows('retail_stations_information')):
                            the_row();
                            
                            $selected_direction = get_sub_field('select_direction');
                            $selected_states = get_sub_field('select_states');
                            $station_name = get_sub_field('station_name');
                            $station_address = get_sub_field('station_address');
                            $direction_link = get_sub_field('direction_link');
                            // echo '<pre>';print_r($direction_link);
                            // Station Timing ACF Field
                            $station_weekdays_starting_time = get_sub_field('station_weekdays_starting_time');
                            $station_weekdays_closing_time = get_sub_field('station_weekdays_closing_time');
                            $station_weekend_starting_time = get_sub_field('station_weekend_starting_time');
                            $station_weekend_closing_time = get_sub_field('station_weekend_closing_time');

                            $quick_mart_available = get_sub_field('quick_mart_available');
                            if(!empty($quick_mart_available)):
                                $quick_mart_weekdays_start_timing = get_sub_field('quick_mart_weekdays_start_timing');
                                $quick_mart_weekdays_end_timing = get_sub_field('quick_mart_weekdays_end_timing');
                                $quick_mart_weekend_start_timing = get_sub_field('quick_mart_weekend_start_timing');
                                $quick_mart_weekend_end_timing = get_sub_field('quick_mart_weekend_end_timing');
                            endif;
                            $pt_0 = ($count ===1) ? ' pt-0' : '';
                            ?>
                            <div class="accordion-item">
                                <div class="accordion-header<?php echo $pt_0;?>">
                                    <div class="accordion-button collapsed <?php echo $pt_0;?>" type="button" data-bs-toggle="collapse" data-bs-target="#location_<?php echo $count;?>" aria-expanded="true">
                                        <div class="row width_rt">
                                            <div class="col-md-1">
                                                <div class="loc-number">
                                                    <h3 class="mb-0 light-grey">
                                                        <?php
                                                            $formatted_count = str_pad($count, 3, '0', STR_PAD_LEFT);
                                                            echo $formatted_count;// Output the formatted count
                                                           
                                                        ?>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="loc-content">
                                                    <div class="loc-title">
                                                        <h4 class="loc-name"><?php echo $station_name;?></h4>
                                                        <span class="red-text loc-side text-capitalize"><?php echo $selected_direction;?></span>
                                                    </div>
                                                    <h5 class="mb-0 grey-text"><?php echo $station_address;?></h5>
                                                </div>

                                            </div>
                                        </div>
                                        <?php if(!empty($quick_mart_available)):?>
                                            <div class="quickmart_icon">
                                                <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                </svg>
                                            </div>
                                        <?php endif;?>

                                        <div class="arrow">
                                            <div class="arrow-line left"></div>
                                            <div class="arrow-line right"></div>
                                        </div>
                                    </div>
                                    <div class="accordion-collapse collapse" data-bs-parent="#RetailStation" id="location_<?php echo $count;?>">
                                        <div class="accordion-body row">
                                            <div class="col-md-1">
                                            </div>

                                            <div class="col-md-11">
                                                <div class="row rs_inner">
                                                    <?php 
                                                    if (have_rows('available_fuels')): 
                                                        ?>
                                                        <div class="col_rs_2">
                                                            <div class="rs-available">
                                                                <div class="list-produce align-items-baseline">
                                                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M14.166 11.4829C14.0787 10.5924 13.8028 9.73272 13.3579 8.96522L8.98155 2.2377C8.60567 1.65854 7.82974 1.4936 7.24892 1.86982C7.10312 1.96455 6.97812 2.08987 6.88198 2.2377L2.50297 8.96522C0.986028 11.5951 1.5767 14.9338 3.90537 16.8844C4.93597 17.7447 6.19961 18.2516 7.52098 18.3346" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M10 15.4167L13.0556 18.3333L19.1667 12.5" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>

                                                                    <h5 class="mb-0">Available Fuels</h5>
                                                                </div>

                                                                <div class="available-price">
                                                                    <div class="available-item">
                                                                        <?php
                                                                        // Loop through the available_fuels repeater field
                                                                        if (have_rows('available_fuels')): 
                                                                            // Initialize counter for looping
                                                                            $counter = 0;
                                                                            while (have_rows('available_fuels')): the_row();
                                                                                $fuels_name = get_sub_field('fuels_name'); // Get the fuel name
                                                                                $fuels_price = get_sub_field('fuels_price'); // Get the fuel price
                                                                                
                                                                                if (!empty($fuels_name) && !empty($fuels_price)):
                                                                                    // Output each fuel name
                                                                                    echo '<p>' . esc_html($fuels_name) . '</p>';
                                                                                    $counter++; // Increment counter for each item
                                                                                endif;
                                                                            endwhile;
                                                                        endif;
                                                                        ?>
                                                                    </div>

                                                                    <div class="pricing-label">
                                                                        <?php
                                                                        // Loop through again to get the prices
                                                                        if (have_rows('available_fuels')): 
                                                                            $counter = 0;
                                                                            while (have_rows('available_fuels')): the_row();
                                                                                $fuels_name = get_sub_field('fuels_name');
                                                                                $fuels_price = get_sub_field('fuels_price');

                                                                                if (!empty($fuels_price)): 
                                                                                    // Output each fuel price, ensure it's in the red text class
                                                                                    echo '<p class="red-text">' . '₦' . number_format($fuels_price, 2) . '</p>';
                                                                                    $counter++; // Increment counter for each item
                                                                                endif;
                                                                            endwhile;
                                                                        endif;
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php 
                                                    endif;?>
                                                    <div class="col_rs_5 rs_flex">
                                                        <div class="rs-available rs-timing">
                                                            <div class="list-produce align-items-center">
                                                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M11.5 0.75C5.29639 0.75 0.25 5.79639 0.25 12C0.25 18.2036 5.29639 23.25 11.5 23.25C17.7036 23.25 22.75 18.2036 22.75 12C22.75 5.79639 17.7036 0.75 11.5 0.75ZM11.5 2.625C16.6892 2.625 20.875 6.81079 20.875 12C20.875 17.1892 16.6892 21.375 11.5 21.375C6.31079 21.375 2.125 17.1892 2.125 12C2.125 6.81079 6.31079 2.625 11.5 2.625ZM10.5625 4.5V12.9375H17.125V11.0625H12.4375V4.5H10.5625Z" fill="#74253A" />
                                                                </svg>

                                                                <h5 class="mb-0">Station Timing</h5>
                                                            </div>
                                                            <div class="available-item">
                                                                <p>Weekdays</p>
                                                                <p class="mb-0">Weekends</p>
                                                            </div>
                                                        </div>
                                                        <div class="open-timing">
                                                            <h5 class="mb-0 grey-text">Open</h5>
                                                            <div class="available-item">
                                                                <p><?php echo esc_html($station_weekdays_starting_time) .' to '. esc_html($station_weekdays_closing_time);?></p>
                                                                <p class="mb-0"><?php echo esc_html($station_weekend_starting_time) .' to '. esc_html($station_weekend_closing_time);?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if(!empty($quick_mart_available)):?>
                                                        <div class="col_rs_5 rs_flex">
                                                            <div class="rs-available rs-timing">
                                                                <div class="list-produce align-items-center">
                                                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                                    </svg>


                                                                    <h5 class="mb-0">Quick Mart</h5>
                                                                </div>
                                                                <div class="available-item">
                                                                    <p>Weekdays</p>
                                                                    <p class="mb-0">Weekends</p>
                                                                </div>
                                                            </div>
                                                            <div class="open-timing">
                                                                <h5 class="mb-0 grey-text">Open</h5>
                                                                <div class="available-item">
                                                                    <p><?php echo esc_html($quick_mart_weekdays_start_timing) .' to '. esc_html($quick_mart_weekdays_end_timing);?></p>
                                                                    <p class="mb-0"><?php echo esc_html($quick_mart_weekend_start_timing) .' to '. esc_html($quick_mart_weekend_end_timing);?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif;?>

                                                    <?php 
                                                        if($direction_link['title'] != ''){ ?>
                                                            <div class="direction-btn">
                                                                <a href="<?php echo $direction_link['url']; ?>" class="join-us-btn red-btn">
                                                                    <div class="join-us"><?php echo $direction_link['title']; ?></div>
                                                                    <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                            <?php  
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        $count++; // Increment counter
                        endwhile; 
                    else:
                        ?>
                            <div class="accordion-item">
                                <div class="no-data text-center">
                                    <img src="<?php echo get_stylesheet_directory_uri().'/blocks/retail-stations/No-Retail-Station.png';?>" class="img-fluid" alt="" />
                                </div>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
        
        <!-- North Section -->
        <div class="tab-pane fade" id="rsNorth" role="tabpanel">
            <div class="accordion" id="RetailStation">
                <?php 
                    $count = 0; // Initialize counter
                    if (have_rows('retail_stations_information')):
                        while (have_rows('retail_stations_information')):
                            the_row();
                            
                            $selected_direction = get_sub_field('select_direction');
                            $selected_states = get_sub_field('select_states');
                            $station_name = get_sub_field('station_name');
                            $station_address = get_sub_field('station_address');
                            $direction_link = get_sub_field('direction_link');

                            // Station Timing ACF Field
                            $station_weekdays_starting_time = get_sub_field('station_weekdays_starting_time');
                            $station_weekdays_closing_time = get_sub_field('station_weekdays_closing_time');
                            $station_weekend_starting_time = get_sub_field('station_weekend_starting_time');
                            $station_weekend_closing_time = get_sub_field('station_weekend_closing_time');

                            $quick_mart_available = get_sub_field('quick_mart_available');
                            if(!empty($quick_mart_available)):
                                $quick_mart_weekdays_start_timing = get_sub_field('quick_mart_weekdays_start_timing');
                                $quick_mart_weekdays_end_timing = get_sub_field('quick_mart_weekdays_end_timing');
                                $quick_mart_weekend_start_timing = get_sub_field('quick_mart_weekend_start_timing');
                                $quick_mart_weekend_end_timing = get_sub_field('quick_mart_weekend_end_timing');
                            endif;
                            $pt_0 = ($count === 0) ? ' pt-0' : '';
                            if(strtolower($selected_direction) == 'north'):
                                $count++;
                                ?>
                                <div class="accordion-item">
                                    <div class="accordion-header<?php echo $pt_0;?>">
                                        <div class="accordion-button collapsed <?php echo $pt_0;?>" type="button" data-bs-toggle="collapse" data-bs-target="#north_<?php echo $count;?>" aria-expanded="true">
                                            <div class="row width_rt">
                                                <div class="col-md-1">
                                                    <div class="loc-number">
                                                        <h3 class="mb-0 light-grey">
                                                            <?php
                                                                $formatted_count = str_pad($count, 3, '0', STR_PAD_LEFT);
                                                                echo $formatted_count;// Output the formatted count
                                                            
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="loc-content">
                                                        <div class="loc-title">
                                                            <h4 class="loc-name"><?php echo $station_name;?></h4>
                                                        </div>
                                                        <h5 class="mb-0 grey-text"><?php echo $station_address;?></h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php if(!empty($quick_mart_available)):?>
                                                <div class="quickmart_icon">
                                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                    </svg>
                                                </div>
                                            <?php endif;?>

                                            <div class="arrow">
                                                <div class="arrow-line left"></div>
                                                <div class="arrow-line right"></div>
                                            </div>
                                        </div>
                                        <div class="accordion-collapse collapse" data-bs-parent="#RetailStation" id="north_<?php echo $count;?>">
                                            <div class="accordion-body row">
                                                <div class="col-md-1">
                                                </div>

                                                <div class="col-md-11">
                                                    <div class="row rs_inner">
                                                        <?php 
                                                        if (have_rows('available_fuels')): 
                                                            ?>
                                                            <div class="col_rs_2">
                                                                <div class="rs-available">
                                                                    <div class="list-produce align-items-baseline">
                                                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M14.166 11.4829C14.0787 10.5924 13.8028 9.73272 13.3579 8.96522L8.98155 2.2377C8.60567 1.65854 7.82974 1.4936 7.24892 1.86982C7.10312 1.96455 6.97812 2.08987 6.88198 2.2377L2.50297 8.96522C0.986028 11.5951 1.5767 14.9338 3.90537 16.8844C4.93597 17.7447 6.19961 18.2516 7.52098 18.3346" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M10 15.4167L13.0556 18.3333L19.1667 12.5" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>

                                                                        <h5 class="mb-0">Available Fuels</h5>
                                                                    </div>

                                                                    <div class="available-price">
                                                                        <div class="available-item">
                                                                            <?php
                                                                            // Loop through the available_fuels repeater field
                                                                            if (have_rows('available_fuels')): 
                                                                                // Initialize counter for looping
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name'); // Get the fuel name
                                                                                    $fuels_price = get_sub_field('fuels_price'); // Get the fuel price
                                                                                    
                                                                                    if (!empty($fuels_name) && !empty($fuels_price)):
                                                                                        // Output each fuel name
                                                                                        echo '<p>' . esc_html($fuels_name) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>

                                                                        <div class="pricing-label">
                                                                            <?php
                                                                            // Loop through again to get the prices
                                                                            if (have_rows('available_fuels')): 
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name');
                                                                                    $fuels_price = get_sub_field('fuels_price');

                                                                                    if (!empty($fuels_price)): 
                                                                                        // Output each fuel price, ensure it's in the red text class
                                                                                        echo '<p class="red-text">' . '₦' . number_format($fuels_price, 2) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <?php 
                                                        endif;?>
                                                        <div class="col_rs_5 rs_flex">
                                                            <div class="rs-available rs-timing">
                                                                <div class="list-produce align-items-center">
                                                                    <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.5 0.75C5.29639 0.75 0.25 5.79639 0.25 12C0.25 18.2036 5.29639 23.25 11.5 23.25C17.7036 23.25 22.75 18.2036 22.75 12C22.75 5.79639 17.7036 0.75 11.5 0.75ZM11.5 2.625C16.6892 2.625 20.875 6.81079 20.875 12C20.875 17.1892 16.6892 21.375 11.5 21.375C6.31079 21.375 2.125 17.1892 2.125 12C2.125 6.81079 6.31079 2.625 11.5 2.625ZM10.5625 4.5V12.9375H17.125V11.0625H12.4375V4.5H10.5625Z" fill="#74253A" />
                                                                    </svg>

                                                                    <h5 class="mb-0">Station Timing</h5>
                                                                </div>
                                                                <div class="available-item">
                                                                    <p>Weekdays</p>
                                                                    <p class="mb-0">Weekends</p>
                                                                </div>
                                                            </div>
                                                            <div class="open-timing">
                                                                <h5 class="mb-0 grey-text">Open</h5>
                                                                <div class="available-item">
                                                                    <p><?php echo esc_html($station_weekdays_starting_time) .' to '. esc_html($station_weekdays_closing_time);?></p>
                                                                    <p class="mb-0"><?php echo esc_html($station_weekend_starting_time) .' to '. esc_html($station_weekend_closing_time);?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if(!empty($quick_mart_available)):?>
                                                            <div class="col_rs_5 rs_flex">
                                                                <div class="rs-available rs-timing">
                                                                    <div class="list-produce align-items-center">
                                                                        <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                                        </svg>


                                                                        <h5 class="mb-0">Quick Mart</h5>
                                                                    </div>
                                                                    <div class="available-item">
                                                                        <p>Weekdays</p>
                                                                        <p class="mb-0">Weekends</p>
                                                                    </div>
                                                                </div>
                                                                <div class="open-timing">
                                                                    <h5 class="mb-0 grey-text">Open</h5>
                                                                    <div class="available-item">
                                                                        <p><?php echo esc_html($quick_mart_weekdays_start_timing) .' to '. esc_html($quick_mart_weekdays_end_timing);?></p>
                                                                        <p class="mb-0"><?php echo esc_html($quick_mart_weekend_start_timing) .' to '. esc_html($quick_mart_weekend_end_timing);?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <div class="direction-btn">
                                                            <a href="service.html#retailNetwork" class="join-us-btn red-btn">
                                                                <div class="join-us">Get Directions</div>
                                                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                                </svg>

                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endwhile; 
                    endif;
                    if($count === 0):
                        ?>
                            <div class="accordion-item">
                                <div class="no-data text-center">
                                    <img src="<?php echo get_stylesheet_directory_uri().'/blocks/retail-stations/No-Retail-Station.png';?>" class="img-fluid" alt="" />
                                </div>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
        
        <!-- East Section  -->
         <div class="tab-pane fade" id="rsEast" role="tabpanel">
            <div class="accordion" id="RetailStation">
                <?php 
                    $count = 0; // Initialize counter
                    if (have_rows('retail_stations_information')):
                        while (have_rows('retail_stations_information')):
                            the_row();
                            
                            $selected_direction = get_sub_field('select_direction');
                            $selected_states = get_sub_field('select_states');
                            $station_name = get_sub_field('station_name');
                            $station_address = get_sub_field('station_address');
                            $direction_link = get_sub_field('direction_link');

                            // Station Timing ACF Field
                            $station_weekdays_starting_time = get_sub_field('station_weekdays_starting_time');
                            $station_weekdays_closing_time = get_sub_field('station_weekdays_closing_time');
                            $station_weekend_starting_time = get_sub_field('station_weekend_starting_time');
                            $station_weekend_closing_time = get_sub_field('station_weekend_closing_time');

                            $quick_mart_available = get_sub_field('quick_mart_available');
                            if(!empty($quick_mart_available)):
                                $quick_mart_weekdays_start_timing = get_sub_field('quick_mart_weekdays_start_timing');
                                $quick_mart_weekdays_end_timing = get_sub_field('quick_mart_weekdays_end_timing');
                                $quick_mart_weekend_start_timing = get_sub_field('quick_mart_weekend_start_timing');
                                $quick_mart_weekend_end_timing = get_sub_field('quick_mart_weekend_end_timing');
                            endif;
                            $pt_0 = ($count ===0) ? ' pt-0' : '';
                            if(strtolower($selected_direction) == 'east'):
                                $count++;
                                ?>
                                <div class="accordion-item">
                                    <div class="accordion-header<?php echo $pt_0;?>">
                                        <div class="accordion-button collapsed <?php echo $pt_0;?>" type="button" data-bs-toggle="collapse" data-bs-target="#east_<?php echo $count;?>" aria-expanded="true">
                                            <div class="row width_rt">
                                                <div class="col-md-1">
                                                    <div class="loc-number">
                                                        <h3 class="mb-0 light-grey">
                                                            <?php
                                                                $formatted_count = str_pad($count, 3, '0', STR_PAD_LEFT);
                                                                echo $formatted_count;// Output the formatted count
                                                            
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="loc-content">
                                                        <div class="loc-title">
                                                            <h4 class="loc-name"><?php echo $station_name;?></h4>
                                                        </div>
                                                        <h5 class="mb-0 grey-text"><?php echo $station_address;?></h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php if(!empty($quick_mart_available)):?>
                                                <div class="quickmart_icon">
                                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                    </svg>
                                                </div>
                                            <?php endif;?>

                                            <div class="arrow">
                                                <div class="arrow-line left"></div>
                                                <div class="arrow-line right"></div>
                                            </div>
                                        </div>
                                        <div class="accordion-collapse collapse" data-bs-parent="#RetailStation" id="east_<?php echo $count;?>">
                                            <div class="accordion-body row">
                                                <div class="col-md-1">
                                                </div>

                                                <div class="col-md-11">
                                                    <div class="row rs_inner">
                                                        <?php 
                                                        if (have_rows('available_fuels')): 
                                                            ?>
                                                            <div class="col_rs_2">
                                                                <div class="rs-available">
                                                                    <div class="list-produce align-items-baseline">
                                                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M14.166 11.4829C14.0787 10.5924 13.8028 9.73272 13.3579 8.96522L8.98155 2.2377C8.60567 1.65854 7.82974 1.4936 7.24892 1.86982C7.10312 1.96455 6.97812 2.08987 6.88198 2.2377L2.50297 8.96522C0.986028 11.5951 1.5767 14.9338 3.90537 16.8844C4.93597 17.7447 6.19961 18.2516 7.52098 18.3346" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M10 15.4167L13.0556 18.3333L19.1667 12.5" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>

                                                                        <h5 class="mb-0">Available Fuels</h5>
                                                                    </div>

                                                                    <div class="available-price">
                                                                        <div class="available-item">
                                                                            <?php
                                                                            // Loop through the available_fuels repeater field
                                                                            if (have_rows('available_fuels')): 
                                                                                // Initialize counter for looping
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name'); // Get the fuel name
                                                                                    $fuels_price = get_sub_field('fuels_price'); // Get the fuel price
                                                                                    
                                                                                    if (!empty($fuels_name) && !empty($fuels_price)):
                                                                                        // Output each fuel name
                                                                                        echo '<p>' . esc_html($fuels_name) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>

                                                                        <div class="pricing-label">
                                                                            <?php
                                                                            // Loop through again to get the prices
                                                                            if (have_rows('available_fuels')): 
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name');
                                                                                    $fuels_price = get_sub_field('fuels_price');

                                                                                    if (!empty($fuels_price)): 
                                                                                        // Output each fuel price, ensure it's in the red text class
                                                                                        echo '<p class="red-text">' . '₦' . number_format($fuels_price, 2) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <?php 
                                                        endif;?>
                                                        <div class="col_rs_5 rs_flex">
                                                            <div class="rs-available rs-timing">
                                                                <div class="list-produce align-items-center">
                                                                    <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.5 0.75C5.29639 0.75 0.25 5.79639 0.25 12C0.25 18.2036 5.29639 23.25 11.5 23.25C17.7036 23.25 22.75 18.2036 22.75 12C22.75 5.79639 17.7036 0.75 11.5 0.75ZM11.5 2.625C16.6892 2.625 20.875 6.81079 20.875 12C20.875 17.1892 16.6892 21.375 11.5 21.375C6.31079 21.375 2.125 17.1892 2.125 12C2.125 6.81079 6.31079 2.625 11.5 2.625ZM10.5625 4.5V12.9375H17.125V11.0625H12.4375V4.5H10.5625Z" fill="#74253A" />
                                                                    </svg>

                                                                    <h5 class="mb-0">Station Timing</h5>
                                                                </div>
                                                                <div class="available-item">
                                                                    <p>Weekdays</p>
                                                                    <p class="mb-0">Weekends</p>
                                                                </div>
                                                            </div>
                                                            <div class="open-timing">
                                                                <h5 class="mb-0 grey-text">Open</h5>
                                                                <div class="available-item">
                                                                    <p><?php echo esc_html($station_weekdays_starting_time) .' to '. esc_html($station_weekdays_closing_time);?></p>
                                                                    <p class="mb-0"><?php echo esc_html($station_weekend_starting_time) .' to '. esc_html($station_weekend_closing_time);?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if(!empty($quick_mart_available)):?>
                                                            <div class="col_rs_5 rs_flex">
                                                                <div class="rs-available rs-timing">
                                                                    <div class="list-produce align-items-center">
                                                                        <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                                        </svg>


                                                                        <h5 class="mb-0">Quick Mart</h5>
                                                                    </div>
                                                                    <div class="available-item">
                                                                        <p>Weekdays</p>
                                                                        <p class="mb-0">Weekends</p>
                                                                    </div>
                                                                </div>
                                                                <div class="open-timing">
                                                                    <h5 class="mb-0 grey-text">Open</h5>
                                                                    <div class="available-item">
                                                                        <p><?php echo esc_html($quick_mart_weekdays_start_timing) .' to '. esc_html($quick_mart_weekdays_end_timing);?></p>
                                                                        <p class="mb-0"><?php echo esc_html($quick_mart_weekend_start_timing) .' to '. esc_html($quick_mart_weekend_end_timing);?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <div class="direction-btn">
                                                            <a href="service.html#retailNetwork" class="join-us-btn red-btn">
                                                                <div class="join-us">Get Directions</div>
                                                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                                </svg>

                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                          // Increment counter
                        endwhile; 
                    endif;
                    if($count === 0):
                        ?>
                            <div class="accordion-item">
                                <div class="no-data text-center">
                                    <img src="<?php echo get_stylesheet_directory_uri().'/blocks/retail-stations/No-Retail-Station.png';?>" class="img-fluid" alt="" />
                                </div>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
        
        <!-- West Section  -->
        <div class="tab-pane fade" id="rsWest" role="tabpanel">
            <div class="accordion" id="RetailStation">
                <?php 
                    $count = 0; // Initialize counter
                    if (have_rows('retail_stations_information')):
                        while (have_rows('retail_stations_information')):
                            the_row();
                        
                            $selected_direction = get_sub_field('select_direction');
                            $selected_states = get_sub_field('select_states');
                            $station_name = get_sub_field('station_name');
                            $station_address = get_sub_field('station_address');
                            $direction_link = get_sub_field('direction_link');

                            // Station Timing ACF Field
                            $station_weekdays_starting_time = get_sub_field('station_weekdays_starting_time');
                            $station_weekdays_closing_time = get_sub_field('station_weekdays_closing_time');
                            $station_weekend_starting_time = get_sub_field('station_weekend_starting_time');
                            $station_weekend_closing_time = get_sub_field('station_weekend_closing_time');

                            $quick_mart_available = get_sub_field('quick_mart_available');
                            if(!empty($quick_mart_available)):
                                $quick_mart_weekdays_start_timing = get_sub_field('quick_mart_weekdays_start_timing');
                                $quick_mart_weekdays_end_timing = get_sub_field('quick_mart_weekdays_end_timing');
                                $quick_mart_weekend_start_timing = get_sub_field('quick_mart_weekend_start_timing');
                                $quick_mart_weekend_end_timing = get_sub_field('quick_mart_weekend_end_timing');
                            endif;
                            $pt_0 = ($count ===0) ? ' pt-0' : '';
                            if(strtolower($selected_direction) == 'west'):
                                $count++;
                                ?>
                                <div class="accordion-item">
                                    <div class="accordion-header<?php echo $pt_0;?>">
                                        <div class="accordion-button collapsed <?php echo $pt_0;?>" type="button" data-bs-toggle="collapse" data-bs-target="#west_<?php echo $count;?>" aria-expanded="true">
                                            <div class="row width_rt">
                                                <div class="col-md-1">
                                                    <div class="loc-number">
                                                        <h3 class="mb-0 light-grey">
                                                            <?php
                                                                $formatted_count = str_pad($count, 3, '0', STR_PAD_LEFT);
                                                                echo $formatted_count;// Output the formatted count
                                                            
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="loc-content">
                                                        <div class="loc-title">
                                                            <h4 class="loc-name"><?php echo $station_name;?></h4>
                                                        </div>
                                                        <h5 class="mb-0 grey-text"><?php echo $station_address;?></h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php if(!empty($quick_mart_available)):?>
                                                <div class="quickmart_icon">
                                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                    </svg>
                                                </div>
                                            <?php endif;?>

                                            <div class="arrow">
                                                <div class="arrow-line left"></div>
                                                <div class="arrow-line right"></div>
                                            </div>
                                        </div>
                                        <div class="accordion-collapse collapse" data-bs-parent="#RetailStation" id="west_<?php echo $count;?>">
                                            <div class="accordion-body row">
                                                <div class="col-md-1">
                                                </div>

                                                <div class="col-md-11">
                                                    <div class="row rs_inner">
                                                        <?php 
                                                        if (have_rows('available_fuels')): 
                                                            ?>
                                                            <div class="col_rs_2">
                                                                <div class="rs-available">
                                                                    <div class="list-produce align-items-baseline">
                                                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M14.166 11.4829C14.0787 10.5924 13.8028 9.73272 13.3579 8.96522L8.98155 2.2377C8.60567 1.65854 7.82974 1.4936 7.24892 1.86982C7.10312 1.96455 6.97812 2.08987 6.88198 2.2377L2.50297 8.96522C0.986028 11.5951 1.5767 14.9338 3.90537 16.8844C4.93597 17.7447 6.19961 18.2516 7.52098 18.3346" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M10 15.4167L13.0556 18.3333L19.1667 12.5" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>

                                                                        <h5 class="mb-0">Available Fuels</h5>
                                                                    </div>

                                                                    <div class="available-price">
                                                                        <div class="available-item">
                                                                            <?php
                                                                            // Loop through the available_fuels repeater field
                                                                            if (have_rows('available_fuels')): 
                                                                                // Initialize counter for looping
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name'); // Get the fuel name
                                                                                    $fuels_price = get_sub_field('fuels_price'); // Get the fuel price
                                                                                    
                                                                                    if (!empty($fuels_name) && !empty($fuels_price)):
                                                                                        // Output each fuel name
                                                                                        echo '<p>' . esc_html($fuels_name) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>

                                                                        <div class="pricing-label">
                                                                            <?php
                                                                            // Loop through again to get the prices
                                                                            if (have_rows('available_fuels')): 
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name');
                                                                                    $fuels_price = get_sub_field('fuels_price');

                                                                                    if (!empty($fuels_price)): 
                                                                                        // Output each fuel price, ensure it's in the red text class
                                                                                        echo '<p class="red-text">' . '₦' . number_format($fuels_price, 2) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <?php 
                                                        endif;?>
                                                        <div class="col_rs_5 rs_flex">
                                                            <div class="rs-available rs-timing">
                                                                <div class="list-produce align-items-center">
                                                                    <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.5 0.75C5.29639 0.75 0.25 5.79639 0.25 12C0.25 18.2036 5.29639 23.25 11.5 23.25C17.7036 23.25 22.75 18.2036 22.75 12C22.75 5.79639 17.7036 0.75 11.5 0.75ZM11.5 2.625C16.6892 2.625 20.875 6.81079 20.875 12C20.875 17.1892 16.6892 21.375 11.5 21.375C6.31079 21.375 2.125 17.1892 2.125 12C2.125 6.81079 6.31079 2.625 11.5 2.625ZM10.5625 4.5V12.9375H17.125V11.0625H12.4375V4.5H10.5625Z" fill="#74253A" />
                                                                    </svg>

                                                                    <h5 class="mb-0">Station Timing</h5>
                                                                </div>
                                                                <div class="available-item">
                                                                    <p>Weekdays</p>
                                                                    <p class="mb-0">Weekends</p>
                                                                </div>
                                                            </div>
                                                            <div class="open-timing">
                                                                <h5 class="mb-0 grey-text">Open</h5>
                                                                <div class="available-item">
                                                                    <p><?php echo esc_html($station_weekdays_starting_time) .' to '. esc_html($station_weekdays_closing_time);?></p>
                                                                    <p class="mb-0"><?php echo esc_html($station_weekend_starting_time) .' to '. esc_html($station_weekend_closing_time);?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if(!empty($quick_mart_available)):?>
                                                            <div class="col_rs_5 rs_flex">
                                                                <div class="rs-available rs-timing">
                                                                    <div class="list-produce align-items-center">
                                                                        <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                                        </svg>


                                                                        <h5 class="mb-0">Quick Mart</h5>
                                                                    </div>
                                                                    <div class="available-item">
                                                                        <p>Weekdays</p>
                                                                        <p class="mb-0">Weekends</p>
                                                                    </div>
                                                                </div>
                                                                <div class="open-timing">
                                                                    <h5 class="mb-0 grey-text">Open</h5>
                                                                    <div class="available-item">
                                                                        <p><?php echo esc_html($quick_mart_weekdays_start_timing) .' to '. esc_html($quick_mart_weekdays_end_timing);?></p>
                                                                        <p class="mb-0"><?php echo esc_html($quick_mart_weekend_start_timing) .' to '. esc_html($quick_mart_weekend_end_timing);?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <div class="direction-btn">
                                                            <a href="service.html#retailNetwork" class="join-us-btn red-btn">
                                                                <div class="join-us">Get Directions</div>
                                                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                                </svg>

                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endwhile; 
                    endif;
                    if($count === 0):
                        ?>
                            <div class="accordion-item">
                                <div class="no-data text-center">
                                    <img src="<?php echo get_stylesheet_directory_uri().'/blocks/retail-stations/No-Retail-Station.png';?>" class="img-fluid" alt="" />
                                </div>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
        
        <!-- South Section -->
        <div class="tab-pane fade" id="rsSouth" role="tabpanel">
            <div class="accordion" id="RetailStation">
                <?php 
                    $count = 0; // Initialize counter
                    if (have_rows('retail_stations_information')):
                        while (have_rows('retail_stations_information')):
                            the_row();
                            
                            $selected_direction = get_sub_field('select_direction');
                            $selected_states = get_sub_field('select_states');
                            $station_name = get_sub_field('station_name');
                            $station_address = get_sub_field('station_address');
                            $direction_link = get_sub_field('direction_link');

                            // Station Timing ACF Field
                            $station_weekdays_starting_time = get_sub_field('station_weekdays_starting_time');
                            $station_weekdays_closing_time = get_sub_field('station_weekdays_closing_time');
                            $station_weekend_starting_time = get_sub_field('station_weekend_starting_time');
                            $station_weekend_closing_time = get_sub_field('station_weekend_closing_time');

                            $quick_mart_available = get_sub_field('quick_mart_available');
                            if(!empty($quick_mart_available)):
                                $quick_mart_weekdays_start_timing = get_sub_field('quick_mart_weekdays_start_timing');
                                $quick_mart_weekdays_end_timing = get_sub_field('quick_mart_weekdays_end_timing');
                                $quick_mart_weekend_start_timing = get_sub_field('quick_mart_weekend_start_timing');
                                $quick_mart_weekend_end_timing = get_sub_field('quick_mart_weekend_end_timing');
                            endif;
                            $pt_0 = ($count === 0) ? ' pt-0' : '';
                            if(strtolower($selected_direction) == 'south'):
                                $count++;
                                ?>
                                <div class="accordion-item">
                                    <div class="accordion-header<?php echo $pt_0;?>">
                                        <div class="accordion-button collapsed <?php echo $pt_0;?>" type="button" data-bs-toggle="collapse" data-bs-target="#south_<?php echo $count;?>" aria-expanded="true">
                                            <div class="row width_rt">
                                                <div class="col-md-1">
                                                    <div class="loc-number">
                                                        <h3 class="mb-0 light-grey">
                                                            <?php
                                                                $formatted_count = str_pad($count, 3, '0', STR_PAD_LEFT);
                                                                echo $formatted_count;// Output the formatted count
                                                            
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="loc-content">
                                                        <div class="loc-title">
                                                            <h4 class="loc-name"><?php echo $station_name;?></h4>
                                                        </div>
                                                        <h5 class="mb-0 grey-text"><?php echo $station_address;?></h5>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php if(!empty($quick_mart_available)):?>
                                                <div class="quickmart_icon">
                                                    <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                    </svg>
                                                </div>
                                            <?php endif;?>

                                            <div class="arrow">
                                                <div class="arrow-line left"></div>
                                                <div class="arrow-line right"></div>
                                            </div>
                                        </div>
                                        <div class="accordion-collapse collapse" data-bs-parent="#RetailStation" id="south_<?php echo $count;?>">
                                            <div class="accordion-body row">
                                                <div class="col-md-1">
                                                </div>

                                                <div class="col-md-11">
                                                    <div class="row rs_inner">
                                                        <?php 
                                                        if (have_rows('available_fuels')): 
                                                            ?>
                                                            <div class="col_rs_2">
                                                                <div class="rs-available">
                                                                    <div class="list-produce align-items-baseline">
                                                                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M14.166 11.4829C14.0787 10.5924 13.8028 9.73272 13.3579 8.96522L8.98155 2.2377C8.60567 1.65854 7.82974 1.4936 7.24892 1.86982C7.10312 1.96455 6.97812 2.08987 6.88198 2.2377L2.50297 8.96522C0.986028 11.5951 1.5767 14.9338 3.90537 16.8844C4.93597 17.7447 6.19961 18.2516 7.52098 18.3346" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                            <path d="M10 15.4167L13.0556 18.3333L19.1667 12.5" stroke="#74253A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                        </svg>

                                                                        <h5 class="mb-0">Available Fuels</h5>
                                                                    </div>

                                                                    <div class="available-price">
                                                                        <div class="available-item">
                                                                            <?php
                                                                            // Loop through the available_fuels repeater field
                                                                            if (have_rows('available_fuels')): 
                                                                                // Initialize counter for looping
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name'); // Get the fuel name
                                                                                    $fuels_price = get_sub_field('fuels_price'); // Get the fuel price
                                                                                    
                                                                                    if (!empty($fuels_name) && !empty($fuels_price)):
                                                                                        // Output each fuel name
                                                                                        echo '<p>' . esc_html($fuels_name) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>

                                                                        <div class="pricing-label">
                                                                            <?php
                                                                            // Loop through again to get the prices
                                                                            if (have_rows('available_fuels')): 
                                                                                $counter = 0;
                                                                                while (have_rows('available_fuels')): the_row();
                                                                                    $fuels_name = get_sub_field('fuels_name');
                                                                                    $fuels_price = get_sub_field('fuels_price');

                                                                                    if (!empty($fuels_price)): 
                                                                                        // Output each fuel price, ensure it's in the red text class
                                                                                        echo '<p class="red-text">' . '₦' . number_format($fuels_price, 2) . '</p>';
                                                                                        $counter++; // Increment counter for each item
                                                                                    endif;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <?php 
                                                        endif;?>
                                                        <div class="col_rs_5 rs_flex">
                                                            <div class="rs-available rs-timing">
                                                                <div class="list-produce align-items-center">
                                                                    <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M11.5 0.75C5.29639 0.75 0.25 5.79639 0.25 12C0.25 18.2036 5.29639 23.25 11.5 23.25C17.7036 23.25 22.75 18.2036 22.75 12C22.75 5.79639 17.7036 0.75 11.5 0.75ZM11.5 2.625C16.6892 2.625 20.875 6.81079 20.875 12C20.875 17.1892 16.6892 21.375 11.5 21.375C6.31079 21.375 2.125 17.1892 2.125 12C2.125 6.81079 6.31079 2.625 11.5 2.625ZM10.5625 4.5V12.9375H17.125V11.0625H12.4375V4.5H10.5625Z" fill="#74253A" />
                                                                    </svg>

                                                                    <h5 class="mb-0">Station Timing</h5>
                                                                </div>
                                                                <div class="available-item">
                                                                    <p>Weekdays</p>
                                                                    <p class="mb-0">Weekends</p>
                                                                </div>
                                                            </div>
                                                            <div class="open-timing">
                                                                <h5 class="mb-0 grey-text">Open</h5>
                                                                <div class="available-item">
                                                                    <p><?php echo esc_html($station_weekdays_starting_time) .' to '. esc_html($station_weekdays_closing_time);?></p>
                                                                    <p class="mb-0"><?php echo esc_html($station_weekend_starting_time) .' to '. esc_html($station_weekend_closing_time);?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php if(!empty($quick_mart_available)):?>
                                                            <div class="col_rs_5 rs_flex">
                                                                <div class="rs-available rs-timing">
                                                                    <div class="list-produce align-items-center">
                                                                        <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3.75 0.75V4.17773L0.9375 7.92773V8.25C0.9375 9.79219 2.20781 11.0625 3.75 11.0625V23.25H26.25V11.0625C27.7922 11.0625 29.0625 9.79219 29.0625 8.25V7.92773L26.25 4.17773V0.75H3.75ZM5.625 2.625H24.375V3.5625H5.625V2.625ZM5.15625 5.4375H24.8438L27.0996 8.45508C26.9974 8.86102 26.6897 9.1875 26.25 9.1875C25.7297 9.1875 25.3125 8.77031 25.3125 8.25H23.4375C23.4375 8.77031 23.0203 9.1875 22.5 9.1875C21.9797 9.1875 21.5625 8.77031 21.5625 8.25H19.6875C19.6875 8.77031 19.2703 9.1875 18.75 9.1875C18.2297 9.1875 17.8125 8.77031 17.8125 8.25H15.9375C15.9375 8.77031 15.5203 9.1875 15 9.1875C14.4797 9.1875 14.0625 8.77031 14.0625 8.25H12.1875C12.1875 8.77031 11.7703 9.1875 11.25 9.1875C10.7297 9.1875 10.3125 8.77031 10.3125 8.25H8.4375C8.4375 8.77031 8.02031 9.1875 7.5 9.1875C6.97969 9.1875 6.5625 8.77031 6.5625 8.25H4.6875C4.6875 8.77031 4.27031 9.1875 3.75 9.1875C3.31031 9.1875 3.00258 8.86102 2.90039 8.45508L5.15625 5.4375ZM5.625 10.3301C6.12281 10.7801 6.78188 11.0625 7.5 11.0625C8.21812 11.0625 8.87719 10.7801 9.375 10.3301C9.87281 10.7801 10.5319 11.0625 11.25 11.0625C11.9681 11.0625 12.6272 10.7801 13.125 10.3301C13.6228 10.7801 14.2819 11.0625 15 11.0625C15.7181 11.0625 16.3772 10.7801 16.875 10.3301C17.3728 10.7801 18.0319 11.0625 18.75 11.0625C19.4681 11.0625 20.1272 10.7801 20.625 10.3301C21.1228 10.7801 21.7819 11.0625 22.5 11.0625C23.2181 11.0625 23.8772 10.7801 24.375 10.3301V16.6875H5.625V10.3301ZM5.625 18.5625H24.375V21.375H5.625V18.5625Z" fill="#74253A" />
                                                                        </svg>


                                                                        <h5 class="mb-0">Quick Mart</h5>
                                                                    </div>
                                                                    <div class="available-item">
                                                                        <p>Weekdays</p>
                                                                        <p class="mb-0">Weekends</p>
                                                                    </div>
                                                                </div>
                                                                <div class="open-timing">
                                                                    <h5 class="mb-0 grey-text">Open</h5>
                                                                    <div class="available-item">
                                                                        <p><?php echo esc_html($quick_mart_weekdays_start_timing) .' to '. esc_html($quick_mart_weekdays_end_timing);?></p>
                                                                        <p class="mb-0"><?php echo esc_html($quick_mart_weekend_start_timing) .' to '. esc_html($quick_mart_weekend_end_timing);?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <div class="direction-btn">
                                                            <a href="service.html#retailNetwork" class="join-us-btn red-btn">
                                                                <div class="join-us">Get Directions</div>
                                                                <svg class="svg-sub" xmlns="http://www.w3.org/2000/svg" width="21" height="12" viewBox="0 0 21 12" fill="none">
                                                                    <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="white" />
                                                                </svg>

                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endwhile; 
                    endif;
                    if($count === 0):
                        ?>
                            <div class="accordion-item">
                                <div class="no-data text-center">
                                    <img src="<?php echo get_stylesheet_directory_uri().'/blocks/retail-stations/No-Retail-Station.png';?>" class="img-fluid" alt="" />
                                </div>
                            </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
        
    </div>
</div>