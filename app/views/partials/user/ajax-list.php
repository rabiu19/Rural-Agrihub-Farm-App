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
    <th class="td-sno"><?php echo $counter; ?></th>
    <td class="td-image"><?php Html :: page_img($data['image'],50,50,1); ?></td>
    <td class="td-name"> <?php echo $data['name']; ?></td>
    <td class="td-username"> <?php echo $data['username']; ?></td>
    <td class="td-email"><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
    <td class="td-role"> <?php echo $data['role']; ?></td>
    <td class="td-date_created"> <?php echo $data['date_created']; ?></td>
    <td class="td-date_updated"> <?php echo $data['date_updated']; ?></td>
    <th class="td-btn">
        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("user/view/$rec_id"); ?>">
            <i class="material-icons">visibility</i> View
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
