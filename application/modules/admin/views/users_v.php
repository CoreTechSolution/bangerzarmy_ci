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
                            <div class="create_subs">
                                <a href="<?php echo base_url('admin/featured_producer'); ?>" class="btn btn-primary btn-m">Featured Producers</a>
                            </div>
                            <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                            	<thead>
                            		<tr>
	                            		<th>SL No</th>
	                            		<th>Name</th>
	                            		<th>Type</th>
	                            		<th>Email</th>
	                            		<th>Phone</th>
	                            		<th>Stripe Id</th>
	                            		<th>Status</th>
	                            		<th>Action</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <?php if(!empty($users)){ ?>
                                    <?php $count=1; ?>
                                        <?php foreach ($users as $user) { ?>
                                        <?php $status_class=($user->status=='deactive')?'sdeactive':'sactive'; ?>
                                        
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $user->name; ?></td>
                                                <td><?php echo $user->user_types; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td><?php echo $user->phone; ?></td>
                                                <td><?php echo $user->stripe_customer_id; ?></td>
                                                <td><span class=<?php echo $status_class; ?>><?php echo $user->status; ?></span></td>
                                                <td><a href="<?php echo base_url('admin/edit_user/'.$user->user_id); ?>" class="btn btn-sm btn-secondary">Edit</a></td>
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