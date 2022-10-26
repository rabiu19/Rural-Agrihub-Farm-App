<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="material-icons ">home</i>'
		),
		
		array(
			'path' => 'region', 
			'label' => 'Location', 
			'icon' => '<i class="material-icons ">my_location</i>','submenu' => array(
		array(
			'path' => 'region', 
			'label' => 'Region', 
			'icon' => '<i class="material-icons ">location_on</i>'
		),
		
		array(
			'path' => 'district', 
			'label' => 'District', 
			'icon' => '<i class="material-icons ">location_searching</i>'
		),
		
		array(
			'path' => 'community', 
			'label' => 'Community', 
			'icon' => '<i class="material-icons ">location_city</i>'
		)
	)
		),
		
		array(
			'path' => 'replationship', 
			'label' => 'Relationshps', 
			'icon' => '<i class="material-icons ">accessibility</i>','submenu' => array(
		array(
			'path' => 'customers', 
			'label' => 'Clients', 
			'icon' => '<i class="material-icons ">people</i>'
		),
		
		array(
			'path' => 'farmers', 
			'label' => 'farmers', 
			'icon' => '<i class="material-icons ">people_outline</i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'Users', 
			'icon' => '<i class="material-icons ">nature_people</i>'
		),
		
		array(
			'path' => 'subscribe', 
			'label' => 'Subscriptions', 
			'icon' => '<i class="material-icons ">subscriptions</i>'
		)
	)
		),
		
		array(
			'path' => 'inventory', 
			'label' => 'Inventory', 
			'icon' => '<i class="material-icons ">add_shopping_cart</i>','submenu' => array(
		array(
			'path' => 'inventory', 
			'label' => 'Inventory', 
			'icon' => '<i class="material-icons ">shopping_basket</i>'
		),
		
		array(
			'path' => 'comodity_type', 
			'label' => 'Comodity Type', 
			'icon' => '<i class="material-icons ">local_florist</i>'
		),
		
		array(
			'path' => 'comodity_category', 
			'label' => 'Comodity Category', 
			'icon' => '<i class="material-icons ">line_weight</i>'
		)
	)
		),
		
		array(
			'path' => 'invoice', 
			'label' => 'Invoice', 
			'icon' => '<i class="material-icons ">monetization_on</i>','submenu' => array(
		array(
			'path' => 'invoice', 
			'label' => 'Invoice', 
			'icon' => '<i class="material-icons ">attach_money</i>'
		),
		
		array(
			'path' => 'invoice_item', 
			'label' => 'Invoice Item', 
			'icon' => '<i class="material-icons ">attach_file</i>'
		)
	)
		),
		
		array(
			'path' => 'yield', 
			'label' => 'Yield', 
			'icon' => '<i class="material-icons ">call_split</i>'
		)
	);
		
	
	
			public static $gender = array(
		array(
			"value" => "Male", 
			"label" => "Male", 
		),
		array(
			"value" => "Female", 
			"label" => "Female", 
		),);
		
			public static $status = array(
		array(
			"value" => "available", 
			"label" => "Available", 
		),
		array(
			"value" => "not available", 
			"label" => "Not Available", 
		),);
		
			public static $status2 = array(
		array(
			"value" => "paid", 
			"label" => "Paid", 
		),
		array(
			"value" => "not paid", 
			"label" => "Not Paid", 
		),
		array(
			"value" => "pending confirmation", 
			"label" => "Pending Confirmation", 
		),
		array(
			"value" => "confirmed", 
			"label" => "Confirmed", 
		),);
		
			public static $role = array(
		array(
			"value" => "admin", 
			"label" => "Admin", 
		),
		array(
			"value" => "staff", 
			"label" => "Staff", 
		),
		array(
			"value" => "user", 
			"label" => "User", 
		),);
		
			public static $farm_location = array(
		array(
			"value" => "backyard", 
			"label" => "Backyard", 
		),
		array(
			"value" => "closer to community dam", 
			"label" => "Closer To Community Dam", 
		),
		array(
			"value" => "outside community", 
			"label" => "Outside Community", 
		),);
		
			public static $farming_season_use = array(
		array(
			"value" => "Raining Season", 
			"label" => "Raining Season", 
		),
		array(
			"value" => "Dry Season", 
			"label" => "Dry Season", 
		),
		array(
			"value" => "All year round", 
			"label" => "All Year Round", 
		),);
		
			public static $season_ends = array(
		array(
			"value" => "Jan", 
			"label" => "Jan", 
		),
		array(
			"value" => "Feb", 
			"label" => "Feb", 
		),
		array(
			"value" => "Mar", 
			"label" => "Mar", 
		),
		array(
			"value" => "Apr", 
			"label" => "Apr", 
		),
		array(
			"value" => "may", 
			"label" => "May", 
		),
		array(
			"value" => "jun", 
			"label" => "Jun", 
		),
		array(
			"value" => "jul", 
			"label" => "Jul", 
		),
		array(
			"value" => "aug", 
			"label" => "Aug", 
		),
		array(
			"value" => "sept", 
			"label" => "Sept", 
		),
		array(
			"value" => "oct", 
			"label" => "Oct", 
		),
		array(
			"value" => "nov", 
			"label" => "Nov", 
		),
		array(
			"value" => "dec", 
			"label" => "Dec", 
		),);
		
			public static $average_yearly_income_range = array(
		array(
			"value" => "0-500", 
			"label" => "0-500", 
		),
		array(
			"value" => "501-1000", 
			"label" => "501-1000", 
		),
		array(
			"value" => "1001-1500", 
			"label" => "1001-1500", 
		),
		array(
			"value" => "1501-2000", 
			"label" => "1501-2000", 
		),
		array(
			"value" => "2001-2500", 
			"label" => "2001-2500", 
		),
		array(
			"value" => "3000+", 
			"label" => "3000+", 
		),);
		
			public static $form_of_support_need = array(
		array(
			"value" => "Financial", 
			"label" => "Financial", 
		),
		array(
			"value" => "farming knowledge empowerment", 
			"label" => "Farming Knowledge Empowerment", 
		),
		array(
			"value" => "marketing skills and access", 
			"label" => "Marketing Skills And Access", 
		),);
		
			public static $planting_status = array(
		array(
			"value" => "Planted", 
			"label" => "Planted", 
		),
		array(
			"value" => "yet to plant", 
			"label" => "Yet To Plant", 
		),);
		
			public static $input_application_status = array(
		array(
			"value" => "Applied", 
			"label" => "Applied", 
		),
		array(
			"value" => "not applied", 
			"label" => "Not Applied", 
		),);
		
			public static $weeding_status = array(
		array(
			"value" => "done", 
			"label" => "Done", 
		),
		array(
			"value" => "not done", 
			"label" => " Not Done", 
		),);
		
			public static $type_of_input_applied = array(
		array(
			"value" => "organic", 
			"label" => "Organic", 
		),
		array(
			"value" => "inorganic", 
			"label" => "Inorganic", 
		),
		array(
			"value" => "both orgniac & inorganic", 
			"label" => "Both Orgniac & Inorganic", 
		),);
		
}