<?php extract($this->data);?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<title>Aushad Lifecare - Admin Panel</title>
<!--favicon-->
<link href=<?= base_url("../assets/panel/images/favicon.ico");?> rel="shortcut icon">
<!--bootstrap-4-->
<?= link_tag("../assets/panel/css/bootstrap.min.css");?>
<!--Icons-->
<?= link_tag("../assets/panel/icons/dripicons/dripicons.css");?>
<?= link_tag("../assets/panel/icons/fontawesome/css/font-awesome.min.css");?>
<!--Date-range-->
<?= link_tag("../assets/panel/js/plugins/date-range/daterangepicker.css");?>
<!--Full Calendar-->
<?= link_tag("../assets/panel/js/plugins/full-calendar/fullcalendar.min.css");?>
<!--Normalize Css-->
<?= link_tag("../assets/panel/css/min.style.css");?>
<!--Main Css-->
<?= link_tag("../assets/panel/css/main.css");?>
<script type="text/javascript" src=<?=base_url("../assets/panel/js/jquery-3.3.1.min.js");?>></script>
<style>.error, .error p { color:red; }</style>
</head>
<body>
<div class="page-content-wrapper">
   <div class="header fixed-header">
    <div class="container-fluid" style="padding: 10px 25px">
        <div class="row">
            <div class="col-9 col-md-6 d-lg-none"><a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i class="fa fa-bars"></i></a><span class="logo">Dashboard</span>
            </div>
            <div class="col-lg-8 d-none d-lg-block">    
                <img src=<?=base_url("../assets/panel/images/logo.png");?> alt="logo" class="brand" height="50">
            </div>
            <div class="col-3 col-md-6 col-lg-4">
                <a href="<?=base_url('logout.html');?>" class="btn btn-primary btn-round pull-right d-none d-md-block">Logout</a>
            </div>
        </div>
    </div>
</div>    
<!--Navigation-->
<nav id="navigation" class="navigation-sidebar bg-primary">
    <!--Navigation Profile area-->
    <div class="navigation-profile hidden-xs">
        <img class="profile-img rounded-circle" src="<?= base_url("../assets/panel/images/profile.png");?>" alt="profile image">
        <h4 class="name">{admin_name}</h4>
        <span class="designation">Super Admin</span>
        <a id="show-user-menu" href="javascript:void(0);" class="circle-white-btn profile-setting"><i class="fa fa-cog"></i></a>
        <!--logged user hover menu-->
        <div class="logged-user-menu bg-white">
            <div class="avatar-info">
                <img class="profile-img rounded-circle" src="<?= base_url("../assets/panel/images/profile.png");?>" alt="profile image">
                <h4 class="name">{admin_name}</h4>
                <span class="designation">Super Admin</span>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a href="<?=site_url('profile');?>">
                        <i class="ion-ios-person-outline"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('password');?>">
                        <i class="ion-ios-locked-outline"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('logout');?>">
                        <i class="ion-log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--Navigation Menu Links-->
    <div class="navigation-menu">
        <ul class="menu-items custom-scroll">
            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-briefcase"></i></span>
                    <span class="title">E-Commerce</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
                    <li>
                        <a href=<?=site_url('categories');?>>
                            <span class="icon-thumbnail"><i class="dripicons-network-3"></i></span>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href=<?=site_url('brands');?>>
                            <span class="icon-thumbnail"><i class="dripicons-bold"></i></span>
                            <span class="title">Brands</span>
                        </a>
                    </li>
                    <li>
                        <a href=<?=site_url('products');?>>
                            <span class="icon-thumbnail"><i class="dripicons-camera"></i></span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <!--
                    <li>
                        <a href=<?=site_url('medicines');?>>
                            <span class="icon-thumbnail"><i class="dripicons-pill"></i></span>
                            <span class="title">Medicines</span>
                        </a>
                    </li>
                    -->
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-cart"></i></span>
                    <span class="title">Orders</span>
                </a>                
                <ul class="sub-menu">
                    <!--<li>
                        <a href="<?=site_url('medicine-orders');?>">
                            <span class="icon-thumbnail"><i class="dripicons-pill"></i></span>
                            <span class="title">Medicines</span>
                        </a>
                    </li>
                    -->
                    <li>
                        <a href="<?=site_url('product-orders');?>">
                            <span class="icon-thumbnail"><i class="dripicons-camera"></i></span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                </ul>    
            </li>
            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-graph-bar"></i></span>
                    <span class="title">Reports</span>
                </a>                
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:void(0);" class="have-submenu">
                            <span class="icon-thumbnail"><i class="dripicons-graph-bar"></i></span>
                            <span class="title">Users</span>
                        </a>    
                        <ul class="sub-menu-2">
                            <li>
                                
                                <a href="<?=site_url('customers');?>">
                                    <span class="icon-thumbnail"><i class="dripicons-user"></i></span>
                                    <span class="title">Vendors</span>
                                </a>
                            </li>
                            <li>    
                                <a href="<?=site_url('customers');?>">
                                    <span class="icon-thumbnail"><i class="dripicons-user"></i></span>
                                    <span class="title">Customers</span>
                                </a>
                            </li>
                        </ul>  
                    </li>      
                    <li>
                        <a href="<?=site_url('vendors');?>">
                            <span class="icon-thumbnail"><i class="dripicons-user-group"></i></span>
                            <span class="title">Vendors</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url('visitors');?>">
                            <span class="icon-thumbnail"><i class="dripicons-graph-line"></i></span>
                            <span class="title">Visitors</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-archive"></i></span>
                    <span class="title">Web Content</span>
                </a>                
                <ul class="sub-menu">
                    <li>
                        <a href="<?=site_url('blogs');?>">
                            <span class="icon-thumbnail"><i class="dripicons-article"></i></span>
                            <span class="title">Pages</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url('banners');?>">
                            <span class="icon-thumbnail"><i class="dripicons-user-id"></i></span>
                            <span class="title">Banners</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url('emailers');?>">
                            <span class="icon-thumbnail"><i class="dripicons-direction"></i></span>
                            <span class="title">Emailers</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-article"></i></span>
                    <span class="title">Settings</span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                            <span class="icon-thumbnail"><i class="dripicons-blog"></i></span>
                            <span class="title">Shipping</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-thumbnail"><i class="dripicons-checkmark"></i></span>
                            <span class="title">Taxes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon-thumbnail"><i class="dripicons-upload"></i></span>
                            <span class="title">Managers</span>
                        </a>
                    </li>
                </ul>
            </li>            
            <li>
                <a href="documentation.html">
                    <span class="icon-thumbnail"><i class="dripicons-document"></i></span>
                    <span class="title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<section class="page-container">
    <div class="page-content-wrapper">
        <?php if($this->session->flashdata('Message')):?>
        <div class="content sm-gutter">    
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">                
                        <?= ($this->session->flashdata('Message'))? $this->session->flashdata('Message'):""; ?>
                    </div>    
                </div>  
            </div>
        </div>        
        <?php endif;?>