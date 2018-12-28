<?php $this->load->view('templates/header'); ?>
<?=form_open(base_url('delete-product'),array('class'=>'form-horizontal contentForm'));?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> PRODUCTS
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("add-product");?>"><i class="fa fa-plus"></i></a>
                            </div>
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
            </div>
            <?php if(is_array($products)){ ?>
            <div class="col-md-12">
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <table id="dataTable1" class="display table table-striped" data-table="data-table">
                            <thead>
                            <tr><th class="text-center">Image</th>
                                <th class="text-left">Product Name</th>
                                <th class="text-left">Model</th>
                                <th class="text-right">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            {products}    
                            <tr>
                                <td class="text-center"><img src="../assets/uploads/products/thumbs/{product_image}" width="40"></td>
                                <td class="text-left"><a href="<?=site_url("update-product/{product_id}".session_id());?>">{product_name}</a></td>
                                <td>{product_model}</td>    
                                <td class="text-right">{product_mrp}</td>
                            </tr>
                            {/products}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>
    </div>
</div>
<?= form_close();?>
<?php $this->load->view('templates/footer');?>
