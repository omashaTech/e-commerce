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
            <div class="logo" style="text-align: center;"> <img src=<?=base_url('../assets/panel/images/logo.png');?> width=140></div>
            <?php if($this->session->flashdata('Message')): echo $this->session->flashdata('Message'); endif; ?>
            <?= form_open(site_url(), array('id' => 'needs-validation'));?>
              <div class="form-group">         
                <?=form_label('Email OR Mobile','data[username]',array('class'=>'control-label'));?>
                <?= form_input(
                    array
        						(  'name'=>'data[username]', 
            						'placeholder'=>'Registered Email OR Mobile', 
            						'class'=>'form-control input-lg',
            						'value' => set_value('data[username]')
          					)
        					 );
                ?>
  					   <div class="clearfix"> </div>
  					   <?= form_error('data[username]',"<div class=error>","</div>"); ?>
  	          </div>
              <div class="form-group">
                <?=form_label('Password','data[password]',array('class'=>'control-label'));?>
                <?= form_password(
      					   array
      						  (  'name'=>'data[password]', 
          						'placeholder'=>'User Password', 
          						'class'=>'form-control input-lg',
          						'value' => set_value('data[password]')
        					  )
      					  ); 
  					    ?>
  					    <div class="clearfix"> </div>
  					    <?= form_error('data[password]',"<div class=error>","</div>"); ?>
              </div>
              <div class="checkbox">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Remember me</span>                  
                </label>
                <button class="btn btn-primary mt-2">Sign In</button>
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