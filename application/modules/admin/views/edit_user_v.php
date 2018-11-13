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

				            <?php if(!empty($users)) { ?>
				            <?php echo form_open_multipart(base_url($method.'/'.$users->user_id), array('class'=>'form')); ?>
							    <div class="form-group">
							        <label for="name">Name: </label>
							        <input type="text" class="form-control" id="name" name="name" value="<?php echo !empty($users->name)? $users->name:''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="phone">Phone:</label>
							        <input type="text" class="form-control" id="phone" name="phone" min="0" value="<?php echo !empty($users->phone)?$users->phone:''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="email">Email:</label>
							        <input type="email" class="form-control" id="email" name="email" min="0" value="<?php echo !empty($users->email)?$users->email:''; ?>">
							    </div>
							    <?php if(!empty($users->profile_img) && $users->profile_img!==''){ ?>
								    <div class="form-group">
								    	<img src="<?php echo $users->profile_img; ?>" alt="" class="profile_preview_img">
								    </div>
							    <?php } ?>
							    <div class="form-group">
							        <label for="profile_img">Profile Image:</label>
							        <input type="file" id="profile_img" name="profile_img" class="form-control">
							    </div>
                                <div class="form-group">
							        <label for="name">status: </label>
                                    <?php echo form_dropdown('status',array('active'=>'active','deactive'=>'deactive'),$users->status,array('class'=>'form-control')) ; ?>
							        
							    </div>
							    
							    <button type="submit" name="submit" value="submit" class="btn btn-primary">Update</button>
							    <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-red">Cancel</a>
							    <!-- <a href="<?php echo base_url('users/change_password'); ?>/<?php echo $users->user_id; ?>" class="btn btn-red">Change Password</a> -->
							    
							<?php form_close(); ?>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>