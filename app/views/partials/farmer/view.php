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
                    <h4 class="record-title">View  Farmer</h4>
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
                                    <tr  class="td-image">
                                        <th class="title"> Image: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['image']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-name">
                                        <th class="title"> Name: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-email">
                                        <th class="title"> Email: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['email']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="email" 
                                                data-title="Enter Email" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="email" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['email']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-address">
                                        <th class="title"> Address: </th>
                                        <td class="value">
                                            <span  data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="address" 
                                                data-title="Enter Address" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['address']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-phone">
                                        <th class="title"> Phone: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['phone']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="phone" 
                                                data-title="Enter Phone" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['phone']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-sex">
                                        <th class="title"> Sex: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $sex); ?>' 
                                                data-value="<?php echo $data['sex']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-dob">
                                        <th class="title"> Dob: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['dob']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="dob" 
                                                data-title="Enter Dob" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['dob']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date">
                                        <th class="title"> Date: </th>
                                        <td class="value"> <?php echo $data['date']; ?></td>
                                    </tr>
                                    <tr  class="td-community_name">
                                        <th class="title"> Community Name: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['community_name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="community_name" 
                                                data-title="Enter Community Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['community_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-crop_cetegory">
                                        <th class="title"> Crop Cetegory: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['crop_cetegory']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="crop_cetegory" 
                                                data-title="Enter Crop Cetegory" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['crop_cetegory']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farm_location">
                                        <th class="title"> Farm Location: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farm_location']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-location_address">
                                        <th class="title"> Location Address: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['location_address']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="location_address" 
                                                data-title="Enter Location Address" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['location_address']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-training_type_needed">
                                        <th class="title"> Training Type Needed: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['training_type_needed']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="training_type_needed" 
                                                data-title="Enter Training Type Needed" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['training_type_needed']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-average_anual_income">
                                        <th class="title"> Average Anual Income: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['average_anual_income']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="average_anual_income" 
                                                data-title="Enter Average Anual Income" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['average_anual_income']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-other_source_of_income">
                                        <th class="title"> Other Source Of Income: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['other_source_of_income']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-crop_type">
                                        <th class="title"> Crop Type: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['crop_type']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="crop_type" 
                                                data-title="Enter Crop Type" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['crop_type']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-currentFarmLocation">
                                        <th class="title"> Currentfarmlocation: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['currentFarmLocation']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="currentFarmLocation" 
                                                data-title="Enter Currentfarmlocation" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['currentFarmLocation']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmLocationCoordinates">
                                        <th class="title"> Farmlocationcoordinates: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farmLocationCoordinates']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="farmLocationCoordinates" 
                                                data-title="Enter Farmlocationcoordinates" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['farmLocationCoordinates']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farmFootage">
                                        <th class="title"> Farmfootage: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farmFootage']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="farmFootage" 
                                                data-title="Enter Farmfootage" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['farmFootage']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-preferredFarming_Season">
                                        <th class="title"> Preferredfarming Season: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['preferredFarming_Season']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="preferredFarming_Season" 
                                                data-title="Enter Preferredfarming Season" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['preferredFarming_Season']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farming_season_starts">
                                        <th class="title"> Farming Season Starts: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farming_season_starts']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-farming_season_ends">
                                        <th class="title"> Farming Season Ends: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farming_season_ends']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-date_created">
                                        <th class="title"> Date Created: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_created']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="date_created" 
                                                data-title="Enter Date Created" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['date_created']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_updated">
                                        <th class="title"> Date Updated: </th>
                                        <td class="value">
                                            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_updated']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                    </tr>
                                    <tr  class="td-notes">
                                        <th class="title"> Notes: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['notes']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmer/editfield/" . urlencode($data['id'])); ?>" 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("farmer/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("farmer/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
