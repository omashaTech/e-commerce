<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('Manager_Model',"MANAGER");
		if($this->session->userdata('user')){
            $this->data['session_id'] = session_id();
			foreach($this->session->userdata['user'] as $key => $value):
                $this->data[$key] = $value; 
            endforeach;
		}

        $this->_isLoggedIn();
    }

    
    function _isLoggedIn(){
        if(isset($this->session->userdata['user'])){
           if($this->data['admin_session'] != session_id()){
                $this->session->unset_userdata('user'); 
                redirect(site_url('logout'));
            }  
        } else {
            redirect(site_url());
        }

    }

    
	function editor() {
        //configure base path of ckeditor folder 
        $this->ckeditor->basePath = base_url('../assets/panel/js/ckeditor/');
        $this->ckeditor-> config['toolbar'] = 'Full';
        $this->ckeditor->config['language'] = 'en';
        //$this->ckeditor-> config['width'] = ''$width;
        $path = '../assets/panel/js/ckfinder/';
        //configure ckfinder with ckeditor config 
        $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
    }

    function pagination($url = NULL, $records = NULL){
        $config = array();
        $config["base_url"]         = $url;
        $config["per_page"]         = 20;
        $config["uri_segment"]      = 2;
        $config["total_rows"]       = $records;
        $config['full_tag_open']    = '<ul class="pagination float-right">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = 'Previous';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = 'Next';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li >';
        $config['num_tag_close']    = '</li>';
        return $config;
    }
}