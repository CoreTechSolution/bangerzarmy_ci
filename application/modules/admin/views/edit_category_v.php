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
				            <?php if(!empty($category_lists)) { ?>
				            <?php echo form_open_multipart(base_url($method.'/'.$category_lists->cat_id),array('class'=>'form')); ?>
							    <div class="form-group">
							        <label for="cat_name">Name: </label>
							        <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo !empty($category_lists->cat_name)?$category_lists->cat_name:''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="cat_slug">Slug:</label>
							        <br>
						        	<div class="slug_input_field">
							        	<input type="text" class="form-control" id="slug" name="cat_slug" min="0" value="<?php echo !empty($category_lists->cat_slug)?$category_lists->cat_slug:''; ?>" readonly>
							        </div>
							        <a href="javascript:void(0);" id="edit_cat_slug" class="btn btn-xs btn-sm">Edit</a>
							    </div>
							    <div class="form-group">
							        <label for="cat_desc">Description:</label>
							        <textarea class="form-control" id="cat_desc" name="cat_desc" rows="6" value="<?php echo !empty($category_lists->cat_desc)?$category_lists->cat_desc:''; ?>" ></textarea>
							    </div>
							    <?php if(!empty($category_lists->cat_img) && $category_lists->cat_img!==''){ ?>
								    <div class="form-group">
								    	<img src="<?php echo $category_lists->cat_img; ?>" alt="" class="admin_preview_img">
								    </div>
							    <?php } ?>
							    <div class="form-group">
							        <label for="cat_img">Category Image:</label>
							        <input type="file" id="cat_img" name="cat_img" class="form-control">
							    </div>
							    
							    <button type="submit" name="submit" value="submit" class="btn btn-red">Edit</button>
							<?php echo form_close(); ?>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>