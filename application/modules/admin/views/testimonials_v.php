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
								<?php if(!empty($this->session->flashdata('msg'))){ ?>
									<?php $alert_class= ($this->session->flashdata('msg_type')=='Success')?'alert-success':'alert-danger'; ?>
									<div class="alert <?php echo $alert_class; ?>">
										<strong><?php echo $this->session->flashdata('msg_type'); ?>!</strong> <?php echo $this->session->flashdata('msg'); ?>
									</div>
								<?php } ?>
								<div class="create_subs">
									<a href="<?php echo base_url('admin/create_testimonials'); ?>" class="btn btn-primary btn-sm">Create</a>
								</div>
								<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
									<thead>
									<tr>
										<th>SL No</th>
										<th>Name</th>
										<th>Image</th>
										<th>Designation</th>
										<th>Content</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php if(!empty($testimonials)){ ?>
										<?php //print_r($beat_lists); exit(); ?>
										<?php $count=1; ?>
										<?php foreach ($testimonials as $testimonial) { ?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $testimonial->name; ?></td>
												<td><img src="<?php echo $testimonial->image; ?>" alt="testimonials image"></td>
												<td><?php echo $testimonial->designation; ?></td>
												<td><?php echo $testimonial->content; ?></td>
												<td><a href="<?php echo base_url('admin/edit_testimonial/'.$testimonial->id); ?>" class="btn btn-sm btn-secondary">Edit</a> | <a href="javascript:void(0)" onclick="delete_data(<?php echo $testimonial->id; ?>,'id','testimonials');" class="btn btn-sm btn-red">Delete</a></td>

											</tr>
											<?php $count++; ?>
										<?php } ?>
									<?php } ?>

									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>