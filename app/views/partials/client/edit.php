<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Client</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("client/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-name"  value="<?php  echo $data['name']; ?>" type="text" placeholder="Enter Name"  required="" name="name"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-phone"  value="<?php  echo $data['phone']; ?>" type="number" placeholder="Enter Phone" step="1" list="phone_list"  required="" name="phone"  class="form-control " />
                                                        <datalist id="phone_list">
                                                            <?php 
                                                            $phone_options = $comp_model -> client_phone_option_list();
                                                            if(!empty($phone_options)){
                                                            foreach($phone_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            ?>
                                                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="email">Email </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-email"  value="<?php  echo $data['email']; ?>" type="email" placeholder="Enter Email"  name="email"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="city_or_location">City Or Location <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-city_or_location"  value="<?php  echo $data['city_or_location']; ?>" type="text" placeholder="Enter City Or Location"  required="" name="city_or_location"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="profession">Profession </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <select  id="ctrl-profession" name="profession"  placeholder="Select a value ..."    class="custom-select" >
                                                                    <option value="">Select a value ...</option>
                                                                    <?php
                                                                    $profession_options = Menu :: $profession;
                                                                    $field_value = $data['profession'];
                                                                    if(!empty($profession_options)){
                                                                    foreach($profession_options as $option){
                                                                    $value = $option['value'];
                                                                    $label = $option['label'];
                                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                            <label class="control-label" for="type_commodity_interest">Type Commodity Interest <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <?php 
                                                                $type_commodity_interest_options = $comp_model -> client_type_commodity_interest_option_list();
                                                                $arrRec = explode(',', $data['type_commodity_interest']);
                                                                if(!empty($type_commodity_interest_options)){
                                                                foreach($type_commodity_interest_options as $option){
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                $checked = (in_array($value , $arrRec) ? 'checked' : null);
                                                                ?>
                                                                <label class="custom-control custom-checkbox custom-control-inline option-btn">
                                                                    <input id="ctrl-type_commodity_interest" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value; ?>" type="checkbox"  name="type_commodity_interest[]" required="" />
                                                                        <span class="custom-control-label"><?php echo $label; ?></span>
                                                                    </label>
                                                                    <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="order_schedule">Order Schedule </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <select  id="ctrl-order_schedule" name="order_schedule"  placeholder="Select a value ..."    class="custom-select" >
                                                                        <option value="">Select a value ...</option>
                                                                        <?php
                                                                        $order_schedule_options = Menu :: $order_schedule;
                                                                        $field_value = $data['order_schedule'];
                                                                        if(!empty($order_schedule_options)){
                                                                        foreach($order_schedule_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        $selected = ( $value == $field_value ? 'selected' : null );
                                                                        ?>
                                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                            <?php echo $label ?>
                                                                        </option>                                   
                                                                        <?php
                                                                        }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-ajax-status"></div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary" type="submit">
                                                        Update
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
