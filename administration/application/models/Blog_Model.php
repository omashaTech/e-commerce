<?php
class Blog_Model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->table = 'store_blogs';
        $this->prefix  = 'blog_';
        $this->result['success'] = 0;
    }     

    function getBlogTree() 
    {
        $this->db->select('*');
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }   

    function getBlogById($id)
    {
        $this->db->select('*')->where($this->prefix.'id',$id);
        $query = $this->db->get($this->table)->row_array();
        return $query;
    }

    function add()
    {
        try
        {
            $data = $this->input->post('data');
            $data['slug'] = str_replace(' ','-',$data['name']);
            foreach($data as $key=>$value):
                $array[$this->prefix.$key] = $value;
            endforeach;   
            $this->db->insert($this->table, $array);
            $insert_id = $this->db->insert_id();
            if($insert_id){
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Inserted New Page Successfully.</div> ';
                return $this->result;
            } else {                
                throw new Exception('Some Error Occured. Please Refresh and Try Again!!');
            }
        }
        catch (Exception $e) {
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
        }
    }


    function update_blog($data,$id)
    {
        try
        {
            $data['slug'] = str_replace(' ','-',$data['name']);
            $array = array();
            foreach($data as $key=>$value):
                if(!$key == 'description'){
                    $value = strip_tags($value);    
                }
                $values = array($this->prefix.$key=>$value);
                $array = array_merge($array,$values);
            endforeach;   
            $this->db->where($this->prefix.'id',$id)->update($this->table, $array);
            return $this->db->affected_rows();
        } 
        catch(Exception $e){
            return 'Something Went Wrong!! Error is ->'.$e->getMessage(); 
        }

    }

   function delete_blogs($data)
    {
        try
        {
            foreach($data as $id)
            {
                $img = $this->getImageUrl($id);
                $images = explode('>>>',$img);
                foreach($images as $image){
                    $unlink = unlink("./assets/uploads/blogs/$image");
                }
                if($unlink){
                    $query[] = $this->db->where($this->prefix.'id',$id)->delete($this->table);    
                } else {
                    "./assets/uploads/blogs/$image";  exit;
                }
            }
            return array_sum($query);
        } 
        catch(Exception $e){
            return 'Something Went Wrong!! Error is ->'.$e->getMessage(); 
        }

    }

    function getImageUrl($id)
    {
        try
        {
            $this->db->select($this->prefix.'img')->where($this->prefix.'id',$id);
            $query = $this->db->get($this->table)->row();
            return $query->blog_img;
        } 
        catch(Exception $e){
            return 'Something Went Wrong!! Error is ->'.$e->getMessage(); 
        }

    }
}   
   