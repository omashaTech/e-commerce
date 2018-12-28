<?php $this->load->view('templates/header');?>
<?= form_open(site_url('profile'), array('class'=>'horizontal-form'));;?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>My Profile
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("dashboard");?>"><i class="fa fa-reply-all"></i></a>
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-floppy-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
                <div class="block bg-trans table-block mb-4">
                    <div class="block-heading"><h5>Update Profile</h5> </div>
                    <?= form_open('profile', array('class'=>'horizontal-form'));;?>
                        <div class="form-group form-row">
                            <?=form_label('Name','data[name]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[name]', 
                                    'value' => set_value('data[name]',$admin_name), 
                                    'class' => 'form-control col-md-9', 
                                    'placeholder' => 'Name'
                                    
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[name]'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?=form_label('Email','data[email]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[email]', 
                                    'value' => set_value('data[email]',$admin_email), 
                                    'class' => 'form-control col-md-9', 
                                    'type'  => 'email',
                                    'placeholder' => 'Email'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[email]'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?=form_label('Phone','data[phone]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[phone]', 
                                    'value' => set_value('data[phone]',$admin_phone), 
                                    'class' => 'form-control col-md-9', 
                                    'type'  => 'text',
                                    'placeholder' => 'Phone'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[phone]'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?=form_label('Address','data[address]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[address]', 
                                    'value' => set_value('data[address]',$admin_address), 
                                    'class' => 'form-control col-md-9', 
                                    'type'  => 'text',
                                    'placeholder' => 'Address'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[address]'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?=form_label('Zip Code','data[zip]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[zip]', 
                                    'value' => set_value('data[zip]',$admin_zip), 
                                    'class' => 'form-control col-md-9', 
                                    'type'  => 'text',
                                    'placeholder' => 'Zip Code'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[zip]'); ?>
                        </div>    
                    <?= form_close();?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer');?>    