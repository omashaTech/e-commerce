<?php $this->load->view('templates/header'); ?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <?=form_open(base_url('delete-category'),array('class'=>'form-horizontal contentForm'));?>
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> STORE CATEGORIES
                        <span class="text-right" style="float:right;">
                            <div class="btn btn-primary">
                                <a href="<?=site_url("add-category");?>"><i class="fa fa-plus"></i></a>
                            </div>
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </span>
                    </h4>
                </div>
                <?php if(empty($categories)){} else { ?>
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <table id="dataTable1" class="display table table-striped" data-table="data-table">
                            <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="selectall"></th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Created By</th>
                                <th class="text-left">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($categories as $key => $category): extract($category);?>
                            <tr>
                                <td class="text-center check">
                                    <input type="checkbox" name="category_id[]" value="<?=$category_id;?>" class="checkbox">
                                </td>
                                <td class="text-left"><a href=<?=site_url("update-category/$category_id");?>><?=$category_name;?></a></td>
                                <td class="text-left"><a href="#"><?=$category_admin_id;?></a></td>
                                <td class="text-left"><?=($category_status==1)?"Active":"Inactive";?></td>
                            </tr>                                    
                            <?php endforeach;?>
                        </table>
                        <?= form_close();?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer');?>
