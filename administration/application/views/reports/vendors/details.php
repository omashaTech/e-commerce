<?php $this->load->view('templates/header'); extract($profile);?>
<?= form_open_multipart(site_url("vendor-details/$vendor_id"), array('class'=>'horizontal-form'));;?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>Vendor Details
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("vendors");?>"><i class="fa fa-reply-all"></i></a>
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-floppy-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
                <div class="block bg-trans table-block mb-4">
                    <!-- tabs left -->
                    <div class="error"><?= validation_errors();  ?></div>
                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" style="margin-bottom: 20px">
                            <li class="active"><a href="#basic" data-toggle="tab">Basic Info</a></li>
                            <li><a href="#business" data-toggle="tab">Business Info</a></li>
                            <li><a href="#bank" 	data-toggle="tab">Bank Info</a></li>
                            <li><a href="#status" 	data-toggle="tab">Status</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="basic">
                                <div class="form-group form-row">
                                    <?=form_label('Name*','Basic[name]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[name]',     
                                            'value' => set_value('Basic[name]', $vendor_name), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'type'  => 'text'
                                        )); 
                                    ?>
                                </div>                                    
                                <!-- Product Name Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Email*','Basic[email]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[email]',  
                                            'value' => set_value('Basic[email]',$vendor_email), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'type'  => 'text'
                                        )); 
                                    ?>
                                </div>
                                <div class="form-group form-row">
                                    <?=form_label('Verified Contact*','Basic[phone]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[phone]',  
                                            'value' => set_value('Basic[phone]',$vendor_phone), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'type'  => 'text'
                                            
                                        )); 
                                    ?>
                                </div>
                                <div class="block-heading"><h5>Products Pickup Address</h5></div>
                                <div class="form-group form-row">
                                    <?=form_label('Address','Basic[address]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[address]', 
                                            'value' => set_value('Basic[address]',$vendor_address), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'required' => 'required'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Basic[address]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                          
                                <div class="form-group form-row">
                                    <?=form_label('Landmark','Basic[landmark]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[landmark]', 
                                            'value' => set_value('Basic[landmark]',$vendor_landmark), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Basic[landmark]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>      
                                <div class="form-group form-row">
                                    <?=form_label('City','Basic[city]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[city]', 
                                            'value' => set_value('Basic[city]',$vendor_city), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'required' => 'required'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Basic[city]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                          
                                <div class="form-group form-row">
                                    <?=form_label('Pincode','Basic[zip]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Basic[zip]', 
                                            'value' => set_value('Basic[zip]',$vendor_zip), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'required' => 'required'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Basic[zip]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>
                                <div class="form-group form-row">
                                    <?=form_label('State','Basic[state]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <select name="Basic[state]" class="custom-select form-control col-md-9">
                                    <?php foreach($states as $state):?>
                                    	<option value="<?=$state['state_id'];?>"
                                        <?=($state['state_id']==$vendor_state)?"selected":"disabled";?> >
                                    			<?=$state['state_name'];?></option>
                                    	<?php endforeach;?>
                                    </select>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Basic[state]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>    
                            </div>
                            <div class="tab-pane" id="business">
                                <div class="form-group form-row">
                                    <?=form_label('Business Name','Business[name]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[name]', 
                                            'value' => set_value('Business[name]',$business_name), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'required' => 'required'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[title]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>
                                <div class="form-group form-row">
                                    <?=form_label('Business Type','Business[type]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?php $business = ($business_type==0)?"Proprietor":"Company";?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'value' => set_value('Business[type]',$business), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'readonly' => 'readonly'
                                        )); 
                                    ?>
                                </div>   
                                <div class="form-group form-row">
                                    <?=form_label('Business GSTIN','Business[gstin]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[gstin]', 
                                            'value' => set_value('Business[gstin]',$business_gstin), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[type]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>            
                                <div class="form-group form-row">
                                    <?=form_label('Personal PAN','Business[personal_pan]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[personal_pan]', 
                                            'value' => set_value('Business[personal_pan]',$business_personal_pan), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'required' => 'required'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[personal_pan]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>
                                <?php if($business_type==1) :?>                               
                                <div class="form-group form-row">
                                    <?=form_label('Company PAN','Business[company_pan]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[company_pan]', 
                                            'value' => set_value('Business[company_pan]',$business_company_pan), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'required' => 'required'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[company_pan]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>   
                                <div class="form-group form-row">
                                    <?=form_label('Business TAN','Business[tan]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[tan]', 
                                            'value' => set_value('Business[tan]',$business_tan), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'placeholder' => 'Business TAN'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[tan]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                               
                                <div class="form-group form-row">
                                    <?=form_label('Business CIN','Business[cin]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[cin]', 
                                            'value' => set_value('Business[cin]',$business_cin), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'placeholder' => 'Business CIN'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[cin]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>   
                                <?php endif;?>                  
                                <div class="block-heading"><h5>Business Address</h5></div>          
                                <div class="form-group form-row">
                                    <?=form_label('Address','Business[address]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[address]', 
                                            'value' => set_value('Business[address]',$business_address), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'placeholder' => 'Address'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[address]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                          
                                <div class="form-group form-row">
                                    <?=form_label('Landmark','Business[landmark]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[landmark]', 
                                            'value' => set_value('Business[landmark]',$business_landmark), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'placeholder' => 'Landmark'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[landmark]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>      
                                <div class="form-group form-row">
                                    <?=form_label('City','Business[city]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[city]', 
                                            'value' => set_value('Business[city]',$business_city), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'placeholder' => 'City'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[city]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                          
                                <div class="form-group form-row">
                                    <?=form_label('Pincode','Business[zip]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Business[zip]', 
                                            'value' => set_value('Business[zip]',$business_zip), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'placeholder' => 'Pincode'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Business[zip]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>
                                <div class="form-group form-row">
                                    <?=form_label('State','Business[state]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <select name="Business[state]" class="custom-select form-control col-md-9">
                                    <?php foreach($states as $state):?>
                                    	<option value="<?=$state['state_id'];?>"
                                        <?=($state['state_id']==$business_state)?"selected":"disabled";?>>
                                    			<?=$state['state_name'];?></option>
                                    	<?php endforeach;?>
                                    </select>
                                </div>    
                            </div>
                            <div class="tab-pane" id="bank">
                                <div class="block-heading"><h5>Bank Details</h5></div>      
                                <div class="form-group form-row">
                                    <?=form_label('Name','Bank[name]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'value' => set_value('Bank[name]',$bank_name), 
                                            'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'readonly' => 'readonly'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Bank[address]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                          
                                <div class="form-group form-row">
                                    <?=form_label('Account Name','Bank[account_name]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                           'value' => set_value('Bank[account_name]',$bank_account_name), 
                                           'class' => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                           'disabled' => 'disabled'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Bank[account_name]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>      
                                <div class="form-group form-row">
                                    <?=form_label('Account Number','Bank[account]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'value'     => set_value('Bank[account]',$bank_account), 
                                            'class'     => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'readonly'  => 'readonly'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Bank[account]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                              
                                <div class="form-group form-row">
                                    <?=form_label('IFSC Code','Bank[ifsc]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'value'     => set_value('Bank[ifsc]',$bank_ifsc), 
                                            'class'     => 'form-control col-md-9 col-sm-8 col-xs-6', 
                                            'readonly'  => 'readonly'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Bank[ifsc]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>      
                            </div>
                            <div class="tab-pane" id="status">
                                <div class="form-group form-row">
                                    <?=form_label('Status*','Basic[name]',array('class'=>'col-md-2 col-sm-4 col-xs-6'));?>
                                    <?php $options = array(
                                    				'0' => 'Non-Verified',
                                    				'1' => 'Phone-Verified', 
                                    				'2' => 'Address-Verified',
                                    				'3' => 'Business-Verified',
                                    				'4' => 'Bank-Verified',
                                    				'5' => 'Verified'
                                    			);
                                    ?>
                                    <?=form_dropdown('Basic[status]', $options, $vendor_status, array('class' => 'custom-select form-control col-md-10'));;?>
                                </div>                   
                        </div>
                    </div>
                </div>
                <!-- /tabs -->
                
            </div>
        </div>
    </div>
</div>
<?= form_close();?>
<?php $this->load->view('templates/footer');?>