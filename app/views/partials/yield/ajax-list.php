<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
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
    <?php
    } else {
    ?>
    <td class="no-record-found col-12" colspan="100">
        <h4 class="text-muted text-center ">
            No Record Found
        </h4>
    </td>
    <?php
    }
    ?>
    