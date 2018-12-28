<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	protected $table;
	protected $prefix;
	protected $result = array();
    function __construct()    {
        parent::__construct();
    }


    function set_upload_options($path,$name){ 
      // upload an image options
        $config = array();
        //give the path to upload the image in folder
        $config['upload_path']  = '../assets/uploads/'.$path; 
        $config['remove_spaces']= TRUE;
        //$config['encrypt_name'] = TRUE; // for encrypting the name
        $config['file_name']    = $name;
        $config['allowed_types']= 'gif|jpg|jpeg|png';
        $config['max_size']     = '1024*10';
        $config['overwrite']    = FALSE;
        if (!is_dir($config['upload_path'])) {
           mkdir($config['upload_path'], 0777, TRUE);
        }
        return $config;

    }

    function image_upload($data, $path, $name){
        $this->load->library('upload');
        $count = count($data['image']['name']);
        for($i=0; $i<$count; $i++)
        {
            $_FILES['image']['name']= $data['image']['name'][$i];
            $_FILES['image']['type']= $data['image']['type'][$i];
            $_FILES['image']['tmp_name']= $data['image']['tmp_name'][$i];
            $_FILES['image']['error']= $data['image']['error'][$i];
            $_FILES['image']['size']= $data['image']['size'][$i];
            $this->upload->initialize($this->set_upload_options($path, $name));
            //function defination below
            if($this->upload->do_upload('image')){
                $upload_data = $this->upload->data();
                $fileName[$i]['upload_path']= "../assets/uploads/$path/";
                $fileName[$i]['file_name']  = $upload_data['file_name'];
                $fileName[$i]['file_path']  = $upload_data['file_path'];
            } else {
                echo $fileName['error'] =  $this->upload->display_errors();
                die();
            }    
        }   
        if($path == 'categories'){
            foreach($fileName as $file){
                $this->image_resize($file,1920,false);        
                $uploadPath = $file['file_name'];
            }
            return $uploadPath;    
        }       
        if($path == 'brands'){
            foreach($fileName as $file){
                $this->image_resize($file,200,false);        
                $uploadPath = $file['file_name'];
            }
            return $uploadPath;    
        }
        if($path == 'products'){
            foreach($fileName as $file){
                $this->image_resize($file,450, 600, false);        
               // $fileName = array('path'=>implode('>>',$fileName));
            }
            return $fileName;
        }       
    }

    function image_resize($data,$width,$thumb)    
    {   
        $height = $width-($width*25/100); 
        $upload_path                = $data['upload_path'];
        $config['source_image']     = $data['file_path'].$data['file_name'];
        $config['new_image']        = $upload_path.$data['file_name'];   
        $config['image_library']    = 'gd2';    
        //$config['create_thumb']     = $thumb;    
        $config['maintain_ratio']   = TRUE;    
        $config['width']            = $width;     
        $config['height']           = $height;     
        if (!is_dir($upload_path)) {
           mkdir($upload_path, 0777, TRUE);
        } 
        $this->load->library('image_lib');   
        $this->image_lib->initialize($config);
        $this->image_lib->resize();

        $upload_path                = $data['upload_path'].'thumbs/';
        $config['source_image']     = $data['file_path'].$data['file_name'];
        $config['new_image']        = $upload_path.$data['file_name'];   
        $config['image_library']    = 'gd2';    
        $config['create_thumb']     = $thumb;    
        $config['maintain_ratio']   = TRUE;    
        $config['width']            = $width/8;     
        $config['height']           = $height/8;     
        if (!is_dir($upload_path)) {
           mkdir($upload_path, 0777, TRUE);
        } 
        $this->load->library('image_lib');   
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }     
}