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
									<label for="cat_name">Name: </label>
									<input type="text" class="form-control" id="name" name="name" value="<?php echo !empty(set_value('name'))?set_value('name'):''; ?>">
								</div>
								<div class="form-group">
									<label for="cat_slug">Designation:</label>
									<input type="text" class="form-control" id="designation" name="designation" value="<?php echo !empty(set_value('designation'))?set_value('designation'):''; ?>">
								</div>
								<div class="form-group">
									<label for="cat_img">Image:</label>
									<input type="file" id="image" name="image" class="form-control">
								</div>
								<div class="form-group">
									<label for="cat_desc">Content:</label>
									<textarea class="form-control textarea-no-styles" id="content" name="content" rows="6" value="<?php echo !empty(set_value('content'))?set_value('content'):''; ?>" ></textarea>
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