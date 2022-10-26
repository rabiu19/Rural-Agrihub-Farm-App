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
                    <h4 class="record-title">Add New Yield</h4>
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
                        <form id="yield-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("yield/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="farmer_name">Farmer Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-farmer_name"  value="<?php  echo $this->set_field_value('farmer_name',""); ?>" type="text" placeholder="Enter Farmer Name"  required="" name="farmer_name"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="commodity_type">Commodity Type <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-commodity_type"  value="<?php  echo $this->set_field_value('commodity_type',""); ?>" type="text" placeholder="Enter Commodity Type"  required="" name="commodity_type"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="farm_size">Farm Size <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-farm_size"  value="<?php  echo $this->set_field_value('farm_size',""); ?>" type="text" placeholder="Enter Farm Size"  required="" name="farm_size"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="planting_date">Planting Date </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input id="ctrl-planting_date" class="form-control datepicker  datepicker"  value="<?php  echo $this->set_field_value('planting_date',""); ?>" type="datetime" name="planting_date" placeholder="Enter Planting Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="expected_date_for_input_application">Expected Date For Input Application </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input id="ctrl-expected_date_for_input_application" class="form-control datepicker  datepicker" value="<?php  echo $this->set_field_value('expected_date_for_input_application',""); ?>" type="datetime"  name="expected_date_for_input_application" placeholder="Enter Expected Date For Input Application" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="planting_status">Planting Status </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select  id="ctrl-planting_status" name="planting_status"  placeholder="Select a value ..."    class="custom-select" >
                                                                        <option value="">Select a value ...</option>
                                                                        <?php
                                                                        $planting_status_options = Menu :: $planting_status;
                                                                        if(!empty($planting_status_options)){
                                                                        foreach($planting_status_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        $selected = $this->set_field_selected('planting_status', $value, "");
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="input_application_status">Input Application Status </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select  id="ctrl-input_application_status" name="input_application_status"  placeholder="Select a value ..."    class="custom-select" >
                                                                        <option value="">Select a value ...</option>
                                                                        <?php
                                                                        $input_application_status_options = Menu :: $input_application_status;
                                                                        if(!empty($input_application_status_options)){
                                                                        foreach($input_application_status_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        $selected = $this->set_field_selected('input_application_status', $value, "");
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="weeding_status">Weeding Status <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select required=""  id="ctrl-weeding_status" name="weeding_status"  placeholder="Select a value ..."    class="custom-select" >
                                                                        <option value="">Select a value ...</option>
                                                                        <?php
                                                                        $weeding_status_options = Menu :: $weeding_status;
                                                                        if(!empty($weeding_status_options)){
                                                                        foreach($weeding_status_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        $selected = $this->set_field_selected('weeding_status', $value, "");
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="type_of_input_applied">Type Of Input Applied <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <select required=""  id="ctrl-type_of_input_applied" name="type_of_input_applied"  placeholder="Select a value ..."    class="custom-select" >
                                                                        <option value="">Select a value ...</option>
                                                                        <?php
                                                                        $type_of_input_applied_options = Menu :: $type_of_input_applied;
                                                                        if(!empty($type_of_input_applied_options)){
                                                                        foreach($type_of_input_applied_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        $selected = $this->set_field_selected('type_of_input_applied', $value, "");
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="qty_of_seed_used">Qty Of Seed Used </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-qty_of_seed_used"  value="<?php  echo $this->set_field_value('qty_of_seed_used',""); ?>" type="text" placeholder="Enter Qty Of Seed Used"  name="qty_of_seed_used"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="qty_of_input_used">Qty Of Input Used </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-qty_of_input_used"  value="<?php  echo $this->set_field_value('qty_of_input_used',""); ?>" type="text" placeholder="Enter Qty Of Input Used"  name="qty_of_input_used"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="date_harvested">Date Harvested </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <input id="ctrl-date_harvested" class="form-control datepicker  datepicker" value="<?php  echo $this->set_field_value('date_harvested',""); ?>" type="datetime"  name="date_harvested" placeholder="Enter Date Harvested" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="actual_yield_obtained">Actual Yield Obtained </label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-actual_yield_obtained"  value="<?php  echo $this->set_field_value('actual_yield_obtained',""); ?>" type="text" placeholder="Enter Actual Yield Obtained"  name="actual_yield_obtained"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="image">Image </label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <div class="dropzone " input="#ctrl-image" fieldname="image"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                                                        <input name="image" id="ctrl-image" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('image',""); ?>" type="text"  />
                                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="expected_yiled">Expected Yiled </label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-expected_yiled"  value="<?php  echo $this->set_field_value('expected_yiled',""); ?>" type="text" placeholder="Enter Expected Yiled"  name="expected_yiled"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="remarks">Remarks </label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-remarks"  value="<?php  echo $this->set_field_value('remarks',""); ?>" type="text" placeholder="Enter Remarks"  name="remarks"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
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
