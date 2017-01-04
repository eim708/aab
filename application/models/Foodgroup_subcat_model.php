<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foodgroup_subcat_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
				//session_start();
				//$this->load->database();
        }
		
		public function getAllFoodGroupSubCat(){
		
			$this->db->select("*");
			
			$this->db->from('foodgroups_subcategory');
			
			//$this->db->join("nutrient_component_lists","nutrient_component_lists.id = product_nutrient_map.nutrient_id");
			
			$query = $this->db->get();

			return ($query->result());
		}  	

		public function getAllGroupsSubCat(){
        	/*
       		 $query = $this->db->get('location');

        	foreach ($query->result() as $row)
        	{
            	echo $row->description;
       	 }*/

        	$query = $this->db->query('SELECT name FROM foodgroups_subcategory');

        	return $query->result();
			//echo 'Total Results: ' . $query->num_rows();
    	}

/*
    	function get_subcategory_by_category ($row1 = null){
        
        	$this->db->select('fgs_id, name');

        	if($row1 != NULL){
 				$this->db->where('fg_id', $row1);
 			}
 
 			$query = $this->db->get('foodgroups_subcategory');
 
 			$foodgroups_subcategory = array();
 
 			if($query->result()){
 				foreach ($query->result() as $subcat) {
 					$foodgroups_subcategory[$subcat->fg_id] = $subcat->name;
 				}
 				return $foodgroups_subcategory;
 			}else{
 				return FALSE;
 			}
    	}*/

    	public function get_subcategory_by_category($fg_id=string){  
      		$this->db->select('fgs_id,name');  
      		$this->db->from('foodgroups_subcategory');  
      		$this->db->where('fg_id',$fg_id);  
      		$query = $this->db->get();  
      		return $query->result();  
   		}  
}