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
							<?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
								<fieldset>
									<h3>Stripe Settings</h3>
									<input type="hidden" name="settings_id" value="<?php echo $settings[0]->settings_id; ?>">
									<div class="form-group">
								        <label for="secrete_key">Secrete Key: </label>
								        <?php echo form_input(array('name'=>'secrete_key','id'=>'secrete_key','class'=>'form-control'),!empty($settings[0]->secrete_key)? $settings[0]->secrete_key:''); ?>
								    </div>
								    <div class="form-group">
								        <label for="publishable_key">Publishable Key: </label>
								          <?php echo form_input(array('name'=>'publishable_key','id'=>'publishable_key','class'=>'form-control'),!empty($settings[0]->publishable_key)? $settings[0]->publishable_key:''); ?>
								       
								    </div>
								    <div class="form-group">
								        <label for="client_id">Client ID: </label>
								         <?php echo form_input(array('name'=>'client_id','id'=>'client_id','class'=>'form-control'),!empty($settings[0]->client_id)? $settings[0]->client_id:''); ?>
								    </div>
								    <div class="form-group submit-div">
								    	 <button type="submit" name="stripe_submit" value="Update" class="btn btn-primary">Update</button>
								    </div>
							    </fieldset>
							<?php echo form_close(); ?>

							<?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
								<fieldset>
									<h3>General Settings</h3>
									<input type="hidden" name="settings_id" value="<?php echo $settings[0]->settings_id; ?>">
									<div class="form-group">
								        <label for="admin_mail">Admin EMail: </label>
								        <?php echo form_input(array('name'=>'admin_mail','id'=>'admin_mail','class'=>'form-control'),!empty($settings[0]->admin_mail)? $settings[0]->admin_mail:''); ?>
								       
								    </div>
								    <div class="form-group">
								        <label for="contact_mail">Contact EMail: </label>
								          <?php echo form_input(array('name'=>'contact_mail','id'=>'contact_mail','class'=>'form-control'),!empty($settings[0]->contact_mail)? $settings[0]->contact_mail:''); ?>
								       
								    </div>

								    <div class="form-group submit-div">
								    	 <button type="submit" name="general_submit" value="Update" class="btn btn-primary">Update</button>
								    </div>
							    </fieldset>
							<?php echo form_close(); ?>
	                        <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                            <fieldset>
                                <h3>SMTP Settings</h3>
                                <input type="hidden" name="settings_id" value="<?php echo $settings[0]->settings_id; ?>">
                                <div class="form-group">
                                    <label for="admin_mail">Protocol: </label>
			                        <?php echo form_input(array('name'=>'protocol','id'=>'protocol', 'class'=>'form-control'),!empty($settings[0]->protocol)? $settings[0]->protocol:''); ?>

                                </div>
                                <div class="form-group">
                                    <label for="contact_mail">SMTP Host: </label>
			                        <?php echo form_input(array('name'=>'smtp_host','id'=>'smtp_host','class'=>'form-control'),!empty($settings[0]->smtp_host)? $settings[0]->smtp_host:''); ?>

                                </div>
                                <div class="form-group">
                                    <label for="contact_mail">SMTP Port: </label>
		                            <?php echo form_input(array('name'=>'smtp_port','id'=>'smtp_port','class'=>'form-control'),!empty($settings[0]->smtp_port)? $settings[0]->smtp_port:''); ?>

                                </div>
                                <div class="form-group">
                                    <label for="contact_mail">SMTP Crypto: </label>
		                            <?php echo form_input(array('name'=>'smtp_crypto','id'=>'smtp_crypto','class'=>'form-control'),!empty($settings[0]->smtp_crypto)? $settings[0]->smtp_crypto:''); ?>

                                </div>
                                <div class="form-group">
                                    <label for="contact_mail">SMTP User: </label>
		                            <?php echo form_input(array('name'=>'smtp_user','id'=>'smtp_user','class'=>'form-control'),!empty($settings[0]->smtp_user)? $settings[0]->smtp_user:''); ?>

                                </div>
                                <div class="form-group">
                                    <label for="contact_mail">SMTP Password: </label>
		                            <?php echo form_password(array('name'=>'smtp_pass','id'=>'smtp_pass','class'=>'form-control'),!empty($settings[0]->smtp_pass)? $settings[0]->smtp_pass:''); ?>

                                </div>

                                <div class="form-group submit-div">
                                    <button type="submit" name="smtp_setting" value="Update" class="btn btn-primary">Update</button>
                                </div>
                            </fieldset>
	                        <?php echo form_close(); ?>
							<?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
								<fieldset>
									<h3>Download Settings</h3>
									<input type="hidden" name="settings_id" value="<?php echo $settings[0]->settings_id; ?>">
									<div class="form-group">
								        <label for="commision_type">Commision type: </label>
								        <?php echo form_dropdown('commision_type',array('percentage'=>'Percentage','flat'=>'Flat'),!empty($settings[0]->commision_type)? $settings[0]->commision_type:'',array('class'=>'form-control')); ?>
								    </div>
									<div class="form-group">
								        <label for="commision_rate">Commision Rate: </label>
								        <?php echo form_input(array('name'=>'commision_rate','id'=>'commision_rate','class'=>'form-control'),!empty($settings[0]->commision_rate)? $settings[0]->commision_rate:''); ?>
								    </div>
								    
								    <div class="form-group submit-div">
								    	 <button type="submit" name="download_submit" value="Update" class="btn btn-primary">Update</button>
								    </div>
							    </fieldset>
							<?php echo form_close(); ?>
							<?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
								<fieldset>
									<h3>Social Media Settings</h3>
									<input type="hidden" name="settings_id" value="<?php echo $settings[0]->settings_id; ?>">
									<?php if(!empty($settings[0]->social_media)) { ?>
										<?php $social_medias=json_decode($settings[0]->social_media); ?>
										<?php //print_r($social_medias); ?>
									<?php } ?>
									<div class="form-group">
								        <label for="facebook">Facebook Link: </label>
								        <?php echo form_input(array('name'=>'facebook','id'=>'facebook','class'=>'form-control'),!empty($social_medias->facebook)? $social_medias->facebook:''); ?>
								    </div>
								    <div class="form-group">
								        <label for="twitter">twitter Link: </label>
								        <?php echo form_input(array('name'=>'twitter','id'=>'twitter','class'=>'form-control'),!empty($social_medias->twitter)? $social_medias->twitter:''); ?>
								    </div>
								    <div class="form-group">
								        <label for="google_plus">Google+ Link: </label>
								        <?php echo form_input(array('name'=>'google_plus','id'=>'google_plus','class'=>'form-control'),!empty($social_medias->google_plus)? $social_medias->google_plus:''); ?>
								    </div>
								    <div class="form-group">
								        <label for="instragram">Instragram Link: </label>
								        <?php echo form_input(array('name'=>'instragram','id'=>'instragram','class'=>'form-control'),!empty($social_medias->instragram)? $social_medias->instragram:''); ?>
								    </div>
								    <div class="form-group">
								        <label for="youtube">Youtube Link: </label>
								        <?php echo form_input(array('name'=>'youtube','id'=>'youtube','class'=>'form-control'),!empty($social_medias->youtube)? $social_medias->youtube:''); ?>
								    </div>
									
								    
								    <div class="form-group submit-div">
								    	 <button type="submit" name="social_submit" value="Update" class="btn btn-primary">Update</button>
								    </div>
							    </fieldset>
							<?php echo form_close(); ?>
	                        <?php echo form_open_multipart(base_url($method), array('class'=>'form settings_form')); ?>
                            <fieldset>
                                <h3>Home Page section 1 Settings</h3>
                                <input type="hidden" name="settings_id" value="<?php echo $settings[0]->settings_id; ?>">
                                <div class="form-group">
                                    <label for="commision_type">Commision type: </label>
			                        <?php echo form_dropdown('commision_type',array('percentage'=>'Percentage','flat'=>'Flat'),!empty($settings[0]->commision_type)? $settings[0]->commision_type:'',array('class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <label for="commision_rate">Commision Rate: </label>
			                        <?php echo form_input(array('name'=>'commision_rate','id'=>'commision_rate','class'=>'form-control'),!empty($settings[0]->commision_rate)? $settings[0]->commision_rate:''); ?>
                                </div>

                                <div class="form-group submit-div">
                                    <button type="submit" name="download_submit" value="Update" class="btn btn-primary">Update</button>
                                </div>
                            </fieldset>
	                        <?php echo form_close(); ?>

				            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>