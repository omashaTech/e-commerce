<?php $this->load->view('templates/header'); extract($medicine);?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>Update Medicine Details 
                        <span style="float:right;"><a href="<?=site_url('medicines');?>">Back</a></span>
                    </h4>
                </div>
            </div>
            <div class="col-12">
                <div class="block bg-trans table-block mb-4">
                    <?= form_open("update-medicine/$medicine_id", array('class'=>'horizontal-form'));;?>
                        <!-- Manufacturer Name Row -->
                        <div class="form-group form-row">
                            <?=form_label('Manufacturer Name*','data[mfg]',array('class'=>'col-md-2'));?>
                            <select name="data[mfg]"" class="form-control col-md-10">
                                <?php foreach ($pharmacy as $value): extract($value);?>
                                <option value=<?=$pharma_id;?> <?=($pharma_id==$medicine_mfg)?"selected":"";?>><?=$pharma_name;?></option>
                                <?php endforeach;?>
                            </select>    
                            <div class="clearfix"> </div>
                        </div>   
                        <!-- Medicine Name / StrengthRow -->
                        <div class="form-group form-row">
                            <?=form_label('Medicine Name*','data[name]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[name]', 
                                    'value' => set_value('data[name]',$medicine_name), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Medicine Name'
                                    
                                )); 
                            ?>
                            <?= form_error('data[name]','<div class="error col-md-6 text-right">', '</div>'); ?>
                            <?=form_label('Medicine Strength*','data[strength]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[strength]', 
                                    'value' => set_value('data[strength]',$medicine_strength), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Medicine Strength'
                                    
                                )); 
                            ?>
                            <?= form_error('data[strength]','<div class="error col-md-6 text-right">', '</div>'); ?>
                        </div>           
                        <div class="form-group form-row">
                            <?=form_label('Medicine Batch*','data[batch]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[batch]', 
                                    'value' => set_value('data[batch]',$medicine_batch), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Medicine Batch'
                                    
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[name]','<div class="error col-md-6 text-right">', '</div>'); ?>

                            <?=form_label('Medicine Expiry*','data[expiry]',array('class'=>'col-md-2'));?>
                            <select name="data[expiry][month]" class="custom-select form-control col-md-1">
                            <?php 
                                $month  =  date('m',strtotime($medicine_expiry));
                                $y  =  date('Y',strtotime($medicine_expiry));
                                $year   = mdate('%Y', time());
                            ?>
                            <?php for($i=1; $i<=12;$i++):?>
                                <option <?= ($i==$month)?"selected":"";?>> <?=$i;?></option>
                            <?php endfor;?>
                            </select>                            
                            <select name="data[expiry][year]" class="custom-select form-control col-md-1">
                            <?php for($i=$year; $i<=$year+4;$i++):?>
                                <option <?= ($i==$y)?"selected":"";?> value="<?=$i;?>"> <?=$i;?></option>
                            <?php endfor;?>
                            </select>                            
                        </div>    
                        <div class="form-group form-row">
                            <?php $options = 
                                array(
                                    'Strips'    => 'Strips',
                                    'Bottle'    => 'Bottle',
                                    'Vial'      => 'Vial',
                                    'Spray'     => 'Spray',
                                    'Drops'     => 'Drops'
                                ) ;
                            ?>
                            <?=form_label('Medicine Packing*','data[packing_form]',array('class'=>'col-md-2'));?>

                            <?=form_dropdown('data[packing_form]', $options, $medicine_packing_form , array('class' => 'custom-select form-control col-md-4'));;?>

                            <?php $options = 
                                array(
                                    'Tablets'   => 'Tablets',
                                    'ML'        => 'ML',
                                    'Capsules'  => 'Capsules',
                                ) ;
                            ?>
                            <?=form_label('Medicine Form*','data[form]',array('class'=>'col-md-2'));?>
                            <?=form_dropdown('data[form]', $options, $medicine_form , array('class' => 'custom-select form-control col-md-4'));;?>
                        </div>    
                        <div class="form-group form-row">
                            <?=form_label('Medicine Packing Quantity*', 'data[packing_qty]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[packing_qty]', 
                                    'value' => set_value('data[packing_qty]',$medicine_packing_qty), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Medicine Packing Quantity'
                                    
                                )); 
                            ?>
                            
                            <div class="clearfix"> </div>
                            <?= form_error('data[packing_qty]','<div class="error col-md-12 text-right">', '</div>'); ?>
                            <?=form_label('Medicine MRP*','data[mrp]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[mrp]', 
                                    'value' => set_value('data[mrp]',$medicine_mrp), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Medicine MRP'
                                    
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[mrp]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>            
                         <div class="form-group form-row">
                            <?=form_label('Customer Discount*', 'data[discount]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[discount]', 
                                    'value' => set_value('data[discount]',$medicine_discount), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Customer Discount'
                                    
                                )); 
                            ?>
                            <?=form_label('Store Discount*','data[max_discount]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[max_discount]', 
                                    'value' => set_value('data[max_discount]',$medicine_max_discount), 
                                    'class' => 'form-control col-md-4', 
                                    'type'  => 'text',
                                    'required' => 'required',
                                    'placeholder' => 'Store Discount'
                                    
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[discount]','<div class="error col-md-6">', '</div>'); ?>
                            <?= form_error('data[max_discount]','<div class="error col-md-6">', '</div>'); ?>
                        </div>   
                        <div class="form-group form-row">
                            <?=form_label('Medicine HSN / SAC*','data[hsn_sac]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[hsn_sac]', 
                                    'value' => set_value('data[hsn_sac]',$medicine_hsn_sac), 
                                    'class' => 'form-control col-md-10', 
                                    'type'  => 'text',
                                    'required'  => 'required',
                                    'placeholder' => 'Medicine HSN / SAC'
                                    
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[hsn_sac]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>                                   
                        <div class="form-group form-row">
                            <?=form_label('Medicine Category','data[category]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[category]', 
                                    'value' => set_value('data[category]',$medicine_category), 
                                    'class' => 'form-control col-md-10', 
                                    'type'  => 'text',
                                    'placeholder' => 'Medicine Category'
                                    
                                )); 
                            ?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[category]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>    
                        <div class="form-group form-row">
                            <?=form_label('Title','data[title]',array('class'=>'col-md-2'));?>
                            <?=form_input(
                                array
                                ( 
                                    'name'  => 'data[title]', 
                                    'value' => set_value('data[title]',$medicine_title), 
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
                                    'value' => set_value('data[keywords]',$medicine_keywords), 
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
                            <?= $this->ckeditor->editor('data[description]',$medicine_description,array('class'=>'form-control col-md-10'));?>
                            <div class="clearfix"> </div>
                            <?= form_error('data[description]','<div class="error col-md-12 text-right">', '</div>'); ?>
                        </div>
                        <div class="form-group form-row">
                            <?php $options = 
                                array(
                                    '1' => 'Active',
                                    '0' => 'Deactive'
                                ) ;
                            ?>
                            <?=form_label('Status','data[status]',array('class'=>'col-md-2'));?>
                            <?=form_dropdown('data[status]', $options, $medicine_status, array('class' => 'custom-select form-control col-md-10'));;?>
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
<?php $this->load->view('templates/footer');?>	