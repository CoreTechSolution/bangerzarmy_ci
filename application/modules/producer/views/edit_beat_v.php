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
				            <?php echo form_open_multipart(base_url($method.'/'.$beat_lists->beat_id),array('class'=>'form')); ?>

							    <div class="form-group">
							        <label for="beat_name">Title: </label>
							        <input type="text" class="form-control" id="beat_name" name="beat_name" value="<?php echo !empty($beat_lists->beat_name)?$beat_lists->beat_name:''; ?>">
							    </div>
							    <div class="form-group">
							        <label for="beat_graph_art">Graphic Art: </label>
									<div class="row">

										<div class="col-lg-4">
											<?php if(!empty($beat_lists->beat_graph_art)){ ?>
												<img class="graphic_art_a" src="<?php echo $beat_lists->beat_graph_art; ?>" alt="">
											<?php } ?>
										</div>
										<div class="col-lg-8">
											<a class="btn btn-red" style="margin: 0 0 25px 0;" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0)" id="predefine_art">Predefine</a>
											<input type="file" class="form-control" id="beat_graph_art" name="beat_graph_art">
							        		<span class="form-info">File type allowed jpg|png and max file size allowed 5MB</span>
							        		<input type="hidden" name="graphic_art_hidden" id="graphic_art_hidden">
										</div>
									</div>
							        
							    </div>

							     <div class="form-group">
							     	<div class="row">
								     	<div class="col-lg-6">
								        <label for="category_id">Genre:</label>
								        <?php $categories=json_decode($beat_lists->category_id); ?>
								        <?php //print_r($categories); ?>
								        <?php echo form_multiselect('category_id[]', dropdown_category('slug'), $categories,'class="form-control sumoSelect"'); ?>
								        </div>
								        <div class="col-lg-6">
								        <label for="beat_name">Tag: </label>
								        <?php $tags=json_decode($beat_lists->beat_tag); ?>
								        <?php echo form_multiselect('beat_tag[]', dropdown_tags('slug'),$tags,'class="form-control sumoSelect"'); ?>
								    	</div>
									</div>
							        
							    </div>
							    <div class="form-group">
							        <label for="beat_file">File:</label>
							        <?php if(!empty($beat_lists->beat_file)){ ?>
							        <a href="<?php echo $beat_lists->beat_file; ?>">Download File</a>
							    	<?php } ?>
							        <input type="file" class="form-control" id="beat_file" name="beat_file" accept="mp3,wav">
							        <span class="form-info">File type allowed mp3|wav and max file size allowed 5MB</span>
							    </div>
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <label for="beat_key">Beat Key: </label>
                                            <input type="text" class="form-control" id="beat_key" name="beat_key" value="<?php echo !empty($beat_lists->beat_key)?$beat_lists->beat_key:''; ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="beat_bpm">BPM: </label>
                                            <input type="text" class="form-control" id="beat_bpm" name="beat_bpm" value="<?php echo !empty($beat_lists->beat_bpm)?$beat_lists->beat_bpm:''; ?>">
                                        </div>
                                    </div>

                                </div>
                  <div class="form-group">
                      <label for="beat_description">Description:</label>
                      <textarea class="form-control textarea-no-styles" id="beat_description" rows="15" name="beat_description"><?php echo !empty($beat_lists->beat_description)?$beat_lists->beat_description:''; ?></textarea>
                      
                  </div>
							    <div class="form-group">
							        <label for="price">Featured:</label>
							        <div class="yes_no">
								        <label class="switch" style=""> 
								        	<?php if ($beat_lists->beat_featured=='yes') { ?>
								        		<input name="beat_featured" id="beat_featured" type="checkbox" checked="true">
								        	<?php } else { ?>
												<input name="beat_featured" id="beat_featured" type="checkbox">
								        	<?php } ?>
										  
										  <span class="slider round"></span>
										</label>
									</div>
							    </div>
							    <div class="form-group">
							    	<label for="sub_beat">Add Subbeats:<span> ( First upload CSV then upload audio file )</span></label>
							    	<div class="row">
							    		<div class="col-sm-12">
							    			<a data-toggle="modal" data-target="#subbeat_list" href="javascript:void(0)" id="subbeat_list_show" class="btn edit_profile_btn btn-sm">Added Subbeats</a>
							    			<a data-toggle="modal" data-target="#uploadCSV" href="javascript:void(0)" id="upload_csv" class="btn edit_profile_btn btn-sm">Upload CSV</a>
							    		</div>
							    	</div>
							    	<label for="sub_beat">Add sub-beat files:</label>
							    	<div class="row">
							    		<div class="col-sm-6">
							    			<div id="drag-and-drop-zone" class="dm-uploader p-5">
								            <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>

								            <div class="btn btn-primary btn-block mb-5">
								                <span>Open the file Browser</span>
								                <input type="file" title='Click to add Files' />
								            </div>
								          </div><!-- /uploader -->
							    		</div>
							    		<div class="col-sm-6">
							    			 <div class="card h-100">
									            <div class="card-header">
									              File List
									            </div>

									            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
									              <li class="text-muted text-center empty">No files uploaded.</li>
									            </ul>
									          </div>
							    		</div>
							    	</div>
							    	
							    </div>
							    
							    <button type="submit" name="submit" value="submit" class="btn btn-red">Update</button>
							<?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal for prdefined graphic art sector -->
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

<!-- Modal for upload subbeat csv-->
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
      	<div class="download_csv"><a id="subbeat_upload_csv" href="javascript:void(0)">Download Sample CSV</a></div>
		<?php echo form_open_multipart(base_url($csv_method),array('class'=>'form')); ?>
		<?php echo form_upload( array('class'=>"form-control", 'id'=>"csv_file_subbeat", 'name'=>"csv_file_subbeat"));  ?>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Upload">
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal for multi subbeat file upload-->
<div class="modal fade" id="upload_subFiles" tabindex="-1" role="dialog" aria-labelledby="uploadCSVLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadCSVLabel">Upload Files</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	
      </div>
    </div>
  </div>
