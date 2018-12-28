<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Ecommerce_Model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->table    = 'store_products';
        $this->result['success'] = 0;
    }



    function _GetAllAttributesGroupList($limit = NULL, $start = NULL){
        return $this->db->get($this->table.'_attributes_group')->result_array();
    }  

    function _GetAttributeGroupById($id){
        return $this->db->where('attribute_group_id',$id)->get($this->table.'_attributes_group')->row_array();
    }
    function _GetAllAttributesList($limit = NULL, $start = NULL){
        $this->db->order_by("attribute_group", "asc")->limit($limit, $start);
        $query = $this->db->get($this->table.'_attributes_group_values')->result_array();
        if(is_array($query)){
            foreach($query as $key =>$value):
                $result = $this->_GetAttributeGroupById($value['attribute_group']);        
                $query[$key]['attribute_group'] = $result['attribute_group_name'];
            endforeach;    

        }
        return $query;
    }   

    function _Slug($id, $name, $table,$prefix){
        $slug  = str_replace(array(' ','&'), array('-','and'),$name).'-'.$id;
        $update = array($prefix."_slug" => $slug);
        $this->db->where($prefix.'_id',$id)->update($table, $update);
        $row = $this->db->affected_rows();
        return $row;
    }

/*  @Function To Retrieve All Categories in Tree View
    @param holds Category Parent Id
    @Return Data in Tree View
*/  function _GetCategoryTree($parent = NULL, $spacing=NULL, $tree = NULL)  {
        try 
        {
            $this->load->model('Manager_Model','Manager');
            if (!is_array($tree)){
                $tree = array();
                $spacing = ''; 
                if($parent==NULL) $parent = 0;
                else $parent = $parent; 
            }
            $where = array('category_parent' => $parent);
            $rows = $this->db->where($where)->order_by('category_id','asc')->get('store_categories')->result_array();
            if (count($rows) > 0) {    
                foreach($rows as $row) {
                    extract($row);    
                    $manager = $this->Manager->_ManagerName($category_admin_id);
                    $tree[] = array("category_id" => $category_id, "category_name" => $spacing .$category_name, "category_parent" => $parent, "category_admin_id" => $manager, "category_slug" => $category_slug, "category_status" => $category_status);
                    $tree = $this->_GetCategoryTree($category_id, $spacing .$category_name.'&nbsp;&#8614;&nbsp;', $tree);              
                }
            } 
            return $tree;
        } 
        catch (Exception $e){
            return $e->getMessage(); 
        }
    }   

/*  @Function To Retrieve Category Data By Id
    @param holds Category Id
    @Return Data in Array Or Throw Exception
*/  function _GetCategoryById($id)
    {
        try 
        {
            $this->db->select('*')->from('store_categories')->where('category_id',$id);
            $query = $this->db->get()->row_array();
            if(is_array($query)){
                return $query;
              } else {                
                throw new Exception('Some Error Occured. Please Refresh and Try Again!!');
            }
        }
        catch (Exception $e) {
            return $message = $e->getMessage(); 
        }
    }

