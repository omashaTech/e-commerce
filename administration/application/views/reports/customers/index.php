<?php $this->load->view('templates/header'); ?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> Registered Customers</h4>
                </div>
            </div>
            <?php if(empty($customers)){
            
            } else { ?>
            <div class="col-12">
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <?=form_open(site_url('delete-pharma'),array('class'=>'form-horizontal contentForm'));?>  
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created (DD/MM/YYYY)</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($customers as $key => $value): extract($value);?>
                            <tr>
                                <td> &nbsp;&nbsp;<?=$key+1;?>.&nbsp;&nbsp;&nbsp; </td>
                                <td><a href="<?=site_url("customer-details/$customer_id");?>"><?=$customer_name;?></a></td>
                                <td><?=$customer_email;?></td>
                                <td><?=$customer_phone;?></td>
                                <td><?= date('d-m-Y',strtotime($customer_registered));?></td>
                                <td><?=($customer_status==1)?"Verified":"Non-Verified";?></td>
                            </tr>                                    
                            <?php endforeach;?>
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
