<?php 
/**
 * Customer Page Controller
 * @category  Controller
 */
class CustomerController extends BaseController{
	function __construct(){
		parent::__construct();
		$this->tablename = "customer";
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
			"image", 
			"name", 
			"email", 
			"phone", 
			"sex", 
			"dob", 
			"date", 
			"community_name", 
			"farm_location", 
			"location_address", 
			"training_type_needed", 
			"average_anual_income", 
			"other_source_of_income", 
			"crop_cetegory", 
			"crop_type", 
			"currentFarmLocation", 
			"farmLocationCoordinates", 
			"farmFootage", 
			"preferredFarming_Season", 
			"farming_season_starts", 
			"farming_season_ends", 
			"date_created", 
			"date_updated", 
			"notes");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				customer.id LIKE ? OR 
				customer.image LIKE ? OR 
				customer.name LIKE ? OR 
				customer.email LIKE ? OR 
				customer.address LIKE ? OR 
				customer.phone LIKE ? OR 
				customer.sex LIKE ? OR 
				customer.dob LIKE ? OR 
				customer.date LIKE ? OR 
				customer.community_name LIKE ? OR 
				customer.farm_location LIKE ? OR 
				customer.location_address LIKE ? OR 
				customer.training_type_needed LIKE ? OR 
				customer.average_anual_income LIKE ? OR 
				customer.other_source_of_income LIKE ? OR 
				customer.crop_cetegory LIKE ? OR 
				customer.crop_type LIKE ? OR 
				customer.currentFarmLocation LIKE ? OR 
				customer.farmLocationCoordinates LIKE ? OR 
				customer.farmFootage LIKE ? OR 
				customer.preferredFarming_Season LIKE ? OR 
				customer.farming_season_starts LIKE ? OR 
				customer.farming_season_ends LIKE ? OR 
				customer.date_created LIKE ? OR 
				customer.date_updated LIKE ? OR 
				customer.notes LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "customer/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("customer.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Customer";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("customer/list.php", $data); //render the full page
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
			"image", 
			"name", 
			"email", 
			"address", 
			"phone", 
			"sex", 
			"dob", 
			"date", 
			"community_name", 
			"farm_location", 
			"location_address", 
			"training_type_needed", 
			"average_anual_income", 
			"other_source_of_income", 
			"crop_cetegory", 
			"crop_type", 
			"currentFarmLocation", 
			"farmLocationCoordinates", 
			"farmFootage", 
			"preferredFarming_Season", 
			"farming_season_starts", 
			"farming_season_ends", 
			"date_created", 
			"date_updated", 
			"notes");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("customer.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$this->write_to_log("view", "true");
			$page_title = $this->view->page_title = "View  Customer";
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
		return $this->render_view("customer/view.php", $record);
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
			$fields = $this->fields = array("image","name","email","address","phone","sex","dob","community_name","crop_type","crop_cetegory","farm_location","average_anual_income","other_source_of_income","location_address","training_type_needed","currentFarmLocation","farmLocationCoordinates","farmFootage","preferredFarming_Season","farming_season_starts","farming_season_ends","date","notes");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'name' => 'required',
				'phone' => 'required|numeric|max_numeric,10|min_numeric,10',
				'sex' => 'required',
				'community_name' => 'required',
				'crop_type' => 'required',
				'crop_cetegory' => 'required',
				'farm_location' => 'required',
				'average_anual_income' => 'required',
				'other_source_of_income' => 'required',
				'location_address' => 'required',
				'training_type_needed' => 'required',
				'currentFarmLocation' => 'required',
				'farmLocationCoordinates' => 'required',
				'farmFootage' => 'required',
				'preferredFarming_Season' => 'required',
				'farming_season_starts' => 'required',
				'farming_season_ends' => 'required',
				'notes' => 'required',
			);
			$this->sanitize_array = array(
				'image' => 'sanitize_string',
				'name' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'sex' => 'sanitize_string',
				'dob' => 'sanitize_string',
				'community_name' => 'sanitize_string',
				'crop_type' => 'sanitize_string',
				'crop_cetegory' => 'sanitize_string',
				'farm_location' => 'sanitize_string',
				'average_anual_income' => 'sanitize_string',
				'other_source_of_income' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'training_type_needed' => 'sanitize_string',
				'currentFarmLocation' => 'sanitize_string',
				'farmLocationCoordinates' => 'sanitize_string',
				'farmFootage' => 'sanitize_string',
				'preferredFarming_Season' => 'sanitize_string',
				'farming_season_starts' => 'sanitize_string',
				'farming_season_ends' => 'sanitize_string',
				'notes' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date'] = "CURRENT_TIMESTAMP";
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->write_to_log("add", "true");
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("customer");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Customer";
		$this->render_view("customer/add.php");
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
		$fields = $this->fields = array("id","image","name","email","address","phone","sex","dob","community_name","crop_type","crop_cetegory","farm_location","average_anual_income","other_source_of_income","location_address","training_type_needed","currentFarmLocation","farmLocationCoordinates","farmFootage","preferredFarming_Season","farming_season_starts","farming_season_ends","date_updated","date","notes");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'name' => 'required',
				'phone' => 'required|numeric|max_numeric,10|min_numeric,10',
				'sex' => 'required',
				'community_name' => 'required',
				'crop_type' => 'required',
				'crop_cetegory' => 'required',
				'farm_location' => 'required',
				'average_anual_income' => 'required',
				'other_source_of_income' => 'required',
				'location_address' => 'required',
				'training_type_needed' => 'required',
				'currentFarmLocation' => 'required',
				'farmLocationCoordinates' => 'required',
				'farmFootage' => 'required',
				'preferredFarming_Season' => 'required',
				'farming_season_starts' => 'required',
				'farming_season_ends' => 'required',
				'date_updated' => 'required',
				'notes' => 'required',
			);
			$this->sanitize_array = array(
				'image' => 'sanitize_string',
				'name' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'sex' => 'sanitize_string',
				'dob' => 'sanitize_string',
				'community_name' => 'sanitize_string',
				'crop_type' => 'sanitize_string',
				'crop_cetegory' => 'sanitize_string',
				'farm_location' => 'sanitize_string',
				'average_anual_income' => 'sanitize_string',
				'other_source_of_income' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'training_type_needed' => 'sanitize_string',
				'currentFarmLocation' => 'sanitize_string',
				'farmLocationCoordinates' => 'sanitize_string',
				'farmFootage' => 'sanitize_string',
				'preferredFarming_Season' => 'sanitize_string',
				'farming_season_starts' => 'sanitize_string',
				'farming_season_ends' => 'sanitize_string',
				'date_updated' => 'sanitize_string',
				'notes' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['date'] = "CURRENT_TIMESTAMP";
			if($this->validated()){
				$db->where("customer.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("customer");
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
						return	$this->redirect("customer");
					}
				}
			}
		}
		$db->where("customer.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Customer";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("customer/edit.php", $data);
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
		$fields = $this->fields = array("id","image","name","email","address","phone","sex","dob","community_name","crop_type","crop_cetegory","farm_location","average_anual_income","other_source_of_income","location_address","training_type_needed","currentFarmLocation","farmLocationCoordinates","farmFootage","preferredFarming_Season","farming_season_starts","farming_season_ends","date_updated","date","notes");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'name' => 'required',
				'phone' => 'required|numeric|max_numeric,10|min_numeric,10',
				'sex' => 'required',
				'community_name' => 'required',
				'crop_type' => 'required',
				'crop_cetegory' => 'required',
				'farm_location' => 'required',
				'average_anual_income' => 'required',
				'other_source_of_income' => 'required',
				'location_address' => 'required',
				'training_type_needed' => 'required',
				'currentFarmLocation' => 'required',
				'farmLocationCoordinates' => 'required',
				'farmFootage' => 'required',
				'preferredFarming_Season' => 'required',
				'farming_season_starts' => 'required',
				'farming_season_ends' => 'required',
				'date_updated' => 'required',
				'notes' => 'required',
			);
			$this->sanitize_array = array(
				'image' => 'sanitize_string',
				'name' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'sex' => 'sanitize_string',
				'dob' => 'sanitize_string',
				'community_name' => 'sanitize_string',
				'crop_type' => 'sanitize_string',
				'crop_cetegory' => 'sanitize_string',
				'farm_location' => 'sanitize_string',
				'average_anual_income' => 'sanitize_string',
				'other_source_of_income' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'training_type_needed' => 'sanitize_string',
				'currentFarmLocation' => 'sanitize_string',
				'farmLocationCoordinates' => 'sanitize_string',
				'farmFootage' => 'sanitize_string',
				'preferredFarming_Season' => 'sanitize_string',
				'farming_season_starts' => 'sanitize_string',
				'farming_season_ends' => 'sanitize_string',
				'date_updated' => 'sanitize_string',
				'notes' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("customer.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					$this->write_to_log("edit", "true");
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
		$db->where("customer.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->write_to_log("delete", "true");
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("customer");
	}
}
