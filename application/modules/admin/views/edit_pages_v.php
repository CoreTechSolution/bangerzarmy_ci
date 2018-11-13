<div class="wrapper3 users">
<div class="container">
    <div class="row">
        <?php $this->template_part->admin_users_profile_sec(); ?>
        <div class="col-lg-9">
            <div class="contentSection">
                <div class="dashboard-section">
                    <div class="box-wrapper">
                        <div class="box-title"><?php echo $title; ?></div>
                        <div class="box-container">
                        	<?php
				                if(!empty(validation_errors())){ ?>
				                    <div class="alert alert-danger">
				                        <strong>Error!</strong> <?php echo validation_errors(); ?>
				                    </div>
				            <?php
				                }
				            ?>
				            
				            <?php if(!empty($this->session->flashdata('msg'))){ ?>
				            <?php $alert_class= ($this->session->flashdata('msg_type')=='Success')?'alert-success':'alert-danger'; ?>
				                <div class="alert <?php echo $alert_class; ?>">
				                    <strong><?php echo $this->session->flashdata('msg_type'); ?>!</strong> <?php echo $this->session->flashdata('msg'); ?>
				                </div>
				            <?php } ?>

				            <?php if(!empty($page_lists)) { ?>
							<form class="form" method="post" action="<?php echo base_url($method.'/'.$page_lists->page_id); ?>">
								
								<div class="form-group">
							        <label for="page">Page: </label>
							        <input type="text" class="form-control" value="<?php echo !empty($page_lists->page)? $page_lists->page:''; ?>" readonly>
							    </div>
							    <div class="form-group">
							        <label for="title">Title: </label>
							        <input type="text" class="form-control" id="title" name="title" value="<?php echo !empty($page_lists->page_title)? $page_lists->page_title:''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="content">Content: </label>
							        <textarea class="form-control" id="page_content" name="page_content"><?php echo !empty($page_lists->page_content)? $page_lists->page_content:''; ?></textarea>
							    </div>
							    <div class="form-group">
							        <label for="meta-keyword">Meta Keyword: </label>
							        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="<?php echo !empty($page_lists->meta_keyword)? $page_lists->meta_keyword:''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="meta-description">Meta Description: </label>
							        <textarea id="meta_description" name="meta_description" class="form-control textarea-no-styles"><?php echo !empty($page_lists->meta_description)? $page_lists->meta_description:''; ?></textarea>
							    </div>
							    
							    <button type="submit" name="submit" value="submit" class="btn btn-red">Update</button>
							    <a href="<?php echo base_url('admin/pages'); ?>" class="btn btn-red">Cancel</a>
							    
							</form>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>