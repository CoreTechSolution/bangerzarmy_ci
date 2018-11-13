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
                                <a href="<?php echo base_url('admin/members'); ?>" class="btn btn-primary btn-m">Members</a>
								<a href="<?php echo base_url('admin/create_membership'); ?>" class="btn btn-primary btn-m">Create</a>
							</div>
                            <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                            	<thead>
                            		<tr>
	                            		<th>SL No</th>
	                            		<th>Name</th>
	                            		<th>Price($)</th>
	                            		<th>Download Limits</th>
	                            		<th>Duration(days)</th>
	                            		<th>Action</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <?php if(!empty($membership_lists)){ ?>
                                    <?php //print_r($membership_lists); exit(); ?>
                                    <?php $count=1; ?>
                                        <?php foreach ($membership_lists as $membership_list) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $membership_list->title; ?></td>
                                                <td><?php echo $membership_list->price; ?></td>
                                                <td><?php echo $membership_list->download_no; ?></td>
                                                <td><?php echo $membership_list->duration; ?></td>
                                                <td><a href="<?php echo base_url('admin/edit_membership/'.$membership_list->membership_id); ?>" class="btn btn-sm btn-secondary">Edit</a> | <a href="javascript:void(0)" onclick="delete_membership(<?php echo $membership_list->membership_id; ?>,'<?php echo base_url(); ?>')" class="btn btn-sm btn-red">Delete</a></td>
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