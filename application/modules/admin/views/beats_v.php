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
								<a href="<?php echo base_url('admin/create_beat'); ?>" class="btn btn-primary btn-sm">Create</a>
								<a href="<?php echo base_url('admin/beat_graph_arts'); ?>" class="btn btn-secondary btn-sm">Graphic Art</a>
                                <a href="<?php echo base_url('admin/beat_tags'); ?>" class="btn btn-default btn-sm">Beats Tag</a>
							</div>
                            <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
                            	<thead>
                            		<tr>
	                            		<th>SL No</th>
	                            		<th>Graphic</th>
	                            		<th>Name</th>
	                            		<th>File</th>
	                            		<th>Featured</th>
	                            		<th>Category</th>
	                            		<th>Uploaded_by</th>
                                        <th>Date</th>
	                            
	                            		<!--<th>Action</th>-->
                            		</tr>
                            	</thead>
                            	<tbody>
                                    <?php if(!empty($beat_lists)){ ?>
                                    <?php //print_r($beat_lists); exit(); ?>
                                    <?php $count=1; ?>
                                        <?php foreach ($beat_lists as $beat_list) { ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><img class="table_list_image" src="<?php echo $beat_list->beat_graph_art; ?>" alt=""></td>
                                                <td><?php echo $beat_list->beat_name; ?></td>
                                                <td>
                                                    <?php if(!empty($beat_list->beat_file)){ ?>
                                                    <a href="<?php echo $beat_list->beat_file; ?>">Download File</a>
                                                <?php } else { ?>
                                                    No file added!
                                                <?php } ?>
                                                </td>
                                               <td><div class="yes_no">
                                        <label class="switch" style=""> 
                                            <?php if ($beat_list->beat_featured=='yes') { ?>
                                                <input name="beat_featured_admin" id="beat_featured_admin" type="checkbox" data_id="<?php echo  $beat_list->beat_id ; ?>" checked="true">
                                            <?php } else { ?>
                                                <input name="beat_featured_admin" id="beat_featured_admin" data_id="<?php echo  $beat_list->beat_id ; ?>" type="checkbox">
                                            <?php } ?>
                                          
                                          <span class="slider round"></span>
                                        </label>
                                    </div></td>
                                                <td><?php echo get_returnfield('category_master','cat_id',$beat_list->category_id,'cat_name'); ?></td>
                                                <td><?php echo get_returnfield('users','user_id',$beat_list->uploaded_by,'name'); ?></td>
                                                <td><?php echo dateFormat('m-d-Y',$beat_list->create_dt); ?></td>
                                                <!--<td><a href="<?php /*echo base_url('admin/edit_subscription/'.$beat_list->beat_id); */?>" class="btn btn-sm btn-secondary">Edit</a> | <a href="javascript:void(0)" onclick="delete_subscription(<?php /*echo $beat_list->beat_id; */?>,'<?php /*echo base_url(); */?>')" class="btn btn-sm btn-red">Delete</a></td>-->

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