<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Blog_Model','Blog');
		$this->editor();
	}
	
	public function index ()	{	
		$this->data['list'] = $this->Blog->getBlogTree();
		$this->parser->parse('content/blogs/blogs',$this->data);
	}
	
	public function add()	{	
		$this->form_validation->set_rules('data[name]','Name','required');
		if($this->form_validation->run()===TRUE)
		{
			$result = $this->Blog->add();
            $this->session->set_flashdata('Message', $result['message']);
			if($result['success'] == 1)
				redirect(site_url("blogs"));	
				redirect(site_url("add-blog"));
		} else{
			$this->parser->parse('content/blogs/add',$this->data);		
		}
		
	}

	public function update($id){
		$this->form_validation->set_rules('data[name]','Name','required');
		if($this->form_validation->run('Blog')===TRUE) 
		{
            $data = $this->input->post('data');
			$update = $this->Blog->update_blog($data,$id);
            if($update){
				$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Updated Blog Details Successfully.</div>');
					redirect(site_url('blogs'),$this->data);
			}else{
				$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error Received While Updating Blog Details.</div>');
				redirect(site_url("update-blog/$id"),$this->data);				
			}
        } else {   
    		$this->data['details'] = $this->Blog->getBlogById($id);
			$this->parser->parse('content/blogs/update',$this->data);		
		}
		
	}

	public function delete(){
		$data = $this->input->post('id');
		$result = $this->Blog->delete_blogs($data);
		if($result)
		{
			$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert"><strong>Congratulations !!</strong> You have Deleted '.$result.' Blog(s) Successfully.</div>');
			redirect(site_url('blogs'));
		}else{
			$this->session->set_flashdata('Message','<div class="alert alert-warning" role="alert"><strong>Warning !!</strong> Some Error While Deleting Blog(s).</div>');
			redirect(site_url('blogs'));
		}	
		
	}
}
