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
        <td class="td-id"><a href="<?php print_link("subscriptions/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-email"><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
        <td class="td-message">
            <span  data-value="<?php echo $data['message']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("subscriptions/editfield/" . urlencode($data['id'])); ?>" 
                data-name="message" 
                data-title="Enter Message" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['message']; ?> 
            </span>
        </td>
        <td class="td-date_created">
            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['date_created']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("subscriptions/editfield/" . urlencode($data['id'])); ?>" 
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
                data-url="<?php print_link("subscriptions/editfield/" . urlencode($data['id'])); ?>" 
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
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("subscriptions/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("subscriptions/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("subscriptions/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    