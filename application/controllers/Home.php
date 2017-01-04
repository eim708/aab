<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name Home.php
 * @author Imron Rosdiana
 */
class Home extends CI_Controller
{
 
    function __construct() {
        parent::__construct();
 
        if(empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }
 
    public function index() {
        $this->load->view('home');
        $this->load->helper('form');

        $this->load->model("Food_group_model");
        $this->load->model("Foodgroup_subcat_model");

        //$data['city_list'] = $this->City_model->get_dropdown_list();
        //$this->load->view('my_view_file', $data); 
        $data['groups'] = $this->Food_group_model->getAllGroups();
        $data['groups_subcat'] = $this->Foodgroup_subcat_model->getAllGroupsSubCat();
    
        //$this->load->view('home',$data);
    }
 
    public function logout() {
        $data = ['id', 'username'];
        $this->session->unset_userdata($data);
 
        redirect('login');
    }

    public function get_subcategory() {  
      
        //set selected country id from POST  
        echo $id_category = $this->input->post('id',TRUE);  
        //run the query for the cities we specified earlier  
        $subcatData['subcatDrop']=$this->Food_group_model->get_subcategory_by_category($id_category);  
        $output = null;  
        foreach ($subcatData['subcatDrop'] as $row)  
        {  
            //here we build a dropdown item line for each query result  
            $output .= "<option value='".$row->fgs_id."'>".$row->name."</option>";  
        }  
        echo $output;  
    }

}