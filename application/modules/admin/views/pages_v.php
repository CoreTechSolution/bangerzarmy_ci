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
                            <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                            	<thead>
                            		<tr>
	                            		<th>SL No</th>
	                            		<th>Page</th>
	                            		<th>Page Title</th>
	                            		<th>Action</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <?php if(!empty($page_lists)){ ?>
                                    <?php $count=1; ?>
                                        <?php foreach ($page_lists as $page_list) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $page_list->page; ?></td>
                                                <td><?php echo $page_list->page_title; ?></td>
                                                <td><a href="<?php echo base_url('admin/edit_page/'.$page_list->page_id); ?>" class="btn btn-sm btn-secondary">Edit</a></td>
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