<?php $this->load->view('templates/header'); ?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> STORE MEDICINES
                        <span class="text-right" style="float:right;">
                            <button class="btn btn-primary"><a href="<?=base_url('add-medicine.html');?>">ADD MEDICINE</a></button>
                        </span>
                    </h4>
                </div>
            </div>
            <?php if(is_array($medicines)){ ?>
            <div class="col-12">
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <?=form_open(base_url('delete-medicine'),array('class'=>'form-horizontal contentForm'));?>  
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Quantity / Unit </th>
                                <th>Price</th>
                                <th>Manager Name</th>
                                <th>Created (DD/MM/YYYY)</th>
                                <th class="text-right">All&nbsp;&nbsp;<input type="checkbox" id="selectall"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($medicines as $key => $medicine): extract($medicine);?>
                            <tr>
                                <td> &nbsp;&nbsp;<?=$key+1;?>.&nbsp;&nbsp;&nbsp; </td>
                                <td><a href="<?=base_url('update-medicine/'.$medicine_id.'.html');?>"><?=$medicine_name;?></a></td>
                                <td><?=$medicine_packing_qty." ". $medicine_form;?> / <?=$medicine_packing_form;?></td>
                                <td><?=$medicine_mrp;?></td>
                                <td><?=$medicine_admin_id;?></td>    
                                <td><?= date('d-m-Y',strtotime($medicine_created));?></td>
                                <td class="text-right"><input type="checkbox" name="medicine_id[]" value="<?=$medicine_id;?>" class="validate[minCheckbox[1] case"></td>
                            </tr>                                    
                            <?php endforeach;?>
                            <tr>
                                <td colspan="6"><div class="pagination_links"><?=$links; ?></div></td>
                                <td class="text-right"> 
                                    <button class="btn btn-primary" type="submit">Delete</button>
                                </td>
                            </tr>
                            </tbody>
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
