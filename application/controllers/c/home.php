<?php
class Home extends CI_Controller{
    var $base;

    function  __construct() {
		parent::__construct();
        $this->base =$this->config->item('base_url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
    }

    function index(){
        $this->login_check();
        $data['base']=$this->base;
        $data['title']="SaungSaji - online food order and delivery";
        $data['msg']="Welcome to SaungSaji";
		echo "Login Success !!";
    }

    function login_check(){
        $userId=$this->session->userdata('userId');
        if($userId!=null){
            redirect($this->base."/".$this->session->userdata('userType')."/home");
        }
    }	
}

?>