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

								<?php if(!empty($testimonials)) { ?>
									<form class="form" method="post" action="<?php echo base_url($method.'/'.$testimonials->id); ?>">


										<div class="form-group">
											<label for="title">Name: </label>
											<input type="text" class="form-control" id="name" name="name" value="<?php echo !empty($testimonials->name)? $testimonials->name:''; ?>">
										</div>
										<div class="form-group">
											<label for="meta-keyword">Designation: </label>
											<input type="text" class="form-control" id="designation" name="designation" value="<?php echo !empty($testimonials->designation)? $testimonials->designation:''; ?>">
										</div>
										<div class="form-group">
											<label for="content">Content: </label>
											<textarea class="form-control textarea-no-styles" id="content" name="content"><?php echo !empty($testimonials->content)? $testimonials->content:''; ?></textarea>
										</div>
										<?php if(!empty($testimonials->image) && $testimonials->image!==''){ ?>
											<div class="form-group">
												<img src="<?php echo $testimonials->image; ?>" alt="" class="admin_preview_img">
											</div>
										<?php } ?>
										<div class="form-group">
											<label for="image">Image:</label>
											<input type="file" id="image" name="image" class="form-control">
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