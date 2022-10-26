<?php 
/**
 * Orders Page Controller
 * @category  Controller
 */
class OrdersController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "orders";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"name", 
			"phone", 
			"location_address", 
			"commodity_need", 
			"quantity", 
			"expected_delivery_date", 
			"delivery_date", 
			"delivery_status", 
			"unit_price", 
			"amount", 
			"payment_status", 
			"delivered_by", 
			"address");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				orders.id LIKE ? OR 
				orders.name LIKE ? OR 
				orders.phone LIKE ? OR 
				orders.location_address LIKE ? OR 
				orders.commodity_need LIKE ? OR 
				orders.quantity LIKE ? OR 
				orders.expected_delivery_date LIKE ? OR 
				orders.delivery_date LIKE ? OR 
				orders.delivery_status LIKE ? OR 
				orders.unit_price LIKE ? OR 
				orders.amount LIKE ? OR 
				orders.payment_status LIKE ? OR 
				orders.delivered_by LIKE ? OR 
				orders.address LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "orders/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("orders.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Orders";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$view_name = (is_ajax() ? "orders/ajax-list.php" : "orders/list.php");
		$this->render_view($view_name, $data);
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"name", 
			"phone", 
			"location_address", 
			"commodity_need", 
			"quantity", 
			"expected_delivery_date", 
			"delivery_date", 
			"delivery_status", 
			"unit_price", 
			"amount", 
			"payment_status", 
			"delivered_by", 
			"address");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("orders.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Orders";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("orders/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("name","phone","location_address","commodity_need","quantity","expected_delivery_date","delivery_date","delivery_status","unit_price","amount","payment_status","delivered_by","address");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'name' => 'required',
				'phone' => 'required',
				'location_address' => 'required',
				'commodity_need' => 'required',
				'quantity' => 'required',
				'expected_delivery_date' => 'required',
				'delivery_date' => 'required',
				'delivery_status' => 'required',
				'unit_price' => 'required',
				'amount' => 'required',
				'payment_status' => 'required',
				'delivered_by' => 'required',
				'address' => 'required',
			);
			$this->sanitize_array = array(
				'name' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'commodity_need' => 'sanitize_string',
				'quantity' => 'sanitize_string',
				'expected_delivery_date' => 'sanitize_string',
				'delivery_date' => 'sanitize_string',
				'delivery_status' => 'sanitize_string',
				'unit_price' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'payment_status' => 'sanitize_string',
				'delivered_by' => 'sanitize_string',
				'address' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("orders");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Orders";
		$this->render_view("orders/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","name","phone","location_address","commodity_need","quantity","expected_delivery_date","delivery_date","delivery_status","unit_price","amount","payment_status","delivered_by","address");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'name' => 'required',
				'phone' => 'required',
				'location_address' => 'required',
				'commodity_need' => 'required',
				'quantity' => 'required',
				'expected_delivery_date' => 'required',
				'delivery_date' => 'required',
				'delivery_status' => 'required',
				'unit_price' => 'required',
				'amount' => 'required',
				'payment_status' => 'required',
				'delivered_by' => 'required',
				'address' => 'required',
			);
			$this->sanitize_array = array(
				'name' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'commodity_need' => 'sanitize_string',
				'quantity' => 'sanitize_string',
				'expected_delivery_date' => 'sanitize_string',
				'delivery_date' => 'sanitize_string',
				'delivery_status' => 'sanitize_string',
				'unit_price' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'payment_status' => 'sanitize_string',
				'delivered_by' => 'sanitize_string',
				'address' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("orders.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("orders");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("orders");
					}
				}
			}
		}
		$db->where("orders.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Orders";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("orders/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","name","phone","location_address","commodity_need","quantity","expected_delivery_date","delivery_date","delivery_status","unit_price","amount","payment_status","delivered_by","address");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'name' => 'required',
				'phone' => 'required',
				'location_address' => 'required',
				'commodity_need' => 'required',
				'quantity' => 'required',
				'expected_delivery_date' => 'required',
				'delivery_date' => 'required',
				'delivery_status' => 'required',
				'unit_price' => 'required',
				'amount' => 'required',
				'payment_status' => 'required',
				'delivered_by' => 'required',
				'address' => 'required',
			);
			$this->sanitize_array = array(
				'name' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'commodity_need' => 'sanitize_string',
				'quantity' => 'sanitize_string',
				'expected_delivery_date' => 'sanitize_string',
				'delivery_date' => 'sanitize_string',
				'delivery_status' => 'sanitize_string',
				'unit_price' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'payment_status' => 'sanitize_string',
				'delivered_by' => 'sanitize_string',
				'address' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("orders.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("orders.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("orders");
	}
}
