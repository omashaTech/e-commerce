<?php $this->load->view('templates/header'); extract($brands)?>
<?= form_open_multipart(site_url("update-brand/$brand_id"), array('class'=>'horizontal-form'));;?> 
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> UPDATE BRAND DETAILS
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("brands");?>"><i class="fa fa-reply-all"></i></a>
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-floppy-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
                <div class="block bg-trans table-block mb-4">
                    <div class="form-group form-row">
                        <?=form_label('Name','data[name]',array('class'=>'col-md-2'));?>
                        <?=form_input(
                            array
                            ( 
                                'name'  => 'data[name]', 
                                'value' => set_value('data[name]',$brand_name), 
                                'class' => 'form-control col-md-10', 
                                'type'  => 'text',
                                'required'    => 'required',
                                'placeholder' => 'Name'
                                
                            )); 
                        ?>
                        <div class="clearfix"> </div>
                        <?= form_error('data[name]','<div class="error col-md-12 text-right">', '</div>'); ?>
                    </div>                                                            
                    <div class="form-group form-row">
                    <?=form_label('Title','data[title]',array('class'=>'col-md-2'));?>
                    <?=form_input(
                        array
                        ( 
                            'name'  => 'data[title]', 
                            'value' => set_value('data[title]',$brand_title), 
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
                            'value' => set_value('data[keywords]',$brand_keywords), 
                            'class' => 'form-control col-md-10', 
                            'type'  => 'text',
                            'placeholder' => 'Keywords'
                        )); 
                    ?>
                    <div class="clearfix"> </div>
                    <?= form_error('data[keywords]','<div class="error col-md-12 text-right">', '</div>'); ?>
                </div>
                <div class="form-group form-row">
                    <?=form_label('Description','data[description]',array('class'=>'col-md-2'));?>
                    <?=form_input(
                        array
                        ( 
                            'name'  => 'data[description]', 
                            'value' => set_value('data[description]',$brand_description), 
                            'class' => 'form-control col-md-10', 
                            'type'  => 'text',
                            'placeholder' => 'Description'
                        )); 
                    ?>
                    <div class="clearfix"> </div>
                    <?= form_error('data[description]','<div class="error col-md-12 text-right">', '</div>'); ?>
                </div>              
                <div class="form-group form-row">
                    <?php $options = 
                        array(
                            '0' => 'Products',
                            '1' => 'Medicines'
                        ) ;
                    ?>
                    <?=form_label('Brand Type','data[type]',array('class'=>'col-md-2'));?>
                    <?=form_dropdown('data[type]', $options, $brand_type , array('class' => 'custom-select form-control col-md-10'));;?>
                    <div class="clearfix"> </div>
                </div>    
                
                <div class="form-group form-row">
                    <?php $options = 
                        array(
                            '1' => 'Active',
                            '0' => 'Deactive'
                        ) ;
                    ?>
                    <?=form_label('Status','data[status]',array('class'=>'col-md-2'));?>
                    <?=form_dropdown('data[status]', $options, $brand_status, array('class' => 'custom-select form-control col-md-10'));;?>
                    <div class="clearfix"> </div>
                </div>         
                <div class="form-group form-row">
                    <?=form_label('Brand Logo','image[]',array('class'=>'col-md-2'));?>  
                    <?=form_upload( 
                            array
                            ( 
                                'name'  => 'image[]', 
                                'value' => set_value('image[]'), 
                                'class' => 'form-control col-md-9', 
                                'type'  => 'file'
                            )); 
                    ?>                                                                       
                    <div class="clearfix"> </div>
                </div>                           
                <div class="form-group form-row">
                <?php if(!empty($brand_image)):
                        $Banners = explode('$thumbs$',$brand_image);
                        $thumbs = explode('>>>',$Banners[1]);
                        foreach ($thumbs as $key=> $thumb):?>
                            <div class="image-thumb" style="margin-right: 10px;">
                                <img src="<?=base_url($thumb);?>" >
                                <a href="#" class="image-fav"></a>
                            </div>    
                    <?php endforeach;
                    endif; 
                ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close();?>
<?php $this->load->view('templates/footer');?>  