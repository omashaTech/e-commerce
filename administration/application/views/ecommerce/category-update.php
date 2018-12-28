<?php $this->load->view('templates/header'); extract($details);?>
 <?= form_open_multipart(site_url("update-category/$category_id"), array('class'=>'horizontal-form'));;?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> UPDATE CATEGORY DETAIL
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("categories");?>"><i class="fa fa-reply-all"></i></a>
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-floppy-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
                <div class="block bg-trans table-block mb-4">
                    <?php $disable = array_column($disable, 'category_id'); ?>
                    <?php array_push($disable,$category_id); ?>                   
                	<div class="form-group form-row">                                
                        <?=form_label('Parent Category','data[parent]',array('class'=>'col-md-2'));?>
                        <select class='custom-select form-control col-md-9' name="data[parent]">
                            <option value="0" <?=($category_parent == 0)?"selected":"";?>>None</option>
                        <?php foreach($categories as $key=>$value):;?>
                            <option value="<?=$value['category_id'];?>" 
                                <?=($value['category_id'] == $category_parent)?"selected":"";?>
                                <?= (in_array($value['category_id'], $disable)?"disabled":"");?>>
                                <?=$value['category_name'];?>
                            </option>
                        <?php endforeach;?>
                        </select>
                    </div>    
                    <div class="form-group form-row">
                        <?=form_label('Name','data[name]',array('class'=>'col-md-2'));?>
                        <?=form_input(
                            array
                            ( 
                                'name'  => 'data[name]', 
                                'value' => set_value('data[name]',$category_name), 
                                'class' => 'form-control col-md-9', 
                                'type'  => 'text',
                                'placeholder' => 'Name'
                                
                            )); 
                        ?>
                        <div class="clearfix"> </div>
                        <?= form_error('data[name]'); ?>
                    </div>                                
                    <div class="form-group form-row">
                        <?=form_label('Title','data[title]',array('class'=>'col-md-2'));?>
                        <?=form_input(
                            array
                            ( 
                                'name'  => 'data[title]', 
                                'value' => set_value('data[title]',$category_title), 
                                'class' => 'form-control col-md-9', 
                                'type'  => 'text',
                                'placeholder' => 'Title'
                            )); 
                        ?>
                        <div class="clearfix"> </div>
                        <?= form_error('data[title]'); ?>
                    </div>
                    <div class="form-group form-row">
                        <?=form_label('Keywords','data[keywords]',array('class'=>'col-md-2'));?>
                        <?=form_input(
                            array
                            ( 
                                'name'  => 'data[keywords]', 
                                'value' => set_value('data[keywords]',$category_keywords), 
                                'class' => 'form-control col-md-9', 
                                'type'  => 'text',
                                'placeholder' => 'Keywords'
                            )); 
                        ?>
                        <div class="clearfix"> </div>
                        <?= form_error('data[keywords]'); ?>
                    </div>
                    <div class="form-group form-row">
                        <?=form_label('Description','data[description]',array('class'=>'col-md-2'));?>
                        <?=form_input(
                            array
                            ( 
                                'name'  => 'data[description]', 
                                'value' => set_value('data[description]',$category_description), 
                                'class' => 'form-control col-md-9', 
                                'type'  => 'text',
                                'placeholder' => 'Description'
                            )); 
                        ?>
                        <div class="clearfix"> </div>
                        <?= form_error('data[description]'); ?>
                    </div>              
                    <div class="form-group form-row">
                        <?php $options = 
                            array(
                            	'0' => 'Product Menu',
                                '1' => 'Page Menu',
                                '2' => 'Blog Menu'
                            ) ;
                        ?>
                        <?=form_label('Category Type','data[type]',array('class'=>'col-md-2'));?>
                        <?=form_dropdown('data[type]', $options, $category_type , array('class' => 'custom-select form-control col-md-9'));;?>
                    </div>  
                    <div class="form-group form-row">
                        <?php $options = 
                            array(
                                '1' => 'Active',
                                '0' => 'Deactive'
                            ) ;
                        ?>
                        <?=form_label('Status','data[status]',array('class'=>'col-md-2'));?>
                        <?=form_dropdown('data[status]', $options,$category_status, array('class' => 'custom-select form-control col-md-9'));;?>
                    </div>                                    
                    <div class="form-group form-row">
                        <?=form_label('Banner','image[]',array('class'=>'col-md-2'));?>  
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
                    <?php if($category_banner!=NULL):?>
                        <div class="image-thumb" style="margin-right: 10px;">
                            <img src="../../assets/uploads/categories/thumbs/<?=$category_banner;?>" >
                        </div>    
                    <?php endif;?>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close();?>
<?php $this->load->view('templates/footer');?>	