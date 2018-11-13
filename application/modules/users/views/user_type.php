<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper3 users">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h1>Registration</h1>
		<div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="boxwrapper">

                    <div class="jumbotron">
                        <h1 class="display-4">Register Type</h1>
                        <p class="lead">Please select your registration type.</p>
                        <hr class="my-4">

                        <p class="lead" style="text-align: left;">
                            <a class="btn btn-red btn-lg " href="<?php echo base_url('users/registration/producer'); ?>" role="button">Producer</a>
                            <a class="btn btn-blue btn-lg  pull-right" href="<?php echo base_url('users/registration/artist'); ?>" role="button">Artist</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <p class="footInfo">Already have an account? <a href="<?php echo base_url(); ?>users/login">Login here</a></p>  
    </div>
    </div>            
</div>
</div>

