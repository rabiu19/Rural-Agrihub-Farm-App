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
        <td class="td-id"><a href="<?php print_link("farmers/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-name"> <?php echo $data['name']; ?></td>
        <td class="td-gender"> <?php echo $data['gender']; ?></td>
        <td class="td-phone"><a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a></td>
        <td class="td-address"> <?php echo $data['address']; ?></td>
        <td class="td-community"> <?php echo $data['community']; ?></td>
        <td class="td-commodity_produce"> <?php echo $data['commodity_produce']; ?></td>
        <td class="td-farm_size"> <?php echo $data['farm_size']; ?></td>
        <td class="td-farm_location"> <?php echo $data['farm_location']; ?></td>
        <td class="td-farm_location_address"> <?php echo $data['farm_location_address']; ?></td>
        <td class="td-farming_season_use"> <?php echo $data['farming_season_use']; ?></td>
        <td class="td-season_starts"> <?php echo $data['season_starts']; ?></td>
        <td class="td-season_ends"> <?php echo $data['season_ends']; ?></td>
        <td class="td-average_yearly_income_range"> <?php echo $data['average_yearly_income_range']; ?></td>
        <td class="td-other_source_of_income"> <?php echo $data['other_source_of_income']; ?></td>
        <td class="td-form_of_support_need"> <?php echo $data['form_of_support_need']; ?></td>
        <td class="td-remarks"> <?php echo $data['remarks']; ?></td>
        <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
        <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
        <td class="td-image"> <?php echo $data['image']; ?></td>
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("farmers/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("farmers/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("farmers/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    