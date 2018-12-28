<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends MY_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		exit;
		if($this->data['admin_active'] == 1){
			redirect('dashboard','refresh');
		} else {
			$this->form_validation->set_rules('data[otp]','OTP','trim|required|numeric|min_length[6]|max_length[6]|callback_validOTP');
			if($this->form_validation->run()){
				$result = $this->MANAGER->_StartSession();
				$this->session->set_flashdata('Message',$result['message']);
				if($result['success']==1)
					redirect(site_url('dashboard'));
					$this->parser->parse('otp',$this->data);	
			} else {
				$message = "Dear ".$this->data['admin_name'].", Your OTP for Administration login is ".$this->data['admin_otp'].". Please don't share your otp with anyone else for security reasons.";
				$message = urlencode($message); 
				$send = "https://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=TpBK4TD8JeX&MobileNo=91".
				$this->data['admin_phone']."&SenderID=AUSHAD&Message=".$message."&ServiceName=TEMPLATE_BASED";
				$ch=curl_init(); 
				curl_setopt($ch,CURLOPT_URL,$send); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
				$output =curl_exec($ch); 
				curl_close($ch);	
				$this->parser->parse('otp',$this->data);	
			}
		}	
	}

	function Dashboard(){
		if($this->data['admin_active'] == 1) $this->parser->parse('settings/manager/dashboard',$this->data);		
		else redirect('otp','refresh');
	}

	function Profile(){
		if($this->data['admin_active'] == 1){
			if($this->form_validation->run('Profile')===TRUE){
				$result = $this->MANAGER->_UpdateProfile();
				$this->session->set_flashdata('Message', $result['message']);
				redirect(site_url('profile'));
			} else	$this->parser->parse('settings/manager/profile',$this->data);		
		} else redirect('otp','refresh');	
	}

	function Password(){
		if($this->data['admin_active'] == 1){
			if($this->form_validation->run('Password')===TRUE){
				$result = $this->MANAGER->_ResetPassword();
				$this->session->set_flashdata('Message', $result['message']);
				redirect(site_url('password'));
			} else	$this->parser->parse('settings/manager/password',$this->data);	
		} else redirect('otp','refresh');
	}

	function Logout(){
		if($this->data['admin_active'] == 1 OR $this->data['admin_active'] == 0){
		 	$result = $this->MANAGER->_DestrorySession();
			$this->session->set_flashdata('Message',$result['message']);
			if($result['success']==1)
				$this->session->unset_userdata('user');
				redirect(base_url());
		} else redirect(site_url('otp'),'refresh')	;
	}


	function validOTP($otp){
		//echo $this->data['customer_otp']; exit;
		if ($otp == $this->data['admin_otp']){
            return TRUE;
        } else {                
        	$this->form_validation->set_message('validOTP', 'The %s is not valid!! Please Try Again..');
            return FALSE;
        }
    }

	function search_fields(){
	    $country_id = $this->input->get('term');
    	$data['var']= $this->MANAGER->search_field($country_id); 
    	echo json_encode($data['var']);
	}
}
