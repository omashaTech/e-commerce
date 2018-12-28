<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Entity extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->editor();
	}
	
	public function index()	{	
		$this->data['list'] = $this->Product->getProductTree();
		$this->load->view('products/index',$this->data);
	}
	
	public function add()	{	
		$this->data['data'] = $this->Menu->getMenuTree();	
		$this->form_validation->set_rules('data[name]','Name','required');
		$this->form_validation->set_rules('data[price]','Price','required|integer');
		if($this->form_validation->run())
		{
			$id = $this->Product->insert();
            if($id){
            	//print_r($id); exit;
                $this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Inserted New Product Successfully.</div>');
                if($id['p_entity'] == 1){
                	redirect(base_url('Product/addEntity/'.$id['p_id']));
                } else {	
                	redirect(base_url('Product/'));
                }
            } else{
                $this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Inserting Product.</div>');
                redirect(base_url('product/add/'));
            }
			
		} else{
			$this->load->view('products/add',$this->data);		
		}
		
	}

	public function update($url){
		$id = explode($this->data['user_session'], $url) ;
		$id = array_shift($id) ;	
		$this->form_validation->set_rules('data[name]','Name','required');
		$this->form_validation->set_rules('data[price]','Price','required|integer');
		if($this->form_validation->run()) 
		{
            $data = $this->input->post('data');
			$update = $this->Product->update($data,$id);
            if(is_array($update)){
				$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Updated Product Details Successfully.</div>');	
				if($update['p_entity']== 1){
					
					redirect('Product/Entity/'.$id);

				}else{
					redirect(base_url('Product/'));
				}	
			}else{
				$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Updating Product Details.</div>');				
				redirect(base_url('Product/'));
			}
		}	
    	else {  
			$this->data['details'] = $this->Product->getProductById($id);
			$this->data['menu']    = $this->Menu->getMenuTree();
			if(!empty($this->data['details'])){
				$this->load->view('products/update',$this->data);		
			} else {
				redirect(base_url('Product/'));
			}
		}
		
	}

	public function delete(){
		$data = $this->input->post('id');
		$result = $this->Product->delete($data);
		if($result)
		{
			$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Deleted '.$result.' Product Successfully.</div>');
			redirect(base_url('Product/'));
		}else{
			$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error While Deleting Product.</div>');
			redirect(base_url('Product/'));
		}	
		
	}

	public function Entity($url)	{
		$pre = $this->Product->p_;
		$id = explode($this->data['user_session'], $url) ;
		$this->data['p_id'] = array_shift($id) ;
		$this->data['list'] = $this->Product->getEntityById($this->data['p_id'], $pre);
		//print_r($this->data['list']); exit;
		if(!empty(is_array($this->data['list']))){
			$this->data['details'] = $this->Product->getProductById($this->data['p_id']);
			$this->load->view('products/entity',$this->data);
		} else {
			redirect(base_url('Product/addEntity/'.$this->data['p_id']));
		}
		
	}

	function addEntity($url){
		$id = explode($this->data['user_session'], $url) ;
		$id = array_shift($id) ;	
		$this->form_validation->set_rules('data[name][]','Entity Name','required');
		if($this->form_validation->run()) 
		{
			$this->data['id'] = $this->Product->insert_entity($id);
            if(is_array($this->data['id'])){
                $this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Inserted New Product Entities Successfully.</div>');
                //print_r($this->data['id']); exit;
                redirect(base_url('Product/Entity/'.$id.$this->data['user_session']));
            } else{
                $this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Inserting Product.</div>');
                redirect(base_url('Product/add/'));
            }

		}
		else{

			$this->data['details'] = $this->Product->getProductById($id);
			$this->load->view('products/entity_add',$this->data);
		}	


	}

	public function updateEntity($url){
		$id  = explode($this->data['user_session'], $url) ;
		$id  = array_shift($id) ;	
		$this->form_validation->set_rules('data[name]','Name','required');
		if($this->form_validation->run()) 
		{
			$update = $this->Product->update_entity($id);
            if($update){
				$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Updated Product Entity Details Successfully.</div>');					
				redirect('Product/Entity/'.$update);	
			}else{
				$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Updating Product Entity Details.</div>');		
				redirect(base_url('Product/'));
			}
		}	
    	else {  
    		$pre 	 = $this->Product->e_;
			$entity  = $this->Product->getEntityById($id,$pre);
			$product = $this->Product->getProductById($entity['p_id']);
			$this->data['details'] = array_merge($entity,$product);
			if(!empty($this->data['details'])){
				$this->load->view('products/entity_update',$this->data);		
			} else {
				redirect(base_url('Product/'));
			}
		}
		
	}

	public function deleteEntity($url){
		$id = explode($this->data['user_session'], $url) ;
		$id = array_shift($id) ;	
		$data = $this->input->post('id');
		$result = $this->Product->delete_entity($data);
		if($result)
		{
			$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Deleted '.$result.' Product Entity Successfully.</div>');
			redirect(base_url('Product/Entity/'.$id));
		}else{
			$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error While Deleting Product Entity.</div>');
			redirect(base_url('Product/Entity/'.$id));
		}	

	}


	public function Values($product, $url)	{
		$pre = $this->Product->e_;
		$id = explode($this->data['user_session'], $url) ;
		$this->data['p_e_id'] = array_shift($id) ;
		$this->data['list'] = $this->Product->getValuesById($this->data['p_e_id'], $pre);
		//echo "<pre>"; print_r($this->data['list']); exit;
		if(!empty(is_array($this->data['list']))){
			$this->data['details'] = $this->Product->getEntityById($this->data['p_e_id'],$pre);
			$this->data['product'] = $product;
			$this->load->view('products/values',$this->data);	
		} else {
			redirect(base_url('Product/addEntity/'.$this->data['p_id']));
		}
		
	}

	function addValues($product, $url){
		$id = explode($this->data['user_session'], $url) ;
		$id = array_shift($id) ;	
		$this->form_validation->set_rules('data[name][]','Value Name','required');
		$this->form_validation->set_rules('data[price][]','Value Price','required');
		if($this->form_validation->run()) 
		{
			$this->data['id'] = $this->Product->insert_values($id);
            if(is_array($this->data['id'])){
                $this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Inserted Product Entitity Value Successfully.</div>');
                //print_r($this->data['id']); exit;
                redirect(base_url("Product/Values/$product/$id".$this->data['user_session']));
            } else{
                $this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Inserting Product Entitity Value.</div>');
                redirect(base_url("Product/Values/$product/$id".$this->data['user_session']));
            }

		}
		else{
			$pre = $this->Product->e_;
			$this->data['details'] = $this->Product->getEntityById($id,$pre);
			$this->data['product'] = $product;
			$this->load->view('products/values_add',$this->data);
		}	


	}


	public function updateValues($product, $url){
		$id  = explode($this->data['user_session'], $url) ;
		$id  = array_shift($id) ;	
		$this->form_validation->set_rules('data[name]',	'Name','required');
		$this->form_validation->set_rules('data[price]','price','required');
		if($this->form_validation->run()) 
		{
			$update = $this->Product->update_values($id);
            if($update){
				$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Updated Product Entity Value Details Successfully.</div>');					
				redirect(base_url("Product/Values/$product/$url"));	
			}else{
				$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Updating Product Entity Value Details.</div>');		
				redirect(base_url("Product/Values/$product/$url"));
			}
		}	
    	else {  
    		$v_pre 		= $this->Product->v_;
    		$e_pre 		= $this->Product->e_;
			$values 	= $this->Product->getValuesById($id,$v_pre);
			$entity 	= $this->Product->getEntityById($values['p_e_id'],$e_pre);
			$this->data['details'] = array_merge($values, $entity);
			$this->data['product'] = $product;
			if(!empty($this->data['details'])){
				$this->load->view('products/values_update',$this->data);		
			} else {
				redirect(base_url('Product/'));
			}
		}
		
	}


	public function deleteValues($product,$url){
		$id = explode($this->data['user_session'], $url) ;
		$id = array_shift($id) ;	
		$data = $this->input->post('id');
		$result = $this->Product->delete_values($data);
		if($result)
		{
			$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Deleted '.$result.' Product Entity Successfully.</div>');
			redirect(base_url("Product/Values/$product/$id"));
		}else{
			$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error While Deleting Product Entity.</div>');
			redirect(base_url("Product/Values/$product/$id"));
		}	

	}
	
}
