<?php $this->load->view('templates/header');?>
<?php extract($details);?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>Update Blog / Page
                        <span style="float:right;"><a href="<?=site_url('blogs');?>">Back</a></span>
                    </h4>
                </div>
            </div>
            <div class="col-12">
                <div class="block bg-trans table-block mb-4">
                    <?= form_open_multipart(site_url("update-blog/$blog_id"), array('class'=>'horizontal-form'));;?>
                        <div class="form-group form-row">
                            <?=form_label('Name','data[name]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[name]', 
                                    'value' => set_value('data[name]',$blog_name), 
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
                            <?=form_label('Description','data[description]',array('class'=>'col-md-2'));?>
                            <?= $this->ckeditor->editor('data[description]',$blog_description,array('class'=>'form-control col-md-10'));?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[description]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>                   
                        <div class="form-group form-row">
                            <?=form_label('Title','data[title]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[title]', 
                                    'value' => set_value('data[title]',$blog_title), 
                                    'class' => 'form-control col-md-10', 
                                    'type'  => 'text',
                                    'placeholder' => 'Title'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[title]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?=form_label('Keywords','data[keywords]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[keywords]', 
                                    'value' => set_value('data[keywords]',$blog_keywords), 
                                    'class' => 'form-control col-md-10', 
                                    'type'  => 'text',
                                    'placeholder' => 'Keywords'
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[keywords]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?php $options = 
                                array(
                                    '0' => 'Page',
                                    '1' => 'Blog'
                                ) ;
                            ?>
                            <?=form_label('Info Type','data[type]',array('class'=>'col-md-2'));?>
                            <?=form_dropdown('data[type]', $options, $blog_type , array('class' => 'custom-select form-control col-md-10'));;?>
                            <div class="clearfix"> </div>
                        </div>    
                        
                        <div class="form-group form-row">
                            <?php $options = 
                                array(
                                    '1' => 'Active',
                                    '0' => 'Disable'
                                ) ;
                            ?>
                            <?=form_label('Status','data[status]',array('class'=>'col-md-2'));?>
                            <?=form_dropdown('data[status]', $options, 1, array('class' => 'custom-select form-control col-md-10'));;?>
                            <div class="clearfix"> </div>
                        </div>      
                        <!--   
                        <div class="form-group form-row">
                            <?=form_label('Banner','data[banner]',array('class'=>'col-md-2'));?>  
                            <?=form_upload( 
                                    array
                                    ( 
                                        'name'  => 'image[]', 
                                        'value' => set_value('image[]'), 
                                        'class' => 'form-control col-md-9', 
                                        'type'  => 'file'
                                    )); 
                            ?>                                                                       
                            <a href="#" class="add_field_button col-md-1"> Add More</a>
                            <div class="clearfix"> </div>
                        </div>                           
                        -->
                        <div class="input_fields_wrap"></div>
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
<?php $this->load->view('templates/footer');?>	