<?php $this->load->view('templates/header'); ?>
<?=form_open(site_url('delete-brand'),array('class'=>'form-horizontal contentForm'));?>  
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> STORE BRANDS
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("add-brand");?>"><i class="fa fa-plus"></i></a>
                            </div>
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
                <?php if(empty($brands)){} else { ?>
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <table id="dataTable1" class="display table table-striped" data-table="data-table">
                            <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="selectall"></th>
                                <td class="text-left">Name</th>
                                <td class="text-left">Go to Store</th>
                                <td class="text-left">Type</th>
                                <td class="text-left">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($brands as $key => $brand): extract($brand);?>
                            <tr>
                                <td class="text-center check">
                                    <input type="checkbox" name="brand_id[]" value="<?=$brand_id;?>" class="checkbox">
                                </td>
                                <td class="text-left"><a href="<?=site_url("update-brand/$brand_id");?>"><?=$brand_name;?></a></td>
                                <td class="text-left"><a href="<?="../brands/$brand_slug";?>">Click Here</a></td>
                                <td class="text-left"><?= ($brand_type==0)?"Products" : "Medicine";?></td>
                                <td class="text-left"><?= ($brand_status==1)?"Active" : "Deactive";?></td>
                            </tr>      
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?= form_close();?>
<?php $this->load->view('templates/footer');?>
