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
        <td class="td-id"><a href="<?php print_link("farmer/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-image">
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
        <td class="td-name">
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
        <td class="td-email"><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
        <td class="td-address">
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
        <td class="td-phone"><a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a></td>
        <td class="td-sex">
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
        <td class="td-dob">
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
        <td class="td-date"> <?php echo $data['date']; ?></td>
        <td class="td-community_name">
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
        <td class="td-crop_cetegory">
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
        <td class="td-farm_location">
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
        <td class="td-location_address">
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
        <td class="td-training_type_needed">
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
        <td class="td-average_anual_income">
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
        <td class="td-other_source_of_income">
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
        <td class="td-crop_type">
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
        <td class="td-currentFarmLocation">
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
        <td class="td-farmLocationCoordinates">
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
        <td class="td-farmFootage">
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
        <td class="td-preferredFarming_Season">
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
        <td class="td-farming_season_starts">
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
        <td class="td-farming_season_ends">
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
        <td class="td-date_created">
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
        <td class="td-date_updated">
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
        <td class="td-notes">
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
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("farmer/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("farmer/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("farmer/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    