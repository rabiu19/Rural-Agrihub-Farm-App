<?php 
/**
 * Farmer Page Controller
 * @category  Controller
 */
class FarmerController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "farmer";
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
			"address", 
			"phone", 
			"sex", 
			"dob", 
			"date", 
			"community_name", 
			"crop_cetegory", 
			"farm_location", 
			"location_address", 
			"training_type_needed", 
			"average_anual_income", 
			"other_source_of_income", 
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
				farmer.id LIKE ? OR 
				farmer.image LIKE ? OR 
				farmer.name LIKE ? OR 
				farmer.email LIKE ? OR 
				farmer.address LIKE ? OR 
				farmer.phone LIKE ? OR 
				farmer.sex LIKE ? OR 
				farmer.dob LIKE ? OR 
				farmer.date LIKE ? OR 
				farmer.community_name LIKE ? OR 
				farmer.crop_cetegory LIKE ? OR 
				farmer.farm_location LIKE ? OR 
				farmer.location_address LIKE ? OR 
				farmer.training_type_needed LIKE ? OR 
				farmer.average_anual_income LIKE ? OR 
				farmer.other_source_of_income LIKE ? OR 
				farmer.crop_type LIKE ? OR 
				farmer.currentFarmLocation LIKE ? OR 
				farmer.farmLocationCoordinates LIKE ? OR 
				farmer.farmFootage LIKE ? OR 
				farmer.preferredFarming_Season LIKE ? OR 
				farmer.farming_season_starts LIKE ? OR 
				farmer.farming_season_ends LIKE ? OR 
				farmer.date_created LIKE ? OR 
				farmer.date_updated LIKE ? OR 
				farmer.notes LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "farmer/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("farmer.id", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Farmer";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$view_name = (is_ajax() ? "farmer/ajax-list.php" : "farmer/list.php");
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
			"image", 
			"name", 
			"email", 
			"address", 
			"phone", 
			"sex", 
			"dob", 
			"date", 
			"community_name", 
			"crop_cetegory", 
			"farm_location", 
			"location_address", 
			"training_type_needed", 
			"average_anual_income", 
			"other_source_of_income", 
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
			$db->where("farmer.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Farmer";
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
		return $this->render_view("farmer/view.php", $record);
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
			$fields = $this->fields = array("image","name","email","address","phone","sex","dob","community_name","crop_cetegory","farm_location","location_address","training_type_needed","average_anual_income","other_source_of_income","crop_type","currentFarmLocation","farmLocationCoordinates","farmFootage","preferredFarming_Season","farming_season_starts","farming_season_ends","date_created","date_updated","notes");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'image' => 'required',
				'name' => 'required',
				'email' => 'required|valid_email',
				'address' => 'required',
				'phone' => 'required',
				'sex' => 'required',
				'dob' => 'required',
				'community_name' => 'required',
				'crop_cetegory' => 'required',
				'farm_location' => 'required',
				'location_address' => 'required',
				'training_type_needed' => 'required',
				'average_anual_income' => 'required',
				'other_source_of_income' => 'required',
				'crop_type' => 'required',
				'currentFarmLocation' => 'required',
				'farmLocationCoordinates' => 'required',
				'farmFootage' => 'required',
				'preferredFarming_Season' => 'required',
				'farming_season_starts' => 'required',
				'farming_season_ends' => 'required',
				'date_created' => 'required',
				'date_updated' => 'required',
				'notes' => 'required',
			);
			$this->sanitize_array = array(
				'image' => 'sanitize_string',
				'name' => 'sanitize_string',
				'email' => 'sanitize_string',
				'address' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'sex' => 'sanitize_string',
				'dob' => 'sanitize_string',
				'community_name' => 'sanitize_string',
				'crop_cetegory' => 'sanitize_string',
				'farm_location' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'training_type_needed' => 'sanitize_string',
				'average_anual_income' => 'sanitize_string',
				'other_source_of_income' => 'sanitize_string',
				'crop_type' => 'sanitize_string',
				'currentFarmLocation' => 'sanitize_string',
				'farmLocationCoordinates' => 'sanitize_string',
				'farmFootage' => 'sanitize_string',
				'preferredFarming_Season' => 'sanitize_string',
				'farming_season_starts' => 'sanitize_string',
				'farming_season_ends' => 'sanitize_string',
				'date_created' => 'sanitize_string',
				'date_updated' => 'sanitize_string',
				'notes' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("farmer");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Farmer";
		$this->render_view("farmer/add.php");
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
		$fields = $this->fields = array("id","image","name","email","address","phone","sex","dob","community_name","crop_cetegory","farm_location","location_address","training_type_needed","average_anual_income","other_source_of_income","crop_type","currentFarmLocation","farmLocationCoordinates","farmFootage","preferredFarming_Season","farming_season_starts","farming_season_ends","date_created","date_updated","notes");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'image' => 'required',
				'name' => 'required',
				'email' => 'required|valid_email',
				'address' => 'required',
				'phone' => 'required',
				'sex' => 'required',
				'dob' => 'required',
				'community_name' => 'required',
				'crop_cetegory' => 'required',
				'farm_location' => 'required',
				'location_address' => 'required',
				'training_type_needed' => 'required',
				'average_anual_income' => 'required',
				'other_source_of_income' => 'required',
				'crop_type' => 'required',
				'currentFarmLocation' => 'required',
				'farmLocationCoordinates' => 'required',
				'farmFootage' => 'required',
				'preferredFarming_Season' => 'required',
				'farming_season_starts' => 'required',
				'farming_season_ends' => 'required',
				'date_created' => 'required',
				'date_updated' => 'required',
				'notes' => 'required',
			);
			$this->sanitize_array = array(
				'image' => 'sanitize_string',
				'name' => 'sanitize_string',
				'email' => 'sanitize_string',
				'address' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'sex' => 'sanitize_string',
				'dob' => 'sanitize_string',
				'community_name' => 'sanitize_string',
				'crop_cetegory' => 'sanitize_string',
				'farm_location' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'training_type_needed' => 'sanitize_string',
				'average_anual_income' => 'sanitize_string',
				'other_source_of_income' => 'sanitize_string',
				'crop_type' => 'sanitize_string',
				'currentFarmLocation' => 'sanitize_string',
				'farmLocationCoordinates' => 'sanitize_string',
				'farmFootage' => 'sanitize_string',
				'preferredFarming_Season' => 'sanitize_string',
				'farming_season_starts' => 'sanitize_string',
				'farming_season_ends' => 'sanitize_string',
				'date_created' => 'sanitize_string',
				'date_updated' => 'sanitize_string',
				'notes' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("farmer.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("farmer");
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
						return	$this->redirect("farmer");
					}
				}
			}
		}
		$db->where("farmer.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Farmer";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("farmer/edit.php", $data);
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
		$fields = $this->fields = array("id","image","name","email","address","phone","sex","dob","community_name","crop_cetegory","farm_location","location_address","training_type_needed","average_anual_income","other_source_of_income","crop_type","currentFarmLocation","farmLocationCoordinates","farmFootage","preferredFarming_Season","farming_season_starts","farming_season_ends","date_created","date_updated","notes");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'image' => 'required',
				'name' => 'required',
				'email' => 'required|valid_email',
				'address' => 'required',
				'phone' => 'required',
				'sex' => 'required',
				'dob' => 'required',
				'community_name' => 'required',
				'crop_cetegory' => 'required',
				'farm_location' => 'required',
				'location_address' => 'required',
				'training_type_needed' => 'required',
				'average_anual_income' => 'required',
				'other_source_of_income' => 'required',
				'crop_type' => 'required',
				'currentFarmLocation' => 'required',
				'farmLocationCoordinates' => 'required',
				'farmFootage' => 'required',
				'preferredFarming_Season' => 'required',
				'farming_season_starts' => 'required',
				'farming_season_ends' => 'required',
				'date_created' => 'required',
				'date_updated' => 'required',
				'notes' => 'required',
			);
			$this->sanitize_array = array(
				'image' => 'sanitize_string',
				'name' => 'sanitize_string',
				'email' => 'sanitize_string',
				'address' => 'sanitize_string',
				'phone' => 'sanitize_string',
				'sex' => 'sanitize_string',
				'dob' => 'sanitize_string',
				'community_name' => 'sanitize_string',
				'crop_cetegory' => 'sanitize_string',
				'farm_location' => 'sanitize_string',
				'location_address' => 'sanitize_string',
				'training_type_needed' => 'sanitize_string',
				'average_anual_income' => 'sanitize_string',
				'other_source_of_income' => 'sanitize_string',
				'crop_type' => 'sanitize_string',
				'currentFarmLocation' => 'sanitize_string',
				'farmLocationCoordinates' => 'sanitize_string',
				'farmFootage' => 'sanitize_string',
				'preferredFarming_Season' => 'sanitize_string',
				'farming_season_starts' => 'sanitize_string',
				'farming_season_ends' => 'sanitize_string',
				'date_created' => 'sanitize_string',
				'date_updated' => 'sanitize_string',
				'notes' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("farmer.id", $rec_id);;
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
		$db->where("farmer.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("farmer");
	}
}
