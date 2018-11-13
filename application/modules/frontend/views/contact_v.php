<style type="text/css">
    .page_content p{text-align: left; font-weight: 400; }
</style>
<div class="beat_list_wrapper4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1><?php echo $page_list->page_title ?></h1>
                <div class="page_content">
                    <?php echo $page_list->page_content ?>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="registration_form_div">
            <h1>Contact Form</h1>
            <?php
                if(!empty(validation_errors())){ ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> <?php echo validation_errors(); ?>
                    </div>
            <?php
                }
            ?>
            
            <?php if(!empty($this->session->flashdata('error_msg'))){ ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
            <?php } ?>
            <form action="" method="post" class="users_forms" id="forms">
                <div class="form-group" class="users_forms">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo !empty(set_value('name'))?set_value('name'):''; ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email_addr" id="email_addr" placeholder="Email" value="<?php echo !empty(set_value('email_addr'))?set_value('email_addr'):''; ?>">    
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo !empty(set_value('phone'))?set_value('phone'):''; ?>">
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" class="form-control textarea-no-styles" placeholder="Message"><?php echo !empty(set_value('message'))?set_value('message'):''; ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="contactSubmit" class="btn btn-red" value="Submit" />
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>