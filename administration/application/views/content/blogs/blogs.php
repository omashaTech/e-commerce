<?php $this->load->view('templates/header'); ?>
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h4><i class="dripicons-network-3"></i> STORE BLOGS
                        <span class="text-right" style="float:right;">
                            <button class="btn btn-primary">
                                <a href="<?=site_url('add-blog');?>">ADD BLOG</a>
                            </button>
                        </span>
                    </h4>
                </div>
            </div>
            <?php if(empty($list)){                
            } else { ?>
            <div class="col-12">
                <div class="block table-block mb-4">
                    <div class="table-responsive">
                        <?=form_open(base_url('category/delete'),array('class'=>'form-horizontal contentForm'));?>  
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Type</th>
                                <th>Created On</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list as $key => $blog): extract($blog);?>
                            <tr role="row" class="odd">
                                <td class="name sorting_1"><?=$key+1;?></td>
                                <td><a href=<?=site_url("update-blog/$blog_id");?>><?=$blog_name;?></a></td>
                                <td><?=$blog_slug;?></td>
                                <td><?=($blog_type==1)?"Blog":"Page";?></td>
                                <td class="date"><?=$blog_date;?></td>
                                <td><?= ($blog_status==1)?"Active":"Disable";?></td>
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
