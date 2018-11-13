<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper3 users">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h1>Reset Password</h1>
        <?php if ( $this->session->flashdata( 'message' ) ) : ?>
        <?php echo $this->session->flashdata( 'message' ); ?>
        <?php endif; ?>
        <form action="" method="post" class="users_forms" id="forms">
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" >
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Confirm password" value="" >
            </div>
            <div class="form-group">
                <input type="submit" name="resetSubmit" class="btn-primary btn" value="Submit"/>
            </div>
        </form>
    </div>
    </div>            
</div>
</div>
