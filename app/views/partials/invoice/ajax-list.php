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
        <td class="td-invoice_number"> <span><?php echo "# ".$data['invoice_number']; ?></span></td>
        <td class="td-customer_id">
            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("customers/view/" . urlencode($data['customer_id'])) ?>">
                <i class="material-icons">visibility</i> <?php echo $data['customers_name'] ?>
            </a>
        </td>
        <td class="td-invoice_items">
            <?php
            $page_fields = array('invoice_number' => $data['invoice_number']);
            $page_link = "masterdetail/index/invoice/invoice_item/invoice_number/" . urlencode($data['invoice_number']);
            $md_pagelink = set_page_link($page_link, $page_fields); 
            ?>
            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link($md_pagelink) ?>">
                <i class="material-icons ">remove_red_eye</i> <?php echo $data['invoice_items'] ?>
            </a>
        </td>
        <td class="td-vat_percentage">
            <span  data-value="<?php echo $data['vat_percentage']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("invoice/editfield/" . urlencode($data['id'])); ?>" 
                data-name="vat_percentage" 
                data-title="Enter Vat Percentage(%)" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['vat_percentage']; ?> 
            </span>
        </td>
        <td class="td-status">
            <span  data-source='<?php echo json_encode_quote(Menu :: $status2); ?>' 
                data-value="<?php echo $data['status']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("invoice/editfield/" . urlencode($data['id'])); ?>" 
                data-name="status" 
                data-title="Select a value ..." 
                data-placement="left" 
                data-toggle="click" 
                data-type="select" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['status']; ?> 
            </span>
        </td>
        <td class="td-discount_amt">
            <span  data-step="0.1" 
                data-value="<?php echo $data['discount_amt']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("invoice/editfield/" . urlencode($data['id'])); ?>" 
                data-name="discount_amt" 
                data-title="Enter Discount Amt" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['discount_amt']; ?> 
            </span>
        </td>
        <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
        <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("invoice/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("invoice/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("invoice/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    