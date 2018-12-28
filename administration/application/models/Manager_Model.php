<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager_Model extends MY_Model {
	function __construct() {
        parent::__construct();
        $this->table   = 'store_administration';
        $this->prefix  = 'admin_';
        $this->result['success'] = 0;
    }

/* 	@Function to Start New Session..
	@Param holds Admin Id to Update Session Values..
*/	function _StartSession(){
		try 
		{ 
			$this->db->trans_begin();
			$otp = $this->input->post('data[otp]');
			$where = array('admin_id' => $this->data['admin_id'], 'admin_otp' => $otp);
			$this->db->where($where);
			$this->db->update($this->table,	array(	
				$this->prefix.'otp'		=> rand(100000,999999), 
				$this->prefix.'active'	=> '1')
			);
			if($this->db->trans_status() === TRUE){                 
                $this->db->trans_commit();
                $this->db->where($this->prefix.'id',$this->data['admin_id']);
				$result = $this->db->get($this->table)->row_array();
				$this->session->set_userdata('user', $result);
				$this->result['success'] = 1;
				$this->result['message'] = '<div class="alert alert-success">Congratulations!! You have successfully logged into Dashboard.</div> ';
				return $this->result;
            } else    {
            	$this->db->trans_rollback();
            	throw new Exception('<div class="alert alert-danger">OOPs!! Some Error Occured. Please Try Again!!</div> ');
            }
		}
		catch (Exception $e) {
  			return $message = $e->getMessage(); 
		}
	}
	
/* 	@Function to Destroy Current Session..
	@Param holds Admin Id to Update Session Values..
*/	function _DestrorySession(){
		try 
		{ 
			$this->db->trans_begin();
			$this->db->update($this->table,	array(	
					$this->prefix.'session'	=> '', 
					$this->prefix.'active'	=> '0')
				);
			$this->db->where(array(	$this->prefix.'id'	=> $this->data['admin_id']));
			if($this->db->trans_status() === TRUE){                 
                $this->db->trans_commit();
  				$this->result['success'] = 1;
				$this->result['message'] = '<div class="alert alert-success">Congratulations!! You have successfully logged out from admin panel.</div> ';
				return $this->result;
  			} else {
  				$this->db->trans_rollback();
  				throw new Exception('Some Error Occured While Destroying Current Login Session!! Please Try Again!!');
  			}	
		}
		catch (Exception $e) {
  			$this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  			return $this->result;
		}
	}


/* 	@Function to Make Admin Login into Admin Panel..
	@Param holds data to check values...
*/	function _Login(){
		try 
		{ 
			$this->db->trans_begin();
			$data = $this->input->post('data');
			//print_r($data);
			$data = $this->security->xss_clean($data);
			$this->db->where($this->prefix.'password', 	md5($data['password']));
			$this->db->where($this->prefix.'email', 	$data['username']);
			$this->db->or_where($this->prefix.'phone',	$data['username']);
			$this->db->where($this->prefix.'password', 	md5($data['password']));
			$query = $this->db->get($this->table)->row_array();
			//echo $this->db->last_query();
			//echo "<pre>"; print_r($query); exit;
			if(is_array($query)){
				$this->db->where(array($this->prefix.'email' =>	$query['admin_email'], $this->prefix.'phone' => $query['admin_phone']));
				//$this->db->update($this->table,array($this->prefix.'session'=> session_id()));	
				// Disable this line and enable upper code to OTP Verification
				$this->db->update($this->table,array($this->prefix.'session'=> session_id(), $this->prefix.'active'=> 1));	
				if($this->db->trans_status()===TRUE){
					$this->db->trans_commit();
					$this->db->where(array($this->prefix.'email' =>	$query['admin_email'], $this->prefix.'phone' => $query['admin_phone']));
					$query = $this->db->get($this->table)->row_array();
					$this->session->set_userdata('user', $query);
	  				$this->result['values'] = $query;
					$this->result['success'] = 1;
					$this->result['message'] = '<div class="alert alert-success">Congratulations You are successfully logged in to Dashboard..</div> ';
				//	$this->result['message'] = '<div class="alert alert-success">Please Provide OTP to Continue to Dashboard..</div> ';
					return $this->result;
				} else {
					$this->db->trans_rollback();
					throw new Exception('Some Error Occured While Creating Login Session!! Please Try Again!!');
				}	
			} else {
				throw new Exception('<div class="alert alert-danger">Username OR Password is Invalid!!</div> ');

			}	
		}
		catch (Exception $e) {
  			$this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  			return $this->result;
		}
	}

/* 	@Function to Update Admin Profile..
	@Param holds data to Update Profile Details...
*/	function _UpdateProfile(){
		try 
		{ 
			$this->db->trans_begin();
			$data = $this->input->post('data');
			$data = $this->security->xss_clean($data);
			foreach($data as $key=>$value):
				$update[$this->prefix.$key] = $value;
			endforeach;
			$this->db->where(array($this->prefix.'id' => $this->data['admin_id']))->update($this->table,$update);
			$row = $this->db->affected_rows();
			if($this->db->trans_status()===TRUE){
				$this->db->trans_commit();
				$result =$this->db->where($this->prefix.'id' , $this->data['admin_id'])->get($this->table)->row_array();
				$this->session->set_userdata('user', $result);
  				$this->result['success'] = 1;
  				$this->result['message'] = '<div class="alert alert-success">Congratulations!! You have successfully updated your profile.</div> ';
  				return $this->result;
			} else {  				
				$this->db->trans_rollback();
				throw new Exception('OOPs!! Please Make Some Changes to Update Your Profile!!');
  			}
		}
		catch (Exception $e) {
  			$this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  			return $this->result;
		}
	}

/* 	@Function to Update Admin Password..
	@Data holds values to update Password
*/	function _ResetPassword(){
		try 
		{	
			$data = $this->input->post('data');
			$data = $this->security->xss_clean($data);	
			foreach($data as $key=>$value):
				$update[$this->prefix.$key] = md5($value);	
			endforeach;
			$this->db->update($this->table,	$update);
			$this->db->where(array(	$this->prefix.'id' => $this->data['admin_id']));
			$row = $this->db->affected_rows();
			if($row) {
				$this->result['success'] = 1;
				$this->result['message'] = '<div class="alert alert-success">Congratulations!! You have successfully updated your profile.</div> ';
				return $this->result;
			} else {  				
  				throw new Exception('OOPs!! You Have Entered Current Password. Please Make Some Changes to Update Your Password!!');
  			}
		}
		catch (Exception $e) {  			
  			$this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  			return $this->result;
		}
	}

	function _ManagerName($id){
		try{
			$result = $this->db->select($this->prefix.'name')->where($this->prefix.'id',$id)->get($this->table)->row_array();
			if(is_array($result)){
				return $result['admin_name'];
			} else {
				throw new Exception('Some error occured while trying to retrieve manager name.');
			}
		}
		catch(Exception $e){
			$this->result['message'] = "<div class='alert alert-danger'>".$e->getMessage()."</div>";
  			return $this->result;

		}
	}


	function search_field($country_id){
		echo $country_id;
    	$this->db->distinct();
    	$this->db->select("admin_name");
    	$this->db->from($this->table);
    	$this->db->like('admin_name', $country_id);
     	$this->db->limit(10);
    	$query = $this->db->get();
    	return $query->result();
	}
}