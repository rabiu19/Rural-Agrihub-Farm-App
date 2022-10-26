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
        <td class="td-id"><a href="<?php print_link("comodity_type/view/$data[id]") ?>"><?php echo $data['id']; ?></a></td>
        <td class="td-name">
            <span  data-value="<?php echo $data['name']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("comodity_type/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-category">
            <span  data-value="<?php echo $data['category']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("comodity_type/editfield/" . urlencode($data['id'])); ?>" 
                data-name="category" 
                data-title="Enter Category" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" >
                <?php echo $data['category']; ?> 
            </span>
        </td>
        <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
        <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
        <td class="td-image">
            <span  data-value="<?php echo $data['image']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("comodity_type/editfield/" . urlencode($data['id'])); ?>" 
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
        <th class="td-btn">
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("comodity_type/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> View
            </a>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("comodity_type/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("comodity_type/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
    