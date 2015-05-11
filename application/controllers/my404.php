<?php 
class My404 extends CI_Controller{
	var $base;

	function __construct(){
        parent::__construct(); 
		$this->base =$this->config->item('base_url');
		$this->load->library('session');
    } 

	function index(){ 
        //$this->output->set_status_header('404'); 
        //$data['content'] = 'error_404'; // View name 
		//$this->load->view('index',$data);//loading in my template 
		//$this->user_type_check();
        $data['base'] = $this->base;
        $data['title']="Error Page";
		$data['pesan']="";
		$data['msg']="";
        
		$this->load->view('header', $data);		
		$this->load->view('menu', $data);
		$this->load->view('login', $data);
		$this->load->view('footer', $data);
    } 
} 
?> 