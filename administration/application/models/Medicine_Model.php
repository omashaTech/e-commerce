<?php
class Medicine_Model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->table    = 'store_medicines';
        $this->prefix  = 'medicine_';
        $this->result['success'] = 0;
    }

    function _MedicineRecordCount() 
    {
        return $this->db->count_all($this->table);
    }

    function _GetAllMedicinesList($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table)->result_array();
        if(is_array($query)){
            $CI =& get_instance();
            $CI->load->model('Manager_Model','Manager');
            foreach($query as $key=>$value){
                $query[$key]['medicine_admin_id'] = $CI->Manager->_ManagerName($value['medicine_admin_id']);  
            }
        }
        return $query;
    }   

    function _GetMedicineById($id)
    {
        $this->db->select('*')->where($this->prefix.'id',$id);
        $query = $this->db->get($this->table)->row_array();
        return $query;
    }

    // Insert New Medicine
    function _InsertMedicine()
    {
        try {
            $data = $this->input->post('data');
            $data = $this->security->xss_clean($data);
            if($data){
                $data['expiry']['month'] = (strlen($data['expiry']['month'])>1)?$data['expiry']['month']:
            '0'.$data['expiry']['month'];
                $data['expiry'] = $data['expiry']['year'].'-'.$data['expiry']['month'].'-'.'28';    
                $data['admin_id'] = $this->data['admin_id'];

            }
            //$data['slug'] = str_replace(array(' ','&'), array('-','and'),$data['name']);
            foreach($data as $key=>$value):
                $insert[$this->prefix.$key] = str_replace(array('-','&'), array('-','and'),strip_tags($value));
            endforeach; 
            //print_r($this->array); exit;
            $insert = $this->db->insert($this->table, $insert);
            if($insert) {
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Inserted New Medicine Successfully.</div>';
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

    function _UpdateMedicine($id)
    {
        try {
            $data = $this->input->post('data');
            $data = $this->security->xss_clean($data);
            if($data){
                $data['expiry']['month'] = (strlen($data['expiry']['month'])>1)?$data['expiry']['month']:
            '0'.$data['expiry']['month'];
            $data['expiry'] = $data['expiry']['year'].'-'.$data['expiry']['month'].'-'.'28';    
            $data['admin_id'] = $this->data['admin_id'];
            }
            //$data['slug'] = str_replace(array(' ','&'), array('-','and'),$data['name']);
            foreach($data as $key=>$value):
                $this->array[$this->prefix.$key] = str_replace(array('-','&'), array('-','and'),strip_tags($value));
            endforeach; 
            $this->db->where(array($this->prefix.'id'=>$id));
            $this->db->update($this->table,$this->array);
            $row = $this->db->affected_rows();
            if($row) {
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Updated Medicine Details Successfully.</div>';
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

    function _DeleteMedicine($data)
    {
        try{
            // Run foreach To Delete All Results
            foreach($data as $id){
                $this->db->where($this->prefix.'id',$id);
                $query[] = $this->db->delete($this->table);        
            }
            $this->result['success'] = 1;
            $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Deleted '.array_sum($query).' Medicine Details Successfully.</div>';
            return $this->result;
        } 
        catch(Exception $e){
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
       }
    }

    
}   
   