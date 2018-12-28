<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Ecommerce extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->editor();
		$this->load->model('Ecommerce_Model','eCOMMERCE');
		$this->data['categories']	= $this->eCOMMERCE->_GetCategoryTree();
		if($this->input->post()){
			$this->data['post'] = $this->input->post();	
		}
		//$this->load->model('Medicine_Model','MEDICINE');
		//$this->data['pharmacy'] 	= $this->MEDICINE->_GetAllPharmaList();
	}

	function CategoryList()	{	
		$this->parser->parse('ecommerce/category-list',$this->data);		
	}

	function CreateCategory()	{	
		if($this->form_validation->run('Category')===TRUE){
			$result = $this->eCOMMERCE->_InsertCategory();
			$this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("categories"));	
				redirect(site_url("add-category"));	
		} else	$this->parser->parse('ecommerce/category-add',$this->data);		
	}

	function UpdateCategory($id){
		if($this->form_validation->run('Category')===TRUE){
			$result = $this->eCOMMERCE->_UpdateCategory($id);
            $this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("categories"));	
				redirect(site_url("update-category/$id"));	
        } else {   
    		$this->data['details'] 	= $this->eCOMMERCE->_GetCategoryById($id);		
    		$this->data['disable']	= $this->eCOMMERCE->_GetCategoryTree($id);
			$this->parser->parse('ecommerce/category-update',$this->data);		
		}
		
	}

	function DeleteCategory(){
		$result = $this->eCOMMERCE->_DeleteCategory();
		$this->session->set_flashdata('Message', $result['message']);
		redirect(site_url('categories'));
	}


/*
	function BrandList(){        
		$records 	= $this->eCOMMERCE->_BrandRecordCount();
		$config 	= $this->pagination(base_url("brands"),$records);
        $choice 	= $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        if($this->uri->segment(2)){
        	$this->data['serial'] = $this->uri->segment(2)+1;	
        } else {
        	$this->data['serial'] = 1;
        }
        $this->data["links"]  = $this->pagination->create_links();
        $this->data['brands'] = $this->eCOMMERCE->_GetAllBrands($config["per_page"], $page);
        
		$this->parser->parse('ecommerce/brand-list',$this->data);	
	}

*/
	function BrandList(){        
		$this->data['brands'] = $this->eCOMMERCE->_GetAllBrands();   
		$this->parser->parse('ecommerce/brand-list',$this->data);	
	}


	function AddBrand(){
		if($this->form_validation->run('Brands')=== TRUE){
			$result = $this->eCOMMERCE->_InsertBrand();
			$this->session->set_flashdata('Message', $result['message']);
            if($result['success'] == 1)
				redirect(site_url("brands"));	
				redirect(site_url("add-brand"));	
		} else {
			$this->parser->parse('ecommerce/brand-add',$this->data);	
		}
		
	}


	function UpdateBrand($id){
		if($this->form_validation->run('Brands')=== TRUE){
			$result = $this->eCOMMERCE->_UpdateBrand($id);
			$this->session->set_flashdata('Message', $result['message']);
            if($result['success'] == 1)
				redirect(site_url("brands"));	
				redirect(site_url("update-brand/$id"));	
		} else {
			$this->data['brands'] = $this->eCOMMERCE->_GetBrandById($id);
			$this->parser->parse('ecommerce/brand-update',$this->data);	
		}
		
	}

	function DeleteBrand(){
		$result = $this->eCOMMERCE->_DeleteBrands();
		$this->session->set_flashdata('Message', $result['message']);
		redirect(site_url("brands"),$this->data);
	}


	function ListProducts()	{	
        $this->data['products'] = $this->eCOMMERCE->_GetAllProductsList();
		$this->parser->parse('ecommerce/product-list',$this->data);
	}
	
	function CreateProduct()	{
		$this->data['categories']	= $this->eCOMMERCE->_GetCategoryTree();
		$this->data['brands']		= $this->eCOMMERCE->_GetAllBrands();
		$this->data['attributes'] 	= $this->eCOMMERCE->_GetAllAttributesList();
		if($this->form_validation->run('Products')=== TRUE){
			$result = $this->eCOMMERCE->_InsertProduct();
			$this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("products"));	
				redirect(site_url("add-product"));	
		} else {
			$this->parser->parse('ecommerce/product-add',$this->data);		
		}
	}

	function UpdateProduct($id)	{
		$this->data['categories']	= $this->eCOMMERCE->_GetCategoryTree();
		$this->data['brands']		= $this->eCOMMERCE->_GetAllBrands();
		$this->data['attributes'] 	= $this->eCOMMERCE->_GetAllAttributesList();
		$id = str_replace(session_id(), '', $id);
		if($this->form_validation->run('Products')=== TRUE){
			$result = $this->eCOMMERCE->_UpdateProduct($id, $this->data['post']);
			$this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("products"));	
				redirect(site_url("update-product/$id"));	
		} else {
			$this->data['products'] = $this->eCOMMERCE->_GetProductById($id);
			$this->parser->parse('ecommerce/product-update',$this->data);		
		}
	}


/*

	function MedicineList()	{	
		$records 	= $this->MEDICINE->_MedicineRecordCount();
		$config 	= $this->pagination(base_url("pharma"),$records);
        $choice 	= $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        if($this->uri->segment(2)){
        	$this->data['serial'] = $this->uri->segment(2)+1;	
        } else {
        	$this->data['serial'] = 1;
        }
        $this->data['medicines'] = $this->MEDICINE->_GetAllMedicinesList($config["per_page"], $page);
        $this->data["links"]  = $this->pagination->create_links();
		$this->parser->parse('ecommerce/medicine-list',$this->data);
	}
	
	function AddMedicine()	{
		if($this->form_validation->run('Medicine')=== TRUE){
			$result = $this->MEDICINE->_InsertMedicine();
			$this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("medicines"));	
				redirect(site_url("add-medicine"));	
		} else {
			$this->parser->parse('ecommerce/medicine-add',$this->data);		
		}
	}

	function UpdateMedicine($id)	{
		if($this->form_validation->run('Medicine')=== TRUE){
			$result = $this->MEDICINE->_UpdateMedicine($id);
			$this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("medicines"));	
				redirect(site_url("update-medicine/$id"));	
		} else {
			$this->data['medicine'] = $this->MEDICINE->_GetMedicineById($id);
			$this->parser->parse('ecommerce/medicine-update',$this->data);		
		}
	}


	function DeleteMedicine(){
		$data = $this->input->post('medicine_id');
		$result = $this->MEDICINE->_DeleteMedicine($data);
		$this->session->set_flashdata('Message', $result['message']);
		if($result['success'] == 1)
			redirect(site_url("medicines"));	
			redirect(site_url("update-medicine/$id"));	
		
	}
*/	

}