</div>

<!-- Modal for featured beat select-->
<div class="modal fade" id="featured_add" tabindex="-1" role="dialog" aria-labelledby="uploadCSVLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memFormModalLabel">Payment Form</h5>
                <button type="button" class="featured_modal_close close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <span id="payment-errors"></span>

                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" id="beat_id" name="beat_id" class="form-control" placeholder="Name" value="<?php echo set_value('beat_id'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email@you.com" value="<?php echo set_value('email'); ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Card No:</label>
                        <input type="text" class="form-control" name="card_num" id="card_num">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="exp_month" maxlength="2" class="form-control" id="card-expiry-month" placeholder="MM" value="<?php echo set_value('exp_month'); ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="exp_year" class="form-control" maxlength="4" id="card-expiry-year" placeholder="YYYY" required="" value="<?php echo set_value('exp_year'); ?>">
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="cvc" id="card-cvc" maxlength="3" class="form-control" autocomplete="off" placeholder="CVC" value="<?php echo set_value('cvc'); ?>" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary featured_modal_close" data-dismiss="modal">Close</button>
                    <a href="javascript:void(0);" id="payBtn" class="btn btn-primary">Pay Now</a>
                </div>
        </div>
    </div>
</div>
<!-- Modal for subbeat list-->
<div class="modal fade bd-example-modal-lg" id="subbeat_list" tabindex="-1" role="dialog" aria-labelledby="uploadCSVLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadCSVLabel">Subbeats</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		 <table class="table" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="20">
        	<thead>
        		<tr>
            		<th>SL No</th>
            		<th>File</th>
            		<th>Name</th>
            		<th>Tags</th>
            		<th>Type</th>
            		<th>Key</th>
            		<th>BPM</th>
            		<th style="width: 9%;">Date</th>
            		<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
                <?php if(!empty($subbeat_lists)){ ?>
                <?php //print_r($subbeat_lists);  ?>
                <?php $count=1; ?>
                    <?php foreach ($subbeat_lists as $subbeat_list) { ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td>
                                <?php if(!empty($subbeat_list->beat_file)){ ?>
                                <a href="<?php echo $subbeat_list->beat_file; ?>">Download File</a>
                            <?php } else { ?>
                                No file added!
                            <?php } ?>
                            </td>
                            <td>
                            	<?php echo $subbeat_list->beat_name; ?>
                            </td>
                            <td>
                            	<?php $tags=json_decode($subbeat_list->beat_tag); ?>
                            	<?php if(!empty($tags)){ ?>
                            	<?php foreach ($tags as $tag) { ?>
                            	<?php 
                            		echo '<span class="btn btn-default btn-sm span_tag">'.$tag.'</span>';

                            	?>
                            	<?php } ?>
                            	<?php } else { ?>
                            		N/A
                            	<?php } ?>
                            </td>
                            <td>
                            	<?php echo $subbeat_list->beat_type; ?>
                            </td>
                            <td>
                            	<?php echo $subbeat_list->beat_key; ?>
                            </td>
                            <td>
                            	<?php echo $subbeat_list->beat_bpm; ?>
                            </td>
                            <td><?php echo  dateFormat('m-d-Y',$subbeat_list->create_dt); ?></td>
                            <!-- <td>
                                <a href="<?php echo base_url('producer/edit_beat').'/'.$subbeat_list->beat_id; ?>" class="btn btn-sm btn-secondary">Edit</a> | 
                                <a href="javascript:void(0)" onclick="delete_beat(<?php echo $subbeat_list->beat_id; ?>,'<?php echo base_url(); ?>')" class="btn btn-sm btn-red">Delete</a>
                            </td> -->
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

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    //set your publishable key
    Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY ?>');

    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $('#payBtn').removeAttr("disabled");
            //display the errors on the form
            // $('#payment-errors').attr('hidden', 'false');
            $('#payment-errors').addClass('alert alert-danger');
            $("#payment-errors").html(response.error.message);
        } else {
            var token = response['id'];
            var name=$('#name').val();
            var email=$('#email').val();
            var card_num=$('#card_num').val();
            var cvc=$('#card-cvc').val();
            var exp_month=$('#card-expiry-month').val();
            var exp_year=$('#card-expiry-year').val();
            var beat_id='<?php echo $beat_lists->beat_id; ?>';
            $.ajax({
                url:base_url+'ajax/beat_featured_payment',
                type:'post',
                data:{stripeToken:token,name:name,email:email,card_num:card_num,cvc:cvc,exp_month:exp_month,exp_year:exp_year,beat_id:beat_id},
                success:function(res){
                    if(res==true){
                        $("#featured_add").modal('hide');
                        document.getElementById("beat_featured").checked=true;
                    } else {
                        //$("#featured_add").modal('hide');
                        $('#payment-errors').html('sumthing wrong! Please try again later.');
                        $('#payment-errors').addClass('alert alert-danger');
                        document.getElementById("beat_featured").checked=false;
                        document.getElementById("beat_featured").checked=false;
                    }

                }
            });

        }
    }

    $("#payBtn").on('click',function() {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        //alert('hii');

        //create single-use token to charge the user
        Stripe.createToken({
            number: $('#card_num').val(),
            cvc: $('#card-cvc').val(),
            exp_month: $('#card-expiry-month').val(),
            exp_year: $('#card-expiry-year').val()
        }, stripeResponseHandler);

        //submit from callback
        return false;
    });

</script>