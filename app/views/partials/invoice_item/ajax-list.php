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
        <td class="td-id"><a href="<?php print_link("invoice_item/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-item_inv_id">
            <span  data-value="<?php echo $data['item_inv_id']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("invoice_item/editfield/" . urlencode($data['id'])); ?>" 
                data-name="item_inv_id" 
                data-title="Enter Item Inv Id" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['item_inv_id']; ?> 
            </span>
        </td>
        <td class="td-invoice_number">
            <span  data-value="<?php echo $data['invoice_number']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("invoice_item/editfield/" . urlencode($data['id'])); ?>" 
                data-name="invoice_number" 
                data-title="Enter Invoice Number" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['invoice_number']; ?> 
            </span>
        </td>
        <td class="td-date"> <?php echo $data['date']; ?></td>
        <td class="td-quantity">
            <span  data-value="<?php echo $data['quantity']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("invoice_item/editfield/" . urlencode($data['id'])); ?>" 
                data-name="quantity" 
                data-title="Enter Quantity" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['quantity']; ?> 
            </span>
        </td>
        <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
        <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("invoice_item/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("invoice_item/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("invoice_item/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    