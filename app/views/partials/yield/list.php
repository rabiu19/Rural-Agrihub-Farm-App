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
<section class="page ajax-page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Yield</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("yield/add") ?>">
                        <i class="material-icons">add</i>                               
                        Add New Yield 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('yield'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('yield'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('yield'); ?>">
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
                            <div id="yield-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <?php Html::ajaxpage_spinner(); ?>
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">#</th>
                                                <th  class="td-id"> Id</th>
                                                <th  class="td-farmer_name"> Farmer Name</th>
                                                <th  class="td-commodity_type"> Commodity Type</th>
                                                <th  class="td-farm_size"> Farm Size</th>
                                                <th  class="td-planting_date"> Planting Date</th>
                                                <th  class="td-expected_date_for_input_application"> Expected Date For Input Application</th>
                                                <th  class="td-planting_status"> Planting Status</th>
                                                <th  class="td-input_application_status"> Input Application Status</th>
                                                <th  class="td-weeding_status"> Weeding Status</th>
                                                <th  class="td-type_of_input_applied"> Type Of Input Applied</th>
                                                <th  class="td-qty_of_seed_used"> Qty Of Seed Used</th>
                                                <th  class="td-qty_of_input_used"> Qty Of Input Used</th>
                                                <th  class="td-date_harvested"> Date Harvested</th>
                                                <th  class="td-actual_yield_obtained"> Actual Yield Obtained</th>
                                                <th  class="td-image"> Image</th>
                                                <th  class="td-expected_yiled"> Expected Yiled</th>
                                                <th  class="td-remarks"> Remarks</th>
                                                <th  class="td-date_created"> Date Created</th>
                                                <th  class="td-date_updated"> Date Updated</th>
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
                                                    <td class="td-id"><a href="<?php print_link("yield/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
                                                    <td class="td-farmer_name">
                                                        <span  data-value="<?php echo $data['farmer_name']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farmer_name" 
                                                            data-title="Enter Farmer Name" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farmer_name']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-commodity_type">
                                                        <span  data-value="<?php echo $data['commodity_type']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="commodity_type" 
                                                            data-title="Enter Commodity Type" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['commodity_type']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-farm_size">
                                                        <span  data-value="<?php echo $data['farm_size']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="farm_size" 
                                                            data-title="Enter Farm Size" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['farm_size']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-planting_date">
                                                        <span  data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['planting_date']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="planting_date" 
                                                            data-title="Enter Planting Date" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['planting_date']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-expected_date_for_input_application">
                                                        <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['expected_date_for_input_application']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="expected_date_for_input_application" 
                                                            data-title="Enter Expected Date For Input Application" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['expected_date_for_input_application']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-planting_status">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $planting_status); ?>' 
                                                            data-value="<?php echo $data['planting_status']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="planting_status" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['planting_status']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-input_application_status">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $input_application_status); ?>' 
                                                            data-value="<?php echo $data['input_application_status']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="input_application_status" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['input_application_status']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-weeding_status">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $weeding_status); ?>' 
                                                            data-value="<?php echo $data['weeding_status']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="weeding_status" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['weeding_status']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-type_of_input_applied">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $type_of_input_applied); ?>' 
                                                            data-value="<?php echo $data['type_of_input_applied']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="type_of_input_applied" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['type_of_input_applied']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-qty_of_seed_used">
                                                        <span  data-value="<?php echo $data['qty_of_seed_used']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="qty_of_seed_used" 
                                                            data-title="Enter Qty Of Seed Used" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['qty_of_seed_used']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-qty_of_input_used">
                                                        <span  data-value="<?php echo $data['qty_of_input_used']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="qty_of_input_used" 
                                                            data-title="Enter Qty Of Input Used" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['qty_of_input_used']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date_harvested">
                                                        <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['date_harvested']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="date_harvested" 
                                                            data-title="Enter Date Harvested" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['date_harvested']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-actual_yield_obtained">
                                                        <span  data-value="<?php echo $data['actual_yield_obtained']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="actual_yield_obtained" 
                                                            data-title="Enter Actual Yield Obtained" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['actual_yield_obtained']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-image">
                                                        <span  data-value="<?php echo $data['image']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
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
                                                    <td class="td-expected_yiled">
                                                        <span  data-value="<?php echo $data['expected_yiled']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="expected_yiled" 
                                                            data-title="Enter Expected Yiled" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['expected_yiled']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-remarks">
                                                        <span  data-value="<?php echo $data['remarks']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("yield/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="remarks" 
                                                            data-title="Enter Remarks" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['remarks']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
                                                    <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
                                                    <th class="td-btn">
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("yield/view/$rec_id"); ?>">
                                                            <i class="material-icons">visibility</i> View
                                                        </a>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("yield/edit/$rec_id"); ?>">
                                                            <i class="material-icons">edit</i> Edit
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("yield/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("yield/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
                                                                    $pager->ajax_page = true;
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
