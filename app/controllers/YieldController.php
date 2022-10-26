<?php 
/**
 * Yield Page Controller
 * @category  Controller
 */
class YieldController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "yield";
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
			"farmer_name", 
			"commodity_type", 
			"farm_size", 
			"planting_date", 
			"expected_date_for_input_application", 
			"planting_status", 
			"input_application_status", 
			"weeding_status", 
			"type_of_input_applied", 
			"qty_of_seed_used", 
			"qty_of_input_used", 
			"date_harvested", 
			"actual_yield_obtained", 
			"image", 
			"expected_yiled", 
			"remarks", 
			"date_created", 
			"date_updated");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				yield.id LIKE ? OR 
				yield.farmer_name LIKE ? OR 
				yield.commodity_type LIKE ? OR 
				yield.farm_size LIKE ? OR 
				yield.planting_date LIKE ? OR 
				yield.expected_date_for_input_application LIKE ? OR 
				yield.planting_status LIKE ? OR 
				yield.input_application_status LIKE ? OR 
				yield.weeding_status LIKE ? OR 
				yield.type_of_input_applied LIKE ? OR 
				yield.qty_of_seed_used LIKE ? OR 
				yield.qty_of_input_used LIKE ? OR 
				yield.date_harvested LIKE ? OR 
				yield.actual_yield_obtained LIKE ? OR 
				yield.image LIKE ? OR 
				yield.expected_yiled LIKE ? OR 
				yield.remarks LIKE ? OR 
				yield.date_created LIKE ? OR 
				yield.date_updated LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "yield/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("yield.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Yield";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$view_name = (is_ajax() ? "yield/ajax-list.php" : "yield/list.php");
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
			"farmer_name", 
			"farm_size", 
			"planting_date", 
			"expected_date_for_input_application", 
			"planting_status", 
			"input_application_status", 
			"weeding_status", 
			"type_of_input_applied", 
			"qty_of_seed_used", 
			"qty_of_input_used", 
			"date_harvested", 
			"actual_yield_obtained", 
			"image", 
			"expected_yiled", 
			"remarks", 
			"date_created", 
			"date_updated", 
			"commodity_type");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("yield.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Yield";
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
		return $this->render_view("yield/view.php", $record);
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
			$fields = $this->fields = array("farmer_name","commodity_type","farm_size","planting_date","expected_date_for_input_application","planting_status","input_application_status","weeding_status","type_of_input_applied","qty_of_seed_used","qty_of_input_used","date_harvested","actual_yield_obtained","image","expected_yiled","remarks");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'farmer_name' => 'required',
				'commodity_type' => 'required',
				'farm_size' => 'required',
				'weeding_status' => 'required',
				'type_of_input_applied' => 'required',
			);
			$this->sanitize_array = array(
				'farmer_name' => 'sanitize_string',
				'commodity_type' => 'sanitize_string',
				'farm_size' => 'sanitize_string',
				'planting_date' => 'sanitize_string',
				'expected_date_for_input_application' => 'sanitize_string',
				'planting_status' => 'sanitize_string',
				'input_application_status' => 'sanitize_string',
				'weeding_status' => 'sanitize_string',
				'type_of_input_applied' => 'sanitize_string',
				'qty_of_seed_used' => 'sanitize_string',
				'qty_of_input_used' => 'sanitize_string',
				'date_harvested' => 'sanitize_string',
				'actual_yield_obtained' => 'sanitize_string',
				'image' => 'sanitize_string',
				'expected_yiled' => 'sanitize_string',
				'remarks' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("yield");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Yield";
		$this->render_view("yield/add.php");
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
		$fields = $this->fields = array("id","farmer_name","commodity_type","farm_size","planting_date","expected_date_for_input_application","planting_status","input_application_status","weeding_status","type_of_input_applied","qty_of_seed_used","qty_of_input_used","date_harvested","actual_yield_obtained","image","expected_yiled","remarks");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'farmer_name' => 'required',
				'commodity_type' => 'required',
				'farm_size' => 'required',
				'weeding_status' => 'required',
				'type_of_input_applied' => 'required',
			);
			$this->sanitize_array = array(
				'farmer_name' => 'sanitize_string',
				'commodity_type' => 'sanitize_string',
				'farm_size' => 'sanitize_string',
				'planting_date' => 'sanitize_string',
				'expected_date_for_input_application' => 'sanitize_string',
				'planting_status' => 'sanitize_string',
				'input_application_status' => 'sanitize_string',
				'weeding_status' => 'sanitize_string',
				'type_of_input_applied' => 'sanitize_string',
				'qty_of_seed_used' => 'sanitize_string',
				'qty_of_input_used' => 'sanitize_string',
				'date_harvested' => 'sanitize_string',
				'actual_yield_obtained' => 'sanitize_string',
				'image' => 'sanitize_string',
				'expected_yiled' => 'sanitize_string',
				'remarks' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("yield.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("yield");
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
						return	$this->redirect("yield");
					}
				}
			}
		}
		$db->where("yield.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Yield";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("yield/edit.php", $data);
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
		$fields = $this->fields = array("id","farmer_name","commodity_type","farm_size","planting_date","expected_date_for_input_application","planting_status","input_application_status","weeding_status","type_of_input_applied","qty_of_seed_used","qty_of_input_used","date_harvested","actual_yield_obtained","image","expected_yiled","remarks");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'farmer_name' => 'required',
				'commodity_type' => 'required',
				'farm_size' => 'required',
				'weeding_status' => 'required',
				'type_of_input_applied' => 'required',
			);
			$this->sanitize_array = array(
				'farmer_name' => 'sanitize_string',
				'commodity_type' => 'sanitize_string',
				'farm_size' => 'sanitize_string',
				'planting_date' => 'sanitize_string',
				'expected_date_for_input_application' => 'sanitize_string',
				'planting_status' => 'sanitize_string',
				'input_application_status' => 'sanitize_string',
				'weeding_status' => 'sanitize_string',
				'type_of_input_applied' => 'sanitize_string',
				'qty_of_seed_used' => 'sanitize_string',
				'qty_of_input_used' => 'sanitize_string',
				'date_harvested' => 'sanitize_string',
				'actual_yield_obtained' => 'sanitize_string',
				'image' => 'sanitize_string',
				'expected_yiled' => 'sanitize_string',
				'remarks' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("yield.id", $rec_id);;
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
		$db->where("yield.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("yield");
	}
}
