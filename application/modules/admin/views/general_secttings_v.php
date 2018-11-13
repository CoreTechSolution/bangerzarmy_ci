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

								<?php if(!empty($membership_lists)) { ?>
									<form class="form" method="post" action="<?php echo base_url($method.'/'.$membership_lists->membership_id); ?>">


										<div class="form-group">
											<label for="title">Title: </label>
											<input type="text" class="form-control" id="title" name="title" value="<?php echo !empty($membership_lists->title)? $membership_lists->title:''; ?>">
										</div>
										<div class="form-group">
											<label for="duration">membership Validity(in days):</label>
											<input type="number" class="form-control" id="duration" name="duration" min="0" value="<?php echo !empty($membership_lists->duration)?$membership_lists->duration:''; ?>">
										</div>
										<div class="form-group">
											<label for="download_no">No of Downloads:</label>
											<input type="number" class="form-control" id="download_no" name="download_no" min="0" value="<?php echo !empty($membership_lists->download_no)?$membership_lists->download_no:''; ?>">
										</div>
										<div class="form-group">
											<label for="price">Price($):</label>
											<input type="text" class="form-control" id="price" name="price" value="<?php echo !empty($membership_lists->price)?$membership_lists->price:''; ?>">
										</div>

										<button type="submit" name="submit" value="submit" class="btn btn-red">Update</button>
										<a href="<?php echo base_url('admin/memberships'); ?>" class="btn btn-red">Cancel</a>

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