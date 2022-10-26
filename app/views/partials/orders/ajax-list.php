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
        <td class="td-id"><a href="<?php print_link("orders/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-name">
            <span  data-value="<?php echo $data['name']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-phone"><a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a></td>
        <td class="td-location_address">
            <span  data-value="<?php echo $data['location_address']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-commodity_need">
            <span  data-value="<?php echo $data['commodity_need']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="commodity_need" 
                data-title="Enter Commodity Need" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['commodity_need']; ?> 
            </span>
        </td>
        <td class="td-quantity">
            <span  data-value="<?php echo $data['quantity']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="quantity" 
                data-title="Enter Quantity" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['quantity']; ?> 
            </span>
        </td>
        <td class="td-expected_delivery_date">
            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['expected_delivery_date']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="expected_delivery_date" 
                data-title="Enter Expected Delivery Date" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['expected_delivery_date']; ?> 
            </span>
        </td>
        <td class="td-delivery_date">
            <span  data-flatpickr="{ minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['delivery_date']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="delivery_date" 
                data-title="Enter Delivery Date" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['delivery_date']; ?> 
            </span>
        </td>
        <td class="td-delivery_status">
            <span  data-value="<?php echo $data['delivery_status']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="delivery_status" 
                data-title="Enter Delivery Status" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['delivery_status']; ?> 
            </span>
        </td>
        <td class="td-unit_price">
            <span  data-value="<?php echo $data['unit_price']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="unit_price" 
                data-title="Enter Unit Price" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['unit_price']; ?> 
            </span>
        </td>
        <td class="td-amount">
            <span  data-value="<?php echo $data['amount']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="amount" 
                data-title="Enter Amount" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['amount']; ?> 
            </span>
        </td>
        <td class="td-payment_status">
            <span  data-value="<?php echo $data['payment_status']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="payment_status" 
                data-title="Enter Payment Status" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['payment_status']; ?> 
            </span>
        </td>
        <td class="td-delivered_by">
            <span  data-value="<?php echo $data['delivered_by']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="delivered_by" 
                data-title="Enter Delivered By" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['delivered_by']; ?> 
            </span>
        </td>
        <td class="td-address">
            <span  data-value="<?php echo $data['address']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("orders/editfield/" . urlencode($data['id'])); ?>" 
                data-name="address" 
                data-title="Enter Address" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['address']; ?> 
            </span>
        </td>
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("orders/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("orders/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("orders/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    