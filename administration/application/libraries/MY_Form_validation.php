<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation{    
     function __construct($config = array()){
          parent::__construct($config);
     }

    function alpha_space($str)  {
        return ( ! preg_match("/^([a-zA-Z ])+$/i", $str)) ? FALSE : TRUE;
    } 

    function checkPin($pin){
     	$CI =& get_instance();
        $CI->load->model('Vendor_Model','VENDOR');
        $available = $CI->VENDOR->checkPin($pin);
		return (!$available == 1)? FALSE : TRUE;
    }

    function valid_password($password)  {
        $valid = '/^(?=.*\d)[a-zA-Z0-9]$/';
        return (preg_match_all($valid, $password))? TRUE : FALSE;
        
    }


    function valid_PAN($pan){
      $pattern = '/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/';
      $result = preg_match($pattern, $pan);
      if($result) {
          $findme = ucfirst(substr($pan, 3, 1));
          $mystring = 'CPHFATBLJG';
          $pos = strpos($mystring, $findme);
          return ($pos === false)? FALSE:TRUE;
      } else {
          return FALSE;
      }
    }

    
}     