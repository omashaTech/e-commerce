<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor_Model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->result['success'] = 0;
        $this->table = 'store_vendors';
    }     

    function _GetStates(){
        $this->db->select('state_id, state_name');
        $this->db->where( array('state_status' => 1));
        return $this->db->get('store_states')->result_array();
    }

    function _GetVendorsList(){
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }   

    function _GetVendorDetailsById($id){
        $this->db->select('*')->from('store_vendors vendor'); 
        $this->db->join('store_vendors_business business', 'vendor.vendor_id=business.vendor_id', 'left');
        $this->db->join('store_vendors_bank bank', 'vendor.vendor_id=bank.vendor_id', 'left');
        $this->db->where('vendor.vendor_id',$id);
        return $this->db->get()->row_array();
    }

    function _UpdateVendorDetails($id){
        try
        {
            $this->db->trans_start();
            $data = $this->input->post();
            $data = $this->security->xss_clean($data);
            if(is_array($data['Basic'])){
                foreach($data['Basic'] as $key=>$value):
                    $update_basic['vendor_'.$key] = $value;
                endforeach;
                $this->db->where('vendor_id',$id)->update($this->table,$update_basic);
                $row = $this->db->affected_rows();
            }
            if(is_array($data['Business'])){
                foreach($data['Business'] as $key=>$value):
                    $update_business['business_'.$key] = $value;
                endforeach;
                $this->db->where('vendor_id',$id)->update($this->table.'_business',$update_business);
                $row = $this->db->affected_rows();
            }
            $this->db->trans_complete();
            if($this->db->trans_status() === TRUE){
                $this->result['success'] = 1;
                $this->result['message'] = '<div class="alert alert-success">Congratulations!! You have Updated Vendor Details Successfully.</div>';
                return $this->result;
            } else  
                throw new Exception('<div class="alert alert-danger">No Data Updated. Please Refresh and Try Again!!</div>');
        }
        catch (Exception $e) {
            $this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
            return $this->result;
        }
    }
}   
   