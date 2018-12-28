<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="ie=edge" http-equiv="x-ua-compatible">
<meta content="template language" name="keywords">
<meta content="" name="author">
<meta content="Aushadh Lifecare - Admin Panel" name="description">
<meta content="width=device-width, initial-scale=1" name="viewport">
<title>Aushadh Lifecare - Admin Panel</title>
<!--favicon-->    
<link href="../assets/panel/images/favicon.ico" rel="shortcut icon">
<!--bootstrap-4-->
<?=	link_tag('../assets/panel/css/bootstrap.min.css');?>
<!--Main Css-->
<?= link_tag("../assets/panel/css/main.css");?>
<style>.error { color:red; }</style>
</head>
<body class="top-navigation">
<section style="background: url(<?=base_url('../assets/panel/images/bg_1.jpg');?>);background-size: cover">
  <div class="height-100-vh">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="login-div">
            <div class="logo"> <img src=<?=base_url('../assets/panel/images/logo.png');?> width=280></div>
            <?php if($this->session->flashdata('Message')): echo $this->session->flashdata('Message'); endif; ?>
            <?= form_open(site_url('otp'),array('id'=>'validateForm'));?>
              <div class="row col-md-12">
            		<div class="form-group col-md-9">         
                	<?= form_input(
                	    array(
                        'name'  =>'data[otp]', 
        					     	'value' => set_value('data[otp]'),
        				  		  'class' => 'form-control', 
        				  		  'placeholder'=>'OTP',
        				  		  'required'   =>'required'
        					     )
        			 	    );?>
                    <div class="clearfix"></div>
                    <?= form_error('data[otp]',"<div class=error>","</div>"); ?>
    			 	    </div>
  				      <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary nextBtn pull-right">Verify</button>
  				      </div>
              </div>	
            <?= form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Jquery-->
<script type="text/javascript" src=<?= base_url("../assets/panel/js/jquery-3.2.1.min.js");?>></script>
<!--Bootstrap Js-->
<script type="text/javascript" src=<?= base_url("../assets/panel/js/bootstrap.min.js");?>></script>
</body>
</html>