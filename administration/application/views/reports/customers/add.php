<?php $this->load->view('templates/header');?>
<div class="page-content-wrapper">
    <div class="content sm-gutter">
        <div class="container-fluid padding-25 sm-padding-10">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h4>Add Pharma Company
                            <span style="float:right;"><a href="<?=site_url('pharma');?>">Back</a></span>
                        </h4>
                    </div>
                </div>
                <div class="col-12">
                    <div class="block bg-trans table-block mb-4">
                        <?= form_open_multipart('add-pharma', array('class'=>'horizontal-form'));;?> 
                            <div class="form-group form-row">
                                <?=form_label('Name','data[name]',array('class'=>'col-md-2'));?>
                                <?=form_input(
                                    array
                                    ( 
                                        'name'  => 'data[name]', 
                                        'value' => set_value('data[name]'), 
                                        'class' => 'form-control col-md-10', 
                                        'type'  => 'text',
                                        'required'    => 'required',
                                        'placeholder' => 'Name'
                                        
                                    )); 
                                ?>
                                <div class="clearfix"> </div>
                                <?= form_error('data[name]','<div class="error invalid-feedback col-md-12 text-right">', '</div>'); ?>
                            </div>                                                            
                            <div class="form-group form-row">
                                <?php $options = 
                                    array(
                                        '1' => 'Active',
                                        '0' => 'Deactive'
                                    ) ;
                                ?>
                                <?=form_label('Status','data[status]',array('class'=>'col-md-2'));?>
                                <?=form_dropdown('data[status]', $options, 1, array('class' => 'custom-select form-control col-md-10'));;?>
                                <div class="clearfix"> </div>
                            </div>         
                            <div class="form-group form-row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-info" type="reset">Cancel</button>
                                    <button class="btn btn-primary mr-3" type="submit">Submit</button>
                                </div>
                            </div>    
                        <?= form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer');?>	