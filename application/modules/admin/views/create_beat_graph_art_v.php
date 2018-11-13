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
				            <?php echo form_open_multipart(base_url($method),array('class'=>'form')); ?>
							    <div class="form-group">
							        <label for="graphic_art_title">Title: </label>
							        <input type="text" class="form-control" id="graphic_art_title" name="graphic_art_title" value="<?php echo !empty(set_value('graphic_art_title'))?set_value('graphic_art_title'):''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="graphic_art_img">Image:</label>
							        <input type="file" class="form-control" id="graphic_art_img" name="graphic_art_img" >
							    </div>
							    <div class="form-group">
							        <label for="cat_id">Category:</label>
							        <?php echo form_dropdown('cat_id', dropdown_category(),'default', array('class'=>'form-control')); ?>
							    </div>
							    
							    <button type="submit" name="submit" value="submit" class="btn btn-red">Create</button>
							<?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>