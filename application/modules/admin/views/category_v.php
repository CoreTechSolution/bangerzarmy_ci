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
								<a href="<?php echo base_url('admin/create_category'); ?>" class="btn btn-primary btn-m">Create</a>
							</div>
                            <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                            	<thead>
                            		<tr>
	                            		<th>SL No</th>
	                            		<th>Name</th>
	                            		<th>Slug</th>
	                            		<th>Action</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <?php if(!empty($category_lists)){ ?>
                                    <?php //print_r($category_lists); exit(); ?>
                                    <?php $count=1; ?>
                                        <?php foreach ($category_lists as $category_list) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $category_list->cat_name; ?></td>
                                                <td><?php echo $category_list->cat_slug; ?></td>
                                                <td><a href="<?php echo base_url('admin/edit_category/'.$category_list->cat_id); ?>" class="btn btn-sm btn-secondary">Edit</a> | <a href="javascript:void(0)" onclick="delete_category(<?php echo $category_list->cat_id; ?>,'<?php echo base_url(); ?>')" class="btn btn-sm btn-red">Delete</a></td>
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