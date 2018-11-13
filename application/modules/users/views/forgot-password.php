<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper3 users">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h1>Forgot Password</h1>
        <?php if ( $this->session->flashdata( 'message' ) ) : ?>
        <?php echo $this->session->flashdata( 'message' ); ?>
        <?php endif; ?>
        <form action="" method="post" class="users_forms" id="forms">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" value="">
            </div>
            <div class="form-group">
                <input type="submit" name="forgotSubmit" class="btn-primary btn" value="Submit"/>
            </div>
        </form>
        <p class="footInfo">Already have an account? <a href="<?php echo base_url(); ?>users/login">Login here</a></p>
    </div>
    </div>            
</div>
</div>

