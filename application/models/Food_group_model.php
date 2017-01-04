<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_group_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
				//session_start();
				//$this->load->database();
        }
		
		public function getAllFoodGroup(){
		
			$this->db->select("*");
			
			$this->db->from('foodgroups');
			
			//$this->db->join("nutrient_component_lists","nutrient_component_lists.id = product_nutrient_map.nutrient_id");
			
			$query = $this->db->get();

			return ($query->result());
		}  	

		public function getListFoodGroupsJSON(){
								
			$query = $this->db->get('foodgroups');

			return json_encode($query->result());
		}

		public function getAllGroups(){
        	/*
         	$query = $this->db->query('SELECT fg_id, name FROM foodgroups');
        	return $query->result();
          */

      $this->db->select('fg_id,name');  
      $this->db->from('foodgroups');  
      $query = $this->db->get();  
      // the query mean select cat_id,category from category  
      foreach($query->result_array() as $row){  
         $data[$row['fg_id']]=$row['name'];  
      }  
      // the fetching data from database is return  
      return $data;  
    	}

    	public function get_subcategory_by_category($fg_id=string){  
      		$this->db->select('fgs_id,name');  
      		$this->db->from('foodgroups_subcategory');  
      		$this->db->where('fg_id',$fg_id);  
      		$query = $this->db->get();  
      		return $query->result();  
   		}  
}