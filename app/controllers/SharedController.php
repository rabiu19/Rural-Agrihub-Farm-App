<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * customers_commodity_of_intrest_option_list Model Action
     * @return array
     */
	function customers_commodity_of_intrest_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM commodity_type ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * community_district_option_list Model Action
     * @return array
     */
	function community_district_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM district ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * district_region_option_list Model Action
     * @return array
     */
	function district_region_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM region ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * inventory_name_option_list Model Action
     * @return array
     */
	function inventory_name_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM comodity_type ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * invoice_customer_id_option_list Model Action
     * @return array
     */
	function invoice_customer_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT id AS value , name AS label FROM customers ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * invoice_invoice_items_option_list Model Action
     * @return array
     */
	function invoice_invoice_items_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT invoice_number AS value , id AS label FROM invoice_item ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * farmers_community_option_list Model Action
     * @return array
     */
	function farmers_community_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM community ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * farmers_commodity_produce_option_list Model Action
     * @return array
     */
	function farmers_commodity_produce_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM commodity_type ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * farmers_season_starts_option_list Model Action
     * @return array
     */
	function farmers_season_starts_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT name AS value,name AS label FROM comodity_type ORDER BY id";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * invoice_item_item_inv_id_option_list Model Action
     * @return array
     */
	function invoice_item_item_inv_id_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT id AS value , name AS label FROM inventory ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * invoice_item_invoice_number_option_list Model Action
     * @return array
     */
	function invoice_item_invoice_number_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT invoice_number AS value , invoice_number AS label FROM invoice ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_customers Model Action
     * @return Value
     */
	function getcount_customers(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM customers";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_community Model Action
     * @return Value
     */
	function getcount_community(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM community";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_inventory Model Action
     * @return Value
     */
	function getcount_inventory(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM inventory";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_farmers Model Action
     * @return Value
     */
	function getcount_farmers(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM farmers";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_subscribtions Model Action
     * @return Value
     */
	function getcount_subscribtions(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM subscribtions";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