/*  @Function To Insert New Category Data
    @Return 1 Or Throw Exception
*/  function _InsertCategory()
    {
        try 
        {
            $data = $this->input->post('data');

            if(isset($_FILES) && !empty($_FILES['image']['name'][0])){
                $data['banner'] = $this->image_upload($_FILES, 'categories', $data['name']);
            }    
            $data = $this->security->xss_clean($data);
            $data['admin_id'] = $this->data['admin_id'];
            foreach($data as $key=>$value):
                $insert['category_'.$key] = str_replace(array('-','&'), array('-','and'),strip_tags($value));
            endforeach; 
            $this->db->insert('store_categories', $insert);
            $id = $this->db->insert_id();
            if($id) {
                $slug = $this->_Slug($id, $data['name'], 'store_categories', 'category');
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Inserted New Category Successfully.</div> ';
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


/*  @Function To Update Category Data By Id
    @param holds Category Id
    @Return 1 Or Throw Exception
*/  function _UpdateCategory($id)
    {
        try
        {
            $data   = $this->input->post('data');
            if(isset($_FILES) && !empty($_FILES['image']['name'][0])){
                $result  = $this->_GetCategoryById($id); 
                if($result['category_banner']!=NULL){
                    $remove = $this->_DeleteImages($result['category_banner'],'categories');    
                    if($remove){
                       $data['banner'] = $this->image_upload($_FILES, 'categories', $data['name']);    
                    }
                } else {
                    $data['banner'] = $this->image_upload($_FILES, 'categories', $data['name']);    
                }
            }    
            $data = $this->security->xss_clean($data);
            foreach($data as $key=>$value):
                $update['category_'.$key] = str_replace(array('-','&'), array('-','and'),$value);
            endforeach; 
            $this->db->where('category_id',$id)->update('store_categories', $update);
            $row = $this->db->affected_rows();
            if($row) {
                $slug = $this->_Slug($id, $data['name'], 'store_categories', 'category');
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Updated Category Details Successfully.</div> ';
                return $this->result;
            } else {
                throw new Exception('Something Went Wrong. Please Refresh and Try Again!!');    
            } 
        } 
        catch(Exception $e){
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
        }
    }
/*  @Function To Delete Category By Id
    @Data holds Category Id
    @Return 1 Or Throw Exception
*/  function _DeleteCategory()
    {
        try
        {
            $data = $this->input->post('category_id');    
            // To Retrieve all Childs if exists
            foreach($data as $id):
                $results[] = $this->_GetCategoryTree($id);
                $results[] = $id;
            endforeach; 
            // To Create Single Dimensional Array from Multi dimensional
            foreach($results as $result){
                if(is_array($result)){} 
                else $array[] =  $result;
            }
            foreach($array as $id){
                $image = $this->_GetCategoryById($id); 
                if(!empty($image['category_banner'])){
                    echo $image['category_banner'];
                    $remove = $this->_DeleteImages($image['category_banner'],'categories');    
                } else {
                    $remove = 1;
                }
                if($remove){
                    $this->db->where('category_id',$id);
                    $query[] = $this->db->delete('store_categories');    
                } 
            }
            if(array_sum($query) == 0){
                $this->result['message'] = '<div class="alert alert-danger">OOPs!! No Category Selected.. Please Select a Category to Delete.</div> ';

            } else {
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Deleted '.array_sum($query).' Categories Successfully.</div> ';
            }
            return $this->result;
        } 
        catch(Exception $e){
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
       }
    }


/*  @Function To Get All Brands By Limit
    @Return Result Array
*/  function _GetAllBrands($limit = NULL, $start = NULL) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('store_brands')->result_array();;
        return $query;
    }

/*  @Function To Get Brand Details By Id
    @Return Row Array
*/  function _GetBrandById($id)  {
        $this->db->where('brand_id',$id);
        $query = $this->db->get('store_brands')->row_array();
        return $query;
    }
/*  @Function To Insert New Brand Data
    @Return 1 Or Throw Exception
*/  function _InsertBrand()
    {
        try 
        {
            $data   = $this->input->post('data');
            $data['admin_id'] = $this->data['admin_id'];
            if(isset($_FILES) && !empty($_FILES['image']['name'][0])){
                $data['image'] = $this->image_upload($_FILES, 'brands', $data['name']);    
            }    
            $data = $this->security->xss_clean($data);
            foreach($data as $key=>$value):
                if($key == 'image')
                $insert['brand_'.$key] = $value;
                else
                $insert['brand_'.$key] = str_replace(array('/','&'), array('-','and'),strip_tags($value));
            endforeach; 
            $this->db->insert('store_brands', $insert);
            $id = $this->db->insert_id();
            if($id) {
                $slug = $this->_Slug($id, $data['name'], 'store_brands', 'brand');
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Inserted New Brand Successfully.</div>';
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

/*  @Function To Update Brand Data
    @Return 1 Or Throw Exception
*/  function _UpdateBrand($id)
    {
        try 
        {
            $data   = $this->input->post('data');
            if(isset($_FILES) && !empty($_FILES['image']['name'][0])){
                $result  = $this->_GetBrandById($id); 
                $remove = $this->_DeleteImages($result['brand_image']);
                if($remove){
                    $data['image'] = $this->image_upload($_FILES, 'brands', $data['name']);    
                }
            }    
            $data = $this->security->xss_clean($data);
            foreach($data as $key=>$value):
                if($key == 'image')
                    $update['brand_'.$key] = $value;
                else
                    $update['brand_'.$key] = str_replace(array('/','&'), array('-','and'),strip_tags($value));
            endforeach; 
            $this->db->where('brand_id',$id)->update('store_brands', $update);
            $row = $this->db->affected_rows();
            if($row) {
                $slug = $this->_Slug($id, $data['name'], 'store_brands', 'brand');
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Updated Brand Details Successfully.</div>';
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

/*  @Function To Delete Brand By Id
    @Data holds Brand Id
    @Return 1 Or Throw Exception
*/  function _DeleteBrands()
    {
        try
        {
            $data = $this->input->post('id');
            // Run foreach To Delete All Results
            foreach($data as $id){
                $result  = $this->_GetBrandById($id); 
                $remove = $this->_DeleteImages($result['brand_image']);
                if($remove){
                    $this->db->where('brand_id',$id);
                    $query[] = $this->db->delete('store_brands');        
                }    
            }
            $this->result['success'] = 1;
            $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Deleted '.array_sum($query).' Pharma Companies Successfully.</div>';
            return $this->result;
        } 
        catch(Exception $e){
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
       }
    }


    function _DeleteImages($image,$path){
        $remove_thumb = unlink("../assets/uploads/$path/thumbs/$image");
        if($remove_thumb){
            $remove_original = unlink("../assets/uploads/$path/$image");
            if($remove_original){
                $remove = 1;
            } else {
                $remove = 0;
            }
        } else {
            $remove = 0;
        }
        return $remove;
    }    


    function _GetAllProductsList(){
        $this->db->select('product_id,product_name,product_model,product_status,product_mrp');
        $query = $this->db->get($this->table)->result_array();
        if(is_array($query)){
            foreach($query as $key=>$value){
                $this->db->select('product_image')->where('product_id',$value['product_id']);
                $image = $this->db->get($this->table.'_images')->row_array();    
                $query[$key]['product_image'] = $image['product_image'];
            }
        }
        return $query;
    }   

    function _GetProductById($id){
        $where = array('products.product_id' => $id);
        $this->db->select('*')->from($this->table.' products'); 
        //$this->db->join($this->table.'_vendors vendors', 'vendors.product_id=products.product_id', 'left');
        $this->db->where($where);
        $query['Product'] = $this->db->get()->row_array();
        
        $this->db->select('product_category_id')->where('product_id',$id);
        $query['Category'] = $this->db->get($this->table.'_categories')->result_array();

        $this->db->select('product_attribute_id')->where('product_id',$id);
        $query['Attribute'] = $this->db->get($this->table.'_attributes')->result_array();

        $this->db->select('product_image')->where('product_id',$id);
        $query['Image'] = $this->db->get($this->table.'_images')->result_array();

        return $query;
    }


    // Insert New Medicine
    function _InsertProduct(){
        try 
        {
            $data = $this->input->post();
            if(isset($_FILES) && !empty($_FILES['image']['name'][0])){
                $data['Images'] = $this->image_upload($_FILES, 'products', $data['Product']['name']);
            }   
            if(isset($data['Specifications'])){
                $data['Product']['specifications'] = json_encode(array_combine($data['Specifications']['name'],$data['Specifications']['value']));
            }
            $data['Product']['slug'] = str_replace(array('/',' ','&'), array('-','-','and'),$data['Product']['name']);
            $data['Product']['admin_id'] = 0;
            //echo "<pre>"; print_r($data); exit;
            foreach($data['Product'] as $key=>$value){
                $insert['product_'.$key] = str_replace(array('-','&'), array('-','and'),$value); 
            }
            $this->db->insert($this->table, $insert);
            $product_id = $this->db->insert_id();
            if($product_id){
                if($data['Images']){
                    foreach($data['Images'] as $key=>$value){
                        $insert_images['product_id'] = $product_id;
                        $insert_images['product_image'] = $value['file_name'];
                        $this->db->insert($this->table.'_images', $insert_images);
                    }
                }
                if($data['Categories']){
                    foreach($data['Categories'] as $key=>$value){
                        $insert_category['product_id'] = $product_id;
                        $insert_category['product_category_id'] = $value;
                        $this->db->insert($this->table.'_categories', $insert_category);
                    }
                }
                if($data['Filters']){
                    foreach($data['Filters'] as $key=>$value){
                        $insert_attribute['product_id'] = $product_id;
                        $insert_attribute['product_attribute_id'] = $value;
                        $this->db->insert($this->table.'_attributes', $insert_attribute);
                    }
                }
            }
            if($product_id) {
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Inserted New Product Successfully.</div>';
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

    function _UpdateProduct($product_id,$data){
        try 
        {
            //echo "<pre>"; print_r($data); exit;
            $this->db->trans_start();
            $data = $this->security->xss_clean($data);
            if(isset($_FILES) && !empty($_FILES['image']['name'][0])){
                $data['Images'] = $this->image_upload($_FILES, 'products', $data['Product']['name']);
            }   
            if($data['Product']){
                if(isset($data['Specifications'])){
                    $data['Product']['specifications'] = json_encode(array_combine($data['Specifications']['name'],$data['Specifications']['value']));
                }
                foreach($data['Product'] as $key=>$value)
                    $update_product['product_'.$key] = str_replace(
                        array('-','&'), array('-','and'),$value); 
                $this->db->where('product_id',$product_id)->update($this->table,$update_product);
                $row = $this->db->affected_rows();
            }
            if($data['Images']){
                    foreach($data['Images'] as $key=>$value){
                        $insert_images['product_id'] = $product_id;
                        $insert_images['product_image'] = $value['file_name'];
                        $this->db->insert($this->table.'_images', $insert_images);
                    }
                }
            if($data['Categories']){
                foreach($data['Categories'] as $key=>$value):
                    $this->db->where('product_id',$product_id);
                    $row = $this->db->delete($this->table.'_categories');
                endforeach;
                foreach($data['Categories'] as $key=>$value):
                        $insert_category['product_id'] = $product_id;
                        $insert_category['product_category_id'] = $value;
                        $this->db->insert($this->table.'_categories', $insert_category);   
                endforeach;      
            }
            if($data['Filters']){
                foreach($data['Filters'] as $key=>$value):
                    $this->db->where('product_id',$product_id);
                    $row = $this->db->delete($this->table.'_attributes');
                endforeach;
                foreach($data['Filters'] as $key=>$value){
                    $insert_attribute['product_id'] = $product_id;
                    $insert_attribute['product_attribute_id'] = $value;
                    $this->db->insert($this->table.'_attributes', $insert_attribute);
                }
            }
            $this->db->trans_complete();
            if($this->db->trans_status() === TRUE) {
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Updated Product Details Successfully.</div>';
                return $this->result;
            } else {                
                throw new Exception("OOPs!! You Didn't Make Changes.. Please Update Medicine Data and Try Again!!");
            }
        }
        catch (Exception $e) {
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
        }
    }
/*
    function createcsv(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "filename.csv";
        $query = "SELECT * FROM$this->table. _brands"; //USE HERE YOUR QUERY
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);

    }
*/
}    

   
