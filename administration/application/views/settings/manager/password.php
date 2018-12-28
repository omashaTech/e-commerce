<?php $this->load->view('templates/header');?>
<?= form_open(site_url('password'), array('class'=>'horizontal-form'));;?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>Change Password
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
                <div class="block form-block mb-4">
                    <div class="block-heading">
                        <h5>Change Password</h5>
                    </div>
                    
                        <div class="form-group form-row">
                            <?=form_label('Password','data[password]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[password]', 
                                    'value' => set_value('data[password]'), 
                                    'class' => 'form-control col-md-9', 
                                    'type'  => 'password',
                                    'placeholder' => 'Password'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[password]'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?=form_label('Confirm Password','cnfpassword',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'cnfpassword', 
                                    'value' => set_value('cnfpassword'), 
                                    'class' => 'form-control col-md-9', 
                                    'type'  => 'password',
                                    'placeholder' => 'Confirm Password'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('cnfpassword'); ?>
                        </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer');?>    