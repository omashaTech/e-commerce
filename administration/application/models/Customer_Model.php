<?php
class Customer_Model extends CI_Model {
    private $table = 'store_customers';
    private $prefix  = 'customer_';

    function __construct() {}     

    
    
    function _GetCustomersList() 
    {
        $this->db->select('*');
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }   

    function _GetCustomerById($id)
    {
        $this->db->select('*')->where($this->prefix.'id',$id);
        $query = $this->db->get($this->table)->row_array();
        return $query;
    }

}   
   