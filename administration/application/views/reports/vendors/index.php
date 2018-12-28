<?php $this->load->view('templates/header'); ?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> Registered Vendors</h4>
                </div>
            </div>
            <?php if(empty($vendors)){
            
            } else { ?>
            <div class="col-12">
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <?=form_open(site_url('delete-pharma'),array('class'=>'form-horizontal contentForm'));?>  
                        <table id="dataTable1" class="display table table-striped" data-table="data-table">
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
                            <?php foreach($vendors as $key => $value): extract($value);?>
                            <tr>
                                <td> &nbsp;&nbsp;<?=$key+1;?>.&nbsp;&nbsp;&nbsp; </td>
                                <td><a href="<?=site_url("vendor-details/$vendor_id");?>"><?=$vendor_name;?></a></td>
                                <td><?=$vendor_email;?></td>
                                <td><?=$vendor_phone;?></td>
                                <td><?= date('d-m-Y',strtotime($vendor_registered));?></td>
                                <td>
                                <?php 
                                    if($vendor_status==0){
                                        echo "Non-Verified";
                                    } elseif($vendor_status==1){
                                        echo "Mobile-Verified";
                                    } elseif($vendor_status==2){
                                        echo "Address-Verified";
                                    } elseif($vendor_status==3){
                                        echo "Business-Verified";
                                    } elseif($vendor_status==4){
                                        echo "Bank-Verified";
                                    }elseif($vendor_status==5){
                                        echo "Verified";
                                    }
                                 ?>
                                 </td>
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
