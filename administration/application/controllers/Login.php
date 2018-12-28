<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Manager_Model',"MANAGER");
	}

	function index(){
		if(isset($this->session->userdata['user'])){
			if($this->data['admin_active'] == 1){
				redirect(site_url('dashboard'),'refresh');	
			}  else {
				redirect(site_url('otp'),'refresh');					
			}
		} else {
			$this->form_validation->set_rules('data[username]', 'Username', 'required');
			$this->form_validation->set_rules('data[password]', 'Password', 'required');
			if($this->form_validation->run()===TRUE){
				$result = $this->MANAGER->_Login();
				$this->session->set_flashdata('Message',$result['message']);
				if($result['success']==1)
					//redirect(site_url('otp'));
					redirect(site_url('dashboard'));
					redirect(site_url());	
			} else $this->load->view('index');
		}
		
	}

	function test() {
		if($this->input->post()){
			$data = array(
				'username' => $this->input->post('name'),
				'pwd'=>$this->input->post('pwd')
			);
			//Either you can print value or you can send value to database
			echo json_encode($data);	
		} else $this->load->view('test');
		
	}	

	function response(){
		$fname = $this->input->post('name');
		$pwd  =  $this->input->post('pwd');
		echo "Dear $fname!!  Hope you live well in  $pwd.";
	}
}