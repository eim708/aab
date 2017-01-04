<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * @name Login.php
 * @author Imron rosdiana
 */
class Login extends CI_Controller
{
 
    function __construct() {
        parent::__construct();
        $this->load->model("login_model", "login");
        if(!empty($_SESSION['id']))
            redirect('home');
    }
 
    public function index() {
        if($_POST) {
            $result = $this->login->validate_user($_POST);
            if(!empty($result)) {
                $data = [
                    'id' => $result->id_user,
                    'username' => $result->username
                ];
 
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('flash_data', 'Username or password is wrong!');
                redirect('login');
            }
        }
 
        $this->load->view("login");
    }
}