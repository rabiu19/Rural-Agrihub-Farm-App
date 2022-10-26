<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Customer</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("customer/add") ?>">
                        <i class="material-icons">add</i>                               
                        Add New Customer 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('customer'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('customer'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('customer'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="customer-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-center">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">#</th>
                                                <th  class="td-image"> Image</th>
                                                <th  class="td-name"> Name</th>
                                                <th  class="td-email"> Email</th>
                                                <th  class="td-phone"> Phone</th>
                                                <th  class="td-sex"> Sex</th>
                                                <th  class="td-dob"> Date of Birth</th>
                                                <th  class="td-date"> Date</th>
                                                <th  class="td-community_name"> Community Name</th>
                                                <th  class="td-farm_location"> Farm Location</th>
                                                <th  class="td-location_address"> Location Address</th>
                                                <th  class="td-training_type_needed"> Training Type Needed</th>
                                                <th  class="td-average_anual_income"> Average Anual Income</th>
                                                <th  class="td-other_source_of_income"> Other Source Of Income</th>
                                                <th  class="td-crop_cetegory"> Crop Cetegory</th>
                                                <th  class="td-crop_type"> Crop Type</th>
                                                <th  class="td-currentFarmLocation"> Currentfarmlocation</th>
                                                <th  class="td-farmLocationCoordinates"> Farmlocationcoordinates</th>
                                                <th  class="td-farmFootage"> Farmfootage</th>
                                                <th  class="td-preferredFarming_Season"> Preferredfarming Season</th>
                                                <th  class="td-farming_season_starts"> Farming Season Starts</th>
                                                <th  class="td-farming_season_ends"> Farming Season Ends</th>
                                                <th  class="td-date_created"> Date Created</th>
                                                <th  class="td-date_updated"> Date Updated</th>
                                                <th  class="td-notes"> Notes</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-image">
                                                        <span  data-value="<?php echo $data['image']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="image" 
                                                            data-title="Browse..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['image']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-name">
                                                        <span  data-value="<?php echo $data['name']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="name" 
                                                            data-title="Enter Name" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['name']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-email"><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
                                                    <td class="td-phone"><a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a></td>
                                                    <td class="td-sex">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $sex); ?>' 
                                                            data-value="<?php echo $data['sex']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="sex" 
                                                            data-title="Enter Sex" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['sex']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-dob">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: '<?php echo date_now(); ?>'}" 
                                                            data-value="<?php echo $data['dob']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="dob" 
                                                            data-title="Enter Date of Birth" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['dob']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date">
                                                        <span  data-value="<?php echo $data['date']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="date" 
                                                            data-title="Enter Date" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['date']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-community_name">
                                                        <span  data-source='<?php print_link('api/json/customer_community_name_option_list'); ?>' 
                                                            data-value="<?php echo $data['community_name']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="community_name" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['community_name']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-farm_location">
                                                        <span  data-value="<?php echo $data['farm_location']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farm_location" 
                                                            data-title="Enter Farm Location" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farm_location']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-location_address">
                                                        <span  data-value="<?php echo $data['location_address']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="location_address" 
                                                            data-title="Enter Farm Location Address" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['location_address']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-training_type_needed">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $training_type_needed); ?>' 
                                                            data-value="<?php echo $data['training_type_needed']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="training_type_needed" 
                                                            data-title="Enter Training Type Needed" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="checklist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['training_type_needed']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-average_anual_income">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $average_anual_income); ?>' 
                                                            data-value="<?php echo $data['average_anual_income']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="average_anual_income" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['average_anual_income']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-other_source_of_income">
                                                        <span  data-value="<?php echo $data['other_source_of_income']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="other_source_of_income" 
                                                            data-title="Enter Other Source Of Income" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['other_source_of_income']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-crop_cetegory">
                                                        <span  data-source='<?php print_link('api/json/customer_crop_cetegory_option_list'); ?>' 
                                                            data-value="<?php echo $data['crop_cetegory']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="crop_cetegory" 
                                                            data-title="Enter Crop Cetegory" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="checklist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['crop_cetegory']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-crop_type">
                                                        <span  data-source='<?php print_link('api/json/customer_crop_type_option_list'); ?>' 
                                                            data-value="<?php echo $data['crop_type']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="crop_type" 
                                                            data-title="Enter Crop Type" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="checklist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['crop_type']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-currentFarmLocation">
                                                        <span  data-value="<?php echo $data['currentFarmLocation']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="currentFarmLocation" 
                                                            data-title="Enter Current farm location" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['currentFarmLocation']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-farmLocationCoordinates">
                                                        <span  data-value="<?php echo $data['farmLocationCoordinates']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farmLocationCoordinates" 
                                                            data-title="Enter Farm location coordinates" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farmLocationCoordinates']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-farmFootage">
                                                        <span  data-value="<?php echo $data['farmFootage']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farmFootage" 
                                                            data-title="Enter Farm footage" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farmFootage']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-preferredFarming_Season">
                                                        <span  data-value="<?php echo $data['preferredFarming_Season']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="preferredFarming_Season" 
                                                            data-title="Enter Preferred farming Season" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['preferredFarming_Season']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-farming_season_starts">
                                                        <span  data-value="<?php echo $data['farming_season_starts']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farming_season_starts" 
                                                            data-title="Enter Farming Season Starts" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farming_season_starts']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-farming_season_ends">
                                                        <span  data-value="<?php echo $data['farming_season_ends']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farming_season_ends" 
                                                            data-title="Enter Farming Season Ends" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farming_season_ends']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
                                                    <td class="td-date_updated">
                                                        <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['date_updated']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="date_updated" 
                                                            data-title="Enter Date Updated" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['date_updated']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-notes">
                                                        <span  data-value="<?php echo $data['notes']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("customer/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="notes" 
                                                            data-title="Enter Notes" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['notes']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("customer/view/$rec_id"); ?>">
                                                            <i class="material-icons">visibility</i> View
                                                        </a>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("customer/edit/$rec_id"); ?>">
                                                            <i class="material-icons">edit</i> Edit
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("customer/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="material-icons">clear</i>
                                                            Delete
                                                        </a>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="material-icons">block</i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("customer/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="material-icons">clear</i> Delete Selected
                                                    </button>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">save</i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
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
                            </section>
