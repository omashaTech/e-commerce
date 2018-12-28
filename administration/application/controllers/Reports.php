<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller {

	function __construct(){
		parent::__construct();
		
		//$this->_isLoggedIn();
		$this->load->model('Customer_Model','CUSTOMER');
		$this->load->model('Vendor_Model','VENDOR');
	}

	function index()	{	
		//$this->parser->parse('category/index',$this->data);		
	}

	function CustomersList(){
		$this->data['customers'] = $this->CUSTOMER->_GetCustomersList();
		$this->parser->parse('reports/customers/index',$this->data);		
	}

	function VendorsList(){
		$this->data['vendors'] = $this->VENDOR->_GetVendorsList();
		$this->parser->parse('reports/vendors/index',$this->data);		
	}

	function VendorDetails($id)	{
		if($this->form_validation->run('Vendors')){
			$result = $this->VENDOR->_UpdateVendorDetails($id);
			$this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("vendors"));	
				redirect(site_url("vendor-details/$id"));
		} else {
			$this->data['states']= $this->VENDOR->_GetStates();
			$this->data['profile'] = $this->VENDOR->_GetVendorDetailsById($id);
			$this->parser->parse('reports/vendors/details',$this->data);		
		}
	}
}
