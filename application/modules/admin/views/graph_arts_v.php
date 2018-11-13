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
								<a href="<?php echo base_url('admin/create_beat_graph_art'); ?>" class="btn btn-primary btn-m">Create</a>
							</div>
                            <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                            	<thead>
                            		<tr>
	                            		<th>SL No</th>
	                            		<th>Title</th>
	                            		<th>Image</th>
	                            		<th>category</th>
	                            		<th>Action</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <?php if(!empty($graph_arts_lists)){ ?>
                                    <?php //print_r($graph_arts_lists); exit(); ?>
                                    <?php $count=1; ?>
                                        <?php foreach ($graph_arts_lists as $graph_arts_list) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $graph_arts_list->graphic_art_title; ?></td>
                                                <td><img src="<?php echo $graph_arts_list->graphic_art_img; ?>" alt="" class="table_list_image"></td>
                                                <td><?php echo $graph_arts_list->cat_id; ?></td>
                                                <td><a href="<?php echo base_url('admin/edit_beat_graph_art/'.$graph_arts_list->graphic_art_id); ?>" class="btn btn-sm btn-secondary">Edit</a> | <a href="javascript:void(0)" onclick="delete_graphic_art(<?php echo $graph_arts_list->graphic_art_id; ?>,'<?php echo base_url(); ?>')" class="btn btn-sm btn-red">Delete</a></td>
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