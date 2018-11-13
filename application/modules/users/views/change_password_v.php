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
				            <?php echo form_open(base_url($method), array('class'=>'form')); ?>
							    <div class="form-group">
							        <label for="old_password">Old Password: </label>
							        <input type="password" class="form-control" id="old_password" name="old_password">
							    </div>
							    <div class="form-group">
							        <label for="password">New Password:</label>
							        <input type="password" class="form-control" id="password" name="password" >
							    </div>
							    <div class="form-group">
							        <label for="conf_password">Confirm Password:</label>
							        <input type="password" class="form-control" id="conf_password" name="conf_password" >
							    </div>
							    <button type="submit" name="submit" value="submit" class="btn btn-red">Update</button>
							    <a href="<?php echo base_url($user_type.'/dashboard'); ?>" class="btn btn-red">Cancel</a>
							    
							    
							<?php form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>