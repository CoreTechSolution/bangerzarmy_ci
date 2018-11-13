<div class="wrapper3 users">
<div class="container">
    <div class="row">
        <?php $this->template_part->admin_users_profile_sec(); ?>
        <div class="col-lg-9">
            <div class="contentSection">
                <div class="dashboard-section">
                    <div class="box-wrapper">
                        <div class="box-title"><?php echo $title; ?> | ><a href="<?php echo base_url('admin/beat_graph_arts'); ?>" style="color: #fff">Graphic Art List</a></div>
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
                            <?php if(!empty($graphic_arts_lists)) { ?>
                            <?php echo form_open_multipart(base_url($method.'/'.$graphic_arts_lists->graphic_art_id),array('class'=>'form')); ?>
                                <div class="form-group">
                                    <label for="graphic_art_title">Title: </label>
                                    <input type="text" class="form-control" id="graphic_art_title" name="graphic_art_title" value="<?php echo !empty($graphic_arts_lists->graphic_art_title)?$graphic_arts_lists->graphic_art_title:''; ?>">
                                </div>

                                <?php if(!empty($graphic_arts_lists->graphic_art_img) && $graphic_arts_lists->graphic_art_img!==''){ ?>
                                    <div class="form-group">
                                        <img src="<?php echo $graphic_arts_lists->graphic_art_img; ?>" alt="" class="admin_preview_img">
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="graphic_art_img">Image:</label>
                                    <input type="file" id="graphic_art_img" name="graphic_art_img" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cat_id">Category:</label>
                                    <?php echo form_dropdown('cat_id', dropdown_category(),$graphic_arts_lists->cat_id, array('class'=>'form-control')); ?>
                                </div>
                                
                                <button type="submit" name="submit" value="submit" class="btn btn-red">Update</button>
                            <?php echo form_close(); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>