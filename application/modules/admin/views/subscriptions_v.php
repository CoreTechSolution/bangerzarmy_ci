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
									<a href="<?php /*echo base_url('producer/create_beat'); */?>" class="btn btn-primary btn-sm">Create</a>
								</div>-->
								<table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
									<thead>
									<tr>
										<th>SL No</th>
										<th>Subscription ID</th>
										<th>User</th>
										<th>Membership</th>
										<th>Price($)</th>
										<!-- <th>Transaction ID</th>
										<th>Download Limit</th>
										<th>Downloaded</th> -->
										<th>Status</th>
										<th>Exp.Date</th>
									</tr>
									</thead>
									<tbody>
									<?php if(!empty($order_lists)){ ?>
										<?php //print_r($beat_lists); exit(); ?>
										<?php $count=1; $total_amount=0; ?>
										<?php foreach ($order_lists as $order_list) { ?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $order_list->order_id; ?></td>
												<td><?php echo $this->users->get_user_field($order_list->user_id,'name'); ?></td>
												<td><?php echo returnValue('memberships','title','membership_id',$order_list->membership_id); ?></td>
												<td><?php echo number_format($order_list->membership_price,2); ?></td>
												<?php $total_amount=$total_amount+$order_list->membership_price; ?>
												<!-- <td><?php echo($order_list->txn_id); ?></td>
												<td><?php echo($order_list->download_limits); ?></td>
												<td><?php echo($order_list->downloaded); ?></td> -->
												<td><?php echo($order_list->status); ?></td>
												
												<td><?php echo  dateFormat('m-d-Y',$order_list->expiry_date); ?></td>

											</tr>
											<?php $count++; ?>
										<?php } ?>
									<?php } ?>

									</tbody>
								</table>
								<div class="total_ammount">
									Total Subscription: <span>$</span> <?php echo number_format($total_amount,2); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>