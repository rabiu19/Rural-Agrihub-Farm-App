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
                    <h4 class="record-title">View  Farmers</h4>
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
                                    <tr  class="td-name">
                                        <th class="title"> Name: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['name']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-gender">
                                        <th class="title"> Gender: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $gender); ?>' 
                                                data-value="<?php echo $data['gender']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="gender" 
                                                data-title="Enter Gender" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="radiolist" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['gender']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-phone">
                                        <th class="title"> Phone: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['phone']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="phone" 
                                                data-title="Enter Phone" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['phone']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-address">
                                        <th class="title"> Address: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['address']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="address" 
                                                data-title="Enter House Address (Digital Code)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['address']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-community">
                                        <th class="title"> Community: </th>
                                        <td class="value">
                                            <span  data-source='<?php print_link('api/json/farmers_community_option_list'); ?>' 
                                                data-value="<?php echo $data['community']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="community" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['community']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-commodity_produce">
                                        <th class="title"> Commodity Produce: </th>
                                        <td class="value">
                                            <span  data-source='<?php print_link('api/json/farmers_commodity_produce_option_list'); ?>' 
                                                data-value="<?php echo $data['commodity_produce']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="commodity_produce" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['commodity_produce']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farm_size">
                                        <th class="title"> Farm Size: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farm_size']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="farm_size" 
                                                data-title="Enter Farm Size (acres)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['farm_size']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farm_location">
                                        <th class="title"> Farm Location: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $farm_location); ?>' 
                                                data-value="<?php echo $data['farm_location']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="farm_location" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['farm_location']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farm_location_address">
                                        <th class="title"> Farm Location Address: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['farm_location_address']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="farm_location_address" 
                                                data-title="Enter Farm Location Address (coordinates)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['farm_location_address']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-farming_season_use">
                                        <th class="title"> Farming Season Use: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $farming_season_use); ?>' 
                                                data-value="<?php echo $data['farming_season_use']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="farming_season_use" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['farming_season_use']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-season_starts">
                                        <th class="title"> Season Starts: </th>
                                        <td class="value">
                                            <span  data-source='<?php print_link('api/json/farmers_season_starts_option_list'); ?>' 
                                                data-value="<?php echo $data['season_starts']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="season_starts" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['season_starts']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-season_ends">
                                        <th class="title"> Season Ends: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $season_ends); ?>' 
                                                data-value="<?php echo $data['season_ends']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="season_ends" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['season_ends']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-average_yearly_income_range">
                                        <th class="title"> Average Yearly Income Range: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $average_yearly_income_range); ?>' 
                                                data-value="<?php echo $data['average_yearly_income_range']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="average_yearly_income_range" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['average_yearly_income_range']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-other_source_of_income">
                                        <th class="title"> Other Source Of Income: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['other_source_of_income']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-form_of_support_need">
                                        <th class="title"> Form Of Support Need: </th>
                                        <td class="value">
                                            <span  data-source='<?php echo json_encode_quote(Menu :: $form_of_support_need); ?>' 
                                                data-value="<?php echo $data['form_of_support_need']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="form_of_support_need" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['form_of_support_need']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-remarks">
                                        <th class="title"> Remarks: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['remarks']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-image">
                                        <th class="title"> Image: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['image']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("farmers/editfield/" . urlencode($data['id'])); ?>" 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("farmers/edit/$rec_id"); ?>">
                                                    <i class="material-icons">edit</i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("farmers/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
