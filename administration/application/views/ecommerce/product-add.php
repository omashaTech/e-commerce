<?php $this->load->view('templates/header');?>
<?= form_open_multipart(site_url('add-product'), array('class'=>'horizontal-form'));;?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4>Add Product Details 
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("products");?>"><i class="fa fa-reply-all"></i></a>
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
                            <li class="active"><a href="#data" data-toggle="tab">Data</a></li>
                            <li><a href="#links" data-toggle="tab">Links</a></li>   
                            <li><a href="#seo" data-toggle="tab">SEO</a></li>
                            <li><a href="#images" data-toggle="tab">Images</a></li>   
                            <li><a href="#specifications" data-toggle="tab">Specifications</a></li>
                            <li><a href="#vendors" data-toggle="tab">Vendor</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="data">
                                <!-- Product MODEL / UPC CODE Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Product Model*','Product[model]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[model]', 
                                            'value' => set_value('Product[model]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'placeholder' => 'Product Model'
                                        )); 
                                    ?>
                                    <?=form_label('Product UPC','Product[upc]',array('class'=>'col-md-3  text-right'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[upc]', 
                                            'value' => set_value('Product[upc]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'placeholder' => 'Product Upc'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Product[model]','<div class="error col-md-6 text-right">', '</div>'); ?>
                                    <?= form_error('Product[upc]','<div class="error col-md-6 text-right">', '</div>'); ?>
                                </div>                                    
                                <!-- Product Name Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Product Name*','Product[name]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[name]', 
                                            'value' => set_value('Product[name]'), 
                                            'class' => 'form-control col-md-9', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Product Name'
                                        )); 
                                    ?>
                                    <?= form_error('Product[name]','<div class="error col-md-6 text-right">', '</div>'); ?>
                                </div>    
                                <!-- Product MRP / Minimum Order Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Product MRP*','Product[mrp]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[mrp]', 
                                            'value' => set_value('Product[mrp]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Product MRP'
                                        )); 
                                    ?>
                                    <?=form_label('Minimum Order*','Product[minimum]',array('class'=>'col-md-3 text-right'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[minimum]', 
                                            'value' => set_value('Product[minimum]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Minimum Order Quantity'
                                        )); 
                                    ?>
                                    <div class="clearfix"></div>
                                    <div class="col-md-2"></div>
                                    <?= form_error('Product[mrp]','<div class="error col-md-3">', '</div>'); ?>
                                    <div class="col-md-3"></div>
                                    <?= form_error('Product[minimum]','<div class="error col-md-3">', '</div>'); ?>
                                </div>                                     
                                <!-- Product Packing Dimensions Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Packing Dimensions*','Packing',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[length]', 
                                            'value' => set_value('Product[length]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Length'
                                        )); 
                                    ?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[width]', 
                                            'value' => set_value('Product[width]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Width'
                                        )); 
                                    ?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[height]', 
                                            'value' => set_value('Product[height]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Height'
                                        )); 

                                    ?>
                                    <div class="clearfix"></div>
                                    <div class="col-md-2"></div>
                                    <?= form_error('Product[length]','<div class="error col-md-3">', '</div>'); ?>
                                    <?= form_error('Product[width]','<div class="error col-md-3">', '</div>'); ?>
                                    <?= form_error('Product[height]','<div class="error col-md-3">', '</div>'); ?>
                                </div>
                                <!-- Product Packing Dimensions Class Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Dimension Class*','Product[packing_class]',array('class'=>'col-md-2'));?>
                                    <?php $options = 
                                        array(
                                            '0'  => 'Centimeter',
                                            '1'  => 'Inch'
                                        ) ;
                                    ?>
                                    <?=form_dropdown('Product[packing_class]', $options, 'Cent' , array('class' => 'custom-select form-control col-md-9'));;?>
                                </div>    
                                <!-- Product Packing Weight Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Packing Weight*','Weight',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[weight]',
                                            'value' => set_value('Product[weight]'), 
                                            'class' => 'form-control col-md-9',
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Weight'
                                        )); 
                                    ?>                            
                                    <div class="clearfix"></div>
                                    <div class="col-md-2"></div>
                                    <?= form_error('Product[weight]','<div class="error col-md-10">', '</div>'); ?>
                                </div>    
                                <!-- Product Packing Weight Class Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Weight Class*','Product[weight_class]',array('class'=>'col-md-2'));?>
                                    <?php $options = 
                                        array(
                                            '0'  => 'Grams',
                                            '1'  => 'Kilograms'
                                        ) ;
                                    ?>
                                    <?=form_dropdown('Product[weight_class]', $options, '0' , array('class' => 'custom-select form-control col-md-9'));;?>
                                </div>    
                                <div class="form-group form-row">
                                    <?php $options = 
                                        array(
                                            '1' => 'Active',
                                            '0' => 'Deactive'
                                        ) ;
                                    ?>
                                    <?=form_label('Status','Product[status]',array('class'=>'col-md-2'));?>
                                    <?=form_dropdown('Product[status]', $options, 1, array('class' => 'custom-select form-control col-md-9'));;?>
                                    <div class="clearfix"> </div>
                                </div>    
                            </div>
                            <div class="tab-pane" id="links">
                                <!-- Manufacturer Name Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Manufacturer Name*','Product[mfg]',array('class'=>'col-md-2'));?>
                                    <select name="Product[mfg]"" class="form-control col-md-9">
                                        {brands}<option value={brand_id}>{brand_name}</option>{/brands}
                                        <option value="0">Others</option>
                                    </select>    
                                    <div class="clearfix"> </div>
                                </div>   
                                <!-- Product Name Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Categories*','categories',array('class'=>'col-md-2'));?>
                                    <div class="scroll form-control col-md-9">
                                    {categories}
                                        <input type="checkbox" name="Categories[]" value="{category_id}">
                                        <label style="vertical-align:top;">{category_name}</label><br>
                                    {/categories}
                                    </div>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Categories[]','<div class="error col-md-9">', '</div>'); ?>
                                </div>    
                                <!-- Product Name Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Filters','Product[title]',array('class'=>'col-md-2'));?>
                                     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                                    <script src=<?=base_url("assets/js/bootstrap-multiselect.js");?>></script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#filters').multiselect({
                                                nonSelectedText : 'Select Filters',
                                                enableFiltering : true,
                                                enableCaseInsensitiveFiltering : true,
                                                buttonWidth : '400px'
                                            });
                                    });
                                    </script>
                                    <select id="filters" multiple="multiple" class="form-control col-md-9" name="Filters[]">
                                    {attributes}
                                        <option value="{attribute_id}">
                                            {attribute_group}&#x2192;{attribute_name}
                                        </option>
                                    {/attributes}
                                    </select>
                                </div>    
                            </div>
                            <div class="tab-pane" id="seo">
                                <div class="form-group form-row">
                                    <?=form_label('Title','Product[title]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[title]', 
                                            'value' => set_value('Product[title]'), 
                                            'class' => 'form-control col-md-9', 
                                            'type'  => 'text',
                                            'placeholder' => 'Title'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Product[title]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>
                                <div class="form-group form-row">
                                    <?=form_label('Keywords','Product[keywords]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Product[keywords]', 
                                            'value' => set_value('Product[keywords]'), 
                                            'class' => 'form-control col-md-9', 
                                            'type'  => 'text',
                                            'placeholder' => 'Keywords'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Product[keywords]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>                               
                                <div class="form-group form-row">
                                    <?=form_label('Description','Product[description]',array('class'=>'col-md-2'));?>
                                    <?= $this->ckeditor->editor('Product[description]','',array('class'=>'form-control col-md-9'));?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Product[description]','<div class="error col-md-12 text-right">', '</div>'); ?>
                                </div>
                            </div>
                            <!-- Images Tab Goes Here -->
                            <div class="tab-pane" id="images">
                                <div class="form-group form-row">
                                    <?=form_label('Image','image[]',array('class'=>'col-md-2'));?>  
                                    <?=form_upload( 
                                            array
                                            ( 
                                                'name'  => 'image[]', 
                                                'value' => set_value('image[]'), 
                                                'class' => 'form-control col-md-9', 
                                                'type'  => 'file'
                                            )); 
                                    ?>                       
                                    <div class="add_images col-md-1"><a href="#">Add +</a></div>
                                    <div class="clearfix"> </div>
                                </div>                           
                                <div class="input_images_wrap"></div>
                            </div>
                            <!-- Specifications Tab Goes Here -->
                            <div class="tab-pane" id="specifications">
                                <div class="table-responsive">
                                    <table class="table table-striped" rel="group_1">
                                        <thead>
                                            <tr>
                                                <th>Attribute</th>
                                                <th>Value</th>
                                                <th><a href="#" class="add_specifications">Add +</a></th>
                                            </tr>
                                        </thead>    
                                        <tbody class="add_specifications_wrap">
                                    <?php if(isset($post['Specifications'])):
                                                $specifications = array_combine($post['Specifications']['name'], $post['Specifications']['value']);
                                                 foreach($specifications as $key=>$value):?>
                                            <tr>
                                                <td><input type="text" name="Specifications[name][]" class="form-control" required value="<?=$key;?>" /></td>
                                                <td><input type="text" name="Specifications[value][]" class="form-control" required value="<?=$value;?>" /></td>
                                                <td><input type="button" class="btnX" value="x" /></td>
                                            </tr>
                                    <?php   endforeach;
                                        endif;
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                           
                            <!-- Vendor Div Goes Here -->
                            <div class="tab-pane" id="vendors">
                                <!-- Product SKU / ISBN CODE Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Product SKU','Vendors[sku]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Vendors[sku]', 
                                            'value' => set_value('Vendors[sku]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'placeholder' => 'Product SKU'
                                        )); 
                                    ?>
                                    <?=form_label('Product ISBN','Vendors[isbn]',array('class'=>'col-md-3 text-right'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Vendors[isbn]', 
                                            'value' => set_value('Vendors[isbn]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'placeholder' => 'Product ISBN'
                                        )); 
                                    ?>
                                    <div class="clearfix"> </div>
                                    <?= form_error('Vendors[sku]','<div class="error col-md-6 text-right">', '</div>'); ?>
                                    <?= form_error('Vendors[isbn]','<div class="error col-md-6 text-right">', '</div>'); ?>
                                </div>    
                                <!-- Product MRP / Minimum Order Row -->
                                <div class="form-group form-row">
                                    <?=form_label('Product Selling Price*','Vendors[price]',array('class'=>'col-md-2'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Vendors[price]', 
                                            'value' => set_value('Vendors[price]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Product Selling Price'
                                        )); 
                                    ?>
                                    <?=form_label('Quantity*','Vendors[quantity]',array('class'=>'col-md-3 text-right'));?>
                                    <?=form_input(
                                        array
                                        ( 
                                            'name'  => 'Vendors[quantity]', 
                                            'value' => set_value('Vendors[quantity]'), 
                                            'class' => 'form-control col-md-3', 
                                            'type'  => 'text',
                                            'required' => 'required',
                                            'placeholder' => 'Stock Quantity'
                                        )); 

                                    ?>
                                    <div class="clearfix"></div>
                                    <div class="col-md-2"></div>
                                    <?= form_error('Vendors[price]','<div class="error col-md-3">', '</div>'); ?>
                                    <div class="col-md-3"></div>
                                    <?= form_error('Vendors[quantity]','<div class="error col-md-3">', '</div>'); ?>
                                </div>        
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