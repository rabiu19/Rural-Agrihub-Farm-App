<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Customer</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="customer-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("customer/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div id="ctrl-image-holder" class="">
                                        <div class="dropzone " input="#ctrl-image" fieldname="image"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                            <input name="image" id="ctrl-image" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('image',""); ?>" type="text"  />
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div id="ctrl-name-holder" class="">
                                            <input id="ctrl-name"  value="<?php  echo $this->set_field_value('name',""); ?>" type="text" placeholder="Enter Name"  required="" name="name"  class="form-control " />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div id="ctrl-phone-holder" class="">
                                                <input id="ctrl-phone"  value="<?php  echo $this->set_field_value('phone',""); ?>" type="number" placeholder="Enter Phone" min="10" max="10" step="1"  required="" name="phone"  class="form-control " />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div id="ctrl-sex-holder" class="">
                                                    <?php
                                                    $sex_options = Menu :: $sex;
                                                    if(!empty($sex_options)){
                                                    foreach($sex_options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = $this->set_field_checked('sex', $value, "");
                                                    ?>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input id="ctrl-sex" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="sex" />
                                                            <span class="custom-control-label"><?php echo $label ?></span>
                                                        </label>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div id="ctrl-dob-holder" class="input-group">
                                                        <input id="ctrl-dob" class="form-control datepicker  datepicker"  value="<?php  echo $this->set_field_value('dob',""); ?>" type="datetime" name="dob" placeholder="Enter Date of Birth" data-enable-time="false" data-min-date="" data-max-date="<?php echo date_now(); ?>" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div id="ctrl-community_name-holder" class="">
                                                            <select required=""  id="ctrl-community_name" name="community_name"  placeholder="Select a value ..."    class="custom-select" >
                                                                <option value="">Select a value ...</option>
                                                                <?php 
                                                                $community_name_options = $comp_model -> customer_community_name_option_list();
                                                                if(!empty($community_name_options)){
                                                                foreach($community_name_options as $option){
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                $selected = $this->set_field_selected('community_name',$value, "");
                                                                ?>
                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                    <?php echo $label; ?>
                                                                </option>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div id="ctrl-crop_type-holder" class="">
                                                            <?php 
                                                            $crop_type_options = $comp_model -> customer_crop_type_option_list();
                                                            if(!empty($crop_type_options)){
                                                            $ci = 0;
                                                            foreach($crop_type_options as $option){
                                                            $ci++;
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $checked = $this->set_field_checked('crop_type', $value, "");
                                                            ?>
                                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                                <input id="ctrl-crop_type" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="crop_type[]"   required="" />
                                                                    <span class="custom-control-label"><?php echo $label; ?></span>
                                                                </label>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div id="ctrl-crop_cetegory-holder" class="">
                                                                <?php 
                                                                $crop_cetegory_options = $comp_model -> customer_crop_cetegory_option_list();
                                                                if(!empty($crop_cetegory_options)){
                                                                $ci = 0;
                                                                foreach($crop_cetegory_options as $option){
                                                                $ci++;
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                $checked = $this->set_field_checked('crop_cetegory', $value, "");
                                                                ?>
                                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                                    <input id="ctrl-crop_cetegory" class="custom-control-input" <?php echo $checked; ?> value="<?php echo $value; ?>" type="checkbox" name="crop_cetegory[]"   required="" />
                                                                        <span class="custom-control-label"><?php echo $label; ?></span>
                                                                    </label>
                                                                    <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div id="ctrl-farm_location-holder" class="">
                                                                    <input id="ctrl-farm_location"  value="<?php  echo $this->set_field_value('farm_location',""); ?>" type="text" placeholder="Enter Farm Location"  required="" name="farm_location"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div id="ctrl-average_anual_income-holder" class="">
                                                                        <select required=""  id="ctrl-average_anual_income" name="average_anual_income"  placeholder="Select a value ..."    class="custom-select" >
                                                                            <option value="">Select a value ...</option>
                                                                            <?php
                                                                            $average_anual_income_options = Menu :: $average_anual_income;
                                                                            if(!empty($average_anual_income_options)){
                                                                            foreach($average_anual_income_options as $option){
                                                                            $value = $option['value'];
                                                                            $label = $option['label'];
                                                                            $selected = $this->set_field_selected('average_anual_income', $value, "");
                                                                            ?>
                                                                            <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                <?php echo $label ?>
                                                                            </option>                                   
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div id="ctrl-other_source_of_income-holder" class="">
                                                                        <input id="ctrl-other_source_of_income"  value="<?php  echo $this->set_field_value('other_source_of_income',""); ?>" type="text" placeholder="Enter Other Source Of Income"  required="" name="other_source_of_income"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div id="ctrl-location_address-holder" class="">
                                                                            <input id="ctrl-location_address"  value="<?php  echo $this->set_field_value('location_address',""); ?>" type="text" placeholder="Enter Farm Location Address"  required="" name="location_address"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div id="ctrl-training_type_needed-holder" class="">
                                                                                <?php
                                                                                $training_type_needed_options = Menu :: $training_type_needed;
                                                                                if(!empty($training_type_needed_options)){
                                                                                foreach($training_type_needed_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                //check if current option is checked option
                                                                                $checked = $this->set_field_checked('training_type_needed', $value, "");
                                                                                ?>
                                                                                <label class="custom-control custom-checkbox custom-control-inline option-btn">
                                                                                    <input id="ctrl-training_type_needed" class="custom-control-input" value="<?php echo $value ?>" <?php echo $checked ?> type="checkbox" required=""  name="training_type_needed[]" />
                                                                                        <span class="custom-control-label"><?php echo $label ?></span>
                                                                                    </label>
                                                                                    <?php
                                                                                    }
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div id="ctrl-currentFarmLocation-holder" class="">
                                                                                    <input id="ctrl-currentFarmLocation"  value="<?php  echo $this->set_field_value('currentFarmLocation',""); ?>" type="text" placeholder="Enter Current farm location"  required="" name="currentFarmLocation"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div id="ctrl-farmLocationCoordinates-holder" class="">
                                                                                        <input id="ctrl-farmLocationCoordinates"  value="<?php  echo $this->set_field_value('farmLocationCoordinates',""); ?>" type="text" placeholder="Enter Farm location coordinates"  required="" name="farmLocationCoordinates"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div id="ctrl-farmFootage-holder" class="">
                                                                                            <input id="ctrl-farmFootage"  value="<?php  echo $this->set_field_value('farmFootage',""); ?>" type="text" placeholder="Enter Farm footage"  required="" name="farmFootage"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div id="ctrl-preferredFarming_Season-holder" class="">
                                                                                                <input id="ctrl-preferredFarming_Season"  value="<?php  echo $this->set_field_value('preferredFarming_Season',""); ?>" type="text" placeholder="Enter Preferred farming Season"  required="" name="preferredFarming_Season"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div id="ctrl-farming_season_starts-holder" class="">
                                                                                                    <input id="ctrl-farming_season_starts"  value="<?php  echo $this->set_field_value('farming_season_starts',""); ?>" type="text" placeholder="Enter Farming Season Starts"  required="" name="farming_season_starts"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <div id="ctrl-farming_season_ends-holder" class="">
                                                                                                        <input id="ctrl-farming_season_ends"  value="<?php  echo $this->set_field_value('farming_season_ends',""); ?>" type="text" placeholder="Enter Farming Season Ends"  required="" name="farming_season_ends"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div id="ctrl-notes-holder" class="">
                                                                                                            <input id="ctrl-notes"  value="<?php  echo $this->set_field_value('notes',""); ?>" type="text" placeholder="Enter Notes"  required="" name="notes"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                        <div class="form-ajax-status"></div>
                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                            Submit
                                                                                                            <i class="material-icons">send</i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
