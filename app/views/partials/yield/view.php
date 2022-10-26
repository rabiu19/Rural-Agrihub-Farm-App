<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page ajax-page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Yield</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <?php Html::ajaxpage_spinner(); ?>
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-farmer_name">
                                        <th class="title"> Farmer Name: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-farm_size">
                                        <th class="title"> Farm Size: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-planting_date">
                                        <th class="title"> Planting Date: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-expected_date_for_input_application">
                                        <th class="title"> Expected Date For Input Application: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-planting_status">
                                        <th class="title"> Planting Status: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-input_application_status">
                                        <th class="title"> Input Application Status: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-weeding_status">
                                        <th class="title"> Weeding Status: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-type_of_input_applied">
                                        <th class="title"> Type Of Input Applied: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-qty_of_seed_used">
                                        <th class="title"> Qty Of Seed Used: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-qty_of_input_used">
                                        <th class="title"> Qty Of Input Used: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-date_harvested">
                                        <th class="title"> Date Harvested: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-actual_yield_obtained">
                                        <th class="title"> Actual Yield Obtained: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-image">
                                        <th class="title"> Image: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-expected_yiled">
                                        <th class="title"> Expected Yiled: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-remarks">
                                        <th class="title"> Remarks: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-date_created">
                                        <th class="title"> Date Created: </th>
                                        <td class="value"> <?php echo $data['date_created']; ?></td>
                                    </tr>
                                    <tr  class="td-date_updated">
                                        <th class="title"> Date Updated: </th>
                                        <td class="value"> <?php echo $data['date_updated']; ?></td>
                                    </tr>
                                    <tr  class="td-commodity_type">
                                        <th class="title"> Commodity Type: </th>
                                        <td class="value">
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
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("yield/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("yield/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="material-icons">clear</i> Delete
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="material-icons">block</i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
