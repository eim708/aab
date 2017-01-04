<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class Drop_model extends CI_Model
{
function get_dropdown_list()
{
$this->db->from('city');
$this->db->order_by('name');
$result = $this->db->get();
$return = array();
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
$return[$row['id']] = $row['name'];
}
}
       return $return;

}
	