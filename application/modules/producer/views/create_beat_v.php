<div class="wrapper3 users">
<div class="container">
    <div class="row">
        <?php $this->template_part->admin_users_profile_sec(); ?>
        <div class="col-lg-9">
            <div class="contentSection">
                <div class="dashboard-section">
                    <div class="box-wrapper">
                        <div class="box-title"><?php echo $title; ?></div>
                        <div class="box-title-right"><a href="#"></a></div>
                        <div class="box-container">
                        	<!-- <div class="btnlink">
                                                          <a data-toggle="modal" data-target="#uploadCSV" href="javascript:void(0)" id="upload_csv" class="btn edit_profile_btn btn-sm">Upload CSV</a>
                                                      </div> -->
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
				            <?php echo form_open_multipart(base_url($method),array('class'=>'form')); ?>

							    <div class="form-group">
							        <label for="beat_name">Title: </label>
							        <input type="text" class="form-control" id="beat_name" name="beat_name" value="<?php echo !empty(set_value('beat_name'))?set_value('beat_name'):''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="beat_graph_art">Graphic Art: </label>
									<div class="row">
										<div class="col-lg-8">
											<input type="file" class="form-control" id="beat_graph_art" name="beat_graph_art" accept="jpg,png">
							        		<span class="form-info">File type allowed jpg|png and max file size allowed 5MB</span>
							        		<input type="hidden" name="graphic_art_hidden" id="graphic_art_hidden">
										</div>
										<div class="col-lg-4">
											<a class="btn btn-red" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0)" id="predefine_art">Predefine</a>
										</div>
									</div>
							        
							    </div>
							    <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
  							        <label for="category_id">Genre:</label>
  							        <?php echo form_multiselect('category_id[]', dropdown_category('slug'),array(),'class="form-control sumoSelect"'); ?>
                      </div>
                      <div class="col-lg-6">
  							        <label for="beat_name">Tag: </label>
  							        <?php echo form_multiselect('beat_tag[]', dropdown_tags('slug'),array(),'class="form-control sumoSelect"'); ?>
                      </div>
                    </div>
							        
							    </div>
							    <div class="form-group">
							        <label for="beat_file">File:</label>
							        <input type="file" class="form-control" id="beat_file" name="beat_file" accept="mp3,wav">
							        <span class="form-info">File type allowed mp3|wav and max file size allowed 5MB</span>
							    </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="beat_key">Beat Key: </label>
                                        <input type="text" class="form-control" id="beat_key" name="beat_key" >
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="beat_bpm">BPM: </label>
                                        <input type="text" class="form-control" id="beat_bpm" name="beat_bpm" >
                                    </div>
                                </div>

                            </div>
							    <div class="form-group">
							        <label for="beat_description">Description:</label>
							        <textarea class="form-control textarea-no-styles" id="beat_description" rows="15" name="beat_description"></textarea>
							        
							    </div>
							    <!--<div class="form-group">
							        <label for="price">Featured:</label>
							        <div class="yes_no">
								        <label class="switch" style=""> 
										  <input name="beat_featured" id="beat_featured" type="checkbox">
										  <span class="slider round"></span>
										</label>
									</div>
							    </div>-->
							    
							    <button type="submit" name="submit" value="submit" class="btn btn-red">Create</button>
							<?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Graphic Art</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(!empty($graphic_img_lists)){

        	$category_id=0;
        	foreach ($graphic_img_lists as $graphic_img_list) { 
        		if($category_id!=$graphic_img_list->cat_id){
        			echo '<h3>'.get_returnfield('category_master','cat_id',$graphic_img_list->cat_id,'cat_name').'</h3>';
        		}
        		?>
        		<a class="graphic_art_a" data-path="<?php echo $graphic_img_list->graphic_art_img; ?>" href="javascript:void(0)" style="background: url('<?php echo $graphic_img_list->graphic_art_img; ?>') no-repeat; background-size: cover;"></a>
        <?php	

        $category_id!=$graphic_img_list->cat_id;
    }
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadCSV" tabindex="-1" role="dialog" aria-labelledby="uploadCSVLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadCSVLabel">Upload CSV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="download_csv"><a id="beat_upload_csv" href="javascript:void(0)">Download Sample CSV</a></div>
		<?php echo form_open_multipart(base_url($csv_method),array('class'=>'form')); ?>
		<?php echo form_upload( array('class'=>"form-control", 'id'=>"csv_file_beat", 'name'=>"csv_file"));  ?>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        <?php form_close(); ?>
      </div>
    </div>
  </div>
</div>