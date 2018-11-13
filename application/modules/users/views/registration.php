<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper3 users">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="registration_form_div">
            <h1><?php echo $user_type; ?> Registration</h1>
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
                <div class="input-group">
                    <input type="password" class="form-control" onkeyup="passwordCheck($(this).val());" name="password" id="password" placeholder="Password" value="">
                    <a class="btn btn-secondary btn-sm generate_password" href="javascript:void(0)" onclick="generate_password()">Generate Password</a>
                </div>
                <div class="form-group">
                    
                    <input type="hidden" id="password_strength" name="password_strength">
                    <span id="result"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Confirm password" value="">
                </div>

                <div class="form-group">
                    <input type="submit" name="regisSubmit" class="btn btn-red" value="Submit" />
                </div>
            </form>
            <p class="footInfo">Already have an account? <a href="<?php echo base_url(); ?>users/login">Login here</a></p>  
        </div>
    </div>
    </div>            
</div>
</div>

