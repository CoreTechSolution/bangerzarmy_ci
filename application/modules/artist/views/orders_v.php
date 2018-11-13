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
								<!--<div class="create_subs">
									<a href="<?php /*echo base_url('artist/create_beat'); */?>" class="btn btn-primary btn-sm">Create</a>
								</div>-->
								<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
									<thead>
									<tr>
										<!--<th>SL No</th>-->
										<th>Order ID</th>
										<th>Beats</th>
										<th>Date</th>
										<!--<th>Featured</th>
										<th>Category</th>
										<th>Date</th>
										<th>Action</th>-->
									</tr>
									</thead>
									<tbody>
									<?php if(!empty($order_lists)){ ?>
										<?php //print_r($beat_lists); exit(); ?>
										<?php $count=1; ?>
										<?php foreach ($order_lists as $order_list) { ?>
											<tr>
												<?php $beat_name= returnValue('beats','beat_name','beat_id',$order_list->beat_id); ?>
												<td><?php echo $order_list->order_unique_id; ?></td>
												<td><a href="<?php echo base_url('frontend/single_beat/'.$order_list->beat_id); ?>"><?php echo $beat_name; ?></a></td>
												<td><?php echo  dateFormat('m-d-Y',$order_list->order_date); ?></td>
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